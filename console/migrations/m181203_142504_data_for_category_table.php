<?php

use yii\db\Migration;

/**
 * Class m181203_142504_data_for_category_table
 */
class m181203_142504_data_for_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%category}}', ['created_by', 'profile_id', 'name', 'family_id'], [
                [1, 1, 'Зарплата', 1],
                [1, 1, 'Проезд', 1],
                [1, 1, 'Еда',  1],
                [1, 1, 'Вещи', 1],
                [5, 1, 'Зарплата',2],
                [5, 2, 'Проезд',2],
                [5, 2, 'Еда', 2],
                [5, 2, 'Вещи', 2],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181203_142504_data_for_category_table cannot be reverted.\n";

        return false;
    }
}
