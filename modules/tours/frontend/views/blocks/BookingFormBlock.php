<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\captcha\Captcha;
/* @var $this luya\web\View */
/* @var $form luya\bootstrap4\ActiveForm */
/* @var $this \luya\cms\base\PhpBlockView */

$model = $this->context->getExtraValue('model');

?>
<div class="form-wrapper row py-5">
    <?php if (Yii::$app->session->getFlash('BookingFormBlockSuccess')): ?>
        <div class="alert alert-success position-relative my-5">The form has been sent! Thank you.</div>
    <?php else: ?>
        <?php $form = ActiveForm::begin([
            'id' => 'booking-form',
            'options' => ['class' => 'col-md-6'],
        ])?>
        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken; ?>" />
        <div class="row">
            <div class="col-sm-6">
                <?= $form->field($model, 'first_name')->textInput() ?>
            </div>
            <div class="col-sm-6">
                <?= $form->field($model, 'last_name')->textInput() ?>
            </div>
            <div class="col-12">
                <?= $form->field($model, 'email')->textInput() ?>
            </div>
            <div class="col-12">
                <?= $form->field($model, 'phone')->textInput() ?>
            </div>
            <div class="col-12">
                <?= $form->field($model, 'message')->textarea() ?>
            </div>
            <div class="col-12">
                <?= Html::submitButton('Send', ['class' => 'btn btn-primary']) ?>
                <?= Html::button('Clear Form', ['class' => 'btn btn-outline-primary', 'onclick' => 'document.getElementById("booking-form").reset();']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    <?php endif; ?>
</div>
