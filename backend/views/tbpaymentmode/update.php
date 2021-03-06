<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tbpaymentmode */

$this->title = 'Add/update payment term ' . ' ' . $model->ID;

$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbpaymentmode-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
