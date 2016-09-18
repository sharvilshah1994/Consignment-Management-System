<?php

namespace backend\controllers;

use Yii;
use backend\models\Tbpaymentmode;
use backend\models\TbpaymentmodeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\ActiveRecord;
/**
 * TbpaymentmodeController implements the CRUD actions for Tbpaymentmode model.
 */
class TbpaymentmodeController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tbpaymentmode models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TbpaymentmodeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tbpaymentmode model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($ID)
    {
        return $this->render('view', [
            'model' => $this->findModel($ID),
        ]);
    }

    /**
     * Creates a new Tbpaymentmode model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        
        $model = new Tbpaymentmode();
        if ($model->load(Yii::$app->request->post()))
        {
            $sql = "SELECT count(*) FROM tbpaymentmode where PAYTERM='".$model->PAYTERM."'";
            $command = Yii::$app->db->createCommand($sql);
$sum = $command->queryScalar();

            
            
            if ($sum >= 1)
            {
                Yii::$app->db->createCommand()->update('tbpaymentmode', ['PAY_CLAUSE'=>$model->PAY_CLAUSE],"PAYTERM='$model->PAYTERM'")->execute();
//                $data = tbpaymentmode::findBySql("SELECT * from tbpaymentmode where PAYTERM='".$model->PAYTERM."'")->all();
//                $data->PAY_CLAUSE = $model->PAY_CLAUSE;
//                $data->update();
//                foreach ($data as $value){
//                $result->PAY_CLAUSE=$model->PAY_CLAUSE;
//                $result->update();
//                }
                
            }
             else
            {
                
                $model->save();
        }
            // find the result
            // If total =1 then update record
            // Find By ID
            // model.update()
            // else Insert record\
    }
              return $this->render('create', [
                'model' => $model,
                  ]);   
        
        
    }
       
    /**
     * Updates an existing Tbpaymentmode model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID' => $model->ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Tbpaymentmode model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tbpaymentmode model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tbpaymentmode the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
   public function actionPayterm($id)
    {
        $sql = "SELECT PAYTERMFULL,PAY_CLAUSE from tbpaymentmode WHERE ID='$id'";
        $data = Tbpaymentmode::findBySql($sql)->all();
        foreach ($data as $info)
        {
    
            echo $info->PAYTERMFULL."~".$info->PAY_CLAUSE;
            
            
        }
    }
    
    public function actionGetvendordata($PONO)
    {
//        echo "123";
////        exit;
        $result = file_get_contents("http://172.16.15.95/getCoWAADetails.php?requesttype=PaymentTerms&parameter=$PONO");
        return $result;
//        return $this->redirect(['form']);
//        
    }
 
    
    protected function findModel($id)
    {
        if (($model = Tbpaymentmode::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
}
