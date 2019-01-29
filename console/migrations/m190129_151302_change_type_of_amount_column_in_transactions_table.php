<?php

use yii\db\Migration;

/**
 * Class m190129_151302_chang_type_of_amount_column_in_transactions_table
 */
class m190129_151302_change_type_of_amount_column_in_transactions_table extends Migration
{
    private $tableName = 'transactions';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn($this->tableName,'amount','DECIMAL(50,2)');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190129_151302_change_type_of_amount_column_in_transactions_table cannot be reverted.\n";

        return false;
    }

}
