<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Consignment */

$this->title = 'Create Consignment';
//$this->params['breadcrumbs'][] = ['label' => 'Consignments', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consignment-create">

    <h1><?= Html::encode($this->title) ?></h1>
<!--    <div width="100%">
    <div width="50%"><?php
echo "Date " . date("d/m/Y") . "<br>";
    ?></div>
    <div width="50%">     
<?php
echo "Time" . date("h:i:sa");
?>
</div>
    </div>
        -->
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
