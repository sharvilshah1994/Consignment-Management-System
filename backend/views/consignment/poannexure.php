<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;    
/* @var $this yii\web\View */
/* @var $model backend\models\poannexure */
/* @var $form ActiveForm */
?>




<div class="poannexure">
    
    <?php $form = ActiveForm::begin(); ?>
    <h1>PO Annexure</h1>
   <?= Html::a(bootui\Html::encode("Go back to main menu"), 'index.php'); ?>
    
 <?php
$result = json_decode(file_get_contents("http://172.16.15.95/getCoWAADetails.php?requesttype=ConsignmentPOList&parameter="));

foreach ($result as $value)
{
    $POList [$value->PONO] = $value->PONO."--".$value->GINDSHORTDES ;
  //  $a [$value ->VENDORCODE] = $value -> VENDORCODE ;
   
}
?>
        <?= $form->field($model,'Select_PONO')->dropDownList($POList,
                  [ 'onblur' => '
                      $.post("index.php?r=consignment/getvendordata&PONO='.'"+$(this).val(), function( data ) {
                    
                    var x = JSON.parse(data);
                    $("#poannexure-vendor_country").val(x[0][26]);
                    
                    });
                    $.post("index.php?r=consignment/getpolist&PONO="+$(this).val(),function (data) {
                    var y = JSON.parse(data);
                    $("#poannexure-indent").val(y[0][5]);
                    });
                    '
                      ])
            
            
                    ?>
        <?= $form->field($model, 'Vendor_Country') ?>
        <?= $form->field($model, 'Indent') ?>
        
    <?php echo $form->field($model, 'Indent_Date')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => ''],
               'inline' => false    ,
               
               'size' => 'input-'.'10px',
              // 'template'=>'<div style="background-color: #fff; width:250px"></div>',
               'clientOptions' => [
            'autoclose' => true,
           'format' => 'yyyy-mm-dd'
  ]   
    
])->label('Indent Date')
           ?>

        <?= $form->field($model, 'Minute_No') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    
    
    <?= Html::a(bootui\Html::encode("Go back to main menu"), 'index.php'); ?>
        <?php ActiveForm::end(); ?>

</div> 
      
      
      
      
