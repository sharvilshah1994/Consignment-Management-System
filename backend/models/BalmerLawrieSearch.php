<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\BalmerLawrie;

/**
 * BalmerLawrieSearch represents the model behind the search form about `backend\models\BalmerLawrie`.
 */
class BalmerLawrieSearch extends BalmerLawrie
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SNO', 'COUNTRY', 'NAME', 'ADDRESS', 'CP1', 'CP2', 'TEL', 'FAX', 'FFEMAIL'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = BalmerLawrie::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'SNO', $this->SNO])
            ->andFilterWhere(['like', 'COUNTRY', $this->COUNTRY])
            ->andFilterWhere(['like', 'NAME', $this->NAME])
            ->andFilterWhere(['like', 'ADDRESS', $this->ADDRESS])
            ->andFilterWhere(['like', 'CP1', $this->CP1])
            ->andFilterWhere(['like', 'CP2', $this->CP2])
            ->andFilterWhere(['like', 'TEL', $this->TEL])
            ->andFilterWhere(['like', 'FAX', $this->FAX])
            ->andFilterWhere(['like', 'FFEMAIL', $this->FFEMAIL]);

        return $dataProvider;
    }
}
