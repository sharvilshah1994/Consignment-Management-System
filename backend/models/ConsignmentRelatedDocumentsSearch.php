<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ConsignmentRelatedDocuments;

/**
 * ConsignmentRelatedDocumentsSearch represents the model behind the search form about `backend\models\ConsignmentRelatedDocuments`.
 */
class ConsignmentRelatedDocumentsSearch extends ConsignmentRelatedDocuments
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Select_year', 'Consignment_no', 'CHA_Authorisation_letter', 'DEC_Letter_General', 'DEC_Covering_Letter', 'DEC_letter_Payload', 'RD_Letter', 'FF_Payment_Note', 'Delivery_order', 'Freight_certificate', 'Consignment_covering_letter', 'CERTIFICATE', 'DECLARATION', 'ANNEXURE_1', 'Custom_duty_challan', 'Authorisation_letter_of_CHA', 'Payment_note_for_wh_charge', 'Mumabi_octroi', 'Select_signatory'], 'safe'],
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
        $query = ConsignmentRelatedDocuments::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'Select_year', $this->Select_year])
            ->andFilterWhere(['like', 'Consignment_no', $this->Consignment_no])
            ->andFilterWhere(['like', 'CHA_Authorisation_letter', $this->CHA_Authorisation_letter])
            ->andFilterWhere(['like', 'DEC_Letter_General', $this->DEC_Letter_General])
            ->andFilterWhere(['like', 'DEC_Covering_Letter', $this->DEC_Covering_Letter])
            ->andFilterWhere(['like', 'DEC_letter_Payload', $this->DEC_letter_Payload])
            ->andFilterWhere(['like', 'RD_Letter', $this->RD_Letter])
            ->andFilterWhere(['like', 'FF_Payment_Note', $this->FF_Payment_Note])
            ->andFilterWhere(['like', 'Delivery_order', $this->Delivery_order])
            ->andFilterWhere(['like', 'Freight_certificate', $this->Freight_certificate])
            ->andFilterWhere(['like', 'Consignment_covering_letter', $this->Consignment_covering_letter])
            ->andFilterWhere(['like', 'CERTIFICATE', $this->CERTIFICATE])
            ->andFilterWhere(['like', 'DECLARATION', $this->DECLARATION])
            ->andFilterWhere(['like', 'ANNEXURE_1', $this->ANNEXURE_1])
            ->andFilterWhere(['like', 'Custom_duty_challan', $this->Custom_duty_challan])
            ->andFilterWhere(['like', 'Authorisation_letter_of_CHA', $this->Authorisation_letter_of_CHA])
            ->andFilterWhere(['like', 'Payment_note_for_wh_charge', $this->Payment_note_for_wh_charge])
            ->andFilterWhere(['like', 'Mumabi_octroi', $this->Mumabi_octroi])
            ->andFilterWhere(['like', 'Select_signatory', $this->Select_signatory]);

        return $dataProvider;
    }
}
