<?php

/**
 * View file for block: AccordionBlock 
 *
 * File has been created with `block/create` command. 
 *
 * @param $this->placeholderValue('item');
 * @param $this->varValue('icon');
 * @param $this->varValue('title');
 *
 * @var $this \luya\cms\base\PhpBlockView
 */

$id = (new \yii\db\Query())->select(['block_id'])->from('cms_nav_item_page_block_item')->where(['is_hidden' => '0'])->one();
$itemId = uniqid('item-');
$title = $this->varValue('title');
$item = $this->placeholderValue('item');

?>
<? if(!$this->getIsPrevEqual()):?>
<div id="accordion-<?= $id['block_id']; ?>" class="py-5">
<? endif; ?>
    <div class="card bg-light border-0 rounded-0">
        <div class="btn btn-info p-0 m-0 text-left text-light d-block" data-toggle="collapse" data-target="#collapse-<?= $itemId; ?>" aria-expanded="true" aria-controls="collapse-<?= $itemId ?>">
            <div class="card-header" id="heading-<?= $itemId ?>">
                <h4 class="mb-0 accordion-title">
                        <?= $title ?>
                </h4>
            </div>
        </div>
        <div id="collapse-<?= $itemId ?>" class="collapse<?= !$this->getIsPrevEqual() ? ' show' : '' ?>" aria-labelledby="heading-<?= $itemId; ?>" data-parent="#accordion-<?= $id['block_id'] ?>">
            <div class="card-body">
                <?= $item ?>
            </div>
        </div>
    </div>
<? if(!$this->getIsNextEqual()): ?>
</div>
<? endif; ?>
