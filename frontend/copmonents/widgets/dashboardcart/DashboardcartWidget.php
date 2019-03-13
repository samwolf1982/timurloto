<?php
namespace app\copmonents\widgets\dashboardcart;
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


class DashboardcartWidget extends Widget
{

    public $userdata;// array параметров, по ситуации буду добавлять
    // возвращаем результат
    public function run(){

//                $sport_categories =   SportcategorynamesExt::getAll();
        $uid= !empty(Yii::$app->user->id)?Yii::$app->user->id:null;

        $scope=Score::find()->where(['user_id' =>$uid])->one();
//        $b= Score::find()->where(['user_id' =>$uid])->one()->balance;
        $b= !empty($scope)?$scope->balance:0;
        //Score::find()->where(['user_id' =>$uid])->one()->balance;
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

                $curent_playlist = @PlaylistManager::addElement(Yii::$app->user->id,'Плейлист по умолчанию',true)['playlist'];

            }
        }

        if(empty($cart->playlist_id) && !empty($curent_playlist)){
            $current_cart->playlist_id=$curent_playlist->id;
            $current_cart->save(false);
        }

        if(empty($currentCooeficientDrop)){ $currentCooeficientDrop =1; }

        $userCoefficient=new UserCoeficient($cart);
        $max_coeficientDrop=$userCoefficient->getMaxCoeficient();

        if($max_coeficientDrop < $currentCooeficientDrop){ // перезапись если коофициент не совпадает по процентам. ставим максимально возможный // -controllers/DefaultController.php тоже править
            $currentCooeficientDrop =$max_coeficientDrop;
            $current_cart->current_coefficient=$currentCooeficientDrop;
            $current_cart->save(false);
        }

        return       $this->render('index', ['total_balance'=>$total_balance,'currentCooeficientDrop'=>$currentCooeficientDrop,'currentStatus'=>$currentStatus,'playlists'=>$playlists,
            'curent_playlist'=>$curent_playlist,'max_coeficientDrop'=>$max_coeficientDrop]);
    }
    public function init(){
        parent::init();
    }


}