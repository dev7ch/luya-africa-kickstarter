<?php
namespace app\properties;

class BackgroundProperty extends \luya\admin\base\Property
{
    public function varName()
    {
        return 'bg';
    }

    public function label()
    {
        return 'Main content background';
    }

    public function type()
    {
        return self::TYPE_IMAGEUPLOAD;
    }
}

class BackgroundImage extends \luya\admin\base\ImageProperty
{
    public function varName()
    {
        return 'bgImage';
    }

    public function label()
    {
        return 'Background Image';
    }
}