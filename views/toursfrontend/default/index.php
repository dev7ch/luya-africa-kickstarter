<article class="tours">
    <? $i = 1; foreach ($model as $item):
        $image = $item->image ? Yii::$app->storage->getImage($item->image)->applyFilter('carousel-filter')->source : '';
        $link = $item->link ? $item->link->link : '';
    ?>
        <? if ($i%2 == 1) { echo '<div class="card-group py-3">';} ?>
        <div class="card border-info">
            <img class="card-img-top" src="<?= $image ?>" alt="<?= str_replace(' ', '-', strtolower($item->title)) ?>">
            <div class="card-body">
                <h3 class="card-title"><?= $item->title ?></h3>
                <p class="card-text"><?= $item->text ?></p>
            </div>
            <? if (!empty($link)):?>
                <div class="card-footer bg-info">
                    <button type="button" class="btn btn-primary">
                        <a style="color: inherit; text-decoration: inherit" href="<?= $item->link ?>">Tour Info</a>
                    </button>
                    <button type="button" class="btn btn-outline-light">
                        <a style="color: inherit; text-decoration: none !important;" href="<?= $item->link ?>"><i class="fas fa-calendar-alt"></i> Booking</a>
                    </button>
                </div>
            <? endif; ?>
        </div>
        <? if ($i%2 == 0) { echo '</div>';} ?>
    <? $i++; endforeach; ?>
    <? if ($i%2 != 1) { echo '</div>';} ?>
</article>

