<?php
namespace app\copmonents\widgets\topusers;
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 25.07.2018
 * Time: 20:35
 */

use common\models\services\UserInfo;
use Yii;
use yii\base\Widget;

class TopusersWidget extends Widget
{

    public $dataProvider;// провайдер данных как для грида
    public function run(){
      //  $prewWeek_1='2019-03-31'; $prewWeek_2='2019-03-24';
        $prewWeek_1=date("Y-m-d", strtotime("last week sunday -7 day"));
        $prewWeek_2=date("Y-m-d", strtotime("last week sunday -14 day"));;
        return       $this->render('index', ['dataProvider'=>$this->dataProvider,'prewWeek_1'=>$prewWeek_1,'prewWeek_2'=>$prewWeek_2]);
    }
    public function init(){
        parent::init();
    }



}