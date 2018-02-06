<?php
/**
 * View file for block: TeamBlock 
 *
 * File has been created with `block/create` command. 
 *
 * @param $this->extraValue('image');
 * @param $this->extraValue('attachment');
 * @param $this->varValue('attachment');
 * @param $this->varValue('function');
 * @param $this->varValue('image');
 * @param $this->varValue('link');
 * @param $this->varValue('name');
 * @param $this->varValue('text');
 *
 * @var $this \luya\cms\base\PhpBlockView
 */

$image = $this->extraValue('image') ? $this->extraValue('image')->source : 'data:image/gif;base64,R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs=';
$attachment = $this->extraValue('attachment');
$function = $this->varValue('function');
$link = $this->varValue('link') ? $this->extraValue('link') : false;
$name = $this->varValue('name');
$text = $this->extraValue('text');
?>
<? if ($this->getIsPrevEqual()): ?>
<ul class="list-unstyled">
<? endif ?>
    <li class="media mb-5">
        <?= $link != false ? '<a href="' . $link->link . '">' : ''; ?>
        <img class="mr-3 img-thumbnail" src="<?= $image ?>" alt="<?= $name ?>">
        <?= $link != false ? '</a>' : ''; ?>
        <div class="media-body">
            <h3 class="mt-0 mb-3"><?= $name ?></h3>
            <p class="lead"><?= $function ?></p>
            <?= $text ?>
        </div>
    </li>
<? if ($this->getIsNextEqual()): ?>
</ul>
<? endif ?>

