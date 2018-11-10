<?php

namespace frontend\components\behaviors;

use common\models\Family;
use common\models\Profile;
use common\models\User;
use yii\base\Behavior;
use yii\base\Event;
use yii\db\ActiveRecord;

class UserCreateBehavior extends Behavior
{
    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_INSERT => 'addFamily',
        ];
    }

    public function addFamily($event)
    {
        $profile = new Profile();
        $profile->user_id = $event->sender->id;
        $profile->first_name = $event->sender->username;
        $profile->save();

        if (!$event->sender->family_id){

            $family = new Family();
            $family->owner_id = $event->sender->id;
            $family->save();

            $user = User::findOne($event->sender->id);
            $user->family_id = $family->id;
            $user->save();
        }
    }
}
