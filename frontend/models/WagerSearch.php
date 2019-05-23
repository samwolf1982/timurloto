<?php

namespace app\models;

use common\models\helpers\ConstantsHelper;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Wager;
use yii\data\Pagination;

/**
 * WagerSearch represents the model behind the search form of `common\models\Wager`.
 */
class WagerSearch extends Wager
{

    public $pages;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'playlist_id', 'status'], 'integer'],
            [['total', 'coef'], 'number'],
            [['comment'], 'safe'],
        ];
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
     * @param $params
     * @param null $pageSize   // размер на странице
     * @return array|ActiveDataProvider|\yii\db\ActiveRecord[]
     */
    public function searchWithPagination($params, $pageSize=30)
    {

        yii::error($params);
        $offsetPage=0;
        if (!empty($params->page)) {
            $offsetPage=$params->page;
        }






        $query = Wager::find();
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=>array(
                'defaultOrder'=>['id' => SORT_DESC],
            ),
//            'totalCount' => 3,
//            'pagination' => [
//                'pageSize' => 2,
//            ]
        ]);

        $this->load($params);
        if (!empty($params['playlist'])) {
            $this->playlist_id=(integer)$params['playlist'];
        }
        if (!empty($params['user_id'])) {
            $this->user_id=(integer)$params['user_id'];
        }


        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'playlist_id' => $this->playlist_id,
            'total' => $this->total,
            'coef' => $this->coef,
            'status' => $this->status,
        ]);




        if (!empty($params['level']) && $params['level']=='pro' ) {  // for PRO
            $query->innerJoin('balance_score','wager.user_id =balance_score.user_id');

          //  $proBalance=140*100000/100;
            $proBalance=140000;
            //$query->andFilterWhere(['>', 'balance_score.balance', ((2*ConstantsHelper::DEFAULT_USER_CALCULATE_BALANCE_FOR_LEVEL)-1) ]); // balance_score.balance > 180000
            $query->andFilterWhere(['>', 'balance_score.balance', $proBalance ]); // balance_score.balance > 180000

        }



            if (!empty($params['play-period'])) {
                $lasrPeriod=(integer)$params['play-period'];
                $lasrPeriod =  date("Y-m-d H:i:s",strtotime("-".$lasrPeriod." month"));
                $query->andFilterWhere(['>','created_at', $lasrPeriod ]);
            }



        $countQuery = clone $query;
        $this->pages = new Pagination(['totalCount' => $countQuery->count(),'pageSize'=>$pageSize]);
        $models = $query->orderBy(['id'=>SORT_DESC])-> offset($this->pages->offset)->limit($this->pages->limit)->all();

        return $models;

    }


    /**
     * поиск следующих
     * @param $params
     * @param null $pageSize   //
     * @return array|ActiveDataProvider|\yii\db\ActiveRecord[]
     */
    public function searchNextElements($params, $pageSize=30)
    {


        $offsetElements=ConstantsHelper::COUNT_LOAD_NEXT_IN_BET;
        if (!empty($params['offset'])) {
            $offsetElements=$params['offset'];
        }




        $query = Wager::find()->offset($offsetElements);
        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=>array(
                'defaultOrder'=>['id' => SORT_DESC],
            ),
//            'totalCount' => 3,
//            'pagination' => [
//                'pageSize' => 2,
//            ]
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
            'playlist_id' => $this->playlist_id,
            'total' => $this->total,
            'coef' => $this->coef,
            'status' => $this->status,
        ]);

        $post_level=Yii::$app->request->post('level');
        if (!empty($post_level) &&$post_level=='pro' ) {  // for PRO
            $query->innerJoin('balance_score','wager.user_id =balance_score.user_id');
            //  $proBalance=140*100000/100;
            $proBalance=140000;
            $query->andFilterWhere(['>', 'balance_score.balance', $proBalance ]); // balance_score.balance > 180000
        }





        $countQuery = clone $query;
        $this->pages = new Pagination(['totalCount' => $countQuery->count(),'pageSize'=>$pageSize]);
        $models = $query->orderBy(['id'=>SORT_DESC])-> offset($offsetElements)->limit($this->pages->limit)->all();
//        $models = $query->orderBy(['id'=>SORT_DESC])-> offset($this->pages->offset)->limit($this->pages->limit)->all();

        return $models;

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
        $query = Wager::find();
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=>array(
                'defaultOrder'=>['id' => SORT_DESC],
            ),
//            'totalCount' => 3,
            'pagination' => [
                'pageSize' => 3,
            ]
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
            'playlist_id' => $this->playlist_id,
            'total' => $this->total,
            'coef' => $this->coef,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'comment', $this->comment]);


        $countQuery = clone $query;
        $this->pages = new Pagination(['totalCount' => $countQuery->count()]);

//        $models = $query->offset($pages->offset)
//            ->limit($pages->limit)
//            ->all();


        return $dataProvider;
    }




    /**
     * @return mixed
     */
    public function getPages()
    {
        return $this->pages;

    }
}
