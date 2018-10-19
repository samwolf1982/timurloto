<?php

namespace common\models\services;

use common\models\Playlist;
use dektrium\user\models\User;
use Yii;
use yii\helpers\Url;

class UserPlaylists
{
    private $user_id;
    private $post_playlist_id;
    private $current_cart;

//    private $playlists;
    private $current_playlist;


  public function __construct($user_id,$post_playlist_id,$current_cart)
  {
      $this->user_id=$user_id;
      $this->post_playlist_id=$post_playlist_id;
      $this->current_cart=$current_cart;
      $this->current_playlist=Playlist::find()->where(['id'=>$this->post_playlist_id,'user_id'=>$this->user_id])->one();

  }


    public function changePlaylist()
    {

        if($this->current_playlist){
           $this->current_cart->playlist_id=$this->current_playlist->id;

            if($this->current_cart->validate() &&  $this->current_cart->save()){
              return true;
            }else{
//                yii::error($this->current_cart->error);
            }
        }
        return false;
    }

    public static function createDefaultPlaylist()
    {

    }





}
