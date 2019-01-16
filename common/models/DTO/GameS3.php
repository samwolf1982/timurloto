<?php

namespace common\models\DTO;


/**
 * Class GameS3     имеит  в себе свои еvents from http://157.230.134.85/?lineSport/131927/ru/j_zaxscdvfq1w2e3r4
 * @package app\models\TDO
 */
class GameS3{


    private $events=[];
    private $data=[];
    private $id;
    private $curentObj;

    /**
     * GameS3 constructor.
     * @param array $data
     * @param  $id
     */
    public function __construct(array $data,$obj)
    {
        $this->curentObj=$obj;
        $this->id = $obj->id;
        $this->data = $data;
        $this->calculate();
    }

    private function calculate(){
        foreach ($this->data as $datum) {
            if($datum->type=='event') {
                if($this->id==$datum->id) $this->events[]=$datum; // можно еще написать проверку на тип связи. пока что нету необходимость
            }
        }
    }

    /**
     * @return array
     */
    public function getAttr()
    {
        return $this->curentObj->attributes;
    }


    public function getRelationCompetitonId()
    {
        return $this->curentObj->relationships->competition->data->id;
    }

    /**
     * @return array
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * cразу групировка
     * @return array
     */
    public function getEventsGroups()
    {
        $res=[];
        foreach ($this->events as $event){
//            var_dump($event); die();
            $res[$event->attributes->{'market-id'}][]=$event;
        }
        return $res;
    }



    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getCurentObj()
    {
        return $this->curentObj;
    }

//    /**
//     * @return mixed
//     */
//    public function getname()
//    {
//        return $this->curentObj->;
//    }
    
    




}
