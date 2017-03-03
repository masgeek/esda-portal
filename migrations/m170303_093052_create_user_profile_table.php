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
    public function up()
    {
        $this->createTable('user_profile', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user_profile');
    }
}
