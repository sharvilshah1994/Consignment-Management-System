<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\CustomDuty;

/**
 * CustomDutySearch represents the model behind the search form about `backend\models\CustomDuty`.
 */
class CustomDutySearch extends CustomDuty
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Select_year', 'CONSIGNMENTNO'], 'safe'],
            [['CUSTOMDUTY'], 'integer'],
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
            'CUSTOMDUTY' => $this->CUSTOMDUTY,
        ]);

        $query->andFilterWhere(['like', 'Select_year', $this->Select_year])
            ->andFilterWhere(['like', 'CONSIGNMENTNO', $this->CONSIGNMENTNO]);

        return $dataProvider;
    }
}
