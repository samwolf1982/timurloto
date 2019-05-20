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
        if(0){
            //  $prewWeek_1='2019-03-31'; $prewWeek_2='2019-03-24';
            $prewWeek_1=date("Y-m-d", strtotime("last week sunday -7 day"));
            $prewWeek_2=date("Y-m-d", strtotime("last week sunday -14 day"));;
            $prewWeek_3=date("Y-m-d", strtotime("last week sunday -21 day"));;
            $prewWeek_4=date("Y-m-d", strtotime("last week sunday -28 day"));;
            $prewWeek_5=date("Y-m-d", strtotime("last week sunday -35 day"));;

            $prewWeek_1_text=date("Y-m-d", strtotime("last week sunday"));;
            $prewWeek_2_text=date("Y-m-d", strtotime("last week sunday -7 day"));;
            $prewWeek_3_text=date("Y-m-d", strtotime("last week sunday -14 day"));;
            $prewWeek_4_text=date("Y-m-d", strtotime("last week sunday -21 day"));;
            $prewWeek_5_text=date("Y-m-d", strtotime("last week sunday -28 day"));;
        }


        //  $prewWeek_1='2019-03-31'; $prewWeek_2='2019-03-24';
        $prewWeek_1=date("Y-m-d", strtotime("last week sunday"));
        $prewWeek_2=date("Y-m-d", strtotime("last week sunday -7 day"));;
        $prewWeek_3=date("Y-m-d", strtotime("last week sunday -14 day"));;
        $prewWeek_4=date("Y-m-d", strtotime("last week sunday -21 day"));;
        $prewWeek_5=date("Y-m-d", strtotime("last week sunday -28 day"));;

        $prewWeek_1_text=date("Y-m-d", strtotime("last week sunday"));;
        $prewWeek_2_text=date("Y-m-d", strtotime("last week sunday -7 day"));;
        $prewWeek_3_text=date("Y-m-d", strtotime("last week sunday -14 day"));;
        $prewWeek_4_text=date("Y-m-d", strtotime("last week sunday -21 day"));;
        $prewWeek_5_text=date("Y-m-d", strtotime("last week sunday -28 day"));;

        return       $this->render('index', ['dataProvider'=>$this->dataProvider,'prewWeek_1'=>$prewWeek_1,'prewWeek_2'=>$prewWeek_2,
            'prewWeek_3'=>$prewWeek_3,'prewWeek_4'=>$prewWeek_4,'prewWeek_5'=>$prewWeek_5,
            'prewWeek_1_text'=>$prewWeek_1_text, 'prewWeek_2_text'=>$prewWeek_2_text, 'prewWeek_3_text'=>$prewWeek_3_text, 'prewWeek_4_text'=>$prewWeek_4_text, 'prewWeek_5_text'=>$prewWeek_5_text,
            ]);
    }
    public function init(){
        parent::init();
    }



}