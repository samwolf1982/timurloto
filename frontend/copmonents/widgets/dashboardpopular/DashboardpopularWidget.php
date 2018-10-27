<?php
namespace app\copmonents\widgets\dashboardpopular;
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 25.07.2018
 * Time: 20:35
 */

use app\modules\statistic\models\PlaylistManager;
use dvizh\cart\controllers\ElementController;
use Yii;
use yii\base\Widget;

class DashboardpopularWidget extends Widget
{
    public $userdata;// array параметров, по ситуации буду добавлять
    // возвращаем результат
    public function run(){


//        $tabs=[];

//        if(Yii::$app->user->isGuest){
//            $playlists= [];// PlaylistManager::getAllPlaylistsByUserId();
//        }else{
//            $playlists=  PlaylistManager::getAllPlaylistsByUserId(Yii::$app->user->identity->getId());
//        }
        return       $this->render('index', array());
    }
    public function init(){
        parent::init();
    }


}