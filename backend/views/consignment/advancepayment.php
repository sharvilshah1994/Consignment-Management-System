<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\TbSigning;

/* @var $this yii\web\View */
/* @var $model backend\models\AdvancePayment */
/* @var $form ActiveForm */
?>
<div class="advancepayment">

    <?php $form = ActiveForm::begin(); ?>
    <h1>Approval For Advance Payment</h1>
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
                    
                    $("#advancepayment-item_description").val(x[0]["GINDSHORTDES"]);
                    });
                    ']) ?>
        
        <?= $form->field($model, 'Item_Description') ?>
     <?php $sql = 'SELECT * FROM tb_signing WHERE SERVICESTATUSCODE = "SERV"';?>
        <?= $form->field($model, 'Select_Signatory')->dropDownList(
 ArrayHelper::map(TbSigning::findBySql($sql)->all(), 'EMPLOYEENAME', 'EMPLOYEENAME'),
                ['prompt'=>'Please select signatory...']
                
                )
            ?>
        
        <?= $form->field($model, 'Advance_Payment')->radioList(['Advance_Payment'=>'Advance Payment','Lack_of_competition'=>'Lack of competition'])->label('Approval Note for:'); ?>
        
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- advancepayment -->
