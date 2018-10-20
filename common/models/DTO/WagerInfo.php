<?php

namespace common\models\DTO;

use common\models\helpers\ConstantsHelper;

class WagerInfo
{

    private $user_id;
    private $playlist_id;
    private $comment;
    private $sum;
    private $select_coef;
    private $is_private;

  public function __construct($user_id,$playlist_id,$comment,$sum,$select_coef,$is_private)
  {
      $this->user_id=$user_id;
      $this->playlist_id=$playlist_id;
      $this->comment=$comment;
      $this->sum=$sum;
      $this->select_coef=$select_coef;
      if($is_private){
          $this->is_private=ConstantsHelper::STATUS_PRIVATE_BET;
      }else{
          $this->is_private=ConstantsHelper::STATUS_PUBLIC_BET;
      }

  }


    /**
     * @return mixed
     */
    public function getisPrivate()
    {
        return $this->is_private;
    }
    /**
     * @return mixed
     */
    public function getSelectCoef()
    {
        return $this->select_coef;
    }
    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @return mixed
     */
    public function getPlaylistId()
    {
        return $this->playlist_id;
    }
    /**
 * @return mixed
 */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @return mixed
     */
    public function getSum()
    {
        return $this->sum;
    }
}
