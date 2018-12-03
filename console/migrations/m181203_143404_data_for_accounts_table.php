<?php

use yii\db\Migration;

/**
 * Class m181203_143404_data_for_accounts_table
 */
class m181203_143404_data_for_accounts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%accounts}}', ['user_id', 'name', 'amount', 'family_id', 'currency'], [
                [1, 'Наличные', 5000, 1, 'RUB'],
                [2, 'Наличные', 5000, 1, 'RUB'],
                [3, 'Наличные', 5000, 1, 'RUB'],
                [4, 'Наличные', 5000, 1, 'RUB'],
                [5, 'Наличные', 5000, 2, 'RUB'],
                [6, 'Наличные', 5000, 2, 'RUB'],
                [7, 'Наличные', 5000, 2, 'RUB'],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181203_143404_data_for_accounts_table cannot be reverted.\n";

        return false;
    }
}
