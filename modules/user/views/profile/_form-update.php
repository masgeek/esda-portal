<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\user\models\ProfileModel */
/* @var $form yii\widgets\ActiveForm */
?>

    <div class="user-profile-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'USER_NAME')->textInput(['maxlength' => true, 'readonly' => true]) ?>

        <?= $form->field($model, 'EMAIL_ADDRESS')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'SURNAME')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'OTHER_NAMES')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'PHONE_NUMBER')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'INSTITUTION_ID')->widget(kartik\select2\Select2::classname(), [
            'data' => \app\modules\user\models\InstitutionsModel::GetInstitutionList(),
            //'language' => 'en',
            'options' => ['placeholder' => 'Select Institution ...'],
            'pluginOptions' => [
                'allowClear' => false
            ],
        ]); ?>

        <?= $form->field($model, 'CHANGE_PASSWORD')->hint('Click to change password')->checkbox(['checked' => false]); ?>

        <div class="row toggle-field" style="display: none;">
            <?= Html::textInput('HASH_PASSWORD', $model->userAuthentications[0]->PASSWORD, ['id' => 'password', 'class' => 'form-control hiddens', 'readonly' => true]) ?>
            <div class="col-md-6">
                <?= $form->field($model, 'PASSWORD')->passwordInput(['value' => null, 'maxlength' => true, 'placeholder' => 'Enter password']) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'REPEAT_PASSWORD')->passwordInput(['value' => null, 'maxlength' => true, 'placeholder' => 'Confirm password']) ?>
            </div>
        </div>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?> </div>

        <?php ActiveForm::end(); ?>

    </div>
<?php
$this->registerJs("
        //set initial state.
        var isChecked = false;
       // $('#profilemodel-change_password').val($(this).is(':checked'));
        var passwordHash = $('#profilemodel-hash_password');
        var repeatPassword = $('#profilemodel-repeat_password');
        
        $('#profilemodel-change_password').change(function() {
             var password = null;//$('#password').val();
            if($(this).is(':checked')) {
            //clear fields and await new users password
             password = null;
             passwordHash.val(null);
             repeatPassword.val(null);
             //$('#users-change_pass').val($(this).is(':checked'));
             $('#users-change_pass').val(1);
            }
           $('.toggle-field').toggle('fast',function(){
                passwordHash.val(password);
                repeatPassword.val(password);
           });
        });
", \yii\web\View::POS_READY)
?>