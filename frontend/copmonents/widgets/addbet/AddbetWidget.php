<?php
namespace app\copmonents\widgets\addbet;
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 25.07.2018
 * Time: 20:35
 */

use app\modules\statistic\models\PlaylistManager;
use dvizh\cart\controllers\ElementController;
use Yii;
use yii\base\Widget;

class AddbetWidget extends Widget
{
    public $userdata;// array параметров, по ситуации буду добавлять
    // возвращаем результат
    public function run(){
        $username='Poip';
        $userimage='/images/avatar-placeholder.svg';
        $userimage='https://avatars0.githubusercontent.com/u/8706421?s=40&v=40';


        $betMessage=" Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                                   ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas
                                   sit aspernatur aut odit aut fugit, sed quia consequuntur";

        $cart = yii::$app->cart;

//        $block_bets= ElementController::generateHtml([]);
        $block_bets='asdf derf';

        if(Yii::$app->user->isGuest){
            $playlists= [];// PlaylistManager::getAllPlaylistsByUserId();
        }else{
            $playlists=  PlaylistManager::getAllPlaylistsByUserId(Yii::$app->user->identity->getId());
        }




        return       $this->render('index', array('betMessage' => $betMessage,'userimage'=>$userimage,"block_bets"=> $block_bets,"playlists"=>$playlists));
    }
    public function init(){
        parent::init();
    }


}