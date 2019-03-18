<?php

namespace backend\controllers;

use common\models\overiden\User;
use Yii;
use common\models\Lastweekwinners;
use common\models\search\LastweekwinnerSearch;
use yii\base\DynamicModel;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LastweekwinnerController implements the CRUD actions for Lastweekwinners model.
 */
class LastweekwinnerController extends Controller
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

    /**
     * Lists all Lastweekwinners models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LastweekwinnerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Lastweekwinners model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Lastweekwinners model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Lastweekwinners();
        $username='';
        $dmodel = new DynamicModel(compact('username'));
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
            return $this->redirect(['view', 'id' => $model->id]);
        }
        if(empty($model->sort)) $model->sort=0;
        return $this->render('create', [
            'model' => $model,
            'dmodel' => $dmodel,
        ]);
    }

    /**
     * Updates an existing Lastweekwinners model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
      $u=  User::find()->where(['id'=>$model->uid])->one();
      $username='';
      if($u)$username=$u->username;


       $dmodel = new DynamicModel(compact('username'));
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
            return $this->redirect(['view', 'id' => $model->id]);

        }

        return $this->render('update', [
            'model' => $model,
            'dmodel' => $dmodel,
        ]);
    }

    /**
     * Deletes an existing Lastweekwinners model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Lastweekwinners model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Lastweekwinners the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Lastweekwinners::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
