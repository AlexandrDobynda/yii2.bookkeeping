<?php

use yii\db\Migration;

/**
 * Handles adding family_id to table `user`.
 * Has foreign keys to the tables:
 *
 * - `family`
 */
class m181028_145451_add_family_id_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'family_id', $this->integer());

        // creates index for column `family_id`
        $this->createIndex(
            'idx-user-family_id',
            'user',
            'family_id'
        );

        // add foreign key for table `family`
        $this->addForeignKey(
            'fk-user-family_id',
            'user',
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
            'fk-user-family_id',
            'user'
        );

        // drops index for column `family_id`
        $this->dropIndex(
            'idx-user-family_id',
            'user'
        );

        $this->dropColumn('user', 'family_id');
    }
}
