<?php

use yii\db\Migration;

/**
 * Handles adding email to table `invites`.
 */
class m181110_072824_add_email_column_to_invites_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('invites', 'email', $this->string(255));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('invites', 'email');
    }
}
