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
        <?= $form->field($model, 'first_name')->textInput() ?>
        <?= $form->field($model, 'last_name')->textInput() ?>
        <?= $form->field($model, 'email')->textInput() ?>
        <?= $form->field($model, 'phone')->textInput() ?>
        <?= $form->field($model, 'message')->textarea() ?>

        <?= Html::submitButton('Submit', ['class' => 'btn btn-outline-primary']) ?>

        <?php ActiveForm::end(); ?>
    <?php endif; ?>

</div>
