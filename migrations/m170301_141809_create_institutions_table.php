<?php

use yii\db\Migration;

/**
 * Handles the creation of table `institutions`.
 */
class m170301_141809_create_institutions_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('institutions', [
            'INSTITUTION_ID' => $this->primaryKey(),
            'INSTITUTION_NAME' => $this->string(150)->notNull()->comment('Institution Name'),
            'CREATED' => $this->dateTime(),
            'UPDATED' => $this->dateTime()
        ], 'ENGINE=InnoDB');


        $this->insert('institutions', ['INSTITUTION_NAME' => 'University of Nairobi',]);
        $this->insert('institutions', ['INSTITUTION_NAME' => 'Kenyatta University',]);
        $this->insert('institutions', ['INSTITUTION_NAME' => 'Rhodes University',]);
        $this->insert('institutions', ['INSTITUTION_NAME' => 'Makerere University',]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('institutions');
    }
}
