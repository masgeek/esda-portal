<?php

namespace app\modules\user\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "{{%user_authentication}}".
 *
 * @property integer $AUTHENTICATION_ID
 * @property integer $USER_ID
 * @property string $PASSWORD
 * @property string $PASSWORD_RESET_TOKEN
 * @property string $ACCOUNT_AUTH_KEY
 * @property string $CREATED
 * @property string $UPDATED
 *
 * @property UserProfile $uSER
 */
class UserAuthentication extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_authentication}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'PASSWORD', 'ACCOUNT_AUTH_KEY'], 'required'],
            [['USER_ID'], 'integer'],
            [['CREATED', 'UPDATED'], 'safe'],
            [['PASSWORD', 'PASSWORD_RESET_TOKEN', 'ACCOUNT_AUTH_KEY'], 'string', 'max' => 120],
            [['USER_ID'], 'exist', 'skipOnError' => true, 'targetClass' => UserProfile::className(), 'targetAttribute' => ['USER_ID' => 'USER_ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'AUTHENTICATION_ID' => Yii::t('app', 'Authentication  ID'),
            'USER_ID' => Yii::t('app', 'User  ID'),
            'PASSWORD' => Yii::t('app', 'Password'),
            'PASSWORD_RESET_TOKEN' => Yii::t('app', 'Password Reset Token'),
            'ACCOUNT_AUTH_KEY' => Yii::t('app', 'Password Reset Token'),
            'CREATED' => Yii::t('app', 'Created'),
            'UPDATED' => Yii::t('app', 'Updated'),
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
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUSER()
    {
        return $this->hasOne(UserProfile::className(), ['USER_ID' => 'USER_ID']);
    }
}
