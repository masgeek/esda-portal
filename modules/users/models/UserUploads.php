<?php

namespace app\modules\users\models;

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
            'UPLOAD_ID' => 'Upload  ID',
            'USER_ID' => 'User  ID',
            'FILE_PATH' => 'Document Path',
            'COMMENTS' => 'Comments',
            'PUBLICLY_AVAILABLE' => 'Publicly Available',
            'DATE_UPLOADED' => 'Date Uploaded',
            'UPDATED' => 'Date Updated',
            'DELETED' => 'File Deleted',
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
