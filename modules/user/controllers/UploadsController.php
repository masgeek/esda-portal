<?php

namespace app\modules\user\controllers;

use Yii;
use app\modules\user\models\UploadsModel;
use app\modules\user\search\UploadsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * UploadsController implements the CRUD actions for UserUploads model.
 */
class UploadsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all UserUploads models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UploadsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserUploads model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new UserUploads model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($user_id)
    {
        $model = new UploadsModel();

        $model->USER_ID = $user_id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->UPLOAD_ID]);
        } else {
            return $this->render('create', [
                'model' => $model
            ]);
        }
    }

    public function actionFileUpload()
    {
        $user_id = (Yii::$app->request->post('USER_ID'));

        //print_r(json_encode($_FILES));
        $path = '@app/useruploads';
        $model = new UploadsModel();
        if (Yii::$app->request->isPost) {
            $model->imageFiles = UploadedFile::getInstances($model, 'FILE_NAME');
            $image = $model->upload($user_id);
            ///var_dump($image);
        }
        //echo $path;
        exit(0);
    }

    public function actionFileUploadOld()
    {
        $output = []; //empty if successfull
        $model = new UploadsModel();
        $post = ['Images' => Yii::$app->request->post()];
        $model->load($post);

        $image = $model->upload();

        var_dump($image);
        die;
        // upload only if valid uploaded file instance found
        if ($image !== false) {
            $imageUrl = $model->getImageUrl();
            $model->FILE_PATH = $imageUrl;
            if ($model->save()) {
                if ($image !== false) {
                    $save_path = $model->getImageFile();
                    $image->saveAs($save_path);
                }
                //return $this->redirect(['view', 'id' => $model->IMAGE_ID]);
            } else {
                // error in saving model
                $errors = '';
                foreach ($model->getErrors() as $key => $value) {
                    //$errors .= '<a class="list-group-item" href="#">';
                    $errors .= $value[0] . '<br/>';
                    //$errors .= '</a>';
                }
                //$errors .= '</div>';
                $output = ['error' => $errors];
            }
        } else {
            $output = ['error' => 'No files were processed.'];
        }
// return a json encoded response for plugin to process successfully
        echo json_encode($output);
    }

    /**
     * Updates an existing UserUploads model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->UPLOAD_ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing UserUploads model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UserUploads model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UploadsModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UploadsModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
