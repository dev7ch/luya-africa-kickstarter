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
$slides = $this->extraValue('slides') ? $this->extraValue('slides') : false ;

?>

<div class="<?= $slides !== false ? 'intro-image-slider ' : 'intro-image ' ?>py-5" style="background-image: url('<?= $bgImage ?>');">
    <div class="container">
        <? if ($slides !== false): ?>
            <div class="intro-slider">
                <div class="slider">
                    <?php foreach ($slides as $slide): ?>
                        <div  class="slider-image" <?= $slide['image'] != null ? ' style="background-image: url(\'' . str_replace(' ', '/',($slide['image']->source)) . '\')"' : ''; ?>>
                            <article class="slider-content" itemscope itemtype="http://schema.org/Article">
                                <h3 itemprop="articleHeadline" class="slider-title"><?= $slide['title'] ?></h3>
                                <div itemprop="articleBody" class="slider-text m-0"><?= $slide['text'] ?></div>
                                <? if ($slide['link'] != null): ?>
                                    <button type="button" class="btn btn-primary">
                                        <a itemprop="url" class="slider-link d-inline-block" href="<?= $slide['link'] ?>" style="color: inherit; text-decoration: inherit"><?= Yii::t('app', 'view') ?></a>
                                    </button>
                                <? endif; ?>
                            </article>
                        </div> <!-- css bg image end -->
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
                                loop: true,
                                onInit: () => {},
                                onChange: () => {},
                            });
                            document.querySelector(\'.intro-slider-prev\').addEventListener(\'click\', () => IntroSlider.prev());
                            document.querySelector(\'.intro-slider-next\').addEventListener(\'click\', () => IntroSlider.next());
                            ',
                        \yii\web\View::POS_READY) ?>
                </div>
                <div class="slider-nav d-flex">
                    <button type="button" class="intro-slider-prev btn btn-link mr-suto"><i class="fas fa-chevron-left"></i></button>
                    <button type="button" class="intro-slider-next btn btn-link ml-auto"><i class="fas fa-chevron-right"></i></button>
                </div>
                <?= $this->appView->registerJs('        
                            sr.reveal(\'.slider\', {origin:\'top\', reset: false, move:2, scale:1.3, duration:600});
                            sr.reveal(\'.slider-nav\', {origin:\'right\', reset: true, scale:.6, delay:600});
                            ',
                    \yii\web\View::POS_LOAD); ?>
            </div>
        <? else: ?>
            <div class="intro-text intro-text-with-bg py-5">
                <?= $this->extraValue('text'); ?>
            </div>
        <? endif; ?>
    </div>
</div>
<? if ($slides !== false): ?>
    <article class="intro-text-wrapper mt-5">
        <div class="container">
            <div class="intro-text pt-5">
                <?= $this->extraValue('text'); ?>
            </div>
        </div>
    </article>
<? endif; ?>
