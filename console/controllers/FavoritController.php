<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace console\controllers;


use common\models\Bets;
use common\models\Eventsnames;
use common\models\helpers\ConstantsHelper;
use common\models\Sportcategory;
use common\models\Sportcategorynames;
use common\models\Tournamentsnames;
use console\models\DTO\DtoClearCollector;
use console\models\services\ClearCollectort;
use Yii;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\ArrayHelper;
use yii\httpclient\Client;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 * порядок запуска  actionCategorynames,    actionTournamentsnames-> с таймером     actionEventsnames   actionGamesnames(+-1500)  actionBetsloops (очень много) -> с таймером
 *
 * для парсеров наверно менять условие парсинга по полю статус если есть наверно поле tournament_is_summaries ???
 *
 */
class FavoritController extends Controller
{

    public $ex;  // cписок ??

    private  $urlApi=  'http://localhost36/api' ;
    // категории спорта футбол шахм.. ид брать из бд Sportcategorynames
    private $catList=[ 1,23, 2, 39, 20, 51, 62, 24, 6, 33, 26, 48, 7, 80, 52, 65, 72, 61, 29, 79, 25, 76, 60, 84, 77, 85, 73, 89, 57, 3, 9, 22, 30, 92, 34, 96, 99, 180,];

    public function options($actionID)
    {
        return ['ex'];
    }

    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";

        return ExitCode::OK;
    }




    /**
     * 1 базовая загрузка имен вида спорта
     * 'id' => $this->primaryKey(),
     * 'sport_id' => $this->integer()->null()->comment("sport id  из донора по нему связб с sportcategory"),
     * 'sport_name' => $this->text()->null()->comment("Название спорта"),
     * 'sport_short_name' => $this->text()->null()->comment("Название спорта короткое"),
     * 'sport_slug' => $this->text()->null()->comment("slug"),
     *
  *  'status' => $this->integer()->null()->comment("1 активная 0 не активная"),
   * 'sort' => $this->integer()->null()->comment("sort 0 1 2 3.."),
    * 'is_updated' => $this->integer()->null()->comment("обновлять ли категорию из парсера,следить 1-yes 0-no"),
     * @return int
     */
    public function actionCategorynames()
    {
        $client = new Client(['baseUrl' =>Yii::$app->params['apiBaseUrl']]);
        $response = $client->get('sportcategory')->send();
        if ($response->isOk) {
//         / $j= json_decode($response->data);

            $catListForDElete=new  DtoClearCollector();
            foreach ($response->data as $item) {
                $catListForDElete->addElement($item['sport_id']);
                $cat=  Sportcategorynames::find()->where(['sport_id'=>$item['sport_id']])->one();
//                    $cat=Sportcategorynames::find()->where(['sport_id'=>$item->sport_id])->one();
                    if ($cat and ($cat->is_updated==1) ){// обнова
                        $cat->sport_id=$item['sport_id'];
                        $cat->sport_name=$item['sport_name'];
                        $cat->sport_short_name=$item['sport_short_name'];
                        $cat->sport_slug=$item['sport_slug'];
                        if ($cat->validate()){
                            $cat->save();
                        }else{
                            yii::error(['badValidateActionCategory'=>$cat->errors,'id'=>$cat->id]);
                            var_dump($cat->errors);
                        }
                        echo "Updated: ".$cat->id.PHP_EOL;
                    }else{
                        $cat= new Sportcategorynames();
                        $cat->sport_id=$item['sport_id'];
                        $cat->sport_name=$item['sport_name'];
                        $cat->sport_short_name=$item['sport_short_name'];
                        $cat->sport_slug=$item['sport_slug'];
                        $cat->status=1;
                        $cat->is_updated=1;
                        $cat->sort=0;
                        if ($cat->validate()){
                            $cat->save();
                        }else{
                            yii::error(['badValidateActionCategory'=>$cat->errors,'id'=>$cat->id]);
                            var_dump($cat->errors);
                        }
                        echo "NEW : ".$cat->id.PHP_EOL;
                    }
                               }
            // чистка
            $clearCollector=new ClearCollectort($catListForDElete);
            $clearCollector->clearFavoritCategorynames();


        }
       // die();
        // Create a client with a base URI
        echo 'FIN ' . "\n";
        return ExitCode::OK;
    }

    /**
     * 2 турниры по стране из категории (пока что все вместе)
     *          'id' => $this->primaryKey(),
     * @return int
     */
    public function actionTournamentsNames($sport_id_num=0)
    {
        $client = new Client(['baseUrl' =>Yii::$app->params['apiBaseUrl']]);
        $response = $client->get('turnirename')->send();
        if ($response->isOk) {
            //var_dump($response->data);
//         / $j= json_decode($response->data);

            $catListForDElete=new  DtoClearCollector();
            foreach ($response->data as $item) {
                $catListForDElete->addElement($item['category_id']);
                $cat=  Sportcategory::find()->where(['category_id'=>$item['category_id']])->one();
//                    $cat=Sportcategorynames::find()->where(['sport_id'=>$item->sport_id])->one();
                if ($cat and ($cat->is_updated==1) ){// обнова
                    $cat->category_id=$item['category_id'];
                    $cat->category_is_summaries=$item['category_is_summaries'];
                    $cat->category_name=$item['category_name'];
                    $cat->sport_id=$item['sport_id'];
                    if ($cat->validate()){
                        $cat->save();
                    }else{
                        yii::error(['badValidateActionCategory'=>$cat->errors,'id'=>$cat->id]);
                        var_dump($cat->errors);
                    }
                    echo "Updated: ".$cat->id.PHP_EOL;
                }else{
                    $cat= new Sportcategory();
                    $cat->category_id=$item['category_id'];
                    $cat->category_is_summaries=$item['category_is_summaries'];
                    $cat->category_name=$item['category_name'];
                    $cat->sport_id=$item['sport_id'];
                    $cat->status=1;
                    $cat->is_updated=1;
                    $cat->sort=0;
                    if ($cat->validate()){
                        $cat->save();
                    }else{
                        yii::error(['badValidateActionCategory'=>$cat->errors,'id'=>$cat->id]);
                        var_dump($cat->errors);
                    }
                    echo "NEW : ".$cat->id.PHP_EOL;
                }
//                var_dump($item['sport_id']); die();



            }

            // чистка
            $clearCollector=new ClearCollectort($catListForDElete);
            $clearCollector->clearTournamentsNames();

            //  var_dump($response->data);

        }
        // die();
        // Create a client with a base URI
        echo 'FIN ' . "\n";
        return ExitCode::OK;

    }





    /**
     * 3  (пока что все вместе)
     * events по стране->премьер лига  (пока что все вместе)  actionEventsnames
     * @return int
     */
    public function actionEventsNames($tournament_id_num = 17336 , $base_click=8856)
    {
        $client = new Client(['baseUrl' =>Yii::$app->params['apiBaseUrl']]);
        $response = $client->get('turnire')->send();
        if ($response->isOk) {
          //  var_dump($response->data); die();
//         / $j= json_decode($response->data);
            $catListForDElete=new  DtoClearCollector();
              foreach ($response->data as $item) {
                $catListForDElete->addElement($item['tournament_id']);
                $cat=  Tournamentsnames::find()->where(['tournament_id'=>$item['tournament_id']])->one();
//                    $cat=Sportcategorynames::find()->where(['sport_id'=>$item->sport_id])->one();
                if ($cat and ($cat->is_updated==1) ){// обнова
                    $cat->category_id=$item['category_id'];
                    $cat->sport_id=$item['sport_id'];
                    $cat->tournament_id=$item['tournament_id'];
                    $cat->tournament_is_summaries=$item['tournament_is_summaries'];
                    $cat->tournament_name=$item['tournament_name'];
                    if ($cat->validate()){
                        $cat->save();
                    }else{
                        yii::error(['badValidateActionCategory'=>$cat->errors,'id'=>$cat->id]);
                        var_dump($cat->errors);
                    }
                    echo "Updated: ".$cat->id.PHP_EOL;
                }else{
                    $cat= new Tournamentsnames();
                    $cat->category_id=$item['category_id'];
                    $cat->sport_id=$item['sport_id'];
                    $cat->tournament_id=$item['tournament_id'];
                    $cat->tournament_is_summaries=$item['tournament_is_summaries'];
                    $cat->tournament_name=$item['tournament_name'];
                    $cat->status=1;
                    $cat->is_updated=1;
                    $cat->sort=0;
                    if ($cat->validate()){
                        $cat->save();
                    }else{
                        yii::error(['badValidateActionCategory'=>$cat->errors,'id'=>$cat->id]);
                        var_dump($cat->errors);
                    }
                    echo "NEW : ".$cat->id.PHP_EOL;
                }
//                var_dump($item['sport_id']); die();
            }
            // чистка
            $clearCollector=new ClearCollectort($catListForDElete);
            $clearCollector->clearEventsNames();


            //  var_dump($response->data);

        }
        // die();
        // Create a client with a base URI
        echo 'FIN ' . "\n";
        return ExitCode::OK;

    }




    /**
     * 4 (пока что все вместе)
     * games по собитиям events (кто с кем играет)  (пока что все вместе)
     * @return int
     */
    public function actionGamesNames()
    {
        $client = new Client(['baseUrl' =>Yii::$app->params['apiBaseUrl']]);
        $response = $client->get('events')->send();
        if ($response->isOk) {
            //  var_dump($response->data); die();
//         / $j= json_decode($response->data);
            $catListForDElete=new  DtoClearCollector();
            foreach ($response->data as $item) {
                $catListForDElete->addElement($item['event_id']);
                $cat=  Eventsnames::find()->where(['event_id'=>$item['event_id']])->one();
                if ($cat and ($cat->is_updated==1) ){// обнова
                    $cat->event_id=$item['event_id'];
                    $cat->event_name=$item['event_name'];
                    $cat->event_dt=$item['event_dt'];
                    $cat->event_status_type=$item['event_status_type'];
                    $cat->category_id=$item['category_id'];
                    $cat->category_name=$item['category_name'];
                    $cat->country_id=$item['country_id'];
                    $cat->tournament_name=$item['tournament_name'];
                    $cat->tournament_is_summaries=$item['tournament_is_summaries'];
                    if ($cat->validate()){
                        $cat->save();
                    }else{
                        yii::error(['badValidateActionCategory'=>$cat->errors,'id'=>$cat->id]);
                        var_dump($cat->errors);
                    }
                    echo "Updated: ".$cat->id.PHP_EOL;
                }else{
                    $cat= new Eventsnames();
                    $cat->event_id=$item['event_id'];
                    $cat->tournament_id=$item['tournament_id']; //доп поле
                    $cat->event_name=$item['event_name'];
                    $cat->event_dt=$item['event_dt'];
                    $cat->event_status_type=$item['event_status_type'];
                    $cat->category_id=$item['category_id'];
                    $cat->category_name=$item['category_name'];
                    $cat->country_id=$item['country_id'];
                    $cat->tournament_name=$item['tournament_name'];
                    $cat->tournament_is_summaries=$item['tournament_is_summaries'];
                    $cat->status=1;
                    $cat->is_updated=1;
                    $cat->sort=0;
                    if ($cat->validate()){
                        $cat->save();
                    }else{
                        yii::error(['badValidateActionCategory'=>$cat->errors,'id'=>$cat->id]);
                        var_dump($cat->errors);
                    }
                    echo "NEW : ".$cat->id.PHP_EOL;
                }
//                var_dump($item['sport_id']); die();
            }

            // чистка
            $clearCollector=new ClearCollectort($catListForDElete);
            $clearCollector->clearGamesNames();

            //  var_dump($response->data);

        }
        // die();
        // Create a client with a base URI
        echo 'FIN ' . "\n";
        return ExitCode::OK;

    }




    /**
     * 5 (пока что все вместе)
     * ставки на собитие
     * @return int
     */
    public function actionBets()
    {
        $startTime=microtime(true);
        $baseSport=1; // футбол
     //   $baseSport=23; // футбол

        $client = new Client(['baseUrl' =>Yii::$app->params['apiBaseUrl']]);
        $response = $client->get('bets')->send();
        if ($response->isOk) {


            //  var_dump($response->data); die();
//         / $j= json_decode($response->data);
            $countTotal=count($response->data);
            if($countTotal <= 0) {die('empty data'); }


            Yii::$app->db->createCommand("DELETE FROM `bets` WHERE `sport_id` ={$baseSport}")->execute();

       
         //   array_chunk($response->data,10)
            foreach (array_chunk($response->data,10) as $ii => $items_arr) {
               // $cat=  Bets::find()->where(['market_id'=>$item['market_id']])->one();
//                'event_id' => 'event id ',
//            'market_id' => 'market_id  не понятно',
//            'market_name' => 'market_name название для групы например фора тотал ...',
//            'market_order' => 'market_order идентификатор донора возможно',

//            'outcomes' => 'outcomes JSON строка коофициентов',
//            'market_suspend' => 'неясно ',
//            'market_template_id' => 'неясно ',
//            'market_template_view_id' => 'неясно ',
//            'market_template_weigh' => 'неясно ',

//            'result_type_id' => 'неясно ',
//            'result_type_name' => 'имя результата ',
//            'result_type_short_name' => 'имя результата короткое',
//            'result_type_weigh' => 'неясно',

//            'service_id' => 'service_id',
//            'sport_id' => 'sport_id',
//            'status' => '1 активная 0 не активная',
//            'sort' => 'sort 0 1 2 3..',
//            'is_updated' => 'обновлять ли категорию из парсера,следить 1-yes 0-no',

                $toBatch=[];
                foreach ( $items_arr as $item) {
                    if($baseSport==$item['sport_id']){
                        $toBatch[]=[$item['event_id'],$item['market_id'],$item['market_name'],$item['market_order'],$item['outcomes'],
                            $item['market_suspend'],$item['market_template_id'],$item['market_template_view_id'],$item['market_template_weigh'],
                            $item['result_type_id'],$item['result_type_name'],$item['result_type_short_name'],$item['result_type_weigh'],
                            $item['service_id'],$item['sport_id'],1,1,0];
                    }

                 }




                if (!empty($toBatch)){
                    Yii::$app->db->createCommand()->batchInsert('bets',['event_id', 'market_id', 'market_name', 'market_order', 'outcomes',
                        'market_suspend', 'market_template_id', 'market_template_view_id', 'market_template_weigh',
                        'result_type_id', 'result_type_name', 'result_type_short_name', 'result_type_weigh',
                        'service_id', 'sport_id', 'status', 'sort', 'is_updated'],
                        $toBatch
                    )->execute();
                }


               // var_dump($toBatch); die();
//                    $cat= new Bets();
//                    $cat->event_id=$item['event_id'];
//                    $cat->market_id=$item['market_id'];
//                    $cat->market_name=$item['market_name'];
//                    $cat->market_order=$item['market_order'];
//
//                    $cat->outcomes=$item['outcomes'];
//
//                    $cat->market_suspend=$item['market_suspend'];
//                    $cat->market_template_id=$item['market_template_id'];
//                    $cat->market_template_view_id=$item['market_template_view_id'];
//                    $cat->market_template_weigh=$item['market_template_weigh'];
//
//                    $cat->result_type_id=$item['result_type_id'];
//                    $cat->result_type_name=$item['result_type_name'];
//                    $cat->result_type_short_name=$item['result_type_short_name'];
//                    $cat->result_type_weigh=$item['result_type_weigh'];
//
//
//                    $cat->service_id=$item['service_id'];
//                    $cat->sport_id=$item['sport_id'];
//                    $cat->status=1;
//                    $cat->is_updated=1;
//                    $cat->sort=0;
//                    if ($cat->validate()){
//                        $cat->save(false);
//                    }else{
//                        yii::error(['badValidateActionCategory'=>$cat->errors,'id'=>$cat->id]);
//                        var_dump($cat->errors);
//                    }
//                    echo "{$ii} from {$countTotal}  : ".$cat->id.PHP_EOL;
                   $iii=$ii*10;
                    echo "{$iii} from {$countTotal}  : ".PHP_EOL;

//                var_dump($item['sport_id']); die();
            }

            //  var_dump($response->data);

        }
        // die();
        // Create a client with a base URI
        echo 'FIN ' . "\n";
        echo 'Time: '.round(microtime(true) - $startTime, 4).' сек.'.PHP_EOL;
        return ExitCode::OK;

    }



    /**
     * 5 (пока что все вместе)
     * ставки на собитие
     * @return int
     */
    public function actionBetsOld()
    {

        $baseSport=1; // футбол
        $baseSport=23; // футбол


        $client = new Client(['baseUrl' =>Yii::$app->params['apiBaseUrl']]);
        $response = $client->get('bets')->send();
        if ($response->isOk) {


           //  var_dump($response->data); die();
//         / $j= json_decode($response->data);
            $countTotal=count($response->data);
            if($countTotal <= 0) {die('empty data'); }


            Yii::$app->db->createCommand("DELETE FROM `bets` WHERE `sport_id` ={$baseSport}")->execute();
            foreach ($response->data as $ii => $item) {
                if($item['sport_id']!=$baseSport) continue;
                $cat=  Bets::find()->where(['market_id'=>$item['market_id']])->one();
//                'event_id' => 'event id ',
//            'market_id' => 'market_id  не понятно',
//            'market_name' => 'market_name название для групы например фора тотал ...',
//            'market_order' => 'market_order идентификатор донора возможно',

//            'outcomes' => 'outcomes JSON строка коофициентов',
//            'market_suspend' => 'неясно ',
//            'market_template_id' => 'неясно ',
//            'market_template_view_id' => 'неясно ',
//            'market_template_weigh' => 'неясно ',

//            'result_type_id' => 'неясно ',
//            'result_type_name' => 'имя результата ',
//            'result_type_short_name' => 'имя результата короткое',
//            'result_type_weigh' => 'неясно',

//            'service_id' => 'service_id',
//            'sport_id' => 'sport_id',
//            'status' => '1 активная 0 не активная',
//            'sort' => 'sort 0 1 2 3..',
//            'is_updated' => 'обновлять ли категорию из парсера,следить 1-yes 0-no',



                if ($cat and ($cat->is_updated==1) ){// обнова
                    $cat->event_id=$item['event_id'];
                    $cat->market_id=$item['market_id'];
                    $cat->market_name=$item['market_name'];
                    $cat->market_order=$item['market_order'];

                    $cat->outcomes=$item['outcomes'];

                    $cat->market_suspend=$item['market_suspend'];
                    $cat->market_template_id=$item['market_template_id'];
                    $cat->market_template_view_id=$item['market_template_view_id'];
                    $cat->market_template_weigh=$item['market_template_weigh'];

                    $cat->result_type_id=$item['result_type_id'];
                    $cat->result_type_name=$item['result_type_name'];
                    $cat->result_type_short_name=$item['result_type_short_name'];
                    $cat->result_type_weigh=$item['result_type_weigh'];


                    $cat->service_id=$item['service_id'];
                    $cat->sport_id=$item['sport_id'];

                    $cat->status=1;
                    $cat->is_updated=1;
                    $cat->sort=0;



                    if ($cat->validate()){
                        $cat->save(false);
                    }else{
                        yii::error(['badValidateActionCategory'=>$cat->errors,'id'=>$cat->id]);
                        var_dump($cat->errors);
                    }
//                    echo "{$ii} from {$countTotal} Updated: ".$cat->id.PHP_EOL;
                    echo "{$ii} from {$countTotal} Updated: ".PHP_EOL;
                }else{
                    $cat= new Bets();
                    $cat->event_id=$item['event_id'];
                    $cat->market_id=$item['market_id'];
                    $cat->market_name=$item['market_name'];
                    $cat->market_order=$item['market_order'];

                    $cat->outcomes=$item['outcomes'];

                    $cat->market_suspend=$item['market_suspend'];
                    $cat->market_template_id=$item['market_template_id'];
                    $cat->market_template_view_id=$item['market_template_view_id'];
                    $cat->market_template_weigh=$item['market_template_weigh'];

                    $cat->result_type_id=$item['result_type_id'];
                    $cat->result_type_name=$item['result_type_name'];
                    $cat->result_type_short_name=$item['result_type_short_name'];
                    $cat->result_type_weigh=$item['result_type_weigh'];


                    $cat->service_id=$item['service_id'];
                    $cat->sport_id=$item['sport_id'];
                    $cat->status=1;
                    $cat->is_updated=1;
                    $cat->sort=0;
                    if ($cat->validate()){
                        $cat->save(false);
                    }else{
                        yii::error(['badValidateActionCategory'=>$cat->errors,'id'=>$cat->id]);
                        var_dump($cat->errors);
                    }
//                    echo "{$ii} from {$countTotal}  : ".$cat->id.PHP_EOL;
                    echo "{$ii} from {$countTotal}  : ".PHP_EOL;
                }
//                var_dump($item['sport_id']); die();
            }

            //  var_dump($response->data);

        }
        // die();
        // Create a client with a base URI
        echo 'FIN ' . "\n";
        return ExitCode::OK;

    }










    /**
     * 4
     * events по стране->премьер лига  actionEventsnames
     * @return int
     */
    public function actionEventsnamesloop($tournament_id_num = 17336 , $base_click=8856)
    {
        // echo  $sport_id; die();
        // example $payload = {"jsonrpc":"2.0","method":"frontend/event/get","params":{"by":{"lang":"ru","service_id":0,"tournament_id":{"$in":[17296]},"head_markets":true}},"id":8855}
        $method = "frontend/event/get";

        $array = Tournamentsnames::find()->select('tournament_id')->where(['status'=>1])->asArray()->all();
        $this->catList = ArrayHelper::getColumn($array, 'tournament_id');
        $base_click_id = rand(100, 8000); //кликер
        $paramsService_id = 0;
        $paramsLang = "ru";
        foreach ($this->catList as $k => $catSport) {
            //$sport_id=26;// fut
            $tournament_id = intval($catSport);// 17137   UKrainf премьер лига 17336 rus
            $paramsTournament_id = ["\$in" => [$tournament_id]];
            $head_markets = true;
            $params = ["by" => ["lang" => $paramsLang, "service_id" => $paramsService_id, "tournament_id" => $paramsTournament_id, 'head_markets' => $head_markets]];
            $paramsData = ["jsonrpc" => "2.0", "method" => $method, "params" => $params, "id" => $base_click_id];
//      var_dump($paramsData);die();
            $data = $this->parse($this->urlApi, $paramsData);
            if (!empty($data['res']->result)) {
                foreach ($data['res']->result as $item) {
                    // var_dump($item->head_markets[0]); die();
                    $cat = Eventsnames::find()->where(['event_id' => $item->event_id])->one();
                    if ($cat) {
                        $cat->event_id = $item->event_id;
                        $cat->tournament_is_summaries = $item->tournament_is_summaries == true ? 1 : 0;
                        $cat->event_name = $item->event_name;
                        $cat->event_dt = $item->event_dt;
                        $cat->event_status_type = $item->event_status_type;
                        $cat->category_id = $item->category_id;
                        $cat->category_name = $item->category_name;
                        $cat->country_id = $item->country_id;
                        $cat->tournament_name = $item->tournament_name;
                        $cat->status=$cat->status;
                        $cat->updated_at = date("Y-m-d H:i:s");
                        if ($cat->validate()) {
                            $cat->save();
                        } else {
                            yii::error(['badValidateActionEventsnamesloop' => $cat->errors, 'id' => $cat->id]);
                            var_dump($cat->errors);
                        }
                        echo "Updated: " . $cat->id . PHP_EOL;
                    } else {
                        $cat = new Eventsnames();
                        $cat->event_id = $item->event_id;
                        $cat->tournament_is_summaries = $item->tournament_is_summaries == true ? 1 : 0;
                        $cat->event_name = $item->event_name;
                        $cat->event_dt = $item->event_dt;
                        $cat->event_status_type = $item->event_status_type;
                        $cat->category_id = $item->category_id;
                        $cat->category_name = $item->category_name;
                        $cat->country_id = $item->country_id;
                        $cat->tournament_name = $item->tournament_name;
                        $cat->status=1;
                        $cat->created_at = date("Y-m-d H:i:s");
                        $cat->updated_at = date("Y-m-d H:i:s");
                        if ($cat->validate()) {
                            $cat->save();
                        } else {
                            yii::error(['badValidateActionEventsnamesloop' => $cat->errors, 'id' => $cat->id]);
                            var_dump($cat->errors);
                        }
                        echo "NEW : " . $cat->id . PHP_EOL;
                    }


                }

            } else {
                Yii::error(['badResponceActionEventsnamesloop', $data]);
            }

            if ($k%5==0 && $k>0 ){
                $timeSleep=rand(1,3);
                echo "Time sleep: ".$timeSleep.PHP_EOL;
                sleep($timeSleep);
            }
        }
        echo 'FIN ' . "\n";
        return ExitCode::OK;
    }





    /**
     * events сбор коофициентов
     * @return int
     */
    public function actionBetsloops()
    {
        // echo  $sport_id; die();
        // example $payload = {"jsonrpc":"2.0","method":"frontend/market/get","params":{"by":{"lang":"ru","service_id":0,"event_id":15100223}},"id":8100}
        $method = "frontend/market/get";
        $array = Eventsnames::find()->select('event_id')->where(['status' => 1])->asArray()->all();
        $this->catList = ArrayHelper::getColumn($array, 'event_id');
        $base_click_id = rand(1000, 8000); //кликер
        $paramsService_id = 0;
        $paramsLang = "ru";
        foreach ($this->catList as $k => $event_idNum) {
            $tournament_id = intval($event_idNum);// 15100223  Карпаты Львов - Черноморец Одесса
            // $paramsTournament_id=["\$in"=>[$tournament_id]];
            $event_id = $tournament_id;
            $params = ["by" => ["lang" => $paramsLang, "service_id" => $paramsService_id, "event_id" => $event_id]];
            $paramsData = ["jsonrpc" => "2.0", "method" => $method, "params" => $params, "id" => $base_click_id];
//      var_dump($paramsData);die();
            $data = $this->parse($this->urlApi, $paramsData);
            if (!empty($data['res']->result)) {
                foreach ($data['res']->result as $item) {
                    //  var_dump($item); die();
                    $cat = Bets::find()->where(['market_id' => $item->market_id])->one();
                    if ($cat) {
                        $cat->event_id = $item->event_id;
                        $cat->market_suspend = $item->market_suspend == true ? 1 : 0;
                        $cat->market_id = $item->market_id;
                        $cat->market_name = $item->market_name;
                        $cat->market_order = $item->market_order;

                        //JSON prepare
                        $cat->outcomes = json_encode($item->outcomes);

                        $cat->market_template_id = $item->market_template_id;
                        $cat->market_template_view_id = $item->market_template_view_id;
                        $cat->market_template_weigh = $item->market_template_weigh;
                        $cat->result_type_id = $item->result_type_id;
                        $cat->result_type_name = $item->result_type_name;
                        $cat->result_type_short_name = $item->result_type_short_name;
                        $cat->result_type_weigh = $item->result_type_weigh;
                        $cat->service_id = $item->service_id;
                        $cat->sport_id = $item->sport_id;
                        $cat->status = $cat->status;
                        $cat->updated_at = date("Y-m-d H:i:s");

                        if ($cat->validate()) {
                            $cat->save();
                        } else {
                            yii::error(['badValidateActionBetsloops' => $cat->errors, 'id' => $cat->id]);
                            var_dump($cat->errors);
                        }
                        echo "Updated: " . $cat->id . PHP_EOL;
                    } else {
                        $cat = new Bets();
                        $cat->event_id = $item->event_id;
                        $cat->market_suspend = $item->market_suspend == true ? 1 : 0;
                        $cat->market_id = $item->market_id;
                        $cat->market_name = $item->market_name;
                        $cat->market_order = $item->market_order;

                        //JSON prepare
                        $cat->outcomes = json_encode($item->outcomes);

                        $cat->market_template_id = $item->market_template_id;
                        $cat->market_template_view_id = $item->market_template_view_id;
                        $cat->market_template_weigh = $item->market_template_weigh;
                        $cat->result_type_id = $item->result_type_id;
                        $cat->result_type_name = $item->result_type_name;
                        $cat->result_type_short_name = $item->result_type_short_name;
                        $cat->result_type_weigh = $item->result_type_weigh;
                        $cat->service_id = $item->service_id;
                        $cat->sport_id = $item->sport_id;
                        $cat->status = 1;
                        $cat->created_at = date("Y-m-d H:i:s");
                        $cat->updated_at = date("Y-m-d H:i:s");
                        if ($cat->validate()) {
                            $cat->save();
                        } else {
                            yii::error(['badValidateActionBetsloops' => $cat->errors, 'id' => $cat->id]);
                            var_dump($cat->errors);
                        }
                        echo "NEW : " . $cat->id . PHP_EOL;
                    }


                }
            }else{
        Yii::error(['badResponceActionBetsloops', $data]);
    }

            if ($k%10==0 && $k>0 ){
                $timeSleep=rand(1,3);
                echo "Time sleep: ".$timeSleep.PHP_EOL;
                sleep($timeSleep);
            }

    }

        echo 'FIN ' . "\n";
        return ExitCode::OK;
    }



    /**
     * events сбор коофициентов
     * @return int
     */
    public function actionBets2($event_id_num = 15100223 , $base_click=8856)
    {
        // echo  $sport_id; die();
        // example $payload = {"jsonrpc":"2.0","method":"frontend/market/get","params":{"by":{"lang":"ru","service_id":0,"event_id":15100223}},"id":8100}
        $method="frontend/market/get";
        $base_click_id=intval($base_click);
        $paramsService_id=0; $paramsLang="ru";
        //$sport_id=26;// fut
        $tournament_id=intval($event_id_num);// 15100223  Карпаты Львов - Черноморец Одесса
       // $paramsTournament_id=["\$in"=>[$tournament_id]];
        $event_id=$tournament_id;
        $head_markets=true;
        $params=["by"=>["lang"=>$paramsLang,"service_id"=>$paramsService_id,"event_id"=>$event_id]];
        $paramsData=["jsonrpc"=>"2.0","method"=>$method,"params"=>$params,"id"=>$base_click_id ];
//      var_dump($paramsData);die();
        $data= $this->parse($this->urlApi,$paramsData);
        if (!empty($data['res']->result)){
            foreach ($data['res']->result as $item) {
              //  var_dump($item); die();
                $cat=Bets::find()->where(['market_id'=>$item->market_id])->one();
                if ($cat){
                    $cat->event_id=$item->event_id;
                    $cat->market_suspend=$item->market_suspend==true?1:0;
                    $cat->market_id=$item->market_id;
                    $cat->market_name=$item->market_name;
                    $cat->market_order=$item->market_order;

                    //JSON prepare
                    $cat->outcomes= json_encode($item->outcomes);

                    $cat->market_template_id=$item->market_template_id;
                    $cat->market_template_view_id=$item->market_template_view_id;
                    $cat->market_template_weigh=$item->market_template_weigh;
                    $cat->result_type_id=$item->result_type_id;
                    $cat->result_type_name=$item->result_type_name;
                    $cat->result_type_short_name=$item->result_type_short_name;
                    $cat->result_type_weigh=$item->result_type_weigh;
                    $cat->service_id=$item->service_id;
                    $cat->sport_id=$item->sport_id;
                    $cat->status=$cat->status;
                    $cat->updated_at=date("Y-m-d H:i:s");

                    if ($cat->validate()){
                        $cat->save();
                    }else{
                        yii::error(['badValidateActionCategory'=>$cat->errors,'id'=>$cat->id]);
                        var_dump($cat->errors);
                    }
                    echo "Updated: ".$cat->id.PHP_EOL;
                }else{
                    $cat= new Bets();
                    $cat->event_id=$item->event_id;
                    $cat->market_suspend=$item->market_suspend==true?1:0;
                    $cat->market_id=$item->market_id;
                    $cat->market_name=$item->market_name;
                    $cat->market_order=$item->market_order;

                    //JSON prepare
                    $cat->outcomes= json_encode($item->outcomes);

                    $cat->market_template_id=$item->market_template_id;
                    $cat->market_template_view_id=$item->market_template_view_id;
                    $cat->market_template_weigh=$item->market_template_weigh;
                    $cat->result_type_id=$item->result_type_id;
                    $cat->result_type_name=$item->result_type_name;
                    $cat->result_type_short_name=$item->result_type_short_name;
                    $cat->result_type_weigh=$item->result_type_weigh;
                    $cat->service_id=$item->service_id;
                    $cat->sport_id=$item->sport_id;
                    $cat->status=1;
                    $cat->created_at=date("Y-m-d H:i:s");
                    $cat->updated_at=date("Y-m-d H:i:s");
                    if ($cat->validate()){
                        $cat->save();
                    }else{
                        yii::error(['badValidateActionEventsnames'=>$cat->errors,'id'=>$cat->id]);
                        var_dump($cat->errors);
                    }
                    echo "NEW : ".$cat->id.PHP_EOL;
                }


            }

        }else{
            Yii::error(['badResponceActionEventsnames',$data]);
        }

        echo 'FIN ' . "\n";
        return ExitCode::OK;
    }






    /**
     * рабочая лощадка  $payload = '{"jsonrpc":"2.0","method":"frontend/category/get","params":{"by":{"service_id":0,"lang":"ru","sport_id":{"$in":[1]}}},"id":"10"}';
     * @param $url
     * @param array $data
     * @param bool $return_headers
     * @param array $send_headers
     * @return array|mixed
     */
   private function parse($url, $data=array(), $return_headers=false, $send_headers=array())
    {
        $payload = json_encode($data);

        $curl = curl_init();
        $send_headers[] = 'Content-Type:application/json';

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $send_headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 300);

        if($return_headers)
        {
            curl_setopt($curl,CURLOPT_HEADER,true);
        }

        $out = curl_exec($curl);

      // var_dump($out);
        if($out)
        {
            $info = curl_getinfo($curl);

            $return = array();
            $return['res']=json_decode($out);
            $return['h'] = substr($out, 0, $info['header_size']);
            $return['b'] = json_decode(substr($out, $info['header_size']), true);
            $return['i'] = $info;

            curl_close($curl);
            return $return;
        }
        else
        {
            curl_close($curl);
            return json_decode($out);
            return json_decode($out, true);
        }
    }



    /**
     * @param int $sport_id_num  ид спорта
     * @param int $base_click    начало кликер ид наверно для защиты
     * @return int
     */
    public function actionCategory($sport_id_num = 1 , $base_click=1)
    {
        // echo  $sport_id; die();
        // example $payload = '{"jsonrpc":"2.0","method":"frontend/category/get","params":{"by":{"service_id":0,"lang":"ru","sport_id":{"$in":[1]}}},"id":"10"}';
        $method="frontend/category/get";
        $base_click_id=intval($base_click);
        $paramsService_id=0; $paramsLang="ru";
        //$sport_id=26;// fut
        $sport_id=intval($sport_id_num);// fut
        $paramsSport_id=["\$in"=>[$sport_id]];
        $params=["by"=>["service_id"=>$paramsService_id,"lang"=>$paramsLang,"sport_id"=>$paramsSport_id]];
        $paramsData=["jsonrpc"=>"2.0","method"=>$method,"params"=>$params,"id"=>$base_click_id ];
//      / var_dump($paramsData);
//       die();
        $data= $this->parse($this->urlApi,$paramsData);
        if (!empty($data['res']->result)){

            var_dump($data['res']->result);
            foreach ($data['res']->result as $item) {
                $cat=Sportcategory::find()->where(['category_id'=>$item->category_id,'sport_id'=>$item->sport_id])->one();
                if ($cat){
                    $cat->category_id=$item->category_id;
                    $cat->category_is_summaries=$item->category_is_summaries==true?1:0;
                    $cat->category_name=$item->category_name;
                    $cat->sport_id=$item->sport_id;
                    $cat->status=$cat->status;
                    $cat->updated_at=date("Y-m-d H:i:s");
                    if ($cat->validate()){
                        $cat->save();
                    }else{
                        yii::error(['badValidateActionCategory'=>$cat->errors,'id'=>$cat->id]);
                        var_dump($cat->errors);
                    }
                    echo "Updated: ".$cat->id.PHP_EOL;
                }else{
                    $cat= new Sportcategory();
                    $cat->category_id=$item->category_id;
                    $cat->category_is_summaries= $item->category_is_summaries==true?1:0;
                    $cat->category_name=$item->category_name;
                    $cat->sport_id=$item->sport_id;
                    $cat->status=1;
                    $cat->created_at=date("Y-m-d H:i:s");
                    $cat->updated_at=date("Y-m-d H:i:s");
                    if ($cat->validate()){
                        $cat->save();
                    }else{
                        yii::error(['badValidateActionCategory'=>$cat->errors,'id'=>$cat->id]);
                        var_dump($cat->errors);
                    }
                    echo "NEW : ".$cat->id.PHP_EOL;
                }


            }

        }else{
            Yii::error(['badResponceActionCategoryResult',$data]);
        }

        echo 'FIN ' . "\n";
        return ExitCode::OK;
    }



    private function parseResponce($data){

    }


    /**
     *      пересчет из оуткомес json    1 запускать
     */
    public function actionRecalculateOutcomes()
    {
        $count=Bets::find()->count();
//        $count=100;
        // получить одновременно десять покупателей и перебрать их одного за другим

        /**@var  \common\models\Bets $item **/
        foreach (Bets::find()->each(50) as $k => $item) {
            $total_sum_events =   count( json_decode($item->outcomes, true));
            $item->count_outcomes=$total_sum_events;
            $item->market_suspend='0';
            if($item->validate()){
                echo '+ '.$k." from ".$count ." {$total_sum_events} ". $item->market_name  .PHP_EOL;
                $item->save();
            }else{
                print_r( $item->errors);
                echo PHP_EOL;
                die();
            }
//            if ($item->update() !== false) {
//                echo '+ '.$k." from ".$count ." {$total_sum_events} ". $item->market_name  .PHP_EOL;
//            } else {
//                echo '- '.$k." from ".$count ." {$total_sum_events} ". $item->market_name  .PHP_EOL;// update failed
//            }
        }
        echo 'oki'.PHP_EOL;
    }


    /**
     *      сумирование  из оуткомес json    2  запускать
     */
    public function actionRecalculateOutcomesSum()
    {


        /**@var \common\models\Eventsnames $item **/
        $count=Eventsnames::find()->count();
        foreach (Eventsnames::find()->each(50) as $k => $item) {

            $item->total_count_outcomes= $item->countoutcomes;;
            $item->tournament_is_summaries='1';
                if($item->validate()){
                echo '+ '.$k." from ".$count . $item->event_name  .PHP_EOL;
                $item->save();
            }else{
                print_r( $item->errors);
                echo PHP_EOL;
                die();
            }
        }

//        /**@var  \common\models\Bets $item **/
//        foreach (Bets::find()->each(50) as $k => $item) {
//            $total_sum_events =   count( json_decode($item->outcomes, true));
//            $item->count_outcomes=$total_sum_events;
//            $item->market_suspend='0';
//            if($item->validate()){
//                echo '+ '.$k." from ".$count ." {$total_sum_events} ". $item->market_name  .PHP_EOL;
//                $item->save();
//            }else{
//                print_r( $item->errors);
//                echo PHP_EOL;
//                die();
//            }
////            if ($item->update() !== false) {
////                echo '+ '.$k." from ".$count ." {$total_sum_events} ". $item->market_name  .PHP_EOL;
////            } else {
////                echo '- '.$k." from ".$count ." {$total_sum_events} ". $item->market_name  .PHP_EOL;// update failed
////            }
//        }
        echo 'oki'.PHP_EOL;
    }
}
