<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Sharvil */

$this->title = 'Create Sharvil';
$this->params['breadcrumbs'][] = ['label' => 'Sharvils', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sharvil-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
