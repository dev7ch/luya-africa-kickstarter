<?php
/**
 * View file for block: IntroBlock 
 *
 * File has been created with `block/create` command. 
 *
 * @param $this->extraValue('bgImage');
 * @param $this->varValue('bgImage');
 * @param $this->varValue('slider');
 * @param $this->varValue('text');
 *
 * @var $this \luya\cms\base\PhpBlockView
 */

$bgImage = $this->extraValue('bgImage') ? $this->extraValue('bgImage')->source : 'data:image/gif;base64,R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs=';
$slides = $this->extraValue('slides');

?>

<div class="intro-image py-5" style="background-image: url('<?= $bgImage ?>');">
    <div class="container">
        <div class="intro-slider">
            <div class="slider">
                <?php foreach ($slides as $slide): ?>
                    <div class="slider-image" <?= $slide['image'] != null ? ' style="background-image: url(\'' . str_replace(' ', '/',($slide['image']->source)) . '\')"' : ''; ?>>
                        <div class="slider-content">
                            <h1 class="slider-title"><?= $slide['title'] ?></h1>
                            <span class="slider-text m-0"><?= $slide['text'] ?></span>
                            <? if ($slide['link'] != null): ?>
                                <button type="button" class="btn btn-primary">
                                    <a class="slider-link d-inline-block" href="<?= $slide['link'] ?>" style="color: inherit; text-decoration: inherit">Info</a>
                                </button>
                            <? endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?= $this->appView->registerJs('
                        window.intro = ScrollReveal();
                        intro.reveal(\'.slider\', {origin:\'top\', reset: false, move:2, scale:1.3, duration:600});
                        intro.reveal(\'.intro-slider-prev\', {origin:\'right\', reset: true, move:2, scale:.6, duration:600, delay:600});
                        intro.reveal(\'.intro-slider-next\', {origin:\'left\', reset: true, move:2, scale:.3, duration:500, delay:580});
                        const IntroSlider = new Siema({
                            selector: \'.slider\',
                            duration: 200,
                            easing: \'ease-out\',
                            perPage: 1,
                            startIndex: 0,
                            draggable: true,
                            multipleDrag: true,
                            threshold: 20,
                            loop: true,
                            onInit: () => {},
                            onChange: () => {},
                        });
                        document.querySelector(\'.intro-slider-prev\').addEventListener(\'click\', () => IntroSlider.prev());
                        document.querySelector(\'.intro-slider-next\').addEventListener(\'click\', () => IntroSlider.next());
                    ',
                    \yii\web\View::POS_END) ?>
            </div>
            <div class="slider-nav d-flex">
                <button type="button" class="intro-slider-prev btn btn-link mr-suto"><i class="fas fa-chevron-left"></i></button>
                <button type="button" class="intro-slider-next btn btn-link ml-auto"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
    </div>
</div>
<article class="intro-text-wrapper mt-5">
    <div class="container">
        <div class="intro-text pt-5">
            <?= $this->extraValue('text'); ?>
        </div>
    </div>
</article>
