<?php

use common\models\helpers\ConstantsHelper;
use dektrium\user\controllers\RegistrationController;
use dektrium\user\controllers\SecurityController;
use dvizh\cart\Cart;
use dvizh\cart\models\CartElement;
use komer45\balance\models\Score;
use komer45\balance\models\Transaction;
use yii\base\Event;



Event::on('dektrium\user\controllers\SecurityController', SecurityController::EVENT_BEFORE_AUTHENTICATE, function (\dektrium\user\events\AuthEvent $e) {


    if('dektrium\user\clients\Google'==get_class($e->getClient())){// гугл нужно парсить значение из json
       if(empty($e->account->email) && empty($e->account->username)){
           $jsone=json_decode($e->account->data);
           $resparse=  explode('@',$jsone->email);
           $uName=uniqid('name_');
           if(!empty($resparse[0])) $uName=$resparse[0];
           $e->account->email=$jsone->email; //
           $e->account->username=$uName; //
           $e->account->save();


           /** @var User $user */
           $user = \Yii::createObject([
               'class'    => User::className(),
               'scenario' => 'connect',
               'username' => $e->account->username,
               'email'    => $e->account->email,
           ]);

//        if(empty($user->email)) $user->email=$account->email;
//           $event = $this->getConnectEvent($account, $user);
           Yii::createObject(['class' => ConnectEvent::className(), 'account' => $e->account, 'user' => $user]);

//           $this->trigger(self::EVENT_BEFORE_CONNECT, $event);

           if ($user->load(\Yii::$app->request->post()) && $user->create()) {
               $e->account->connect($user);
//               $this->trigger(self::EVENT_AFTER_CONNECT, $event);
               \Yii::$app->user->login($user, $this->module->rememberFor);
               return $this->goBack();
           }


       }
    }
//    $client = $e->getClient(); // $client is one of the Da\User\AuthClient\ clients
//    $e->account->email=$e->account->data->email; //
//    $e->account->username=$e->account->data->username; //
//
//
////    $e->account->save();
////    $e->account->email='ddddd@mmmmm';
//    $e->account->save();
//    $account = $e->account;
//    yii::error('dektrium\user\controllers\SecurityController2222222');
//    yii::error($client);
//    yii::error($account);
//    yii::error($e->account->data);
//    $jsone=json_decode($e->account->data);
//    yii::error($e->account->data->email);
//    yii::error($e->account->data->username);
//    yii::error($jsone->email);
//     $resparse=  explode('@',$jsone->email);
//     $uName=uniqid('name_');
//     if(!empty($resparse[0])) $uName=$resparse[0];
//    $e->account->email=$jsone->email; //
//    $e->account->username=$uName; //
//    $e->account->save();

//    yii::error($jsone->name);

    // we are using switch here, because all networks provide different sets of data
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
    // after saving all user attributes will be stored under account model
    // Yii::$app->identity->user->accounts['facebook']->decodedData
});
//-------------


//Event::on(SecurityController::class, SecurityController::EVENT_AFTER_AUTHENTICATE, function (AuthEvent $e) {
//Event::on('SecurityController', SecurityController::EVENT_AFTER_AUTHENTICATE, function (AuthEvent $e) {
Event::on('dektrium\user\controllers\SecurityController', SecurityController::EVENT_AFTER_AUTHENTICATE, function (\dektrium\user\events\AuthEvent $e) {
//    yii::error(['zzz',$e->client->getUserAttributes()]);
    // if user account was not created we should not continue
    if ($e->account->user === null) {
        return;
    }

    yii::error('dektrium\user\controllers\SecurityController1111111111');

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



// регистрация + создание кошелька
Event::on('dektrium\user\controllers\SecurityController', SecurityController::EVENT_AFTER_AUTHENTICATE, function (\dektrium\user\events\AuthEvent $e) {

    if(0){ // гугл не пускать  он идет через форму
        var_dump([$e->client,$e->account]); die();
        var_dump([$e->account,$e->account->user->id,$e->account->user]);
        $findUser = Score::find()->where(['user_id' => $e->account->user->id])->one();
        if (!$findUser){
            $userBalance = new Score;
            $userBalance->user_id = $e->account->user->id;
            $userBalance->balance = ConstantsHelper::DEFAULT_USER_CREATE_BALANCE;
            if($userBalance->validate()){
                $userBalance->save();
            } else{
                var_dump($userBalance->errors);
                die('Uh-oh, somethings went wrong!');
            }
        }
    }

});
// регистрация + создание кошелька  для гугла или формы
Event::on('dektrium\user\controllers\RegistrationController', RegistrationController::EVENT_AFTER_CONNECT, function (dektrium\user\events\ConnectEvent $e) {
        $findUser = Score::find()->where(['user_id' => $e->user->id])->one();
        if (!$findUser){
            $userBalance = new Score;
            $userBalance->user_id = $e->user->id;
          //  $userBalance->balance = ConstantsHelper::DEFAULT_USER_CREATE_BALANCE;
            $userBalance->balance = 0;
            if($userBalance->validate()){
                $userBalance->save();
                // ставка добавлена  снятие баланса
                $modelTransaction = new Transaction();
//            'balance_id' => $this->integer(11)->notNull(), 'date' => $this->datetime()->null()->defaultValue(null), 'type' => "ENUM('in', 'out') NOT NULL", 'amount' => $this->decimal(12, 2)->notNull(), 'balance' => $this->decimal(12, 2)->notNull(), 'user_id'=> $this->integer(11)->notNull(), 'refill_type' => $this->string(255)->notNull(), 'canceled' => $this->datetime()->null()->defaultValue(null), 'comment' => $this->string(255)->null()->defaultValue(null),
                $param=['type'=>'in','amount'=>ConstantsHelper::DEFAULT_USER_CREATE_BALANCE,'balance_id'=>$userBalance->id,'refill_type'=>'first transaction, add default'];
                $modelTransaction->attributes=$param;
                if($modelTransaction->validate()){
                    $addTransaction = Yii::$app->balance->addTransaction($modelTransaction->balance_id, $modelTransaction->type, $modelTransaction->amount, $modelTransaction->refill_type);
                }else{
                    yii::error($modelTransaction->errors);
                }

            } else{
                var_dump($userBalance->errors);
                die('Uh-oh, somethings went wrong!');
            }
        }


});

// регистрация + создание кошелька  для формы подтверждение с мейла щас
Event::on('dektrium\user\controllers\RegistrationController', RegistrationController::EVENT_AFTER_CONFIRM, function (dektrium\user\events\UserEvent $e) {
    $findUser = Score::find()->where(['user_id' => $e->user->id])->one();
    if (!$findUser){
        $userBalance = new Score;
        $userBalance->user_id = $e->user->id;
        //  $userBalance->balance = ConstantsHelper::DEFAULT_USER_CREATE_BALANCE;
        $userBalance->balance = 0;
        if($userBalance->validate()){
            $userBalance->save();
            // ставка добавлена  снятие баланса
            $modelTransaction = new Transaction();
//            'balance_id' => $this->integer(11)->notNull(), 'date' => $this->datetime()->null()->defaultValue(null), 'type' => "ENUM('in', 'out') NOT NULL", 'amount' => $this->decimal(12, 2)->notNull(), 'balance' => $this->decimal(12, 2)->notNull(), 'user_id'=> $this->integer(11)->notNull(), 'refill_type' => $this->string(255)->notNull(), 'canceled' => $this->datetime()->null()->defaultValue(null), 'comment' => $this->string(255)->null()->defaultValue(null),
            $param=['type'=>'in','amount'=>ConstantsHelper::DEFAULT_USER_CREATE_BALANCE,'balance_id'=>$userBalance->id,'refill_type'=>'first transaction, add default'];
            $modelTransaction->attributes=$param;
            if($modelTransaction->validate()){
                $addTransaction = Yii::$app->balance->addTransaction($modelTransaction->balance_id, $modelTransaction->type, $modelTransaction->amount, $modelTransaction->refill_type);
            }else{
                yii::error($modelTransaction->errors);
            }

        } else{
            var_dump($userBalance->errors);
            die('Uh-oh, somethings went wrong!');
        }
    }


});



// регистрация + создание кошелька  для  формы регистрации
//Event::on('dektrium\user\controllers\RegistrationController', RegistrationController::EVENT_AFTER_REGISTER, function (dektrium\user\events\FormEvent $e) {
//    $findUser = Score::find()->where(['user_id' => $e->user->id])->one();
//    if (!$findUser){
//        $userBalance = new Score;
//        $userBalance->user_id = $e->user->id;
//        //  $userBalance->balance = ConstantsHelper::DEFAULT_USER_CREATE_BALANCE;
//        $userBalance->balance = 0;
//        if($userBalance->validate()){
//            $userBalance->save();
//            // ставка добавлена  снятие баланса
//            $modelTransaction = new Transaction();
////            'balance_id' => $this->integer(11)->notNull(), 'date' => $this->datetime()->null()->defaultValue(null), 'type' => "ENUM('in', 'out') NOT NULL", 'amount' => $this->decimal(12, 2)->notNull(), 'balance' => $this->decimal(12, 2)->notNull(), 'user_id'=> $this->integer(11)->notNull(), 'refill_type' => $this->string(255)->notNull(), 'canceled' => $this->datetime()->null()->defaultValue(null), 'comment' => $this->string(255)->null()->defaultValue(null),
//            $param=['type'=>'in','amount'=>ConstantsHelper::DEFAULT_USER_CREATE_BALANCE,'balance_id'=>$userBalance->id,'refill_type'=>'first transaction, add default'];
//            $modelTransaction->attributes=$param;
//            if($modelTransaction->validate()){
//                $addTransaction = Yii::$app->balance->addTransaction($modelTransaction->balance_id, $modelTransaction->type, $modelTransaction->amount, $modelTransaction->refill_type);
//            }else{
//                yii::error($modelTransaction->errors);
//            }
//
//        } else{
//            var_dump($userBalance->errors);
//            die('Uh-oh, somethings went wrong!');
//        }
//    }
//
//
//});











