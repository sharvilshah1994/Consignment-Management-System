<?php

namespace backend\models;
use yii\base\Model;
use Yii;

/**
 * This is the model class for table "poprint".
 *
 * @property string $AGAINST_FE
 * @property string $SELECT_PO_NO
 * @property string $ENQUIRY_NO
 * @property string $ENQUIRY_DATE
 */
class poprint extends Model
{
    /**
     * @inheritdoc
     */
//    public static function tableName()
//    {
//        return 'poprint';
//    }
    public $AGAINST_FE;
    public $SELECT_PO_NO;
    public $ENQUIRY_NO;
    public $ENQUIRY_DATE;
    

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['AGAINST_FE', 'SELECT_PO_NO', 'ENQUIRY_NO', 'ENQUIRY_DATE'], 'required'],
            [['AGAINST_FE', 'SELECT_PO_NO', 'ENQUIRY_NO', 'ENQUIRY_DATE'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'AGAINST_FE' => 'Against  Fe',
            'SELECT_PO_NO' => 'Select  Po  No',
            'ENQUIRY_NO' => 'Enquiry  No',
            'ENQUIRY_DATE' => 'Enquiry  Date',
        ];
    }
}
