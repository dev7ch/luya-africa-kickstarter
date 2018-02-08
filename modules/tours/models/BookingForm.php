<?php

namespace app\modules\tours\models;

use Yii;

class BookingForm extends \luya\admin\ngrest\base\NgRestModel
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

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['restcreate'] = ['first_name','last_name', 'phone', 'message', 'ip', 'date', 'is_confirmed', 'email'];
        $scenarios['restupdate'] = ['first_name','last_name', 'phone', 'message', 'ip', 'date', 'is_confirmed', 'email'];
        return $scenarios;
    }
}