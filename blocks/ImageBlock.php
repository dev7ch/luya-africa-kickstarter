<?php

namespace app\blocks;

use luya\cms\base\PhpBlock;
use luya\cms\frontend\blockgroups\ProjectGroup;
use luya\cms\helpers\BlockHelper;

/**
 * Image Block.
 *
 * File has been created with `block/create` command. 
 */
class ImageBlock extends PhpBlock
{
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
        return 'Image and Text';
    }

    public $isContainer = false;
    
    /**
     * @inheritDoc
     */
    public function icon()
    {
        return 'burst_mode'; // see the list of icons on: https://design.google.com/icons/
    }
 
    /**
     * @inheritDoc
     */
    public function config()
    {
        return [
            'vars' => [
                 ['var' => 'image', 'label' => 'Image', 'type' => self::TYPE_IMAGEUPLOAD, 'options' => ['no_filter' => false]],
                 ['var' => 'caption', 'label' => 'Caption', 'type' => self::TYPE_TEXT],
                 ['var' => 'style', 'label' => 'Position', 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                     'left' => 'Text Left',
                     'right' => 'Text Right'
                 ])],
            ],
            'cfgs' => [
                 ['var' => 'cssClass', 'label' => 'Wrapper CSS Class', 'type' => self::TYPE_TEXT],
                 ['var' => 'imgClass', 'label' => 'Image CSS Class', 'type' => self::TYPE_TEXT],
                 ['var' => 'asBg', 'label' => 'CSS Class', 'type' => self::TYPE_CHECKBOX],
                 ['var' => 'hideMobile', 'label' => 'Hide Image small Screen', 'type' => self::TYPE_CHECKBOX],
                 ['var' => 'spacing', 'label' => 'Spacing', 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                     'top' => 'Spacing Top',
                     'bottom' => 'Spacing Bottom',
                     'both' => 'Spacing Both'
                 ])],
            ],
            'placeholders' => [
                ['var' => 'imgText', 'label' => 'Image Text Content'],
            ],
        ];
    }
    
    /**
     * @inheritDoc
     */
    public function extraVars()
    {
        return [
            'image' => BlockHelper::imageUpload($this->getVarValue('image'), 'large-thumbnail', true),
            'imageAdmin' => BlockHelper::imageUpload($this->getVarValue('image'), 'medium-thumbnail', true),
        ];
    }

    /**
     * {@inheritDoc} 
     *
     * @param {{cfgs.cssClass}}
     * @param {{extras.image}}
     * @param {{vars.caption}}
     * @param {{vars.image}}
     * @param {{vars.style}}
    */
    public function admin()
    {
        return '<h3 class="mb-0 bg-secondary p-2 rounded text-light"><b>Image Text Block</b><i class="material-icons float-right">' . $this->icon() . '</i></h3><hr class="mb-2">' .
            '{% if vars.caption is not empty %}' .
            '<h3 class="mb-3">{{vars.caption}}</h3>' .
            '{% endif %}'.
            '{% if vars.image is not empty %}' .
            '<div class="d-block"><img alt="admin-img" src="{{extras.imageAdmin.source}}"/></div>' .
            '{% endif %}'.
            '{% if vars.caption is not empty %}' .
            '<b>Caption: </b>{{vars.caption}}</br>' .
            '{% endif %}'.
            '{% if vars.style is not empty %}' .
            '<b>Position: {{vars.style}}</br>' .
            '{% endif %}'.
            '{% if cfgs.cssClass is not empty %}' .
            '<b>CSS Class:</b>{{cfgs.cssClass}}</br>' .
            '{% endif %}';
    }
}