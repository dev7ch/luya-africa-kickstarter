<?php

namespace app\assets;

/**
 * Application Asset File.
 */
class HeadAsset extends \luya\web\Asset
{
    public $sourcePath = '@app/resources/dist/';

    public $js = [
        '//use.fontawesome.com/releases/v5.0.6/js/all.js',
    ];

    public $jsOptions = [
        'position' => \luya\web\View::POS_HEAD,
        'defer' => 'defer'
    ];

}
