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
        $userIdList = array_reverse(\common\models\User::getIdList());

        $this->batchInsert('{{%accounts}}', ['user_id', 'name', 'amount', 'family_id', 'currency'], [
                [$userIdList[6], 'Наличные', 5000, 1, 'RUB'],
                [$userIdList[5], 'Наличные', 5000, 1, 'RUB'],
                [$userIdList[4], 'Наличные', 5000, 1, 'RUB'],
                [$userIdList[3], 'Наличные', 5000, 1, 'RUB'],
                [$userIdList[2], 'Наличные', 5000, 2, 'RUB'],
                [$userIdList[1], 'Наличные', 5000, 2, 'RUB'],
                [$userIdList[0], 'Наличные', 5000, 2, 'RUB'],
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
