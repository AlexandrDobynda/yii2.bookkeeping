<?php

use yii\db\Migration;

/**
 * Class m181203_144057_data_for_transactions_table
 */
class m181203_144057_data_for_transactions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $transactionsArray = \common\models\Transactions::prepareTransactionsArray();

        $this->batchInsert(
            '{{%transactions}}',
            ['user_id', 'amount', 'account_id', 'category_id', 'profile_id', 'created_at', 'date', 'family_id'],
            $transactionsArray
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181203_144057_data_for_transactions_table cannot be reverted.\n";

        return false;
    }
}
