<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use Yii;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";
    }

    /**
     * @inheritdoc
     */
    public function actionDrop()
    {
        Yii::$app->db->createCommand("SET foreign_key_checks = 0")->execute();
        $tables = Yii::$app->db->schema->getTableNames();
        foreach ($tables as $table) {
            Yii::$app->db->createCommand()->dropTable($table)->execute();
            echo "Dropped table $table\n";
        }
        Yii::$app->db->createCommand("SET foreign_key_checks = 1")->execute();
    }
}
