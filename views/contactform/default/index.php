<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var object $model Contains the model object based on DynamicModel yii class. */
/* @var $this \luya\web\View */
/* @var $form \yii\widgets\ActiveForm */

?>

<?php if (Yii::$app->session->getFlash('contactform_success')): ?>
    <div class="alert alert-success">The form has been submitted successfully.</div>
<?php else: ?>
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-12">
            <?= $form->field($model, 'first_name')->textInput(); ?>
        </div>
        <div class="col-12">
            <?= $form->field($model, 'last_name')->textInput(); ?>
        </div>
        <div class="col-12">
            <?= $form->field($model, 'email'); ?>
        </div>
        <div class="col-12">
            <?= $form->field($model, 'phone'); ?>
        </div>
        <div class="col-12">
            <?= $form->field($model, 'message')->textarea(); ?>
        </div>
        <div class="col-12">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
<?php endif; ?>