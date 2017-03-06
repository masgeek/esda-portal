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
            'MEMBERSHIP_NAME' => $this->string(25)->notNull()->comment('Membership Name'),
        ], 'ENGINE=InnoDB');

        //add teh default data
        $this->insert('membership_type', ['MEMBERSHIP_NAME' =>'RESEARCHER']);
        $this->insert('membership_type', ['MEMBERSHIP_NAME' =>'ENTREPRENEUR']);
        $this->insert('membership_type', ['MEMBERSHIP_NAME' =>'INCUBATOR']);
        $this->insert('membership_type', ['MEMBERSHIP_NAME' =>'RESOURCE PERSONNEL']);
        $this->insert('membership_type', ['MEMBERSHIP_NAME' =>'MENTOR']);
        $this->insert('membership_type', ['MEMBERSHIP_NAME' =>'OTHER']);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('membership_type');
    }
}
