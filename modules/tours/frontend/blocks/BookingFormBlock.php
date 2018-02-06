<?php

namespace app\modules\tours\frontend\blocks;

use Yii;
use luya\cms\base\PhpBlock;
use luya\cms\frontend\blockgroups\ProjectGroup;
use \app\modules\tours\models\BookingForm;

/**
 * Booking Form Block.
 *
 * File has been created with `block/create` command. 
 */
class BookingFormBlock extends PhpBlock
{
    /**
     * @var string The module where this block belongs to in order to find the view files.
     */
    public $module = 'toursfrontend';

    /**
     * @var bool Choose whether a block can be cached trough the caching component. Be carefull with caching container blocks.
     */
    public $cacheEnabled = false;
    
    /**
     * @var int The cache lifetime for this block in seconds (3600 = 1 hour), only affects when cacheEnabled is true
     */
    public $cacheExpiration = 3600;

    /**
     * @inheritDoc
     */
    public function blockGroup()
    {
        return ProjectGroup::class;
    }

    /**
     * @inheritDoc
     */
    public function name()
    {
        return 'Booking Form Block';
    }
    
    /**
     * @inheritDoc
     */
    public function icon()
    {
        return 'extension'; // see the list of icons on: https://design.google.com/icons/
    }
 
    /**
     * @inheritDoc
     */
    public function config()
    {
        return [

        ];
    }

    /**
     * @return array|\yii\db\ActiveRecord
     */

    public function getModel()
    {
        $model = BookingForm::find()->one();

        return $model;
    }

    /**
     * @return BookingForm
     */
    public function saveModel()
    {

        $model = new BookingForm();


        // Validate model
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            // table row as array field => model field value (optionally)

            $values = [
                'first_name' => $model->first_name,
                'last_name' => $model->last_name,
                'email' => $model->email,
                'phone' => $model->phone,
                'message' => $model->message,
            ];
            
            $model->attributes = $values;

            $model->save(false);

            if ($model->save()) {

                Yii::$app->session->setFlash('BookingFormBlockSuccess');
                Yii::$app->response->redirect(Yii::$app->request->url);

                // Now you could redirect to a success page or
                // print a success message in the index view
                // return $this->redirect(['/module/controller/index']);
            }
        }

        return $model;
    }


    /**
     * @return array
     */

    public function extraVars()
    {
        return [
            'model' => $this->saveModel(),
        ];
    }

    /**
     * {@inheritDoc} 
     *
    */
    public function admin()
    {
        return '<h5 class="mb-3">Booking Form Block</h5>' .
            '<table class="table table-bordered">' .
            '</table>';
    }
}