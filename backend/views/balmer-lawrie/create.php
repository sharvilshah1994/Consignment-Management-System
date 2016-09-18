<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\BalmerLawrie */

$this->title = 'Add /Update Freight Forwarder';
    
?>
<div class="balmer-lawrie-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= Html::a(bootui\Html::encode("Go back to main menu"), 'index.php'); ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
