<?php

namespace frontend\services;

use common\models\User;
use frontend\models\SignupForm;

/**
 * Class SignupService
 * @package frontend\services
 */
class SignupService
{
    /**
     * @param SignupForm $form
     * @return User
     */
    public function signup(SignupForm $form): User
    {
        if (!$form->validate()) {
            return null;
        }

        $user = User::create($form->username, $form->email, $form->password);

        if (!$user->save()){
            throw new \RuntimeException('Saving Error.');
        }
        return $user;
    }

}