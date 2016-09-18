<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Consignment;

/**
 * ConsignmentSearch represents the model behind the search form about `backend\models\Consignment`.
 */
class ConsignmentSearch extends Consignment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'INVOICENO', 'INVOICEVALUE', 'ACTUAL_COST', 'IGMNO', 'OTHERPAYMENT', 'OTP_PAYABLETO', 'CUSTOMDUTY'], 'integer'],
            [['CONSIGNMENTID','PONO', 'PODATE', 'VENDORNAME', 'AGENTNAME', 'VENDORADD', 'AGENTADD', 'SHIPPING_COMP', 'SHIP_AG_CITY', 'ITEM_DESC', 'NOOFPACK', 'MAWB', 'HAWB', 'SAWB', 'LCNO', 'INVOICEDATE', 'CURRENCY', 'PORT_OF_SHIPMENT', 'DELIVERYTERM', 'PTCODE', 'NATURE_OF_TRANS', 'CARGO_OF'], 'safe'],
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
        $query = Consignment::find();

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
            'CONSIGNMENTID' => $this->CONSIGNMENTID,
            'CONSIGNMENTNO' => $this->CONSIGNMENTNO,
            'PODATE' => $this->PODATE,
            'INVOICENO' => $this->INVOICENO,
            'INVOICEDATE' => $this->INVOICEDATE,
            'INVOICEVALUE' => $this->INVOICEVALUE,
            'ACTUAL_COST' => $this->ACTUAL_COST,
            'IGMNO' => $this->IGMNO,
            'OTHERPAYMENT' => $this->OTHERPAYMENT,
            'OTP_PAYABLETO' => $this->OTP_PAYABLETO,
            'CUSTOMDUTY' => $this->CUSTOMDUTY,
        ]);

        $query->andFilterWhere(['like', 'PONO', $this->PONO])
            ->andFilterWhere(['like', 'VENDORNAME', $this->VENDORNAME])
            ->andFilterWhere(['like', 'AGENTNAME', $this->AGENTNAME])
            ->andFilterWhere(['like', 'VENDORADD', $this->VENDORADD])
            ->andFilterWhere(['like', 'AGENTADD', $this->AGENTADD])
            ->andFilterWhere(['like', 'SHIPPING_COMP', $this->SHIPPING_COMP])
            ->andFilterWhere(['like', 'SHIP_AG_CITY', $this->SHIP_AG_CITY])
            ->andFilterWhere(['like', 'ITEM_DESC', $this->ITEM_DESC])
            ->andFilterWhere(['like', 'NOOFPACK', $this->NOOFPACK])
            ->andFilterWhere(['like', 'MAWB', $this->MAWB])
            ->andFilterWhere(['like', 'HAWB', $this->HAWB])
            ->andFilterWhere(['like', 'SAWB', $this->SAWB])
            ->andFilterWhere(['like', 'LCNO', $this->LCNO])
            ->andFilterWhere(['like', 'CURRENCY', $this->CURRENCY])
            ->andFilterWhere(['like', 'PORT_OF_SHIPMENT', $this->PORT_OF_SHIPMENT])
            ->andFilterWhere(['like', 'DELIVERYTERM', $this->DELIVERYTERM])
            ->andFilterWhere(['like', 'PTCODE', $this->PTCODE])
            ->andFilterWhere(['like', 'NATURE_OF_TRANS', $this->NATURE_OF_TRANS])
            ->andFilterWhere(['like', 'CARGO_OF', $this->CARGO_OF]);

        return $dataProvider;
    }
}
