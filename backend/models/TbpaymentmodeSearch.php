<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tbpaymentmode;

/**
 * TbpaymentmodeSearch represents the model behind the search form about `backend\models\Tbpaymentmode`.
 */
class TbpaymentmodeSearch extends Tbpaymentmode
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID'], 'integer'],
            [['PAYTERM', 'PAYTERMFULL', 'PAY_CLAUSE'], 'safe'],
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
        $query = Tbpaymentmode::find();

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
            'ID' => $this->ID,
        ]);

        $query->andFilterWhere(['like', 'PAYTERM', $this->PAYTERM])
            ->andFilterWhere(['like', 'PAYTERMFULL', $this->PAYTERMFULL])
            ->andFilterWhere(['like', 'PAY_CLAUSE', $this->PAY_CLAUSE]);

        return $dataProvider;
    }
}
