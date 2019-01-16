<?php

namespace common\models\DTO;



class CompetitionS3{


    private $games=[];
    private $data=[];

    private $item; // сompetition

    /**
     * CompetitionS3 constructor.
     * @param array $data
     * @param $id
     */
    public function __construct(array $data, $item)
    {
        $this->data = $data;
        $this->item = $item;
        $this->calculate();
    }

    private function calculate(){
        $curentId=$this->item->id;
        /** @var  \app\models\TDO\GameS3 $datum **/
        foreach ($this->data as $datum) {

            if($curentId==$datum->getRelationCompetitonId()){   //die('fineee');
                 $this->games[]=   $datum;   // добавление игры к competiton
            }
        }
    }

    /**
     * @return array
     */
    public function getGames()
    {
        return $this->games;
    }
    /**
     * @return string
     */
    public function getId()
    {
        return $this->item->id;
    }
    /**
     * @return string
     */
    public function getName()
    {
        return $this->item->attributes->name;
    }


}
