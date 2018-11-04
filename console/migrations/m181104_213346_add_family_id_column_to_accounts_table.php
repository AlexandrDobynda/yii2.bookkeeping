<?php

use yii\db\Migration;

/**
 * Handles adding family_id to table `accounts`.
 * Has foreign keys to the tables:
 *
 * - `family`
 */
class m181104_213346_add_family_id_column_to_accounts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('accounts', 'family_id', $this->integer());

        // creates index for column `family_id`
        $this->createIndex(
            'idx-accounts-family_id',
            'accounts',
            'family_id'
        );

        // add foreign key for table `family`
        $this->addForeignKey(
            'fk-accounts-family_id',
            'accounts',
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
            'fk-accounts-family_id',
            'accounts'
        );

        // drops index for column `family_id`
        $this->dropIndex(
            'idx-accounts-family_id',
            'accounts'
        );

        $this->dropColumn('accounts', 'family_id');
    }
}
