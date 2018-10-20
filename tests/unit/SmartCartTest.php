<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 21.09.2018
 * Time: 9:52
 */

namespace unit;

use common\models\helpers\ConstantsHelper;
use common\models\services\UserCoeficient;
use dvizh\cart\SmartCart;
use PHPUnit\Framework\TestCase;
use Yii;
use yii\helpers\Json;

class SmartCartTest extends \PHPUnit\Framework\TestCase
{

    public function testCalculateCoefficient()
    {

        $arr[]=new PseudoElementCart(['outcome_coef'=>1.2]);
        //1.2
        $this->assertEquals(10,$this->addCartElementAndReturnCoefficient($arr));
        //*1.9=2.28
        $arr[]=new PseudoElementCart(['outcome_coef'=>1.9]);
        $this->assertEquals(7,$this->addCartElementAndReturnCoefficient($arr));

        //1.2*1.9*2.1=4.78
        $arr[]=new PseudoElementCart(['outcome_coef'=>2.1]);
        $this->assertEquals(5,$this->addCartElementAndReturnCoefficient($arr));

        // 1.2*1.9*2.1*1.9 =9.09
        $arr[]=new PseudoElementCart(['outcome_coef'=>1.9]);
        $this->assertEquals(3,$this->addCartElementAndReturnCoefficient($arr));

        //1.2*1.9*2.1*1.9*1.1  10
        $arr[]=new PseudoElementCart(['outcome_coef'=>1.1]);
        $this->assertEquals(2,$this->addCartElementAndReturnCoefficient($arr));

        //1.2*1.9*2.1*1.9*1.1*1.4  14
        $arr[]=new PseudoElementCart(['outcome_coef'=>1.4]);
        $this->assertEquals(2,$this->addCartElementAndReturnCoefficient($arr));

        //1.2*1.9*2.1*1.9*1.1*1.4 *0 0  eroror  expect 10
        $arr[]=new PseudoElementCart(['outcome_coef'=>0]);
        $this->assertEquals(10,$this->addCartElementAndReturnCoefficient($arr));

    }
    private function addCartElementAndReturnCoefficient($arr){
        $userCoefficient=new UserCoeficient( new PseudoCart($arr));
        return $userCoefficient->getMaxCoeficient();
    }


}


class PseudoCart{

    private $elementsPseudo;
    public function __construct($elementsPseudo)
    {
        $this->elementsPseudo = $elementsPseudo;
    }

    public function getElements(){
        return $this->elementsPseudo;
    }

}


class PseudoElementCart{

        public $options;
    /**
     * PseudoElementCart constructor.
     * @param $options
     */
    public function __construct($options)
    {
        $this->options = Json::encode($options);
    }

}