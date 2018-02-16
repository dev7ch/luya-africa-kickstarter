<?php
use app\assets\ResourcesAsset;
use app\assets\HeadAsset;
use luya\cms\widgets\LangSwitcher;

HeadAsset::register($this);
ResourcesAsset::register($this);

/* @var $this luya\web\View */
/* @var $content string */

/* Load settings like logo etc from cms*/
$query = new \yii\db\Query();
$theme = $query->select('id, site_name, company_email, logo')->from('theme')->one();

$this->beginPage();

/* Enable individual main background images selection in admin cms for each page, must be after beginPage() function */
$bgImage = null;

if (Yii::$app->menu->current->getPropertyValue('bg')) {
    $bgImage = null;
    $img = Yii::$app->menu->current->getPropertyValue('bg');
    $bgImage = is_object(Yii::$app->storage->getImage($img)) ? Yii::$app->storage->getImage($img)->source : null;
}

?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->composition->language; ?>">
    <head>
        <meta charset="UTF-8"/>
        <meta name="robots" content="index, follow"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta property="og:type" content="website" />
        <meta property="og:url" content="<?= Yii::$app->request->absoluteUrl ?>"/>
        <meta property="og:title" content="Africa - Explore the untapped source">
        <meta property="og:image" content="<?= $this->publicHtml ?>/images/og_image.jpg" />
        <link rel="apple-touch-icon" sizes="180x180" href="<?= $this->publicHtml ?>/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?= $this->publicHtml ?>/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?= $this->publicHtml ?>/favicon-16x16.png">
        <link rel="manifest" href="<?= $this->publicHtml ?>/site.webmanifest">
        <link rel="mask-icon" href="<?= $this->publicHtml ?>/safari-pinned-tab.svg" color="#af7751">
        <meta name="msapplication-TileColor" content="#dfcfc4">
        <meta name="theme-color" content="#ba9880">
        <title><?= $theme['site_name'] ? $theme['site_name'] : $this->title; ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody();?>
    <div class="page">
        <header class="nav-container page-header bg-light m-b-3">
            <div class="container px-0">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="<?= $this->publicHtml ?>/">
                        <?= $theme['logo'] ? '<img class="logo" src="' . Yii::$app->storage->getImage($theme['logo'])->applyFilter('logo')->source . '" alt="' . $this->title . '">' : ''; ?>
                        <?= $theme['site_name'] ? $theme['site_name'] : '' ?>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainnav" aria-controls="mainnav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div id="mainnav" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav ml-auto">
                            <?php foreach (Yii::$app->menu->findAll(['depth' => 1, 'container' => 'default']) as $item): /* @var $item \luya\cms\menu\Item */ ?>
                                <li class="nav-item<?= $item->isActive ? ' active' : '' ?>">
                                    <a class="nav-link" href="<?= $item->link; ?>"><?= $item->title; ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <?= LangSwitcher::widget([
                            'listElementOptions' => ['class' => 'nav nav-lang'],
                            'elementOptions' => ['class' => 'nav-item'],
                            'linkOptions' => ['class' => 'nav-link nav-lang-link'],
                            'linkLabel' => function ($lang) {
                                switch ($lang['short_code']) {
                                    case 'en':
                                        $lang['short_code'] = 'gb';
                                        break;
                                }
                                return '<span class="flag-icon flag-icon-' . $lang['short_code'] . '"></span>';
                            }
                        ]); ?>
                    </div>
                </nav>
            </div>
        </header>
        <div class="page-content<?= $bgImage !== null ? ' page-content-background" style="background-image: url(\'' . $bgImage . '\');' : ''; ?>">
            <?= $content; ?>
        </div>
        <nav class="breadcrumbs-wrapper bg-info">
            <div class="container">
                <? if(Yii::$app->menu->current != Yii::$app->getHomeUrl()): ?>
                    <nav class="breadcrumbs small" aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent m-0">
                            <li class="breadcrumb-item text-link">
                                <a class="link text-light" href="<?= $this->publicHtml ?>/"><i class="fas fa-home"></i></a>
                            </li>
                            <?php foreach (Yii::$app->menu->current->teardown as $item): /* @var $item \luya\cms\menu\Item */ ?>
                                <li class="breadcrumb-item<?= $item->link == Yii::$app->menu->current ? ' active' : ''; ?>">
                                    <a href="<?= $item->link; ?>"<?= $item->link == Yii::$app->menu->current ? ' class="disabled text-muted" style="pointer-events: none;text-decoration: none; color:inherit" data-role="disabled"' : ' style="text-decoration: underline; color:inherit"'; ?>><?= $item->title; ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ol>
                    </nav>
                <? endif; ?>
            </div>
        </nav>
        <footer class="footer page-footer">
            <div class="container">
                <ul class="nav nav-pills d-inline-flex">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#"><i class="fab fa-facebook-square"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#"><i class="fab fa-youtube"></i></a>
                    </li>
                </ul>
                <nav class="footernav float-sm-right">
                    <ul class="nav nav-pills">
                    <?php foreach (Yii::$app->menu->findAll(['depth' => 1, 'container' => 'footernav']) as $item): /* @var $item \luya\cms\menu\Item */ ?>
                        <li class="nav-item<?= $item->isActive ? ' active' : '' ?>">
                            <a class="nav-link text-light" href="<?= $item->link; ?>"><?= $item->title; ?></a>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                </nav>
            </div>
        </footer>
    </div>
    <?php $this->endBody() ?>
    </body>
</html>
<? if(Yii::$app->menu->current == Yii::$app->getHomeUrl()) {
    echo $this->registerJs('                
            sr.reveal(\'.nav-lang\', {origin:\'top\', reset: true, move:2, scale:.5, delay:300, useDelay: \'once\', duration:300, distance: \'120px\', mobile: false});',
        \yii\web\View::POS_LOAD);
};?>
<?php $this->endPage() ?>
