<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%user_uploads}}".
 *
 * @property integer $UPLOAD_ID
 * @property integer $USER_ID
 * @property string $FILE_PATH
 * @property string $COMMENTS
 * @property integer $PUBLICLY_AVAILABLE
 * @property string $DATE_UPLOADED
 * @property string $UPDATED
 * @property integer $DELETED
 *
 * @property UserProfile $uSER
 */
class UserUploads extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_uploads}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID'], 'required'],
            [['USER_ID', 'PUBLICLY_AVAILABLE', 'DELETED'], 'integer'],
            [['COMMENTS'], 'string'],
            [['DATE_UPLOADED', 'UPDATED'], 'safe'],
            [['FILE_PATH'], 'string', 'max' => 200],
            [['USER_ID'], 'exist', 'skipOnError' => true, 'targetClass' => UserProfile::className(), 'targetAttribute' => ['USER_ID' => 'USER_ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'UPLOAD_ID' => Yii::t('app', 'Upload  ID'),
            'USER_ID' => Yii::t('app', 'User  ID'),
            'FILE_PATH' => Yii::t('app', 'Document Path'),
            'COMMENTS' => Yii::t('app', 'Comments'),
            'PUBLICLY_AVAILABLE' => Yii::t('app', 'Publicly Available'),
            'DATE_UPLOADED' => Yii::t('app', 'Date Uploaded'),
            'UPDATED' => Yii::t('app', 'Date Updated'),
            'DELETED' => Yii::t('app', 'File Deleted'),
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
