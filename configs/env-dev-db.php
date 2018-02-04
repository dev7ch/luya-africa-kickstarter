<?php
$config = include('/home/devch/private/africa.cfg.php'); // store your db login in a secure, not public location on your server.

return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=' . $config['servername'] . ';dbname=' . $config['dbname'],
            'username' => $config['username'],
            'password' => $config['password'],
            'charset' => 'utf8',

            // in productive environments you can enable the schema caching
            // 'enableSchemaCache' => true,
            // 'schemaCacheDuration' => 43200,
        ]
    ]
];
