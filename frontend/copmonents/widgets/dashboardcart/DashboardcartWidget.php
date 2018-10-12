<?php
namespace app\copmonents\widgets\dashboardcart;
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 25.07.2018
 * Time: 20:35
 */

use app\modules\statistic\models\PlaylistManager;
use common\models\wraps\SportcategorynamesExt;
use dvizh\cart\controllers\ElementController;
use Yii;
use yii\base\Widget;

class DashboardcartWidget extends Widget
{
    public $userdata;// array параметров, по ситуации буду добавлять
    // возвращаем результат
    public function run(){
                $sport_categories =   SportcategorynamesExt::getAll();
        return       $this->render('index', ['sport_categories'=>$sport_categories]);
    }
    public function init(){
        parent::init();
    }


}