<?php

namespace app\blocks;

use luya\cms\base\PhpBlock;
use luya\cms\frontend\blockgroups\ProjectGroup;
use luya\cms\helpers\BlockHelper;

/**
 * Callout Block.
 *
 * File has been created with `block/create` command. 
 */
class CalloutBlock extends PhpBlock
{
    /**
     * @var bool Choose whether a block can be cached trough the caching component. Be carefull with caching container blocks.
     */
    public $cacheEnabled = false;
    
    /**
     * @var int The cache lifetime for this block in seconds (3600 = 1 hour), only affects when cacheEnabled is true
     */
    public $cacheExpiration = 3600;

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
        return 'Callout';
    }
    
    /**
     * @inheritDoc
     */
    public function icon()
    {
        return 'chat'; // see the list of icons on: https://design.google.com/icons/
    }
 
    /**
     * @inheritDoc
     */
    public function config()
    {
        return [
            'vars' => [
                 ['var' => 'text', 'label' => 'Text', 'type' => self::TYPE_TEXTAREA, 'options' => ['markdown' => true]],
                 ['var' => 'bgImage', 'label' => 'Background Image', 'type' => self::TYPE_IMAGEUPLOAD, 'options' => ['no_filter' => false]],
            ],
            'placeholders' => [
                ['var' => 'itemCallout', 'label' => 'Callout Right Content'],
            ],
        ];
    }
    
    /**
     * @inheritDoc
     */
    public function extraVars()
    {
        return [
            'bgImage' => BlockHelper::imageUpload($this->getVarValue('bgImage'), false, true),
            'bgImageAdmin' => BlockHelper::imageUpload($this->getVarValue('bgImage'), 'medium-thumbnail', true),
        ];
    }

    /**
     * {@inheritDoc} 
     *
     * @param {{extras.bgImage}}
     * @param {{vars.bgImage}}
     * @param {{vars.text}}
     * @param {{vars.title}}
    */
    public function admin()
    {
        return '<h3 class="mb-0 bg-secondary p-2 rounded text-light"><b>Callout Block</b><i class="material-icons float-right">' . $this->icon() . '</i></h3><hr class="mb-2">' .
            '{% if vars.title is not empty %}' .
            '<h3 class="mb-3">{{vars.title}}</h3>' .
            '{% endif %}'.
            '{% if vars.text is not empty %}' .
            '<b>Text: </b>{{vars.text}} <br/>'.
            '{% endif %}'.
            '{% if vars.bgImage is not empty %}' .
            '<img class="d-block" src="{{extras.bgImage.source}}" alt="Callout image">' .
            '{% endif %}';
    }
}