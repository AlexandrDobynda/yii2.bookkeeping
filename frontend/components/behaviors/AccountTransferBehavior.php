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

        $amount = $event->sender->amount;
        $from = Accounts::findOne($event->sender->from_id);
        $to = Accounts::findOne($event->sender->to_id);

        $from->amount = $from->amount - $amount;
        $from->save();
        $to->amount = $to->amount + $amount;
        $to->save();
    }
}