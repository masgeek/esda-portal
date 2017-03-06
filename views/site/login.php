<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'User Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="users-login col-md-8 col-md-offset-2">
    <div class="panel panel-primary">
        <div class="panel-heading">Please login to proceed</div>
        <div class="panel-body">
            <?php if (Yii::$app->session->hasFlash('success')): ?>
                <div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">CLOSE</button>
                    <?= Yii::$app->session->getFlash('success') ?>
                </div>
            <?php endif; ?>
            <?= $this->render('_login-form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
