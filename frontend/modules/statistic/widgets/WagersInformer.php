<?php
namespace app\modules\statistic\widgets;

use app\models\WagerSearch;
use app\modules\statistic\assets\WidgetAsset;
use app\modules\statistic\models\WagerStatisticManager;
use common\models\Playlist;
use common\models\services\PageInfo;
use frontend\modules\subscribers\SubscriberModule;
use yii\helpers\Html;
use yii\helpers\Url;
use yii;

class WagersInformer extends \yii\base\Widget
{

    public $text = NULL;
    private $offerUrl = NULL;
    public $user_id = NULL;
    public $is_own = NULL;  // указательна то что это своя страничка юзатьтолько на индекс аккаунта


    public function init()
    {
        parent::init();

        WidgetAsset::register($this->getView());

        if ($this->offerUrl == NULL) {
            $this->offerUrl = Url::toRoute(["/cart/default/index"]);
        }
        
        if ($this->text === NULL) {
            $this->text = 'Мои ставки';
        }

        if ($this->user_id === NULL) {
            $this->user_id = Yii::$app->user->id;
        }
        if ($this->is_own === NULL) {
            $this->is_own = false;
        }
        
        return true;
    }

    public function run()
    {

        $playlists=Playlist::find()->where(['user_id'=>$this->user_id , 'status'=>Playlist::STATUS_ON])->all();
        $wagers = new  WagerStatisticManager($this->user_id ,Yii::$app->request->queryParams);
        $wagersModels= $wagers->getAllWagers();
        $paginationPages=$wagers->getPaginationPages();

        $pageInfo =new PageInfo();


        /** @var SubscriberModule $moduleSubscribers */
        $moduleSubscribers = \Yii::$app->getModule('subscribers');

        if(!$this->is_own){
            $isSubscriber = $moduleSubscribers->isSubscriber($this->user_id,Yii::$app->user->id);
        }else{
            $isSubscriber= true;
        }



        yii::error(['subscriber'=>$isSubscriber,$this->user_id,Yii::$app->user->id]);

//        $searchModelWager = new WagerSearch();
//        $dataProviderWagers = $searchModelWager->search(Yii::$app->request->queryParams);


        return $this->render('wagersInformer/index',['playlists'=>$playlists ,'wagersModels'=> $wagersModels,'wagerManager'=>$wagers,'paginationPages'=>$paginationPages,
            'pageInfo'=>$pageInfo,'text'=>$this->text,'isSubscriber'=>$isSubscriber] );

    }
}
