<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\WarehouseCharges */

$this->title = 'Update Warehouse Charges: ' . ' ' . $model->Consignment_no;
$this->params['breadcrumbs'][] = ['label' => 'Warehouse Charges', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Consignment_no, 'url' => ['view', 'id' => $model->Consignment_no]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="warehouse-charges-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
