<?php
namespace app\modules\statistic\widgets;

use app\modules\statistic\assets\WidgetAsset;
use common\models\Playlist;
use common\models\search\BalancestatisticsSearch;
use yii\helpers\Html;
use yii\helpers\Url;
use yii;

class StatisticInformer extends \yii\base\Widget
{

    public $text = NULL;
    public $user_id = NULL;
    private $offerUrl = NULL;



    public function init()
    {
        parent::init();

        WidgetAsset::register($this->getView());

        if ($this->offerUrl == NULL) {
            $this->offerUrl = Url::toRoute(["/cart/default/index"]);
        }
        
        if ($this->text === NULL) {
            $this->text = 'Плейлисты';
        }
        if ($this->user_id === NULL) {
            $this->user_id = -1;
        }
        
        return true;
    }

    public function run()
    {

        $playlists=Playlist::find()->where(['user_id'=>$this->user_id, 'status'=>Playlist::STATUS_ON])->all();
        $search=new   BalancestatisticsSearch();
//        yii::error($this->user_id);
        $search_result= $search->searchCount($this->user_id);

        return $this->render('statisticInformer/index',['playlists'=>$playlists,'search_result'=>$search_result] );

    }
}
