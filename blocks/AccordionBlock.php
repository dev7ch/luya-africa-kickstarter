<?php

namespace app\blocks;

use luya\cms\base\PhpBlock;
use luya\cms\frontend\blockgroups\ProjectGroup;
use luya\cms\helpers\BlockHelper;

/**
 * Accordion Block.
 *
 * File has been created with `block/create` command. 
 */
class AccordionBlock extends PhpBlock
{
    /**
     * @var boolean Choose whether block is a layout/container/segmnet/section block or not, Container elements will be optically displayed
     * in a different way for a better user experience. Container block will not display isDirty colorizing.
     */
    public $isContainer = false;

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
        return 'Accordion Block';
    }
    
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
                 ['var' => 'title', 'label' => 'Title', 'type' => self::TYPE_TEXT],
                 ['var' => 'icon', 'label' => 'Icon', 'type' => self::TYPE_TEXT],
            ],
            'placeholders' => [
                 ['var' => 'item', 'label' => 'Accordion Content'],
            ],
        ];
    }
    
    /**
     * {@inheritDoc} 
     *
     * @param {{placeholders.item}}
     * @param {{vars.icon}}
     * @param {{vars.title}}
    */
    public function admin()
    {
        return '<h5 class="mb-3">Accordion Block</h5>' .
            '<table class="table table-bordered">' .
            '{% if vars.title is not empty %}' .
            '<tr><td><b>Title</b></td><td>{{vars.title}}</td></tr>' .
            '{% endif %}'.
            '{% if vars.icon is not empty %}' .
            '<tr><td><b>Icon</b></td><td>{{vars.icon}}</td></tr>' .
            '{% endif %}'.
            '</table>';
    }
}