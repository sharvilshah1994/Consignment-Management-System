<?php

namespace backend\models;
use yii\base\Model;
use Yii;

/**
 * This is the model class for table "advance_payment".
 *
 * @property string $Select_PONO
 * @property string $Item_Description
 * @property string $Select_Signatory
 * @property string $Advance_Payment
 * @property string $Lack_of_competition
 */
class AdvancePayment extends Model
{
    /**
     * @inheritdoc
     */
//    public static function tableName()
//    {
//        return 'advance_payment';
//    }
    public $Select_PONO;
    public $Item_Description;
    public $Select_Signatory;
    public $Advance_Payment;
    public $Lack_of_competition;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Select_PONO', 'Item_Description', 'Select_Signatory', 'Advance_Payment', 'Lack_of_competition'], 'required'],
            [['Select_PONO', 'Item_Description', 'Select_Signatory', 'Advance_Payment', 'Lack_of_competition'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Select_PONO' => 'Select  Pono',
            'Item_Description' => 'Item  Description',
            'Select_Signatory' => 'Select  Signatory',
            'Advance_Payment' => 'Advance  Payment',
            'Lack_of_competition' => 'Lack Of Competition',
        ];
    }
}
