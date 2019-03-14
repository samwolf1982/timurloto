<?php

namespace common\models\search;
use common\models\Balancestatistics;
use common\models\helpers\ConstantsHelper;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use yii\helpers\ArrayHelper;


/**
 * WagerSearch represents the model behind the search form of `common\models\Wager`.
 */
class BalancestatisticsSearch extends Balancestatistics
{

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'wager_id', 'playlist_id', 'event_id', 'profit', 'penetration', 'middle_coef', 'roi', 'plus', 'minus', 'created_at'], 'required'],
            [['user_id', 'wager_id','penetration', 'playlist_id', 'event_id', 'plus', 'minus'], 'integer'],
            [['profit',  'middle_coef', 'roi'], 'number'],
            [['created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'wager_id' => 'Wager ID',
            'playlist_id' => 'Playlist ID',
            'event_id' => 'Event ID',
            'profit' => 'Прибыль',
            'penetration' => 'Проходимость',
            'middle_coef' => 'коэффициент',
            'roi' => 'ROI',
            'plus' => 'Количество Плюсов',
            'minus' => 'Количество Минусов',
            'created_at' => 'created at',
        ];
    }




    /**
     * {@inheritdoc}
     */
//    public function scenarios()
//    {
//        // bypass scenarios() implementation in the parent class
//        return Model::scenarios();
//    }


    public function searchCount($user_id)
    {

        //SELECT  SUM(profit) as `profit`,SUM(`penetration`) as `penetration`, SUM(`middle_coef`) as `middle_coef`, SUM(`roi`) as `roi`,SUM(`plus`) as `plus`,SUM(`minus`) as `minus`  FROM `balancestatistics` WHERE 1
// SELECT  SUM(profit) as `profit`,SUM(`penetration`) as `penetration`, SUM(`middle_coef`) / COUNT(`middle_coef`)  as `middle_coef`, SUM(`roi`) as `roi`,SUM(`plus`) as `plus`,SUM(`minus`) as `minus`  FROM `balancestatistics` WHERE 1
//        SELECT SUM(profit) as `profit`, SUM(`penetration`)/ COUNT(`penetration`)*100 as `penetration`, SUM(`middle_coef`) / COUNT(`middle_coef`) as `middle_coef`, SUM(`roi`) as `roi`,SUM(`plus`) as `plus`,SUM(`minus`) as `minus` FROM `balancestatistics` WHERE 1
       // $sql="SELECT  SUM(profit) as `profit`,SUM(`penetration`)/ COUNT(`penetration`)*100 as `penetration`, SUM(`middle_coef`) / COUNT(`middle_coef`)  as `middle_coef`, SUM(`roi`) * 100 as `roi`,SUM(`plus`) as `plus`,SUM(`minus`) as `minus`  FROM `balancestatistics` WHERE user_id = :u_id";
      //SELECT  SUM(profit) as `profit`,SUM(`penetration`)/ COUNT(`penetration`)*100 as `penetration`, SUM(`middle_coef`) / COUNT(`middle_coef`)  as `middle_coef`, SUM(`roi`) / COUNT(`roi`) as `roi` ,SUM(`plus`) as `plus`,SUM(`minus`) as `minus`
        $sql="SELECT  SUM(profit) as `profit`,SUM(`penetration`)/ COUNT(`penetration`)*100 as `penetration`, SUM(`middle_coef`) / COUNT(`middle_coef`)  as `middle_coef`, SUM(`roi`) / COUNT(`roi`) * 100 as `roi` ,SUM(`plus`) as `plus`,SUM(`minus`) as `minus`  FROM `balancestatistics` WHERE user_id = :u_id";
      $result =   yii::$app->db->createCommand($sql, [
            ':u_id' => $user_id,
//        ])->execute();
        ])->queryOne();

      // второй вариант рои переделка
      $roi2=1;
        $prepare_result=   ['profit'=> round($result['profit'],2),'penetration'=>round($result['penetration'],2),
            'middle_coef'=>round($result['middle_coef'],2),
            'roi'=>round($this->newRoiCalk($user_id),2),


            ];
      return    array_merge($result,$prepare_result);   ;
    }

    private function newRoiCalk($user_id){
        $roi=1;
        $totalSumBet=0; // сумма всех ставок
        $totalSumBetCleare=0; // сумма всех чистых ставок
        $sql="SELECT   status, (total*coef) as 'totale',  ((total*coef)- total) as 'cleare'   FROM `wager` WHERE user_id = :u_id";
        $resultSql =   yii::$app->db->createCommand($sql, [
            ':u_id' => $user_id,
//        ])->execute();
        ])->queryAll();


        foreach ($resultSql as $data) {
            $totalSumBet+=$data['totale'];
            $totalSumBetCleare+=$data['cleare'];
            yii::error([$data['status'],$data['cleare'],$data['totale'],]);
        }
        if(!empty($totalSumBet)){
            $roi=$totalSumBetCleare/$totalSumBet;
        }




        return $roi;
    }
    public function searchChart($user_id)
    {
        $b=Balancestatistics::find()->select(['profit','created_at'])->where(['user_id'=>$user_id])->orderBy(['created_at'=>SORT_ASC])->asArray()->all();

        $totalos=0;
        $result=[];
        if($b){
            $result = ArrayHelper::getColumn($b, function  ($element)  {
                // $totalos+=round( $element['profit'],2);
                return [ (strtotime ($element['created_at']) *1000),round( $element['profit'],2)  ];
            });


            $tmp=[];
            // cумирование по дате . замыкание не работает в  ArrayHelper::getColumn
            foreach ($result as $item) {
                $totalos+=$item[1];
                $tmp[]=[$item[0],$totalos];
            }
            $result=$tmp;
        }



        return  $result;

    }




    public function countChart($user_id)
    {
        $count=Balancestatistics::find()->where(['user_id'=>$user_id])->count();
        return $count;
    }




    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * поиск за неделю
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search_custom_last_week($params)
    {


//        2020-08-22 01:19:58
        $lastWeek    = date('Y-m-d H:i:s',strtotime('last sunday'));
        $lastLastWeek= date('Y-m-d H:i:s',strtotime('last sunday -7 days'));
$count=Yii::$app->db->createCommand("select COUNT(subquery.user_id) FROM
( SELECT user_id, sum(profit) as sume, created_own  FROM `balancestatistics`  WHERE created_own BETWEEN '{$lastLastWeek}' AND '{$lastWeek}' GROUP BY user_id ORDER BY sume) AS subquery  WHERE 1",[':status' => 1])->queryScalar();

        $dataProvider = new SqlDataProvider([
            'sql' => "SELECT user_id, sum(profit) as sume, (SUM(`penetration`)/ COUNT(`penetration`)*100) as penet, ( SUM(`middle_coef`) / COUNT(`middle_coef`))    as mdc, (SUM(`roi`) / COUNT(`roi`)) as ro, created_own 
                        FROM `balancestatistics`  WHERE created_own BETWEEN '{$lastLastWeek}' AND '{$lastWeek}' GROUP BY user_id ORDER BY sume DESC ",
            //'params' => [':status' => 1],
            'totalCount' => $count,
            'sort' => [
                'attributes' => [
                    'user_id',
                    'age',
                    'penet',
                    'mdc',
                    'ro',
                    'sume'=>['default' => SORT_DESC],
//                    'name' => [
//                        'asc' => ['first_name' => SORT_ASC, 'last_name' => SORT_ASC],
//                        'desc' => ['first_name' => SORT_DESC, 'last_name' => SORT_DESC],
//                        'default' => SORT_ASC,
//                        'label' => 'Name',
//                    ],
                ],
            ],
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);

        return $dataProvider;
// get the user records in the current page
        $models = $dataProvider->getModels();





        $query = Balancestatistics::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'wager_id' => $this->wager_id,
            'playlist_id' => $this->playlist_id,
            'event_id' => $this->event_id,
            'profit' => $this->profit,
            'penetration' => $this->penetration,
            'middle_coef' => $this->middle_coef,
            'roi' => $this->roi,
            'plus' => $this->plus,
            'minus' => $this->minus,
            'created_at' => $this->created_at,
            'created_own' => $this->created_own,
        ]);

        return $dataProvider;
    }


    /**
     * поиск за неделю LIVE
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search_custom_last_week_live($params)
    {


//        2020-08-22 01:19:58
//        $lastWeek    = date('Y-m-d H:i:s',strtotime('last sunday'));
//        $lastLastWeek= date('Y-m-d H:i:s',strtotime('last sunday -7 days'));
//        $lastWeek    = date('Y-m-d H:i:s',strtotime('last sunday'));
//        $lastLastWeek= date('Y-m-d H:i:s');
//        $lastWeek    = date('Y-m-d H:i:s',strtotime('last sunday'));
        //----------
        $lastWeek    = date('Y-m-d H:i:s');

        $lastLastWeek= date('Y-m-d H:i:s',strtotime('last sunday'));
        Yii::error([$lastWeek,$lastLastWeek]);
        $count=Yii::$app->db->createCommand("select COUNT(subquery.user_id) FROM
( SELECT user_id, sum(profit) as sume, created_own  FROM `balancestatistics`  WHERE created_own BETWEEN '{$lastLastWeek}' AND '{$lastWeek}' GROUP BY user_id ORDER BY sume) AS subquery  WHERE 1",[':status' => 1])->queryScalar();

        $dataProvider = new SqlDataProvider([
            'sql' => "SELECT user_id, sum(profit) as sume, (SUM(`penetration`)/ COUNT(`penetration`)*100) as penet, ( SUM(`middle_coef`) / COUNT(`middle_coef`))    as mdc, (SUM(`roi`) / COUNT(`roi`)) as ro, created_own 
                        FROM `balancestatistics`  WHERE created_own BETWEEN '{$lastLastWeek}' AND '{$lastWeek}' GROUP BY user_id ORDER BY sume DESC ",
            //'params' => [':status' => 1],
            'totalCount' => $count,
            'sort' => [
                'attributes' => [
                    'user_id',
                    'age',
                    'penet',
                    'mdc',
                    'ro',
                    'sume'=>['default' => SORT_DESC],
//                    'name' => [
//                        'asc' => ['first_name' => SORT_ASC, 'last_name' => SORT_ASC],
//                        'desc' => ['first_name' => SORT_DESC, 'last_name' => SORT_DESC],
//                        'default' => SORT_ASC,
//                        'label' => 'Name',
//                    ],
                ],
            ],
            'pagination' => [
                'pageSize' => 3,
                'pageParam' => 'tournament',
            ],
        ]);

        return $dataProvider;
// get the user records in the current page
        $models = $dataProvider->getModels();





        $query = Balancestatistics::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'wager_id' => $this->wager_id,
            'playlist_id' => $this->playlist_id,
            'event_id' => $this->event_id,
            'profit' => $this->profit,
            'penetration' => $this->penetration,
            'middle_coef' => $this->middle_coef,
            'roi' => $this->roi,
            'plus' => $this->plus,
            'minus' => $this->minus,
            'created_at' => $this->created_at,
            'created_own' => $this->created_own,
        ]);

        return $dataProvider;
    }


    /**
     * поиск за неделю с плюсами
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search_custom_last_week_with_plus($params)
    {




//        2020-08-22 01:19:58
        $lastWeek    = date('Y-m-d H:i:s',strtotime('last sunday'));
        $lastLastWeek= date('Y-m-d H:i:s',strtotime('last sunday -7 days'));


        $offcet_time='-30 days';
        $lastWeek    = date('Y-m-d H:i:s');
        if(!empty($params['period']) and  ($params['period']==ConstantsHelper::PERIOD_3_M or $params['period']==ConstantsHelper::PERIOD_ALL) ){
            if($params['period']==ConstantsHelper::PERIOD_3_M){
                $offcet_time='-90 days';
            }elseif ($params['period']==ConstantsHelper::PERIOD_ALL) {
                $offcet_time='-360 days';
            }



        }
        $lastLastWeek= date('Y-m-d H:i:s',strtotime($offcet_time));
        $count=Yii::$app->db->createCommand("select COUNT(subquery.user_id) FROM
( SELECT user_id, sum(profit) as sume, created_own  FROM `balancestatistics`  WHERE created_own BETWEEN '{$lastLastWeek}' AND '{$lastWeek}' GROUP BY user_id ORDER BY sume) AS subquery  WHERE 1",[':status' => 1])->queryScalar();

        $dataProvider = new SqlDataProvider([
            'sql' => "SELECT user_id, sum(profit) as sume, (SUM(`penetration`)/ COUNT(`penetration`)*100) as penet, ( SUM(`middle_coef`) / COUNT(`middle_coef`))    as mdc, (SUM(`roi`) / COUNT(`roi`)) as ro,  COUNT(`plus`) as pluse, COUNT(`minus`) as minese, created_own 
                        FROM `balancestatistics`  WHERE created_own BETWEEN '{$lastLastWeek}' AND '{$lastWeek}' GROUP BY user_id ORDER BY sume DESC ",
            //'params' => [':status' => 1],
            'totalCount' => $count,
            'sort' => [
                'attributes' => [
                    'user_id',
                    'age',
                    'penet',
                    'mdc',
                    'ro',
                    'sume'=>['default' => SORT_DESC],
//                    'name' => [
//                        'asc' => ['first_name' => SORT_ASC, 'last_name' => SORT_ASC],
//                        'desc' => ['first_name' => SORT_DESC, 'last_name' => SORT_DESC],
//                        'default' => SORT_ASC,
//                        'label' => 'Name',
//                    ],
                ],
            ],
            'pagination' => [
                'pageSize' => 5,
                'pageParam' => 'top',
            ],
        ]);

        return $dataProvider;
// get the user records in the current page
        $models = $dataProvider->getModels();





        $query = Balancestatistics::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'wager_id' => $this->wager_id,
            'playlist_id' => $this->playlist_id,
            'event_id' => $this->event_id,
            'profit' => $this->profit,
            'penetration' => $this->penetration,
            'middle_coef' => $this->middle_coef,
            'roi' => $this->roi,
            'plus' => $this->plus,
            'minus' => $this->minus,
            'created_at' => $this->created_at,
            'created_own' => $this->created_own,
        ]);

        return $dataProvider;
    }


    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Balancestatistics::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'wager_id' => $this->wager_id,
            'playlist_id' => $this->playlist_id,
            'event_id' => $this->event_id,
            'profit' => $this->profit,
            'penetration' => $this->penetration,
            'middle_coef' => $this->middle_coef,
            'roi' => $this->roi,
            'plus' => $this->plus,
            'minus' => $this->minus,
            'created_at' => $this->created_at,
            'created_own' => $this->created_own,
        ]);

        return $dataProvider;
    }


    // SELECT id, sum(profit) as sume FROM `balancestatistics`  WHERE 1 GROUP BY user_id ORDER BY sume DESC;


//
//    public function search($params)
//    {
//        $query = Balancestatistics::find();
//        // add conditions that should always apply here
//
//        $dataProvider = new ActiveDataProvider([
//            'query' => $query,
////            'sort'=>array(
////                'defaultOrder'=>['id' => SORT_DESC],
////            ),
////            'totalCount' => 3,
//            'pagination' => [
//                'pageSize' => 20,
//            ]
//        ]);
//
//        $this->load($params);
//
//        if (!$this->validate()) {
//            // uncomment the following line if you do not want to return any records when validation fails
//            // $query->where('0=1');
//            return $dataProvider;
//        }
//
//        // grid filtering conditions
//        $query->andFilterWhere([
//            'id' =>  $this->id,
//            'user_id' => $this->user_id ,
//            'wager_id' => $this->wager_id ,
//            'playlist_id' => $this->playlist_id ,
//            'event_id' => $this->event_id ,
//            'profit' => $this->profit ,
//            'penetration' => $this->penetration ,
//            'middle_coef' =>  $this->middle_coef ,
//            'roi' => $this->roi ,
//            'plus' => $this->plus ,
//            'minus' => $this->minus ,
//            'created_at' => $this->created_at ,
//
//        ]);
//
//       // $query->andFilterWhere(['like', 'comment', $this->comment]);
//
//
////        $countQuery = clone $query;
////        $this->pages = new Pagination(['totalCount' => $countQuery->count()]);
//
////        $models = $query->offset($pages->offset)
////            ->limit($pages->limit)
////            ->all();
//
//
//        return $dataProvider;
//    }

}
