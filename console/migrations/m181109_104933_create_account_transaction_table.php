<?php

use yii\db\Migration;

/**
 * Handles the creation of table `account_transaction`.
 * Has foreign keys to the tables:
 *
 * - `accounts`
 * - `accounts`
 * - `user`
 */
class m181109_104933_create_account_transaction_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('account_transaction', [
            'id' => $this->primaryKey(),
            'from_id' => $this->integer(),
            'to_id' => $this->integer(),
            'amount' => $this->float(),
            'user_id' => $this->integer(),
        ]);

        // creates index for column `from_id`
        $this->createIndex(
            'idx-account_transaction-from_id',
            'account_transaction',
            'from_id'
        );

        // add foreign key for table `accounts`
        $this->addForeignKey(
            'fk-account_transaction-from_id',
            'account_transaction',
            'from_id',
            'accounts',
            'id',
            'CASCADE'
        );

        // creates index for column `to_id`
        $this->createIndex(
            'idx-account_transaction-to_id',
            'account_transaction',
            'to_id'
        );

        // add foreign key for table `accounts`
        $this->addForeignKey(
            'fk-account_transaction-to_id',
            'account_transaction',
            'to_id',
            'accounts',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            'idx-account_transaction-user_id',
            'account_transaction',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-account_transaction-user_id',
            'account_transaction',
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
        // drops foreign key for table `accounts`
        $this->dropForeignKey(
            'fk-account_transaction-from_id',
            'account_transaction'
        );

        // drops index for column `from_id`
        $this->dropIndex(
            'idx-account_transaction-from_id',
            'account_transaction'
        );

        // drops foreign key for table `accounts`
        $this->dropForeignKey(
            'fk-account_transaction-to_id',
            'account_transaction'
        );

        // drops index for column `to_id`
        $this->dropIndex(
            'idx-account_transaction-to_id',
            'account_transaction'
        );

        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-account_transaction-user_id',
            'account_transaction'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-account_transaction-user_id',
            'account_transaction'
        );

        $this->dropTable('account_transaction');
    }
}
