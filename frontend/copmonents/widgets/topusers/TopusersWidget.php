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
        return       $this->render('index', ['dataProvider'=>$this->dataProvider]);
    }
    public function init(){
        parent::init();
    }



}