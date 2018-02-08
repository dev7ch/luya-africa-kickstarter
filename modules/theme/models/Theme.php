<?php

namespace app\modules\theme\models;

use Yii;
use luya\admin\ngrest\base\NgRestModel;

/**
 * Theme Settings.
 * 
 * File has been created with `crud/create` command. 
 *
 * @property integer $id
 * @property string $logo
 * @property text $site_name
 * @property text $company_email
 * @property text $facebook
 * @property text $youtube
 * @property text $insta
 * @property integer $is_active
 */
class Theme extends NgRestModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'theme';
    }

    /**
     * @inheritdoc
     */
    public static function ngRestApiEndpoint()
    {
        return 'api-theme-settings';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'logo' => Yii::t('app', 'Logo'),
            'site_name' => Yii::t('app', 'Site Name'),
            'company_email' => Yii::t('app', 'Company Email'),
            'facebook' => Yii::t('app', 'Facebook'),
            'youtube' => Yii::t('app', 'Youtube'),
            'insta' => Yii::t('app', 'Insta'),
            'is_active' => Yii::t('app', 'Is Active'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['site_name', 'company_email', 'facebook', 'youtube', 'insta'], 'string'],
            [['is_active'], 'integer'],
            [['logo'], 'safe'],
            [['company_email'], 'email'],
            [['logo'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function genericSearchFields()
    {
        return ['logo', 'site_name', 'company_email', 'facebook', 'youtube', 'insta'];
    }

    /**
     * @inheritdoc
     */
    public function ngRestAttributeTypes()
    {
        return [
            'logo' => 'text',
            'site_name' => 'text',
            'company_email' => 'text',
            'facebook' => 'text',
            'youtube' => 'text',
            'insta' => 'text',
            'is_active' => 'toggleStatus',
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestScopes()
    {
        return [
            ['list', ['logo', 'site_name', 'company_email', 'facebook', 'youtube', 'insta', 'is_active']],
            [['create', 'update'], ['logo', 'site_name', 'company_email', 'facebook', 'youtube', 'insta', 'is_active']],
            ['delete', false],
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['restcreate'] = ['logo', 'site_name', 'company_email', 'facebook', 'youtube', 'insta', 'is_active'];
        $scenarios['restupdate'] = ['logo', 'site_name', 'company_email', 'facebook', 'youtube', 'insta', 'is_active'];
        return $scenarios;
    }
}