<?php

namespace app\modules\user\models;

use Yii;

/**
 * This is the model class for table "{{%institutions}}".
 *
 * @property integer $INSTITUTION_ID
 * @property string $INSTITUTION_NAME
 * @property string $CREATED
 * @property string $UPDATED
 *
 * @property UserProfile[] $userProfiles
 */
class Institutions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'institutions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['INSTITUTION_NAME'], 'required'],
            [['CREATED', 'UPDATED'], 'safe'],
            [['INSTITUTION_NAME'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'INSTITUTION_ID' => Yii::t('app', 'Institution  ID'),
            'INSTITUTION_NAME' => Yii::t('app', 'Institution Name'),
            'CREATED' => Yii::t('app', 'Created'),
            'UPDATED' => Yii::t('app', 'Updated'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserProfiles()
    {
        return $this->hasMany(UserProfile::className(), ['INSTITUTION_ID' => 'INSTITUTION_ID']);
    }
}
