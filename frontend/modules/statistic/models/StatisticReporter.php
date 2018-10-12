<?php
namespace frontend\modules\statistic\models;
use common\models\Balancestatistics;
use common\models\Playlist;
use common\models\search\BalancestatisticsSearch;
use yii;
use yii\helpers\ArrayHelper;

class StatisticReporter
{

    private $profit;
    private $penetration; // проходимость
    private $middle_coeficient;
    private $roi;
    private $count_plus;
    private $count_minus;
    private $user_id;

  //  private $resultSearch=[];

    /**
     * StatisticReporter constructor.
     * @param $user_id
     */
    public function __construct($user_id)
    {
        $this->user_id = $user_id;
         $this->loadData();
    }

    public function loadData()
    {
         $searchModel = new BalancestatisticsSearch();
         $res=  $searchModel->searchCount($this->user_id);
         $this->profit=$res['profit'];
         $this->penetration=$res['penetration']; // проходимост=$res['ь
         $this->middle_coeficient=$res['middle_coef'];
         $this->roi=$res['roi'];
         $this->count_plus=$res['plus'];
         $this->count_minus=$res['minus'];

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
    public function getPenetration()
    {
        return $this->penetration;
    }

    /**
     * @return mixed
     */
    public function getMiddleCoeficient()
    {
        return $this->middle_coeficient;
    }

    /**
     * @return mixed
     */
    public function getRoi()
    {
        return $this->roi;
    }

    /**
     * @return mixed
     */
    public function getCountPlus()
    {
        return $this->count_plus;
    }

    /**
     * @return mixed
     */
    public function getCountMinus()
    {
        return $this->count_minus;
    }





}
