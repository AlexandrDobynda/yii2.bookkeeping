<?php

namespace frontend\components\behaviors;

use common\models\Profile;
use yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;

class CategoryBehavior extends Behavior
{
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_INSERT => 'addInfo'
        ];
    }

    public function addInfo($event)
    {
        $userId = Yii::$app->user->identity->id;
        $userFamilyId = Yii::$app->user->identity->family_id;
        $profileId = Profile::find()
            ->where(['user_id' => $userId])
            ->one();

        $this->owner->created_by = $userId;
        $this->owner->family_id = $userFamilyId;
        $this->owner->profile_id = $profileId->id;
    }
}