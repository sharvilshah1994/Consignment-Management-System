<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BalmerLawrieSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="balmer-lawrie-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'SNO') ?>

    <?= $form->field($model, 'COUNTRY') ?>

    <?= $form->field($model, 'NAME') ?>

    <?= $form->field($model, 'ADDRESS') ?>

    <?= $form->field($model, 'CP1') ?>

    <?php // echo $form->field($model, 'CP2') ?>

    <?php // echo $form->field($model, 'TEL') ?>

    <?php // echo $form->field($model, 'FAX') ?>

    <?php // echo $form->field($model, 'FFEMAIL') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
