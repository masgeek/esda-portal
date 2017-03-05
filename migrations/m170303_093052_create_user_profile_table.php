<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_profile`.
 */
class m170303_093052_create_user_profile_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('user_profile', [
            'USER_ID' => $this->primaryKey(),
            'USER_NAME' => $this->string(20)->notNull()->unique()->comment('Username'),
            'EMAIL_ADDRESS' => $this->string(80)->notNull()->unique()->comment('Email Address'),
            'SURNAME' => $this->string(80)->notNull()->comment('Surname'),
            'OTHER_NAMES' => $this->string(80)->notNull()->comment('Other Names'),
            'PHONE_NUMBER' => $this->string(30)->comment('Phone Number'),
            'ACCOUNT_STATUS' => $this->string(15)->comment('Account Status'),
            'DATE_REGISTERED' => $this->dateTime()->comment('Date Registered'),
            'DATE_UPDATED' => $this->dateTime()->comment('Last Updated')
        ], 'ENGINE=InnoDB');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('user_profile');
    }
}
