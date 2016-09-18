<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TbSigning */

$this->title = 'Update Tb Signing: ' . ' ' . $model->PAYROLL;
$this->params['breadcrumbs'][] = ['label' => 'Tb Signings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->PAYROLL, 'url' => ['view', 'id' => $model->PAYROLL]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tb-signing-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
