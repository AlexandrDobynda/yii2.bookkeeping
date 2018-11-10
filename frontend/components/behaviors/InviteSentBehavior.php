<?php

namespace frontend\components\behaviors;

use Yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;

class InviteSentBehavior extends Behavior
{
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_INSERT => 'inviteSent',
        ];
    }

    public function inviteSent($event)
    {
        $link = 'http://bookkeeping/signup?string='. $event->sender->secret_string;


        Yii::$app->mailer->compose()
            ->setFrom('from@domain.com')
            ->setTo($event->sender->email)
            ->setSubject('Invite in family bookkeeping')
            ->setTextBody($link)
//            ->setHtmlBody('<b>текст сообщения в формате HTML</b>')
            ->send();
    }
}

