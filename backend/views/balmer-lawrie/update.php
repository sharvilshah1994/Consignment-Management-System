<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BalmerLawrie */

$this->title = 'Update Balmer Lawrie: ' . ' ' . $model->NAME;
$this->params['breadcrumbs'][] = ['label' => 'Balmer Lawries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NAME, 'url' => ['view', 'id' => $model->COUNTRY]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="balmer-lawrie-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
