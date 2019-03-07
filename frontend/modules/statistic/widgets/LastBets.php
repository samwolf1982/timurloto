<?php
namespace app\modules\statistic\widgets;

use app\modules\statistic\assets\WidgetAsset;
use app\modules\statistic\models\WagerStatisticManager;
use common\models\Playlist;
use common\models\search\BalancestatisticsSearch;
use yii\helpers\Html;
use yii\helpers\Url;
use yii;

class LastBets extends \yii\base\Widget
{

    public $text = NULL;
    public $user_id = NULL; // текущий пользователь
    public $offerUrl = NULL;
    public $is_own = NULL;  // указательна то что это своя страничка юзатьтолько на индекс и bets




    public function init()
    {
        parent::init();

        WidgetAsset::register($this->getView());

        if ($this->offerUrl == NULL) {
            $this->offerUrl = Url::toRoute(["/cart/default/index"]);// путь к подгрузке
        }
        
        if ($this->text === NULL) {
            $this->text = 'ПОСЛЕДНИЕ СТАВКИ';
        }
        if ($this->user_id === NULL) {
            $this->user_id = -1;
        }
        if ($this->is_own === NULL) {
            $this->is_own = false;
        }
        if(!empty($user_id) )  $this->is_own=true;


        return true;
    }

    public function run()
    {

        $wagers = new  WagerStatisticManager($this->user_id ,Yii::$app->request->queryParams);

        $wagersModels= $wagers->getLastWagers();
        $paginationPages=$wagers->getPaginationPages();
        /** @var SubscriberModule $moduleSubscribers */
        $moduleSubscribers = \Yii::$app->getModule('subscribers');



        yii::error([$this->user_id,Yii::$app->user->id]);
        if(!$this->is_own){
            $isSubscriber = $moduleSubscribers->isSubscriber($this->user_id,Yii::$app->user->id);
        }else{
            $isSubscriber= true;
        }


      //  var_dump($wagersModels[0]); die();

        $video_models=[];
        return $this->render('lastbets/index',['wagersModels'=>$wagersModels,'video_models'=>$video_models,'isSubscriber'=>$isSubscriber] );

    }
}
