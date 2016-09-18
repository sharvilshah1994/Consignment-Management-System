<?php

namespace backend\models;

use yii\base\Model;

use Yii;

/**
 * This is the model class for table "Consignment_Related_Documents".
 *
 * @property string $Select_year
 * @property string $Consignment_no
 * @property string $CHA_Authorisation_letter
 * @property string $DEC_Letter_General
 * @property string $DEC_Covering_Letter
 * @property string $DEC_letter_Payload
 * @property string $RD_Letter
 * @property string $FF_Payment_Note
 * @property string $Delivery_order
 * @property string $Freight_certificate
 * @property string $Consignment_covering_letter
 * @property string $CERTIFICATE
 * @property string $DECLARATION
 * @property string $ANNEXURE_1
 * @property string $Custom_duty_challan
 * @property string $Authorisation_letter_of_CHA
 * @property string $Payment_note_for_wh_charge
 * @property string $Mumabi_octroi
 * @property string $Select_signatory
 */
class ConsignmentRelatedDocuments extends Model
{
    /**
     * @inheritdoc
     */
    public $Select_year;
    public $Consignment_no;
    public $CHA_Authorisation_letter;
    public $DEC_Letter_General;
    public $DEC_Covering_Letter;
    public $DEC_letter_Payload;
    public $RD_Letter;
    public $FF_Payment_Note;
    public $Delivery_order;
    public $Freight_certificate;
    public $Consignment_covering_letter;
    public $CERTIFICATE;
    public $DECLARATION;
    public $ANNEXURE_1;
    public $Custom_duty_challan;
    public $Authorisation_letter_of_CHA;
    public $Payment_note_for_wh_charge;
    public $Mumabi_octroi;
    public $Select_signatory;
    
    
    

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Select_year', 'Consignment_no', 'CHA_Authorisation_letter', 'DEC_Letter_General', 'DEC_Covering_Letter', 'DEC_letter_Payload', 'RD_Letter', 'FF_Payment_Note', 'Delivery_order', 'Freight_certificate', 'Consignment_covering_letter', 'CERTIFICATE', 'DECLARATION', 'ANNEXURE_1', 'Custom_duty_challan', 'Authorisation_letter_of_CHA', 'Payment_note_for_wh_charge', 'Mumabi_octroi', 'Select_signatory'], 'required'],
            [['Select_year', 'Consignment_no', 'CHA_Authorisation_letter', 'DEC_Letter_General', 'DEC_Covering_Letter', 'DEC_letter_Payload', 'RD_Letter', 'FF_Payment_Note', 'Delivery_order', 'Freight_certificate', 'Consignment_covering_letter', 'CERTIFICATE', 'DECLARATION', 'ANNEXURE_1', 'Custom_duty_challan', 'Authorisation_letter_of_CHA', 'Payment_note_for_wh_charge', 'Mumabi_octroi', 'Select_signatory'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Select_year' => 'Select Year',
            'Consignment_no' => 'Consignment No',
            'CHA_Authorisation_letter' => 'Cha  Authorisation Letter',
            'DEC_Letter_General' => 'Dec  Letter  General',
            'DEC_Covering_Letter' => 'Dec  Covering  Letter',
            'DEC_letter_Payload' => 'Dec Letter  Payload',
            'RD_Letter' => 'Rd  Letter',
            'FF_Payment_Note' => 'Ff  Payment  Note',
            'Delivery_order' => 'Delivery Order',
            'Freight_certificate' => 'Freight Certificate',
            'Consignment_covering_letter' => 'Consignment Covering Letter',
            'CERTIFICATE' => 'Certificate',
            'DECLARATION' => 'Declaration',
            'ANNEXURE_1' => 'Annexure 1',
            'Custom_duty_challan' => 'Custom Duty Challan',
            'Authorisation_letter_of_CHA' => 'Authorisation Letter Of  Cha',
            'Payment_note_for_wh_charge' => 'Payment Note For Wh Charge',
            'Mumabi_octroi' => 'Mumabi Octroi',
            'Select_signatory' => 'Select Signatory',
        ];
    }
}
