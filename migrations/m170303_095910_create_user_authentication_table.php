<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_authentication`.
 */
class m170303_095910_create_user_authentication_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user_authentication', [
            'AUTHENTICATION_ID' => $this->primaryKey(),
            'USER_ID' => $this->integer()->notNull(),
            'PASSWORD' => $this->string(120)->notNull()->comment('Password'),
            'SALT' => $this->string(200)->notNull()->comment('Password Hash'),
            'CREATED' => $this->dateTime(),
            'UPDATED' => $this->dateTime()
        ]);

        //add foregin keys
        $this->addForeignKey('fk_user_auth', 'user_authentication', 'USER_ID', 'user_profile', 'USER_ID', 'CASCADE', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user_authentication');
    }
}
