<?php

namespace common\models\DTO;

class WagerInfoStringResult
{
  private $info_main_cat_name;
  private $info_cat_name;
  private $info_name;
  private $percent;

  public function __construct($info_main_cat_name,$info_cat_name,$info_name,$percent=0)
  {
      $this->info_main_cat_name=$info_main_cat_name;
      $this->info_cat_name=$info_cat_name;
      $this->info_name=$info_name;
      $this->percent=$percent;
  }

  public function getFormatedString(){
       return sprintf('%s %s %s ',$this->info_main_cat_name,$this->info_cat_name,$this->info_name);
  }


    public  function getFormantedNameAndPercent(){
        return  sprintf("%s - x %0.2F",  $this->getFormatedString(), $this->percent) ;  //7,200 ₽ - 37%
    }



}
