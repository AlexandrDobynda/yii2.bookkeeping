<?php

namespace frontend\components\behaviors;

use yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;

class AccountBehavior extends Behavior
{
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_INSERT => 'addIds',
        ];
    }

    public function addIds ($event)
    {
        $userId = Yii::$app->user->identity->id;
        $userFamilyId = Yii::$app->user->identity->family_id;

        $this->owner->user_id = $userId;
        $this->owner->family_id = $userFamilyId;

        if (!$event->sender->currency) {
            $this->owner->currency = 'RUB';
        }

    }
}

