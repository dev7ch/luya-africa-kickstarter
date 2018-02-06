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

    public $first_name;
    public $last_name;
    public $phone;
    public $email;
    public $message;

    public function rules()
    {
        return [
            [['first_name', 'email'], 'required'],
            [['email'], 'email'],
            [['last_name', 'phone', 'message', 'ip', 'date', 'is_confirmed'],'safe']
        ];
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