<?php

use yii\db\Migration;

/**
 * Handles the creation of table `family`.
 * Has foreign keys to the tables:
 *
 * - `user`
 * - `category`
 * - `accounts`
 * - `transactions`
 */
class m181028_144417_create_family_table extends Migration
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

        $this->createTable('family', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer(),
            'category_id' => $this->integer(),
            'account_id' => $this->integer(),
            'transaction_id' => $this->integer(),
        ]);

        // creates index for column `owner_id`
        $this->createIndex(
            'idx-family-owner_id',
            'family',
            'owner_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-family-owner_id',
            'family',
            'owner_id',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `category_id`
        $this->createIndex(
            'idx-family-category_id',
            'family',
            'category_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-family-category_id',
            'family',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );

        // creates index for column `account_id`
        $this->createIndex(
            'idx-family-account_id',
            'family',
            'account_id'
        );

        // add foreign key for table `accounts`
        $this->addForeignKey(
            'fk-family-account_id',
            'family',
            'account_id',
            'accounts',
            'id',
            'CASCADE'
        );

        // creates index for column `transaction_id`
        $this->createIndex(
            'idx-family-transaction_id',
            'family',
            'transaction_id'
        );

        // add foreign key for table `transactions`
        $this->addForeignKey(
            'fk-family-transaction_id',
            'family',
            'transaction_id',
            'transactions',
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
            'fk-family-owner_id',
            'family'
        );

        // drops index for column `owner_id`
        $this->dropIndex(
            'idx-family-owner_id',
            'family'
        );

        // drops foreign key for table `category`
        $this->dropForeignKey(
            'fk-family-category_id',
            'family'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            'idx-family-category_id',
            'family'
        );

        // drops foreign key for table `accounts`
        $this->dropForeignKey(
            'fk-family-account_id',
            'family'
        );

        // drops index for column `account_id`
        $this->dropIndex(
            'idx-family-account_id',
            'family'
        );

        // drops foreign key for table `transactions`
        $this->dropForeignKey(
            'fk-family-transaction_id',
            'family'
        );

        // drops index for column `transaction_id`
        $this->dropIndex(
            'idx-family-transaction_id',
            'family'
        );

        $this->dropTable('family');
    }
}
