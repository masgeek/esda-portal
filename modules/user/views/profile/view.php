<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\user\models\ProfileModel */

$this->title = $model->SURNAME;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'My Profile'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile-view">
    <div class="row">
        <div class="col-md-6">
            <?= Html::a(Yii::t('app', 'Update Profile'), ['update', 'id' => $model->USER_ID], ['class' => 'btn btn-primary btn-block']) ?>
        </div>
        <div class="col-md-6 pull-right">
            <?= Html::a(Yii::t('app', 'Upload Documents'), ['//users/uploads/create'], ['class' => 'btn btn-warning btn-block']) ?>
        </div>
        <!--?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->USER_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?-->
    </div>
    <hr/>
    <div class="row">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'USER_ID',
                'USER_NAME',
                'EMAIL_ADDRESS:email',
                'SURNAME',
                'OTHER_NAMES',
                'PHONE_NUMBER',
                'ACCOUNT_STATUS',
                'DATE_REGISTERED',
                'DATE_UPDATED',
            ],
        ]) ?>
    </div>
</div>
