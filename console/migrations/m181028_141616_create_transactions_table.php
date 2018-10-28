<?php

use yii\db\Migration;

/**
 * Handles the creation of table `transactions`.
 * Has foreign keys to the tables:
 *
 * - `user`
 * - `category`
 * - `accounts`
 * - `profile`
 */
class m181028_141616_create_transactions_table extends Migration
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

        $this->createTable('transactions', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'amount' => $this->float(),
            'category_id' => $this->integer(),
            'account_id' => $this->integer(),
            'profile_id' => $this->integer(),
            'created_at' => $this->date(),
            'date' => $this->date(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-transactions-user_id',
            'transactions',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-transactions-user_id',
            'transactions',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `category_id`
        $this->createIndex(
            'idx-transactions-category_id',
            'transactions',
            'category_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-transactions-category_id',
            'transactions',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );

        // creates index for column `account_id`
        $this->createIndex(
            'idx-transactions-account_id',
            'transactions',
            'account_id'
        );

        // add foreign key for table `accounts`
        $this->addForeignKey(
            'fk-transactions-account_id',
            'transactions',
            'account_id',
            'accounts',
            'id',
            'CASCADE'
        );

        // creates index for column `profile_id`
        $this->createIndex(
            'idx-transactions-profile_id',
            'transactions',
            'profile_id'
        );

        // add foreign key for table `profile`
        $this->addForeignKey(
            'fk-transactions-profile_id',
            'transactions',
            'profile_id',
            'profile',
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
            'fk-transactions-user_id',
            'transactions'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-transactions-user_id',
            'transactions'
        );

        // drops foreign key for table `category`
        $this->dropForeignKey(
            'fk-transactions-category_id',
            'transactions'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            'idx-transactions-category_id',
            'transactions'
        );

        // drops foreign key for table `accounts`
        $this->dropForeignKey(
            'fk-transactions-account_id',
            'transactions'
        );

        // drops index for column `account_id`
        $this->dropIndex(
            'idx-transactions-account_id',
            'transactions'
        );

        // drops foreign key for table `profile`
        $this->dropForeignKey(
            'fk-transactions-profile_id',
            'transactions'
        );

        // drops index for column `profile_id`
        $this->dropIndex(
            'idx-transactions-profile_id',
            'transactions'
        );

        $this->dropTable('transactions');
    }
}
