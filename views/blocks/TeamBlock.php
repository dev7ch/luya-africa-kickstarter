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
$imageSmall = $this->extraValue('image') ? $this->extraValue('imageSmall')->source : 'data:image/gif;base64,R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs=';
$attachment = $this->extraValue('attachment');
$function = $this->varValue('function');
$link = $this->varValue('link') ? $this->extraValue('link') : null;
$name = $this->varValue('name');
$text = $this->extraValue('text');
?>
<? if (!$this->getIsPrevEqual()): ?>
<article class="team">
    <div class="row">
    <? endif ?>
        <div class="team-image col-sm-12 col-md-4 col-lg-3 border-bottom-1 mb-3">
            <?= $link != null ? '<a href="' . $link->link . '">' : ''; ?>
            <img class="mr-2 img-thumbnail" src="<?= $image ?>" alt="<?= $name ?>">
            <?= $link != null ? '</a>' : ''; ?>
        </div>
        <div class="team-content col-sm-12 col-md-8 col-lg-9 mb-5">
            <h3 class="mt-0 mb-3"><?= $name ?></h3>
            <p class="lead"><?= $function ?></p>
            <?= $text ?>
            <?= $link != null ? '<button type="button" class="btn btn-primary mt-3"><a style="color:inherit;text-decoration: none" href="' . $link->link . '"><i class="fas fa-user"></i> Profile</a></button>' : ''; ?>
        </div>
    <? if (!$this->getIsNextEqual()): ?>
    </div>
</article>
<? endif ?>
<?= $this->appView->registerJs('
    window.team = ScrollReveal();
    team.reveal(\'.team-image\', {origin:\'left\', reset: true, scale:0, delay:0, duration:500, });
    team.reveal(\'.team-content\', {origin:\'right\', reset: false, scale:0, delay:200, duration:600, opacity:0});
    ',
    \yii\web\View::POS_READY) ?>

