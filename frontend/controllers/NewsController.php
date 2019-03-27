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
use snapget\news\models\News;
use snapget\news\models\NewsCategory;
use snapget\news\models\NewsSearch;
use Yii;
use yii\base\DynamicModel;
use yii\base\InvalidParamException;
use yii\data\ArrayDataProvider;
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
    public function actionIndex()
    {
        $treeQueryFlevel = NewsCategory::getTreeQuery()->roots()->all(); // первый уровень
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams); //todo пару последних новостей
//        foreach ($dataProvider->models as $item) {
//            yii::error([$item]);
//        }


        return $this->render('index',['treeQueryFlevel'=>$treeQueryFlevel,'dataProvider'=>$dataProvider]);

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
