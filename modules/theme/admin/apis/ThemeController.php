<?php

namespace app\modules\theme\admin\apis;

/**
 * Theme Settings Controller.
 * 
 * File has been created with `crud/create` command. 
 */
class ThemeController extends \luya\rest\ActiveController
{
    /**
     * @var string The path to the model which is the provider for the rules and fields.
     */
    public $modelClass = 'app\modules\theme\models\Theme';
    public $enableCors = false;
}