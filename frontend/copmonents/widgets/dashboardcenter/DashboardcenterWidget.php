<?php
namespace app\copmonents\widgets\dashboardcenter;
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 25.07.2018
 * Time: 20:35
 */

use app\modules\statistic\models\PlaylistManager;
use common\models\Popularturnire;
use common\models\services\PopularToday;
use common\models\wraps\SportcategorynamesExt;
use dvizh\cart\controllers\ElementController;
use Yii;
use yii\base\Widget;

class DashboardcenterWidget extends Widget
{
    public $userdata;// array параметров, по ситуации буду добавлять

    public function run(){
        $tabs=PopularToday::getDropSportForCountry();
        $activeIdtab_sport_id=key($tabs);

//        $popular=new PopularToday(Yii::$app->user->identity->getId());
        $popular=new PopularToday(!empty(Yii::$app->user->identity->id)?Yii::$app->user->identity->id:null  );
        $listTurnire=  $popular->listTurnireBySportId($activeIdtab_sport_id);
        return       $this->render('index', ['tabs'=>$tabs,'activeIdtab'=>$activeIdtab_sport_id,'listTurnire'=>$listTurnire]);
    }
    public function init(){
        parent::init();
    }


}