<?php
/**
 * View file for block: SubMenuBlock 
 *
 * File has been created with `block/create` command. 
 *
 * @param $this->varValue('link');
 *
 * @var $this \luya\cms\base\PhpBlockView
 */
$menu = $this->extraValue('submenu');
?>

<div class="list-group">
<? foreach ($menu as $tree): $active = \Yii::$app->menu->current->link  === $tree->link ? ' bg-info text-light' : '';?>
    <a href="<?= $tree->link ?>" class="list-group-item border-info<?= $active ?>"><?= $tree->title ?></a>
<? endforeach; ?>
</div>
