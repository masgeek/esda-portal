<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\user\models\UserProfile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-profile-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'USER_NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EMAIL_ADDRESS')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SURNAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'OTHER_NAMES')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PHONE_NUMBER')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ACCOUNT_STATUS')->textInput() ?>

    <?= $form->field($model, 'DATE_REGISTERED')->textInput() ?>

    <?= $form->field($model, 'DATE_UPDATED')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
