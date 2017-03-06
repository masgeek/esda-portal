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
        $this->insert('membership_type', ['MEMBERSHIP_NAME' =>'RESEARCHERS']);
        $this->insert('membership_type', ['MEMBERSHIP_NAME' =>'ENTREPRENEURS']);
        $this->insert('membership_type', ['MEMBERSHIP_NAME' =>'INCUBATORS']);
        $this->insert('membership_type', ['MEMBERSHIP_NAME' =>'RESOURCE PERSONNEL']);
        $this->insert('membership_type', ['MEMBERSHIP_NAME' =>'MENTORS']);
        $this->insert('membership_type', ['MEMBERSHIP_NAME' =>'OTHERS']);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('membership_type');
    }
}
