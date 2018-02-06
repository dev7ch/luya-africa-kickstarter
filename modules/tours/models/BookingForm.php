<?php

namespace app\modules\tours\models;

use Yii;

class BookingForm extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tours_bookings';
    }

    /**
     * @inheritdoc
     */
    public static function ngRestApiEndpoint()
    {
        return 'api-tours-booking';
    }

    /**
     * @inheritdoc
     */
    public function ngRestAttributeTypes()
    {
        return [
            'first_name' => 'text',
            'last_name' => 'text',
            'phone' => 'text',
            'email' => 'text',
            'message' => 'text',
            'ip' => 'text',
            'date' => 'text',
            'is_confirmed' => 'toggleStatus',
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestScopes()
    {
        return [
            [['create', 'update'], ['first_name', 'last_name', 'phone', 'email', 'message', 'ip', 'date', 'is_confirmed']],
            ['delete', true],
        ];
    }


    public $first_name;
    public $last_name;
    public $phone;
    public $email;
    public $message;

    public function rules()
    {
        return [
            [['first_name', 'email'], 'required'],
            ['email', 'email'],
            [['last_name', 'phone', 'message', 'ip', 'date', 'is_confirmed'],'safe']
        ];
    }

    /**
     * @return BookingForm
     */
    public function saveBooking($attr)
    {
        $booking = new BookingForm();
        $booking->attributes = $attr;
        $booking->save();

        return $booking;

    }

    /**
     * @return bool
     */
    public function sendMail()
    {

        $mail = Yii::$app->mail
                ->compose('Success Subject', 'You got mail: ' . print_r($this->attributes, true))
                ->address('you@mail.com')
                ->send();

        return $mail;
    }

}