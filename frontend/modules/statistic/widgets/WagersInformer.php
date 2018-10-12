<?php
namespace app\modules\statistic\widgets;

use app\models\WagerSearch;
use app\modules\statistic\assets\WidgetAsset;
use app\modules\statistic\models\WagerStatisticManager;
use common\models\Playlist;
use common\models\services\PageInfo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii;

class WagersInformer extends \yii\base\Widget
{

    public $text = NULL;
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
        
        return true;
    }

    public function run()
    {

        $playlists=Playlist::find()->where(['user_id'=>Yii::$app->user->id, 'status'=>Playlist::STATUS_ON])->all();
        $wagers = new  WagerStatisticManager(Yii::$app->user->id,Yii::$app->request->queryParams);
        $wagersModels= $wagers->getAllWagers();
        $paginationPages=$wagers->getPaginationPages();

        $pageInfo =new PageInfo();



//        $searchModelWager = new WagerSearch();
//        $dataProviderWagers = $searchModelWager->search(Yii::$app->request->queryParams);


        return $this->render('wagersInformer/index',['playlists'=>$playlists ,'wagersModels'=> $wagersModels,'wagerManager'=>$wagers,'paginationPages'=>$paginationPages,
            'pageInfo'=>$pageInfo] );

    }
}
