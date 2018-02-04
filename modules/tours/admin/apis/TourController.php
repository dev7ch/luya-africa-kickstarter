<?php

namespace app\modules\tours\admin\apis;

/**
 * Tour Controller.
 * 
 * File has been created with `crud/create` command. 
 */
class TourController extends \luya\admin\ngrest\base\Api
{
    /**
     * @var string The path to the model which is the provider for the rules and fields.
     */
    public $modelClass = 'app\modules\tours\models\Tour';
}