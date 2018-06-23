<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=127.0.0.1;dbname=sale_online',
            'username' => 'wskeee',
            'password' => '1234',
            'charset' => 'utf8',
            'enableSchemaCache' => true,
            'tablePrefix' => 'sale_'   //加入前缀名称fc_
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
    'as access' => [
        'allowActions' => [
            /* 本地开发模式下可用gii */
            'gii/*',
        ]
    ],
];
