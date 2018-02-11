
<? if (!empty($placeholders['intro'])): ?>
    <section class="intro p-0">
        <?= $placeholders['intro']; ?>
    </section>
<? endif; ?>
<?  /* Enable individual main background images selection in admin cms for each page */
    $bgImage = null;
    $img = null;

    if (Yii::$app->menu->current->getPropertyValue('bg')) {
        $bgImage = null;
        $img = Yii::$app->menu->current->getPropertyValue('bg');
        $bgImage = Yii::$app->storage->getImage($img)->source;
    }

?>
<section class="main py-5" style="background-image: url('<?= $img !== null ? $bgImage : '' ?>');">
    <div class="container">

        <?= $placeholders['content']; ?>
    </div>
</section>
<? if (!empty($placeholders['callout'])): ?>
    <section class="callout p-0">
        <?= $placeholders['callout']; ?>
    </section>
<? endif; ?>

