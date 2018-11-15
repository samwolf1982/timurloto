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
use common\models\Subscriber;
use common\models\User;
use PHPUnit\Framework\TestCase;
use Yii;
use yii\db\Expression;
use yii\db\Query;
use yii\helpers\Json;

class SubscribersModuleTest extends \PHPUnit\Framework\TestCase
{

 // пока что без тестов
    private $modelCollection=[];
    private $eventsIdList=[];
    protected function tearDown(){

        foreach ( $this->modelCollection as $item) {
            $item->delete();
        }
    }


    public function setUp()
    {

        $subscriber=new Subscriber();
        foreach (range(1,10) as  $item) {

            $user1=new User();


//        [ 'user_own_id' => 'ид пользователя', 'user_sub_id' => 'ид подписчика', 'expired_at' => 'время окончания', 'status' => 'статус блокирован активен прострочено время ...', 'created_at' => 'создан',
            $attr= [ 'user_own_id' => -100+$item, 'user_sub_id' => -200+$item, 'expired_at' => date('Y-m-d H:i:s') , 'status' =>  0 , 'created_at' => date('Y-m-d H:i:s')];
            $subscriber->attributes= $attr;
            $subscriber->save(false);
            $this->modelCollection[]=$subscriber;
        }


//            $this->eventsIdList=$this->fillEventIdList();
    }

    public function testIsSubscriber()
    {

        /** @var SubscriberModule $moduleSubscribers */
        $moduleSubscribers = \Yii::$app->getModule('subscribers');


        $isSubscriber=  $moduleSubscribers->isSubscriber(-101,-201);
        $this->assertEquals(true , 1);

    }




}
