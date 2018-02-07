<?php
/**
 * View file for block: PartnerBlock 
 *
 * File has been created with `block/create` command. 
 *
 * @param $this->cfgValue('size');
 * @param $this->cfgValue('style');
 * @param $this->extraValue('logo');
 * @param $this->varValue('link');
 * @param $this->varValue('logo');
 * @param $this->varValue('name');
 *
 * @var $this \luya\cms\base\PhpBlockView
 */

$name = $this->varValue('name');
$logo = $this->varValue('logo') ? $this->extraValue('logo')->source : '';
$link = $this->varValue('link') ? $this->extraValue('link') : '#';

?>
<? if (!$this->getIsPrevEqual()): ?>
<article class="partner">
    <div class="row md-auto">
<? endif; ?>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="row mb-3">
                <div class="col-4 col-sm-4 col-md-3">
                    <a class="link" href="<?= $link ?>" target="_blank">
                        <img class="img-fluid" src="<?= $logo ?>" alt="<?= $name ?>">
                    </a>
                </div>
                <div class="col col-sm-8 col-md-9">
                    <h5 class="partner-title mb-0"><?= $name ?></h5>
                    <p class="small"><a class="link" href="<?= $link ?>" target="_blank"><?= $link ?></a></p>
                </div>
            </div>
        </div>
<? if (!$this->getIsNextEqual()): ?>
    </div>
</article>
<? endif; ?>
