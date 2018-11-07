<?php

namespace frontend\components\behaviors;


use yii\base\Behavior;
use yii\db\ActiveRecord;

class TransactionsTimeBehavior extends Behavior
{


    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_INSERT => 'changeFormat',
            ActiveRecord::EVENT_BEFORE_UPDATE => 'changeFormat',
        ];
    }

    public function changeFormat($event)
    {
        $this->owner->date = strtotime($event->sender->date);
    }
}