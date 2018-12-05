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
        $userIdList = \common\models\User::getIdList();
        $profileIdList = \common\models\Profile::getIdList();

        $this->batchInsert('{{%category}}', ['created_by', 'profile_id', 'name', 'family_id'], [
                [$userIdList[0], $profileIdList[0], 'Зарплата', 1],
                [$userIdList[0], $profileIdList[0], 'Проезд',   1],
                [$userIdList[0], $profileIdList[0], 'Еда',      1],
                [$userIdList[0], $profileIdList[0], 'Вещи',     1],
                [$userIdList[6], $profileIdList[6], 'Зарплата', 2],
                [$userIdList[6], $profileIdList[6], 'Проезд',   2],
                [$userIdList[6], $profileIdList[6], 'Еда',      2],
                [$userIdList[6], $profileIdList[6], 'Вещи',     2],
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
