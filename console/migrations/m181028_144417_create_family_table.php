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


        $this->dropTable('family');
    }
}
