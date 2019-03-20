<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Popularwiget;

/**
 * PopularwigetSearch represents the model behind the search form of `common\models\Popularwiget`.
 */
class PopularwigetSearch extends Popularwiget
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'logo', 'sort', 'status', 'count'], 'integer'],
            [['sportname', 'turnirename', 'turnireid'], 'safe'],
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
        $query = Popularwiget::find();

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
            'logo' => $this->logo,
            'sort' => $this->sort,
            'status' => $this->status,
            'count' => $this->count,
        ]);

        $query->andFilterWhere(['like', 'sportname', $this->sportname])
            ->andFilterWhere(['like', 'turnirename', $this->turnirename])
            ->andFilterWhere(['like', 'turnireid', $this->turnireid]);

        return $dataProvider;
    }
}
