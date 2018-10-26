<?php

//удалить пользователя + удалить кошелек
use dektrium\user\controllers\AdminController;
use komer45\balance\models\Score;
use yii\base\Event;

//Event::on('dektrium\user\controllers\SecurityController', SecurityController::EVENT_AFTER_AUTHENTICATE, function (\dektrium\user\events\AuthEvent $e) {
Event::on('dektrium\user\controllers\AdminController', AdminController::EVENT_AFTER_DELETE, function (\dektrium\user\events\UserEvent $e) {

//    yii::error(['zzz',$e->client->getUserAttributes()]);
    if ($e->user === null) {
        return;
    }
    $user=$e->user;
    $score = Score::find()->where(['user_id' =>$user->id])->one();
    if($score){
        $score->delete();
    }

//    // we are using switch here, because all networks provide different sets of data
//    switch ($e->client->getName()) {
//        case 'facebook':
//
//            $e->account->user->profile->updateAttributes([
//                'name' => $e->client->getUserAttributes()['name'],
//            ]);
//        case 'vkontakte':
//            // some different logic
//        case 'github':
//            $cart = yii::$app->cart;
//            // перенос данных
//            $cart->getCart()->fromTmpToCurrentCart();
////        $session = yii::$app->session;
////            yii::error(['some error EVENT',yii::$app->user->id,$session->get('tmp_user_id')]);
//
//    }
//    // after saving all user attributes will be stored under account model
//    // Yii::$app->identity->user->accounts['facebook']->decodedData
});

