<?php

namespace app\modules\theme\admin;

/**
 * Theme Admin Module.
 *
 * File has been created with `module/create` command. 
 */
class Module extends \luya\admin\base\Module
{
    public $apis = [
        'api-theme-settings' => 'app\modules\theme\admin\apis\ThemeController',
    ];

    public function getMenu()
    {
        return (new \luya\admin\components\AdminMenuBuilder($this))
            ->node('Theme Settings', 'format_paint')
            ->group('Group')
            ->itemApi('Theme Settings', 'themeadmin/theme/index', 'brush', 'api-theme-settings');
    }
/*
    public $urlRules = [
        ['pattern' => 'admin/theme', 'route' => 'themeadmin/default/index']
    ];

*/
}