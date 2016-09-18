<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Sharvil */

$this->title = 'Update Sharvil: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Sharvils', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->name]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sharvil-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
