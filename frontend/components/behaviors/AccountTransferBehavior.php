<?php


namespace frontend\components\behaviors;

use Yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use common\models\Accounts;
use common\models\CurrencyRate;

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

        $currencyList = CurrencyRate::getSavedShort();
        $operationAmount = $event->sender->amount;
        $from = Accounts::findOne($event->sender->from_id);
        $to = Accounts::findOne($event->sender->to_id);

        $fromExchangeRates = $currencyList[$from->currency];
        $toExchangeRates = $currencyList[$to->currency];

        $from->amount = $from->amount - $operationAmount;
        $from->save();

        $to->amount = $to->amount + $operationAmount * $fromExchangeRates / $toExchangeRates;
        $to->save();
    }
}