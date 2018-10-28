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
use common\models\Popularsport;
use common\models\services\EventLine;
use common\models\services\PopularToday;
use common\models\services\UserCoeficient;
use common\models\Sportcategorynames;
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

    public function testGetCountryBySportId()
    {


        //$this->assertEquals(1, count( PopularToday::getDropCountryFromSport())>0,'запись должна быть обязательно присутсвовать в базе иначе тест не проходит');
        $this->assertEquals(1, count( PopularToday::getDropSportForCountry())>0,'запись должна быть обязательно присутсвовать в базе иначе тест не проходит');
        /**@var Popularsport $pop **/
        foreach (PopularToday::getDropSportForCountry() as $k=>$pop) {
           // $searchResult=Sportcategorynames::find()->where(['sport_id'=>$pop['id']])->one();
            $searchResult=Sportcategorynames::find()->where(['sport_id'=>$k])->one();
            $this->assertInstanceOf("common\models\Sportcategorynames",$searchResult);
        }




//        $this->assertEquals(14,5);

    }


}
