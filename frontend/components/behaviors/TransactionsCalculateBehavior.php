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
        $account = Accounts::findOne($event->sender->account_id);
        $accountBalance = $account->amount;
        
        $calculate = $accountBalance + $amount;
        $account->amount = $calculate;
        $account->save();
    }

}