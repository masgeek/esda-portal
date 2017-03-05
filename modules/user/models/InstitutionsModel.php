<?php

namespace app\modules\user\models;


use yii\db\Expression;
use yii\helpers\ArrayHelper;

class InstitutionsModel extends Institutions
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['INSTITUTION_NAME'], 'required'],
            [['INSTITUTION_NAME'], 'unique'],
            [['CREATED', 'UPDATED'], 'safe'],
            [['INSTITUTION_NAME'], 'string', 'max' => 150],
        ];
    }

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

    public static function GetInstitutionList()
    {
        $list = self::find()->select(['INSTITUTION_ID', 'INSTITUTION_NAME'])->asArray()->all();
        $institution_list = ArrayHelper::map($list, 'INSTITUTION_ID', 'INSTITUTION_NAME');
        return $institution_list;
    }
}
