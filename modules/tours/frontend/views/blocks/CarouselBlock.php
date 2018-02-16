<?php
/**
* View file for block: CarouselBlock
*
* File has been created with `block/create` command.
*
*
* @var $this \luya\cms\base\PhpBlockView
*/

$tour = $this->context->getExtraValue('model');
?>

<div class="carousel-wrapper">
    <div class="carousel card-deck d-flex">
        <? foreach ($tour as $item):

            $placeholder = 'data:image/gif;base64,R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs=';
            $image = Yii::$app->storage->getImage($item->image);
            $link = $item->link ? $item->link->link : '#';

            ?>
            <div class="card">
                <a href="<?= $link ?>" class="img-link">
                    <img class="card-img-top" src="<?= is_object($image) ? $image->applyFilter('medium-thumbnail')->source : $placeholder ?>" alt="<?= str_replace(' ', '-', strtolower($item->title)); ?>">
                </a>
                <div class="card-body">
                    <h4 class="card-title"><?= $item->title ?></h4>
                    <p class="card-text"><?= $item->text ?></p>
                </div>
                <div class="card-footer">
                    <a href="<?= $link ?>" class="btn btn-primary"><?= Yii::t('app', 'view_tour') ?></a>
                </div>
            </div>
        <? endforeach; ?>
        <?= $this->appView->registerJs(
            'new Siema({
                    selector: \'.carousel\',
                    duration: 200,
                    easing: \'ease-out\',
                    perPage:{                         
                        576: 2,
                        880: 3
                    },
                    draggable: true,
                    multipleDrag: true,
                    threshold: 20,
                    loop: true,
                    onInit: () => {
                        sameHeight(\'.card\');   
                    },
                    onChange: () => {
                        sameHeight(\'.card\');
                    },
                });
            ',
            \yii\web\View::POS_LOAD);
        ?>
        <?= $this->appView->registerJs(
                'sr.reveal(\' .card\', {reset:false,move:0,scale:1, origin:\'right\', duration: 800, delay:0}, 400);',
        \yii\web\View::POS_READY); ?>
    </div>
</div>

