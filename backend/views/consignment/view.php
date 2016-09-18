<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Consignment */

$this->title = $model->CONSIGNMENTID;
$this->params['breadcrumbs'][] = ['label' => 'Consignments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consignment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->CONSIGNMENTID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'CONSIGNMENTID' => $model->CONSIGNMENTID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'CONSIGNMENTID',
            'PONO',
            'PODATE',
            'VENDORNAME',
            'AGENTNAME',
            'VENDORADD',
            'AGENTADD',
            'SHIPPING_COMP',
            'SHIP_AG_CITY',
            'ITEM_DESC',
            'NOOFPACK',
            'MAWB',
            'HAWB',
            'SAWB',
            'LCNO',
            'INVOICENO',
            'INVOICEDATE',
            'CURRENCY',
            'INVOICEVALUE',
            'ACTUAL_COST',
            'IGMNO',
            'PORT_OF_SHIPMENT',
            'DELIVERYTERM',
            'PTCODE',
            'NATURE_OF_TRANS',
            'CARGO_OF',
            'OTHERPAYMENT',
            'OTP_PAYABLETO',
            'CUSTOMDUTY',
        ],
    ]) ?>

</div>
