<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\user\search\UploadsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Public Documents');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-uploads-index">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'header' => Yii::t('app', 'Owner Names'),
                'attribute' => 'USER_ID',
                'value' => function ($data) {
                    /* @var $data app\modules\user\search\UploadsSearch */
                    return $data->uSER->SURNAME . ' ' . $data->uSER->OTHER_NAMES;
                }
            ],
            [
                'attribute' => 'FILE_PATH',
                'format' => 'raw',
                'value' => function ($data) {
                    /* @var $data app\modules\user\search\UploadsSearch */
                    $file_link = '@web' . $data->FILE_PATH;
                    return Html::a($data->FILE_NAME, $file_link);
                },
                'filter' => false
            ],
            'COMMENTS:ntext',
            'PUBLICLY_AVAILABLE:boolean',
            'DATE_UPLOADED',
            'UPDATED',
            // 'DELETED',
        ],
    ]); ?>
</div>
