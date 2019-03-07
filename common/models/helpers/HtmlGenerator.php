<?php

namespace common\models\helpers;


use common\models\Bets;
use common\models\Eventsnames;
use common\models\services\EventLine;
use common\models\services\UserInfo;
use common\models\wraps\EventsnamesExt;
use common\models\wraps\SportcategoryExt;
use common\models\wraps\TournamentsnamesExt;
use dektrium\user\models\User;
use Yii;
use yii\helpers\Url;

class HtmlGenerator
{


    /**
     *$a = 21;
     *echo $a.' отзыв'.NumberEnd($a, array('','а','ов'));  Бывает “1 отзыв”, “2 отзыва” и “12 отзывов”.
     * https://vexell.ru/%D1%81%D0%BA%D0%BB%D0%BE%D0%BD%D0%B5%D0%BD%D0%B8%D0%B5-%D1%87%D0%B8%D1%81%D0%B5%D0%BB-%D1%80%D0%B5%D0%B0%D0%BB%D0%B8%D0%B7%D0%B0%D1%86%D0%B8%D1%8F-%D0%BD%D0%B0-php/
     * @param $number
     * @param $titles
     * @return mixed
     *
     */
    public static function NumberEnd($number, $titles) {
        $cases = array (2, 0, 1, 1, 1, 2);
        return $titles[ ($number%100>4 && $number%100<20)? 2 : $cases[min($number%10, 5)] ];
    }

    public static function dashboardCountry($data)
    {
        $res='';
        /**  @var  SportcategoryExt	  $el */
        foreach ($data as $el) {

            $res.='<li class="">
                                <a href="#" class="trigger-sub-collapse" data-id="'.$el->category_id.'">
                                                    <span class="flag">
                                                        <img src="images/ua.png" alt="">
                                                    </span>
                                    '.$el->category_name.'
                                </a>
                                <div class="sub-collapse">
                                    <ul class="sub-collapse-list" id="child_sub_colapse_'.$el->category_id.'" >
                                        <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                        <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                        <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                        <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                        <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                                    </ul>
                                </div>
                            </li>';
        }
        return $res;
    }


    public static function dashboardCountryByGroup($data)
    {
        $res='';
        /**  @var  TournamentsnamesExt	  $el */
        foreach ($data as $el) {
            $res.=' <li><a href="#" class="turnire_fin" data-id="'.$el->tournament_id.'" >'.$el->tournament_name.' <span class="count-block">'.$el->countevents.'</span></a></li>';
        }

        return $res;
    }



    public static function dashboardCountryByGroupFinBlock($data)
    {
        $res ='
<div class="tab-blocks" id="dashboard_center_block_tab_blocks">
    <div class="tab-block active" id="tabOne">
        <div class="tab-block-inner">
            <div class="tab-collapse">
                <div class="tab-collapse-head">
                    <button class="trigger-tab-collapse active">'.$data[0]->tournament_name.'</button>
                </div>
                
                <div class="tab-collapse-content active">
                    <div class="tab-collapse-content-inner">';

        /** @var Eventsnames $el */
        foreach ($data as $el) {

            /**@var Bets $ishods */
            $ishods=$el->ishods;

//            Yii::error($ishods[0]);
//            $count_ishods = count($ishods);
//           $total_sum_events = array_sum( array_map(function ($js){
//               yii::error(json_decode($js->outcomes, true));
//               return count( json_decode($js->outcomes, true));
//           },$ishods));

//            yii::error($ishods->outcomes);
//            yii::error($tmp);
//            yii::error($ishods[0]->outcomes);
//            yii::error(count($ishods));
            $json_outcames = json_decode($ishods[0]->outcomes, true);
//            yii::error($json_outcames);
//            $count_ishods += count($json_outcames); //??
            $res .= '<div class="row-collapse">
                            <div class="row-collapse-inner" data-parents="'.$el->event_id.'">
                                <div class="icon-bet">
                                    <span class="icon-football"></span>
                                </div>
                                <a class="info-bet" href="bet-dashboard-open.html">
                                    <div class="title-bet">17 Сентября 19:30</div>
                                    <div class="value-bet">'. $el->event_name .'</div>
                                </a>';


//            'data-options' => json_encode($this->options),
//            'data-description' => $this->description,
//                $outcomes0=$json_outcames[0];
            if(!empty($json_outcames[0])){  //$json_outcames[0]['outcome_id']

                $res .= '<div class="team">
                                <button class="bet-parent-val" data-id="'.$ishods[0]->id.'" data-parent="'.$el->event_id.'" data-options=\''. json_encode( $json_outcames[0]).'\'  data-current_outcome_id="'.$json_outcames[0]['outcome_id'].'"  data-players="'.$ishods[0]->id.'"  data-cat="'.$ishods[0]->market_id.'"    data-text="'.$json_outcames[0]['outcome_name'].'">
                                    <div class="title-bet">'.$json_outcames[0]['outcome_name'].'</div>
                                    <div class="value-bet">'.$json_outcames[0]['outcome_coef'].'</div>
                                </button>
                            </div>';
            }else{
                $res .= '<div class="team"></div>';
            }


            if(!empty($json_outcames[1])) {
                $res .= ' <div class="bet-points">
                                <button class="bet-parent-val" data-id="'.$ishods[0]->id.'"   data-options=\''. json_encode( $json_outcames[1]).'\' data-current_outcome_id="'.$json_outcames[1]['outcome_id'].'"  data-players="'.$ishods[0]->id.'"  data-cat="'.$ishods[0]->market_id.'"   data-text="'.$json_outcames[1]['outcome_name'].'">
                                    <div class="title-bet">'.$json_outcames[1]['outcome_name'].'</div>
                                    <div class="value-bet">'.$json_outcames[1]['outcome_coef'].'</div>
                                </button>
                            </div>';
            }else{
                $res .= '<div class="team"></div>';
            }
            if(!empty($json_outcames[2])) {
                $res .= '<div class="team">
                                <button class="bet-parent-val" data-id="'.$ishods[0]->id.'" data-options=\''. json_encode( $json_outcames[2]).'\' data-current_outcome_id="'.$json_outcames[2]['outcome_id'].'"  data-players="'.$ishods[0]->id.'"  data-cat="'.$ishods[0]->market_id.'"  data-text="'.$json_outcames[2]['outcome_name'].'">
                                    <div class="title-bet">'.$json_outcames[2]['outcome_name'].'</div>
                                    <div class="value-bet">'.$json_outcames[2]['outcome_coef'].'</div>
                                </button>
                            </div>';
            }else{
                $res .= '<div class="team"></div>';
            }
            $res .=     '<a href="bet-dashboard-open.html" class="total show-all-bets do_open_line" data-id="'.$el->event_id.'" >'.$el->total_count_outcomes.'</a>
                            </div>
                        </div>';
        }
        $res .='   </div>
                </div>
            </div>
        </div>
    </div>
</div>
';
        return $res;

    }



    public static function dashboardCountryByGroupFinBlockCenterWidget($data)
    {

        if(empty($data)) return '<div class="tab-blocks" id="dashboard_center_block_tab_blocks"><div class="progresse_bare"></div></div>';

        $res ='
<div class="tab-blocks" id="dashboard_center_block_tab_blocks">
    <div class="tab-block active" id="tabOne">
        <div class="tab-block-inner">
            <div class="tab-collapse">
                <div class="tab-collapse-head">
                    <button class="trigger-tab-collapse active">'.$data[0]->tournament_name.'</button>
                </div>
                
                <div class="tab-collapse-content active">
                    <div class="tab-collapse-content-inner">';


        /** @var Eventsnames $el */
        foreach ($data as $el) {

            /**@var Bets $ishods */
            $ishods=$el->ishods;
            $json_outcames =null;
            if(isset($ishods[0])) $json_outcames = json_decode($ishods[0]->outcomes, true);



            $res .= '<div class="row-collapse">
                            <div class="row-collapse-inner" data-parents="'.$el->event_id.'">
                                <div class="icon-bet">
                                    <span class="icon-football"></span>
                                </div>
                                <a class="info-bet" href="bet-dashboard-open.html">
                                    <div class="title-bet">17 Сентября 19:30</div>
                                    <div class="value-bet">'. $el->event_name .'</div>
                                </a>';

            if(!empty($json_outcames[0])){  //$json_outcames[0]['outcome_id']

                $res .= '<div class="team">
                                <button class="bet-parent-val" data-id="'.$ishods[0]->id.'" data-parent="'.$el->event_id.'" data-options=\''. json_encode( $json_outcames[0]).'\'  data-current_outcome_id="'.$json_outcames[0]['outcome_id'].'"  data-players="'.$ishods[0]->id.'"  data-cat="'.$ishods[0]->market_id.'"    data-text="'.$json_outcames[0]['outcome_name'].'">
                                    <div class="title-bet">'.$json_outcames[0]['outcome_name'].'</div>
                                    <div class="value-bet">'.$json_outcames[0]['outcome_coef'].'</div>
                                </button>
                            </div>';
            }else{
                $res .= '<div class="team"></div>';
            }


            if(!empty($json_outcames[1])) {
                $res .= ' <div class="bet-points">
                                <button class="bet-parent-val" data-id="'.$ishods[0]->id.'"   data-options=\''. json_encode( $json_outcames[1]).'\' data-current_outcome_id="'.$json_outcames[1]['outcome_id'].'"  data-players="'.$ishods[0]->id.'"  data-cat="'.$ishods[0]->market_id.'"   data-text="'.$json_outcames[1]['outcome_name'].'">
                                    <div class="title-bet">'.$json_outcames[1]['outcome_name'].'</div>
                                    <div class="value-bet">'.$json_outcames[1]['outcome_coef'].'</div>
                                </button>
                            </div>';
            }else{
                $res .= '<div class="team"></div>';
            }
            if(!empty($json_outcames[2])) {
                $res .= '<div class="team">
                                <button class="bet-parent-val" data-id="'.$ishods[0]->id.'" data-options=\''. json_encode( $json_outcames[2]).'\' data-current_outcome_id="'.$json_outcames[2]['outcome_id'].'"  data-players="'.$ishods[0]->id.'"  data-cat="'.$ishods[0]->market_id.'"  data-text="'.$json_outcames[2]['outcome_name'].'">
                                    <div class="title-bet">'.$json_outcames[2]['outcome_name'].'</div>
                                    <div class="value-bet">'.$json_outcames[2]['outcome_coef'].'</div>
                                </button>
                            </div>';
            }else{
                $res .= '<div class="team"></div>';
            }
            $res .=     '<a href="bet-dashboard-open.html" class="total show-all-bets do_open_line" data-id="'.$el->event_id.'" >'.$el->total_count_outcomes.'</a>
                            </div>
                        </div>';
        }
        $res .='   </div>
                </div>
            </div>
        </div>
    </div>
</div>
';
        return $res;

    }


    /**
     * @param $data
     * @param EventLine $eventLine
     * @return string
     */
    public static function dashboardLine($data, $eventLine)
    {
        $res ='';
        $res .= '<a href="bet-dashboard.html" class="head-pink">
                                    <h3>' . $eventLine->getTournamentName() . '</h3>
                                </a>
                                <div class="content-bg pb-5">
                                    <div class="open-bet-wrapper">
                                        <div class="open-bet-wrapper-inner" data-parents="'.$eventLine->getEventId().'">
                                            <div class="head-open-bet">
                                                <div class="icon-open-bet">
                                                    <span class="icon-football"></span>
                                                </div>
                                                <div class="title-open-bet">
                                                    <h3>' . $eventLine->getEventName() . '</h3>
                                                </div>
                                                <div class="date-open-icon">17 сентября 19:30</div>
                                                <a href="bet-dashboard.html" class="total show-all-bets closeLine">93</a>
                                            </div>
                                            
                                            
                                            <div class="body-open-bets">
                                                <div class="body-open-bets-inner">
                                                    <div class="search-bets-block">
                                                        <div class="search-bets-block-inner">
                                                            <form action="#">
                                                                <input type="text" placeholder="Поиск по событию">
                                                                <button id="search-bets" type="submit"><span class="icon-search"></span></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="open-collapsed-wrapper">';

        /**
         * @var  $k
         * @var Bets $item
         */
        foreach ($data as $k => $item_line) {
            $res .= '                <div class="collapse-open-bet">
                                                            <div class="collapse-open-bet-head">
                                                                <button class="collapse-open-bet-trigger active">'.$k.'</button>
                                                            </div>
                                                            <div class="collapse-open-bet-content">';
                                                  foreach ($item_line as $z => $item_line_2) {
                                                      $res .= '   <div class="collapse-open-bet-item">
                                                                   <h4>'.$z.'</h4>
                                                                    <div class="row-bets-stats"> ';

                                                      $j = json_decode($item_line_2->outcomes);
                                                      foreach ($j as $x => $outcomes){
                                                          $res .= '   <div class="column4">
                                                                            <button class="bets-val" data-id="'.$item_line_2->id.'" data-parent="'.$item_line_2->event_id.'"  data-options=\''. json_encode( $outcomes).'\'  data-current_outcome_id="'.$outcomes->outcome_id.'" data-players="'.$item_line_2->id.'" data-cat="'.$item_line_2->market_id.'" data-text="'.$outcomes->outcome_name.'" >
                                                                                <span class="mobile-name">'.$outcomes->outcome_name.'</span>
                                                                                <span class="name-b">'.$outcomes->outcome_name.'</span>
                                                                                <span class="coefficient-b">'.$outcomes->outcome_coef.'</span>
                                                                            </button>
                                                                        
                                                                        </div> ';
                                                      }
//

                                                      $res .= '      </div>
                                                                </div>';
                                                  }
                            $res .= '                       </div>
                                                        </div>';
        }


            $res .= '                               </div>
                                                    
                                                    
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                </div>';

        return $res;

    }


    public static function top100UserFace($user)
    {


//        $url = Url::toRoute(['product/view', 'id' => 42]);
        if(!empty($user)){
            $useeInfo=new UserInfo($user->id);
            $pathToUser=Url::toRoute(['/account/view','id'=>$user->id]);
            $res='';
            $res.='<div class="flex"> <a href="'.$pathToUser.'">
    <div class="wins-item">
        <div class="wins-item-inner">
            <div class="row-ava">
                <div class="rate-avatar-column">
                    <div class="rate-avatar">
                        <div class="circle-wrapper" data-ptc="'.$useeInfo->getUserLevelNumber().'">
                            <div class="circle"><canvas width="74" height="74"></canvas></div>
                        </div>
                        <div class="avatar-user">
                            <img style="border-radius: 100%;" src="/'.$user->imageurl.'" alt="'.$useeInfo->getUserName().'">
                        </div>
                    </div>
                </div>
                <div class="user-info">
                    <h4 class="name-l"><span>'.$user->username.'</span></h4>
                </div>
            </div>
        </div>
    </div></a>
</div>
';
        }else{

            $res='';
            $imageurl='';
            $username='no name';
            $res.='<div class="flex"> <a href="#">
    <div class="wins-item">
        <div class="wins-item-inner">
            <div class="row-ava">
                <div class="rate-avatar-column">
                    <div class="rate-avatar">
                        <div class="circle-wrapper" data-ptc="1">
                            <div class="circle"><canvas width="74" height="74"></canvas></div>
                        </div>
                        <div class="avatar-user">
                            <img style="border-radius: 100%;" src="/'.$imageurl.'" alt="no name">
                        </div>
                    </div>
                </div>
                <div class="user-info">
                    <h4 class="name-l"><span>'.$username.'</span></h4>
                </div>
            </div>
        </div>
    </div></a>
</div>
';
        }


        return $res;
    }



    public static function nextBets($models)
    {

        $isSubscriber=false; // todo
        $res='';
     foreach ($models as $wagerInfoFront) {
                            /** @var Wager $wager */
                            $wager=$wagerInfoFront['model'];
                            /** @var WagerInfoFrontSingle $front_element **/
                            $front_element=$wagerInfoFront['front_element'];
                            /**  @var UserInfo $userInfo **/
                            $userInfo=$wagerInfoFront['userInfo'];
//                            var_dump($userInfo); die();
         $isSubscriber=   $wager->canShow();
                       $res.='    <div class="column-6 rate-column">
                                <div class="rate-wrapper">
                                    <div class="rate-inner">
                                        <div class="user-rate">
                                            <div class="user-rate-inner">

                                                <div class="row-ava">
                                                    <div class="rate-avatar">
                                                        <a href="'.$userInfo->getUserUrl().'">
                                                        <div class="circle-wrapper" data-ptc="'.$userInfo->getUserLevelNumber().'">
                                                            <div class="circle"></div>
                                                        </div>
                                                        <div class="avatar-user">
                                                            <img style="border-radius: 100%;" src="/'.$userInfo->getUserImage().'" alt="'.$userInfo->getUserName().'">
                                                        </div>
                                                        </a>
                                                    </div>
                                                    <div class="user-info">
                                                        <h4 class="name-r">'.$userInfo->getUserName().'</h4>
                                                        <div class="level-user level-user-label">

                                                            <div class="level-text">  '.$userInfo->getUserLevel().'</div>';
                                                         if($userInfo->getisPro()){
                                                             $res.='   <span class="label-user label-user-pro">pro</span>';
                                                              }
                                                $res.='  </div>
                                                    </div>
                                                    <a href="#" data-toggle="no-modal" data-target="#edit_subscriber" class="bet-status bet-status-editable">
                                                        <div class="bet-status-inner">';
                                                             if($front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_FREE_ORDINAR || $front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_FREE_EXPRESS   ){
                                                                  $res.='  <span class="icon-open"></span>';
                                                            }
                                                             if($front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_PRIVATE_ORDINAR || $front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_PRIVATE_EXPRESS  ){
                                                                 $res.=' <span class="icon-lock"></span>';
                                                             }
                                                 $res.='  </div>
                                                    </a>

                                                </div>



                                                <div class="rate-content">
                                                    <div class="rate-c__item rate-c__item__two">
                                                        <div class="rate-c">
                                                            <div class="title_rate_c"> '.$front_element->getType() .'</div>
                                                            <div class="value_rate_c">'.$front_element->getSumAndPercent().'</div>';

                                                              if($isSubscriber || $front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_FREE_ORDINAR || $front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_FREE_EXPRESS  ){
                                                                  $res.='  <div class="value_rate_c">  '.$front_element->getUserPercent().'</div>';
                                                                             }else{
                                                                  $res.='  <div class="value_rate_c">  '.$front_element->getFormantedCloseText().'</div>';
                                                                             }


         $res.='        </div>
                                                        <div class="rate-c">
                                                            <div class="title_rate_c">'.$front_element->getStartAt() .'</div>';
                                                             if($isSubscriber || $front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_FREE_ORDINAR || $front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_FREE_EXPRESS  ){

                                                                 if($front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_FREE_EXPRESS){
                                                                  $res.='<div class="value_rate_c" id="FormantedNameAndPercent">Экспресс</div>';
                                                                 }else{
                                                                     $res.=' <div class="value_rate_c" id="FormantedNameAndPercent"> '. $front_element->getFormantedNameAndPercent().'  </div>';
                                                                 }
                                                             }else{
                                                               $res.=' <div class="value_rate_c" id="FormantedNameAndPercent">'.$front_element->getType().'</div>';
                                                              }
                                                        $res.=' </div>
                                                    </div>
                                                    <div class="rate-c__item">
                                                        <div class="rate-c">
                                                            <div class="title_rate_c">'.$front_element->getSportAndTurnire()  .'</div>';
                                                             if($front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_FREE_EXPRESS  || $front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_PRIVATE_EXPRESS ){
                                                                 $res.='<div class="value_rate_c"> '.$front_element->getInfoNameFull()  .' ... + '.$front_element->getTotalCount().'  </div>';
                                                             }else{
                                                                 $res.='<div class="value_rate_c"> '.$front_element->getInfoNameFull()  .'  </div>';
                                                             }
                                                    $res.='</div>
                                                    </div>
                                                    <div class="rate-c__footer">
                                                        <div class="btn-shared">
                                                            <button class="like"></button>
                                                            <div class="shared-block">
                                                                <button class="shared">
                                                                    <span class="icon-network"></span>
                                                                </button>
                                                                <div class="drop-shared">
                                                                    <ul class="shared-social">
                                                                        <li>
                                                                            <a href="https://twitter.com/home?status=http%3A//test6.tino.com.ua/account.html" target="_blank">
                                                                                <span class="icon-tw"></span>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//test6.tino.com.ua/account.html" target="_blank">
                                                                                <span class="icon-fb"></span>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="https://plus.google.com/share?url=https%3A//www.facebook.com/sharer/sharer.php?u=http%253A//test6.tino.com.ua/account.html" target="_blank">
                                                                                <span class="icon-gp"></span>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>';



                                                               if($isSubscriber || $front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_FREE_ORDINAR || $front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_FREE_EXPRESS  ){

                                                             if($isSubscriber || $front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_FREE_ORDINAR ){

                                                                 if($front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_PRIVATE_EXPRESS ||   $front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_FREE_EXPRESS ){
                                                                     $res.=' <div class="link-rate">
                                                                          <a href="#" onclick="openModaleDinamik(this);" data-toggle="modaleAjax" data-target="'.Url::to(['/wager/default/viewdetail','id'=>$front_element->getId() ]).'">+  Показать Экспресс</a>
                                                                    </div>';
                                                                  }else{
                                                                     $res.='<div class="link-rate">
                                                                          <a href="#" onclick="openModaleDinamik(this);" data-toggle="modaleAjax" data-target="'.Url::to(['/wager/default/viewdetail','id'=>$front_element->getId() ]).'">+  Показать Ординар</a>
                                                                    </div>';
                                                                 }

                                                             }else{
                                                                 $res.='<div class="link-rate">
                                                                      <a href="#" onclick="openModaleDinamik(this);" data-toggle="modaleAjax" data-target="'.Url::to(['/wager/default/viewdetail','id'=>$front_element->getId() ]).'">+  Показать Экспресс</a>
                                                                </div>';
                                                             }

                                                         }else{
                                                                   $res.='<div class="link-rate">

                                                                  <a href="#" onclick="openModaleMoreDetail(this);" data-toggle="modaleAjax">Узнать прогноз</a>
                                                            </div>';
                                                          }


                                                  $res.='  </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                       }


        return $res;
    }




}


