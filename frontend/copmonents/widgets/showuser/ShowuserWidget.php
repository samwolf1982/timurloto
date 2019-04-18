<?php
namespace app\copmonents\widgets\showuser;
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 25.07.2018
 * Time: 20:35
 */

use common\models\services\UserInfo;
use Yii;
use yii\base\Widget;

class ShowuserWidget extends Widget
{
    public $userdata;// array параметров, по ситуации буду добавлять
    public $view;// вюшка для главной index для других other
    // возвращаем результат
    public function run(){

        $username='Anonim';
        $useremail='';
        if(!empty(Yii::$app->user->identity)){
            $username=Yii::$app->user->identity->username;
            $useremail=Yii::$app->user->identity->email;
        }



        $userimage='/images/avatar-placeholder.svg';
        $userimage='https://avatars0.githubusercontent.com/u/8706421?s=40&v=40';
       // $userimage=Yii::$app->user->identity->imageurl;

        if(empty($username)){}
        if(Yii::$app->user->isGuest) {
            $userimage='/images/avatar-placeholder.svg';
        }else{
            $userimage='/'. Yii::$app->user->identity->imageurl;


        }

        return       $this->render($this->view, ['username' => $username,'userimage'=>$userimage,'isGuest'=>Yii::$app->user->isGuest,'useremail'=>$useremail]);
      //  return       $this->render('index', array('username' => $username,'userimage'=>$userimage));
    }
    public function init(){
        parent::init();
    }

    private function getUserImage(){

    }

}