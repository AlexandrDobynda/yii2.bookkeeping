<?php

use yii\db\Migration;

/**
 * Handles adding family_id to table `profile`.
 * Has foreign keys to the tables:
 *
 * - `family`
 */
class m181114_085732_add_family_id_column_to_profile_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('profile', 'family_id', $this->integer());

        // creates index for column `family_id`
        $this->createIndex(
            'idx-profile-family_id',
            'profile',
            'family_id'
        );

        // add foreign key for table `family`
        $this->addForeignKey(
            'fk-profile-family_id',
            'profile',
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
            'fk-profile-family_id',
            'profile'
        );

        // drops index for column `family_id`
        $this->dropIndex(
            'idx-profile-family_id',
            'profile'
        );

        $this->dropColumn('profile', 'family_id');
    }
}
