<?php

namespace common\models\DTO;

class WagerInfo
{
    private $user_id;
    private $playlist_id;
    private $comment;
    private $sum;
    private $select_coef;

  public function __construct($user_id,$playlist_id,$comment,$sum,$select_coef)
  {
      $this->user_id=$user_id;
      $this->playlist_id=$playlist_id;
      $this->comment=$comment;
      $this->sum=$sum;
      $this->select_coef=$select_coef;
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
