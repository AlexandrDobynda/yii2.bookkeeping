<?php

use yii\db\Migration;

/**
 * Class m181203_144057_data_for_transactions_table
 */
class m181203_144057_data_for_transactions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%transactions}}', ['user_id', 'amount', 'account_id', 'category_id', 'profile_id', 'created_at', 'date', 'family_id' ], [
                [1, rand(-5000, -1)  , 1, 2, 1, time(), time() + rand(-604800, 604800), 1],
                [1, rand(-5000, -1)  , 1, 4, 1, time(), time() + rand(-604800, 604800), 1],
                [1, rand(-5000, -1)  , 1, 2, 1, time(), time() + rand(-604800, 604800), 1],
                [1, rand(-5000, -1)  , 1, 3, 1, time(), time() + rand(-604800, 604800), 1],
                [1, rand(-5000, -1)  , 1, 2, 1, time(), time() + rand(-604800, 604800), 1],
                [1, rand(5000, 10000), 1, 1, 1, time(), time() + rand(-604800, 604800), 1],
                [2, rand(-5000, -1)  , 2, 2, 2, time(), time() + rand(-604800, 604800), 1],
                [2, rand(-5000, -1)  , 2, 3, 2, time(), time() + rand(-604800, 604800), 1],
                [2, rand(-5000, -1)  , 2, 4, 2, time(), time() + rand(-604800, 604800), 1],
                [2, rand(-5000, -1)  , 2, 3, 2, time(), time() + rand(-604800, 604800), 1],
                [2, rand(-5000, -1)  , 2, 2, 2, time(), time() + rand(-604800, 604800), 1],
                [2, rand(5000, 10000), 2, 1, 2, time(), time() + rand(-604800, 604800), 1],
                [3, rand(-5000, -1)  , 3, 3, 3, time(), time() + rand(-604800, 604800), 1],
                [3, rand(-5000, -1)  , 3, 4, 3, time(), time() + rand(-604800, 604800), 1],
                [3, rand(-5000, -1)  , 3, 2, 3, time(), time() + rand(-604800, 604800), 1],
                [3, rand(-5000, -1)  , 3, 3, 3, time(), time() + rand(-604800, 604800), 1],
                [3, rand(5000, 10000), 3, 1, 3, time(), time() + rand(-604800, 604800), 1],
                [3, rand(-5000, -1)  , 3, 3, 3, time(), time() + rand(-604800, 604800), 1],
                [4, rand(-5000, -1)  , 4, 2, 4, time(), time() + rand(-604800, 604800), 1],
                [4, rand(-5000, -1)  , 4, 4, 4, time(), time() + rand(-604800, 604800), 1],
                [4, rand(-5000, -1)  , 4, 3, 4, time(), time() + rand(-604800, 604800), 1],
                [4, rand(-5000, -1)  , 4, 2, 4, time(), time() + rand(-604800, 604800), 1],
                [4, rand(5000, 10000), 4, 1, 4, time(), time() + rand(-604800, 604800), 1],
                [5, rand(-5000, -1)  , 5, 6, 5, time(), time() + rand(-604800, 604800), 2],
                [5, rand(-5000, -1)  , 5, 7, 5, time(), time() + rand(-604800, 604800), 2],
                [5, rand(-5000, -1)  , 5, 8, 5, time(), time() + rand(-604800, 604800), 2],
                [5, rand(5000, 10000), 5, 5, 5, time(), time() + rand(-604800, 604800), 2],
                [6, rand(-5000, -1)  , 6, 6, 6, time(), time() + rand(-604800, 604800), 2],
                [6, rand(-5000, -1)  , 6, 7, 6, time(), time() + rand(-604800, 604800), 2],
                [6, rand(-5000, -1)  , 6, 6, 6, time(), time() + rand(-604800, 604800), 2],
                [6, rand(-5000, -1)  , 6, 2, 6, time(), time() + rand(-604800, 604800), 2],
                [6, rand(-5000, -1)  , 6, 8, 6, time(), time() + rand(-604800, 604800), 2],
                [6, rand(-5000, -1)  , 6, 7, 6, time(), time() + rand(-604800, 604800), 2],
                [6, rand(5000, 10000), 6, 5, 6, time(), time() + rand(-604800, 604800), 2],
                [7, rand(-5000, -1)  , 7, 6, 7, time(), time() + rand(-604800, 604800), 2],
                [7, rand(-5000, -1)  , 7, 7, 7, time(), time() + rand(-604800, 604800), 2],
                [7, rand(-5000, -1)  , 7, 8, 7, time(), time() + rand(-604800, 604800), 2],
                [7, rand(-5000, -1)  , 7, 6, 7, time(), time() + rand(-604800, 604800), 2],
                [7, rand(-5000, -1)  , 7, 8, 7, time(), time() + rand(-604800, 604800), 2],
                [7, rand(-5000, -1)  , 7, 7, 7, time(), time() + rand(-604800, 604800), 2],
                [7, rand(-5000, -1)  , 7, 6, 7, time(), time() + rand(-604800, 604800), 2],
                [7, rand(5000, 10000), 7, 5, 7, time(), time() + rand(-604800, 604800), 2],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181203_144057_data_for_transactions_table cannot be reverted.\n";

        return false;
    }
}
