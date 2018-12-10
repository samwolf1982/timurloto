<?php

namespace common\models\search;
use common\models\Balancestatistics;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
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
        $sql="SELECT  SUM(profit) as `profit`,SUM(`penetration`)/ COUNT(`penetration`)*100 as `penetration`, SUM(`middle_coef`) / COUNT(`middle_coef`)  as `middle_coef`, SUM(`roi`) / COUNT(`roi`) as `roi` ,SUM(`plus`) as `plus`,SUM(`minus`) as `minus`  FROM `balancestatistics` WHERE user_id = :u_id";
      $result =   yii::$app->db->createCommand($sql, [
            ':u_id' => $user_id,
//        ])->execute();
        ])->queryOne();
        $prepare_result=   ['profit'=> round($result['profit'],2),'penetration'=>round($result['penetration'],2),
            'middle_coef'=>round($result['middle_coef'],2),
            'roi'=>round($result['roi'],2),

            ];
      return    array_merge($result,$prepare_result);   ;
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
