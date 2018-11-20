<?php

use yii\db\Migration;

/**
 * Class m181120_150011_change_type_of__updated_at_column_in_transactions_table
 */
class m181120_150011_change_type_of__updated_at_column_in_transactions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('transactions','date','integer(11)');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181120_150011_change_type_of__updated_at_column_in_transactions_table cannot be reverted.\n";

        return false;
    }
}
