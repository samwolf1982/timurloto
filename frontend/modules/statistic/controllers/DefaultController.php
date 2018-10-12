<?php

namespace app\modules\statistic\controllers;

use app\modules\statistic\models\PlaylistManager;
use common\models\Playlist;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;

/**
 * Default controller for the `statistic` module
 */
class DefaultController extends Controller
{
    private  $actionJsonList=['add','playlistbet'];

    public function behaviors()
    {
        // index  -- all user
        // add   -- auth
        // todo if(view id is current user)  redirect
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'add','playlistbet'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['?','@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['add','playlistbet'],
                        'roles' => ['@'],
                        'verbs' => ['POST']
                    ],
                ],
            ],
        ];
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAdd()
    {
        if(PlaylistManager::preValidate(Yii::$app->user->identity->getId(),Yii::$app->request->post('newName'))){
            $result=  PlaylistManager::addElement( Yii::$app->user->identity->getId(),Yii::$app->request->post('newName'));
        }else{
            $result=['status'=>'errors', 'error'=>'not validate'];
        }
       return  $result;
    }





    public function actionPlaylistbet()
    {


    $playlistId= Yii::$app->request->post('id_playlist');

//        if(PlaylistManager::preValidate(Yii::$app->user->identity->getId(),Yii::$app->request->post('newName'))){
//            $result=  PlaylistManager::addElement( Yii::$app->user->identity->getId(),Yii::$app->request->post('newName'));
//        }else{
//            $result=['status'=>'errors', 'error'=>'not validate'];
//        }


        $result=['status'=>'errors', 'error'=>'not validate','idp'=>$playlistId];
        return  $result;
    }


    public function beforeAction($action)
    {
        if(in_array($action->id,$this->actionJsonList))  Yii::$app->response->format = Response::FORMAT_JSON;
        return parent::beforeAction($action);
    }


}
