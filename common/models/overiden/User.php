<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 27.11.2018
 * Time: 9:53
 */

namespace common\models\overiden;

use common\models\UserAttachmentInfo;
use common\models\UserAvatars;
use yii\imagine\Image;
use yii;
use dektrium\user\models\User as BaseUser;
use yii\helpers\FileHelper;

class User extends BaseUser
{

    public $avatarUser;
    public $aboutInfo;

    public $social_vk;
public $social_fb;
public $social_in;
public $social_tv;
public $social_yt;

    /** @inheritdoc */
    public function rules()
    {

        return [
            // username rules
            'usernameTrim'     => ['username', 'trim'],
            'usernameRequired' => ['username', 'required', 'on' => ['register', 'create', 'connect', 'update']],
            'usernameMatch'    => ['username', 'match', 'pattern' => static::$usernameRegexp],
            'usernameLength'   => ['username', 'string', 'min' => 3, 'max' => 255],
            'usernameUnique'   => [
                'username',
                'unique',
                'message' => \Yii::t('user', 'This username has already been taken')
            ],

            // email rules
            'emailTrim'     => ['email', 'trim'],
            'emailRequired' => ['email', 'required', 'on' => ['register', 'connect', 'create', 'update']],
            'emailPattern'  => ['email', 'email'],
            'emailLength'   => ['email', 'string', 'max' => 255],
            'emailUnique'   => [
                'email',
                'unique',
                'message' => \Yii::t('user', 'This email address has already been taken')
            ],

            // password rules
            'passwordRequired' => ['password', 'required', 'on' => ['register']],
//            'passwordLength'   => ['password', 'string', 'min' => 6, 'max' => 72, 'on' => ['register', 'create']],
            'passwordLength'   => ['password', 'string', 'min' => 6, 'max' => 72,],
            [['aboutInfo','social_vk', 'social_fb', 'social_in', 'social_tv', 'social_yt'], 'string'],
        ];
    }

    public function imageUrl()
    {

    }
    public function getImageurl()
    {
        $avaterPlaceholde='images/avatar-placeholder.svg';

//      $r=  $this->hasOne(UserAvatars::className(), ['id' => 'uid']);
      if($this->imguse){   return  $this->imguse->avatar; }
      else return  $avaterPlaceholde;

    }

    public function saveAvatar()
    {
        if ($this->validate()) {
            $u_id=Yii::$app->user->getId();      // add to  composer  "budyaga/yii2-users": "*",
            $u_id= empty($u_id)?'anonim':$u_id;
            $path_dir = 'upload/usepPhoto/'.date('Y-m-j');
            FileHelper::createDirectory($path_dir);
            $fileName=$path_dir .'/'.  $u_id.'.' . $this->avatarUser->extension;
            $this->avatarUser->saveAs($fileName);
            $uA=UserAvatars::find()->where(['uid'=>$u_id])->one();
            if(!$uA){
                $uA=new UserAvatars();
            }


            $uA->uid=$u_id;
            $uA->avatar=$fileName;
            $uA->save(false);
            $thumbFilename120=$path_dir.'/'.$u_id.'_160_160.'.$this->avatarUser->extension;
            $thumbFilename=Yii::getAlias('@webroot/'.$thumbFilename120);
            Image::thumbnail('@webroot/'.$fileName, 160, 160)
                ->save($thumbFilename, ['quality' => 80]);
            $uA->avatar=$thumbFilename120;
            $uA->save(false);

            return $fileName;
        } else {
            return false;
        }
    }


    public function saveInfo()
    {
        $this->aboutInfo;
        $ui = $this->userinfo;
        if(empty($ui)){
            $ui =new   UserAttachmentInfo();
            $ui->uid=$this->id;
        }
//var_dump($this->aboutInfo); die();
        if(!$ui->validate()){
            var_dump($ui->errors); die();
        }


//        ,'social_vk', 'social_fb', 'social_in', 'social_tv', 'social_yt'
            $ui->social_vk=$this->social_vk;
            $ui->social_fb=$this->social_fb;
            $ui->social_in=$this->social_in;
            $ui->social_tv=$this->social_tv;
            $ui->social_yt=$this->social_yt;

        $ui->about_me= $this->aboutInfo;
        $ui->save();

    }

    public function getImguse(){
              return    $this->hasOne(UserAvatars::className(), ['uid' => 'id']);
    }

    public function getUserinfo(){
        return    $this->hasOne(UserAttachmentInfo::className(), ['uid' => 'id']);
    }

}