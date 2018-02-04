<?php

namespace app\modules\tours\models;

use Yii;
use luya\admin\ngrest\base\NgRestModel;

/**
 * Tour.
 * 
 * File has been created with `crud/create` command. 
 *
 * @property integer $id
 * @property string $title
 * @property text $text
 * @property string $image
 * @property string $link
 * @property string $position_index
 * @property integer $is_published
 */
class Tour extends NgRestModel
{
    /**
     * @inheritdoc
     */
    public $i18n = ['title', 'text', 'image', 'link', 'position_index'];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tours';
    }

    /**
     * @inheritdoc
     */
    public static function ngRestApiEndpoint()
    {
        return 'api-tours-tour';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'text' => Yii::t('app', 'Text'),
            'image' => Yii::t('app', 'Image'),
            'link' => Yii::t('app', 'Link'),
            'position_index' => Yii::t('app', 'Position'),
            'is_published' => Yii::t('app', 'Published'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['text'], 'string'],
            [['is_published'], 'integer'],
            [['title', 'image', 'link', 'position_index'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function genericSearchFields()
    {
        return ['title', 'text', 'image', 'link', 'position_index'];
    }

    /**
     * @inheritdoc
     */
    public function ngRestAttributeTypes()
    {
        return [
            'title' => 'text',
            'text' => 'textarea',
            'image' => 'image',
            'link' => 'link',
            'position_index' => 'number',
            'is_published' => 'toggleStatus',
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestScopes()
    {
        return [
            ['list', ['title', 'image', 'is_published', 'position_index']],
            [['create', 'update'], ['title', 'text', 'image', 'link', 'position_index', 'is_published']],
            ['delete', true],
        ];
    }

    public function getImage() {


        return $image;
    }
}