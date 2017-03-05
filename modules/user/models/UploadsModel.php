<?php

namespace app\modules\user\models;

use Yii;
use yii\db\Expression;

/**
 * @var UploadedFile[]
 */
class UploadsModel extends UserUploads
{

    public $imageFiles;
    public $FILE_SELECTOR;

    public function rules()
    {
        return [
            //[['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4],
        ];
    }

    public function upload($user_id)
    {
        $imagesFolder = Yii::$app->params['uploadsFolder'];
        $path = Yii::$app->basePath . $imagesFolder . $user_id . '/';

        if (!file_exists($path)) {
            mkdir($path, 0777); //if directory does not exists create it with full permissions
        }

        if ($this->validate()) {
            foreach ($this->imageFiles as $file) {
                $file_name = $path . $file->baseName . '.' . $file->extension;
                $file->saveAs($file_name);
            }
            return true;
        } else {
            return false;
        }
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
