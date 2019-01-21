<?php

namespace common\models\services;

use common\models\helpers\ConstantsHelper;
use dektrium\user\models\User;
use dvizh\cart\Cart;
use Yii;
use yii\helpers\Json;
use yii\helpers\Url;

class UserCoeficient
{

    /**@var  Cart $cart **/
    private $cart;

    /**
     * not use cart
     * UserCoeficient constructor.
     * @param $cart
     */
    public function __construct($cart)
    {
        $this->cartPost = $cart;
        $this->calulateMaxCoefficient();
    }

    private function calulateMaxCoefficient(){
        $coefficient=1;
//        $this->cart->getElements();

        foreach ($this->cartPost as $element) {

            yii::error($element);
            if(isset($element['CartElement']['coef'])){
                if($element['CartElement']['status']=='true')    $coefficient*= $element['CartElement']['coef'];

            }
        }

        if($coefficient<=2){
            $this->maxCoeficient=10;
        }elseif ($coefficient<=3){
            $this->maxCoeficient=7;
        }elseif ($coefficient<=5){
            $this->maxCoeficient=5;
        }elseif ($coefficient<10){
            $this->maxCoeficient=3;
        }elseif ($coefficient>=10){
            $this->maxCoeficient=2;
        }
//        yii::error($coefficient);
//        $this->maxCoeficient=10;
    }
    /**
     * @return mixed
     */
    public function getMaxCoeficient()
    {
        if($this->maxCoeficient < 1 || $this->maxCoeficient > ConstantsHelper::MAX_DROP_COEFFICIENT) return ConstantsHelper::MAX_DROP_COEFFICIENT;
        return $this->maxCoeficient;
    }
    private $maxCoeficient;



}
