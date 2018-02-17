<?php
/**
 * View file for block: ImageBlock 
 *
 * File has been created with `block/create` command. 
 *
 * @param $this->cfgValue('cssClass');
 * @param $this->cfgValue('imgClass');
 * @param $this->cfgValue('asBg');
 * @param $this->extraValue('image');
 * @param $this->varValue('caption');
 * @param $this->varValue('image');
 * @param $this->varValue('style');
 *
 * @var $this \luya\cms\base\PhpBlockView
 */


$image = $this->varValue('image') ? $this->extraValue('image')->source : null;
$caption = $this->varValue('caption') ? $this->varValue('caption') : 'no-alt-text';
$cssClass = $this->cfgValue('cssClass') ?  ' ' . $this->cfgValue('cssClass') : null;
$imgClass = $this->cfgValue('imgClass') ?  ' ' . $this->cfgValue('imgClass') : null;
$asBg = $this->cfgValue('asBg') ?  $this->cfgValue('asBg') : null;
$style = $this->varValue('style') ? $this->varValue('style') : 'left';
$imgText = $this->placeholderValue('imgText') ? $this->placeholderValue('imgText') : null;



?>
<? if ($image != null && $asBg === null):?>
<figure class="image-wrapper<?= $cssClass ?>">
    <? if ($imgText != null): ?>
    <div class="row">
        <? if ($style === 'left'): ?>
            <div class="col col-md-6 col-lg-7 col-xl-8">
                <?= $imgText ?>
            </div>
        <? endif; ?>
        <div class="col col-md-6 col-lg-5 col-xl-4">
    <? endif; ?>
    <img class="image img-fluid<?= $imgClass ?>" src="<?= $image ?>" alt="<?= $caption ?>"/>
    <? if ($caption != 'no-alt-text'): ?>
    <figcaption>
        <p><?= $caption ?></p>
    </figcaption>
    <?endif; ?>
    <? if ($imgText != null): ?>
        </div>
        <? if ($style === 'right'): ?>
            <div class="col col-md-6 col-lg-7 col-xl-8">
                <?= $imgText ?>
            </div>
        <? endif; ?>
    </div> <!-- end .row -->
    <? endif; ?>
</figure>
<? elseif ($image != null && $asBg === 1): ?>
<div class="image-wrapper<?= $cssClass ?>">
    <div class="image image-bg <?= $imgClass ?>" style="background-image: url('<?= $image ?>')">
        <?= $caption != 'no-alt-text' ? '<p class="image-caption">' . $caption  . '</p>': ''?>
    </div>
</div>
<? endif; ?>

