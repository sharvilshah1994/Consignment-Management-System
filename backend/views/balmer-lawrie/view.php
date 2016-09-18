<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\BalmerLawrie */

$this->title = $model->NAME;
$this->params['breadcrumbs'][] = ['label' => 'Balmer Lawries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="balmer-lawrie-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->COUNTRY], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->COUNTRY], [
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
            'SNO',
            'COUNTRY',
            'NAME',
            'ADDRESS',
            'CP1',
            'CP2',
            'TEL',
            'FAX',
            'FFEMAIL:email',
        ],
    ]) ?>

</div>
