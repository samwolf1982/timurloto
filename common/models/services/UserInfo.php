<?php

namespace common\models\services;

use dektrium\user\models\User;
use yii\helpers\Url;

class UserInfo
{
    private $user_id;
    private $userLevel;
    private $isPro;
    private $user_name;
    private $user_image;

    private  $user;

  public function __construct($user_id)
  {
      $this->user_id=$user_id;
      $this->user=$this->loadUser($user_id);  // грузим пользователя для будущей работы с ним

      $this->userLevel=$this->setUserLevel();
      $this->isPro=$this->setPro();
      $this->user_name=$this->setUserName();
      $this->user_image=$this->setUserImage();
  }


  function loadUser($id){
      return User::find()->where(['id'=>$id])->cache(1*24*60*60)->one();
  }
    /**
     * @return mixed
     */
    public function getUserLevel()
    {
        if($this->userLevel){
             return sprintf('Уровень %s',$this->userLevel);
        } else{
            return 'Новичок';
        }
    }
    private function setUserName(){
        /** @var  User $this->user */
        if($this->user){
            return $this->user->username;
        }else{
            return 'Не указан';
        }
    }
    private function setUserImage(){
        return  Url::to('https://avatars0.githubusercontent.com/u/8706421?s=40&v=40');
    }
    private function setUserLevel(){
        return rand(0,25);
    }
    private function setPro(){
        return rand(0,1);
    }

    /**
     * @return int
     */
    public function getisPro()
    {
        return $this->isPro;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->user_name;
    }

    /**
     * @return mixed
     */
    public function getUserImage()
    {
        return $this->user_image;
    }

}
