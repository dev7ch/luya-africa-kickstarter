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

$bgImage = $this->extraValue('bgImage') ? $this->extraValue('bgImage')->source : '';
$slides = $this->extraValue('slides');


?>

<div class="intro-image py-5" style="background-image: url('<?= $bgImage ?>');">
    <div class="container">
        <div class="intro-slider">
            <div class="slider">
                <?php foreach ($slides as $slide): ?>
                    <div class="slider-image" <?= $slide['image'] != null ? ' style="background-image: url(\'' . str_replace(' ', '/',($slide['image']->source)) . '\')"' : ''; ?>>
                        <h1><?= $slide['title'] ?></h1>
                        <?= $slide['text'] ?>

                        <? if ($slide['link'] != null): ?>
                            <a class="slider-link" href="<?= $slide['link'] ?>"> More </a>
                        <? endif; ?>
                    </div>
                <?php endforeach; ?>

                <?= $this->appView->registerJs('
                        const IntroSlider = new Siema({
                            selector: \'.slider\',
                            duration: 200,
                            easing: \'ease-out\',
                            perPage: 1,
                            startIndex: 0,
                            draggable: true,
                            multipleDrag: true,
                            threshold: 20,
                            loop: false,
                            onInit: () => {},
                            onChange: () => {},
                        });
                        document.querySelector(\'.intro-slider-prev\').addEventListener(\'click\', () => IntroSlider.prev());
                        document.querySelector(\'.intro-slider-next\').addEventListener(\'click\', () => IntroSlider.next());
                    ',
                    \yii\web\View::POS_READY) ?>
            </div>
        </div>
        <button type="button" class="intro-slider-prev">Prev</button>
        <button type="button" class="intro-slider-next">Next</button>
    </div>
</div>
<div class="container">
    <div class="intro-text py-5">
        <?= $this->varValue('text'); ?>
    </div>
</div>
