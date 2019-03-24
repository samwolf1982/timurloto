<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 24.03.2019
 * Time: 8:27
 */
class Omailer extends \dektrium\user\Mailer
{
    public function sendConfirmationMessage(User $user, Token $token)
    {
        return $this->sendMessage('admin@example.com', // your email goes here
            \Yii::t('user', 'Confirm your account on {0}', \Yii::$app->name),
            'confirmation',
            ['user' => $user, 'token' => $token]
        );
    }
}