<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 21.09.2018
 * Time: 9:52
 */

namespace unit;

//use app\models\managers\StatisticsManager;

use backend\models\managers\StatisticsManager;
use common\models\Balancestatistics;
use common\models\Wager;
use frontend\modules\statistic\models\StatisticReporter;
use PHPUnit\Framework\TestCase;
use yii;
use app\modules\statistic\models\WagerStatisticManager;


class StatisticModuleTest extends TestCase
{

    private $testWager_id_win;
    private $testWager_id_not_win;
    private $balancestatistics_list=[];

    //-------- Period tests
    private $wager_ids_ListPeriod=[];
    private $balancestatistics_ids_ListPeriod=[];


    protected function tearDown(){

        Balancestatistics::deleteAll(['wager_id'=>$this->testWager_id_win]);
        Balancestatistics::deleteAll(['wager_id'=>$this->testWager_id_not_win]);
        $wager = Wager::findOne($this->testWager_id_win);
        if($wager){  $wager->delete(); }

        $wager = Wager::findOne($this->testWager_id_not_win);
        if($wager){  $wager->delete(); }

        foreach ($this->balancestatistics_list as $item) {
            $b = Balancestatistics::findOne($item);
            if($b){  $b->delete(); }
        }

        //----------test period clear



    }


    public function tearUp()
    {


 $this->generateWagersAndBalancestatistics(1);


//        $user_id= -abs( USER_TEST_ID+100000+1);
//        $wager_id= -abs(USER_TEST_ID+100000+1+1);
//        $playlist_id= -abs(USER_TEST_ID+100000+1+1+1);
//        $event_id= -abs(USER_TEST_ID+100000+1+1+1+1);
//
//        foreach (range(1,5) as $item) {
//            $b=new Balancestatistics();
//            $arr=['user_id' => $user_id, 'wager_id' => $wager_id, 'playlist_id' => $playlist_id, 'event_id' => $event_id, 'profit' => 10, 'penetration' => ($item >2?0:1),
//                'middle_coef' => (12+$item), 'roi' => 13, 'plus' => ($item >3?0:1), 'minus' => ($item >3?1:0), 'created_at' => date('Y-m-d H:i:s')];
//            $b->attributes=$arr;
//            if($b->validate()){
//                $b->save();
//                $this->balancestatistics_list[]=$b->id;
//            }
//        }

    }



    public function testCountBetByUserEmptyParam()
    {

        $user_id=USER_TEST_ID;
        $wagerManager = new  WagerStatisticManager($user_id,[]);
        $check_empty= Wager::find()->where(1)->count();
        if($check_empty){ //проверка на не пустую таблицу
            $count=$wagerManager->getCountAllElements();
            $this->assertEquals($count > 0 , true);
        }else{
            $this->assertEquals(1 , true);
        }


    }


    public function testWriteToBalancestatisticsAndCalculateStatisticsWin()
    {

        $statisticManager= new  StatisticsManager();
        $statisticManager->calculateStatistics();
        $count=Balancestatistics::find()->where(1)->count();
        $testWager=new Wager();
        $testWager->user_id=USER_TEST_ID;
        $testWager->playlist_id=99;
        $testWager->total=100;
        $testWager->coef=101;
        $testWager->select_coef=102;
        $testWager->comment="lorem";
        $testWager->status=Wager::STATUS_ENTERED;
        $testWager->created_at=date('Y-m-d H:i:s');
        $testWager->save(false);
        $this->testWager_id_win=$testWager->id;
        $statisticManager= new  StatisticsManager();
        $statisticManager->calculateStatistics();
        unset($statisticManager);
        $new_count=Balancestatistics::find()->where(1)->count();

        $this->assertEquals($new_count>$count , true);
        $balancestatistics=Balancestatistics::find()->where(['wager_id'=>$testWager->id])->one();
            // profit
            $this->assertEquals($balancestatistics->profit == $this->calculateProfit($testWager->select_coef,$testWager->coef,Wager::STATUS_ENTERED) , true);
            $this->assertEquals($balancestatistics->roi , $this->calculateRoi($testWager->select_coef,$testWager->coef,Wager::STATUS_ENTERED) );
        Balancestatistics::deleteAll(['wager_id'=>$testWager->id]);
        $testWager->delete();
        $new_count=Balancestatistics::find()->where(1)->count();
        $this->assertEquals($new_count == $count , true);
    }

    public function testWriteToBalancestatisticsAndCalculateStatisticsNotWin()
    {
        $statisticManager= new  StatisticsManager();
        $statisticManager->calculateStatistics();
        $count=Balancestatistics::find()->where(1)->count();
        $testWager=new Wager();
        $testWager->user_id=USER_TEST_ID;
        $testWager->playlist_id=99;
        $testWager->total=100;
        $testWager->coef=101;
        $testWager->select_coef=102;
        $testWager->comment="lorem";
        $testWager->status=Wager::STATUS_NOT_ENTERD;
        $testWager->created_at=date('Y-m-d H:i:s');
        $testWager->save(false);

        $this->testWager_id_not_win=$testWager->id;

        $statisticManager= new  StatisticsManager();
        $statisticManager->calculateStatistics();
        unset($statisticManager);
        $new_count=Balancestatistics::find()->where(1)->count();

        $this->assertEquals($new_count>$count , true);


        $balancestatistics=Balancestatistics::find()->where(['wager_id'=>$testWager->id])->one();


        // profit
        //$this->assertEquals($balancestatistics->profit == $this->calculateProfit($testWager->select_coef,$testWager->coef,Wager::STATUS_NOT_ENTERD) , true);
        $this->assertEquals($balancestatistics->profit , $this->calculateProfit($testWager->select_coef,$testWager->coef,Wager::STATUS_NOT_ENTERD) );

        $this->assertEquals($balancestatistics->roi, $this->calculateRoi($testWager->select_coef,$testWager->coef,Wager::STATUS_NOT_ENTERD) );

        Balancestatistics::deleteAll(['wager_id'=>$testWager->id]);
        $testWager->delete();
        $new_count=Balancestatistics::find()->where(1)->count();
        $this->assertEquals($new_count == $count , true);

    }



    public function testGetALLProfitByUserId()
    {
        $user_id= -abs( USER_TEST_ID+100000);
        $wager_id= -abs(USER_TEST_ID+100000+1);
        $playlist_id= -abs(USER_TEST_ID+100000+1+1);
        $event_id= -abs(USER_TEST_ID+100000+1+1+1);

        $roi_total=0;
        foreach (range(1,5) as $item) {
            $b=new Balancestatistics();
            $roi=rand(-100,200);
            $roi_total+=$roi;
            $arr=['user_id' => $user_id, 'wager_id' => $wager_id, 'playlist_id' => $playlist_id, 'event_id' => $event_id, 'profit' => 10,'penetration' => ($item >2?0:1),
                'middle_coef' => (12+$item), 'roi' => $roi, 'plus' => ($item >3?0:1), 'minus' => ($item >3?1:0), 'created_at' => date('Y-m-d H:i:s')];
            $b->attributes=$arr;
            if($b->validate()){
                $b->save();
                $this->balancestatistics_list[]=$b->id;
            }
        }


        $statisticReporter=new StatisticReporter($user_id);
        $statisticReporter->loadData();

        $this->assertEquals($statisticReporter->getProfit(),(10*5),'profit = 50');
        $penetrationExpected = round(2/5*100,2);

//        $roiExpected = round($roi_total,2);
        $this->assertEquals($statisticReporter->getPenetration(),$penetrationExpected);

     //   $this->assertEquals($statisticReporter->getRoi(),$roiExpected);


      //  $this->assertEquals($statisticReporter->getMiddleCoeficient(),(5));


        $this->assertEquals($statisticReporter->getMiddleCoeficient(),((12+1)+(12+2)+(12+3)+(12+4)+(12+5)) / 5,'MiddleCoeficient = ((12+1)+(12+2)+(12+3)+(12+4)+(12+5)) / 5');
        $this->assertEquals($statisticReporter->getCountPlus(),(3*1),'count plus = 3*1');
        $this->assertEquals($statisticReporter->getCountMinus(),(2*1),'count minus = 2*1');


    }


    // проходимость
    public function testGetPenetrationByUserId()
    {
        $user_id= -abs( USER_TEST_ID+100000+1);
        $wager_id= -abs(USER_TEST_ID+100000+1+1);
        $playlist_id= -abs(USER_TEST_ID+100000+1+1+1);
        $event_id= -abs(USER_TEST_ID+100000+1+1+1+1);

        foreach (range(1,5) as $item) {
            $b=new Balancestatistics();
            $arr=['user_id' => $user_id, 'wager_id' => $wager_id, 'playlist_id' => $playlist_id, 'event_id' => $event_id, 'profit' => 10, 'penetration' => ($item >2?0:1),
                'middle_coef' => (12+$item), 'roi' => 13, 'plus' => ($item >3?0:1), 'minus' => ($item >3?1:0), 'created_at' => date('Y-m-d H:i:s')];
            $b->attributes=$arr;
            if($b->validate()){
                $b->save();
                $this->balancestatistics_list[]=$b->id;
            }
        }
        $statisticReporter=new StatisticReporter($user_id);
        $statisticReporter->loadData();
        $penetrationExpected = round(2/5*100,2);
        $this->assertEquals($statisticReporter->getPenetration(),$penetrationExpected,'Penetration');

    }


//    public function testSearchByPeriods()
//    {
//        $last_week=0;
//        $this->assertEquals(1,0);
////        $this->assertEquals($statisticReporter->getPenetration(),$last_week,'Penetration');
//
//    }









    //HELP AREA----------------------
    private function calculateProfit($select_coef,$coef,$is_win)
    {
//        Прибыль:
//        – Ставка сыграла
        // select_coef   coef      select_coef
//«процент от банка» x «коэффициент ставки» - «процент от банка» = прибыль
//пример: 5% x 3 - 5% = 10% прибыли с данной ставки
//– Ставка проигрыш
//«процент от банка» x «коэффициент ставки» - «процент от банка» = прибыль. (при
//проигрыше коэффициент от ставки = 0)
//пример: 5% x 0 - 5% = -5% прибыли с данной ставки
        if($is_win==Wager::STATUS_ENTERED){
            return $select_coef * $coef - $select_coef;
        }elseif ($is_win==Wager::STATUS_NOT_ENTERD){
            return -abs($select_coef);
        }
        else{
            return 0;
        }


    }



    // по идеи тоже что и проходимость  уточнить
    private function calculateRoi($select_coef,$coef,$is_win)
    {
//        ROI
//Ставка сыграла
//     $select_coef      $coef                                              //$is_win
//«процент от банка» x «коэффициент ставки» - «процент от банка» = прибыль
//пример: 5% x 3 - 5% = 10% прибыли с данной ставки
//ROI:
//10%/5%*100%=200%
//    Ставка проигрыш
//«процент от банка» x «коэффициент ставки» - «процент от банка» = прибыль. (при проигрыше коэффициент от ставки = 0)
//пример: 5% x 0 - 5% = -5% прибыли с данной ставки
//
//ROI:
//-5%/5%*100%=-100%
//    Ставка возврат
//«процент от банка» x «коэффициент ставки» - «процент от банка» = прибыль (при возврате коэффициент от ставки = 1)
//пример: 5% x 1 - 5% = 0% прибыли с данной ставки
//ROI:
//0%
//ROI:
//Общее
//(10%+(-5%)+0%/5%+5%+5%)*100%=33%
        if($is_win==Wager::STATUS_ENTERED){
            // return $select_coef * $coef - $select_coef;
            return ($select_coef * $coef - $select_coef) / $select_coef * 100;
        }elseif ($is_win==Wager::STATUS_NOT_ENTERD){
            // return -abs($select_coef);
            return -abs(100);
        }
        else{
            return 0;
        }


    }


    private function generateWagersAndBalancestatistics($period){

//$baseUserId, $is_pass=true, $created_at=1, $profit=10, $penetration=1, $middle_coef=12, $roi=13 ){ //date('Y-m-d H:i:s')
             $last_wager_id =  $this->generateSingleWager(-100,true,1,10,1,12,13);



             $wagerList_id=[];
             $wagerList_id[]=$last_wager_id;

            return ['wagers_id_list'=>$wagerList_id,'balance_id_list'=>[]];
    }


    /**
     * @param $baseUserId
     * @param boolean $is_pass     прошла
     * @param int $created_at   //if 1 => date('Y-m-d H:i:s')
     * @param int $profit
     * @param int $penetration
     * @param int $middle_coef
     * @param int $roi
     * @return int
     */
    private function generateSingleWager($baseUserId, $is_pass=true, $created_at=1, $profit=10, $penetration=1, $middle_coef=12, $roi=13  ){ //date('Y-m-d H:i:s')

        $user_id= -abs( $baseUserId);
        $wager_id= -abs($baseUserId+500);
        $playlist_id= -abs($baseUserId+800);
        $event_id= -abs($baseUserId+900);
        if($created_at==1){
            $created_at=date('Y-m-d H:i:s');
        }
        if($is_pass){
            $plus=1;
            $minus=0;
        }else{
            $plus=0;
            $minus=1;
        }

            $b=new Balancestatistics();
            $arr=['user_id' => $user_id, 'wager_id' => $wager_id, 'playlist_id' => $playlist_id, 'event_id' => $event_id, 'profit' => $profit, 'penetration' => $penetration,
                'middle_coef' => $middle_coef, 'roi' => $roi, 'plus' => $plus, 'minus' => $minus, 'created_at' =>$created_at];
            $b->attributes=$arr;
            if($b->validate()){
                $b->save();
                return $b->id;
            }
            return 0;
    }






}
