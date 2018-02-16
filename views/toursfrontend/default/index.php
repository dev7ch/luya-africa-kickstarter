<article class="tours">
    <? $i = 1; foreach ($model as $item):
        $image = $item->image ? Yii::$app->storage->getImage($item->image)->applyFilter('carousel-filter')->source : '';
    ?>
        <? if ($i%2 == 1) { echo '<div class="card-deck py-3">';} ?>
        <div class="card">
            <?= $item->link ? '<a class="card-img-link" href="' . $item->link .'">' : '' ?>
                <img class="card-img-top" src="<?= $image ?>" alt="<?= str_replace(' ', '-', strtolower($item->title)) ?>">
            <?= $item->link ? '</a>' : '' ?>
            <div class="card-body">
                <h3 class="card-title"><?= $item->title ?></h3>
                <p class="card-text"><?= $item->text ?></p>
            </div>
            <? if (!empty($item->link)):?>
                <div class="card-footer">
                    <a class="btn btn-primary" href="<?= $item->link ?>"><?= Yii::t('app', 'view_tour') ?></a>
                    <a class="btn btn-outline-light" href="<?= $item->link ?>#booking-form"><i class="fas fa-calendar-alt"></i>&nbsp;<?= Yii::t('app', 'booking') ?></a>
                </div>
            <? endif; ?>
        </div>
        <? if ($i%2 == 0) { echo '</div>';} ?>
    <? $i++; endforeach; ?>
    <? if ($i%2 != 1) { echo '</div>';} ?>
</article>

