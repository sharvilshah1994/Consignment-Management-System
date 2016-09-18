<?php

namespace backend\models;

use yii\base\Model;


use Yii;

/**
 * This is the model class for table "custom_duty".
 *
 * @property string $Select_year
 * @property string $CONSIGNMENTNO
 * @property integer $CUSTOMDUTY
 */

class CustomDuty extends Model
{
    /**
     * @inheritdoc
     */
//    public static function tableName()
//    {
//        return 'custom_duty';
//    }

    /**
     * @inheritdoc
     */
    public $Select_year;
    public $CONSIGNMENTNO;
    public $CUSTOMDUTY;
    
    
    public function rules()
    {
        return [
            [['Select_year', 'CONSIGNMENTNO', 'CUSTOMDUTY'], 'required'],
            [['Select_year'], 'string'],
            
            [['CONSIGNMENTNO'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Select_year' => 'Select Year',
            'CONSIGNMENTNO' => 'Consignmentno',
            'CUSTOMDUTY' => 'Customduty',
        ];
    }
}
