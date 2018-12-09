<?php
namespace app\modules\statistic\widgets;

use app\modules\statistic\assets\WidgetAsset;
use common\models\DTO\UserInfoAccount;
use common\models\Playlist;
use common\models\search\BalancestatisticsSearch;
use common\models\User;
use komer45\balance\models\Score;
use yii\helpers\Html;
use yii\helpers\Url;
use yii;

class UserBlockInformer extends \yii\base\Widget
{

    public $text = NULL;
    public $user_id = NULL;
    private $offerUrl = NULL;
    public $view=NULL;




    public function init()
    {
        parent::init();


        WidgetAsset::register($this->getView());

        if ($this->offerUrl == NULL) {
            $this->offerUrl = Url::toRoute(["/lalala"]);
        }
        if ($this->text === NULL) {
            $this->text = 'Some text';
        }
        if ($this->user_id === NULL) {
            $this->user_id = -1;
        }
        if ($this->view === NULL) {
            $this->view = 'userBlockInformer/index';
        }
        return true;
    }

    public function run()
    {

        $playlists=Playlist::find()->where(['user_id'=>$this->user_id, 'status'=>Playlist::STATUS_ON])->all();
        $search=new   BalancestatisticsSearch();
     $user=   User::find()->where(['id'=>$this->user_id])->one();
     /**@var  Score $balance**/
     $balance = number_format($user->userbalance->balance, 0, '', ',');



//var_dump($user); die();

     $social_links=['/vk','/fb'];
     $photo=$user->getImageurlForPanel();   // после верстки подставкить  '/'.$user->imageurl
     $userInfoAccount=new UserInfoAccount($this->user_id,$user->username,$balance,99,$photo, $user->userinfo->about_me,$social_links);
        $search_result= $search->searchCount($this->user_id);




        return $this->render($this->view,['search_result'=>$search_result,'userInfoAccount'=>$userInfoAccount,'user'=>$user] );

    }
}
