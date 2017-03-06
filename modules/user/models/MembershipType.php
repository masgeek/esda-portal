<?php

namespace app\modules\user\models;

use Yii;

/**
 * This is the model class for table "{{%membership_type}}".
 *
 * @property integer $MEMBERSHIP_TYPE_ID
 * @property string $MEMBERSHIP_NAME
 *
 * @property UserProfile[] $userProfiles
 */
class MembershipType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%membership_type}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MEMBERSHIP_NAME'], 'required'],
            [['MEMBERSHIP_NAME'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'MEMBERSHIP_TYPE_ID' => Yii::t('app', 'Membership  Type  ID'),
            'MEMBERSHIP_NAME' => Yii::t('app', 'Membership Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserProfiles()
    {
        return $this->hasMany(UserProfile::className(), ['MEMBERSHIP_TYPE_ID' => 'MEMBERSHIP_TYPE_ID']);
    }
}
