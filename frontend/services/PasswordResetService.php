<?php

namespace services;

use Yii;
use common\models\User;
use frontend\models\ResetPasswordForm;
use frontend\models\PasswordResetRequestForm;

class PasswordResetService
{
    /**
     * @param PasswordResetRequestForm $form
     */
    public function requset(PasswordResetRequestForm $form): void
    {
        /* @var $user User */
        $user = User::findOne([
            'status' => User::STATUS_ACTIVE,
            'email' => $form->email,
        ]);

        if (!$user) {
            throw new \RuntimeException('User not found.');
        }

        $user->requestPasswordReset();

        if (!$user->save()) {
            throw new \RuntimeException('Saving error');
        }

        $sent =  Yii::$app
            ->mailer
            ->compose(
                ['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($form->email)
            ->setSubject('Password reset for ' . Yii::$app->name)
            ->send();

        if (!$sent) {
            throw new \RuntimeException('Sending error.');
        }
    }

    public function validateToken($token) :void
    {
        if (empty($token) || !is_string($token)){
            throw new \DomainException('Password reset token cannot be blank.');
        }
        if (!User::findByPasswordResetToken($token)) {
            throw new \DomainException('Wrong password reset token.');
        }
    }

    public function reset(string $token, ResetPasswordForm $form): void
    {
        $user = User::findByPasswordResetToken($token);

        if (!$user) {
            throw new \DomainException('User is not found');
        }

        $user->resetPassword($form->password);

        if (!$user->save()) {
            throw new \RuntimeException('Saving error');
        }
    }




}