<?php

namespace app\blocks;

use luya\cms\base\PhpBlock;
use luya\cms\frontend\blockgroups\ProjectGroup;
use luya\cms\helpers\BlockHelper;

/**
 * Partner Block.
 *
 * File has been created with `block/create` command. 
 */
class PartnerBlock extends PhpBlock
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
        return 'Partner Block';
    }
    
    /**
     * @inheritDoc
     */
    public function icon()
    {
        return 'business'; // see the list of icons on: https://design.google.com/icons/
    }
 
    /**
     * @inheritDoc
     */
    public function config()
    {
        return [
            'vars' => [
                 ['var' => 'name', 'label' => 'Name', 'type' => self::TYPE_TEXT],
                 ['var' => 'logo', 'label' => 'Logo', 'type' => self::TYPE_IMAGEUPLOAD, 'options' => ['no_filter' => true]],
                 ['var' => 'link', 'label' => 'Link', 'type' => self::TYPE_LINK],
            ],
            'cfgs' => [
                 ['var' => 'size', 'label' => 'Size', 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                     1 => 'Label for 1'
                 ])],
                 ['var' => 'style', 'label' => 'Style', 'type' => self::TYPE_SELECT, 'options' => BlockHelper::selectArrayOption([
                     1 => 'Label for 1'
                 ])],
            ],
        ];
    }
    
    /**
     * @inheritDoc
     */
    public function extraVars()
    {
        return [
            'logo' => BlockHelper::imageUpload($this->getVarValue('logo'), 'small-thumbnail', true),
            'link' => BlockHelper::linkObject($this->getVarValue('link')),
        ];
    }

    /**
     * {@inheritDoc} 
     *
     * @param {{cfgs.size}}
     * @param {{cfgs.style}}
     * @param {{extras.logo}}
     * @param {{vars.link}}
     * @param {{vars.logo}}
     * @param {{vars.name}}
    */
    public function admin()
    {
        return
            '{% if vars.name is not empty %}' .
            '<h1 class="mb-3">{{vars.name}}</h1>' .
            '{% else %}'.
            '<h1 class="mb-3">Add team new member</h1>' .
            '{% endif %}'.
            '{% if vars.image is not empty %}' .
            '<table class="table table-bordered">' .
            '{% if vars.name is not empty %}' .
            '<tr><td><b>Name</b></td><td>{{vars.name}}</td></tr>' .
            '{% endif %}'.
            '{% if vars.logo is not empty %}' .
            '<tr><td><b>Logo</b></td><td>{{vars.logo}}</td></tr>' .
            '{% endif %}'.
            '{% if vars.link is not empty %}' .
            '<tr><td><b>Link</b></td><td>{{vars.link}}</td></tr>' .
            '{% endif %}'.
            '{% if cfgs.size is not empty %}' .
            '<tr><td><b>Size</b></td><td>{{cfgs.size}}</td></tr>' .
            '{% endif %}'.
            '{% if cfgs.style is not empty %}' .
            '<tr><td><b>Style</b></td><td>{{cfgs.style}}</td></tr>' .
            '{% endif %}'.
            '</table>';
    }
}