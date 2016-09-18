<?php

namespace backend\models;

use yii\base\Model;

use Yii;

/**
 * This is the model class for table "Warehouse_charges".
 *
 * @property string $Select_year
 * @property integer $Consignment_no
 * @property integer $Warehouse_charges
 */
class WarehouseCharges extends Model
{
    /**
     * @inheritdoc
     */
//    public static function tableName()
//    {
//        return 'Warehouse_charges';
//    }
    public $Select_year;
    public $CONSIGNMENTNO;
    public $WAREHOUSE_CHARGE;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Select_year', 'CONSIGNMENTNO', 'WAREHOUSE_CHARGE'], 'required','message'=>''],
            [['Select_year'], 'string','message'=>''],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Select_year' => 'Select Year',
            'CONSIGNMENTNO' => 'Consignment No',
            'WAREHOUSE_CHARGE' => 'Warehouse Charges',
        ];
    }
}
