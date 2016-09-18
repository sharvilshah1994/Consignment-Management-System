<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\WarehouseCharges */

$this->title = 'Warehouse Charges';
//$this->params['breadcrumbs'][] = ['label' => 'Warehouse Charges', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="warehouse-charges-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
