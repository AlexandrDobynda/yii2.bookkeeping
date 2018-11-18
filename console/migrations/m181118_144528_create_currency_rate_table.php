<?php

use yii\db\Migration;

/**
 * Handles the creation of table `currency_rate`.
 */
class m181118_144528_create_currency_rate_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('currency_rate', [
            'id' => $this->primaryKey(),
            'name' => $this->text(),
            'char_code' => $this->text(),
            'value' => $this->float(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('currency_rate');
    }
}
