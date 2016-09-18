<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TbSigningSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tb-signing-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'PAYROLL') ?>

    <?= $form->field($model, 'EMPLOYEENAME') ?>

    <?= $form->field($model, 'DESIGNATION') ?>

    <?= $form->field($model, 'SERVICESTATUSCODE') ?>

    <?= $form->field($model, 'HEMPLOYEENAME') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
