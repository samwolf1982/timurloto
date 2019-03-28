<?php

// переопределение контролера настроек. должнв быть 2 профиль и настройки.
namespace frontend\controllers\overriden;

use common\models\DTO\usersetting\UserDataSetting;
use common\models\helpers\ConstantsHelper;
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
         Yii::error(get_class($modelUser));
         Yii::error($modelUser->social_vk);

        $this->trigger(self::EVENT_BEFORE_PROFILE_UPDATE, $eventProfile);

        if ($modelProfile->load(\Yii::$app->request->post()) && $modelUser->load(Yii::$app->request->post())){
//            $modelAccount->save();

            // чистим пользователя в кеше
            Yii::$app->cache->delete(ConstantsHelper::USER_CACHE_FULL.Yii::$app->user->identity->getId());

            // если  попытки поменят пароль все поплану иначе

            //обновка как в админке
            // todo +создать метод что пароль еще не существует cлучай когда приходят из соцсетей.
            //if(empty($modelUser->new_password)&& empty($modelUser->current_password)){
//                       $this->updateUserFields(Yii::$app->user->identity->getId(),new UserDataSetting('asdf',asdfg))
            //}else{

//var_dump($modelUser);
//var_dump($modelUser->aboutInfo);
//die();
                if ($modelProfile->validate() && $modelUser->validate() ) {
                    $modelProfile->save(); $modelUser->save();
                    $modelUser->saveInfo();
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

        $modelUser->aboutInfo='';
        if(!empty($modelUser->userinfo->about_me))$modelUser->aboutInfo=$modelUser->userinfo->about_me;
        $modelUser->social_vk='';
        if(!empty($modelUser->userinfo->social_vk))$modelUser->social_vk=$modelUser->userinfo->social_vk;
        $modelUser->social_fb='';
        if(!empty($modelUser->userinfo->social_fb))$modelUser->social_fb=$modelUser->userinfo->social_fb;
        $modelUser->social_in='';
        if(!empty($modelUser->userinfo->social_in))$modelUser->social_in=$modelUser->userinfo->social_in;
        $modelUser->social_tv='';
        if(!empty($modelUser->userinfo->social_tv))$modelUser->social_tv=$modelUser->userinfo->social_tv;
        $modelUser->social_yt='';
        if(!empty($modelUser->userinfo->social_yt))$modelUser->social_yt=$modelUser->userinfo->social_yt;

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


}
