<?php


use dektrium\user\controllers\SecurityController;
use yii\base\Event;


//Event::on(SecurityController::class, SecurityController::EVENT_AFTER_AUTHENTICATE, function (AuthEvent $e) {
//Event::on('SecurityController', SecurityController::EVENT_AFTER_AUTHENTICATE, function (AuthEvent $e) {
Event::on('dektrium\user\controllers\SecurityController', SecurityController::EVENT_AFTER_AUTHENTICATE, function (\dektrium\user\events\AuthEvent $e) {
    // if user account was not created we should not continue
    if ($e->account->user === null) {
        return;
    }

    // we are using switch here, because all networks provide different sets of data
    switch ($e->client->getName()) {
        case 'facebook':
            $e->account->user->profile->updateAttributes([
                'name' => $e->client->getUserAttributes()['name'],
            ]);
        case 'vkontakte':
            // some different logic
        case 'github':
        $cart = yii::$app->cart;
        // перенос данных
        $cart->getCart()->fromTmpToCurrentCart();
//        $session = yii::$app->session;
//            yii::error(['some error EVENT',yii::$app->user->id,$session->get('tmp_user_id')]);

    }

    // after saving all user attributes will be stored under account model
    // Yii::$app->identity->user->accounts['facebook']->decodedData
});
