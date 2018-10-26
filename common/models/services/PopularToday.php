<?php

namespace common\models\services;

use common\models\helpers\ConstantsHelper;
use common\models\Sportcategorynames;
use dektrium\user\models\User;
use yii\helpers\Url;

class PopularToday
{

    private $user_id;
//    private $userLevel;
//    private $isPro;
//    private $user_name;
//    private $user_image;
//
//    private  $user;

  public function __construct($user_id)
  {
      $this->user_id=$user_id;

  }

    public function getSports()
    {
               return  Sportcategorynames::find()->where(['status'=>ConstantsHelper::STATUS_ACTIVE])->all();
    }


}
