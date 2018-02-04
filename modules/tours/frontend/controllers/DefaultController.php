<?php

namespace app\modules\tours\frontend\controllers;

class DefaultController extends \luya\web\Controller {


    public function actionIndex()
    {
        // change the title of the page
        $this->view->title = 'Tours';
        $model = \app\modules\tours\models\Tour::find()->all();

        // render your file
        return $this->render('index', [
            'model' => $model
        ]);
    }

}