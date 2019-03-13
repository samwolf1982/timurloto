<?php
namespace frontend\modules\statistic\models;
use common\models\helpers\ConstantsHelper;
use common\models\Playlist;
use yii;
use yii\helpers\ArrayHelper;

class PlaylistManager
{
    static public function preValidate($user_id,$post){
        if(empty($post)) return false;
        if(Playlist::find()->where(['user_id'=>$user_id,])->count() >= Playlist::LIMIT ) return false;
        return true;
    }

    static public function addElement($user_id,$name,$is_default=false){

        if( $playlist = Playlist::find()->where(['user_id'=>$user_id, 'name'=>$name])->one()){
            $result=['status'=>'errors', 'error'=>"is oresent", 'id'=>$playlist->id];
        }else{
            $playlist= new Playlist();
            $playlist->user_id=$user_id;
            $playlist->name=$name;
            $playlist->sort=0;
            $playlist->status=Playlist::STATUS_ON;
            $playlist->created_at=date('Y-m-d H:i:s');


            $playlist->is_default=ConstantsHelper::STATUS_PlAYLIST_OTHER;
            if($is_default){
                $playlist->is_default=ConstantsHelper::STATUS_PlAYLIST_DEFAULT;
            }



            if($playlist->validate()){
                $playlist->save();
                $result=['status'=>'save', 'id'=>$playlist->id,'playlist'=>$playlist];
            }else{
                $result=['status'=>'errors', 'error'=>$playlist->errors];
            }

        }
        return $result;
    }


    public static function getAllPlaylistsByUserId($user_id)
    {
        $playlists = Playlist::find()->where(['user_id' => $user_id])->all();
// формируем массив, с ключем равным полю 'id' и значением равным полю 'name'
        $items = ArrayHelper::map($playlists, 'id', 'name');
        return $items;
    }

    public static function getPlaylistByUserIdAndId($user_id,$playlist_id)
    {
        return Playlist::find()->where(['id'=>$playlist_id,'user_id' => $user_id])->one();
    }

}
