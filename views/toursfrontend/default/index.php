<?php

use \luya\cms\helpers\BlockHelper;

?>
<div class="container">
    <div class="card-group">
        <? foreach ($model as $item): ?>
            <? $image = $item->image ? Yii::$app->storage->getImage($item->image)->applyFilter('medium-thumbnail')->source : ''; ?>
            <div class="card col-md-6 col-lg-4 p-0">
                <img class="card-img-top" src="<?= $image ?>" alt="<?= str_replace(' ', '-', strtolower($item->title)) ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $item->title ?></h5>
                    <p class="card-text"><?= $item->text ?></p>
                </div>
                <div class="card-footer">
                    <a type="button" class="text-muted" href="<?= $item->link ?>">More</a>
                </div>
            </div>
        <? endforeach ?>
    </div>
</div>
