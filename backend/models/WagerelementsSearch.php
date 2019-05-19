<?php

namespace app\models;

use common\models\helpers\ConstantsHelper;
use common\models\Wager;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Wagerelements;

/**
 * WagerelementsSearch represents the model behind the search form of `common\models\Wagerelements`.
 */
class WagerelementsSearch extends Wagerelements
{

    public $count;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'wager_id', 'sport_id', 'status','count'], 'integer'],
            [['coef'], 'number'],
            [['event_id', 'outcome_id', 'sport_name', 'country_id', 'country_name', 'category_id', 'category_name', 'sub_category_id', 'sub_category_name', 'name', 'info_main_cat_name', 'info_name', 'info_name_full', 'info_cat_name', 'created_at'], 'safe'],
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
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Wagerelements::find();

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
            'wager_id' => $this->wager_id,
            'coef' => $this->coef,
            'sport_id' => $this->sport_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'event_id', $this->event_id])
            ->andFilterWhere(['like', 'outcome_id', $this->outcome_id])
            ->andFilterWhere(['like', 'sport_name', $this->sport_name])
            ->andFilterWhere(['like', 'country_id', $this->country_id])
            ->andFilterWhere(['like', 'country_name', $this->country_name])
            ->andFilterWhere(['like', 'category_id', $this->category_id])
            ->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'sub_category_id', $this->sub_category_id])
            ->andFilterWhere(['like', 'sub_category_name', $this->sub_category_name])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'info_main_cat_name', $this->info_main_cat_name])
            ->andFilterWhere(['like', 'info_name', $this->info_name])
            ->andFilterWhere(['like', 'info_name_full', $this->info_name_full])
            ->andFilterWhere(['like', 'info_cat_name', $this->info_cat_name]);

        return $dataProvider;
    }

    /**
     * для обычных ставок
     * Creates data provider instance with search query applied
     * SELECT * FROM `wagerelements` INNER JOIN wager on wager.id=wagerelements.wager_id WHERE wager.status=1 GROUP by wagerelements.event_id
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchGroup($params)
    {
        $query = Wagerelements::find();

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

        $query->joinWith('wager');

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'wager_id' => $this->wager_id,
            'coef' => $this->coef,
            'sport_id' => $this->sport_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
        ]);


//        $query->andFilterWhere(['like', 'event_id', $this->event_id])
//            ->andFilterWhere(['like', 'outcome_id', $this->outcome_id])
          $query->andFilterWhere(['like', 'sport_name', $this->sport_name])
           // ограничение на будущие игры что еше не начались.
//            ->andFilterWhere(['like', 'country_id', $this->country_id])
            ->andFilterWhere(['like', 'country_name', $this->country_name])
            ->andFilterWhere(['like', 'category_id', $this->category_id])
            ->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'sub_category_id', $this->sub_category_id])
            ->andFilterWhere(['like', 'sub_category_name', $this->sub_category_name])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'info_main_cat_name', $this->info_main_cat_name])
            ->andFilterWhere(['like', 'info_name', $this->info_name])
            ->andFilterWhere(['like', 'info_name_full', $this->info_name_full])
            ->andFilterWhere(['like', 'info_cat_name', $this->info_cat_name]);


          // проверка

        if(1){
            $nextWeek = time() - (ConstantsHelper::LOST_TIME_HOURS_NOT_CONFIRM * 60 * 60);   // 4*60*60    - 4 часа

            $query->andFilterWhere(['<', 'startgame', $nextWeek]);
        }

 //      проверка

        //   $query->andFilterWhere(['=','wager.status', Wager::STATUS_OPEN]);
        $query->andFilterWhere(['=','wager.status', Wager::STATUS_MANUAL_BET]);
        $query->groupBy(['event_id']);


        return $dataProvider;
    }



    // для потеряных ставок
    public function searchGroupLost($params)
    {
        $query = Wagerelements::find();

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

        $query->joinWith('wager');

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'wager_id' => $this->wager_id,
            'coef' => $this->coef,
            'sport_id' => $this->sport_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
        ]);


//        $query->andFilterWhere(['like', 'event_id', $this->event_id])
//            ->andFilterWhere(['like', 'outcome_id', $this->outcome_id])
        $query->andFilterWhere(['like', 'sport_name', $this->sport_name])
//            ->andFilterWhere(['like', 'country_id', $this->country_id])
            ->andFilterWhere(['like', 'country_name', $this->country_name])
            ->andFilterWhere(['like', 'category_id', $this->category_id])
            ->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'sub_category_id', $this->sub_category_id])
            ->andFilterWhere(['like', 'sub_category_name', $this->sub_category_name])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'info_main_cat_name', $this->info_main_cat_name])
            ->andFilterWhere(['like', 'info_name', $this->info_name])
            ->andFilterWhere(['like', 'info_name_full', $this->info_name_full])
            ->andFilterWhere(['like', 'info_cat_name', $this->info_cat_name]);

        //   $query->andFilterWhere(['=','wager.status', Wager::STATUS_OPEN]);
//        $query->andFilterWhere(['=','wager.status', Wager::STATUS_MANUAL_BET]);
        $nextWeek = time() - (ConstantsHelper::LOST_TIME_HOURS_NOT_CONFIRM * 60 * 60);   // 4*60*60    - 4 часа

        $query->andFilterWhere(['<', 'startgame', $nextWeek]);
        $query->andFilterWhere(['=','wager.status', Wager::STATUS_NEW]);
        $query->groupBy(['event_id']);


        return $dataProvider;
    }

}
