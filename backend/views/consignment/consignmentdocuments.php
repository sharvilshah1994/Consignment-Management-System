<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\FinancialYear;
use backend\models\TbSigning;
/* @var $this yii\web\View */
/* @var $model backend\models\ConsignmentRelatedDocuments */
/* @var $form ActiveForm */
?>
<div class="consignmentdocuments">

    <?php $form = ActiveForm::begin(); ?>
    <h1>Generate Consignment Related Documents</h1>
    <?= Html::a(bootui\Html::encode("Go back to main menu"), 'index.php'); ?>
    
        <?= $form->field($model, 'Select_year')->dropDownList(
 ArrayHelper::map(FinancialYear::find()->all(), 'Select_year','Select_year'),
                [
                    'prompt'=>'Please Select Financial Year...',
                    'onchange'=>
                '$.post( "index.php?r=consignment/findconsid&financialyear="+$(this).val(), function( data ) {
                   
                    
                  
                  var info = data.split("~");
                  $.each(info,function(val,text){
                     $( "#consignmentrelateddocuments-consignment_no").append(
                     $("<option></option>").val(text).html(text))});
                });'
                ]
                
                ) ?>
        <?= $form->field($model, 'Consignment_no')->dropDownList(
                ['prompt'=>'Please Select Relevant Consignmentid...']
                ) ?>
    <div width="100%">
        <div style="float:left ; width:50% ">
        <?= $form->field($model, 'CHA_Authorisation_letter')->checkbox() ?>
        </div>
            <div style="float:left ; width:50% ">
        <?= $form->field($model, 'DEC_Letter_General')->checkbox() ?>
            </div></div>
    
    <div width="100%">
        
        <div style="float:left ; width:50% ">
            <?= $form->field($model, 'DEC_Covering_Letter')->checkbox() ?>
        </div>
        <div style="float:left ; width:50% ">
        <?= $form->field($model, 'DEC_letter_Payload')->checkbox() ?>
        </div></div>
        <div width="100%">
            <div style="float:left ; width:50% ">
 <?= $form->field($model, 'RD_Letter')->checkbox() ?>
               </div> <div style="float:left ; width:50% ">
        <?= $form->field($model, 'FF_Payment_Note')->checkbox() ?>
                </div></div>
    <div width="100%">
        <div style="float:left ; width:50% ">
        <?= $form->field($model, 'Delivery_order')->checkbox() ?>
        </div> <div style="float:left ; width:50% ">
        <?= $form->field($model, 'Freight_certificate')->checkbox() ?>
        </div></div>
        <div width="100%">
            <div style="float:left ; width:50% ">
    <?= $form->field($model, 'Consignment_covering_letter')->checkbox() ?>
            </div>
            <div style="float:left ; width:50% ">
        <?= $form->field($model, 'CERTIFICATE')->checkbox() ?>
            </div></div>
        
        <div width="100%">
            <div style="float:left ; width:50% ">
        <?= $form->field($model, 'DECLARATION')->checkbox() ?>
            </div> <div style="float:left ; width:50% ">
        <?= $form->field($model, 'ANNEXURE_1')->checkbox() ?>
            </div></div>
            
            <div width="100%">
                <div style="float:left ; width:50% ">
            <?= $form->field($model, 'Custom_duty_challan')->checkbox() ?>
                </div> <div style="float:left ; width:50% ">
        <?= $form->field($model, 'Authorisation_letter_of_CHA')->checkbox() ?>
                </div></div>
    <div width="100%">
        <div style="float:left ; width:50% ">
            <?= $form->field($model, 'Payment_note_for_wh_charge')->checkbox() ?>
        </div>
            <div style="float:left ; width:50% ">
            <?= $form->field($model, 'Mumabi_octroi')->checkbox() ?>
            </div></div>
    <?php $sql = 'SELECT * FROM tb_signing WHERE SERVICESTATUSCODE = "SERV"';?>
        <?= $form->field($model, 'Select_signatory')->dropDownList(
 ArrayHelper::map(TbSigning::findBySql($sql)->all(), 'EMPLOYEENAME', 'EMPLOYEENAME'),
                ['prompt'=>'Please select signatory...']
                
                )
            ?>
    
        <div class="form-group">
            <a target="_blank"> <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?></a>
            <?= Html::a(bootui\Html::encode("Go back to main menu"), 'index.php'); ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- consignmentdocuments -->
