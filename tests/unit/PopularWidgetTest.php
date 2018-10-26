<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 21.09.2018
 * Time: 9:52
 */

namespace unit;

use common\models\Bets;
use common\models\helpers\ConstantsHelper;
use common\models\services\EventLine;
use common\models\services\PopularToday;
use common\models\services\UserCoeficient;
use dvizh\cart\SmartCart;
use PHPUnit\Framework\TestCase;
use Yii;
use yii\db\Expression;
use yii\db\Query;
use yii\helpers\Json;

class PopularWidgetTest extends \PHPUnit\Framework\TestCase
{


    private $modelCollection=[];
    private $eventsIdList=[];
    protected function tearDown(){

        foreach ( $this->modelCollection as $item) {
            $item->delete();
        }




    }


    public function setUp()
    {
//            $this->eventsIdList=$this->fillEventIdList();
    }

    public function testSport()
    {

         $popular=new PopularToday(-1);
         $this->assertEquals(1,count($popular->getSports())>0);

//        $this->assertEquals(14,5);

    }


}
