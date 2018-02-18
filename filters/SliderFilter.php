<?php

namespace app\filters;

use luya\admin\base\Filter;

/**
 * CarouselImage Filter.
 *
 * File has been created with `block/create` command. 
 */
class SliderFilter extends Filter
{
    public static function identifier()
    {
        return 'slider-filter';
    }

    public function name()
    {
        return 'Slider';
    }

    public function chain()
    {
        return [
            [self::EFFECT_THUMBNAIL, [
                'width' => '640',
                'height' => '480'
            ]],
        ];
    }
}