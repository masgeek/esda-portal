<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<?php $form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
    'fieldConfig' => [
        //'template' => "<div class=\"col-md-12\">{input}</div>\n<div class=\"col-md-12\">{error}</div>",
        //'labelOptions' => ['class' => 'col-lg-1 control-label'],
    ],
]); ?>

    <div class="col-md-12">
        <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Email Address'])->label('')->hint('Enter email address') ?>
    </div>


    <div class="col-md-12">
        <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password'])->label('')->hint('Enter Password') ?>
    </div>

    <!--= $form->field($model, 'rememberMe')->checkbox([
		'checked' => false, 'value' => 0,
		'template' => "<div class=\"col-md-12\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
	]) ?-->
    <div class="row">
        <div class="col-md-6">
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
        </div>
        <div class="col-md-6">
            <?= Html::a('Create Account', ['//site/register'], ['class' => 'btn btn-success btn-block',]) ?>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="text-center">
            <?= Html::a('Forgot password?', ['//site/recover'], ['class' => 'forgot-password',]) ?>
        </div>
    </div>
<?php ActiveForm::end(); ?>