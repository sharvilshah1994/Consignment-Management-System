<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\FinancialYear;
/* @var $this yii\web\View */
/* @var $model backend\models\WarehouseCharges */
/* @var $form ActiveForm */
?>
<div class="warehousecharges">
    <h1>Add/Update Warehouse Charges</h1>
    <?php $form = ActiveForm::begin(); ?>

        <?php $items = ['2008-2009'=>'2008-2009','2009-2010'=>'2009-2010','2010-2011'=>'2010-2011','2011-2012'=>'2011-2012']; ?>
        <?= $form->field($model, 'Select_year')->dropDownList(ArrayHelper::map(FinancialYear::find()->all(),'Select_year','Select_year'), ['prompt'=>'Select year',
            'onchange'=>
                '$.post( "index.php?r=consignment/findconsid&financialyear="+$(this).val(), function( data ) {
                   
                    
                  
                  var info = data.split("~");
                  $.each(info,function(val,text){
                     $( "#warehousecharges-consignmentno").append(
                     $("<option></option>").val(text).html(text))});
                });'
            
             
            ]) ?>
        <?= $form->field($model, 'CONSIGNMENTNO')->dropDownList(
 ['prompt'=>'Select Consignment Number'],
                ['onchange'=>
                '$.post( "index.php?r=consignment/charges&id="+$(this).val().split("-")[0],function( data )
                    {
                    $("#warehousecharges-warehouse_charge").val(data);
                    });'        
               ]) ?>
        <?= $form->field($model, 'WAREHOUSE_CHARGE') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
   <?= Html::a(bootui\Html::encode("Go back to main menu"), 'index.php'); ?>
    
    <?php ActiveForm::end(); ?>

</div><!-- warehousecharges -->
