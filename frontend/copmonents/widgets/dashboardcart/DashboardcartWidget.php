<?php
namespace app\copmonents\widgets\dashboardcart;
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 25.07.2018
 * Time: 20:35
 */

use app\modules\statistic\models\PlaylistManager;
use common\models\helpers\ConstantsHelper;
use common\models\Playlist;
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
        $cart = yii::$app->cart;
        $current_cart=$cart->getCart()->my();
        $currentCooeficientDrop= $current_cart->current_coefficient;
        $currentStatus= $current_cart->status;
        $playlists=Playlist::find()->where(['user_id'=>Yii::$app->user->id, 'status'=>Playlist::STATUS_ON])->all();
        $curent_playlist=Playlist::find()->where(['id'=>$current_cart->playlist_id])->one();
        if(!$curent_playlist){
            $curent_playlist=Playlist::find()->where(['user_id'=>Yii::$app->user->id,'is_default'=>ConstantsHelper::STATUS_PlAYLIST_DEFAULT])->one();
            if(!$curent_playlist){
                $curent_playlist = PlaylistManager::addElement(Yii::$app->user->id,'Плейлист по умолчанию',true)['playlist'];
            }
        }
        if(empty($currentCooeficientDrop)){ $currentCooeficientDrop =1; }


        return       $this->render('index', ['total_balance'=>$total_balance,'currentCooeficientDrop'=>$currentCooeficientDrop,'currentStatus'=>$currentStatus,'playlists'=>$playlists,
            'curent_playlist'=>$curent_playlist]);
    }
    public function init(){
        parent::init();
    }


}