<?php

namespace app\modules\tours\frontend\controllers;

class DefaultController extends \luya\web\Controller {


    public function actionIndex()
    {
        // change the title of the page
        $this->view->title = 'Tours';
        $model = \app\modules\tours\models\Tour::find()->where(['is_published' => '1'])->orderBy(['position_index' => SORT_DESC])->all();

        // render your file
        return $this->render('index', [
            'model' => $model
        ]);
    }




}