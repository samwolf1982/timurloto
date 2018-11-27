<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 27.11.2018
 * Time: 9:53
 */

namespace common\models\overiden;

use common\models\UserAvatars;
use yii\imagine\Image;
use yii;
use dektrium\user\models\User as BaseUser;
use yii\helpers\FileHelper;

class User extends BaseUser
{

    public $avatarUser;
    public function imageUrl()
    {

    }
    public function getImageurl()
    {
        $avaterPlaceholde='/images/avatar-placeholder.svg';
//      $r=  $this->hasOne(UserAvatars::className(), ['id' => 'uid']);
      if($this->imguse){  return  $this->imguse->avatar; }
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

            $thumbFilename120=$path_dir.'/'.$u_id.'_120_120.'.$this->avatarUser->extension;
            $thumbFilename=Yii::getAlias('@webroot/'.$thumbFilename120);
            Image::thumbnail('@webroot/'.$fileName, 120, 120)
                ->save($thumbFilename, ['quality' => 80]);
            $uA->avatar=$thumbFilename120;
            $uA->save(false);

            return $fileName;
        } else {
            return false;
        }
    }


    public function getImguse(){
              return    $this->hasOne(UserAvatars::className(), ['uid' => 'id']);
    }

}