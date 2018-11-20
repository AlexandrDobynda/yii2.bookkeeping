<?php

use yii\db\Migration;

/**
 * Class m181120_074221_change_character_set_for_profile_table
 */
class m181120_074221_change_character_set_for_profile_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->db
            ->createCommand("ALTER TABLE profile CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci")
            ->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181120_074221_change_character_set_for_profile_table cannot be reverted.\n";

        return false;
    }
}
