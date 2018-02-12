<?php

namespace app\filters;

use luya\admin\base\Filter;

/**
 * Logo Filter.
 *
 * File has been created with `block/create` command. 
 */
class LogoFilter extends Filter
{
    public static function identifier()
    {
        return 'logo';
    }

    public function name()
    {
        return 'Logo';
    }

    public function chain()
    {
        return [
            [self::EFFECT_THUMBNAIL, [
                'width' => '240',
                'height' => '160',
            ]],
        ];
    }
}