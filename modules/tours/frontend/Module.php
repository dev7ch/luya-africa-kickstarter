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
        ['pattern' => 'tours', 'route' => 'toursfrontend/default/index']
    ];
}