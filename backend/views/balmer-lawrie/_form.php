<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BalmerLawrie */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="balmer-lawrie-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'SNO')->textInput(['maxlength' => 255,'style'=>'width:100px']) ?>

    <?= $form->field($model, 'COUNTRY')->textInput(['maxlength' => 255,'style'=>'width:300px']) ?>

    <?= $form->field($model, 'NAME')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'ADDRESS')->textarea(['maxlength' => 255]) ?>

    <?= $form->field($model, 'CP1')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'CP2')->textInput(['maxlength' => 255,'style'=>'width:600px']) ?>

    <?= $form->field($model, 'TEL')->textInput(['maxlength' => 255,'style'=>'width:600px']) ?>

    <?= $form->field($model, 'FAX')->textInput(['maxlength' => 255,'style'=>'width:600px']) ?>

    <?= $form->field($model, 'FFEMAIL')->textInput(['maxlength' => 255,'style'=>'width:400px']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
<?= Html::a(bootui\Html::encode("Go back to main menu"), 'index.php'); ?>
    <?php ActiveForm::end(); ?>

</div>
