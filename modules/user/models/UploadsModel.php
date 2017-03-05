<?php

namespace app\modules\user\models;

use Yii;
use yii\db\Expression;

class UploadsModel extends UserUploads
{
    /* anyhting needed here */

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
