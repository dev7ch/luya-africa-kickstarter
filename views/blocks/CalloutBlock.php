<?php
/**
 * View file for block: CalloutBlock 
 *
 * File has been created with `block/create` command. 
 *
 * @param $this->extraValue('bgImage');
 * @param $this->varValue('bgImage');
 * @param $this->varValue('text');
 * @param $this->varValue('title');
 *
 * @var $this \luya\cms\base\PhpBlockView
 */

$bgImage = $this->extraValue('bgImage') ? $this->extraValue('bgImage')->source : '';
$title = $this->varValue('title');
$text = $this->varValue('text');
$item = $this->placeholderValue('itemCallout') ? $this->placeholderValue('itemCallout') : null ;
?>


<? if (!empty($item || $text )): ?>
    <div class="callout-image" style="background: url('<?= $bgImage ?>') center no-repeat; background-size: cover">
        <div class="container">
            <? if ($item === null): ?>
            <div class="callout-content p-3">
                <p class="callout-text callout-inner"><?= $text ?></p>
            </div>
            <? else: ?>
            <div class="row">
                <div class="col">
                    <div class="callout-content p-3 mb-2">
                        <p class="callout-text callout-inner"><?= $text ?></p>
                    </div>
                </div>
                <div class="col-md-5 col-lg-4">
                    <div class="callout-content p-3">
                        <?= $item ?>
                    </div>
                </div>
            </div>
        <? endif;?>
        </div>
    </div>
<? endif; ?>

<?= $this->getAppView()->registerJs(
    'sr.reveal(\'.callout-content\', {reset:true, move:0, scale:1, origin:\'right\', delay:200});
    sr.reveal(\'.callout-inner\', {reset:true, move:0, scale:1, origin:\'right\', delay:400});',
    \yii\web\View::POS_LOAD);
?>

