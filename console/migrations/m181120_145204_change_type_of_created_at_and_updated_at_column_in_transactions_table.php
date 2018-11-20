<?php

use yii\db\Migration;

/**
 * Class m181120_145204_change_type_of_created_at_and_updated_at_column_in_transactions_table
 */
class m181120_145204_change_type_of_created_at_and_updated_at_column_in_transactions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('transactions','created_at','integer(11)');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181120_145204_change_type_of_created_at_and_updated_at_column_in_transactions_table cannot be reverted.\n";

        return false;
    }

}
