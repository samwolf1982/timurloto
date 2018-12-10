<?php

namespace common\models\DTO\betreport;

use common\models\helpers\ConstantsHelper;

class TopOneHandred
{
    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @return mixed
     */
    public function getProfit()
    {
        return $this->profit;
    }

    /**
     * @return mixed
     */
    public function getProhod()
    {
        return $this->prohod;
    }

    /**
     * @return mixed
     */
    public function getMiddleCooff()
    {
        return $this->middleCooff;
    }

    /**
     * @return mixed
     */
    public function getCountPlus()
    {
        return $this->countPlus;
    }

    /**
     * @return mixed
     */
    public function getCountMinus()
    {
        return $this->countMinus;
    }
    public  $photo;
    public  $name;
    public  $level;
    public  $profit;
    public  $prohod;
    public  $middleCooff;
    public  $countPlus;
    public  $countMinus;

    /**
     * TopOneHandred constructor.
     * @param $photo
     * @param $name
     * @param $level
     * @param $profit
     * @param $prohod
     * @param $middleCooff
     * @param $countPlus
     * @param $countMinus
     */
    public function __construct($photo, $name, $level, $profit, $prohod, $middleCooff, $countPlus, $countMinus)
    {
        $this->photo = $photo;
        $this->name = $name;
        $this->level = $level;
        $this->profit = $profit;
        $this->prohod = $prohod;
        $this->middleCooff = $middleCooff;
        $this->countPlus = $countPlus;
        $this->countMinus = $countMinus;
    }

}
