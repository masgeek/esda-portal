<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'name' => YII_DEBUG ? 'ESDA PORTAL DEV' : 'ESDA PORTAL',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language'=>'en', //allows for translation,
    'aliases' => [
        '@bower' => 'vendor/bower-asset',
    ],
    /* Modules */
    'modules' => [
        'users' => [
            'class' => 'app\modules\user\users',
            'defaultRoute' => 'profile', //default controller
        ],
        //webshell
        'webshell' => [
            'class' => 'samdark\webshell\Module',
            // 'yiiScript' => Yii::getAlias('@root'). '/yii', // adjust path to point to your ./yii script
            'allowedIPs' => ['127.0.0.1', '::1', '41.89.65.170'],
        ],
    ],
    /* Components */
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'DPfBaTZhaeVQUF7vzn-JREtUJKiSYCQc',
        ],
        'assetManager' => [
            'class' => 'yii\web\AssetManager',
            'appendTimestamp' => true,
            'linkAssets' => true,
            'forceCopy' => YII_DEBUG,
        ],
        /* custom theme templates*/
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@app/themes/default'
                ],
                'baseUrl' => 'themes/default' /* base url */
            ]
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\LoginModel',
            //'identityClass' => 'app\models\User',
            'enableAutoLogin' => false,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => require(__DIR__ . '/esd_db.php'),

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                //default rules
                '<controller:\w+>/<id:\d+>' => '<controller>',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                //custom rules
                '/' => 'site',
                'account' => 'users/profile',
                'register' => 'users/profile/create',
                'recover' => 'users/default/recover',
            ],
        ],

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
