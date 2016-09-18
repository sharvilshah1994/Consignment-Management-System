<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\poprint */
/* @var $form ActiveForm */
?>
<div class="poprint">

    <?php $form = ActiveForm::begin(); ?>
    
    <h1>PO Print</h1>
    <?= Html::a(bootui\Html::encode("Go back to main menu"), 'index.php'); ?>
    
        <?php $items = ['Y'=>'Yes','N'=>'No']; ?>
        <?= $form->field($model, 'AGAINST_FE')->dropDownList($items, ['prompt'=>'Please select Yes or No',
            'onchange'=>
                '$.post( "index.php?r=consignment/againstfe&id="+$(this).val(), function( data ) {
                
                var x = JSON.parse(data);
                $.each(x, function(i, item) {
                item = x[i].PONO;
                $("#poprint-select_po_no").append(
                $("<option></option>").val(item).html(item))
    });
     
                
                 
                  
                  
                });'
            
            ]); ?>
        <?= $form->field($model, 'SELECT_PO_NO')->dropDownList(['prompt'=>'Select PONO'],
            ['onchange'=>
            '$.post("index.php?r=consignment/getenquirydata&id="+$(this).val(),function( data )
                {
                var x = JSON.parse(data);
                $("#poprint-enquiry_no").val(x[0]["GINDENTNO"]);
                $("#poprint-enquiry_date").val(x[0]["TENDERDUEDATE"]);
                    });'
            ]); ?>
        <?= $form->field($model, 'ENQUIRY_NO') ?>
        <?= $form->field($model, 'ENQUIRY_DATE') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?= Html::a(bootui\Html::encode("Go back to main menu"), 'index.php'); ?>
    <?php ActiveForm::end(); ?>

</div><!-- poprint -->
