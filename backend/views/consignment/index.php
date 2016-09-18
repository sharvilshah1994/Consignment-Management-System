<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ConsignmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Consignments';
$this->params['breadcrumbs'][] = $this->title;
//echo "hello";
?>
<div class="consignment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= Html::a(bootui\Html::encode("Go back to main menu"), 'index.php'); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Consignment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'CONSIGNMENTID',
           // 'CONSIGNMENTNO',
            'PONO',
            'PODATE',
            'VENDORNAME',
            'AGENTNAME',
            
            // 'Vendor_Address',
            // 'Agent_Address',
            // 'Shipping_Agency',
            // 'City',
            // 'Item_Description',
            // 'No_of_packs',
            // 'MAWB_NO',
            // 'HAWB_NO',
            // 'SAWB_NO',
            // 'Flight_no',
            // 'Invoice_Num',
            // 'Invoice_Date',
            // 'Currency',
            // 'Invoice_val',
            // 'Actual_cost',
            // 'IGM_NO',
            // 'port',
            // 'Delivery_term',
            // 'Payment_term',
            // 'Nature_Transaction',
            // 'Cargo_arrival',
            // 'Other_payment',
            // 'Payment_Ms',
            // 'Custom_duty',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
