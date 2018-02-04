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
?>

<div class="callout-image py-5" style="background-image: url('<?= $this->publicHtml . '/images/callout.jpg' ?>');">
    <div class="container">
        <div class="callout-content bg-info p-3">
            <h1>Callout Title</h1>
            <p>Callout</p>
        </div>
    </div>
</div>

