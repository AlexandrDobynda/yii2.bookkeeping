<?php

namespace frontend\components\behaviors;

use Yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;

class InviteBehavior extends Behavior
{
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_INSERT => 'inviteCreate',
        ];
    }

    public function inviteCreate($event)
    {
        $userFamilyId = Yii::$app->user->identity->family_id;
        $secretString = Yii::$app->security->generateRandomString();
        $time = time();

        $this->owner->family_id = $userFamilyId;
        $this->owner->secret_string = $secretString;
        $this->owner->created_at = $time;
    }
}