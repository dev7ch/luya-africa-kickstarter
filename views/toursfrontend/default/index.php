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
                    <button type="button" class="btn btn-primary">
                        <a style="color: inherit; text-decoration: inherit" href="<?= $item->link ?>">Tour Info</a>
                    </button>
                    <button type="button" class="btn btn-outline-light">
                        <a style="color: inherit; text-decoration: none !important;" href="<?= $item->link ?>#booking-form"><i class="fas fa-calendar-alt"></i> Booking</a>
                    </button>
                </div>
            <? endif; ?>
        </div>
        <? if ($i%2 == 0) { echo '</div>';} ?>
    <? $i++; endforeach; ?>
    <? if ($i%2 != 1) { echo '</div>';} ?>
</article>

