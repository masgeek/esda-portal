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
        $table_name = 'institutions';

        $faker = Faker\Factory::create();

        $this->createTable($table_name, [
            'INSTITUTION_ID' => $this->primaryKey(),
            'INSTITUTION_NAME' => $this->string(150)->notNull()->comment('Institution Name'),
            'CREATED' => $this->dateTime(),
            'UPDATED' => $this->dateTime()
        ], 'ENGINE=InnoDB');


        /* sample data */

        if (YII_DEBUG) {
            for ($x = 0; $x <= 20; $x++) {
                $this->insert('institutions', [
                    'INSTITUTION_NAME' => ucfirst(strtolower($faker->company)),
                    'CREATED' => $faker->dateTime->format('Y-m-d H:i:s'),
                    'UPDATED' => $faker->dateTime->format('Y-m-d H:i:s')
                ]);
            }
        }
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('institutions');
    }
}
