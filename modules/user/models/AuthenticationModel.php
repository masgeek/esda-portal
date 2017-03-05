<?php

namespace app\modules\user\models;

use Yii;
use yii\db\Expression;

class AuthenticationModel extends UserAuthentication
{
    public function beforeSave($insert)
    {
        $date = new Expression('NOW()');
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->CREATED = $date;
            }
            $this->UPDATED = $date;
            return true;
        }
        return false;
    }
}
