<?php

namespace common\models\DTO;

class WagerInfoFront
{
//    private $type; // ordinar Expres
    private $id;
    private $percent;
    private $date;
    private $nameTeams;
    private $nameSport;
    private $nameTurnire;
    private $nameEventName;
    private $status;
    private $status_name;
   // private $wagerInfoFront;
    private $wagerInfoStringResult;
    private $startGame;


  public function __construct($id,$percent,$date,$nameTeams,$nameSport,$nameTurnire,$nameEventName, $status,WagerInfoStringResult $wagerInfoStringResult,$startGame=0)
  {
      $this->id=$id;
      $this->percent=$percent;
      $this->date=$date;
      $this->nameTeams=$nameTeams;
      $this->nameSport=$nameSport;
      $this->nameTurnire=$nameTurnire;
      $this->nameEventName=$nameEventName;
      $this->status=$status;
      $this->status_name=$this->setStatusName();

      $this->wagerInfoStringResult=$wagerInfoStringResult;
      $this->startGame=$startGame;


  }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    public function getFormatedString(){
//      var_dump($this->wagerInfoStringResult); die();
        return $this->wagerInfoStringResult->getFormatedString();
    }

    public function setStatusName(){
        return "Пройшла";
    }




    /**
     * @param mixed $wagerInfoFront
     */
//    public function setWagerInfoFront($wagerInfoFront)
//    {
//        $this->wagerInfoFront = $wagerInfoFront;
//    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getNameEventName()
    {
        return $this->nameEventName;
    }

    /**
     * @return mixed
     */
    public function getNameSport()
    {
        return $this->nameSport;
    }

    /**
     * @return mixed
     */
    public function getNameTeams()
    {
        return $this->nameTeams;
    }

    /**
     * @return mixed
     */
    public function getNameTurnire()
    {
        return $this->nameTurnire;
    }

    /**
     * @return mixed
     */
    public function getPercent()
    {
        return $this->percent;
    }

    /**
     * @return mixed
     */
    public function getStatusName()
    {
        return $this->status_name;
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
    public function getWagerInfoFront()
    {
        return $this->wagerInfoFront;
    }
    /**
     * @return int
     */
    public function getStartGame()
    {
         return gmdate("Y-m-d H:i", $this->startGame);
        return $this->startGame;
    }

}
