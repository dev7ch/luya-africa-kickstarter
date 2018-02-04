<?php
/**
* View file for block: CarouselBlock
*
* File has been created with `block/create` command.
*
*
* @var $this \luya\cms\base\PhpBlockView
*/
?>

<div class="carousel-wrapper">
    <div class="carousel">
        <div class="card" style="width: 20rem;">
            <img class="card-img-top" src="data:image/gif;base64,R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs=" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card" style="width: 20rem;">
            <img class="card-img-top" src="data:image/gif;base64,R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs=" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card" style="width: 20rem;">
            <img class="card-img-top" src="data:image/gif;base64,R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs=" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card" style="width: 20rem;">
            <img class="card-img-top" src="data:image/gif;base64,R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs=" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <?= $this->appView->registerJs(
            'new Siema({
                                  selector: \'.carousel\',
                                  duration: 200,
                                  easing: \'ease-out\',
                                  perPage: 3,
                                  startIndex: 0,
                                  draggable: true,
                                  multipleDrag: true,
                                  threshold: 20,
                                  loop: true,
                                  onInit: () => {},
                                  onChange: () => {},
                                });',
            \yii\web\View::POS_LOAD)
        ?>
    </div>
</div>

