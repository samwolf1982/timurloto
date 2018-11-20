<?php

namespace common\models\DTO;

use common\models\helpers\ConstantsHelper;

class AccessInfoAccount
{
    /**
     * @return mixed
     */
    public function getCountTotalOpenAccess()
    {
        return $this->countTotalOpenAccess;
    }

    /**
     * @return mixed
     */
    public function getCountSubscribe()
    {
        return $this->countSubscribe;
    }

    /**
     * @return mixed
     */
    public function getCountSubscribers()
    {
        return $this->countSubscribers;
    }

    /**
     * @return mixed
     */
    public function getCountWagers()
    {
        return $this->countWagers;
    }

    /**
     * @return mixed
     */
    public function getWeekNum()
    {
        return $this->weekNum;
    }

    /**
     * @return mixed
     */
    public function getTop100()
    {
        return $this->top100;
    }

    private $countTotalOpenAccess;
    private $countSubscribe;
    private $countSubscribers;
    private $countWagers;
    private $weekNum;
    private $top100;

    /**
     * ОТКРЫТЫЕ ДОСТУПЫ 27 ПОДПИСКИ 358 ПОДПИСЧИКИ 2,389 ПРОГНОЗЫ 357 WEEK 1 #4 TOP - 100 #13
     * AccessInfoAccount constructor.
     * @param $countTotalOpenAccess
     * @param $countSubscribe
     * @param $countSubscribers
     * @param $countWagers
     * @param $weekNum
     * @param $top100
     */
    public function __construct($countTotalOpenAccess, $countSubscribe, $countSubscribers, $countWagers, $weekNum, $top100)
    {
        $this->countTotalOpenAccess = $countTotalOpenAccess;
        $this->countSubscribe = $countSubscribe;
        $this->countSubscribers = $countSubscribers;
        $this->countWagers = $countWagers;
        $this->weekNum = $weekNum;
        $this->top100 = $top100;
    }


}
