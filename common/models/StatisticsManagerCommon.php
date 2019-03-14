<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 14.09.2018
 * Time: 20:34
 */
namespace common\models;


use common\models\Balancestatistics;
use common\models\Wager;
use common\models\Wagerelements;
use Yii;
use yii\db\Exception;

class StatisticsManagerCommon
{


    private $wager;

    public function __construct($wager)
    {
        $this->wager=$wager;
    }


    //* для конфирм *//
    public function calculateStatistics()
    {
/**@var \common\models\Wager $wager **/

            $profit=$this->calculateProfit($this->wager->select_coef,$this->wager->coef,$this->wager->status);

            $roi=$this->calculateRoi($this->wager->total,$this->wager->coef,$this->wager->status);

            $penetration=$this->calculatePenetration($this->wager->status);


            $values = ['wager_id'=>$this->wager->id, 'profit' => $profit, 'user_id' => $this->wager->user_id,'playlist_id'=>$this->wager->playlist_id,
                'event_id'=>0,
                'penetration'=>$penetration,'middle_coef'=>$this->wager->coef,
                'roi'=>$roi,
                'plus'=>$this->setPlusWager($this->wager->status), 'minus'=>$this->setMinusWager($this->wager->status),'created_at'=>date('Y-m-d H:i:s'),
                'created_own'=>$this->wager->created_at
                ];
                 if( $this->writeToStatistics($values)){

//                     $this->wager->status=Wager::STATUS_PAID_FOR;
//                     $this->wager->save(false);
//                     foreach ($wager->wagerelements as $wagerelement) {
//                                    $wagerelement->status=Wager::STATUS_PAID_FOR;
//                                    $wagerelement->save();
//                     }

                 }


    }

    public function writeToStatistics($values)
    {

        $balanceStyatistic= new Balancestatistics();
        $balanceStyatistic->attributes = $values;
        if($balanceStyatistic->validate()){
            $balanceStyatistic->save();
            return true;
        }else{
            throw new Exception(var_export($balanceStyatistic->errors,true));
        }
        return false;
    }

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

//12*6.02-12
        if($is_win==Wager::STATUS_ENTERED){
            return $select_coef * $coef - $select_coef;
        }elseif ($is_win==Wager::STATUS_NOT_ENTERD){
            return -abs($select_coef);
        }
        else{
            return 0;
        }


    }

    private function calculatePenetration($wager_status){
        if($wager_status==Wager::STATUS_ENTERED) return 1;
        if($wager_status==Wager::STATUS_NOT_ENTERD) return 0;
        // для непредвиденых ситуаций всегда не прошла. пока что исключение
      //  throw new Exception('не коректный статус');
        return 0;
    }


    /**
     * @param $sumBet сума ставки
     * @param $coef    кооеф
     * @param $is_win
     * @return float|int
     */
    private function calculateRoi($sumBet, $coef, $is_win)
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


        ///////// переделка под википедию
        /// https://ru.wikipedia.org/wiki/%D0%9E%D0%BA%D1%83%D0%BF%D0%B0%D0%B5%D0%BC%D0%BE%D1%81%D1%82%D1%8C_%D0%B8%D0%BD%D0%B2%D0%B5%D1%81%D1%82%D0%B8%D1%86%D0%B8%D0%B9


        if($is_win==Wager::STATUS_ENTERED){
            $total=$sumBet*$coef;
            return ($total - $sumBet) / $sumBet;

        }elseif ($is_win==Wager::STATUS_NOT_ENTERD){
           // return -abs($coef);
          //  return -abs(100);
            return -abs(-1);
        }
        else{ // возврать
            return 0;
        }


    }


    private function setPlusWager($status){
        if($status==Wager::STATUS_ENTERED){
            return 1;
        }elseif ($status==Wager::STATUS_NOT_ENTERD){
            return 0;
        }
        else{
            return 0;
        }
    }
    private function setMinusWager($status){
        if($status==Wager::STATUS_ENTERED){
            return 0;
        }elseif ($status==Wager::STATUS_NOT_ENTERD){
            return 1;
        }
        else{
            return 1;
        }
    }







}