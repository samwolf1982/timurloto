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
use common\models\services\UserCoeficient;
use dvizh\cart\SmartCart;
use PHPUnit\Framework\TestCase;
use Yii;
use yii\db\Expression;
use yii\db\Query;
use yii\helpers\Json;

class EventLineTest extends \PHPUnit\Framework\TestCase
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
            $this->eventsIdList=$this->fillEventIdList();
    }

    public function testGetline()
    {
        $id=$this->getRandomIdfromBd();// first id
        print_r('Event line event_id: '.$id); echo  PHP_EOL;

        $eventLine=new EventLine($id);
        $count=$eventLine->getCountGroupInLine();
        print_r('Count : '.$count); echo  PHP_EOL;
        print_r('EventName : '.$eventLine->getEventName()); echo  PHP_EOL;
        $this->assertGreaterThan(0,$count);
        $this->assertEquals($count,count($eventLine->getLine()));
        $eventName=$eventLine->getEventName();
        $this->assertEquals(true,!empty($eventName));


    }

    private function createBet(){
        $b=new Bets();
        $p =[
            'event_id' => 123,
            'market_id' => 123,
            'market_name' => 'some market name',
            'market_order' => 'some',
            'outcomes' => $this->gettestOutcameString(),
            'count_outcomes' => 5,
            'market_suspend' => 'y',
            'market_template_id' => 456,
            'market_template_view_id' => 456,
            'market_template_weigh' => 123,
            'result_type_id' => 123,
            'result_type_name' => 'имя результата ',
            'result_type_short_name' => 'имя результата короткое',
            'result_type_weigh' => 456,
            'service_id' => 123,
            'sport_id' => 123,
            'status' => 0,
            'sort' => 0,
            'is_updated' => 0
        ];
        $b->attributes=$p;
        if($b->validate() && $b->save()){
            $this->modelCollection[]=$b;
            return $b->id;
        }else{
            print_r($b->errors);
        }

        return $b->id;
    }


    private function fillEventIdList()
    {

     //   $query='SELECT event_id  FROM `bets` WHERE 1 GROUP BY event_id';
        $rows = (new Query())
            ->select(['event_id'])
            ->from('bets')
            ->where(1)->groupBy(['event_id'])
            ->all();
        return $rows;
    }
    private function getRandomIdfromBd(){
        $k = array_rand($this->eventsIdList);
        $arr = $this->eventsIdList[$k];
        return $arr['event_id'];
    }

    private function getIdFromAraray($index=0)
    {
         if(key_exists($index,$this->modelCollection)){
             return $this->modelCollection[$index];
         }else {
             return null;
         }
    }

    private function gettestOutcameString()
    {
        $a='[{"outcome_coef":5,"outcome_id":1011421667,"outcome_name":"\u0413\u0435\u0440\u043c\u0430\u043d\u0438\u044f","outcome_param":"\u0413\u0435\u0440\u043c\u0430\u043d\u0438\u044f","outcome_perc_stat":0.26,"outcome_short_name":"\u0413\u0435\u0440\u043c\u0430\u043d\u0438\u044f","outcome_tag":null,"outcome_tl_header_name":null,"outcome_tl_left_name":null,"outcome_type_id":0,"outcome_visible":true,"participant_number":20},{"outcome_coef":4.5,"outcome_id":1011421677,"outcome_name":"\u0418\u0441\u043f\u0430\u043d\u0438\u044f","outcome_param":"\u0418\u0441\u043f\u0430\u043d\u0438\u044f","outcome_perc_stat":0.24,"outcome_short_name":"\u0418\u0441\u043f\u0430\u043d\u0438\u044f","outcome_tag":null,"outcome_tl_header_name":null,"outcome_tl_left_name":null,"outcome_type_id":0,"outcome_visible":true,"participant_number":50},{"outcome_coef":6,"outcome_id":1011421678,"outcome_name":"\u0424\u0440\u0430\u043d\u0446\u0438\u044f","outcome_param":"\u0424\u0440\u0430\u043d\u0446\u0438\u044f","outcome_perc_stat":94.88,"outcome_short_name":"\u0424\u0440\u0430\u043d\u0446\u0438\u044f","outcome_tag":null,"outcome_tl_header_name":null,"outcome_tl_left_name":null,"outcome_type_id":0,"outcome_visible":true,"participant_number":18},{"outcome_coef":7,"outcome_id":1011421699,"outcome_name":"\u0411\u0435\u043b\u044c\u0433\u0438\u044f","outcome_param":"\u0411\u0435\u043b\u044c\u0433\u0438\u044f","outcome_perc_stat":0.33,"outcome_short_name":"\u0411\u0435\u043b\u044c\u0433\u0438\u044f","outcome_tag":null,"outcome_tl_header_name":null,"outcome_tl_left_name":null,"outcome_type_id":0,"outcome_visible":true,"participant_number":7},{"outcome_coef":12,"outcome_id":1011421716,"outcome_name":"\u0410\u043d\u0433\u043b\u0438\u044f","outcome_param":"\u0410\u043d\u0433\u043b\u0438\u044f","outcome_perc_stat":1.96,"outcome_short_name":"\u0410\u043d\u0433\u043b\u0438\u044f","outcome_tag":null,"outcome_tl_header_name":null,"outcome_tl_left_name":null,"outcome_type_id":0,"outcome_visible":true,"participant_number":14},{"outcome_coef":10,"outcome_id":1011421726,"outcome_name":"\u0418\u0442\u0430\u043b\u0438\u044f","outcome_param":"\u0418\u0442\u0430\u043b\u0438\u044f","outcome_perc_stat":0.09,"outcome_short_name":"\u0418\u0442\u0430\u043b\u0438\u044f","outcome_tag":null,"outcome_tl_header_name":null,"outcome_tl_left_name":null,"outcome_type_id":0,"outcome_visible":true,"participant_number":26},{"outcome_coef":14,"outcome_id":1011421741,"outcome_name":"\u041f\u043e\u0440\u0442\u0443\u0433\u0430\u043b\u0438\u044f","outcome_param":"\u041f\u043e\u0440\u0442\u0443\u0433\u0430\u043b\u0438\u044f","outcome_perc_stat":0,"outcome_short_name":"\u041f\u043e\u0440\u0442\u0443\u0433\u0430\u043b\u0438\u044f","outcome_tag":null,"outcome_tl_header_name":null,"outcome_tl_left_name":null,"outcome_type_id":0,"outcome_visible":true,"participant_number":41},{"outcome_coef":20,"outcome_id":1011421761,"outcome_name":"\u0425\u043e\u0440\u0432\u0430\u0442\u0438\u044f","outcome_param":"\u0425\u043e\u0440\u0432\u0430\u0442\u0438\u044f","outcome_perc_stat":2.24,"outcome_short_name":"\u0425\u043e\u0440\u0432\u0430\u0442\u0438\u044f","outcome_tag":null,"outcome_tl_header_name":null,"outcome_tl_left_name":null,"outcome_type_id":0,"outcome_visible":true,"participant_number":10},{"outcome_coef":45,"outcome_id":1011421996,"outcome_name":"\u041d\u0438\u0434\u0435\u0440\u043b\u0430\u043d\u0434\u044b","outcome_param":"\u041d\u0438\u0434\u0435\u0440\u043b\u0430\u043d\u0434\u044b","outcome_perc_stat":0,"outcome_short_name":"\u041d\u0438\u0434\u0435\u0440\u043b\u0430\u043d\u0434\u044b","outcome_tag":null,"outcome_tl_header_name":null,"outcome_tl_left_name":null,"outcome_type_id":0,"outcome_visible":true,"participant_number":37},{"outcome_coef":35,"outcome_id":1011422023,"outcome_name":"\u0428\u0432\u0435\u0439\u0446\u0430\u0440\u0438\u044f","outcome_param":"\u0428\u0432\u0435\u0439\u0446\u0430\u0440\u0438\u044f","outcome_perc_stat":0,"outcome_short_name":"\u0428\u0432\u0435\u0439\u0446\u0430\u0440\u0438\u044f","outcome_tag":null,"outcome_tl_header_name":null,"outcome_tl_left_name":null,"outcome_type_id":0,"outcome_visible":true,"participant_number":52},{"outcome_coef":40,"outcome_id":1011422076,"outcome_name":"\u041f\u043e\u043b\u044c\u0448\u0430","outcome_param":"\u041f\u043e\u043b\u044c\u0448\u0430","outcome_perc_stat":0,"outcome_short_name":"\u041f\u043e\u043b\u044c\u0448\u0430","outcome_tag":null,"outcome_tl_header_name":null,"outcome_tl_left_name":null,"outcome_type_id":0,"outcome_visible":true,"participant_number":40},{"outcome_coef":75,"outcome_id":1011422095,"outcome_name":"\u0418\u0441\u043b\u0430\u043d\u0434\u0438\u044f","outcome_param":"\u0418\u0441\u043b\u0430\u043d\u0434\u0438\u044f","outcome_perc_stat":0,"outcome_short_name":"\u0418\u0441\u043b\u0430\u043d\u0434\u0438\u044f","outcome_tag":null,"outcome_tl_header_name":null,"outcome_tl_left_name":null,"outcome_type_id":0,"outcome_visible":true,"participant_number":24}]';
        return $a;
    }

}
