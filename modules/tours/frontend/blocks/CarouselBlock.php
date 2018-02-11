<?php

namespace app\modules\tours\frontend\blocks;

use luya\cms\base\PhpBlock;
use luya\cms\frontend\blockgroups\ProjectGroup;
use luya\cms\helpers\BlockHelper;
use app\modules\tours\models\Tour;

/**
 * Carousel Block.
 *
 * File has been created with `block/create` command. 
 */
class CarouselBlock extends PhpBlock
{
    /**
     * @var string The module where this block belongs to in order to find the view files.
     */
    public $module = 'toursfrontend';


    /**
     * @var boolean Choose whether block is a layout/container/segmnet/section block or not, Container elements will be optically displayed
     * in a different way for a better user experience. Container block will not display isDirty colorizing.
     */
    public $isContainer = false;

    /**
     * @var bool Choose whether a block can be cached trough the caching component. Be careful with caching container blocks.
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
        return 'Carousel Block';
    }
    
    /**
     * @inheritDoc
     */
    public function icon()
    {
        return 'view_carousel'; // see the list of icons on: https://design.google.com/icons/
    }

    /**
     * @inheritDoc
     */
    public function config()
    {
        return [
        ];
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    private function getModel() {

        $model = Tour::find()->where(['is_published' => '1'])->all();
        return $model;
    }

    public function extraVars()
    {
        return [
            'model' => $this->getModel()
        ];
    }

    /**
     * {@inheritDoc} 
     *
    */
    public function admin()
    {
        return '<h5 class="mb-3">Tours Carousel Block</h5>' .
            '<p>See the <i class="material-icons">card_travel</i> Tours Module for configuration</p>';
    }
}