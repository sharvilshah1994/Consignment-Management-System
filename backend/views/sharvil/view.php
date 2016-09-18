<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Sharvil */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Sharvils', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sharvil-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->name], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->name], [
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
            'name',
            'mob_num',
            'address',
            'email:email',
        ],
    ]) ?>

</div>
