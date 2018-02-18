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
$spacing = $this->cfgValue('spacing');
$hideMobile = $this->cfgValue('hideMobile') == 1 ? ' d-none d-sm-block' : '';
$asBg = $this->cfgValue('asBg');
$style = $this->varValue('style') ? $this->varValue('style') : 'left';
$imgText = $this->placeholderValue('imgText') ? $this->placeholderValue('imgText') : null;

switch ($spacing) {
    case 'top':
        $spacing = ' pt-5';
        break;
    case 'bottom':
        $spacing = ' pb-5';
        break;
    case 'both';
        $spacing = ' py-5';
        break;
    default:
        break;
}

?>
<? if ($image != null && $asBg === null):?>
    <? if ($imgText != null): ?>
    <div class="row<?= $spacing ?>">
        <? if ($style === 'left'): ?>
            <div class="col-12 col-md-6 col-lg-7 col-xl-8">
                <?= $imgText ?>
            </div>
        <? endif; ?>
        <div class="col-12 col-md-6 col-lg-5 col-xl-4 d-md-block<?= $style === 'left' ? ' d-none' : '' ?>">
    <? endif; ?>
    <figure class="image-wrapper<?= $cssClass ?><?= $hideMobile ?>">
        <img class="image img-fluid<?= $imgClass ?>" src="<?= $image ?>" alt="<?= $caption ?>"/>
        <? if ($caption != 'no-alt-text'): ?>
        <figcaption>
            <p><?= $caption ?></p>
        </figcaption>
        <?endif; ?>
    </figure>
    <? if ($imgText != null): ?>
        </div>
        <? if ($style === 'right'): ?>
            <div class="col-12 col-md-6 col-lg-7 col-xl-8">
                <?= $imgText ?>
            </div>
        <? endif; ?>
    </div> <!-- end .row -->
    <? endif; ?>
<? elseif ($image != null && $asBg === 1): ?>
<div class="image-wrapper<?= $cssClass ?>">
    <div class="image image-bg <?= $imgClass ?>" style="background-image: url('<?= $image ?>')">
        <?= $caption != 'no-alt-text' ? '<p class="image-caption">' . $caption  . '</p>': ''?>
    </div>
</div>
<? endif; ?>

