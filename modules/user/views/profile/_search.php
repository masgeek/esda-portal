<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\user\search\ProfileSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-profile-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'USER_ID') ?>

    <?= $form->field($model, 'USER_NAME') ?>

    <?= $form->field($model, 'EMAIL_ADDRESS') ?>

    <?= $form->field($model, 'SURNAME') ?>

    <?= $form->field($model, 'OTHER_NAMES') ?>

    <?php // echo $form->field($model, 'PHONE_NUMBER') ?>

    <?php // echo $form->field($model, 'ACCOUNT_STATUS') ?>

    <?php // echo $form->field($model, 'DATE_REGISTERED') ?>

    <?php // echo $form->field($model, 'DATE_UPDATED') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
