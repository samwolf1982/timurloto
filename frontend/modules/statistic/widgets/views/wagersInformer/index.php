<?php

use app\modules\statistic\models\WagerStatisticManager;
use common\models\DTO\WagerInfoFront;
use common\models\DTO\WagerInfoFrontSingle;
use common\models\helpers\ConstantsHelper;
use common\models\services\PageInfo;
use common\models\services\UserInfo;
use common\models\Wager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;


/**@var WagerStatisticManager $wagerManager  */
/**@var PageInfo $pageInfo  */



?>


<div class="row table-row" id="my-bet">
    <div class="column-12" id="bets">
        <div class="table-wrapper stats-table tbl-width-pl table-transparent my-bet">
            <div class="table-inner table-transparent">
                <div class="table-head head-with-tabs head-w_playlist head_w-statistic">
                    <div class="tbl-icon">
                        <img src="/images/soccer-ball.svg" alt="">
                    </div>
                    <div class="left-head-text">
                        <span class="text-head"><?=$text?> <sup><?=$wagerManager->getCountAllElements()?></sup></span>
                    </div>

                    <div class="play-list-drop">
                        <!--<button class="drop-trig-lay">Лист #A</button>-->
                        <!--<div class="drop-play">-->
                        <!--<ul class="drop-list">-->
                        <!--<li>-->
                        <!--<a class="pl-item" href="#">Лист #A</a>-->
                        <!--<a class="pl-item" href="#">Плейлист #B</a>-->
                        <!--<a class="pl-item" href="#">Плейлист #C</a>-->
                        <!--</li>-->
                        <!--</ul>-->
                        <!--</div>-->
                        <div class="custom-dropdown">
                            <div class="custom-dropdown-inner">


                                <div class="val-drop">
                                    <?php foreach ($playlists as $playlist) {  //<?=$playlist->id //$playlist->name ?>
                                        <?php  if($pageInfo->getPlayPeriodPlaylist() == PageInfo::PLAYLIST_NOT_SELECTED  ){  echo '<button class="val-drop-btn">Лист</button>';   break;  } ?>
                                        <?php  if($pageInfo->getPlayPeriodPlaylist() == $playlist->id  ){  echo '<button class="val-drop-btn">'.$playlist->name.'</button>';   break;  } ?>

                                    <?php  }  ?>


                                </div>

                                <div class="dropdown-list">
                                    <div class="play-list">

                                        <?php foreach ($playlists as $playlist) {  ?>
                                            <div class="drop-item">
                                                <div class="check-drop">
                                                    <input name="playlist" data-type="game" type="radio" id="playlist_game_<?=$playlist->id?>" checked="checked" data-value="<?=$playlist->id?>" value="<?=$playlist->name?>">
                                                    <label for="playlist_game_<?=$playlist->id?>"><?=$playlist->name?></label>
                                                </div>
                                            </div>
                                        <?php  }  ?>

                                        <?php if(0){ // delete ?>
                                            <div class="drop-item">
                                                <div class="check-drop">
                                                    <input name="playlist" type="radio" id="playlist14" checked="checked" value="Лист #A">
                                                    <label for="playlist14">Лист #A</label>
                                                </div>
                                            </div>
                                            <div class="drop-item">
                                                <div class="check-drop">
                                                    <input name="playlist" type="radio" id="playlist24" value="Лига Чемпионов">
                                                    <label for="playlist24">Лига Чемпионов</label>
                                                </div>
                                            </div>
                                            <div class="drop-item">
                                                <div class="check-drop">
                                                    <input name="playlist" type="radio" id="playlist34" value="НБА">
                                                    <label for="playlist34">НБА</label>
                                                </div>
                                            </div>
                                        <?php } ?>

                                    </div>
                                    <div class="drop-item">
                                        <div class="create-playlist">
                                            <div class="input-create">
                                                <input type="text" placeholder="Новый плейлист">
                                            </div>
                                            <div class="btn-create">
                                                <button class="btn-primary btn btn-hover create-btn">Создать</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="statistic-block">
                        <div class="statistic-block-title">Не разыграно</div>
                        <div class="statistic-block-value"><?=$wagerManager->getFormatedNotPlaySum()?><span>betcoins</span></div>
                    </div>



                    <div class="right-head-tab">
                        <div class="for-mobile-drop">
                            <a href="#" class="trig-filter">За месяц</a>

                            <ul class="head-tabs">
                                <li class="<?= $pageInfo->getPlayPeriod()==PageInfo::PERIOD_ONE_MONTH ?'active':''; ?>">
                                    <a href="<?=Url::to(['/account','id'=>$userId,'play-period'=>1,'#'=>'bets'])?>">За месяц</a>
                                </li>
                                <li class="<?= $pageInfo->getPlayPeriod()==PageInfo::PERIOD_THREE_MONTH ?'active':''; ?>">
                                    <a href="<?=Url::to(['/account','id'=>$userId,'play-period'=>3,'#'=>'bets'])?>">3 месяца</a>
                                </li>
                                <li class="<?= $pageInfo->getPlayPeriod()==PageInfo::PERIOD_ALL_MONTH ? 'active':''; ?>">
                                    <a href="<?=Url::to(['/account','id'=>$userId,'#'=>'bets'])?>">За все время</a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="mobile-tab-block">
                    <div class="play-list-drop">
                        <div class="custom-dropdown">
                            <div class="custom-dropdown-inner">
                                <div class="val-drop">
                                    <?php foreach ($playlists as $playlist) {  //<?=$playlist->id //$playlist->name ?>
                                        <?php  if($pageInfo->getPlayPeriodPlaylist() == PageInfo::PLAYLIST_NOT_SELECTED  ){  echo '<button class="val-drop-btn">Лист</button>';   break;  } ?>
                                        <?php  if($pageInfo->getPlayPeriodPlaylist() == $playlist->id  ){  echo '<button class="val-drop-btn">'.$playlist->name.'</button>';   break;  } ?>

                                    <?php  }  ?>
                                </div>
                                <div class="dropdown-list">
                                    <div class="play-list">

                                        <?php foreach ($playlists as $playlist) {  ?>
                                            <div class="drop-item">
                                                <div class="check-drop">
                                                    <input name="playlist" data-type="game" type="radio" id="playlist_game_<?=$playlist->id?>" checked="checked" data-value="<?=$playlist->id?>" value="<?=$playlist->name?>">
                                                    <label for="playlist_game_<?=$playlist->id?>"><?=$playlist->name?></label>
                                                </div>
                                            </div>
                                        <?php  }  ?>

                                    </div>
                                    <div class="drop-item">
                                        <div class="create-playlist">
                                            <div class="input-create">
                                                <input type="text" placeholder="Новый плейлист">
                                            </div>
                                            <div class="btn-create">
                                                <button class="btn-primary btn btn-hover create-btn">Создать</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="right-head-tab">
                        <div class="for-mobile-drop">

                            <?php if($pageInfo->getPlayPeriod()==PageInfo::PERIOD_ONE_MONTH){ ?>
                                <a href="#"  class="trig-filter">За месяц</a>
                            <?php }elseif ($pageInfo->getPlayPeriod()==PageInfo::PERIOD_THREE_MONTH ){ ?>
                                <a href="#" df="2" class="trig-filter">3 месяца</a>
                            <?php }else{ ?>
                                <a href="#" df="8" class="trig-filter">За все время</a>
                            <?php } ?>

                            <ul class="head-tabs">

                                <li class="<?= $pageInfo->getPlayPeriod()==PageInfo::PERIOD_ONE_MONTH ?'active':''; ?>">
                                    <a onclick="window.location='<?=Url::to(['/account','id'=>$userId,'play-period'=>1,'#'=>'bets'])?>'"  href="<?=Url::to(['/account','id'=>$userId,'play-period'=>1,'#'=>'bets'])?>">За месяц</a>
                                </li>
                                <li class="<?= $pageInfo->getPlayPeriod()==PageInfo::PERIOD_THREE_MONTH ?'active':''; ?>">
                                    <a onclick="window.location='<?=Url::to(['/account','id'=>$userId,'play-period'=>3,'#'=>'bets'])?>'" href="<?=Url::to(['/account','id'=>$userId,'play-period'=>3,'#'=>'bets'])?>">3 месяца</a>
                                </li>
                                <li class="<?= $pageInfo->getPlayPeriod()==PageInfo::PERIOD_ALL_MONTH ? 'active':''; ?>">
                                    <a onclick="window.location='<?=Url::to(['/account','id'=>$userId,'#'=>'bets'])?>'" href="<?=Url::to(['/account','id'=>$userId,'#'=>'bets'])?>">За все время</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>

                <div class="table-body">
                    <div class="row">


                        <?php
                        foreach ($wagersModels as $wagerInfoFront) {
                            /** @var Wager $wager */
                            $wager=$wagerInfoFront['model'];
                            /** @var WagerInfoFrontSingle $front_element **/
                            $front_element=$wagerInfoFront['front_element'];
                            /**  @var UserInfo $userInfo **/
                            $userInfo=$wagerInfoFront['userInfo'];

                            $isSubscriber=   $wager->canShow();
                            ?>
                            <div class="column-4 rate-column">
                                <div class="rate-wrapper">
                                    <div class="rate-inner">
                                        <div class="user-rate">
                                            <div class="user-rate-inner">
                                                <div class="row-ava">


                                                    <div class="rate-avatar">
                                                        <div class="circle-wrapper" data-ptc="<?=$userInfo->getUserLevelNumber()?>">
                                                            <div class="circle"><canvas width="74" height="74"></canvas></div>
                                                        </div>


                                                        <?php if($wager->status == Wager::STATUS_NEW){ ?>
                                                            <div class="avatar-status-bet avatar-status-bet-create"></div>
                                                        <?php  }elseif($wager->status == Wager::STATUS_ENTERED){ ?>
                                                            <div class="avatar-status-bet avatar-status-bet-success"></div>
                                                        <?php  }elseif ($wager->status == Wager::STATUS_NOT_ENTERD){ ?>
                                                            <div class="avatar-status-bet avatar-status-bet-cancel"></div>
                                                        <?php }elseif ($wager->status == Wager::STATUS_RETURN_BET){ ?>
                                                            <div class="avatar-status-bet avatar-status-bet-returno"></div>
                                                        <?php }elseif ($wager->status == Wager::STATUS_MANUAL_BET){ Yii::error(['me stat'=>$wager->status]); ?>
                                                            <div class="avatar-status-bet avatar-status-bet-manualo"></div>
                                                        <?php } ?>



                                                    </div>


                                                    <div class="user-info">
                                                        <h4 class="name-r"><?=$userInfo->getUserName()?></h4>
                                                        <div class="level-user level-user-label">
                                                            <div class="level-text">  <?=$userInfo->getUserLevel()?></div>
                                                            <?php if($userInfo->getisPro()){  ?>
                                                                <span class="label-user label-user-pro">pro</span>
                                                            <?php   }  ?>
                                                        </div>
                                                    </div>







                                                            <?php if($front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_FREE_ORDINAR || $front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_FREE_EXPRESS   ){ ?>
                                                                <a href="#" onclick="return false;" data-toggle="no-modal" data-target="#edit_subscriber" class="bet-status bet-status-editable"> <div class="bet-status-inner">  <span class="icon-open"></span></div></a>
                                                            <?php } ?>
                                                            <?php if($front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_PRIVATE_ORDINAR || $front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_PRIVATE_EXPRESS  ){ ?>




                                                               <?php if($isSubscriber   ){ ?>

                                                                    <a href="#" onclick="return false;"  data-target='<?=Url::to(['/subscribers/default/peto','id'=>Yii::$app->user->id])?>'  data-toggle="modaleAjax" data-target="#edit_subscriber" class="bet-status bet-status-editable"><div class="bet-status-inner"> <span class="icon-lock"></span>  </div></a>
                                                                <?php }else{ ?>

                                                                    <a href="#" onclick="openModaleMoreDetail(this);"  data-target='<?=Url::to(['/subscribers/default/peto','id'=>Yii::$app->user->id])?>'  data-toggle="modaleAjax" data-target="#edit_subscriber" class="bet-status bet-status-editable"><div class="bet-status-inner"> <span class="icon-lock"></span>  </div></a>
                                                                <?php  } ?>

<!--                                                                <a href="#" data-toggle="modal" data-target="#edit_subscriber" class="bet-status bet-status-editable"> <div class="bet-status-inner">  <span class="icon-lock"></span></div></a>-->
                                                            <?php } ?>




                                                </div>
                                                <div class="rate-content">
                                                    <div class="rate-c__item rate-c__item__two">
                                                        <div class="rate-c">
                                                            <div class="title_rate_c"> <?=$front_element->getType() ;?></div>
                                                            <div class="value_rate_c">  <?=$front_element->getSumAndPercent() ?> </div>

                                                            <?php if($isSubscriber || $front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_FREE_ORDINAR || $front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_FREE_EXPRESS  ){ ?>
                                                                    <div class="value_rate_c">  <?=$front_element->getUserPercent() ?> </div>
                                                            <?php }else{  // смотрим чужой акканут закрытую ставку или уже сыграла ?>

                                                            <?php if( $wager->status == Wager::STATUS_ENTERED || $wager->status == Wager::STATUS_NOT_ENTERD || $wager->status == Wager::STATUS_RETURN_BET){ ?>
                                                                    <div class="value_rate_c">  <?=$front_element->getUserPercent() ?> </div>
                                                                <?php }else{ ?>
                                                                    <div class="value_rate_c" id="FormantedNameAndPercent"><?=$front_element->getFormantedCloseText()?></div>
                                                                <?php } ?>
                                                            <?php  } ?>



                                                        </div>
                                                        <div class="rate-c">

                                                            <div class="title_rate_c"><?=$front_element->getStartAt() ?></div>


                                                            <?php if(0){ // еще не понянтно ?>
                                                                <!--                                                                                            может смотреть здесь-->
                                                                <?php if($isSubscriber || $front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_FREE_ORDINAR || $front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_FREE_EXPRESS  ){ ?>
                                                                    <div class="value_rate_c" id="FormantedNameAndPercent"> <?=$front_element->getFormantedNameAndPercent()  ?></div>
                                                                <?php }else{  ?>
                                                                    <div class="value_rate_c" id="FormantedNameAndPercent">Экспресс LP</div>
                                                                <?php  } ?>

                                                            <?php    }else{  ?>

                                                            <!--                                                                                            может смотреть здесь-->
                                                            <?php if($isSubscriber || $front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_FREE_ORDINAR || $front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_FREE_EXPRESS  ){ ?>
                                                                    <div class="value_rate_c" id="FormantedNameAndPercent"> <?=$front_element->getFormantedNameAndPercent()  ?></div>
                                                            <?php }else{ // смотрим чужой акканут закрытую ставку
                                                                    // var_dump($front_element->getType()=='Экспресс'); die();  ?>

                                                                <?php if( $wager->status == Wager::STATUS_ENTERED || $wager->status == Wager::STATUS_NOT_ENTERD || $wager->status == Wager::STATUS_RETURN_BET){ ?>
                                                                        <div class="value_rate_c" id="FormantedNameAndPercent"> <?=$front_element->getFormantedNameAndPercent()  ?></div>
                                                                    <?php }else{ ?>
                                                                        <div class="value_rate_c" id="FormantedNameAndPercent"><?=$front_element->getType()?></div>
                                                                        <?php } ?>



                                                            <?php  } ?>

                                                            <?php } ?>





                                                        </div>
                                                    </div>
                                                    <div class="rate-c__item">
                                                        <div class="rate-c">
                                                            <div class="title_rate_c" > <?=$front_element->getSportAndTurnire()  ?> </div>

                                                            <?php if($front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_FREE_EXPRESS  || $front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_PRIVATE_EXPRESS ){  ?>
                                                            <div class="value_rate_c"> <?=$front_element->getInfoNameFull()  ?> ... +<?=$front_element->getTotalCount()?>  </div>
                                                            <?php }else{ ?>
                                                                <div class="value_rate_c"> <?=$front_element->getInfoNameFull()  ?>  </div>
                                                            <?php }?>
                                                        </div>
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
                                                        </div>


                                                        <?php if($isSubscriber || $front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_FREE_ORDINAR || $front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_FREE_EXPRESS     ){ ?>

                                                        <?php if($isSubscriber || $front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_FREE_ORDINAR ){ ?>

                                                                <?php if($front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_PRIVATE_EXPRESS ||   $front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_FREE_EXPRESS ){ ?>
                                                                    <div class="link-rate">
                                                                        <a href="#"  class="modaleAjax"  data-target="<?=Url::to(['/wager/default/viewdetail','id'=>$front_element->getId() ])?>">+  Показать Экспресс</a>
                                                                    </div>
                                                               <?php  }else{  ?>
                                                                    <div class="link-rate">
                                                                        <a href="#"  class="modaleAjax"  data-target="<?=Url::to(['/wager/default/viewdetail','id'=>$front_element->getId() ])?>">+  Показать Ординар</a>
                                                                    </div>
                                                                <?php } ?>



                                                        <?php }else{  ?>
                                                            <div class="link-rate">
                                                                <a href="#"  class="modaleAjax"  data-target="<?=Url::to(['/wager/default/viewdetail','id'=>$front_element->getId() ])?>">+  Показать Экспресс</a>
                                                            </div>
                                                        <?php } ?>

                                                        <?php }else{ // если закрыто или  уже сыграли  ?>

                                                            <?php if( $wager->status == Wager::STATUS_ENTERED || $wager->status == Wager::STATUS_NOT_ENTERD || $wager->status == Wager::STATUS_RETURN_BET){ ?>

                                                                <?php if($front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_PRIVATE_EXPRESS){  ?>
                                                                    <div class="link-rate">
                                                                        <a href="#" onclick="openModaleMoreDetail(this);" data-target='<?=Url::to(['/wager/default/viewdetail','id'=>$front_element->getId() ])?>'  data-toggle="modaleAjax"  class="modaleAjax">+  Показать Экспресс</a>
                                                                    </div>
                                                                <?php }else{ ?>
                                                                    <div class="link-rate">
                                                                        <a href="#" onclick="openModaleMoreDetail(this);" data-target='<?=Url::to(['/wager/default/viewdetail','id'=>$front_element->getId() ])?>'  data-toggle="modaleAjax"  class="modaleAjax">Показать Ординар</a>
                                                                    </div>
                                                                <?php } ?>


                                                            <?php }else{ ?>
                                                                <div class="link-rate">
                                                                    <a href="#" onclick="openModaleMoreDetail(this);" data-target='<?=Url::to(['/subscribers/default/peto','id'=>Yii::$app->user->id])?>'  data-toggle="modaleAjax"  class="modaleAjax">Узнать прогноз</a>
                                                                </div>
                                                            <?php } ?>




                                                        <?php  } ?>




                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php  } ?>


                        <?php if(0){ ?>
                        <div class="column-4 rate-column">
                            <div class="rate-wrapper">
                                <div class="rate-inner">
                                    <div class="user-rate">
                                        <div class="user-rate-inner">
                                            <div class="row-ava">
                                                <div class="rate-avatar">
                                                    <div class="circle-wrapper" data-ptc="21">
                                                        <div class="circle"><canvas width="74" height="74"></canvas></div>
                                                    </div>
                                                    <div class="avatar-status-bet avatar-status-bet-cancel"></div>
                                                </div>
                                                <div class="user-info">
                                                    <h4 class="name-r">rodrigo_pes</h4>
                                                    <div class="level-user level-user-label">
                                                        <div class="level-text">Уровень 21</div>
                                                        <span class="label-user label-user-pro">pro</span>
                                                    </div>
                                                </div>
                                                <a href="#" data-toggle="modal" data-target="#edit_subscriber" class="bet-status bet-status-editable">
                                                    <div class="bet-status-inner">
                                                        <span class="icon-lock"></span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="rate-content">
                                                <div class="rate-c__item rate-c__item__two">
                                                    <div class="rate-c">
                                                        <div class="title_rate_c">Ординар</div>
                                                        <div class="value_rate_c">7,200 ₽ - 9%</div>
                                                    </div>
                                                    <div class="rate-c">
                                                        <div class="title_rate_c">26.05.2018 <span class="more__text">...+3</span></div>
                                                        <div class="value_rate_c">Тотал Больше 3.5 - x 1.67 <span class="more__text">...+3</span></div>
                                                    </div>
                                                </div>
                                                <div class="rate-c__item">
                                                    <div class="rate-c">
                                                        <div class="title_rate_c">Футбол, Хоккей, Теннис</div>
                                                        <div class="value_rate_c">Реал Мадрид - Ливерпуль <span class="more__text">...+3</span></div>
                                                    </div>
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column-4 rate-column">
                            <div class="rate-wrapper">
                                <div class="rate-inner">
                                    <div class="user-rate">
                                        <div class="user-rate-inner">
                                            <div class="row-ava">
                                                <div class="rate-avatar">
                                                    <div class="circle-wrapper" data-ptc="3">
                                                        <div class="circle"><canvas width="74" height="74"></canvas></div>
                                                    </div>
                                                    <div class="avatar-status-bet avatar-status-bet-success"></div>
                                                </div>
                                                <div class="user-info">
                                                    <h4 class="name-r">john.baklan</h4>
                                                    <div class="level-user level-user-label">
                                                        <div class="level-text">Уровень 3</div>
                                                        <span class="label-user label-user-pro">pro</span>
                                                    </div>
                                                </div>
                                                <a href="#" data-toggle="modal" data-target="#edit_subscriber" class="bet-status bet-status-editable">
                                                    <div class="bet-status-inner">
                                                        <span class="icon-open"></span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="rate-content">
                                                <div class="rate-c__item rate-c__item__two">
                                                    <div class="rate-c">
                                                        <div class="title_rate_c">Ординар</div>
                                                        <div class="value_rate_c">7,200 ₽ - 37%</div>
                                                    </div>
                                                    <div class="rate-c">
                                                        <div class="title_rate_c">26.05.2018</div>
                                                        <div class="value_rate_c">Тотал Больше 3.5 - x 1.67</div>
                                                    </div>
                                                </div>
                                                <div class="rate-c__item">
                                                    <div class="rate-c">
                                                        <div class="title_rate_c">Футбол - Лига Чемпионов</div>
                                                        <div class="value_rate_c">Реал Мадрид - Ливерпуль</div>
                                                    </div>
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column-4 rate-column">
                            <div class="rate-wrapper">
                                <div class="rate-inner">
                                    <div class="user-rate">
                                        <div class="user-rate-inner">
                                            <div class="row-ava">
                                                <div class="rate-avatar">
                                                    <div class="circle-wrapper" data-ptc="10">
                                                        <div class="circle"><canvas width="74" height="74"></canvas></div>
                                                    </div>
                                                    <div class="avatar-status-bet avatar-status-bet-cancel"></div>
                                                </div>
                                                <div class="user-info">
                                                    <h4 class="name-r">john.baklan</h4>
                                                    <div class="level-user level-user-label">
                                                        <div class="level-text">Уровень 10</div>
                                                        <span class="label-user label-user-pro">pro</span>
                                                    </div>
                                                </div>
                                                <a href="#" data-toggle="modal" data-target="#edit_subscriber" class="bet-status bet-status-editable">
                                                    <div class="bet-status-inner">
                                                        <span class="icon-lock"></span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="rate-content">
                                                <div class="rate-c__item rate-c__item__two">
                                                    <div class="rate-c">
                                                        <div class="title_rate_c">Ординар</div>
                                                        <div class="value_rate_c">7,200 ₽ - 37%</div>
                                                    </div>
                                                    <div class="rate-c">
                                                        <div class="title_rate_c">26.05.2018</div>
                                                        <div class="value_rate_c">Тотал Больше 3.5 - x 1.67</div>
                                                    </div>
                                                </div>
                                                <div class="rate-c__item">
                                                    <div class="rate-c">
                                                        <div class="title_rate_c">Футбол - Лига Чемпионов</div>
                                                        <div class="value_rate_c">Реал Мадрид - Ливерпуль</div>
                                                    </div>
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="user-rate-info">
                                        <div class="user-rate-info-inner">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column-4 rate-column">
                            <div class="rate-wrapper">
                                <div class="rate-inner">
                                    <div class="user-rate">
                                        <div class="user-rate-inner">
                                            <div class="row-ava">
                                                <div class="rate-avatar">
                                                    <div class="circle-wrapper" data-ptc="18">
                                                        <div class="circle"><canvas width="74" height="100"></canvas></div>
                                                    </div>
                                                    <div class="avatar-status-bet avatar-status-bet-success"></div>
                                                </div>
                                                <div class="user-info">
                                                    <h4 class="name-r">john.baklan</h4>
                                                    <div class="level-user level-user-label">
                                                        <div class="level-text">Уровень 18</div>
                                                        <span class="label-user label-user-pro">pro</span>
                                                    </div>
                                                </div>
                                                <a href="#" data-toggle="modal" data-target="#edit_subscriber" class="bet-status bet-status-editable">
                                                    <div class="bet-status-inner">
                                                        <span class="icon-personal"></span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="rate-content">
                                                <div class="rate-c__item rate-c__item__two">
                                                    <div class="rate-c">
                                                        <div class="title_rate_c">Ординар</div>
                                                        <div class="value_rate_c">7,200 ₽ - 37%</div>
                                                    </div>
                                                    <div class="rate-c">
                                                        <div class="title_rate_c">26.05.2018</div>
                                                        <div class="value_rate_c">Тотал Больше 3.5 - x 1.67</div>
                                                    </div>
                                                </div>
                                                <div class="rate-c__item">
                                                    <div class="rate-c">
                                                        <div class="title_rate_c">Футбол - Лига Чемпионов</div>
                                                        <div class="value_rate_c">Реал Мадрид - Ливерпуль</div>
                                                    </div>
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
                                                    </div>
                                                    <div class="link-rate">
                                                        <a href="#" data-toggle="modal" data-target="#bet20">+  Подробнее</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="user-rate-info">
                                        <div class="user-rate-info-inner">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column-4 rate-column">
                            <div class="rate-wrapper">
                                <div class="rate-inner">
                                    <div class="user-rate">
                                        <div class="user-rate-inner">
                                            <div class="row-ava">
                                                <div class="rate-avatar">
                                                    <div class="circle-wrapper" data-ptc="19">
                                                        <div class="circle"><canvas width="74" height="74"></canvas></div>
                                                    </div>
                                                    <div class="avatar-status-bet avatar-status-bet-success"></div>
                                                </div>
                                                <div class="user-info">
                                                    <h4 class="name-r">john.baklan</h4>
                                                    <div class="level-user level-user-label">
                                                        <div class="level-text">Уровень 19</div>
                                                        <span class="label-user label-user-pro">pro</span>
                                                    </div>
                                                </div>
                                                <a href="#" data-toggle="modal" data-target="#edit_subscriber" class="bet-status bet-status-editable">
                                                    <div class="bet-status-inner">
                                                        <span class="icon-lock"></span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="rate-content">
                                                <div class="rate-c__item rate-c__item__two">
                                                    <div class="rate-c">
                                                        <div class="title_rate_c">Ординар</div>
                                                        <div class="value_rate_c">7,200 ₽ - 37%</div>
                                                    </div>
                                                    <div class="rate-c">
                                                        <div class="title_rate_c">26.05.2018</div>
                                                        <div class="value_rate_c">Тотал Больше в 2 раза или 3.5 - x 1.67</div>
                                                    </div>
                                                </div>
                                                <div class="rate-c__item">
                                                    <div class="rate-c">
                                                        <div class="title_rate_c">Футбол - Лига Чемпионов</div>
                                                        <div class="value_rate_c">Реал Мадрид - Ливерпуль</div>
                                                    </div>
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
                                                    </div>
                                                    <div class="link-rate">
                                                        <a href="#" data-toggle="modal" data-target="#bet1">+  Подробнее</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="user-rate-info">
                                        <div class="user-rate-info-inner">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>


                <div class="table-footer">
                    <div class="pagination">
                        <?php

                        // display pagination
                        echo LinkPager::widget(['pagination' => $paginationPages,'firstPageCssClass'=>'first-pag' ,
                            'lastPageCssClass'=>'last-pag',
                            'options' => ['class' => 'pagination-list']]);
                        ?>


                    </div>



                    <div class="pagination hidden">
                        <ul class="pagination-list">
                            <li class="first-pag">
                                <a href="#">
                                    <span class="icon-arrow_left-small"></span>
                                </a>
                            </li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#" class="no-num-pag">...</a></li>
                            <li><a href="#">10</a></li>
                            <li class="last-pag">
                                <a href="#"><span class="icon-arrow_right-small"></span></a>
                            </li>
                        </ul>
                    </div>
                </div>




            </div>
        </div>
    </div>
</div>






<?php if(0){ // cтарая верстка  ?>
    <div class="row table-row" id="my-bet">
        <div class="column-12" id="bets">
            <div class="table-wrapper stats-table tbl-width-pl table-transparent my-bet">
                <div class="table-inner table-transparent">
                    <div class="table-head head-with-tabs head-w_playlist">
                        <div class="tbl-icon">
                            <img src="/images/soccer-ball.svg" alt="">
                        </div>
                        <div class="left-head-text">
                            <span class="text-head">Мои Ставки <sup><?=$wagerManager->getCountAllElements()?></sup></span>
                        </div>



                        <div class="play-list-drop">
                            <!--<button class="drop-trig-lay">Лист #A</button>-->
                            <!--<div class="drop-play">-->
                            <!--<ul class="drop-list">-->
                            <!--<li>-->
                            <!--<a class="pl-item" href="#">Лист #A</a>-->
                            <!--<a class="pl-item" href="#">Плейлист #B</a>-->
                            <!--<a class="pl-item" href="#">Плейлист #C</a>-->
                            <!--</li>-->
                            <!--</ul>-->
                            <!--</div>-->
                            <div class="custom-dropdown">
                                <div class="custom-dropdown-inner">


                                    <div class="val-drop">
                                        <?php foreach ($playlists as $playlist) {  //<?=$playlist->id //$playlist->name ?>
                                            <?php  if($pageInfo->getPlayPeriodPlaylist() == PageInfo::PLAYLIST_NOT_SELECTED  ){  echo '<button class="val-drop-btn">Лист</button>';   break;  } ?>
                                            <?php  if($pageInfo->getPlayPeriodPlaylist() == $playlist->id  ){  echo '<button class="val-drop-btn">'.$playlist->name.'</button>';   break;  } ?>

                                        <?php  }  ?>


                                    </div>

                                    <div class="dropdown-list">
                                        <div class="play-list">

                                            <?php foreach ($playlists as $playlist) {  ?>
                                                <div class="drop-item">
                                                    <div class="check-drop">
                                                        <input name="playlist" data-type="game" type="radio" id="playlist_game_<?=$playlist->id?>" checked="checked" data-value="<?=$playlist->id?>" value="<?=$playlist->name?>">
                                                        <label for="playlist_game_<?=$playlist->id?>"><?=$playlist->name?></label>
                                                    </div>
                                                </div>
                                            <?php  }  ?>

                                            <?php if(0){ // delete ?>
                                                <div class="drop-item">
                                                    <div class="check-drop">
                                                        <input name="playlist" type="radio" id="playlist14" checked="checked" value="Лист #A">
                                                        <label for="playlist14">Лист #A</label>
                                                    </div>
                                                </div>
                                                <div class="drop-item">
                                                    <div class="check-drop">
                                                        <input name="playlist" type="radio" id="playlist24" value="Лига Чемпионов">
                                                        <label for="playlist24">Лига Чемпионов</label>
                                                    </div>
                                                </div>
                                                <div class="drop-item">
                                                    <div class="check-drop">
                                                        <input name="playlist" type="radio" id="playlist34" value="НБА">
                                                        <label for="playlist34">НБА</label>
                                                    </div>
                                                </div>
                                            <?php } ?>

                                        </div>
                                        <div class="drop-item">
                                            <div class="create-playlist">
                                                <div class="input-create">
                                                    <input type="text" placeholder="Новый плейлист">
                                                </div>
                                                <div class="btn-create">
                                                    <button class="btn-primary btn btn-hover create-btn">Создать</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="right-head-tab">
                            <div class="for-mobile-drop">
                                <a href="#" class="trig-filter">За месяц</a>

                                <ul class="head-tabs">
                                    <li class="<?= $pageInfo->getPlayPeriod()==PageInfo::PERIOD_ONE_MONTH ?'active':''; ?>">
                                        <a href="<?=Url::to(['/account','play-period'=>1,'#'=>'bets'])?>">За месяц</a>
                                    </li>
                                    <li class="<?= $pageInfo->getPlayPeriod()==PageInfo::PERIOD_THREE_MONTH ?'active':''; ?>">
                                        <a href="<?=Url::to(['/account','play-period'=>3,'#'=>'bets'])?>">3 месяца</a>
                                    </li>
                                    <li class="<?= $pageInfo->getPlayPeriod()==PageInfo::PERIOD_ALL_MONTH ? 'active':''; ?>">
                                        <a href="<?=Url::to(['/account','#'=>'bets'])?>">За все время</a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>


                    <div class="table-body">
                        <div class="row">


                            <?php
                            foreach ($wagersModels as $wagerInfoFront) {
                                /** @var Wager $wager */
                                $wager=$wagerInfoFront['model'];
                                /** @var WagerInfoFrontSingle $front_element **/
                                $front_element=$wagerInfoFront['front_element'];
                                /**  @var UserInfo $userInfo **/
                                $userInfo=$wagerInfoFront['userInfo'];

                                ?>
                                <div class="column-4 rate-column">
                                    <div class="rate-wrapper">
                                        <div class="rate-inner">
                                            <div class="user-rate">
                                                <div class="user-rate-inner">
                                                    <div class="row-ava">
                                                        <div class="rate-avatar">
                                                            <div class="circle-wrapper" data-ptc="5">
                                                                <div class="circle"><canvas width="74" height="74"></canvas></div>
                                                            </div>
                                                            <div class="avatar-status-bet avatar-status-bet-success"></div>
                                                        </div>
                                                        <div class="user-info">
                                                            <h4 class="name-r"><?=$userInfo->getUserName()?></h4>
                                                            <div class="level-user level-user-label">

                                                                <div class="level-text">  <?=$userInfo->getUserLevel()?></div>
                                                                <?php if($userInfo->getisPro()){  ?>
                                                                    <span class="label-user label-user-pro">pro</span>
                                                                <?php   }  ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="rate-content">
                                                        <div class="rate-c__item rate-c__item__two" style="flex-direction: column;">
                                                            <div class="rate-c">
                                                                <div class="title_rate_c"> <?=$front_element->getType() ;?></div>
                                                                <div class="value_rate_c">  <?=$front_element->getSumAndPercent() ?> </div>
                                                            </div>

                                                            <div class="rate-c2" style="padding-top: 0.5em;">
                                                                <div class="title_rate_c"><?=$front_element->getCreatedAt() ?></div>
                                                                <div class="value_rate_c"> <?=$front_element->getFormantedNameAndPercent()  ?></div>
                                                            </div>
                                                        </div>
                                                        <div class="rate-c__item">
                                                            <div class="rate-c">
                                                                <div class="title_rate_c"> <?=$front_element->getSportAndTurnire()  ?> </div>
                                                                <div class="value_rate_c"> <?=$front_element->getNameTeams()  ?>  </div>
                                                            </div>
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
                                                            </div>
                                                            <div class="link-rate">
                                                                <a class="hidden"  href="#" data-toggle="modal" data-target="#bet1">+  Подробнее</a><br>
                                                                <a href="#"  class="modaleAjax"  data-target="<?=Url::to(['/wager/default/viewdetail','id'=>$front_element->getId() ])?>">+  Подробнее</a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php  } ?>



                            <?php if(0){  ?>
                                <div class="column-4 rate-column">
                                    <div class="rate-wrapper">
                                        <div class="rate-inner">
                                            <div class="user-rate">
                                                <div class="user-rate-inner">
                                                    <div class="row-ava">
                                                        <div class="rate-avatar">
                                                            <div class="circle-wrapper" data-ptc="5">
                                                                <div class="circle"><canvas width="74" height="74"></canvas></div>
                                                            </div>
                                                            <div class="avatar-status-bet avatar-status-bet-success"></div>
                                                        </div>
                                                        <div class="user-info">
                                                            <h4 class="name-r">john.baklan</h4>
                                                            <div class="level-user level-user-label">
                                                                <div class="level-text">Уровень 5</div>
                                                                <span class="label-user label-user-pro">pro</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="rate-content">
                                                        <div class="rate-c__item rate-c__item__two">
                                                            <div class="rate-c">
                                                                <div class="title_rate_c">Ординар</div>
                                                                <div class="value_rate_c">7,200 ₽ - 37%</div>
                                                            </div>
                                                            <div class="rate-c">
                                                                <div class="title_rate_c">26.05.2018</div>
                                                                <div class="value_rate_c">Тотал Больше 3.5 - x 1.67</div>
                                                            </div>
                                                        </div>
                                                        <div class="rate-c__item">
                                                            <div class="rate-c">
                                                                <div class="title_rate_c">Футбол - Лига Чемпионов</div>
                                                                <div class="value_rate_c">Реал Мадрид - Ливерпуль</div>
                                                            </div>
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
                                                            </div>
                                                            <div class="link-rate">
                                                                <a href="#" data-toggle="modal" data-target="#bet1">+  Подробнее</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="column-4 rate-column">
                                    <div class="rate-wrapper">
                                        <div class="rate-inner">
                                            <div class="user-rate">
                                                <div class="user-rate-inner">
                                                    <div class="row-ava">
                                                        <div class="rate-avatar">
                                                            <div class="circle-wrapper" data-ptc="21">
                                                                <div class="circle"><canvas width="74" height="74"></canvas></div>
                                                            </div>
                                                            <div class="avatar-status-bet avatar-status-bet-cancel"></div>
                                                        </div>
                                                        <div class="user-info">
                                                            <h4 class="name-r">rodrigo_pes</h4>
                                                            <div class="level-user level-user-label">
                                                                <div class="level-text">Уровень 21</div>
                                                                <span class="label-user label-user-pro">pro</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="rate-content">
                                                        <div class="rate-c__item rate-c__item__two">
                                                            <div class="rate-c">
                                                                <div class="title_rate_c">Ординар</div>
                                                                <div class="value_rate_c">7,200 ₽ - 9%</div>
                                                            </div>
                                                            <div class="rate-c">
                                                                <div class="title_rate_c">26.05.2018 <span class="more__text">...+3</span></div>
                                                                <div class="value_rate_c">Тотал Больше 3.5 - x 1.67 <span class="more__text">...+3</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="rate-c__item">
                                                            <div class="rate-c">
                                                                <div class="title_rate_c">Футбол, Хоккей, Теннис</div>
                                                                <div class="value_rate_c">Реал Мадрид - Ливерпуль <span class="more__text">...+3</span></div>
                                                            </div>
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
                                                            </div>
                                                            <div class="link-rate">
                                                                <a href="#" data-toggle="modal" data-target="#bet4">+  Подробнее</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="column-4 rate-column">
                                    <div class="rate-wrapper">
                                        <div class="rate-inner">
                                            <div class="user-rate">
                                                <div class="user-rate-inner">
                                                    <div class="row-ava">
                                                        <div class="rate-avatar">
                                                            <div class="circle-wrapper" data-ptc="3">
                                                                <div class="circle"><canvas width="74" height="74"></canvas></div>
                                                            </div>
                                                            <div class="avatar-status-bet avatar-status-bet-success"></div>
                                                        </div>
                                                        <div class="user-info">
                                                            <h4 class="name-r">john.baklan</h4>
                                                            <div class="level-user level-user-label">
                                                                <div class="level-text">Уровень 3</div>
                                                                <span class="label-user label-user-pro">pro</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="rate-content">
                                                        <div class="rate-c__item rate-c__item__two">
                                                            <div class="rate-c">
                                                                <div class="title_rate_c">Ординар</div>
                                                                <div class="value_rate_c">7,200 ₽ - 37%</div>
                                                            </div>
                                                            <div class="rate-c">
                                                                <div class="title_rate_c">26.05.2018</div>
                                                                <div class="value_rate_c">Тотал Больше 3.5 - x 1.67</div>
                                                            </div>
                                                        </div>
                                                        <div class="rate-c__item">
                                                            <div class="rate-c">
                                                                <div class="title_rate_c">Футбол - Лига Чемпионов</div>
                                                                <div class="value_rate_c">Реал Мадрид - Ливерпуль</div>
                                                            </div>
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
                                                            </div>
                                                            <div class="link-rate">
                                                                <a href="#" data-toggle="modal" data-target="#bet4">+  Подробнее</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="column-4 rate-column">
                                    <div class="rate-wrapper">
                                        <div class="rate-inner">
                                            <div class="user-rate">
                                                <div class="user-rate-inner">
                                                    <div class="row-ava">
                                                        <div class="rate-avatar">
                                                            <div class="circle-wrapper" data-ptc="10">
                                                                <div class="circle"><canvas width="74" height="74"></canvas></div>
                                                            </div>
                                                            <div class="avatar-status-bet avatar-status-bet-cancel"></div>
                                                        </div>
                                                        <div class="user-info">
                                                            <h4 class="name-r">john.baklan</h4>
                                                            <div class="level-user level-user-label">
                                                                <div class="level-text">Уровень 10</div>
                                                                <span class="label-user label-user-pro">pro</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="rate-content">
                                                        <div class="rate-c__item rate-c__item__two">
                                                            <div class="rate-c">
                                                                <div class="title_rate_c">Ординар</div>
                                                                <div class="value_rate_c">7,200 ₽ - 37%</div>
                                                            </div>
                                                            <div class="rate-c">
                                                                <div class="title_rate_c">26.05.2018</div>
                                                                <div class="value_rate_c">Тотал Больше 3.5 - x 1.67</div>
                                                            </div>
                                                        </div>
                                                        <div class="rate-c__item">
                                                            <div class="rate-c">
                                                                <div class="title_rate_c">Футбол - Лига Чемпионов</div>
                                                                <div class="value_rate_c">Реал Мадрид - Ливерпуль</div>
                                                            </div>
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
                                                            </div>
                                                            <div class="link-rate">
                                                                <a href="#" data-toggle="modal" data-target="#bet3">+  Подробнее</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="user-rate-info">
                                                <div class="user-rate-info-inner">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="column-4 rate-column">
                                    <div class="rate-wrapper">
                                        <div class="rate-inner">
                                            <div class="user-rate">
                                                <div class="user-rate-inner">
                                                    <div class="row-ava">
                                                        <div class="rate-avatar">
                                                            <div class="circle-wrapper" data-ptc="18">
                                                                <div class="circle"><canvas width="74" height="100"></canvas></div>
                                                            </div>
                                                            <div class="avatar-status-bet avatar-status-bet-success"></div>
                                                        </div>
                                                        <div class="user-info">
                                                            <h4 class="name-r">john.baklan</h4>
                                                            <div class="level-user level-user-label">
                                                                <div class="level-text">Уровень 18</div>
                                                                <span class="label-user label-user-pro">pro</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="rate-content">
                                                        <div class="rate-c__item rate-c__item__two">
                                                            <div class="rate-c">
                                                                <div class="title_rate_c">Ординар</div>
                                                                <div class="value_rate_c">7,200 ₽ - 37%</div>
                                                            </div>
                                                            <div class="rate-c">
                                                                <div class="title_rate_c">26.05.2018</div>
                                                                <div class="value_rate_c">Тотал Больше 3.5 - x 1.67</div>
                                                            </div>
                                                        </div>
                                                        <div class="rate-c__item">
                                                            <div class="rate-c">
                                                                <div class="title_rate_c">Футбол - Лига Чемпионов</div>
                                                                <div class="value_rate_c">Реал Мадрид - Ливерпуль</div>
                                                            </div>
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
                                                            </div>
                                                            <div class="link-rate">
                                                                <a href="#" data-toggle="modal" data-target="#bet2">+  Подробнее</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="user-rate-info">
                                                <div class="user-rate-info-inner">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="column-4 rate-column">
                                    <div class="rate-wrapper">
                                        <div class="rate-inner">
                                            <div class="user-rate">
                                                <div class="user-rate-inner">
                                                    <div class="row-ava">
                                                        <div class="rate-avatar">
                                                            <div class="circle-wrapper" data-ptc="19">
                                                                <div class="circle"><canvas width="74" height="74"></canvas></div>
                                                            </div>
                                                            <div class="avatar-status-bet avatar-status-bet-success"></div>
                                                        </div>
                                                        <div class="user-info">
                                                            <h4 class="name-r">john.baklan</h4>
                                                            <div class="level-user level-user-label">
                                                                <div class="level-text">Уровень 19</div>
                                                                <span class="label-user label-user-pro">pro</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="rate-content">
                                                        <div class="rate-c__item rate-c__item__two">
                                                            <div class="rate-c">
                                                                <div class="title_rate_c">Ординар</div>
                                                                <div class="value_rate_c">7,200 ₽ - 37%</div>
                                                            </div>
                                                            <div class="rate-c">
                                                                <div class="title_rate_c">26.05.2018</div>
                                                                <div class="value_rate_c">Тотал Больше 3.5 - x 1.67</div>
                                                            </div>
                                                        </div>
                                                        <div class="rate-c__item">
                                                            <div class="rate-c">
                                                                <div class="title_rate_c">Футбол - Лига Чемпионов</div>
                                                                <div class="value_rate_c">Реал Мадрид - Ливерпуль</div>
                                                            </div>
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
                                                            </div>
                                                            <div class="link-rate">
                                                                <a href="#" data-toggle="modal" data-target="#bet1">+  Подробнее</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="user-rate-info">
                                                <div class="user-rate-info-inner">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                    </div>





                    <div class="table-footer">
                        <div class="pagination">
                            <?php

                            // display pagination
                            echo LinkPager::widget(['pagination' => $paginationPages,'firstPageCssClass'=>'first-pag' ,
                                'lastPageCssClass'=>'last-pag',
                                'options' => ['class' => 'pagination-list']]);
                            ?>


                        </div>


                        <div class="pagination hidden">
                            <ul class="pagination-list">
                                <li class="first-pag">
                                    <a href="#">
                                        <span class="icon-arrow_left-small"></span>
                                    </a>
                                </li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#" class="no-num-pag">...</a></li>
                                <li><a href="#">10</a></li>
                                <li class="last-pag">
                                    <a href="#"><span class="icon-arrow_right-small"></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>




                </div>
            </div>
        </div>
    </div>
<?php } ?>



