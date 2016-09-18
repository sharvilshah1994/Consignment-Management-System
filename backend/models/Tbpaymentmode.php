<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbpaymentmode".
 *
 * @property integer $ID
 * @property string $PAYTERM
 * @property string $PAYTERMFULL
 * @property string $PAY_CLAUSE
 */
class Tbpaymentmode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbpaymentmode';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PAY_CLAUSE'], 'string'],
            [['PAYTERM'], 'string', 'max' => 10],
            [['PAYTERMFULL'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'PAYTERM' => 'Payterm',
            'PAYTERMFULL' => 'Paytermfull',
            'PAY_CLAUSE' => 'Pay  Clause',
        ];
    }
}
