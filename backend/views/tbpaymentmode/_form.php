<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use yii\helpers\ArrayHelper;
use backend\models\Tbpaymentmode;
//use kartik\select2\Select2;
use yii\jui\AutoComplete; 
use yii\web\JsExpression;
use kartik\widgets\Typeahead;

/* @var $this yii\web\View */
/* @var $model backend\models\Tbpaymentmode */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbpaymentmode-form">

    <?php $form = ActiveForm::begin(); ?>
<?php

$result = json_decode(file_get_contents("http://172.16.15.95/getCoWAADetails.php?requesttype=PaymentTerms&parameter="));

$i=0;
foreach ($result as $value)
{
    $POList [$i] = trim($value->PAYTERM);
    $i++;
}
?>  
  
  <?php  echo $form->field($model, 'PAYTERM')->widget(Typeahead::classname(), [
'options' => ['placeholder' => 'Enter Payterm','onchange' => 
        '$.post( "index.php?r=tbpaymentmode/getvendordata&PONO="+$(this).val(), function(data) {
                var x = JSON.parse(data);
                $("#tbpaymentmode-paytermfull").val(x[0][1]);
             
})'],
'pluginOptions' => ['highlight'=>true],

'dataset' => [
[
'local' => $POList,
]   
],
])
  ?>

    <?= $form->field($model, 'PAYTERMFULL')->textarea(['maxlength' => 255]) ?>

    <?= $form->field($model, 'PAY_CLAUSE')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
<?= Html::a(bootui\Html::encode("Go back to main menu"), 'index.php'); ?>
    <?php ActiveForm::end(); ?>

</div>
