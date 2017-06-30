<?php

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'defaultRoute'=>'index',
    'language' =>'zh-CN',
    'aliases'=>[
        '@myMailer/mailerqueue' => '@vendor/myMailer/mailerqueue/src',
    ],
    'components' => [
        'session' => [
            'class' => 'yii\redis\Session',
            'redis' => [
                'hostname'=>'127.0.0.1',
                'port'=>6381,
                'database'=>4,
                'password'  => 'fujiajun21',
            ],
            'keyPrefix'=>'yii2App_'
        ],
        'redis'=> [
            'class' => 'yii\redis\Connection',
            'hostname'=>'127.0.0.1',
            'port'=>6381,
            'database'=>0,
            'password'  => 'fujiajun21',
        ],


        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '-o3uieJuEAW1dTHhfwrmNDKe2uxVOkZn',
        ],
        'cache' => [
            //'class' => 'yii\caching\FileCache',
            'class'  => 'yii\redis\Cache',//使用rides 缓存
            'redis' => [
                'hostname'=>'127.0.0.1',
                'port'=>6381,
                'database'=>2,
                'password'  => 'fujiajun21',
            ]
        ],
        /**
         *  'user' => [
        'identityClass' => 'app\models\User',
        'enableAutoLogin' => true,
        ],
         */
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'idParam' => '__user',
            'identityCookie' => ['name' => '__user_identity','httpOnly'=>true],
            'loginUrl' =>['index/index']
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            //'class' => 'yii\swiftmailer\Mailer',
            'class' => 'myMailer\mailerqueue\MailerQueue', //自定义异步发送邮件
            'db'=>'5',
            'key'=>'mails',
            //'viewPath' => '@modules/views',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,//这句一定有，false发送邮件，true只是生成邮件在runtime文件夹下，不发邮件
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.sina.cn',  //每种邮箱的host配置不一样
                'username' => '18121011667@sina.cn',
                'password' => 'fujiajun21',
                //'port' => '25',
                //'encryption' => 'tls',
                'port' => '465',
                'encryption' => 'ssl'
             ]
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
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
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
        'allowedIPs' => [$_SERVER['REMOTE_ADDR']],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
