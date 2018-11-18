<?php

use yii\db\Migration;

/**
 * Handles adding updated_at to table `currency_rate`.
 */
class m181118_145917_add_updated_at_column_to_currency_rate_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('currency_rate', 'updated_at', $this->integer(11));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('currency_rate', 'updated_at');
    }
}
