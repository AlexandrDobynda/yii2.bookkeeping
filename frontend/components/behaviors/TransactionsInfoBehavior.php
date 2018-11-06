<?php

namespace frontend\components\behaviors;

use Yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use common\models\Profile;

class TransactionsInfoBehavior extends Behavior
{
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_INSERT => 'addInfo',
        ];
    }

    public function addInfo($event)
    {
        $userId = Yii::$app->user->identity->id;
        $userFamilyId = Yii::$app->user->identity->family_id;
        $profileId = Profile::find()
            ->where(['user_id' => $userId])
            ->one();

        $this->owner->user_id = $userId;
        $this->owner->family_id = $userFamilyId;
        $this->owner->profile_id = $profileId->id;
        $this->owner->created_at = time();
    }
}