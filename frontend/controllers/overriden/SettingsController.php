<?php

// переопределение контролера настроек. должнв быть 2 профиль и настройки.
namespace frontend\controllers\overriden;

use common\models\DTO\usersetting\UserDataSetting;
use dektrium\user\controllers\SettingsController as BaseSettingsControllerDectrim;
use dektrium\user\models\SettingsForm;
use Yii;
use yii\helpers\Url;
use yii\web\UploadedFile;

class SettingsController extends BaseSettingsControllerDectrim
{


    public function actionProfile()
    {
        // Profile Model
        $modelProfile = $this->finder->findProfileById(\Yii::$app->user->identity->getId());
        if ($modelProfile == null) {
            $modelProfile = \Yii::createObject(Profile::className());
            $modelProfile->link('user', \Yii::$app->user->identity);
        }
        $eventProfile = $this->getProfileEvent($modelProfile);
        $this->performAjaxValidation($modelProfile);

        // Account Model
//        $modelAccount = Yii::createObject(SettingsForm::className());
//        $eventAccount = $this->getFormEvent($modelAccount);
//        $this->performAjaxValidation($modelAccount);


        // User LIke adminPanel
         $modelUser= $this->findModelUser(Yii::$app->user->identity->getId());

        $this->trigger(self::EVENT_BEFORE_PROFILE_UPDATE, $eventProfile);
       // $this->trigger(self::EVENT_BEFORE_ACCOUNT_UPDATE, $eventAccount);




        if ($modelProfile->load(\Yii::$app->request->post()) && $modelUser->load(Yii::$app->request->post())){
//            $modelAccount->save();
            // если  попытки поменят пароль все поплану иначе

            //обновка как в админке
            // todo +создать метод что пароль еще не существует cлучай когда приходят из соцсетей.
            //if(empty($modelUser->new_password)&& empty($modelUser->current_password)){
//                       $this->updateUserFields(Yii::$app->user->identity->getId(),new UserDataSetting('asdf',asdfg))
            //}else{



                if ($modelProfile->validate() && $modelUser->validate() ) {
                    $modelProfile->save(); $modelUser->save();

                    $modelUser->avatarUser = UploadedFile::getInstance($modelUser, 'avatarUser');
                    if(!empty($modelUser->avatarUser)){
                      $modelUser->saveAvatar();
                    }


                    \Yii::$app->getSession()->setFlash('success', \Yii::t('user', 'Your profile has been updated'));
                    $this->trigger(self::EVENT_AFTER_PROFILE_UPDATE, $eventProfile);
         //           $this->trigger(self::EVENT_AFTER_ACCOUNT_UPDATE, $eventAccount);
                    return $this->refresh();
                }else{
                    // \Yii::$app->getSession()->setFlash('error',  var_export( [ $modelProfile->errors,$modelAccount->errors ]));
                }
          //  }



        }

//        todo  обэденить проверки
//        if ($modelProfile->load(\Yii::$app->request->post()) && $modelProfile->save()) {
//            \Yii::$app->getSession()->setFlash('success', \Yii::t('user', 'Your profile has been updated'));
//            $this->trigger(self::EVENT_AFTER_PROFILE_UPDATE, $eventProfile);
//
//            return $this->refresh();
//        }
//        if ($modelAccount->load(Yii::$app->request->post()) && $modelAccount->save()) {
//            Yii::$app->session->setFlash('success', Yii::t('user', 'Your account details have been updated'));
//            $this->trigger(self::EVENT_AFTER_ACCOUNT_UPDATE, $eventAccount);
//
//            return $this->refresh();
//        }


        return $this->render('profile', [
            'modelProfile' => $modelProfile,
            'modelUser' => $modelUser,
        ]);
    }


    private function findModelUser($id)
    {
        $user = $this->finder->findUserById($id);
        if ($user === null) {
            throw new NotFoundHttpException('The requested page does not exist');
        }
        return $user;
    }


    private function updateUserFields233($id,UserDataSetting $userData)
    {
        $user = $this->findModel($id);
        $user->scenario = 'update';
        $event = $this->getUserEvent($user);
        $this->performAjaxValidation($user);

        $user->email=$userData->getEmail();
        $user->username=$userData->getUsername();

        if ($user->validate() && $user->save()) {
            return true;
        }else{
            yii::error($user->errors);
        }

         return false;
    }




    public function actionAccountDELETE()
    {
        /** @var SettingsForm $model */
        $model = Yii::createObject(SettingsForm::className());
        $event = $this->getFormEvent($model);

        $this->performAjaxValidation($model);

        $this->trigger(self::EVENT_BEFORE_ACCOUNT_UPDATE, $event);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', Yii::t('user', 'Your account details have been updated'));
            $this->trigger(self::EVENT_AFTER_ACCOUNT_UPDATE, $event);
            return $this->refresh();
        }

        return $this->render('account', [
            'model' => $model,
        ]);
    }

}
