<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TbSigningSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Add/Update Signatory';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-signing-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= Html::a(bootui\Html::encode("Go back to main menu"), 'index.php'); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add Signatory', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'PAYROLL',
            'EMPLOYEENAME',
            'DESIGNATION',
            'SERVICESTATUSCODE',
            'HEMPLOYEENAME',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
