<?php

namespace app\modules\wager\controllers;

use app\modules\wager\models\WagerManager;
use common\models\DTO\WagerInfo;
use common\models\Playlist;
use common\models\services\UserInfo;
use common\models\Wager;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;

/**
 * Default controller for the `wager` module
 */
class DefaultController extends Controller
{

    private  $actionJsonList=['add'];

    public function behaviors()
    {
        // index  -- all user
        // add   -- auth
        // todo if(view id is current user)  redirect
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'add'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['?','@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['add'],
                        'roles' => ['@'],
                        'verbs' => ['POST']
                    ],
                ],
            ],
        ];
    }
    /**
     *
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {



        return $this->render('index');
    }



    public function actionAdd()
    {
        // todo переделать под новый запросы
        $result=[];
        if(WagerManager::preValidate(Yii::$app->cart,Yii::$app->user->identity->getId())){
            $tdo_Wager_user_info=new WagerInfo(Yii::$app->user->identity->getId(),Yii::$app->request->post('playlist'),Yii::$app->request->post('comment'),10,12);
            $vagerManager=new WagerManager(Yii::$app->cart,$tdo_Wager_user_info);
            $vagerManager->add();
        }else{
            $result=['status'=>'not prevalidate'];
        }
       return $result;
    }

    public function actionViewdetail($id)
    {
        $model=Wager::find()->where(['id'=>$id])->one();
        $userInfo= new UserInfo(Yii::$app->user->identity->getId());
//        $type_play
//        yii::error([$id,$model]);
        if($model){
            return $this->renderPartial('detail',['model'=>$model,'userInfo'=>$userInfo]);
        }
    }



//$('#demo-modal').load('get-dynamic-content.php?modal='+modal).dialog(options).dialog('open');


    public function beforeAction($action)
    {
        if(in_array($action->id,$this->actionJsonList))  Yii::$app->response->format = Response::FORMAT_JSON;
        return parent::beforeAction($action);
    }
}
