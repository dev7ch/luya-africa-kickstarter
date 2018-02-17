<?php

/**
 * This config should be used on development environment.
 * The development environment can be used to show the website to an agency / the designer and prepare it for prep deployment.
 */

/*
 * Enable or disable the debugging, if those values are deleted YII_DEBUG is false and YII_ENV is prod.
 * The YII_ENV value will also be used to load assets based on environment (see assets/ResourcesAsset.php)
 */
defined('YII_ENV') or define('YII_ENV', 'dev');
defined('YII_DEBUG') or define('YII_DEBUG', false);


$config = [
    /*
     * For best interoperability it is recommend to use only alphanumeric characters when specifying an application ID.
     */
    'id' => 'luya-africa',
    /*
     * The name of your site, will be display on the login screen
     */
    'siteTitle' => 'Africa Kickstarter',
    /*
     * Let the application know which module should be executed by default (if no url is set). This module must be included
     * in the modules section. In the most cases you are using the cms as default handler for your website. But the concept
     * of LUYA is also that you can use a website without the CMS module!
     */
    'defaultRoute' => 'cms',
    /*
     * Define the basePath of the project (Yii Configration Setup)
     */
    'basePath' => dirname(__DIR__),
    'modules' => [
        /*
         * If you have other admin modules (e.g. cmsadmin) then you going to need the admin. The Admin module provides
         * a lot of functionality, like storage, user, permission, crud, etc. But the basic concept of LUYA is also that you can use LUYA without the
         * admin module.
         *
         * @secureLogin: (boolean) This will activate a two-way authentification method where u get a token sent by mail, for this feature
         * you have to make sure the mail component is configured correctly. You can test this with console command `./vendor/bin/luya health/mailer`.
         */
        'admin' => [
            'class' => 'luya\admin\Module',
            'secureLogin' => false, // when enabling secure login, the mail component must be proper configured otherwise the auth token mail will not send.
            'interfaceLanguage' => 'en', // Admin interface default language. Currently supported: en, de, ru, es, fr, ua, it, el, vi, pt, fa
        ],
        /*
         * Frontend module for the `cms` module.
         */
        'cms' => [
            'class' => 'luya\cms\frontend\Module',
            'contentCompression' => true, // compressing the cms output (removing white spaces and newlines)
        ],
        /*
         * Admin module for the `cms` module.
         */
        'cmsadmin' => [
            'class' => 'luya\cms\admin\Module',
            'hiddenBlocks' => [],
            'blockVariations' => [],
        ],
        'toursfrontend' => [
            'class' => 'app\modules\tours\frontend\Module',
            'useAppViewPath' => true, // When enabled the views will be looked up in the @app/views folder, otherwise the views shipped with the module will be used.
        ],
        'toursadmin' => 'app\modules\tours\admin\Module',

        'themeadmin' => 'app\modules\theme\admin\Module',

        'contactform' => [
            'class' => 'luya\contactform\Module',
            'useAppViewPath' => true,
            'mailTitle' => 'Booking Form',
            'attributes' => [
                'first_name', 'last_name', 'email', 'phone', 'message',
            ],
            'attributeLabels' => [
                'first_name' => 'First Name',
                'last_name' => 'Last Name',
                'email' => 'E-Mail',
                'phone' => 'Phone',
                'message' => 'Message',
            ],
            'rules' => [
                [['first_name', 'last_name', 'email'], 'required'],
                ['email', 'email'],
                [['phone', 'message'], 'safe'],
            ],
            'callback' => function($model) {
                // insert the name of each contact form into `tours_bookings` table:
            },
            'recipients' => [
                'your@mail.com',
            ]

        ],
    ],
    'components' => [

        /*
         * The composition component handles your languages and they way your urls will look like. The composition components will
         * automatically add the language prefix which is defined in `default` to your url (the language part in the url  e.g. "yourdomain.com/en/homepage").
         *
         * hidden: (boolean) If this website is not multi lingual you can hide the composition, other whise you have to enable this.
         * default: (array) Contains the default setup for the current language, this must match your language system configuration.
         */
        'composition' => [
            'hidden' => true, // no languages in your url (most case for pages which are not multi lingual)
            'default' => ['langShortCode' => 'de'], // the default language for the composition should match your default language shortCode in the langauge table.
        ],
        /*
         * If cache is enabled LUYA will cache cms blocks and speed up the system in different ways. In the prep config
         * we use the DummyCache to imitate the caching behavior, but actually nothing gets cached. In production you should
         * use caching which matches your hosting environment. In most cases yii\caching\FileCache will result in fast website.
         *
         * http://www.yiiframework.com/doc-2.0/guide-caching-data.html#cache-apis
         */
        'cache' => [
            'class' => 'yii\caching\FileCache', // use: yii\caching\FileCache in prod, yii\caching\DummyCache in local
        ],
        /*
    	 * Translation component. If you don't have translations just remove this component and the folder `messages`.
    	 */
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                ],
            ],
        ],

        'assetManager' => [
            'class' => 'luya\web\AssetManager',
            'linkAssets' => true,
        ],
    ],
];

/*
if (YII_DEBUG) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}
*/


return \yii\helpers\ArrayHelper::merge($config, require('env-dev-db.php'));
