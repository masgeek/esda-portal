<?php

namespace app\modules\user\models;

use app\components\Constants;
use Yii;
use yii\db\Expression;

/**
 * @var UploadedFile[]
 */
class UploadsModel extends UserUploads
{

    public $imageFiles;
    public $FILE_SELECTOR;

    /**
     * @inheritdoc
     * @return array
     */
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[Constants::SCENARIO_AJAX_UPLOAD] = ['imageFiles', 'FILE_SELECTOR'];//Scenario Values Only Accepted
        $scenarios[Constants::SCENARIO_INSERT] = ['USER_ID', 'FILE_NAME', 'FILE_PATH','COMMENTS', 'PUBLICLY_AVAILABLE'];//Scenario Values Only Accepted
        return $scenarios;
    }

    public function rules()
    {
        return [
            [['USER_ID', 'FILE_NAME', 'FILE_PATH', 'PUBLICLY_AVAILABLE'], 'required','on'=>[Constants::SCENARIO_INSERT]],
            [['USER_ID', 'PUBLICLY_AVAILABLE', 'DELETED'], 'integer'],
            [['COMMENTS'], 'string'],
            [['DATE_UPLOADED', 'UPDATED'], 'safe'],
            [['FILE_NAME', 'FILE_PATH'], 'string', 'max' => 200],
            [['USER_ID'], 'exist', 'skipOnError' => true, 'targetClass' => UserProfile::className(), 'targetAttribute' => ['USER_ID' => 'USER_ID']],
            //[['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4],
        ];
    }

    public function attributeLabels()
    {
        return [
            'FILE_PATH' => Yii::t('app', 'Document Link'),
            'PUBLICLY_AVAILABLE' => Yii::t('app', 'Publicly Available'),
        ];
    }

    public function upload($user_id)
    {
        $resp = [];
        $imagesFolder = Yii::$app->params['uploadsFolder'];
        $directory_path = $imagesFolder . $user_id . '/';
        $save_path = Yii::$app->basePath . $directory_path;

        if (!file_exists($save_path)) {
            //mkdir($save_path, 0777); //if directory does not exists create it with full permissions
            mkdir($save_path); //if directory does not exists create it with full permissions
        }

        if ($this->validate()) {
            foreach ($this->imageFiles as $file) {
                $full_file_name = $file->baseName . '.' . $file->extension;
                $full_file_name_path = $save_path . $full_file_name;
                $file->saveAs($full_file_name_path);
                $resp[] = [
                    'success' => true,
                    'path' => $directory_path . $full_file_name,
                    'file_name' => $full_file_name,
                ];
            }
        }
        return $resp;
    }

    public function beforeSave($insert)
    {
        $date = new Expression('NOW()');
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->DATE_UPLOADED = $date;
            }
            $this->UPDATED = $date;
            return true;
        }
        return false;
    }
}
