<?php

use yii\db\Migration;

/**
 * Class m181203_141822_data_for_profile_table
 */
class m181203_141822_data_for_profile_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->batchInsert('{{%profile}}', ['user_id', 'first_name', 'family_id'], [
                [1, 'Вася', 1],
                [2, 'Петя', 1],
                [3, 'Юля',  1],
                [4, 'Вера', 1],
                [5, 'Игорь',2],
                [6, 'Федор',2],
                [7, 'Катя', 2],
            ]
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181203_141822_data_for_profile_table cannot be reverted.\n";

        return false;
    }


}
