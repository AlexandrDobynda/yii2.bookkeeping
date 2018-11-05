<?php

use yii\db\Migration;

/**
 * Handles adding profile_id to table `category`.
 * Has foreign keys to the tables:
 *
 * - `profile`
 */
class m181105_154245_add_profile_id_column_to_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('category', 'profile_id', $this->integer());

        // creates index for column `profile_id`
        $this->createIndex(
            'idx-category-profile_id',
            'category',
            'profile_id'
        );

        // add foreign key for table `profile`
        $this->addForeignKey(
            'fk-category-profile_id',
            'category',
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
        // drops foreign key for table `profile`
        $this->dropForeignKey(
            'fk-category-profile_id',
            'category'
        );

        // drops index for column `profile_id`
        $this->dropIndex(
            'idx-category-profile_id',
            'category'
        );

        $this->dropColumn('category', 'profile_id');
    }
}
