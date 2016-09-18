<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\CustomDuty;

/**
 * CustomSearch represents the model behind the search form about `backend\models\CustomDuty`.
 */
class CustomSearch extends CustomDuty
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Select_year'], 'safe'],
            [['Consignment_no', 'Custom_duty'], 'integer'],
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
        $query = CustomDuty::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'Consignment_no' => $this->Consignment_no,
            'Custom_duty' => $this->Custom_duty,
        ]);

        $query->andFilterWhere(['like', 'Select_year', $this->Select_year]);

        return $dataProvider;
    }
}
