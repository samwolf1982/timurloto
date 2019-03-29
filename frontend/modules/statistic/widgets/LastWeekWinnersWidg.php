<?php
namespace app\modules\statistic\widgets;

use app\modules\statistic\assets\WidgetAsset;
use app\modules\statistic\models\WagerStatisticManager;
use common\models\Lastweekwinners;
use common\models\Playlist;
use common\models\search\BalancestatisticsSearch;
use yii\helpers\Html;
use yii\helpers\Url;
use yii;

class LastWeekWinnersWidg extends \yii\base\Widget
{

    public $text = NULL;
    public $user_id = NULL; // текущий пользователь





    public function init()
    {
        parent::init();
        
        if ($this->text === NULL) {
            $this->text = 'ПОБЕДИТЕЛИ ПРЕДЫДУЩИХ НЕДЕЛЬ';
        }
        if ($this->user_id === NULL) {
            $this->user_id = -1;
        }
        if(!empty($user_id) )  $this->is_own=true;


        return true;
    }

    public function run()
    {

        $models =$this->lastWeekWinnersUsers();


        return $this->render('lastweekwinners/index',[ 'text'=>$this->text,'models'=>$models] );

    }

    public function lastWeekWinnersUsers()
    {
        return  Lastweekwinners::find(['status'=>0])->orderBy(['sort'=>SORT_DESC])->limit(20)->all();
    }
}
