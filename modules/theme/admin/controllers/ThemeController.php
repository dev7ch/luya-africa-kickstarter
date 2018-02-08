<?php

namespace app\modules\theme\admin\controllers;

use app\modules\theme\models\Theme;
/**
 * Theme Settings Controller.
 * 
 * File has been created with `crud/create` command. 
 */
class ThemeController extends \luya\admin\base\Controller
{
    /**
     * @var string The path to the model which is the provider for the rules and fields.
     */
    public $modelClass = Theme::class;

    public function actionIndex()
    {
        $settings = Theme::find()->one();

        return $this->render('index', [
            'settings' => $settings,
        ]);
    }
}

