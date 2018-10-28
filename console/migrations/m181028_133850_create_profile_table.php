<?php

use yii\db\Migration;

/**
 * Handles the creation of table `profile`.
 * Has foreign keys to the tables:
 *
 * - `user`
 */
class m181028_133850_create_profile_table extends Migration
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

        $this->createTable('profile', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'first_name' => $this->text(),
            'last_name' => $this->text(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-profile-user_id',
            'profile',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-profile-user_id',
            'profile',
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
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-profile-user_id',
            'profile'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-profile-user_id',
            'profile'
        );

        $this->dropTable('profile');
    }
}
