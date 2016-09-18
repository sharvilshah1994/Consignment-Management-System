<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TbpaymentmodeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Add/update payment term';

?>
<div class="tbpaymentmode-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= Html::a(bootui\Html::encode("Go back to main menu"), 'index.php'); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add/update payment term', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'PAYTERM',
            'PAYTERMFULL',
            'PAY_CLAUSE:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
