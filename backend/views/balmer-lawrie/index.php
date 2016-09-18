<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BalmerLawrieSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Add/Update Freight Forwarder';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="balmer-lawrie-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= Html::a(bootui\Html::encode("Go back to main menu"), 'index.php'); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add/Update Freight Forwarder', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'SNO',
            'COUNTRY',
            'NAME',
            'ADDRESS',
            'CP1',
            // 'CP2',
            // 'TEL',
            // 'FAX',
            // 'FFEMAIL:email',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
