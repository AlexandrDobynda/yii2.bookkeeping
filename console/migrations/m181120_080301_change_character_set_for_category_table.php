<?php

use yii\db\Migration;

/**
 * Class m181120_080301_change_character_set_for_category_table
 */
class m181120_080301_change_character_set_for_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->db
            ->createCommand('ALTER TABLE category CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci')
            ->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181120_080301_change_character_set_for_category_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181120_080301_change_character_set_for_category_table cannot be reverted.\n";

        return false;
    }
    */
}
