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
            //'enableSchemaCache' => true,
            //'schemaCacheDuration' => 43200,
        ],

                /*
         * Add your smtp connection to the mail component to send mails (which is required for secure login), you can test your
         * mail component with the luya console command ./vendor/bin/luya health/mailer.
         */
        'mail' => [
            'host' => $config['email_host'],
            'username' => $config['email_name'],
            'password' =>  $config['email_passwort'],
            'from' =>  $config['email_froml'],
            'fromName' =>  $config['email_from_name'],
            'isSMTP' => false,
        ],
    ]
];
