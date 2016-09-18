<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ConsignmentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="consignment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'CONSIGNMENTID') ?>

    <?= $form->field($model, 'PONO') ?>

    <?= $form->field($model, 'PODATE') ?>

    <?= $form->field($model, 'VENDORNAME') ?>

    <?= $form->field($model, 'AGENTNAME') ?>

    <?php // echo $form->field($model, 'Vendor_Address') ?>

    <?php // echo $form->field($model, 'Agent_Address') ?>

    <?php // echo $form->field($model, 'Shipping_Agency') ?>

    <?php // echo $form->field($model, 'City') ?>

    <?php // echo $form->field($model, 'Item_Description') ?>

    <?php // echo $form->field($model, 'No_of_packs') ?>

    <?php // echo $form->field($model, 'MAWB_NO') ?>

    <?php // echo $form->field($model, 'HAWB_NO') ?>

    <?php // echo $form->field($model, 'SAWB_NO') ?>

    <?php // echo $form->field($model, 'Flight_no') ?>

    <?php // echo $form->field($model, 'Invoice_Num') ?>

    <?php // echo $form->field($model, 'Invoice_Date') ?>

    <?php // echo $form->field($model, 'Currency') ?>

    <?php // echo $form->field($model, 'Invoice_val') ?>

    <?php // echo $form->field($model, 'Actual_cost') ?>

    <?php // echo $form->field($model, 'IGM_NO') ?>

    <?php // echo $form->field($model, 'port') ?>

    <?php // echo $form->field($model, 'Delivery_term') ?>

    <?php // echo $form->field($model, 'Payment_term') ?>

    <?php // echo $form->field($model, 'Nature_Transaction') ?>

    <?php // echo $form->field($model, 'Cargo_arrival') ?>

    <?php // echo $form->field($model, 'Other_payment') ?>

    <?php // echo $form->field($model, 'Payment_Ms') ?>

    <?php // echo $form->field($model, 'Custom_duty') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
