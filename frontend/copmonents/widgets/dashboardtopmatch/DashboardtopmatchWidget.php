<?php
namespace app\copmonents\widgets\dashboardtopmatch;
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 25.07.2018
 * Time: 20:35
 */

use frontend\modules\statistic\models\PlaylistManager;
use common\models\helpers\ConstantsHelper;
use common\models\Playlist;
use common\models\services\UserCoeficient;
use common\models\wraps\SportcategorynamesExt;
use dvizh\cart\controllers\ElementController;
use komer45\balance\models\Score;
use Yii;
use yii\base\Widget;

class DashboardtopmatchWidget extends Widget
{
    public $userdata;// array параметров, по ситуации буду добавлять
    // возвращаем результат
    public function run(){

        return       $this->render('index', []);
    }
    public function init(){
        parent::init();
    }


}