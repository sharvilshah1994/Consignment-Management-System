<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

//header("Access-Control-Allow-Origin: *"); 
//header("Access-Control-Allow-Methods: PUT, GET, POST"); 
//header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept"); 
//header('Content-type: application/json');
/* @var $this yii\web\View */
/* @var $model backend\models\Consignment */
/* @var $form yii\widgets\ActiveForm */
?>
<!DOCTYPE html>
<html>
<head>
    
<!--    <script>
    function my(){
    var a = '[{"0":"M\/s thermo Fisher Scientifc India Pvt Ltd","VENDORNAME":"M\/s thermo Fisher Scientifc India Pvt Ltd","1":"403, 404 delphi 'B' wing Hiranadani Bussines Park Powai, MUMBAI --400078, India","VENDORADD":"403, 404 delphi 'B' wing Hiranadani Bussines Park Powai, MUMBAI --400078, India","2":"USD","CURRENCYCODE":"USD","3":"Jan 1 2015 12:00:00:000AM","PODATE":"Jan 1 2015 12:00:00:000AM","4":"TRACE GAS ANALYZERS","GINDSHORTDES":"TRACE GAS ANALYZERS","5":null,"PAYTERMFULL":null,"6":"PRSPAS","DIVNCODE":"PRSPAS","7":24000,"COMPUTEDPOVALUE":24000,"8":null,"MAWBNO":null,"9":null,"MAWBDATE":null,"10":null,"HAWBNO":null,"11":null,"AIRWAYBILLLNO":null,"12":null,"FLIGHTNO":null,"13":null,"FLIGHTDATE":null,"14":null,"CCINVOICENO":null,"15":null,"CCINVOICEDATE":null,"16":null,"CCNOPACKAGE":null,"17":null,"CARGONO":null,"18":null,"CARGODATE":null,"19":null,"CARGOARRIVAL":null,"20":null,"CCFREIGHT":null,"21":null,"PORTDESPATCH":null,"22":null,"PORTENTRY":null,"23":null,"CCWHCHARGE":null}]';
    var b = JSON.parse(a);
    
    $(document).ready(function() {
    var $grouplist = $('#groups');
    $.each(b, function() {
        $('<li>' + this.VENDORNAME + '</li>').appendTo($grouplist);
    });
});}
    </script>-->
    
<meta charset='UTF-8'>
<style>
.drop_container
{
  position:relative;
  float:left;
}
.always_visible
{
  background-color:#FAFAFA;
  color:#333333;
  font-weight:bold;
  cursor:pointer;
  border:2px silver solid;
  margin:0px;
  margin-right:5px;
  font-size:14px;
  font-family:"Times New Roman", Times, serif;
}
.always_visible:hover + .hidden_container
{
  display:block;
  position:absolute;
  color:green;
}
.hidden_container
{
  display:none;
  border:1px solid;
  left:0px;
  background-color:#FAFAFA;
  padding:5px;
  z-index:1;
}
.hidden_container:hover
{
  display:block;
  position:absolute;
}
.link
{
  color:blue;
  white-space:nowrap;
  margin:3px;
  display:block;
}
.link:hover
{
  color:white;
  background-color:blue;
}
.line_1
{
  width:800px;
  
  padding:5px;
}
</style>      

</head>

<body onload="my()" >
 <?= Html::a(bootui\Html::encode("Go back to main menu"), 'index.php'); ?>
<p id="groups"></p>
<div class="line_1">
<div class="drop_container">
  <select class="always_visible" disabled><option>Options</option></select>
  <div class="hidden_container">
      <?= Html::a(bootui\Html::encode("Create"), 'index.php?r=consignment/create'); ?>
      <?= Html::a(bootui\Html::encode("Update"), 'index.php?r=consignment/index'); ?>
      <?= Html::a(bootui\Html::encode("Find"), 'index.php?r=consignment/index'); ?>
  </div>
</div>
</div>

<br>



</body>
</html>

<div class="consignment-form">

   

   <?php $form = ActiveForm::begin(['options'=>['class'=>'form-horizontal'], 
        'fieldConfig'=>['template'=> "{label}\n<div class=\"col-md-10\">{input}</div>\n<div class=\"col-md-10\">{error}</div>"],
        ]); ?>

    <div style="width:100%">
        <div style="float:left ; width:30% ">
           <?php
$result = json_decode(file_get_contents("http://172.16.15.95/getCoWAADetails.php?requesttype=ConsignmentPOList&parameter="));

foreach ($result as $value)
{
    $POList [$value->PONO] = $value->PONO."--".$value->GINDSHORTDES ;
  //  $a [$value ->VENDORCODE] = $value -> VENDORCODE ;
   
}


        echo $form->field($model,'PONO',['labelOptions'=>['class'=>'control-label col-md-2']],array('disabled' => true))->dropDownList(
      $POList,
               
                  [ 'onblur' =>
                '$.post( "index.php?r=consignment/getvendordata&PONO='.'"+$(this).val(), function( data ) {
                    
                    var x = JSON.parse(data);
                    
                    $( "#consignment-vendorname").val(x[0]["VENDORNAME"]);
                    $( "#consignment-vendoradd").val(x[0]["VENDORADD"]);
                    $("#consignment-currency").val(x[0]["CURRENCYCODE"]);
                    $("#consignment-podate").val(x[0]["NEWPODATE"]);
                    $("#consignment-item_desc").val(x[0]["GINDSHORTDES"]);
                    $("#consignment-paymentterm").val(x[0]["PAYMENTTERMFULL"]);
                    $("#consignment-invoicevalue").val(x[0]["COMPUTEDPOVALUE"]);
                    
                });'])
//['onblur' =>    
//   ' var x = JSON.parse("index.php?r=consignment/getvendordata&PONO=2014E003830101");
//        alert(x[0][0]);
//        
//    
//'])
?>
    
        </div>
        <div style="float:left ; width:30% ;class:row">
           <?php echo $form->field($model, 'PODATE',['labelOptions'=>['class'=>'control-label col-md-2']],array('disabled' => true))->widget(DatePicker::classname(), [
    'options' => ['placeholder' => ''],
               'inline' => false    ,
               
               'size' => 'input-'.'10px',
              // 'template'=>'<div style="background-color: #fff; width:250px"></div>',
               'clientOptions' => [
            'autoclose' => true,
           'format' => 'yyyy-mm-dd'
  ]   
    
])->label('Date')
           ?>

        </div>
        <div style="float: left">
            <?= $form->field($model,'VENDORNAME',['labelOptions'=>['class'=>'control-label col-md-2']],array('disabled' => true))->textInput(['style'=>'width:300px'])->label('Vendor Name'); ?>
        </div>
    </div>
    
    <div style="width:100%">
        <div style="float:left ; width:30% ;class:row">
            <?= $form->field($model,'VENDORADD',['labelOptions'=>['class'=>'control-label col-md-2']])->textArea(['style'=>'width:200px']); ?>
        </div>
        <div style="float:left ; width:30% ;class:row">
            <?= $form->field($model,'AGENTNAME',['labelOptions'=>['class'=>'control-label col-md-2']])->textInput(['style'=>'width:200px']); ?>
        </div>
        <div style="float:left ; width:40% ;class:row">
            <?= $form->field($model,'AGENTADD',['labelOptions'=>['class'=>'control-label col-md-2']])->textarea(['style'=>'width:300px']); ?>
        </div>
    </div>
    
      <div style="width:100%">
        <div style="float:left ; width:30% ;class:row">
            <?= $form->field($model,'ITEM_DESC',['labelOptions'=>['class'=>'control-label col-md-2']])->textInput(['style'=>'width:150px']); ?>
        </div>
          <div style="float:left ; width:30%">
              <?php
                    $model->CONS_DATE=date('Y-m-d');
                ?>
 <?php echo $form->field($model, 'CONS_DATE',['labelOptions'=>['class'=>'control-label col-md-2']])->widget(DatePicker::classname(), [
    'options' => ['placeholder' => ''],
               'inline' => false    ,
               
               'size' => 'input-'.'10px',
              // 'template'=>'<div style="background-color: #fff; width:250px"></div>',
               'clientOptions' => [
            'autoclose' => true,
           'format' => 'yyyy-mm-dd'
  ]   
    
])->label('Con Date')
           ?>
          </div>
          <?php 
                $model->NOOFPACK='1 ';
                ?>
        <div style="float:left ; width:40% ;class:row">
            <?= $form->field($model,'NOOFPACK',['labelOptions'=>['class'=>'control-label col-md-2']])->textInput(['style'=>'width:100px']); ?>
        </div>
       
    </div>
        
        
        
        
        
        

         <div width="100%">  
            <div style="float:left ; width:30%">
                <?= $form->field($model, 'MAWB',['labelOptions'=>['class'=>'control-label col-md-2']])->textInput(['maxlength' => 15, 'style' => 'width:200px']) ?>
            </div>
            <div style="float:left ; width:30%">
                <?= $form->field($model, 'HAWB',['labelOptions'=>['class'=>'control-label col-md-2']])->textInput(['maxlength' => 15, 'style' => 'width:200px']) ?>
            </div>
            <div style="float:left ; width:40%">
<?= $form->field($model, 'SAWB',['labelOptions'=>['class'=>'control-label col-md-2']])->textInput(['maxlength' => 15, 'style' => 'width:200px']) ?>
            </div>
        </div>
    
    <div width="100%">  
            <div style="float:left ; width:30%">
                <?= $form->field($model, 'LCNO',['labelOptions'=>['class'=>'control-label col-md-2']])->textInput(['maxlength' => 15, 'style' => 'width:200px']) ?>
            </div>
            <div style="float:left ; width:30%">
                <?= $form->field($model, 'INVOICENO',['labelOptions'=>['class'=>'control-label col-md-2']])->textInput(['maxlength' => 15, 'style' => 'width:200px']) ?>
            </div>
            <div style="float:left ; width:40%">
<?= $form->field($model, 'INVOICEDATE',['labelOptions'=>['class'=>'control-label col-md-2']])->textInput(['maxlength' => 15, 'style' => 'width:200px']) ?>
            </div>
        </div>    
    
     <div width="100%">  
            <div style="float:left ; width:30%">
                <?= $form->field($model, 'CURRENCY',['labelOptions'=>['class'=>'control-label col-md-2']])->textInput(['maxlength' => 15, 'style' => 'width:200px']) ?>
            </div>
            <div style="float:left ; width:30%">
                <?= $form->field($model, 'INVOICEVALUE',['labelOptions'=>['class'=>'control-label col-md-2']])->textInput(['maxlength' => 15, 'style' => 'width:200px']) ?>
            </div>
            <div style="float:left ; width:40%">
<?= $form->field($model, 'ACTUAL_COST',['labelOptions'=>['class'=>'control-label col-md-2']])->textInput(['maxlength' => 15, 'style' => 'width:200px']) ?>
            </div>
        </div>    

          
     <div width="100%">  
            <div style="float:left ; width:30%">
                <?= $form->field($model, 'IGMNO',['labelOptions'=>['class'=>'control-label col-md-2']])->textInput(['maxlength' => 15, 'style' => 'width:200px']) ?>
            </div>
            <div style="float:left ; width:30%">
                <?= $form->field($model, 'PORT_OF_SHIPMENT',['labelOptions'=>['class'=>'control-label col-md-2']])->textInput(['maxlength' => 15, 'style' => 'width:200px']) ?>
            </div>
            <div style="float:left ; width:40%">
                 <?php 
                $model->DELIVERYTERM='Air freight charges to collect basis upto Ahmedabad';
                ?>
<?= $form->field($model, 'DELIVERYTERM',['labelOptions'=>['class'=>'control-label col-md-2']])->textInput(['maxlength' => 15, 'style' => 'width:200px']) ?>
            </div>
        </div>    
    
      <div width="100%">  
            <div style="float:left ; width:30%">
                <?= $form->field($model, 'NATURE_OF_TRANS',['labelOptions'=>['class'=>'control-label col-md-2']])->textInput(['maxlength' => 15, 'style' => 'width:200px']) ?>
            </div>
            <div style="float:left ; width:30%">
                <?= $form->field($model, 'PTCODE',['labelOptions'=>['class'=>'control-label col-md-2']])->textInput(['maxlength' => 100, 'style' => 'width:200px']) ?>
            </div>
            <div style="float:left ; width:40%">
                <?php
                $model->CARGO_OF='Balmer Lawrie & Indian Airlines Cargo';?>
<?= $form->field($model, 'CARGO_OF',['labelOptions'=>['class'=>'control-label col-md-2']])->textInput(['maxlength' => 15, 'style' => 'width:200px']) ?>
            </div>
        </div>
      <div width="100%">  
            <div style="float:left ; width:30%">
                <?= $form->field($model, 'OTHERPAYMENT',['labelOptions'=>['class'=>'control-label col-md-2']])->textInput(['maxlength' => 15, 'style' => 'width:200px']) ?>
            </div>
            <div style="float:left ; width:30%">
                <?php
                $model->OTP_PAYABLETO='Balmer Lawrie Company Ltd, Ahmedabad';
                ?>
                
                <?= $form->field($model, 'OTP_PAYABLETO',['labelOptions'=>['class'=>'control-label col-md-2']])->textInput(['maxlength' => 15, 'style' => 'width:200px']) ?>
            </div>
            <div style="float:left ; width:40%">
<?= $form->field($model, 'CUSTOMDUTY',['labelOptions'=>['class'=>'control-label col-md-2']])->textInput(['maxlength' => 15, 'style' => 'width:200px']) ?>
            </div>
        </div>    
 <div width="100%">  
            <div style="float:left ; width:30%">
                <?php 
                $model->SHIPPING_COMP='Eastern Shipping Agency';
                ?>
                <?= $form->field($model,'SHIPPING_COMP',['labelOptions'=>['class'=>'control-label col-md-2']])->textInput(['maxlength' => 15, 'style' => 'width:200px']) ?>
            </div>
            <div style="float:left ; width:30%">
               
                <?php 
                $model->SHIP_AG_CITY='Ahmedabad';
                ?>
                
                <?= $form->field($model, 'SHIP_AG_CITY',['labelOptions'=>['class'=>'control-label col-md-2']])->textInput(['maxlength' => 15, 'style' => 'width:200px']) ?>
            </div>
            <div style="float:left ; width:40%">

            </div>
        </div>    
    
             
           
                  
        </div>
        
                        
        
        <div class="form-group">
<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
  <?= Html::a(bootui\Html::encode("Go back to main menu"), 'index.php'); ?>

<?php ActiveForm::end(); ?>

    </div>
