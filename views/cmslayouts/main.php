
<? if (!empty($placeholders['intro'])): ?>
    <section class="intro p-0">
        <?= $placeholders['intro']; ?>
    </section>
<? endif; ?>
<? $img = false; foreach (Yii::$app->menu->findAll(['container' => 'default']) as $prop) {
    if ($prop->getProperty('bgImage') !== false) {
        $img = $prop->getProperty('bgImage');
        $bgImage = Yii::$app->storage->getImagesArrayItem($img);
    }
}
?>

<section class="main py-5" style="background-image: url('<?= $img != false ? $bgImage : '' ?>');">
    <div class="container">
        <?= $placeholders['content']; ?>
    </div>
</section>
<? if (!empty($placeholders['callout'])): ?>
    <section class="callout p-0">
        <?= $placeholders['callout']; ?>
    </section>
<? endif; ?>

