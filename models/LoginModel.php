<?php
/**
 * Created by PhpStorm.
 * User: KRONOS
 * Date: 3/5/2017
 * Time: 01:33
 */

namespace app\models;


use app\modules\user\models\UserAuthentication;
use app\modules\user\models\UserProfile;
use yii\web\IdentityInterface;

class LoginModel extends UserAuthentication implements IdentityInterface
{
    public $LOGIN_ID;
    public $EMAIL_ADDRESS;
    public $ACCOUNT_AUTH_KEY;
    public $PASSWORD_RESET_TOKEN;
    public $passwordHashCost = 13;

    public function rules()
    {
        return [
            [['USER_ID', 'PASSWORD'], 'required'],
        ];
    }

    /* authentication classes here */

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['ACCESS_TOKEN' => $token]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     * @return string
     */
    public function getAuthKey()
    {
        return $this->ACCOUNT_AUTH_KEY;
    }

    /**
     * @inheritdoc
     * @param $username
     * @return null|static
     */
    public static function findByUsername($username)
    {
        $username = null;
        $userModel = UserProfile::findOne(['USER_NAME' => $username]);
        if ($userModel != null) {
            $username = static::findOne(['USER_ID' => $userModel->USER_ID]);
        }

        return $username;
    }

    /**
     * @inheritdoc
     * @param $authKey
     * @return bool
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Password validation during login
     * @param $password
     * @return bool
     */
    public function validatePassword($password)
    {
        return $this->PASSWORD === sha1($password);
    }

    public function setPassword($password)
    {
        $this->LOGIN_ID = Security::generatePasswordHash($password);
    }

    public function getPassword()
    {
        return $this->LOGIN_ID;
    }


    /**
     * Generates a password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->PASSWORD_RESET_TOKEN = Security::generateRandomKey() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->PASSWORD_RESET_TOKEN = null;
    }
}