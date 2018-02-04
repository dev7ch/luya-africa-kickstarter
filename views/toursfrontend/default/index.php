<section class="tours py-5">
    <div class="container">
        <? $i = 1; foreach ($model as $item):
            $image = $item->image ? Yii::$app->storage->getImage($item->image)->applyFilter('carousel-filter')->source : '';
            $link = $item->link ? $item->link->link : '';
        ?>
            <? if ($i%2 == 1) { echo '<div class="card-group py-3">';} ?>
            <div class="card">
                <img class="card-img-top" src="<?= $image ?>" alt="<?= str_replace(' ', '-', strtolower($item->title)) ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $item->title ?></h5>
                    <p class="card-text"><?= $item->text ?></p>
                </div>
                <? if (!empty($link)):?>
                    <div class="card-footer">
                        <button type="button" class="btn btn-primary float-right">
                            <a style="color: inherit; text-decoration: inherit" href="<?= $item->link ?>">More</a>
                        </button>
                    </div>
                <? endif; ?>
            </div>
            <? if ($i%2 == 0) { echo '</div>';} ?>
        <? $i++; endforeach; ?>
        <? if ($i%2 != 1) { echo '</div>';} ?>
    </div>
</section>
