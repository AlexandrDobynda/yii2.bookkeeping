<?php

use yii\db\Migration;

/**
 * Class m181120_080659_change_character_set_for_accounts_table
 */
class m181120_080659_change_character_set_for_accounts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->db
            ->createCommand('ALTER TABLE accounts CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci')
            ->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181120_080659_change_character_set_for_accounts_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181120_080659_change_character_set_for_accounts_table cannot be reverted.\n";

        return false;
    }
    */
}
