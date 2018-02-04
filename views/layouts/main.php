<?php
use app\assets\ResourcesAsset;
use luya\helpers\Url;
use luya\cms\widgets\LangSwitcher;

ResourcesAsset::register($this);

/* @var $this luya\web\View */
/* @var $content string */

$this->beginPage();
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->composition->language; ?>">
    <head>
        <meta charset="UTF-8" />
        <meta name="robots" content="index, follow" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta property="og:title" content="LUYA - Build any system" />
        <meta property="og:image" content="<?= $this->publicHtml ?>/images/logo/2x/luya_logo@2x-100.jpg" />
        <meta property=“og:type“ content=“website“/>
        <link rel="apple-touch-icon" sizes="180x180" href="<?= $this->publicHtml ?>/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?= $this->publicHtml ?>/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?= $this->publicHtml ?>/favicon/favicon-16x16.png">
        <link rel="manifest" href="<?= $this->publicHtml ?>/favicon/manifest.json">
        <link rel="mask-icon" href="<?= $this->publicHtml ?>/favicon/safari-pinned-tab.svg" color="#A50045">
        <meta name="theme-color" content="#A50045">
        <title><?= $this->title; ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <div class="nav-container bg-light m-b-3">
        <div class="container px-0">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="<?= $this->publicHtml ?>">Jabbula</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainnav" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mainnav">
                    <ul class="nav navbar-nav ml-auto">
                        <?php foreach (Yii::$app->menu->findAll(['depth' => 1, 'container' => 'default']) as $item): /* @var $item \luya\cms\menu\Item */ ?>
                            <li class="nav-item<?= $item->isActive ? ' active' : '' ?>">
                                <a class="nav-link" href="<?= $item->link; ?>"><?= $item->title; ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </nav>
            <? if(Yii::$app->menu->current != Yii::$app->getHomeUrl()): ?>
            <nav class="breadcrumbs mb-3 small" aria-label="breadcrumb">
                <ol class="breadcrumb  bg-transparent">
                    <?php foreach (Yii::$app->menu->current->teardown as $item): /* @var $item \luya\cms\menu\Item */ ?>
                        <li class="breadcrumb-item<?= $item->link == Yii::$app->menu->current ? ' active' : ''; ?>">
                            <a href="<?= $item->link; ?>"<?= $item->link == Yii::$app->menu->current ? ' class="disabled text-muted" style="pointer-events: none;text-decoration: underline;" data-role="disabled"' : ''; ?>><?= $item->title; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ol>
            </nav>
            <? endif; ?>
        </div>
    </div>

    <?= $content; ?>

    <footer class="footer">
        <div class="container">
                <ul>
                    <li>This website is made with <a href="https://luya.io" target="_blank">LUYA</a></li>
                    <li><a href="https://github.com/luyadev/luya" target="_blank"><i class="fa fa-github"></i></a></li>
                    <li><a href="https://twitter.com/luyadev" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="https://www.youtube.com/channel/UCfGs4sHk-D3swX0mhxv98RA" target="_blank"><i class="fa fa-youtube"></i></a></li>
                </ul>
        </div>
    </footer>
    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
