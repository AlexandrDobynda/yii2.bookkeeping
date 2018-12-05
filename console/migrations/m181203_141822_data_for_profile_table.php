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
        $userIdList = array_reverse(\common\models\User::getIdList());


        $this->batchInsert('{{%profile}}', ['user_id', 'first_name', 'family_id'], [
                [$userIdList[6], 'Вася', 1],
                [$userIdList[5], 'Петя', 1],
                [$userIdList[4], 'Юля',  1],
                [$userIdList[3], 'Вера', 1],
                [$userIdList[2], 'Игорь',2],
                [$userIdList[1], 'Федор',2],
                [$userIdList[0], 'Катя', 2],
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
