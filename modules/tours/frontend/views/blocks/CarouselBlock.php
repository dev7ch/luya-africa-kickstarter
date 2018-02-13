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
    <div class="carousel card-deck">
        <? foreach ($tour as $item):
            $image = $item->image ? Yii::$app->storage->getImage($item->image)->applyFilter('medium-thumbnail')->source : 'data:image/gif;base64,R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs=';
            $link = $item->link ? $item->link->link : '#';

            ?>
            <div class="card">
                <a href="<?= $link ?>" class="img-link">
                    <img class="card-img-top" src="<?= $image ?>" alt="<?= str_replace(' ', '-', strtolower($item->title)); ?>">
                </a>
                <div class="card-body">

                    <h4 class="card-title"><?= $item->title ?></h4>
                    <p class="card-text"><?= $item->text ?></p>
                    <a href="<?= $link ?>" class="btn btn-primary">More</a>
                </div>
            </div>
        <? endforeach; ?>
        <?= $this->appView->registerJs(
            'new Siema({
                    selector: \'.carousel\',
                    duration: 200,
                    easing: \'ease-out\',
                    perPage:{                         
                        400: 2,
                        880: 3
                    },
                    draggable: true,
                    multipleDrag: true,
                    threshold: 20,
                    loop: true,
                    onInit: () => {},
                    onChange: () => {},
                });
            ',
            \yii\web\View::POS_LOAD);
        ?>
        <?= $this->appView->registerJs(
                'sr.reveal(\' .card\', {reset:false,move:0,scale:1, origin:\'right\', duration: 800, delay:0}, 400);',
        \yii\web\View::POS_READY); ?>
    </div>
</div>

