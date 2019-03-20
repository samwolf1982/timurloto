<?php

namespace app\modules\parsernode\controllers;

use common\models\Centerturnire;
use common\models\ParserNodeDos;
use Yii;
use yii\web\Controller;
use yii\web\Response;

/**
 * Default controller for the `parsernode` module
 */
class DefaultController extends Controller
{

    private  $cacheLive=10;
    /**
     * step 1
     * @return array
     */
    public function actionSports()
    {
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
        $data2=[];
//        $listSportId=[12341,12348];
        foreach (Centerturnire::find()->select(['sportid'])->where(['status'=>0])->orderBy(['sort'=>SORT_ASC])->all() as $tourneyM) {
            $key="actionPopularsports_{$tourneyM->sportid}";
            $data = $cache->get($key);
            if ($data === false) {
                $dos=new ParserNodeDos();
                $data= $dos->getTabsTourneyGames($tourneyM->sportid);

                if(!empty($data)) $cache->set($key, $data,$this->cacheLive);


            }
            if(!empty($data)){
                $data2[]=$data;
            }

        }


        return  [ 'meta'=>['type'=>'popularsports'], 'data'=>$data2];

    }



    /**
     * step 4  http://localhost35/provider/events?gameId=231729215
     */
    public function actionEvents($gameId=0)
    {
        if(!empty($_POST['id'])) $gameId=$_POST['id'];
        $dos=new ParserNodeDos();
        $data= $dos->getEventsByGameId($gameId);
        return  [ 'meta'=>['type'=>'event','count'=>count($data['data']),'id'=>$gameId,'attr'=> $data['attr']] ,'data'=>$data['data']];

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
