<?php


namespace frontend\components\behaviors;

use Yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use common\models\Accounts;

class AccountTransferBehavior extends Behavior
{
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_INSERT => 'transfer',
        ];
    }

    public function transfer($event)
    {
        $userId = Yii::$app->user->identity->id;
        $this->owner->user_id = $userId;

        $currencyList = Yii::$app->CbRF->short()->all();
        $operationAmount = $event->sender->amount;
        $from = Accounts::findOne($event->sender->from_id);
        $to = Accounts::findOne($event->sender->to_id);

        $fromExchangeRates = isset($currencyList[$from->currency]) ? $currencyList[$from->currency] : 1;
        $toExchangeRates = isset($currencyList[$to->currency]) ? $currencyList[$to->currency] : 1;

        $from->amount = $from->amount - $operationAmount;
        $from->save();

        $to->amount = $to->amount + $operationAmount * $fromExchangeRates / $toExchangeRates;
        $to->save();
    }
}