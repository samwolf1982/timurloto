<?php

namespace backend\controllers;


use app\models\managers\StatusManager;
use backend\models\managers\StatisticsManager;
use Yii;
use common\models\Wagerelements;
use app\models\WagerelementsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii2mod\editable\EditableAction;

/**
 * WagerelementsController implements the CRUD actions for Wagerelements model.
 */
class WagerelementsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }


    public function actions()
    {
        return [
            'change-status' => [
                'class' => EditableAction::className(),
                'modelClass' => Wagerelements::className(),
                'preProcess' => function($model){
                    $statusManager=new StatusManager($model,Yii::$app->request->post('value'));
                    $statusManager->recalculateStatus();
                },
            ],
        ];
    }


    /**
     * Lists all Wagerelements models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WagerelementsSearch();
        $dataProvider = $searchModel->searchGroup(Yii::$app->request->queryParams);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }



    /**
     * Finds the Wagerelements model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Wagerelements the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Wagerelements::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    /**
     * подтверждение ставок
     * проход по всем где статус CLOSE и на их основе заполнение пользователям балов и запись в статистику.
     * @return \yii\web\Response
     */
    public function actionConfirm()
    {

          $statisticManager= new  StatisticsManager();
           $statisticManager->calculateStatistics();
//        calculateStatistics
//          yii::error($statisticManager->getWagers());


        \Yii::$app->getSession()->setFlash('success',sprintf('%s пользователей получило %s балов, c %s пользователей снято -%s балов  ',2,340,4,650));
        return $this->redirect(['index']);
    }

    //------------------ delete bottom



//    /**
//     * Displays a single Wagerelements model.
//     * @param integer $id
//     * @return mixed
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    public function actionView($id)
//    {
//        return $this->render('view', [
//            'model' => $this->findModel($id),
//        ]);
//    }
//
//    /**
//     * Creates a new Wagerelements model.
//     * If creation is successful, the browser will be redirected to the 'view' page.
//     * @return mixed
//     */
//    public function actionCreate()
//    {
//        $model = new Wagerelements();
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
//
//        return $this->render('create', [
//            'model' => $model,
//        ]);
//    }
//
//    /**
//     * Updates an existing Wagerelements model.
//     * If update is successful, the browser will be redirected to the 'view' page.
//     * @param integer $id
//     * @return mixed
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    public function actionUpdate($id)
//    {
//        $model = $this->findModel($id);
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
//
//        return $this->render('update', [
//            'model' => $model,
//        ]);
//    }
//
//    /**
//     * Deletes an existing Wagerelements model.
//     * If deletion is successful, the browser will be redirected to the 'index' page.
//     * @param integer $id
//     * @return mixed
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    public function actionDelete($id)
//    {
//        $this->findModel($id)->delete();
//
//        return $this->redirect(['index']);
//    }
//

}
