<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use backend\models\Consignment;
use backend\models\ConsignmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\CustomDuty;
use backend\models\WarehouseCharges;
use backend\models\ConsignmentRelatedDocuments;
use yii\helpers\Url;
use backend\models\poprint;
use backend\models\poannexure;
use backend\models\LcPaymentnote;
use backend\models\AdvancePayment;
/**
 * ConsignmentController implements the CRUD actions for Consignment model.
 */
class ConsignmentController extends Controller {

    public function behaviors() {

        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'rules' => [
//                    [
//                        'actions' => ['login', 'error'],
//                        'allow' => true,
//                    ],
//                    [
//                        'actions' => ['create', 'logout', 'index'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
//                ],
//            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Consignment models.
     * @return mixed
     */
    public function actionIndex() {
//        echo "123";
//        exit;
        $searchModel = new ConsignmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Consignment model.
     * @param integer $Consignment_no
     * @param string $PONO
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Consignment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Consignment();
        if (date('m') >= 4) {
            $startdate = date('Y') . '-04-01';
            $enddate = date('Y') + 1;
            $enddate = $enddate . '-03-31';
            $year = date('Y');
            $newyear = date('y');
        } else {
            $startdate = date('Y') - 1;
            $startdate = $startdate . '-04-01';
            $enddate = date('Y');
            $enddate = $enddate . '-03-31';
            $year = date('Y') - 1;
            $newyear = date('y') - 1;
        }
        $query = "SELECT ifnull(max(CONSIGNMENTNO),0)+1 as CONSIGNMENTNO from tb_consignment WHERE CONS_DATE>='$startdate' and CONS_DATE<='$enddate'";
        $connection = Yii::$app->db;
        $command = $connection->createCommand($query);
        $dataReader = $command->query();
        $new_number = $dataReader->read();
        $new = str_pad($new_number['CONSIGNMENTNO'], 3, 0, STR_PAD_LEFT);
        $model->CONSIGNMENTNO = $new;
        $new = 'C' . $newyear . $new;
        $model->CONSIGNMENTID = $new;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->CONSIGNMENTID]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Consignment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $Consignment_no
     * @param string $PONO
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->CONSIGNMENTID]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Consignment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $Consignment_no
     * @param string $PONO
     * @return mixed
     */
    public function actionDelete($CONSIGNMENTID) {
        $this->findModel($CONSIGNMENTID)->delete();

        return $this->redirect(['index']);
    }

    public function actionGetvendordata($PONO) {
//        echo "123";
//        exit();
        
        $result = file_get_contents("http://172.16.15.95/getCoWAADetails.php?requesttype=VendorDetailsFromPO&parameter=$PONO");
        return $result;
//        return $this->redirect(['form']);
//        
    }
    public function actionGetpolist($PONO){
        $result = file_get_contents("http://172.16.15.95/getCoWAADetails.php?requesttype=ConsignmentPOList&parameter=$PONO");
        return $result;
    }
    public function actionAgainstfe($id)
    {
        $result = file_get_contents("http://172.16.15.95/getCoWAADetails.php?requesttype=AgainstFEPOList&parameter=$id");
        return $result;
    }
    public function actionGetenquirydata($id)
    {
        $result = file_get_contents("http://172.16.15.95/getCoWAADetails.php?requesttype=EnquiryList&parameter=$id");
        return $result;
    }
    /**
     * Finds the Consignment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Consignment_no
     * @param string $PONO
     * @return Consignment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($CONSIGNMENTID) {
        if (($model = Consignment::findOne(['CONSIGNMENTID' => $CONSIGNMENTID])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionCustomduty() {
        $model = new CustomDuty();

        if ($model->load(Yii::$app->request->post())) {
            

            if ($model->validate()) {
                    $a = split('-',$model->CONSIGNMENTNO );
//                    echo $a[0];
//                exit();
//                echo $model->CONSIGNMENTNO=$a[0];
//                echo $model->CUSTOMDUTY;

//            
                $data = $this->findModel($model->CONSIGNMENTNO=$a[0]);
                $data->CUSTOMDUTY = $model->CUSTOMDUTY;
                $data->update();
                // form inputs are valid, do something here
            }
        } else {
            return $this->render('customduty', [
                        'model' => $model,
            ]);
        }

        return $this->render('customduty', [
                    'model' => $model,
        ]);
    }

    public function actionWarehousecharges() {
        $model = new WarehouseCharges();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                
                $b = split('-',$model->CONSIGNMENTNO );
//                 echo $model->CONSIGNMENTNO=$b[0];
//                echo $model->WAREHOUSE_CHARGE;
//                exit();
                // form inputs are valid, do something here
                $data = $this->findModel($model->CONSIGNMENTNO=$b[0]);
//                echo $model->CONSIGNMENTNO;
//                exit();
                $data->WAREHOUSE_CHARGE = $model->WAREHOUSE_CHARGE;
                $data->update();
            }
        } else {
            return $this->render('warehousecharges', [
                        'model' => $model,
            ]);
        }

        return $this->render('warehousecharges', [
                    'model' => $model,
        ]);
    }

    public function actionFindconsid($financialyear) {

        $startdate = substr($financialyear, 0, 4) . '-04-01';
        $enddate = substr($financialyear, 5, 4) . '-03-31';
        $sql = "SELECT CONSIGNMENTID,PONO from tb_consignment WHERE CONS_DATE between '$startdate' and '$enddate' order by CONSIGNMENTID";
        $data = Consignment::findBySql($sql)->all();
        foreach ($data as $info) {
            echo $info->CONSIGNMENTID."-".$info->PONO ;
            
            echo "~";
        }
    }

    public function actionCharges($id) {
        $sql = "SELECT WAREHOUSE_CHARGE FROM tb_consignment WHERE CONSIGNMENTID = '$id' ";
        $data = Consignment::findBySql($sql)->all();

        foreach ($data as $info) {
            echo $info->WAREHOUSE_CHARGE;
        }
    }

    public function actionCustom($id) {
        $sql = "SELECT CUSTOMDUTY FROM tb_consignment WHERE CONSIGNMENTID = '$id' ";
        $data = Consignment::findBySql($sql)->all();

        foreach ($data as $info) {
            echo $info->CUSTOMDUTY;
        }
    }
    
    public function actionInvoice($id){
        $sql = "SELECT INVOICENO,INVOICEDATE FROM tb_consignment WHERE PONO = '$id'";
        $data = Consignment::findBySql($sql)->all();
        foreach ($data as $info){
            echo $info->INVOICENO;
            echo ",";
            echo $info->INVOICEDATE;
        }
    }

    
    public function actionConsignmentdocuments() {
        $model = new ConsignmentRelatedDocuments();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $server = $_SERVER['SERVER_NAME'];
                $a = split("-",$model->Consignment_no);
                $b =  $model->Select_signatory;
                
                
                if($model->ANNEXURE_1 == 1)
                {
                    
                    $exp_pdf = "/var/www/html/report/annexure1_$a[0].pdf";
                    
                    
                    exec("/var/www/html/consigment_reports/newTomcat/jdk1.7.0_55/bin/java 2>&1 -jar //var//www//html//consigment_reports//JReport.jar //var//www//html//consigment_reports//Annexure1.jasper 'CONSIGNMENTID=$a[0]' $exp_pdf");
                 echo "<script type='text/javascript' language='javascript'>window.open('http://$server/report/annexure1_$a[0].pdf');</script>";
//                       header("Content-type: application/pdf");
//                    ob_clean();
//                    flush();
//                    readfile($exp_pdf);
//            
                }   
                if($model->Authorisation_letter_of_CHA== 1)
                {
                    $exp_pdf = "/var/www/html/report/auth_'$a[0]'.pdf";
                    exec("/var/www/html/consigment_reports/newTomcat/jdk1.7.0_55/bin/java 2>&1 -jar //var//www//html//consigment_reports//JReport.jar //var//www//html//consigment_reports//auth.jasper 'CONSIGNMENTID=$a[0]~EMPLOYEENAME=$b' $exp_pdf");
                   echo "<script type='text/javascript' language='javascript'>window.open('http://$server/report/auth_$a[0].pdf');</script>";

            
                }
                if ($model->CERTIFICATE==1)
                {
                    $exp_pdf = "/var/www/html/report/certificate_$a[0].pdf";
                    exec("/var/www/html/consigment_reports/newTomcat/jdk1.7.0_55/bin/java 2>&1 -jar //var//www//html//consigment_reports//JReport.jar //var//www//html//consigment_reports//CERTIFICATE.jasper 'CONSIGNMENTID=$a[0]' $exp_pdf");
                    echo "<script type='text/javascript' language='javascript'>window.open('http://$server/report/certificate_$a[0].pdf');</script>";
                }
                if ($model->RD_Letter==1)
                {
                    $exp_pdf = "/var/www/html/report/rdletter_$a[0].pdf";
                    exec("/var/www/html/consigment_reports/newTomcat/jdk1.7.0_55/bin/java 2>&1 -jar //var//www//html//consigment_reports//JReport.jar //var//www//html//consigment_reports//RDLetter.jasper 'CONSIGNMENTID=$a[0]~EMPLOYEENAME=$b' $exp_pdf");
                   echo "<script type='text/javascript' language='javascript'>window.open('http://$server/report/rdletter_$a[0].pdf');</script>";
                }
                if ($model->Consignment_covering_letter==1)
                {
                     $exp_pdf = "/var/www/html/report/consignmentcoveringletter_$a[0].pdf";
                    exec("/var/www/html/consigment_reports/newTomcat/jdk1.7.0_55/bin/java 2>&1 -jar //var//www//html//consigment_reports//JReport.jar //var//www//html//consigment_reports//ConsignmentCoveringLetter.jasper 'CONSIGNMENTID=$a[0]~EMPLOYEENAME=$b' $exp_pdf");
                   echo "<script type='text/javascript' language='javascript'>window.open('http://$server/report/consignmentcoveringletter_$a[0].pdf');</script>";
                }
                if ($model->Custom_duty_challan==1)
                {
                      $exp_pdf = "/var/www/html/report/customdutychallan_$a[0].pdf";
                    exec("/var/www/html/consigment_reports/newTomcat/jdk1.7.0_55/bin/java 2>&1 -jar //var//www//html//consigment_reports//JReport.jar //var//www//html//consigment_reports//CustomDutyChallan.jasper 'CONSIGNMENTID=$a[0]~EMPLOYEENAME=$b' $exp_pdf");
                   echo "<script type='text/javascript' language='javascript'>window.open('http://$server/report/customdutychallan_$a[0].pdf');</script>";
                }
                if($model ->DECLARATION==1)
                {
                    $exp_pdf = "/var/www/html/report/declaration_$a[0].pdf";
                    exec("/var/www/html/consigment_reports/newTomcat/jdk1.7.0_55/bin/java 2>&1 -jar //var//www//html//consigment_reports//JReport.jar //var//www//html//consigment_reports//DECLARATION.jasper 'CONSIGNMENTID=$a[0]~EMPLOYEENAME=$b' $exp_pdf");
                    echo "<script type='text/javascript' language='javascript'>window.open('http://$server/report/declaration_$a[0].pdf');</script>";
                }
                if($model->CHA_Authorisation_letter==1)
                {
                    $exp_pdf = "/var/www/html/report/esaauthority_$a[0].pdf";
                    exec("/var/www/html/consigment_reports/newTomcat/jdk1.7.0_55/bin/java 2>&1 -jar //var//www//html//consigment_reports//JReport.jar //var//www//html//consigment_reports//ESA_Authority.jasper 'CONSIGNMENTID=$a[0]~EMPLOYEENAME=$b' $exp_pdf");
                   
                    echo "<script type='text/javascript' language='javascript'>window.open('http://$server/report/esaauthority_$a[0].pdf');</script>";
                }
                if($model->DEC_Covering_Letter==1)
                {
                    $exp_pdf = "/var/www/html/report/deccoveringletter_$a[0].pdf";
                    exec("/var/www/html/consigment_reports/newTomcat/jdk1.7.0_55/bin/java 2>&1 -jar //var//www//html//consigment_reports//JReport.jar //var//www//html//consigment_reports//CustomDutyExemptionCoverLetter.jasper 'CONSIGNMENTID=$a[0]~EMPLOYEENAME=$b' $exp_pdf");
                   
                    echo "<script type='text/javascript' language='javascript'>window.open('http://$server/report/deccoveringletter_$a[0].pdf');</script>";
                }
                if($model->DEC_Letter_General==1)
                {
                    $exp_pdf = "/var/www/html/report/declettergeneral_$a[0].pdf";
                    exec("/var/www/html/consigment_reports/newTomcat/jdk1.7.0_55/bin/java 2>&1 -jar //var//www//html//consigment_reports//JReport.jar //var//www//html//consigment_reports//CustomDutyExemptionForm.jasper 'CONSIGNMENTID=$a[0]~EMPLOYEENAME=$b' $exp_pdf");
                   
                    echo "<script type='text/javascript' language='javascript'>window.open('http://$server/report/declettergeneral_$a[0].pdf');</script>";
                }
                if($model->DEC_letter_Payload==1)
                {
                    $exp_pdf = "/var/www/html/report/declettergeneral_$a[0].pdf";
                    exec("/var/www/html/consigment_reports/newTomcat/jdk1.7.0_55/bin/java 2>&1 -jar //var//www//html//consigment_reports//JReport.jar //var//www//html//consigment_reports//CustomDutyExemptionForm.jasper 'CONSIGNMENTID=$a[0]~EMPLOYEENAME=$b' $exp_pdf");
                   
                    echo "<script type='text/javascript' language='javascript'>window.open('http://$server/report/declettergeneral_$a[0].pdf');</script>";
                }
                if($model->FF_Payment_Note==1)
                {
                    $exp_pdf = "/var/www/html/report/ffpaymentnote_$a[0].pdf";
                    exec("/var/www/html/consigment_reports/newTomcat/jdk1.7.0_55/bin/java 2>&1 -jar //var//www//html//consigment_reports//JReport.jar //var//www//html//consigment_reports//Paymentnoteac.jasper 'CONSIGNMENTID=$a[0]~EMPLOYEENAME=$b' $exp_pdf");
                   
                    echo "<script type='text/javascript' language='javascript'>window.open('http://$server/report/ffpaymentnote_$a[0].pdf');</script>";
                }
                if($model->Delivery_order==1)
                {
                    $exp_pdf = "/var/www/html/report/deliveryorder_$a[0].pdf";
                    exec("/var/www/html/consigment_reports/newTomcat/jdk1.7.0_55/bin/java 2>&1 -jar //var//www//html//consigment_reports//JReport.jar //var//www//html//consigment_reports//SBI_DO.jasper 'CONSIGNMENTID=$a[0]~EMPLOYEENAME=$b' $exp_pdf");
                   
                    echo "<script type='text/javascript' language='javascript'>window.open('http://$server/report/deliveryorder_$a[0].pdf');</script>";
                }
                if($model->Freight_certificate==1)
                {
                    $exp_pdf = "/var/www/html/report/freightcertificate_$a[0].pdf";
                    exec("/var/www/html/consigment_reports/newTomcat/jdk1.7.0_55/bin/java 2>&1 -jar //var//www//html//consigment_reports//JReport.jar //var//www//html//consigment_reports//SBI_FRC.jasper 'CONSIGNMENTID=$a[0]~EMPLOYEENAME=$b' $exp_pdf");
                   
                    echo "<script type='text/javascript' language='javascript'>window.open('http://$server/report/freightcertificate_$a[0].pdf');</script>";
                }
                if($model->Payment_note_for_wh_charge==1)
                {
                    $exp_pdf = "/var/www/html/report/paymentnoteforwhcharge_$a[0].pdf";
                    exec("/var/www/html/consigment_reports/newTomcat/jdk1.7.0_55/bin/java 2>&1 -jar //var//www//html//consigment_reports//JReport.jar //var//www//html//consigment_reports//Payment_NoteWHC.jasper 'CONSIGNMENTID=$a[0]~EMPLOYEENAME=$b' $exp_pdf");
                    
                    echo "<script type='text/javascript' language='javascript'>window.open('http://$server/report/paymentnoteforwhcharge_$a[0].pdf');</script>";
                }
                if($model->Mumabi_octroi==1)
                {
                    $exp_pdf = "/var/www/html/report/mumbaioctroi_$a[0].pdf";
                    exec("/var/www/html/consigment_reports/newTomcat/jdk1.7.0_55/bin/java 2>&1 -jar //var//www//html//consigment_reports//JReport.jar //var//www//html//consigment_reports//OctriExemption_Mumbai.jasper 'CONSIGNMENTID=$a[0]~EMPLOYEENAME=$b' $exp_pdf");
                   
                    echo "<script type='text/javascript' language='javascript'>window.open('http://$server/report/mumbaioctroi_$a[0].pdf');</script>";
                }
                    
                // form inputs are valid, do something here
                
            }
        }

        return $this->render('consignmentdocuments', [
                    'model' => $model,
        ]);
    }

//    public function actionTest()
//    {
//       $this->redirect(['file:///var/www/html/PP/backend/annexure1.pdf)']);
//    }
    

public function actionPoprint()
{
    $model = new poprint();

    if ($model->load(Yii::$app->request->post())) {
        if ($model->validate()) {
            
            // form inputs are valid, do something here
            return;
        }
    }

    return $this->render('poprint', [
        'model' => $model,
    ]);
}
public function actionPoannexure()
{
    $model = new poannexure();

    if ($model->load(Yii::$app->request->post())) {
        if ($model->validate()) {
            // Put pdf generation command here
            //exec("");
            
            $a = split("--",$model->Select_PONO);
            $exp_pdf = "/var/www/html/report/poannexure_$a[0].pdf";
            exec("/var/www/html/consigment_reports/newTomcat/jdk1.7.0_55/bin/java 2>&1 -jar //var//www//html//consigment_reports//JReport.jar //var//www//html//consigment_reports//PO_Annexure.jasper 'PONO=$a[0]' $exp_pdf" );
            echo "<script type='text/javascript' language='javascript'>window.open('http://$server/report/poannexure_$a[0].pdf');</script>";
            
        }
    }

    return $this->render('poannexure', [
        'model' => $model,
    ]);
}
public function actionLcpaymentnote()
{
    $model = new LcPaymentnote();

    if ($model->load(Yii::$app->request->post())) {
        if ($model->validate()) {
            // form inputs are valid, do something here
            return;
        }
    }

    return $this->render('lcpaymentnote', [
        'model' => $model,
    ]);
}

public function actionAdvancepayment()
{
    $model = new AdvancePayment();

    if ($model->load(Yii::$app->request->post())) {
        if ($model->validate()) {
            // form inputs are valid, do something here
            return;
        }
    }

    return $this->render('advancepayment', [
        'model' => $model,
    ]);
}



}
