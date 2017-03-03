<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\user\search\ProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'User Profiles');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create User Profile'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'USER_ID',
            'USER_NAME',
            'EMAIL_ADDRESS:email',
            'SURNAME',
            'OTHER_NAMES',
            // 'PHONE_NUMBER',
            // 'ACCOUNT_STATUS',
            // 'DATE_REGISTERED',
            // 'DATE_UPDATED',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
