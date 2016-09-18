<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ConsignmentRelatedDocuments */
/* @var $form ActiveForm */
?>
<div class="backend-views-consignment-consignment-related-documents">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'Select_year') ?>
        <?= $form->field($model, 'Consignment_no') ?>
        <?= $form->field($model, 'CHA_Authorisation_letter') ?>
        <?= $form->field($model, 'DEC_Letter_General') ?>
        <?= $form->field($model, 'DEC_Covering_Letter') ?>
        <?= $form->field($model, 'DEC_letter_Payload') ?>
        <?= $form->field($model, 'RD_Letter') ?>
        <?= $form->field($model, 'FF_Payment_Note') ?>
        <?= $form->field($model, 'Delivery_order') ?>
        <?= $form->field($model, 'Freight_certificate') ?>
        <?= $form->field($model, 'Consignment_covering_letter') ?>
        <?= $form->field($model, 'CERTIFICATE') ?>
        <?= $form->field($model, 'DECLARATION') ?>
        <?= $form->field($model, 'ANNEXURE_1') ?>
        <?= $form->field($model, 'Custom_duty_challan') ?>
        <?= $form->field($model, 'Authorisation_letter_of_CHA') ?>
        <?= $form->field($model, 'Payment_note_for_wh_charge') ?>
        <?= $form->field($model, 'Mumabi_octroi') ?>
        <?= $form->field($model, 'Select_signatory') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- backend-views-consignment-consignment-related-documents -->
