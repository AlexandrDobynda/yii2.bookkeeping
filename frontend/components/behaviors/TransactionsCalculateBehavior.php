<?php

namespace frontend\components\behaviors;


use common\models\Accounts;
use common\models\Transactions;
use yii\base\Behavior;
use yii\db\ActiveRecord;

class TransactionsCalculateBehavior extends Behavior
{
    public $amount;
    public $account;
    public $accountBalance;


    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_INSERT => 'calculate',
            ActiveRecord::EVENT_BEFORE_UPDATE => 'calcDiff',
            ActiveRecord::EVENT_BEFORE_DELETE => 'return',
        ];
    }

    public function getValues($event)
    {
        $this->amount = $event->sender->amount;
        $this->account = Accounts::findOne($event->sender->account_id);
        $this->accountBalance = $this->account->amount;
    }

    public function calculate($event)
    {
        $this->getValues($event);

        $calculate = $this->accountBalance + $this->amount;
        $this->account->amount = $calculate;
        $this->account->save();
    }

    public function calcDiff($event)
    {
        $this->getValues($event);
        $prevAmount = Transactions::findOne($event->sender->id)->amount;

        $calculate = $this->accountBalance + ($this->amount - $prevAmount);
        $this->account->amount = $calculate;
        $this->account->save();
    }

    public function return($event)
    {
        $this->getValues($event);

        $calculate = $this->accountBalance - $this->amount;
        $this->account->amount = $calculate;
        $this->account->save();
    }


}