<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\user\models\UserProfile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-profile-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'USER_NAME')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'EMAIL_ADDRESS')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'PASSWORD')->passwordInput(['value' => null, 'maxlength' => true, 'placeholder' => 'Enter password']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'REPEAT_PASSWORD')->passwordInput(['value' => null, 'maxlength' => true, 'placeholder' => 'Confirm password']) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Register'), ['class' => 'btn btn-primary']) ?> </div>

    <?php ActiveForm::end(); ?>

</div>
