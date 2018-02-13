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

    //public $verifyCode;

    public function rules()
    {
        return [
            [['first_name', 'email'], 'required'],
            [['email'], 'email'],
            /*['verifyCode', 'captcha', 'captchaAction'=>'site/index'],*/
            [['last_name', 'phone', 'message', 'ip', 'date', 'is_confirmed', 'booked_tour'],'safe']

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