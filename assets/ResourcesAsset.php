<?php

namespace app\assets;

/**
 * Application Asset File.
 */
class ResourcesAsset extends \luya\web\Asset
{
    public $sourcePath = '@app/resources/dist';
    
    public $css = [
        '//fonts.googleapis.com/css?family=Roboto:100,300,400',
        YII_ENV . '/css/main.css'
    ];

    public $js = [
        '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js',
        YII_ENV . '/js/main.min.js'
    ];
    
    public $publishOptions = [
        'only' => [
            'css/*',
            'js/*',
        ]
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
