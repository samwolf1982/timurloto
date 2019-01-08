<?php

namespace common\models\services;

use common\models\helpers\ConstantsHelper;
use common\models\Popularcountry;
use common\models\Popularsport;
use common\models\Popularturnire;
use common\models\Sportcategory;
use common\models\Sportcategorynames;
use dektrium\user\models\User;
use Yii;
use yii\helpers\Url;

class PopularToday
{

    private $user_id;
//    private $userLevel;
//    private $isPro;
//    private $user_name;
//    private $user_image;
//    private  $user;
    public function __construct($user_id)
  {
      $this->user_id=$user_id;

  }

    public function getSports()
    {
               return  Sportcategorynames::find()->where(['status'=>ConstantsHelper::STATUS_ACTIVE])->all();
    }

    public static function getDropSportForCountry()
    {
        $res=[];
        foreach (Popularsport::find()->where(['status'=>ConstantsHelper::STATUS_ACTIVE])->orderBy(['sort'=>SORT_ASC])->all() as $item) {
            $name=$item->name;
            if(empty($name)){
                $searchResult=Sportcategorynames::find()->where(['sport_id'=>$item->sport_id])->one();
                if($searchResult){
                    $name= $searchResult->sport_name;
                }

            }
            //var_dump($name); die();
//                $res[]=['id'=>$item->sport_id,'name'=>$name];
                $res[$item->sport_id]=$name;
        }
//        var_dump($res); die();
        return $res;

    }

    public static function getDropCountryForTurnire()
    {
        $res=[];
        foreach (Popularcountry::find()->where(['status'=>ConstantsHelper::STATUS_ACTIVE])->all() as $item) {
            $name=$item->name;
            if(empty($name)){
                $searchResult=Sportcategory::find()->where(['category_id'=>$item->selected_country_id])->one();
                if($searchResult){
                    $name= sprintf('%s (%s)',$searchResult->category_name ,$searchResult->id); ;
                }
            }
            $res[$item->selected_country_id]=$name;

        }
        return $res;

    }


    public function listTurnire()
    {
               return  Popularturnire::find()->where(['status'=>ConstantsHelper::STATUS_ACTIVE])->all();
    }

    public function listTurnireBySportId($sport_id)
    {
        $listTurnire=[];
        foreach (Popularcountry::find()->where(['sport_id'=>$sport_id])->all() as $country) {
            foreach ($country->relturnirewiget as $item) {
                $listTurnire[]=$item->relturnire;
                 }
        }
       return $listTurnire;
    }





}
