<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TbSigning */

$this->title = $model->PAYROLL;
$this->params['breadcrumbs'][] = ['label' => 'Tb Signings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-signing-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->PAYROLL], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->PAYROLL], [
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
            'PAYROLL',
            'EMPLOYEENAME',
            'DESIGNATION',
            'SERVICESTATUSCODE',
            'HEMPLOYEENAME',
        ],
    ]) ?>

</div>
