
<? if (!empty($placeholders['intro'])): ?>
    <section class="intro p-0">
        <?= $placeholders['intro']; ?>
    </section>
<? endif; ?>

<section class="main py-5">
    <div class="container">

        <?= $placeholders['content']; ?>
    </div>
</section>
<? if (!empty($placeholders['callout'])): ?>
    <section class="callout p-0">
        <?= $placeholders['callout']; ?>
    </section>
<? endif; ?>

