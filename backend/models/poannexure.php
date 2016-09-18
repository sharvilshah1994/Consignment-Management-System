<?php

namespace backend\models;
use yii\base\Model;
use Yii;

/**
 * This is the model class for table "poannexure".
 *
 * @property string $Select_PONO
 * @property string $Vendor_Country
 * @property string $Indent
 * @property string $Indent_Date
 * @property string $Minute_No
 */
class poannexure extends Model
{
    /**
     * @inheritdoc
     */
//    public static function tableName()
//    {
//        return 'poannexure';
//    }
    public $Select_PONO;
    public $Vendor_Country;
    public $Indent;
    public $Indent_Date;
    public $Minute_No;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Select_PONO', 'Vendor_Country', 'Indent', 'Indent_Date', 'Minute_No'], 'required'],
            [['Select_PONO', 'Vendor_Country', 'Indent'], 'string', 'max' => 200],
            [['Indent_Date'], 'string', 'max' => 10],
            [['Minute_No'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Select_PONO' => 'Select  Pono',
            'Vendor_Country' => 'Vendor  Country',
            'Indent' => 'Indent',
            'Indent_Date' => 'Indent  Date',
            'Minute_No' => 'Minute  No',
        ];
    }
}
