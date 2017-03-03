<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\user\models\UserUploads */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-uploads-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'USER_ID')->textInput() ?>

    <?= $form->field($model, 'FILE_PATH')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'COMMENTS')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'PUBLICLY_AVAILABLE')->textInput() ?>

    <?= $form->field($model, 'DATE_UPLOADED')->textInput() ?>

    <?= $form->field($model, 'UPDATED')->textInput() ?>

    <?= $form->field($model, 'DELETED')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
