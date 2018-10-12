<?php
namespace frontend\controllers;

use common\models\Ai;
use common\models\DynamicModelemptyname;
use frontend\models\Filter;
use komer45\balance\models\Score;
use Yii;
use common\models\RoomRecord;
use frontend\models\RoomRecordSearch;
use common\models\SearchroomModel;


use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;




use frontend\assets\PoiskAsset;
use  yii\helpers\Url ;

use common\models\PartnerRecord;

use yii\data\Pagination;
use yii\data\ActiveDataProvider;


use common\models\Demorooms;
use common\models\DemoroomsSearch;

use common\models\RegionRecord;
use common\models\AreaRecord;
use common\models\LocalityRecord;
use common\models\DistrictCityRecord;

 use yii\helpers\ArrayHelper;
 use yii\base\DynamicModel;
 use common\models\JkRecord;
use yii\web\Response;



// пока что только для формы ставоk
class RestController extends \yii\web\Controller
{


//    public function behaviors()
//    {
//        return [
//            [
//                'class' => 'yii\filters\PageCache',
//                'only' => ['index'],
//                'variations'=>[Yii::$app->request->post('filter')],
//                'duration' => YII_ENV=='prod'? 3600:30,
//                     'dependency' => [
//                    'class' => 'yii\caching\DbDependency',
//                    'sql' => 'SELECT COUNT(*) FROM demorooms',
//                ],
//
//            ],
//        ];
//    }



   /**
     * Lists all Demorooms models.
     * @return mixed
     */
    public function actionIndex()
    {
        $ai=new Ai('Rest');
//        Yii::error( $ai->objects);
        return  ['ai'=>$ai->objects];
    }


    /**
     * Lists all Demorooms models.
     * @return mixed
     */
    public function actionFilter()
    {
        $filter=new Filter();
        $res= $filter->getFilter();
        return ['ai'=>$res];


    }
    public function actionGrid()
    {
        $filter=new Filter();
        $res= $filter->getFilter();
        return $res;
    }


    /**
     * добавить ставку
     * @return array|void
     */
    public function actionAdd()
    {

        $ai=new Ai();
        // если возможно добавить
        if (Yii::$app->user->isGuest ){return ['error'=>'is not login'];}
        // to do  проверка на роль

        $res= $ai->addBet();
        return $res;
    }


    public function actionSearch()
    {
        return  ['resp'=>"Hi i'm live"];
    }








    public function actionReupdatelike()
    {
        $ai=new Ai('Rest');
//        Yii::error( $ai->objects);
        return  ['ai'=>$ai->objects];
    }






    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;    // пока что нету нужды отключать
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return parent::beforeAction($action);
    }
  





}
