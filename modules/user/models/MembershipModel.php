<?php
/**
 * Created by PhpStorm.
 * User: barsa
 * Date: 3/6/2017
 * Time: 4:08 PM
 */

namespace app\modules\user\models;


use yii\helpers\ArrayHelper;

class MembershipModel extends MembershipType
{
    public static function GetMembershipTypes()
    {
        $list = self::find()->select(['MEMBERSHIP_TYPE_ID', 'MEMBERSHIP_NAME'])->asArray()->all();
        $institution_list = ArrayHelper::map($list, 'MEMBERSHIP_TYPE_ID', 'MEMBERSHIP_NAME');
        return $institution_list;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'MEMBERSHIP_TYPE_ID' => Yii::t('app', 'Membership Type'),
        ];
    }
}