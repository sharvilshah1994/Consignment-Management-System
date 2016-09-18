<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "consignment".
 *
 * @property string $CONSIGNMENTID
 * @property string $CONSIGNMENTNO
 * @property string $CONS_DATE
 * @property string $PONO
 * @property string $PODATE
 * @property string $VENDORNAME
 * @property string $AGENTCODE
 * @property string $AGENTNAME
 * @property string $VENDORADD
 * @property string $VENDORCOUNTRY
 * @property string $ORIGIN
 * @property string $AGENTADD
 * @property string $SHIPPING_COMP
 * @property string $SHIP_AG_CITY
 * @property string $WAREHOUSE_CHARGE
 * @property string $FREIGHT
 * @property string $ITEM_DESC
 * @property string $NOOFPACK
 * @property string $MAWB
 * @property string $HAWB
 * @property string $SAWB
 * @property string $LCNO
 * @property string $LCDATE
 * @property string $STATUS
 * @property string $INVOICENO
 * @property string $INVOICEDATE
 * @property string $CURRENCY
 * @property string $INVOICEVALUE
 * @property string $ACTUAL_COST
 * @property string $IGMNO
 * @property string $PORT_OF_SHIPMENT
 * @property string $DELIVERYTERM
 * @property string $PTCODE
 * @property string $NATURE_OF_TRANS
 * @property string $CARGO_OF
 * @property string $OTHERPAYMENT
 * @property string $OTP_PAYABLETO
 * @property string $CUSTOMDUTY
 * @property string $FREIGHTWRD
 * @property string $PAYROLL
 * @property string $CANDATE
 * @property string $FLIGHT_DETAILS
 * @property string $CHA_BILL_DETAILS
 * @property string $CHA_BILL_AMOUNT
 * @property string $BOENO
 * @property string $BOEDATE
 */
class Consignment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_consignment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CONSIGNMENTID'], 'required','message'=>''],
            [['CONS_DATE', 'PODATE', 'LCDATE', 'INVOICEDATE', 'CANDATE', 'BOEDATE'], 'safe','message'=>''],
            [['WAREHOUSE_CHARGE', 'FREIGHT', 'INVOICEVALUE', 'ACTUAL_COST', 'OTHERPAYMENT', 'CUSTOMDUTY', 'CHA_BILL_AMOUNT'], 'number','message'=>''],
            [['CONSIGNMENTID', 'AGENTCODE'], 'string', 'max' => 6,'message'=>''],
            [['CONSIGNMENTNO', 'STATUS'], 'string', 'max' => 4,'message'=>''],
            [['PONO', 'FLIGHT_DETAILS'], 'string', 'max' => 30,'message'=>''],
            [['VENDORNAME', 'AGENTNAME', 'VENDORCOUNTRY', 'ORIGIN', 'SHIPPING_COMP', 'SHIP_AG_CITY', 'MAWB', 'HAWB', 'SAWB', 'LCNO', 'CURRENCY', 'IGMNO', 'PORT_OF_SHIPMENT', 'NATURE_OF_TRANS', 'OTP_PAYABLETO'], 'string', 'max' => 50,'message'=>''],
            [['VENDORADD', 'AGENTADD'], 'string', 'max' => 200,'message'=>''],
            [['ITEM_DESC'], 'string', 'max' => 500,'message'=>''],
            [['NOOFPACK'], 'string', 'max' => 20,'message'=>''],
            [['INVOICENO', 'CARGO_OF', 'FREIGHTWRD', 'CHA_BILL_DETAILS'], 'string', 'max' => 80,'message'=>''],
            [['DELIVERYTERM'], 'string', 'max' => 150,'message'=>''],
            [['PTCODE'], 'string', 'max' => 100,'message'=>''],
            [['PAYROLL'], 'string', 'max' => 7,'message'=>''],
            [['BOENO'], 'string', 'max' => 25,'message'=>''],
            [['PONO'], 'unique','message'=>'']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CONSIGNMENTID' => 'Consignmentid',
            'CONSIGNMENTNO' => 'Consignmentno',
            'CONS_DATE' => 'Cons Date',
            'PONO' => 'Pono',
            'PODATE' => 'Podate',
            'VENDORNAME' => 'Vendor name',
            'AGENTCODE' => 'Agentcode',
            'AGENTNAME' => 'Agentname',
            'VENDORADD' => 'Vendor address',
            'VENDORCOUNTRY' => 'Vendor country',
            'ORIGIN' => 'Origin',
            'AGENTADD' => 'Agent address',
            'SHIPPING_COMP' => 'Shipping  agency',
            'SHIP_AG_CITY' => 'City',
            'WAREHOUSE_CHARGE' => 'Warehouse  Charge',
            'FREIGHT' => 'Freight',
            'ITEM_DESC' => 'Item Desc',
            'NOOFPACK' => 'No of pack',
            'MAWB' => 'Mawb',
            'HAWB' => 'Hawb',
            'SAWB' => 'Sawb',
            'LCNO' => 'Lcno',
            'LCDATE' => 'Lcdate',
            'STATUS' => 'Status',
            'INVOICENO' => 'Invoice no',
            'INVOICEDATE' => 'Invoice date',
            'CURRENCY' => 'Currency',
            'INVOICEVALUE' => 'Invoice value',
            'ACTUAL_COST' => 'Actual Cost',
            'IGMNO' => 'Igmno',
            'PORT_OF_SHIPMENT' => 'Port',
            'DELIVERYTERM' => 'Delivery term',
            'PTCODE' => 'Payment term',
            'NATURE_OF_TRANS' => 'Transaction',
            'CARGO_OF' => 'Cargo arrival',
            'OTHERPAYMENT' => 'Other payment',
            'OTP_PAYABLETO' => 'payment m/s',
            'CUSTOMDUTY' => 'Custom duty',
            'FREIGHTWRD' => 'Freightwrd',
            'PAYROLL' => 'Payroll',
            'CANDATE' => 'Candate',
            'FLIGHT_DETAILS' => 'Flight  Details',
            'CHA_BILL_DETAILS' => 'Cha  Bill  Details',
            'CHA_BILL_AMOUNT' => 'Cha  Bill  Amount',
            'BOENO' => 'Boeno',
            'BOEDATE' => 'Boedate',
        ];
    }
}
