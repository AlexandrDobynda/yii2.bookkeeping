<?php
use yii\db\Migration;
/**
 * Handles the creation of table `invites`.
 * Has foreign keys to the tables:
 *
 * - `family`
 */
class m181028_145056_create_invites_table extends Migration
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
        $this->createTable('invites', [
            'id' => $this->primaryKey(),
            'family_id' => $this->integer(),
            'secret_string' => $this->text(),
            'created_at' => $this->text(),
        ]);
        // creates index for column `family_id`
        $this->createIndex(
            'idx-invites-family_id',
            'invites',
            'family_id'
        );
        // add foreign key for table `family`
        $this->addForeignKey(
            'fk-invites-family_id',
            'invites',
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
            'fk-invites-family_id',
            'invites'
        );
        // drops index for column `family_id`
        $this->dropIndex(
            'idx-invites-family_id',
            'invites'
        );
        $this->dropTable('invites');
    }
}