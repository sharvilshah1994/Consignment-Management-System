<?php

namespace backend\models;
use yii\base\Model;
use Yii;

/**
 * This is the model class for table "lc_paymentnote".
 *
 * @property string $Select_PONO
 * @property string $COWAA_LCNO
 * @property string $Item_Description
 * @property string $Invocie_no
 * @property string $Invoice_date
 * @property string $Signatory
 * @property string $LC_Application
 * @property string $Payment_Note
 * @property string $Form_A1
 */
class LcPaymentnote extends Model
{
    /**
     * @inheritdoc
     */
//    public static function tableName()
//    {
//        return 'lc_paymentnote';
//    }
    public $Select_PONO;
    public $COWAA_LCNO;
    public $Item_Description;
    public $Invoice_no;
    public $Invoice_date;
    public $Signatory;
    public $LC_Application;
    public $Payment_Note;
    public $Form_A1;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            
            [['Select_PONO', 'COWAA_LCNO', 'Item_Description', 'Invocie_no', 'Invoice_date', 'Signatory', 'LC_Application', 'Payment_Note', 'Form_A1'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Select_PONO' => 'Select  Pono',
            'COWAA_LCNO' => 'Cowaa  Lcno',
            'Item_Description' => 'Item  Description',
            'Invoice_no' => 'Invocie No',
            'Invoice_date' => 'Invoice Date',
            'Signatory' => 'Signatory',
            'LC_Application' => 'Lc  Application',
            'Payment_Note' => 'Payment  Note',
            'Form_A1' => 'Form  A1',
        ];
    }
}
