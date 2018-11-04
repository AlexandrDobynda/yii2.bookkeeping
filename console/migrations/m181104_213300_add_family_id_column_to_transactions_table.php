<?php

use yii\db\Migration;

/**
 * Handles adding family_id to table `transactions`.
 * Has foreign keys to the tables:
 *
 * - `family`
 */
class m181104_213300_add_family_id_column_to_transactions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('transactions', 'family_id', $this->integer());

        // creates index for column `family_id`
        $this->createIndex(
            'idx-transactions-family_id',
            'transactions',
            'family_id'
        );

        // add foreign key for table `family`
        $this->addForeignKey(
            'fk-transactions-family_id',
            'transactions',
            'family_id',
            'family',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `family`
        $this->dropForeignKey(
            'fk-transactions-family_id',
            'transactions'
        );

        // drops index for column `family_id`
        $this->dropIndex(
            'idx-transactions-family_id',
            'transactions'
        );

        $this->dropColumn('transactions', 'family_id');
    }
}
