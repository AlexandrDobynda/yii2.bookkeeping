<?php

use yii\db\Migration;

/**
 * Handles adding family_id to table `category`.
 * Has foreign keys to the tables:
 *
 * - `family`
 */
class m181104_213219_add_family_id_column_to_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('category', 'family_id', $this->integer());

        // creates index for column `family_id`
        $this->createIndex(
            'idx-category-family_id',
            'category',
            'family_id'
        );

        // add foreign key for table `family`
        $this->addForeignKey(
            'fk-category-family_id',
            'category',
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
            'fk-category-family_id',
            'category'
        );

        // drops index for column `family_id`
        $this->dropIndex(
            'idx-category-family_id',
            'category'
        );

        $this->dropColumn('category', 'family_id');
    }
}
