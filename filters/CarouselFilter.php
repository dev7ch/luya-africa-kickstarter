<?php

namespace app\filters;

use luya\admin\base\Filter;

/**
 * CarouselImage Filter.
 *
 * File has been created with `block/create` command. 
 */
class CarouselFilter extends Filter
{
    public static function identifier()
    {
        return 'carousel-filter';
    }

    public function name()
    {
        return 'Carousel';
    }

    public function chain()
    {
        return [
            [self::EFFECT_THUMBNAIL, [
                'width' => '480',
                'height' => '280'
            ]],
        ];
    }
}