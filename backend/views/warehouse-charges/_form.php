<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Consignment;
use backend\models\FinancialYear;
/* @var $this yii\web\View */
/* @var $model backend\models\WarehouseCharges */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="warehouse-charges-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Select_year')->dropDownList(
 ArrayHelper::map(FinancialYear::find()->all(),'Select_year','Select_year'),
    ['prompt' => '']) ?>

    <?= $form->field($model, 'Consignment_no')->dropDownList(
 ArrayHelper::map(Consignment::find()->all(),'Consignment_no','Consignment_no'),
            ['prompt' => 'Please choose consignment no']
            ) ?>

    <?= $form->field($model, 'Warehouse_charges')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <br>
    <p><a href="http://localhost/PP/backend/web/index.php?r=companies">Go back to the main menu</a></p><br>

    <?php ActiveForm::end(); ?>

</div>
