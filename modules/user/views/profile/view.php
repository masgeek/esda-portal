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
    <p>
        <?= Html::a(Yii::t('app', 'Update Profile'), ['update', 'id' => $model->USER_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Upload Documents'), ['//users/uploads/create', 'user_id' => $model->USER_ID], ['class' => 'btn btn-primary']) ?>
        <!--?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->USER_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?-->
    </p>

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
