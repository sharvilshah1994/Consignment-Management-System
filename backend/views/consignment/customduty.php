<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\FinancialYear;
/* @var $this yii\web\View */
/* @var $model backend\models\CustomDuty */
/* @var $form ActiveForm */
?>
<div class="customduty">
    <h1>Add/Update Custom Duty</h1>
    
    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'Select_year')->dropDownList(
                ArrayHelper::map(FinancialYear::find()->all(),'Select_year','Select_year'), ['prompt'=>'Select year',
            'onchange'=>
                '$.post( "index.php?r=consignment/findconsid&financialyear="+$(this).val(), function( data ) {
                   
                    
                  
                  var info = data.split("~");
                  $.each(info,function(val,text){
                     $( "#customduty-consignmentno").append(
                     $("<option></option>").val(text).html(text))});
                });'
            
             
            ]) ?>
        <?= $form->field($model, 'CONSIGNMENTNO')->dropDownList(
 ['prompt'=>'Select Consignment Number'],
                 ['onchange'=>
                '$.post( "index.php?r=consignment/custom&id="+$(this).val().split("-")[0],function( data )
                    {
                    $("#customduty-customduty").val(data);
                    });'        
               
                     ]
                )   
        
        
        ?>
        <?= $form->field($model, 'CUSTOMDUTY') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
   <?= Html::a(bootui\Html::encode("Go back to main menu"), 'index.php'); ?>
    <br>
    <?php ActiveForm::end(); ?>

</div><!-- customduty -->
