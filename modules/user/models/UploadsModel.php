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
        $resp = [];
        $imagesFolder = Yii::$app->params['uploadsFolder'];
        $directory_path = $imagesFolder . $user_id . '/';
        $save_path = Yii::$app->basePath . $directory_path;

        if (!file_exists($save_path)) {
            mkdir($save_path, 0777); //if directory does not exists create it with full permissions
        }

        if ($this->validate()) {
            foreach ($this->imageFiles as $file) {
                $full_file_name = $file->baseName . '.' . $file->extension;
                $full_file_name_path = $save_path . $full_file_name;
                $file->saveAs($full_file_name_path);
                $resp[] = [
                    'success' => true,
                    'path' => $directory_path,
                    'file_name' => $full_file_name
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
