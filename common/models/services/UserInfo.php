<?php

namespace common\models\services;

use common\models\helpers\ConstantsHelper;
use dektrium\user\models\User;
use komer45\balance\models\Score;
use Yii;
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
        $key='ulevel_'.$this->user_id;
        $data = Yii::$app->cache->get($key);
        if ($data === false) {
            $balance = Score::find()->where(['user_id' => $this->user_id])->one()->balance;
            $data=  $this-> calculateLevel($balance);
            $time_cache=1;
            if(YII_ENV=='prod') $time_cache=5*60;
            if(YII_ENV=='prod') $time_cache=5;
            Yii::$app->cache->set($key, $data,($time_cache));
        }


        return $data;


//        $balance = Score::find()->where(['user_id' => $this->user_id])->one()->balance;
//        return $this-> calculateLevel($balance);

    }

    private function calculateLevel($balance)
    {
//        – 1 от -100% до 0%
//    – 2 от 0,001% до 2,5%
//    – 3 от 2,501% до 7,5%
//    – 4 от 7,501% до 11,5%
//    –  5 от 11,501% до 25%
//    – 6 от 25,001% до 40%
//    – 7 от 40,001% до 60%
//    – 8 от 60,001% до 100%
//    – 9 от 100,001% до 150%
//    – 10 от 150,001% до 220%
//    – 11 от 220,001% до 300%
//    – 12 от 300,001% до 400%
//    – 13 от 400,001% до 520%
//    – 14 от 520,001% до 650%
//    – 15 от 650,001% до 800%
//    – 16 от 800,001% до 1000%
//    –  17 от 1000,001% до 1200%
//    – 18 от 1200,001% до 1450%
//    – 19 от 1450,001% до 1700%
//    – 20 от 1700,001% до 2000%
//    21 от 2000,001% до бесконечности
        $lv=0;

        if(!empty($balance) and  $balance>0){
          $curentPecent=$balance*100/ ConstantsHelper::DEFAULT_USER_CALCULATE_BALANCE_FOR_LEVEL;
          $curentPecent-=100;
            switch ($curentPecent) {
                case ($curentPecent<=0 ):
                    $lv=1;
                    break;
                case ($curentPecent<2.5 ):
                    $lv=2;
                    break;
                case ($curentPecent<7.5 ):
                    $lv=3;
                    break;
                case ($curentPecent<11.5 ):
                    $lv=4;
                    break;
                case ($curentPecent<25 ):
                    $lv=5;
                    break;
                case ($curentPecent<40 ):
                    $lv=6;
                    break;
                case ($curentPecent<60 ):
                    $lv=7;
                    break;
                case ($curentPecent<100 ):
                    $lv=8;
                    break;
                case ($curentPecent<150 ):
                    $lv=9;
                    break;
                case ($curentPecent<220 ):
                    $lv=10;
                    break;
                case ($curentPecent<300 ):
                    $lv=11;
                    break;
                case ($curentPecent<400 ):
                    $lv=12;
                    break;
                case ($curentPecent<520 ):
                    $lv=13;
                    break;
                case ($curentPecent<650 ):
                    $lv=14;
                    break;
                case ($curentPecent<800 ):
                    $lv=15;
                    break;
                case ($curentPecent<1000 ):
                    $lv=16;
                    break;
                case ($curentPecent<1200 ):
                    $lv=17;
                    break;
                case ($curentPecent<1450 ):
                    $lv=18;
                    break;
                case ($curentPecent<1700 ):
                    $lv=19;
                    break;
                case ($curentPecent<2000 ):
                    $lv=20;
                    break;
                case ($curentPecent<999999999999 ):
                    $lv=21;
                    break;
            }
        }

        return $lv;




    }

    /**
     * после 8 уровнв ПРО
     * @return int
     */
    private function setPro(){
        if($this->userLevel >8 ) return 1;
        return 0;

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
