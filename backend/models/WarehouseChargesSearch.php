<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\WarehouseCharges;

/**
 * WarehouseChargesSearch represents the model behind the search form about `backend\models\WarehouseCharges`.
 */
class WarehouseChargesSearch extends WarehouseCharges
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Select_year'], 'safe'],
            [['Consignment_no', 'Warehouse_charges'], 'integer'],
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
        $query = WarehouseCharges::find();

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
            'Warehouse_charges' => $this->Warehouse_charges,
        ]);

        $query->andFilterWhere(['like', 'Select_year', $this->Select_year]);

        return $dataProvider;
    }
}
