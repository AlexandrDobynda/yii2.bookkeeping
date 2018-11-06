<?php

namespace frontend\components\behaviors;


use common\models\Accounts;
use yii\base\Behavior;
use yii\db\ActiveRecord;

class TransactionsCalculateBehavior extends Behavior
{
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_INSERT => 'calculate',
        ];
    }

    public function calculate($event)
    {
        $amount = $event->sender->amount;
        $accountId = $event->sender->account_id;

        $account = Accounts::findOne($accountId);
        $accountBalance = $account->amount;
        $account->amount = $accountBalance + $amount;
        $account->save();
    }

}