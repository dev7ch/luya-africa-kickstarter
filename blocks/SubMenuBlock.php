<?php

namespace app\blocks;

use luya\cms\base\PhpBlock;
use luya\cms\frontend\blockgroups\ProjectGroup;
use luya\cms\helpers\BlockHelper;

/**
 * Sub Menu Block.
 *
 * File has been created with `block/create` command. 
 */
class SubMenuBlock extends PhpBlock
{
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
        return 'Submenu';
    }
    
    /**
     * @inheritDoc
     */
    public function icon()
    {
        return 'menu'; // see the list of icons on: https://design.google.com/icons/
    }
 
    /**
     * @inheritDoc
     */
    public function config()
    {
        return [];
    }

    public function getSubMenuTree()
    {
        $menu = \Yii::$app->menu->getLevelContainer(2);
        return $menu;
    }

    public function extraVars()
    {
        return [
            'submenu' => $this->getSubMenuTree()
        ];
    }


    /**
     * {@inheritDoc} 
     *
     * @param {{vars.link}}
    */
    public function admin()
    {
        return '<h3 class="mb-0 bg-secondary p-2 rounded text-light"><b>Sub Menu Block</b><i class="material-icons float-right">' . $this->icon() . '</i></h3><hr class="mb-2">' .
            '<p class="lead">The second menu level of this page will be auto generated.</p>';
    }
}