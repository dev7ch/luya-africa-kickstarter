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
        return 'Image Block';
    }

    public $isContainer = false;
    
    /**
     * @inheritDoc
     */
    public function icon()
    {
        return 'extension'; // see the list of icons on: https://design.google.com/icons/
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
            'image' => BlockHelper::imageUpload($this->getVarValue('image'), false, true),
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
        return '<h5 class="mb-3">Image Block</h5>' .
            '<table class="table table-bordered">' .
            '{% if vars.image is not empty %}' .
            '<tr><td><b>Image</b></td><td>{{vars.image}}</td></tr>' .
            '{% endif %}'.
            '{% if vars.caption is not empty %}' .
            '<tr><td><b>Caption</b></td><td>{{vars.caption}}</td></tr>' .
            '{% endif %}'.
            '{% if vars.style is not empty %}' .
            '<tr><td><b>Position</b></td><td>{{vars.style}}</td></tr>' .
            '{% endif %}'.
            '{% if cfgs.cssClass is not empty %}' .
            '<tr><td><b>CSS Class</b></td><td>{{cfgs.cssClass}}</td></tr>' .
            '{% endif %}'.
            '</table>';
    }
}