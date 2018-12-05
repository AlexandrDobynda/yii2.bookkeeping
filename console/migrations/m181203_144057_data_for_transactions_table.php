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
        $userIdList = array_reverse(\common\models\User::getIdList());
        $accountIdList = array_reverse(\common\models\Accounts::getIdList());
        $categoryIdList = array_reverse(\common\models\Category::getIdList());
        $profileIdList = array_reverse(\common\models\Profile::getIdList());

        $this->batchInsert('{{%transactions}}', ['user_id', 'amount', 'account_id', 'category_id', 'profile_id', 'created_at', 'date', 'family_id' ], [
                [$userIdList[6], rand(-5000, -1)  , $accountIdList[6], $categoryIdList[rand(6,8)], $profileIdList[6], time(), time() + rand(-604800, 604800), 1],
                [$userIdList[6], rand(-5000, -1)  , $accountIdList[6], $categoryIdList[rand(6,8)], $profileIdList[6], time(), time() + rand(-604800, 604800), 1],
                [$userIdList[6], rand(-5000, -1)  , $accountIdList[6], $categoryIdList[rand(6,8)], $profileIdList[6], time(), time() + rand(-604800, 604800), 1],
                [$userIdList[6], rand(-5000, -1)  , $accountIdList[6], $categoryIdList[rand(6,8)], $profileIdList[6], time(), time() + rand(-604800, 604800), 1],
                [$userIdList[6], rand(-5000, -1)  , $accountIdList[6], $categoryIdList[rand(6,8)], $profileIdList[6], time(), time() + rand(-604800, 604800), 1],
                [$userIdList[6], rand(5000, 10000), $accountIdList[6], $categoryIdList[5],         $profileIdList[6], time(), time() + rand(-604800, 604800), 1],

                [$userIdList[5], rand(-5000, -1)  , $accountIdList[5], $categoryIdList[rand(6,8)], $profileIdList[5], time(), time() + rand(-604800, 604800), 1],
                [$userIdList[5], rand(-5000, -1)  , $accountIdList[5], $categoryIdList[rand(6,8)], $profileIdList[5], time(), time() + rand(-604800, 604800), 1],
                [$userIdList[5], rand(-5000, -1)  , $accountIdList[5], $categoryIdList[rand(6,8)], $profileIdList[5], time(), time() + rand(-604800, 604800), 1],
                [$userIdList[5], rand(-5000, -1)  , $accountIdList[5], $categoryIdList[rand(6,8)], $profileIdList[5], time(), time() + rand(-604800, 604800), 1],
                [$userIdList[5], rand(-5000, -1)  , $accountIdList[5], $categoryIdList[rand(6,8)], $profileIdList[5], time(), time() + rand(-604800, 604800), 1],
                [$userIdList[5], rand(5000, 10000), $accountIdList[5], $categoryIdList[5],         $profileIdList[5], time(), time() + rand(-604800, 604800), 1],

                [$userIdList[4], rand(-5000, -1)  , $accountIdList[4], $categoryIdList[rand(6,8)], $profileIdList[4], time(), time() + rand(-604800, 604800), 1],
                [$userIdList[4], rand(-5000, -1)  , $accountIdList[4], $categoryIdList[rand(6,8)], $profileIdList[4], time(), time() + rand(-604800, 604800), 1],
                [$userIdList[4], rand(-5000, -1)  , $accountIdList[4], $categoryIdList[rand(6,8)], $profileIdList[4], time(), time() + rand(-604800, 604800), 1],
                [$userIdList[4], rand(-5000, -1)  , $accountIdList[4], $categoryIdList[rand(6,8)], $profileIdList[4], time(), time() + rand(-604800, 604800), 1],
                [$userIdList[4], rand(5000, 10000), $accountIdList[4], $categoryIdList[rand(6,8)], $profileIdList[4], time(), time() + rand(-604800, 604800), 1],
                [$userIdList[4], rand(-5000, -1)  , $accountIdList[4], $categoryIdList[5],         $profileIdList[4], time(), time() + rand(-604800, 604800), 1],

                [$userIdList[3], rand(-5000, -1)  , $accountIdList[3], $categoryIdList[rand(6,8)], $profileIdList[3], time(), time() + rand(-604800, 604800), 1],
                [$userIdList[3], rand(-5000, -1)  , $accountIdList[3], $categoryIdList[rand(6,8)], $profileIdList[3], time(), time() + rand(-604800, 604800), 1],
                [$userIdList[3], rand(-5000, -1)  , $accountIdList[3], $categoryIdList[rand(6,8)], $profileIdList[3], time(), time() + rand(-604800, 604800), 1],
                [$userIdList[3], rand(-5000, -1)  , $accountIdList[3], $categoryIdList[rand(6,8)], $profileIdList[3], time(), time() + rand(-604800, 604800), 1],
                [$userIdList[3], rand(5000, 10000), $accountIdList[3], $categoryIdList[5],         $profileIdList[3], time(), time() + rand(-604800, 604800), 1],

                [$userIdList[2], rand(-5000, -1)  , $accountIdList[2], $categoryIdList[rand(2,4)], $profileIdList[2], time(), time() + rand(-604800, 604800), 2],
                [$userIdList[2], rand(-5000, -1)  , $accountIdList[2], $categoryIdList[rand(2,4)], $profileIdList[2], time(), time() + rand(-604800, 604800), 2],
                [$userIdList[2], rand(-5000, -1)  , $accountIdList[2], $categoryIdList[rand(2,4)], $profileIdList[2], time(), time() + rand(-604800, 604800), 2],
                [$userIdList[2], rand(5000, 10000), $accountIdList[2], $categoryIdList[1],         $profileIdList[2], time(), time() + rand(-604800, 604800), 1],

                [$userIdList[1], rand(-5000, -1)  , $accountIdList[1], $categoryIdList[rand(2,4)], $profileIdList[1], time(), time() + rand(-604800, 604800), 2],
                [$userIdList[1], rand(-5000, -1)  , $accountIdList[1], $categoryIdList[rand(2,4)], $profileIdList[1], time(), time() + rand(-604800, 604800), 2],
                [$userIdList[1], rand(-5000, -1)  , $accountIdList[1], $categoryIdList[rand(2,4)], $profileIdList[1], time(), time() + rand(-604800, 604800), 2],
                [$userIdList[1], rand(-5000, -1)  , $accountIdList[1], $categoryIdList[rand(2,4)], $profileIdList[1], time(), time() + rand(-604800, 604800), 2],
                [$userIdList[1], rand(-5000, -1)  , $accountIdList[1], $categoryIdList[rand(2,4)], $profileIdList[1], time(), time() + rand(-604800, 604800), 2],
                [$userIdList[1], rand(-5000, -1)  , $accountIdList[1], $categoryIdList[rand(2,4)], $profileIdList[1], time(), time() + rand(-604800, 604800), 2],
                [$userIdList[1], rand(5000, 10000), $accountIdList[1], $categoryIdList[1],         $profileIdList[1], time(), time() + rand(-604800, 604800), 2],

                [$userIdList[0], rand(-5000, -1)  , $accountIdList[0], $categoryIdList[rand(2,4)], $profileIdList[0], time(), time() + rand(-604800, 604800), 2],
                [$userIdList[0], rand(-5000, -1)  , $accountIdList[0], $categoryIdList[rand(2,4)], $profileIdList[0], time(), time() + rand(-604800, 604800), 2],
                [$userIdList[0], rand(-5000, -1)  , $accountIdList[0], $categoryIdList[rand(2,4)], $profileIdList[0], time(), time() + rand(-604800, 604800), 2],
                [$userIdList[0], rand(-5000, -1)  , $accountIdList[0], $categoryIdList[rand(2,4)], $profileIdList[0], time(), time() + rand(-604800, 604800), 2],
                [$userIdList[0], rand(-5000, -1)  , $accountIdList[0], $categoryIdList[rand(2,4)], $profileIdList[0], time(), time() + rand(-604800, 604800), 2],
                [$userIdList[0], rand(-5000, -1)  , $accountIdList[0], $categoryIdList[rand(2,4)], $profileIdList[0], time(), time() + rand(-604800, 604800), 2],
                [$userIdList[0], rand(-5000, -1)  , $accountIdList[0], $categoryIdList[rand(2,4)], $profileIdList[0], time(), time() + rand(-604800, 604800), 2],
                [$userIdList[0], rand(5000, 10000), $accountIdList[0], $categoryIdList[1],         $profileIdList[0], time(), time() + rand(-604800, 604800), 2],
            ]
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
