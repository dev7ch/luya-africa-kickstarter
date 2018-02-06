<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var object $model Contains the model object based on DynamicModel yii class. */
/* @var $this \luya\web\View */
/* @var $form \yii\widgets\ActiveForm */

?>

<?php if (Yii::$app->session->getFlash('contactform_success')): ?>
    <div class="alert alert-success">The form has been submited successfull.</div>
<?php else: ?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'first_name')->textInput(); ?>
    <?= $form->field($model, 'last_name')->textInput(); ?>
    <?= $form->field($model, 'email'); ?>
    <?= $form->field($model, 'phone'); ?>
    <?= $form->field($model, 'message')->textarea(); ?>

    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>

    <?php ActiveForm::end(); ?>
<?php endif; ?>