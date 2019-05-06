<?php
namespace app\copmonents\widgets\raitusers;
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 25.07.2018
 * Time: 20:35
 */

use common\models\services\UserInfo;
use Yii;
use yii\base\Widget;

class RaitusersWidget extends Widget
{

    public $dataProvider;// провайдер данных как для грида
    public $periodOne;//
    public $period3m;//
    public $periodAll;//
    public function run(){
        return       $this->render('index', ['dataProvider'=>$this->dataProvider,'periodOne'=>$this->periodOne,'period3m'=>$this->period3m, 'periodAll'=>$this->periodAll]);
    }
    public function init(){
        parent::init();
    }



}