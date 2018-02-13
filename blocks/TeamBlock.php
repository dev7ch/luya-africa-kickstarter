<?php

namespace app\blocks;

use Yii;
use luya\cms\base\PhpBlock;
use luya\cms\frontend\blockgroups\ProjectGroup;
use luya\cms\helpers\BlockHelper;

/**
 * Team Block.
 *
 * File has been created with `block/create` command. 
 */
class TeamBlock extends PhpBlock
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
        return 'Team Block';
    }
    
    /**
     * @inheritDoc
     */
    public function icon()
    {
        return 'account_box'; // see the list of icons on: https://design.google.com/icons/
    }
 
    /**
     * @inheritDoc
     */
    public function config()
    {
        return [
            'vars' => [
                 ['var' => 'name', 'label' => 'Name', 'type' => self::TYPE_TEXT],
                 ['var' => 'function', 'label' => 'Function', 'type' => self::TYPE_TEXT],
                 ['var' => 'text', 'label' => 'Text', 'type' => self::TYPE_TEXTAREA],
                 ['var' => 'link', 'label' => 'Link', 'type' => self::TYPE_LINK],
                 ['var' => 'image', 'label' => 'Image', 'type' => self::TYPE_IMAGEUPLOAD, 'options' => ['no_filter' => false]],
                 ['var' => 'attachment', 'label' => 'Attachments', 'type' => self::TYPE_MULTIPLE_INPUTS, 'options' => [
                     ['var' => 'title', 'label' => 'Title', 'type' => self::TYPE_TEXT],
                     ['var' => 'file', 'label' => 'PDF File', 'type' => self::TYPE_FILEUPLOAD, 'options' => ['extensions' => 'pdf']],
                 ]],
            ],
        ];
    }

    public function getAttachments()
    {
        $data = $this->getVarValue('attachments', []);

        $attachments = [];

        foreach ($data as $slide) {
            $attachments[] = [
                'title' => isset($slide['title']) ? $slide['title'] : '',
                'file' => isset($slide['image']) ? BlockHelper::fileUpload($slide['image'], true) : '',
            ];
        }

        return $attachments;
    }

    /**
     * @inheritDoc
     */
    public function extraVars()
    {
        return [
            'image' => BlockHelper::imageUpload($this->getVarValue('image'), 'medium-crop', true),
            'imageSmall' => BlockHelper::imageUpload($this->getVarValue('image'), 'small-crop', true),
            'link' => BlockHelper::linkObject($this->getVarValue('link')),
            'attachment' => $this->getAttachments(),
            'text' => BlockHelper::markdown($this->getVarValue('text')),
        ];
    }

    /**
     * {@inheritDoc} 
     *
     * @param {{extras.image}}
     * @param {{vars.attachment}}
     * @param {{vars.function}}
     * @param {{vars.image}}
     * @param {{vars.link}}
     * @param {{vars.name}}
     * @param {{vars.text}}
    */
    public function admin()
    {
        return '<h3 class="mb-0 bg-secondary p-2 rounded text-light"><b>Team Block</b><i class="material-icons float-right">' . $this->icon() . '</i></h3><hr class="mb-2">' .
            '{% if vars.name is not empty %}' .
            '<h1 class="mb-3">{{vars.name}}</h1>' .
            '{% else %}'.
            '<h1 class="mb-3">Add team new member</h1>' .
            '{% endif %}'.
            '{% if vars.image is not empty %}' .
            '<img class="img-thumbnail d-block mb-2" style="max-width:150px;" src="{{extras.image.source}}" alt="none">' .
            '{% endif %}'.
            '{% if vars.function is not empty %}' .
            '<b class="inline">Function: </b>{{vars.function}}' .
            '{% endif %}'.
            '{% if vars.text is not empty %}' .
            '<hr><b>Text:</b><br/>{{vars.text}}' .
            '{% endif %}'.
            '{% if vars.link is not empty %}' .
            '<span class="d-block my-2"><b>Link: </b>{{extras.link.href}}</span>' .
            '{% endif %}'.
            '{% if vars.attachment is not empty %}' .
            '{% for attach in extras.attachment %} {{extras.attachment}} {% endfor %}' .
            '{% endif %}';
    }
}