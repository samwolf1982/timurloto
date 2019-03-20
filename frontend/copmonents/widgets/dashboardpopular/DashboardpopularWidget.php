<?php
namespace app\copmonents\widgets\dashboardpopular;
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 25.07.2018
 * Time: 20:35
 */

use common\models\Popularwiget;
use frontend\modules\statistic\models\PlaylistManager;
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
//        $popular=new Popularwiget();
//        $listTurnire=  $popular->listTurnireBySportId($activeIdtab_sport_id);
//        foreach (Popularwiget::find()->where(['status'=>0])->orderBy(['sort'=>SORT_ASC])->all() as $pModel) {
//            $models[]=$pModel;
//        }
        $models=Popularwiget::find()->where(['status'=>0])->orderBy(['sort'=>SORT_ASC])->all();
//        $models=[1,2,3,];
        return       $this->render('index',['models'=>$models]);
    }
    public function init(){
        parent::init();
    }


}