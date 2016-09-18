<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TbSigning */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tb-signing-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'PAYROLL')->textInput(['maxlength' => 7]) ?>

    <?= $form->field($model, 'EMPLOYEENAME')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'DESIGNATION')->textInput(['maxlength' => 50]) ?>
    
   <?php $items = ['SERV'=>'SERV','NSRV'=>'NSRV']; ?>
    

    <?= $form->field($model, 'SERVICESTATUSCODE')->dropDownList($items,['prompt'=>'Select Service Status code']) ?>

    <?= $form->field($model, 'HEMPLOYEENAME')->textInput(['maxlength' => 150]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?= Html::a(bootui\Html::encode("Go back to main menu"), 'index.php'); ?>
    <?php ActiveForm::end(); ?>

</div>
