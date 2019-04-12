<?php
namespace frontend\controllers;

use app\models\Game;
use app\models\Turnire;
use app\models\Turnirename;
use app\models\Typegame;
use app\models\Typegamename;
use app\modules\statistic\models\WagerStatisticManager;
use common\models\DTO\betreport\TopOneHandred;
use common\models\helpers\ConstantsHelper;
use common\models\helpers\HtmlGenerator;
use common\models\search\BalancestatisticsSearch;
use common\models\search\BalancestatisticsSearchTop;
use dektrium\user\filters\AccessRule;
//use dvizh\cart\Cart;
use dvizh\cart\Cart;
use komer45\balance\models\Score;
//use snapget\news\models\News;
//use snapget\news\models\NewsCategory;
//use snapget\news\models\NewsSearch;
use snapget\news\models\News;
use snapget\news\models\NewsCategory;
use snapget\news\models\NewsSearch;
use stdClass;
use Yii;
use yii\base\DynamicModel;
use yii\base\InvalidParamException;
use yii\data\ArrayDataProvider;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
//use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\web\NotFoundHttpException;


/**
 * Site controller
 */
class NewsController extends Controller
{



    /**
     * index page видит только пользователь своя
     * @return mixed
     */
    public function actionIndex($id=null)
    {
        if(empty($id)){
            $current_cat =  new stdClass; // Instantiate stdClass object
            $current_cat->name= 'Последние новости'; // Instantiate stdClass object
            $current_cat->h1= false; // Instantiate stdClass object
            $current_cat->meta_desc= false; // Instantiate stdClass object
            $current_cat->meta_key= false; // Instantiate stdClass object

            $treeQueryFlevel = NewsCategory::getTreeQuery()->roots()->all(); // первый уровень
            $searchModel = new NewsSearch();
            $dataProviderQuery = $searchModel->searchQuery(Yii::$app->request->queryParams); //todo пару последних новостей
            // делаем копию выборки
            $countQuery = clone $dataProviderQuery;
            $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 2,]);
            $pages->pageSizeParam = false;
            $dataProvider = $dataProviderQuery->offset($pages->offset)->limit($pages->limit)->all();
            return $this->render('index',['treeQueryFlevel'=>$treeQueryFlevel,'pages'=>$pages,'current_cat'=>$current_cat,'dataProvider'=>$dataProvider]);
        }
        $current_cat = NewsCategory::find()->where(['id'=>$id])->one();
        $treeQueryFlevel=  $current_cat->children()->all();
        if(empty($treeQueryFlevel))     $treeQueryFlevel = NewsCategory::getTreeQuery()->roots()->all(); // первый уровень
        $searchModel = new NewsSearch();
        $dataProviderQuery = $searchModel->searchQuery(Yii::$app->request->queryParams,$id); //todo пару последних новостей
        // делаем копию выборки
        $countQuery = clone $dataProviderQuery;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 2,]);
        $pages->pageSizeParam = false;
        $dataProvider = $dataProviderQuery->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('index',['treeQueryFlevel'=>$treeQueryFlevel,'pages'=>$pages,'current_cat'=>$current_cat,'dataProvider'=>$dataProvider]);


    }


    public function actionView($id)
    {
        $treeQueryFlevel = NewsCategory::getTreeQuery()->roots()->all(); // первый уровень
        return $this->render('view', [
            'model' => $this->findModel($id),
            'treeQueryFlevel'=>$treeQueryFlevel,
        ]);
    }
    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    
    
}
