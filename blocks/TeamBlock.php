<?php

namespace app\blocks;

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
        return 'Team Block';
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
                 ['var' => 'name', 'label' => 'Name', 'type' => self::TYPE_TEXT],
                 ['var' => 'function', 'label' => 'Function', 'type' => self::TYPE_TEXT],
                 ['var' => 'text', 'label' => 'Text', 'type' => self::TYPE_TEXTAREA],
                 ['var' => 'link', 'label' => 'Link', 'type' => self::TYPE_LINK],
                 ['var' => 'image', 'label' => 'Image', 'type' => self::TYPE_IMAGEUPLOAD, 'options' => ['no_filter' => false]],
                 ['var' => 'attachment', 'label' => 'Attachments', 'type' => self::TYPE_MULTIPLE_INPUTS, 'options' => [
                     ['var' => 'title', 'label' => 'Titel', 'type' => self::TYPE_TEXT],
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
            'image' => BlockHelper::imageUpload($this->getVarValue('image'), false, true),
            'attachment' => $this->getAttachments(),
            'link' => BlockHelper::linkObject($this->getVarValue('link')),
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
        return '<h5 class="mb-3">Team Block</h5>' .
            '<table class="table table-bordered">' .
            '{% if vars.name is not empty %}' .
            '<tr><td><b>Name</b></td><td>{{vars.name}}</td></tr>' .
            '{% endif %}'.
            '{% if vars.function is not empty %}' .
            '<tr><td><b>Function</b></td><td>{{vars.function}}</td></tr>' .
            '{% endif %}'.
            '{% if vars.text is not empty %}' .
            '<tr><td><b>Text</b></td><td>{{vars.text}}</td></tr>' .
            '{% endif %}'.
            '{% if vars.link is not empty %}' .
            '<tr><td><b>Link</b></td><td>{{vars.link}}</td></tr>' .
            '{% endif %}'.
            '{% if vars.image is not empty %}' .
            '<tr><td><b>Image</b></td><td>{{vars.image}}</td></tr>' .
            '{% endif %}'.
            '{% if vars.attachment is not empty %}' .
            '<tr><td><b>Attachments</b></td><td>{{vars.attachment}}</td></tr>' .
            '{% endif %}'.
            '</table>';
    }
}