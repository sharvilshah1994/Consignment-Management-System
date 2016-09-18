<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "financial_year".
 *
 * @property integer $ID
 * @property string $Select_year
 * @property string $startdate
 * @property string $enddate
 */
class FinancialYear extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'financial_year';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['startdate', 'enddate'], 'safe'],
            [['Select_year'], 'string', 'max' => 9]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Select_year' => 'Select Year',
            'startdate' => 'Startdate',
            'enddate' => 'Enddate',
        ];
    }
}
