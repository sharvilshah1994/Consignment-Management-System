<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\WarehouseChargesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Warehouse Charges';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="warehouse-charges-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Warehouse Charges', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Select_year',
            'Consignment_no',
            'Warehouse_charges',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
