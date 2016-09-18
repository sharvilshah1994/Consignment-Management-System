<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);


return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
//	 'view' => [
//        'theme' => [
//            'pathMap' => ['backend/views' => 'backend/web/themes/mytheme'],
//            'baseUrl' => 'backend/web/themes/mytheme/views',
//        ],
//    ],
    'modules' => [],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
//         'view' => [
//        'theme' => [
//            'pathMap' => ['@app/views' => '@webroot/themes/mytheme/views'],
//            'baseUrl' => '@webroot/themes/mytheme/views',
//        ],
//    ],
        'authManager' => 
            [
                'class' => 'yii\rbac\DbManager',
                'defaultRoles' => ['guest'],
            ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,	
];
