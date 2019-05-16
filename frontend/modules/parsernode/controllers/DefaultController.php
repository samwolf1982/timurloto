<?php

namespace app\modules\parsernode\controllers;

use common\models\Centerturnire;
use common\models\Ofseroperiodo;
use common\models\ParserNodeDos;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\Response;

/**
 * Default controller for the `parsernode` module
 */
class DefaultController extends Controller
{

    private  $cacheLive=240;
    /**
     * step 1
     * @return array
     */
    public function actionSports()
    {

        if(YII_ENV !='prod') $this->cacheLive=10;
        $key='actionSports';
        $cache=\Yii::$app->cache;
        $data = $cache->get($key);
        if ($data === false) {
            $dos=new ParserNodeDos();
            $data = $dos->getSportType();
            $cache->set($key, $data,$this->cacheLive);
        }
        return  [ 'meta'=>['type'=>'sports'] ,'data'=>$data];
    }

    /**
     * step 2  http://localhost35/provider/tourney?tourneyId=12341
     * @return array
     */
    public function actionTourney($tourneyId=0)
    {
        if(YII_ENV !='prod') $this->cacheLive=10;
//        Yii::error(['show env'=>YII_ENV]);
        if(!empty($_POST['id'])) $tourneyId=$_POST['id'];
        $key="actionTourney_{$tourneyId}";
        $cache=\Yii::$app->cache;
        $data = $cache->get($key);
        if ($data === false) {
            $dos=new ParserNodeDos();
            $data = $dos->getTourney($tourneyId);
            $cache->set($key, $data,$this->cacheLive);
        }
        return  [ 'meta'=>['type'=>'tourney'] ,'data'=>$data];
        //---------
    }




    /**
     *
     * step 3  http://localhost35/provider/tourneygame?tourneyId=131927
     * @return array
     */
    public function actionTourneygame($tourneyId=0)
    {
        if(!empty($_POST['id'])) $tourneyId=$_POST['id'];
        $key="actionTourneygame_{$tourneyId}";
        if(YII_ENV !='prod') $this->cacheLive=10;
        $cache=\Yii::$app->cache;
     //   $cache->flush();
        $data = $cache->get($key);
        if ($data === false) {
            $dos=new ParserNodeDos();
            $data= $dos->getTourneyGames($tourneyId);
            $cache->set($key, $data,$this->cacheLive);
        }
        return  [ 'meta'=>['type'=>'games'] ,'data'=>$data];
    }


    /**
     * popular game center front даные из админки  http://admin.localhost35/populartoday/index
     * step 5   http://localhost35/provider/tourneygame?tourneyId=131927
     * @return array
     */
    public function actionPopularsports($tourneyId=0)
    {
        $cache=\Yii::$app->cache;
        if(YII_ENV !='prod') $this->cacheLive=10;
        if(YII_ENV !='prod') $this->cacheLive=100000; // todo delete here
       // $cache->flush();
       // Yii::error(['show env'=>YII_ENV]);
        $data2=[];
//        $listSportId=[12341,12348];
        foreach (Centerturnire::find()->select(['sportid'])->where(['status'=>0])->orderBy(['sort'=>SORT_ASC])->all() as $kii=> $tourneyM) {
            //$start = microtime(true);
           //Yii::error(["start_{.$kii}"=>$start]);
            $key="actionPopularsports_{$tourneyM->sportid}";
            $data = $cache->get($key);
            if ($data === false) {
                $dos=new ParserNodeDos();
                $data= $dos->getTabsTourneyGames($tourneyM->sportid);
              //  Yii::error($data);
                if(!empty($data)) $cache->set($key, $data,$this->cacheLive);

            }
            if(!empty($data)){
                $data2[]=$data;
            }
           // Yii::error(["end_{.$kii}"=>round(microtime(true) - $start, 4).' сек.']);

        }


        return  [ 'meta'=>['type'=>'popularsports'], 'data'=>$data2];

    }

    /**
     * popular game center front даные из админки  http://admin.localhost35/populartoday/index
     * step 5   http://localhost35/provider/tourneygame?tourneyId=131927
     * @return array
     */
    public function actionPopularsportsupdate($tourneyId=0)
    {


        $cache=\Yii::$app->cache;
        $key_is_live_site= "is_live_site_30_min";
        $is_live_site = $cache->get($key_is_live_site);

        if($is_live_site){
            if(YII_ENV !='prod') $this->cacheLive=10;
            if(YII_ENV !='prod') $this->cacheLive=100000; // todo delete here
            // $cache->flush();
            // Yii::error(['show env'=>YII_ENV]);
            $data2=[];
//        $listSportId=[12341,12348];
            foreach (Centerturnire::find()->select(['sportid'])->where(['status'=>0])->orderBy(['sort'=>SORT_ASC])->all() as $kii=> $tourneyM) {
                //$start = microtime(true);
                //Yii::error(["start_{.$kii}"=>$start]);
                $key="actionPopularsports_{$tourneyM->sportid}";
                $data = $cache->get($key);
                if ($data === false) {
                    $dos=new ParserNodeDos();
                    $data= $dos->getTabsTourneyGames($tourneyM->sportid);
                    //  Yii::error($data);
                    if(!empty($data)) $cache->set($key, $data,$this->cacheLive);

                }
                if(!empty($data)){
                    $data2[]=$data;
                }
                // Yii::error(["end_{.$kii}"=>round(microtime(true) - $start, 4).' сек.']);

            }


            return  [ 'meta'=>['type'=>'popularsportsupdatecron'], 'data'=>$data2];
        }else{
            return  [ 'meta'=>['type'=>'popularsportsupdatecron'], 'data'=>['no user online']];
        }


    }



    /**
     * step 4  http://localhost35/provider/events?gameId=231729215
     */
    public function actionEvents($gameId=0)
    {
        if (!empty($_POST['id'])) $gameId = $_POST['id'];
        $dos = new ParserNodeDos();
        $data = $dos->getEventsByGameId($gameId);
        $addGames = $dos->getAdditionalGames();
        return ['addGames' => $addGames, 'meta' => ['type' => 'event', 'count' => count($data['data']), 'id' => $gameId, 'attr' => $data['attr']], 'data' => $data['data']];

    }



    /**
     *
     * step Update tabs  http://localhost35/provider/tourneygame?tourneyId=131927  (даные возможно уже кешырованые)
     * @return array
     */
    public function actionUpdatetabstourneygame($tourneyId=0)
    {
        if(!empty($_POST['id'])) $tourneyId=$_POST['id']; else $tourneyId=131927;
        $key="actionUpdatetabstourneygame_{$tourneyId}";
        $cache=\Yii::$app->cache;
           $cache->flush();
        $data = $cache->get($key);
        if ($data === false) {
            $dos=new ParserNodeDos();
            $data= $dos->getTabsTourneyGames($tourneyId);
            $cache->set($key, $data,$this->cacheLive);
        }
        return  [ 'meta'=>['type'=>'gamesTab'] ,'data'=>$data];
    }







    public function actionIndex()
    {
        return ['data'=>'be happy'];exit();
    }
    public function beforeAction($action)
    {

        \Yii::$app->response->format = Response::FORMAT_JSON;
        return parent::beforeAction($action);
    }
}
