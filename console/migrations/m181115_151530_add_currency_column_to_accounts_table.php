<?php

use yii\db\Migration;

/**
 * Handles adding currency to table `accounts`.
 */
class m181115_151530_add_currency_column_to_accounts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('accounts', 'currency', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('accounts', 'currency');
    }
}
