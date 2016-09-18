<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<head>
<style>
    #companymenu
{
        padding-left: 400px;
	height:35px;
	width:80%;
	margin-top: 10px;
        alignment-adjust: middle;
        
        
}
.companymenuul
{
	list-style-type: none;
        
}
.companymenuli
{
	 float: left;
	 display:block;
	 line-height: 25px;
	 padding: 0 15px;
}
.alisting
{
	color:blue;text-decoration:none;
}
.aactive
{
	color: #333;
	background-color: #fff;
	border: 2px solid #999;
	margin-top: -2px;
}
.companymenuli a:hover
{
	color:#C63;
	text-decoration:none;
	cursor:pointer;
	
	background-color: white;
	margin-top: -2px;
        
}

.companymenuli:hover > ul{
    display:block;
    position:fixed;
    
}

.caret {
display: inline-block;
width: 0;
height: 0;
vertical-align: top;
border-top: 4px solid #fff;
border-right: 4px solid ;
border-left: 4px solid;
content: "";
margin-top: 15px;
margin-left: 5px;
border-bottom-color: #fff;
filter: alpha(opacity=100);

_display: inline;
_zoom: 1;
_width: 7px;
_height: 4px;
_margin-top: 8px;
_margin-left: 5px;
_line-height: 4px;
_border: none;
_vertical-align: baseline;
}

.submenu{
    display:none;
    position:relative;
}

.navbar-inverse1
{
    background-color: white;
    background-image: none;
    
}
</style>      
</head>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        
        <?php
        
            NavBar::begin([
               
                'brandLabel' => 'PRL',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse1 navbar-fixed-top',
                ],
            ]);
            $menuItems = [
                ['label' => 'Home', 'url' => ['/site/index']],
            ];
            $server = $_SERVER['SERVER_NAME'];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Signup', 'url' => "http://$server/PP/frontend/web/index.php?r=site%2Fsignup"];  
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
                //$menuItems[] = ['label' => 'Add user', 'url' => 'http://localhost/PP/frontend/web/index.php?r=site%2Fsignup'];
                $menuItems[] = [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
                //$menuItems[] = ['label' => 'Add user', 'url' => 'http://localhost/PP/frontend/web/index.php?r=site%2Fsignup'];
                    
                
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
             
echo "<div id='companymenu'>";
    	echo "<ul class='companymenuul'>";
        echo "<li class='companymenuli aactive'><a class='alisting'>Consignment<b class='caret'></b></a>";
        echo "<ul class='submenu'>";
                	echo "<li>";
                        echo Html::a(bootui\Html::encode('Consignment Generation'), 'index.php?r=consignment/create');
                        echo "</li>";
                        echo "<li>";
                        echo Html::a(bootui\Html::encode('Custom Duty'), 'index.php?r=consignment/customduty');
                        echo "</li>";
                        echo "<li>";
                        echo Html::a(bootui\Html::encode('Warehouse Charges'), 'index.php?r=consignment/warehousecharges');
                        echo "</li>";
                        echo "<li>";
                        echo Html::a(bootui\Html::encode('Consignment Related Documents'), 'index.php?r=consignment/consignmentdocuments');
                        echo "</li>";
                        echo "<li>";
                        echo Html::a(bootui\Html::encode('Add/Update Signatory'), 'index.php?r=tb-signing');
                        echo "</li>";
                        echo "<li>";
                        echo Html::a(bootui\Html::encode('Add/Update Freight Forwarder'), 'index.php?r=balmer-lawrie');
                        echo "</li>";
                        echo "<li>";
                        echo Html::a(bootui\Html::encode('Add/Update Payment Term'), 'index.php?r=tbpaymentmode');
                        echo "</li>";
                        echo "</ul>";
            
            echo "</li>";
            
        echo "</ul>";
        
        echo "<li class='companymenuli aactive'><a class='alisting'>Purchase<b class='caret'></b></a>";
            	echo "<ul class='submenu'>";
                	echo "<li>";
                        echo Html::a(bootui\Html::encode('PO print'), 'index.php?r=consignment/poprint');
                        echo "</li>";
                        echo "<li>";
                        echo Html::a(bootui\Html::encode('PO Annexure'), 'index.php?r=consignment/poannexure');
                        echo "</li>";
                        echo "<li>";
                        echo Html::a(bootui\Html::encode('LC/Payment Note'), 'index.php?r=consignment/lcpaymentnote');
                        echo "</li>";
                        echo "<li>";
                        echo Html::a(bootui\Html::encode('Approval for advanced Payment'), 'index.php?r=consignment/advancepayment');
                        echo "</li>";
                echo "</ul>";
            
            echo "</li>";
            
        echo "</ul>";
    echo "</div>";
            NavBar::end();
        ?>

        <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
        <p class="pull-left">&copy; PRL <?= date('Y') ?></p>
        
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
