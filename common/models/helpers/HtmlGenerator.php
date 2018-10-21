<?php

namespace common\models\helpers;


use common\models\Eventsnames;
use common\models\wraps\EventsnamesExt;
use common\models\wraps\SportcategoryExt;
use common\models\wraps\TournamentsnamesExt;
use dektrium\user\models\User;
use Yii;
use yii\helpers\Url;

class HtmlGenerator
{

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
            $res .=     '<a href="bet-dashboard-open.html" class="total show-all-bets do_open_line" data-id="'.$el->id.'" >'.$el->total_count_outcomes.'</a>
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
    public static function dashboardCountryByGroupFinBlock_DEL($data)
    {

        $res='<div class="tab-block active" id="tabOne">';
        /**  @var 	EventsnamesExt 	  $el */
        foreach ($data as $el) {

//            yii::error($el->ishods);

            $ishods=$el->ishods;
            if (count($ishods)>0) {
                $res .= '    <div class="tab-block-inner">
        <div class="tab-collapse">
            <div class="tab-collapse-head">
                <button class="trigger-tab-collapse active">' . $el->event_name . '</button>
            </div>
            <div class="tab-collapse-content active">
                <div class="tab-collapse-content-inner"> ';

                // групировка по market_name
                $resultArray = [];
                array_walk($ishods, function ($item, $key) use (&$resultArray) {
                    $resultArray[$item->market_name][] = $item;
                });

                foreach ($resultArray as $keyName => $ishod) {

                    $json_outcames = json_decode($ishod[0]->outcomes, true);
                    $count_ishods = count($json_outcames);

                    $res .= '<div class="row-collapse">
                        <div class="row-collapse-inner" data-parents="'.$el->event_id.'">
                            <div class="icon-bet">
                                <span class="icon-football"></span>
                            </div>

                            <a class="info-bet" href="bet-dashboard-open.html">
                                <div class="title-bet">17 Сентября 19:30</div>
                                <div class="value-bet">' . $keyName . '</div>
                            </a>';

                    // data-id="id2" старая ид сейчас числовая
                    if(!empty($json_outcames[0])){
                        $res .= '<div class="team">
                                <button class="bet-parent-val" data-id="'.$json_outcames[0]['outcome_id'].'"  data-text="'.$json_outcames[0]['outcome_name'].'">
                                    <div class="title-bet">'.$json_outcames[0]['outcome_name'].'</div>
                                    <div class="value-bet">'.$json_outcames[0]['outcome_coef'].'</div>
                                </button>
                            </div>';
                    }else{
                        $res .= '<div class="team"></div>';
                    }

                    if(!empty($json_outcames[1])) {
                        $res .= ' <div class="bet-points">
                                <button class="bet-parent-val" data-id="'.$json_outcames[1]['outcome_id'].'" data-text="'.$json_outcames[1]['outcome_name'].'">
                                    <div class="title-bet">'.$json_outcames[1]['outcome_name'].'</div>
                                    <div class="value-bet">'.$json_outcames[1]['outcome_coef'].'</div>
                                </button>
                            </div>';
                    }else{
                        $res .= '<div class="team"></div>';
                    }
                        if(!empty($json_outcames[2])) {
                            $res .= '<div class="team">
                                <button class="bet-parent-val" data-id="'.$json_outcames[0]['outcome_id'].'" data-text="'.$json_outcames[2]['outcome_name'].'">
                                    <div class="title-bet">'.$json_outcames[2]['outcome_name'].'</div>
                                    <div class="value-bet">'.$json_outcames[2]['outcome_coef'].'</div>
                                </button>
                            </div>';
                        }else{
                            $res .= '<div class="team"></div>';
                        }

                    $res .= '    <a href="bet-dashboard-open.html" class="total show-all-bets">' . $count_ishods . '</a> ';
                    $res .= '  </div>
                    </div>';
                }


                $res.=' </div>
            </div>
        </div>
    </div>';
            }else{      // Ничего не найдено
                $res.='    <div class="tab-block-inner">
        <div class="tab-collapse">
            <div class="tab-collapse-head">
                <button class="trigger-tab-collapse active">Ничего не найдено</button>
            </div>
            <div class="tab-collapse-content active">
                <div class="tab-collapse-content-inner">
                    <div class="row-collapse">
                        <div class="row-collapse-inner" data-parents="betsId1">
                          Ничего не найдено
                        </div>

                    </div>
                  
                </div>
            </div>
        </div>
    </div>';
            }

        }

        $res.= '</div>';



        return $res;
    }




}


