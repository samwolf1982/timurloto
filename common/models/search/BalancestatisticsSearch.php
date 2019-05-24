<?php

namespace common\models\search;
use common\models\Balancestatistics;
use common\models\helpers\ConstantsHelper;
use common\models\Wager;
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


        // второй вариант проходимости
        $sql_2="SELECT  SUM(`plus`) as `plus`,SUM(`minus`) as `minus`  FROM `balancestatistics` WHERE user_id = :u_id  ";
        $resultProhod =   yii::$app->db->createCommand($sql_2, [
            ':u_id' => $user_id,
//        ])->execute();
        ])->queryOne();
        $cbg=( $resultProhod['plus']+$resultProhod['minus'] );
        if($cbg <= 0 )$cbg=1;
        $prepare_result['penetration']=round(  (($resultProhod['plus'] / $cbg ) *100),2);
        // второй вариант проходимости end



      return    array_merge($result,$prepare_result);   ;
    }



    public static function searchCountPeroiod($user_id,$period)
    {
   $lastWeek    = date('Y-m-d H:i:s');
   $lastLastWeek= date('Y-m-d H:i:s',strtotime('-10 year')); // default
//        stat-period=week     const STATTICTIC_FILTER_PREIOD_WEEK='week'; // const STATTICTIC_FILTER_PREIOD_MONTH='month'; // const STATTICTIC_FILTER_PREIOD_3_MONTH='3-month'; // const STATTICTIC_FILTER_PREIOD_YEAR='year'; //
        if($period==ConstantsHelper::STATTICTIC_FILTER_PREIOD_WEEK)  $lastLastWeek= date('Y-m-d H:i:s',strtotime('-7 day'));
        if($period==ConstantsHelper::STATTICTIC_FILTER_PREIOD_MONTH)  $lastLastWeek= date('Y-m-d H:i:s',strtotime('-31 day'));
        if($period==ConstantsHelper::STATTICTIC_FILTER_PREIOD_3_MONTH)  $lastLastWeek= date('Y-m-d H:i:s',strtotime('-93 day'));
        if($period==ConstantsHelper::STATTICTIC_FILTER_PREIOD_YEAR)  $lastLastWeek= date('Y-m-d H:i:s',strtotime('-365 day'));

        //SELECT  SUM(profit) as `profit`,SUM(`penetration`) as `penetration`, SUM(`middle_coef`) as `middle_coef`, SUM(`roi`) as `roi`,SUM(`plus`) as `plus`,SUM(`minus`) as `minus`  FROM `balancestatistics` WHERE 1
// SELECT  SUM(profit) as `profit`,SUM(`penetration`) as `penetration`, SUM(`middle_coef`) / COUNT(`middle_coef`)  as `middle_coef`, SUM(`roi`) as `roi`,SUM(`plus`) as `plus`,SUM(`minus`) as `minus`  FROM `balancestatistics` WHERE 1
//        SELECT SUM(profit) as `profit`, SUM(`penetration`)/ COUNT(`penetration`)*100 as `penetration`, SUM(`middle_coef`) / COUNT(`middle_coef`) as `middle_coef`, SUM(`roi`) as `roi`,SUM(`plus`) as `plus`,SUM(`minus`) as `minus` FROM `balancestatistics` WHERE 1
        // $sql="SELECT  SUM(profit) as `profit`,SUM(`penetration`)/ COUNT(`penetration`)*100 as `penetration`, SUM(`middle_coef`) / COUNT(`middle_coef`)  as `middle_coef`, SUM(`roi`) * 100 as `roi`,SUM(`plus`) as `plus`,SUM(`minus`) as `minus`  FROM `balancestatistics` WHERE user_id = :u_id";
        //SELECT  SUM(profit) as `profit`,SUM(`penetration`)/ COUNT(`penetration`)*100 as `penetration`, SUM(`middle_coef`) / COUNT(`middle_coef`)  as `middle_coef`, SUM(`roi`) / COUNT(`roi`) as `roi` ,SUM(`plus`) as `plus`,SUM(`minus`) as `minus`

//        WHERE created_own BETWEEN '{$lastLastWeek}' AND '{$lastWeek}'
      //  $sql="SELECT  SUM(profit) as `profit`,SUM(`penetration`)/ COUNT(`penetration`)*100 as `penetration`, SUM(`middle_coef`) / COUNT(`middle_coef`)  as `middle_coef`, SUM(`roi`) / COUNT(`roi`) * 100 as `roi` ,SUM(`plus`) as `plus`,SUM(`minus`) as `minus`  FROM `balancestatistics` WHERE user_id = :u_id ";
        $sql="SELECT  SUM(profit) as `profit`,SUM(`penetration`)/ COUNT(`penetration`)*100 as `penetration`, SUM(`middle_coef`) / COUNT(`middle_coef`)  as `middle_coef`, SUM(`roi`) / COUNT(`roi`) * 100 as `roi` ,SUM(`plus`) as `plus`,SUM(`minus`) as `minus`  FROM `balancestatistics` WHERE user_id = :u_id and created_own  BETWEEN '{$lastLastWeek}' AND '{$lastWeek}' ";
        $result =   yii::$app->db->createCommand($sql, [
            ':u_id' => $user_id,
//        ])->execute();
        ])->queryOne();

        // второй вариант рои переделка
        $roi2=1;
        $prepare_result=   ['profit'=> round($result['profit'],2),'penetration'=>round($result['penetration'],2),
            'middle_coef'=>round($result['middle_coef'],2),
            'roi'=>round(self::newRoiCalk($user_id,$lastWeek,$lastLastWeek),2),
        ];




        // второй вариант проходимости
        $sql_2="SELECT  SUM(`plus`) as `plus`,SUM(`minus`) as `minus`  FROM `balancestatistics` WHERE user_id = :u_id and created_own  BETWEEN '{$lastLastWeek}' AND '{$lastWeek}' ";
        $resultProhod =   yii::$app->db->createCommand($sql_2, [
            ':u_id' => $user_id,
//        ])->execute();
        ])->queryOne();




        $cbg=( $resultProhod['plus']+$resultProhod['minus'] );
        if($cbg <= 0 )$cbg=1;
        $prepare_result['penetration']=round(  (($resultProhod['plus'] / $cbg ) *100),2);
        // второй вариант проходимости end
//        // второй вариант проходимости



        return    array_merge($result,$prepare_result);   ;
    }



    /**
     * новый пересчет рои
     * @param $user_id
     * @return float|int
     * @throws \yii\db\Exception
     */
    public static function newRoiCalk($user_id,$lastWeek=false,$lastLastWeek=false){
        $roi=1;
        $totalSumBet=0; // сумма всех ставок
        $totalSumBetCleare=0; // сумма всех чистых ставок
        if($lastWeek and $lastLastWeek ){
            $sql="SELECT  id,  status, total,  ((total*coef)- total) as 'cleare'   FROM `wager` WHERE user_id = :u_id  and created_at  BETWEEN '{$lastLastWeek}' AND '{$lastWeek}'";
            $resultSql =   yii::$app->db->createCommand($sql, [
                ':u_id' => $user_id,
            ])->queryAll();
        }else{
            $sql="SELECT  id,  status, total,  ((total*coef)- total) as 'cleare'   FROM `wager` WHERE user_id = :u_id";
            $resultSql =   yii::$app->db->createCommand($sql, [
                ':u_id' => $user_id,
            ])->queryAll();
        }

        foreach ($resultSql as $data) {
            if($data['status'] == Wager::STATUS_ENTERED){
                $totalSumBet+=$data['total'];
                $totalSumBetCleare+=$data['cleare'];
            }elseif ($data['status'] == Wager::STATUS_NOT_ENTERD){
                $totalSumBet+=$data['total'];
                $totalSumBetCleare+=  (-abs( $data['total']));
            }elseif ($data['status'] == Wager::STATUS_RETURN_BET){
                $totalSumBet+=$data['total'];
            }

//            if($data['status'] == Wager::STATUS_ENTERED || $data['status'] == Wager::STATUS_NOT_ENTERD || $data['status'] == Wager::STATUS_RETURN_BET ){
//                yii::error([$data['id'],$data['status'],$data['cleare'],$data['total'],]);
//            }
        }
        if(!empty($totalSumBet)){
            $roi=$totalSumBetCleare/$totalSumBet;
          //  yii::error(['$totalSumBetCleare'=>$totalSumBetCleare,'$totalSumBet'=>$totalSumBet,'$roi'=>$roi]);
            return $roi * 100;
        }
        return 0;

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




         $rr=[];
        $il=2500;
        foreach (range(1,1000) as $item) {
            $rr[]=[1555034403000+$il,rand(-10,25)+(rand(0, 10) / 10)];
        $il += 2500;
        }
      //  return $rr;
        //[[1555034403000,0.8],[1555049493000,1],[1555049504000,-9],[1555049513000,-7.7],[1555049522000,-17.7],[1555049535000,-17.5],[1555049541000,-15.7],[1555095603000,-15.6],[1555095603000,-14],[1555099209000,-13],[1555099209000,-12.4],[1555162202000,-12.2],[1555162202000,-11.1],[1555180203000,-7.9],[1555227129000,-6],[1555227226000,-5.7],[1555227250000,-4],[1555255802000,-3.7],[1555765208000,-4.7],[1556463602000,-3.5],[1557079203000,-4.5],[1557079203000,-5.5],[1557095404000,-6.5],[1557133208000,-5.25],[1557174604000,-6.25],[1557176404000,-6.07],[1557176404000,-5.89],[1557315705000,-6.89],[1557316433000,-6.11],[1557349203000,-7.11],[1557855007000,-8.11]]


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
        $lastWeek    = date('Y-m-d H:i:s',strtotime('last monday'));
        $lastLastWeek= date('Y-m-d H:i:s',strtotime('last monday -7 days'));

        // fix если щас понедельник
        //if(date('w')===1)   { $lastWeek= date("Y-m-d 00:00:00");   }



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

        $lastWeek    = date('Y-m-d H:i:s');
        $lastLastWeek= date('Y-m-d H:i:s',strtotime('last monday'));
        // fix если щас понедельник
//        yii::error(['w22'=>date('w')]);
        if(date('w')==='1')    $lastLastWeek= date("Y-m-d 00:00:00");
        //          2019-04-05
    if(isset($params['dtop'])){
        $lastWeek = $params['dtop'];
        $lastLastWeek =  date('Y-m-d H:i:s', (strtotime($params['dtop']) - 7*24*60*60) );
      }
//        Yii::error([$lastWeek,$lastLastWeek]);

    if(0){ // старый код не работало сортировка в турнирах
        $sql1="select COUNT(subquery.user_id) FROM
( SELECT user_id, sum(profit) as sume, created_own  FROM `balancestatistics`  WHERE created_own BETWEEN '{$lastLastWeek}' AND '{$lastWeek}' GROUP BY user_id ORDER BY sume) AS subquery  WHERE 1";
        $count=Yii::$app->db->createCommand($sql1,[':status' => 1])->queryScalar();
        $sql2= "SELECT user_id, sum(profit) as sume, (SUM(`penetration`)/ COUNT(`penetration`)*100) as penet, ( SUM(`middle_coef`) / COUNT(`middle_coef`))    as mdc, (SUM(`roi`) / COUNT(`roi`)) as ro, created_own 
                        FROM `balancestatistics`  WHERE created_own BETWEEN '{$lastLastWeek}' AND '{$lastWeek}' GROUP BY user_id ORDER BY sume DESC ";
    }else{ //новый код не работало сортировка в турнирах (не проверено)
        $sql1="select COUNT(subquery.user_id) FROM
( SELECT user_id, sum(profit) as sume, created_own  FROM `balancestatistics`  WHERE created_own BETWEEN '{$lastLastWeek}' AND '{$lastWeek}' GROUP BY user_id ORDER BY sume) AS subquery  WHERE 1";
        $count=Yii::$app->db->createCommand($sql1,[':status' => 1])->queryScalar();
        $sql2= "SELECT user_id, sum(profit) as sume, (SUM(`penetration`)/ COUNT(`penetration`)*100) as penet, ( SUM(`middle_coef`) / COUNT(`middle_coef`))    as mdc, (SUM(`roi`) / COUNT(`roi`)) as ro, created_own 
                        FROM `balancestatistics`  WHERE created_at BETWEEN '{$lastLastWeek}' AND '{$lastWeek}' GROUP BY user_id ORDER BY sume DESC ";

        $sql2= "SELECT user_id, sum(profit) as sume, (SUM(`penetration`)/ COUNT(`penetration`)*100) as penet, ( SUM(`middle_coef`) / COUNT(`middle_coef`))    as mdc, (SUM(`roi`) / COUNT(`roi`)) as ro, created_own 
                        FROM `balancestatistics`  WHERE created_own BETWEEN '{$lastLastWeek}' AND '{$lastWeek}' GROUP BY user_id ORDER BY sume DESC ";
    }

    // var_dump($sql2); die();
        $dataProvider = new SqlDataProvider([
            'sql' =>$sql2,
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
                'pageSize' => 8,
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
     * поиск за неделю с плюсами (плюсы минусы не используются удалить)
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search_custom_last_week_with_plus($params)
    {
//        2020-08-22 01:19:58
        $lastWeek    = date('Y-m-d H:i:s',strtotime('last monday'));
        $lastLastWeek= date('Y-m-d H:i:s',strtotime('last monday -7 days'));
        $offcet_time='-31 days';
        $lastWeek    = date('Y-m-d H:i:s');
        if(!empty($params['period']) and  ($params['period']==ConstantsHelper::PERIOD_3_M or $params['period']==ConstantsHelper::PERIOD_ALL) ){
            if($params['period']==ConstantsHelper::PERIOD_3_M){
                $offcet_time='-93 days';
            }elseif ($params['period']==ConstantsHelper::PERIOD_ALL) {
                $offcet_time='-36000 days';
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
     * поиск  плюс минус
     * @return ActiveDataProvider
     */
    public static function getUserCountPlusMinusByPeriod($user_id,$params)
    {
//        2020-08-22 01:19:58
        $lastWeek    = date('Y-m-d H:i:s',strtotime('last monday'));
        $lastLastWeek= date('Y-m-d H:i:s',strtotime('last monday -7 days'));
        $offcet_time='-31 days';
        $lastWeek    = date('Y-m-d H:i:s');
        if(!empty($params['period']) and  ($params['period']==ConstantsHelper::PERIOD_3_M or $params['period']==ConstantsHelper::PERIOD_ALL) ){
            if($params['period']==ConstantsHelper::PERIOD_3_M){
                $offcet_time='-93 days';
            }elseif ($params['period']==ConstantsHelper::PERIOD_ALL) {
                $offcet_time='-36000 days';
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


    public static function generateLastWeekParams()
    {
        $lastWeek    = date('Y-m-d H:i:s');
//      $lastLastWeek= date('Y-m-d H:i:s',strtotime('-10 year')); // default
        $lastLastWeek= date('Y-m-d H:i:s',strtotime('-31 day')); // default
        if(  Yii::$app->request->get('period')=='all') $lastLastWeek= date('Y-m-d H:i:s',strtotime('-10 year'));
        if(  Yii::$app->request->get('period')=='3m') $lastLastWeek= date('Y-m-d H:i:s',strtotime('-93 day'));
        return ['lastWeek'=>$lastWeek,'lastLastWeek'=>$lastLastWeek];
//                                                     yii::error(['rr',Yii::$app->request->get('period')]);
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


    public function getCountminusperiod($uid)
    {


        $notEntered=Wager::STATUS_NOT_ENTERD;
         $r= Yii::$app->db->createCommand("SELECT count(id) FROM `wager` WHERE `user_id`={$uid}  AND `status` = {$notEntered};")->queryScalar();
         return $r;
//         ConstantsHelper::LOST_TIME_HOURS_NOT_CONFIRM;
//        return 77;
    }


}
