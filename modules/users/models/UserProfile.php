<?php

namespace app\modules\users\models;

use Yii;

/**
 * This is the model class for table "{{%user_profile}}".
 *
 * @property integer $USER_ID
 * @property string $USER_NAME
 * @property string $EMAIL_ADDRESS
 * @property string $SURNAME
 * @property string $OTHER_NAMES
 * @property string $PHONE_NUMBER
 * @property integer $ACCOUNT_STATUS
 * @property string $DATE_REGISTERED
 * @property string $DATE_UPDATED
 *
 * @property UserAuthentication[] $userAuthentications
 * @property UserUploads[] $userUploads
 */
class UserProfile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_profile}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_NAME', 'EMAIL_ADDRESS', 'SURNAME', 'OTHER_NAMES'], 'required'],
            [['ACCOUNT_STATUS'], 'integer'],
            [['DATE_REGISTERED', 'DATE_UPDATED'], 'safe'],
            [['USER_NAME', 'SURNAME'], 'string', 'max' => 10],
            [['EMAIL_ADDRESS'], 'string', 'max' => 15],
            [['OTHER_NAMES'], 'string', 'max' => 25],
            [['PHONE_NUMBER'], 'string', 'max' => 20],
            [['USER_NAME'], 'unique'],
            [['EMAIL_ADDRESS'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'USER_ID' => 'User  ID',
            'USER_NAME' => 'Username',
            'EMAIL_ADDRESS' => 'Email Address',
            'SURNAME' => 'Surname',
            'OTHER_NAMES' => 'Other Names',
            'PHONE_NUMBER' => 'Phone Number',
            'ACCOUNT_STATUS' => 'Account Status',
            'DATE_REGISTERED' => 'Date Registered',
            'DATE_UPDATED' => 'Last Updated',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserAuthentications()
    {
        return $this->hasMany(UserAuthentication::className(), ['USER_ID' => 'USER_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserUploads()
    {
        return $this->hasMany(UserUploads::className(), ['USER_ID' => 'USER_ID']);
    }
}
