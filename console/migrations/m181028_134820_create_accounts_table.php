<?php

use yii\db\Migration;

/**
 * Handles the creation of table `accounts`.
 * Has foreign keys to the tables:
 *
 * - `user`
 */
class m181028_134820_create_accounts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('accounts', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'name' => $this->text(),
            'amount' => $this->integer(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-accounts-user_id',
            'accounts',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-accounts-user_id',
            'accounts',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-accounts-user_id',
            'accounts'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-accounts-user_id',
            'accounts'
        );

        $this->dropTable('accounts');
    }
}
