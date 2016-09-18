<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Consignment */

$this->title = 'Update Consignment: ' . ' ' . $model->CONSIGNMENTID;
$this->params['breadcrumbs'][] = ['label' => 'Consignments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CONSIGNMENTID, 'url' => ['view', 'CONSIGNMENTID' => $model->CONSIGNMENTID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="consignment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
