<article class="tours">
    <? $i = 1; foreach ($model as $item):
        $image = $item->image ? Yii::$app->storage->getImage($item->image)->applyFilter('carousel-filter')->source : '';
        $link = $item->link ? $item->link->link : '';
    ?>
        <? if ($i%2 == 1) { echo '<div class="card-group py-3">';} ?>
        <div class="card border-info">
            <img class="card-img-top" src="<?= $image ?>" alt="<?= str_replace(' ', '-', strtolower($item->title)) ?>">
            <div class="card-body">
                <h5 class="card-title"><?= $item->title ?></h5>
                <p class="card-text"><?= $item->text ?></p>
            </div>
            <? if (!empty($link)):?>
                <div class="card-footer bg-transparent border-0">
                    <button type="button" class="btn btn-primary">
                        <a style="color: inherit; text-decoration: inherit" href="<?= $item->link ?>">Booking &nbsp;<i class="fas fa-calendar-check"></i></a>
                    </button>
                    <button type="button" class="btn btn-link btn-primary border-0">
                        <a style="color: inherit; text-decoration: inherit" href="<?= $item->link ?>">More</a>
                    </button>
                </div>
            <? endif; ?>
        </div>
        <? if ($i%2 == 0) { echo '</div>';} ?>
    <? $i++; endforeach; ?>
    <? if ($i%2 != 1) { echo '</div>';} ?>
</article>

