<?php

namespace app\assets;

/**
 * Application Asset File.
 */
class ResourcesAsset extends \luya\web\Asset
{
    public $sourcePath = '@app/resources/dist';
    
    public $css = [
        '//fonts.googleapis.com/css?family=Open+Sans:300,400%7CSlabo+27px',
        YII_ENV . '/css/main.css'
    ];

    public $js = [
        '//maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js',
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
