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
use komer45\balance\models\Score;
use Yii;
use yii\base\Widget;

class DashboardcartWidget extends Widget
{
    public $userdata;// array параметров, по ситуации буду добавлять
    // возвращаем результат
    public function run(){
//                $sport_categories =   SportcategorynamesExt::getAll();

        $b= Score::find()->where(['user_id' => Yii::$app->user->id])->one()->balance;
        $total_balance  = number_format($b, 0, '', ',');

        return       $this->render('index', ['total_balance'=>$total_balance]);
    }
    public function init(){
        parent::init();
    }


}