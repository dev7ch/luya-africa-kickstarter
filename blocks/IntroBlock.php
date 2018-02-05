<?php

namespace app\blocks;

use luya\cms\base\PhpBlock;
use luya\cms\frontend\blockgroups\ProjectGroup;
use luya\cms\helpers\BlockHelper;

/**
 * Intro Block.
 *
 * File has been created with `block/create` command. 
 */
class IntroBlock extends PhpBlock
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
        return 'Intro with slider';
    }
    
    /**
     * @inheritDoc
     */
    public function icon()
    {
        return 'desktop_mac'; // see the list of icons on: https://design.google.com/icons/
    }
 
    /**
     * @inheritDoc
     */
    public function config()
    {
        return [
            'vars' => [
                 ['var' => 'bgImage', 'label' => 'Background Image', 'type' => self::TYPE_IMAGEUPLOAD, 'options' => ['no_filter' => false]],
                 ['var' => 'slider', 'label' => 'Slider', 'type' => self::TYPE_MULTIPLE_INPUTS, 'options' => [
                         ['var' => 'title', 'label' => 'Title', 'type' => self::TYPE_TEXT],
                         ['var' => 'image', 'label' => 'Image', 'type' => self::TYPE_IMAGEUPLOAD],
                         ['var' => 'alt', 'label' => 'Image alt text', 'type' => self::TYPE_TEXT],
                         ['var' => 'text', 'label' => 'Image Text', 'type' => self::TYPE_TEXTAREA],
                         ['var' => 'link', 'label' => 'Link', 'type' => self::TYPE_LINK],
                     ]
                 ],
                 ['var' => 'text', 'label' => 'Intro Text', 'type' => self::TYPE_TEXTAREA],
            ],
        ];
    }

    public function getSlides()
    {
        $data = $this->getVarValue('slider', []);

        $slides = [];

        foreach ($data as $slide) {
            $slides[] = [
                'title' => isset($slide['title']) ? $slide['title'] : '',
                'image' => isset($slide['image']) ? BlockHelper::imageUpload($slide['image'], 'large-thumbnail', true) : null,
                'alt' => isset($slide['alt']) ? $slide['alt'] : 'no-alt-text',
                'text' => isset($slide['text']) ? BlockHelper::markdown($slide['text']) : '',
                'link' => isset($slide['link']) ? BlockHelper::linkObject($slide['link']) : '',
            ];
        }

        return $slides;
    }
    
    /**
     * @inheritDoc
     */
    public function extraVars()
    {
        return [
            'bgImage' => BlockHelper::imageUpload($this->getVarValue('bgImage'), false, true),
            'slides' => $this->getSlides(),
            'text' => BlockHelper::markdown($this->getVarValue('text')),
        ];
    }

    /**
     * {@inheritDoc} 
     *
     * @param {{extras.bgImage}}
     * @param {{vars.bgImage}}
     * @param {{vars.slider}}
     * @param {{vars.text}}
    */
    public function admin()
    {
        return '<h5 class="mb-3">Intro Block</h5>' .
            '<table class="table table-bordered">' .
            '{% if vars.bgImage is not empty %}' .
            '<tr><td><b>Background Image</b></td><td>{{vars.bgImage}}</td></tr>' .
            '{% endif %}'.
            '{% if vars.slider is not empty %}' .
            '<tr><td><b>Slider</b></td><td>{{vars.slider}}</td></tr>' .
            '{% endif %}'.
            '{% if vars.text is not empty %}' .
            '<tr><td><b>Text</b></td><td>{{vars.text}}</td></tr>' .
            '{% endif %}'.
            '</table>';
    }
}