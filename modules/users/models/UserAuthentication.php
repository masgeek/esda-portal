<?php

namespace app\modules\users\models;

use Yii;

/**
 * This is the model class for table "{{%user_authentication}}".
 *
 * @property integer $AUTHENTICATION_ID
 * @property integer $USER_ID
 * @property string $PASSWORD
 * @property string $SALT
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
            [['USER_ID', 'PASSWORD', 'SALT'], 'required'],
            [['USER_ID'], 'integer'],
            [['CREATED', 'UPDATED'], 'safe'],
            [['PASSWORD'], 'string', 'max' => 120],
            [['SALT'], 'string', 'max' => 200],
            [['USER_ID'], 'exist', 'skipOnError' => true, 'targetClass' => UserProfile::className(), 'targetAttribute' => ['USER_ID' => 'USER_ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'AUTHENTICATION_ID' => 'Authentication  ID',
            'USER_ID' => 'User  ID',
            'PASSWORD' => 'Password',
            'SALT' => 'Password Hash',
            'CREATED' => 'Created',
            'UPDATED' => 'Updated',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUSER()
    {
        return $this->hasOne(UserProfile::className(), ['USER_ID' => 'USER_ID']);
    }
}
