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
        return 'Intro and Slider';
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
                'image' => isset($slide['image']) ? BlockHelper::imageUpload($slide['image'], 'slider-filter', true) : null,
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
            'bgImageAdmin' => BlockHelper::imageUpload($this->getVarValue('bgImage'), 'medium-thumbnail', true),
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
        return '<h3 class="mb-0 bg-secondary p-2 rounded text-light"><b>Intro Block</b><i class="material-icons float-right">' . $this->icon() . '</i></h3><hr class="mb-2">' .
            '{% if vars.bgImage is not empty %}' .
            '<img src="{{extras.bgImageAdmin.source}}" alt="none">' .
            '{% endif %}'.
            '{% if vars.text is not empty %}' .
            '<p>{{extras.text}}</p>' .
            '{% else %}'.
            '<p>The intro text is empty, click here to add new.</p>' .
            '{% endif %}'.
            '{% if vars.slider is not empty %}' .
            '<h3 class="my-3"><b>Slider Contents</b></h3>' .
            '{%for slide in extras.slides%}' .
            '<hr><img style="max-width:200px; display: block" src="{{slide.image.source}}" alt="slide">' .
            '<b class="my-2">{{ slide.title}}</b>' .
            '<p>{{ slide.text }}</p>' .
            '<cite class="my-2">Link: <br />{{slide.link.link}}</cite>'.
            '{% endfor %}'.
            '{% endif %}';
    }
}