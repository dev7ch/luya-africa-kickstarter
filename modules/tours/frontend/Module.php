<?php

namespace app\modules\tours\frontend;

/**
 * Tours Admin Module.
 *
 * File has been created with `module/create` command. 
 */
class Module extends \luya\base\Module
{
    public $useAppViewPath = true;

    public $urlRules = [
        // This module is used via the cms module block, patterns arn´t required as long you don´t use it on it´s own url.
        //['pattern' => 'tours-overview', 'route' => 'toursfrontend/default/index']
    ];
}