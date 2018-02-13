<?php

namespace app\modules\tours\models;

use Yii;
use luya\admin\ngrest\base\NgRestModel;

/**
 * Booking.
 * 
 * File has been created with `crud/create` command. 
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $phone
 * @property string $email
 * @property string $booked_tour
 * @property string $message
 * @property string $ip
 * @property string $date
 * @property integer $is_confirmed
 */
class Booking extends NgRestModel
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
    public function ngRestListOrder()
    {
        return ['date' => SORT_ASC];
    }

    /**
     * @inheritdoc
     */

    public function ngRestGroupByField()
    {
        return 'booked_tour';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'booked_tour' => Yii::t('app', 'Tour'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'phone' => Yii::t('app', 'Phone'),
            'email' => Yii::t('app', 'Email'),
            'message' => Yii::t('app', 'Message'),
            'ip' => Yii::t('app', 'Ip'),
            'date' => Yii::t('app', 'Date'),
            'is_confirmed' => Yii::t('app', 'Is Confirmed'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name'], 'required'],
            [['last_name', 'message', 'ip', 'date', 'booked_tour'], 'safe'],
            [['is_confirmed'], 'integer'],
            [['first_name', 'phone', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function genericSearchFields()
    {
        return ['first_name', 'last_name', 'phone', 'email', 'message', 'ip', 'date', 'booked_tour'];
    }

    /**
     * @inheritdoc
     */
    public function ngRestAttributeTypes()
    {
        return [
            'booked_tour' => 'text',
            'first_name' => 'text',
            'last_name' => 'text',
            'phone' => 'text',
            'email' => 'text',
            'message' => 'textarea',
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
            ['list', ['booked_tour', 'first_name', 'last_name', 'email', 'date', 'is_confirmed']],
            [['create', 'update'], ['booked_tour','first_name', 'last_name', 'phone', 'email', 'message', 'ip', 'date', 'is_confirmed']],
            ['delete', true],
        ];
    }
}