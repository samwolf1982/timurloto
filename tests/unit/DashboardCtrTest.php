<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 21.09.2018
 * Time: 9:52
 * тесты для дашбоард контроллер
 * http://localhost35/dashboard
 */

namespace unit;

//use app\models\managers\StatisticsManager;

use backend\models\managers\StatisticsManager;
use common\models\Balancestatistics;
use common\models\Eventsnames;
use common\models\services\FiltertByCountry;
use common\models\services\FiltertCountryBySport;
use common\models\Sportcategory;
use common\models\Tournamentsnames;
use common\models\Wager;
use common\models\wraps\SportcategoryExt;
use common\models\wraps\TournamentsnamesExt;
use frontend\modules\statistic\models\StatisticReporter;
use PHPUnit\Framework\TestCase;
use yii;
use app\modules\statistic\models\WagerStatisticManager;


class DashboardCtrTest extends TestCase
{
    private $modelCollection=[];
    protected function tearDown(){

        foreach ( $this->modelCollection as $item) {
            $item->delete();
        }




    }


    public function setUp()
    {

        foreach (range(1,5) as $num) {
            // cоздать страну  in sportcategory
            $base_id=-1000+$num;
            $base_id_sport= -2000;
            $sportCatCountry=new Sportcategory();
            $sportCatCountry->attributes= ['category_id' => ($base_id-1), 'category_is_summaries' => 'x', 'category_name' => 'Тестовая страна '.($base_id-1),
                'sport_id' => $base_id_sport , 'status' => 1, 'sort' => 0, 'is_updated' => 1];
            if($sportCatCountry->validate()){
                $sportCatCountry->save();
                $this->modelCollection[]=$sportCatCountry;
            }else{
                var_dump($sportCatCountry->errors);
            }
        }

        foreach (range(1,4) as $num) {
            $base_id=-7000;
            $base_id_sport= -2000;
            $base_id_tournament= -3000;
            $t=new Tournamentsnames();
            $t->category_id=$base_id;
            $t->sport_id=$base_id_sport;
            $t->tournament_id=$base_id_tournament;
            $t->tournament_is_summaries='1';
            $t->tournament_name='tournament name '.$base_id;
            $t->status=1;
            $t->sort=0;
            $t->is_updated=1;
            if( $t->validate()){
                $t->save();
                $this->modelCollection[]= $t;
            }else{
                var_dump( $t->errors);
            }
        }

        foreach (range(1,6) as $num) {
            $base_id=-9000;
            $base_id_sport= -2000;
            $base_id_tournament= -33000;
            $base_id_event= -3500;
            $base_id_category= -13500;
            $e=new Eventsnames();

            $e->event_id = $base_id_event;
            $e->tournament_id = $base_id_tournament;
            $e->event_name ='Event Name';
            $e->event_dt = 1536259500;
            $e->event_status_type='notstarted';
            $e->category_id = $base_id_category ;
            $e->category_name ='категори имя' ;
            $e->country_id = 123;
            $e->tournament_name ='имя турнира';
            $e->tournament_is_summaries='0';
            $e->status = 1;
            $e->sort =0;
            $e->is_updated = 0;

            if( $e->validate()){
                $e->save();
                $this->modelCollection[]= $e;
            }else{
                var_dump( $e->errors);
            }
        }

        // create related
        $this->createRelated();





    }


    /**
     *  создать 3 связдных модели для определиения количества -77777
     */
    private function createRelated(){

        $base_id=-77777;
        $base_id_sport= -212345;
        $base_id_tournament= -312345;
        $t=new Tournamentsnames();
        $t->category_id=$base_id;
        $t->sport_id=$base_id_sport;
        $t->tournament_id=$base_id_tournament;
        $t->tournament_is_summaries='1';
        $t->tournament_name='tournament name '.$base_id;
        $t->status=1;
        $t->sort=0;
        $t->is_updated=1;
        if( $t->validate()){
            $t->save();
            $this->modelCollection[]= $t;
        }else{
            var_dump( $t->errors);
        }

        foreach (range(1,3) as $num) {
            $base_id=-900012;
            $base_id_sport= -200012;
//            $base_id_tournament= -33000;
            $base_id_event= -3500123;
            $base_id_category= -13500123;
            $e=new Eventsnames();

            $e->event_id = $base_id_event;
            $e->tournament_id = $base_id_tournament; // по полю связь
            $e->event_name ='Event Name';
            $e->event_dt = 15362595070;
            $e->event_status_type='notstarted';
            $e->category_id = $base_id_category ;
            $e->category_name ='категори имя' ;
            $e->country_id = 123;
            $e->tournament_name ='имя турнира';
            $e->tournament_is_summaries='0';
            $e->status = 1;
            $e->sort =0;
            $e->is_updated = 0;

            if( $e->validate()){
                $e->save();
                $this->modelCollection[]= $e;
            }else{
                var_dump( $e->errors);
            }
        }

    }

    

    public function testSearchCountryBySportLV1()
    {
        $f=new FiltertCountryBySport(-2000,null,null);
        $this->assertInternalType('array',$f->getTurnires());
        $this->assertEquals(5,count( $f->getTurnires()));

        $f=new FiltertCountryBySport(-250000,null,null);
        $this->assertInternalType('array',$f->getTurnires());
        $this->assertEquals(0,count( $f->getTurnires()));
    }

//    public function testSearchCountryBySportLV1_Count()
//    {
//        // todo доделать счетчик для левого меню
//        $f=new FiltertCountryBySport(-2000,null,null);
//        /**@var  Sportcategory $item **/
//        foreach ( $f->getTurnires() as $item) {
//            var_dump(get_class($item));
////                    $this->assertEquals(5, $item);
//        }
//        $this->assertInternalType('array',$f->getTurnires());
//        $this->assertEquals(5,count( $f->getTurnires()));
//
//        $f=new FiltertCountryBySport(-250000,null,null);
//        $this->assertInternalType('array',$f->getTurnires());
//        $this->assertEquals(0,count( $f->getTurnires()));
   // }


    public function testSearchTurnireByCountryLV2()
    {
        $f=new FiltertCountryBySport(null,-7000,null);
        $this->assertInternalType('array',$f->getTurniresByCountry());
        $this->assertEquals(4,count( $f->getTurniresByCountry()));

        $f=new FiltertCountryBySport(null,-71000,null);
        $this->assertInternalType('array',$f->getTurniresByCountry());
        $this->assertEquals(0,count( $f->getTurniresByCountry()));


    }



    public function testSearchTurnireByCountryLV2_Count()
    {
        $f=new FiltertCountryBySport(null,-77777,null);
        /** @var TournamentsnamesExt $item */
        foreach ($f->getTurniresByCountry() as $item) {
//            var_dump(get_class($item));
//             var_dump($item->getCountevents());
            $this->assertEquals(3,$item->countevents );
        }
//        $this->assertInternalType('array',$f->getTurniresByCountry());
//        $this->assertEquals(4,count( $f->getTurniresByCountry()));
//
//        $f=new FiltertCountryBySport(null,-71000,null);
//        $this->assertInternalType('array',$f->getTurniresByCountry());
//        $this->assertEquals(0,count( $f->getTurniresByCountry()));

    }




    public function testSearchTurnireByCountryFIN_LV3()
    {
        $f=new FiltertCountryBySport(null,null,-33000);
        $this->assertInternalType('array',$f->getTurniresByCountryFin());
        $this->assertEquals(6,count( $f->getTurniresByCountryFin()));

        $f=new FiltertCountryBySport(null,null,-330001);
        $this->assertInternalType('array',$f->getTurniresByCountryFin());
        $this->assertEquals(0,count( $f->getTurniresByCountryFin()));
    }






    public function d_testSearchTurnireByCountryFIN_LV3_MANUAL()
    {
        $f=new FiltertCountryBySport(null,null,17137);
        $this->assertInternalType('array',$f->getTurniresByCountryFin());
        $this->assertEquals(6,count( $f->getTurniresByCountryFin()));

        $f=new FiltertCountryBySport(null,null,-330001);
        $this->assertInternalType('array',$f->getTurniresByCountryFin());
        $this->assertEquals(0,count( $f->getTurniresByCountryFin()));
    }








}
