<?php

use yii\db\Migration;

/**
 * Handles the creation of table `category`.
 * Has foreign keys to the tables:
 *
 * - `user`
 * - `category`
 */
class m181028_135554_create_category_table extends Migration
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

        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'created_by' => $this->integer()->notNull(),
            'name' => $this->text(),
            'parent_id' => $this->integer(),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            'idx-category-created_by',
            'category',
            'created_by'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-category-created_by',
            'category',
            'created_by',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `parent_id`
        $this->createIndex(
            'idx-category-parent_id',
            'category',
            'parent_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-category-parent_id',
            'category',
            'parent_id',
            'category',
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
            'fk-category-created_by',
            'category'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            'idx-category-created_by',
            'category'
        );

        // drops foreign key for table `category`
        $this->dropForeignKey(
            'fk-category-parent_id',
            'category'
        );

        // drops index for column `parent_id`
        $this->dropIndex(
            'idx-category-parent_id',
            'category'
        );

        $this->dropTable('category');
    }
}
