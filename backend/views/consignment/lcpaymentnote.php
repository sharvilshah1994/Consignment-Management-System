<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\TbSigning;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $model backend\models\LcPaymentnote */
/* @var $form ActiveForm */
?>
<div class="lcpaymentnote">

    <?php $form = ActiveForm::begin(); ?>
    <h1>LC/Payment Note</h1>
    <?= Html::a(bootui\Html::encode("Go back to main menu"), 'index.php'); ?>
    
 <?php
$result = json_decode(file_get_contents("http://172.16.15.95/getCoWAADetails.php?requesttype=ConsignmentPOList&parameter="));

foreach ($result as $value)
{
    $POList [$value->PONO] = $value->PONO."--".$value->GINDSHORTDES ;
  //  $a [$value ->VENDORCODE] = $value -> VENDORCODE ;
   
}
?>
        <?= $form->field($model, 'Select_PONO')->dropDownList($POList,
               ['onblur'=>
                    '$.post( "index.php?r=consignment/getvendordata&PONO='.'"+$(this).val(), function( data ) {
                    
                    var x = JSON.parse(data);
                    
                    $("#lcpaymentnote-item_description").val(x[0]["GINDSHORTDES"]);
                    });
                    $.post("index.php?r=consignment/invoice&id='.'"+$(this).val().split("-")[0], function( value ){
                        $("#lcpaymentnote-invoice_no").val(value.split(",")[0]);
                        $("#lcpaymentnote-invoice_date").val(value.split(",")[1]);
                        });
                    '])
                 ?>
        <?= $form->field($model, 'COWAA_LCNO') ?>
        <?= $form->field($model, 'Item_Description') ?>
    <div style="width:100%">
        <div style="float:left;width:30%"> 
        <?= $form->field($model, 'Invoice_no') ?>
        </div>
        <div style="float:left;width:30%">
            &nbsp;
        </div>
        <div style="float:left;width:40%">
        <?= $form->field($model, 'Invoice_date')->widget(DatePicker::className(),
                ['options' => ['placeholder' => ''],
               'inline' => false    ,
               
               'size' => 'input-'.'10px',
              // 'template'=>'<div style="background-color: #fff; width:250px"></div>',
               'clientOptions' => [
            'autoclose' => true,
           'format' => 'yyyy-mm-dd'
  ]
])->label('Invoice Date')                    ?>
        </div>
        </div>
      <?php $sql = 'SELECT * FROM tb_signing WHERE SERVICESTATUSCODE = "SERV"';?>
        <?= $form->field($model, 'Signatory')->dropDownList(
 ArrayHelper::map(TbSigning::findBySql($sql)->all(), 'EMPLOYEENAME', 'EMPLOYEENAME'),
                ['prompt'=>'Please select signatory...']
                
                )
            ?>
        
    <div style="width: 100%">
        <div style="float: left;width: 30%">
            <?= $form->field($model, 'LC_Application')->radioList(['LC_Application' =>'LC Application','Payment_Note' => 'Payment Note'])->label('Select any one'); ?>
        </div>
        
            <div style="float: left;width: 30%">
        <?= $form->field($model, 'Form_A1')->checkbox() ?>
            </div></div>
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    
    <?php ActiveForm::end(); ?>

</div><!-- lcpaymentnote -->
