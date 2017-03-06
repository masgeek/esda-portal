<?php

use yii\helpers\Html;
//use kartik\detail\DetailView;

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\user\models\UploadsModel */

$this->title = Yii::$app->name . '|' . $model->FILE_NAME;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'My Documents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-uploads-view">

    <h1><?= Html::encode($model->FILE_NAME) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update Document'), ['update', 'id' => $model->UPLOAD_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete File'), ['delete', 'id' => $model->UPLOAD_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'USER_ID',
                'value' => $model->uSER->SURNAME . ' ' . $model->uSER->OTHER_NAMES
            ],
            [
                'attribute' => 'FILE_PATH',
                'format' => 'raw',
                'value' => function ($data) {
                    /* @var $data \app\modules\user\models\UploadsModel */
                    $file_link = '@web' . $data->FILE_PATH;
                    return Html::a($data->FILE_NAME, $file_link);
                }
            ],
            'COMMENTS:ntext',
            'PUBLICLY_AVAILABLE:boolean',
            'DATE_UPLOADED',
            'UPDATED',
            //'DELETED:boolean',
            //['attribute' => 'UPDATED', 'type' => DetailView::INPUT_DATE],
        ],
    ]) ?>

</div>
