<?php

use yii\db\Migration;

/**
 * Handles the creation of table `membership_type`.
 */
class m170301_125627_create_membership_type_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('membership_type', [
            'MEMBERSHIP_TYPE_ID' => $this->primaryKey(),
            'MEMBERSHIP_NAME'=>$this->string(25)->notNull()->comment('Membership Name'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('membership_type');
    }
}
