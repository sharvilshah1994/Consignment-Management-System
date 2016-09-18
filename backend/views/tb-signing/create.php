<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TbSigning */

$this->title = 'Add Signatory';
$this->params['breadcrumbs'][] = ['label' => 'Tb Signings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-signing-create">

    <h1><?= Html::encode($this->title) ?></h1>
<p><a href="http://localhost/PP/backend/web/index.php">Go back to the main menu</a></p><br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
