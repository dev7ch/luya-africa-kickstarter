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
?>

<? if (!empty($title || $text)): ?>
    <div class="callout-image" style="background-image: url('<?= $bgImage ?>')">
        <div class="container">
            <div class="callout-content p-3">
                <h4 class="callout-title callout-inner"><?= $title ?></h4>
                <p class="callout-text callout-inner"><?= $text ?></p>
            </div>
        </div>
    </div>
<? endif; ?>

<?= $this->getAppView()->registerJs(
    'sr.reveal(\'.callout-content\', {reset:true, move:0, scale:1, origin:\'right\', delay:200});
    sr.reveal(\'.callout-inner\', {reset:true, move:0, scale:1, origin:\'right\', delay:400});',
    \yii\web\View::POS_LOAD);
?>

