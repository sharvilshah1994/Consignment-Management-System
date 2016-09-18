<?php

namespace backend\models;

class MenuController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
