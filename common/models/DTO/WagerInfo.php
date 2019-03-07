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
    private $result;
    private $time_list;




    /**
     * WagerInfo constructor.
     * @param $user_id
     * @param $playlist_id
     * @param $comment
     * @param $sum
     * @param $select_coef
     * @param $is_private
     * @param $resulto     // результат из парстера массив индекс совападает с индексом - корзины
     * @param $time_list     // ответ из конфирм   $result['time_list'] = [[ 'id'=>$betEventData['game_id'],'start'=>$betEventData['start']]];
     */
    public function __construct($user_id, $playlist_id, $comment, $sum, $select_coef, $is_private, $resulto=[],$time_list=[])
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

//   [] <b>object</b>(<i>stdClass</i>)[<i>188</i>]
//      <i>public</i> 'sport-name_ru' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'Футбол'</font> <i>(length=12)</i>
//      <i>public</i> 'league-name_ru' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'Лига Чемпионов УЕФА'</font> <i>(length=36)</i>
//      <i>public</i> 'team-1-name_ru' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'Атлетико Мадрид'</font> <i>(length=29)</i>
//      <i>public</i> 'team-2-name_ru' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'Ювентус'</font> <i>(length=14)</i>
//      <i>public</i> 'country-name_ru' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'Европа'</font> <i>(length=12)</i>
//      <i>public</i> 'market-name_ru' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'1x2'</font> <i>(length=3)</i>
//      <i>public</i> 'event-name_ru' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'П2'</font> <i>(length=3)</i>
//      <i>public</i> 'additional_game_name_ru' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
//      <i>public</i> 'sport-name_en' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'Football'</font> <i>(length=8)</i>
//      <i>public</i> 'league-name_en' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'UEFA Champions League'</font> <i>(length=21)</i>
//      <i>public</i> 'team-1-name_en' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'Atletico Madrid'</font> <i>(length=15)</i>
//      <i>public</i> 'team-2-name_en' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'Juventus'</font> <i>(length=8)</i>
//      <i>public</i> 'country-name_en' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'Europe'</font> <i>(length=6)</i>
//      <i>public</i> 'market-name_en' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'1x2  '</font> <i>(length=5)</i>
//      <i>public</i> 'event-name_en' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'W Juventus'</font> <i>(length=10)</i>
//      <i>public</i> 'additional_game_name_en' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
//      <i>public</i> 'odd' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'2.80'</font> <i>(length=4)</i>
//      <i>public</i> 'status' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'success'</font> <i>(length=7)</i>

      $this->result=$resulto;
      $this->time_list=$time_list;

  }

    /**
     * результат из ответа из подтверждения ставки
     * @param $i
     */
    public function getResulto($i)
    {
         if(isset($this->result[$i])) return $this->result[$i];
         return ['empty resulto'];
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

//    /**
//     * @return array
//     */
//    public function getTimeList()
//    {
//        return $this->time_list;
//    }


    /**
     * начало игры  из массива перебором
     * @param $id
     * @return int
     */
    public function getStarttimeGameById($id)
    {
        foreach ($this->time_list as $el) {
            $r = explode('-',$id);
            if($r[0]==$el->id) return $el->start;
        }
        return 0;
    }



}
