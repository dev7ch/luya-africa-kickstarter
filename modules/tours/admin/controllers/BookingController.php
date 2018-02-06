<?php

namespace app\modules\tours\admin\controllers;

/**
 * Booking Controller.
 * 
 * File has been created with `crud/create` command. 
 */
class BookingController extends \luya\admin\ngrest\base\Controller
{
    /**
     * @var string The path to the model which is the provider for the rules and fields.
     */
    public $modelClass = 'app\modules\tours\models\Booking';
}