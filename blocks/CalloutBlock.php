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
    public $cacheEnabled = true;
    
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
                 ['var' => 'title', 'label' => 'Title', 'type' => self::TYPE_TEXTAREA],
                 ['var' => 'text', 'label' => 'Text', 'type' => self::TYPE_TEXT],
                 ['var' => 'bgImage', 'label' => 'Background Image', 'type' => self::TYPE_IMAGEUPLOAD, 'options' => ['no_filter' => false]],
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
        return '<h5 class="mb-3">Callout Block</h5>' .
            '<table class="table table-bordered">' .
            '{% if vars.title is not empty %}' .
            '<tr><td><b>Title</b></td><td>{{vars.title}}</td></tr>' .
            '{% endif %}'.
            '{% if vars.text is not empty %}' .
            '<tr><td><b>Text</b></td><td>{{vars.text}}</td></tr>' .
            '{% endif %}'.
            '{% if vars.bgImage is not empty %}' .
            '<tr><td><b>Background Image</b></td><td>{{vars.bgImage}}</td></tr>' .
            '{% endif %}'.
            '</table>';
    }
}