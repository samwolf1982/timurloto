<?php
namespace app\modules\statistic\widgets;

use app\modules\statistic\assets\WidgetAsset;
use app\modules\statistic\models\WagerStatisticManager;
use common\models\Playlist;
use common\models\search\BalancestatisticsSearch;
use yii\helpers\Html;
use yii\helpers\Url;
use yii;

class LastWeekWinners extends \yii\base\Widget
{

    public $text = NULL;
    public $user_id = NULL; // текущий пользователь





    public function init()
    {
        parent::init();

      //  WidgetAsset::register($this->getView());


        
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




        yii::error([$this->user_id,Yii::$app->user->id]);

        return $this->render('lastweekwinners/index',[ 'text'=>$this->text,'models'=>$models] );

    }

    public function lastWeekWinnersUsers()
    {
          return [];
    }
}
