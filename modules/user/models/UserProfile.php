<?php

namespace app\modules\user\models;

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
 * @property integer $INSTITUTION_ID
 * @property string $ACCOUNT_STATUS
 * @property string $DATE_REGISTERED
 * @property string $DATE_UPDATED
 *
 * @property UserAuthentication[] $userAuthentications
 * @property Institutions $iNSTITUTION
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
            [['USER_NAME', 'EMAIL_ADDRESS', 'SURNAME', 'OTHER_NAMES','INSTITUTION_ID'], 'required'],
            [['INSTITUTION_ID'], 'integer'],
            [['DATE_REGISTERED', 'DATE_UPDATED'], 'safe'],
            [['USER_NAME'], 'string', 'max' => 20],
            [['EMAIL_ADDRESS', 'SURNAME', 'OTHER_NAMES'], 'string', 'max' => 80],
            [['PHONE_NUMBER'], 'string', 'max' => 30],
            [['ACCOUNT_STATUS'], 'string', 'max' => 15],
            [['USER_NAME'], 'unique'],
            [['EMAIL_ADDRESS'], 'unique'],
            [['INSTITUTION_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Institutions::className(), 'targetAttribute' => ['INSTITUTION_ID' => 'INSTITUTION_ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'USER_ID' => Yii::t('app', 'User  ID'),
            'USER_NAME' => Yii::t('app', 'Username'),
            'EMAIL_ADDRESS' => Yii::t('app', 'Email Address'),
            'SURNAME' => Yii::t('app', 'Surname'),
            'OTHER_NAMES' => Yii::t('app', 'Other Names'),
            'PHONE_NUMBER' => Yii::t('app', 'Phone Number'),
            'INSTITUTION_ID' => Yii::t('app', 'Affiliated Institution'),
            'ACCOUNT_STATUS' => Yii::t('app', 'Account Status'),
            'DATE_REGISTERED' => Yii::t('app', 'Date Registered'),
            'DATE_UPDATED' => Yii::t('app', 'Last Updated'),
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
    public function getINSTITUTION()
    {
        return $this->hasOne(Institutions::className(), ['INSTITUTION_ID' => 'INSTITUTION_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserUploads()
    {
        return $this->hasMany(UserUploads::className(), ['USER_ID' => 'USER_ID']);
    }
}
