<?php

namespace common\models\DTO;

use Yii;

class WagerInfoFrontSingle
{
    /**
     * @return string
     */
    public function getInfoNameFull()
    {
        return $this->info_name_full;
    }

    private $id;
    private $type; // ordinar Expres
    private $wager;
    private $percent;
    private $sum;
    private $created_at;
    private $sport_name;
    private $turnire_name;
    private $type_extend;  //   ConstantHelper  const BET_TYPE_...
    private $bank_percent;  //   ConstantHelper  const BET_TYPE_...

    private $info_name_full;
    private $totalCount;




  public function __construct($id,$type, $prepare_elements,$percent,$sum,$created_at,$type_extend,$bank_percent)
  {
      $this->id=$id;
      $this->type=$type;
      if(count($prepare_elements)){
           $first_el=$prepare_elements[0];
           $this->wager= $first_el;
      }else{
          $this->wager=null;
      }

      $this->totalCount=count($prepare_elements);
//      var_dump($this->wager); die();
      $this->percent=$percent;
      $this->sum=$sum;
      $this->sport_name=$this->wager->getNameSport();
      $this->turnire_name= $this->wager->getNameTurnire();
      $date=date_create($created_at);
      $this->created_at=  date_format($date,"d-m-Y") ;
      $this->type_extend=$type_extend;
      $this->bank_percent=$bank_percent;

//      yii::error($this->wager);
      $this->info_name_full=$this->wager->getNameTeams();
//      $this->info_name_full='ssss';


  }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
   public  function getSumAndPercent(){
//      return  sprintf("%d ₽ - %0.2F%%",$this->sum,$this->bank_percent) ;  //7,200 ₽ - 1-10%
      return  sprintf("%d ₽ - %d%%",$this->sum,$this->bank_percent) ;  //7,200 ₽ - 1-10%
   }

    public  function getUserPercent(){
        return  sprintf("x - %0.2F",$this->percent) ;  //7,200 ₽ - 37%
//        return  sprintf("x - %0.2F%%",$this->percent) ;  //7,200 ₽ - 37%
    }
    public  function getOwnPercent(){
        return  sprintf("Тотал Больше 3.5 - x %0.2F",$this->percent) ;  //7,200 ₽ - 37%
    }

    public  function getFormantedNameAndPercent(){
//    /  var_dump($this->wager); die();

        return  sprintf("%s",  $this->wager->getFormatedString()) ;  //7,200 ₽ - 37%
      //  return  sprintf("%s - x %0.2F",  $this->wager->getFormatedString(), $this->percent) ;  //7,200 ₽ - 37%
    }

    public  function getNameTeams(){
        return  sprintf("%s",  $this->wager->getNameEventName()) ;  //7,200 ₽ - 37%
    }

    public  function getSportAndTurnire(){

        return  sprintf("%s - %s ",  $this->sport_name, $this->turnire_name) ;  ////Футбол - Лига Чемпионов
    }



    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getWager()
    {
        return $this->wager;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @return mixed    ConstantsHelper
     */
    public function getTypeExtend()
    {
        return $this->type_extend;
    }

    /**
     * @return mixed
     */
    public function getBankPercent()
    {
        return $this->bank_percent;
    }


    public function getTotalCount()
    {
        return ($this->totalCount -1);
    }


}
