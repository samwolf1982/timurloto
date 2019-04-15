<?php

use common\models\DTO\WagerInfoFrontSingle;
use common\models\helpers\ConstantsHelper;
use common\models\Wager;
use yii\helpers\Html;
use yii\helpers\Url;


?>

<div class="row table-row">
    <div class="column-8">
        <div class="table-wrapper last-bet">
            <div class="table-inner table-transparent">
                <div class="table-head head-with-tabs">
                    <div class="tbl-icon">
                        <img src="/images/soccer-ball.svg" alt="">
                    </div>
                    <div class="left-head-text">
                        <span class="text-head">Последние Ставки</span>
                    </div>
                    <div class="right-head-tab">
                        <ul class="head-tabs">


                            <li class="<?= (!$proLevel?'active':'');?>">
                                <a href="<?=Url::toRoute(['/bet'])?>">Все Прогнозы</a>
                            </li>

                            <li class="<?= ($proLevel?'active':'');?>" >
                                <a href="<?=Url::toRoute(['/bet','level'=>'pro'])?>">Только PRO</a>
                            </li>

                        </ul>
                    </div>
                </div>


                <div class="table-body">
                    <div class="row">


                        <?php   foreach ($wagersModels as $wagerInfoFront) {
                            /** @var Wager $wager */
                            $wager=$wagerInfoFront['model'];

                            //var_dump($wager->canShow()); die();
                            /** @var WagerInfoFrontSingle $front_element **/
                            $front_element=$wagerInfoFront['front_element'];
                            /**  @var UserInfo $userInfo **/
                            $userInfo=$wagerInfoFront['userInfo'];
//                            var_dump($userInfo); die();

                            $isSubscriber=   $wager->canShow();
                            //var_dump($isSubscriber);
                            ?>
                            <div class="column-6 rate-column">
                                <div class="rate-wrapper">
                                    <div class="rate-inner">
                                        <div class="user-rate">
                                            <div class="user-rate-inner">

                                                <div class="row-ava">
                                                    <div class="rate-avatar">
                                                        <a href="<?= $userInfo->getUserUrl()?>">
                                                        <div class="circle-wrapper" data-ptc="<?=$userInfo->getUserLevelNumber()?>">
                                                            <div class="circle"></div>
                                                        </div>
                                                        <div class="avatar-user">
                                                            <img style="border-radius: 100%;" src="/<?=$userInfo->getUserImage()?>" alt="<?=$userInfo->getUserName()?>">
                                                        </div>
                                                        </a>
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
                                                                 <a href="#" onclick="return false;" data-toggle="no-modale"  data-target="#edit_subscriber" class="bet-status bet-status-editable"><div class="bet-status-inner"> <span class="icon-open"></span>  </div></a>
                                                            <?php } ?>
                                                            <?php if($front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_PRIVATE_ORDINAR || $front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_PRIVATE_EXPRESS  ){ ?>

                                                                <?php if($isSubscriber){ // cвоя или уже подписан ?>
                                                                    <a href="#" onclick="return false;"  data-target='<?=Url::to(['/subscribers/default/peto','id'=>Yii::$app->user->id])?>'  data-toggle="modaleAjax" data-target="#edit_subscriber" class="bet-status bet-status-editable"><div class="bet-status-inner"> <span class="icon-lock"></span>  </div></a>
                                                                <?php  }else{ ?>
                                                                    <a href="#" onclick="openModaleMoreDetail(this);"  data-target='<?=Url::to(['/subscribers/default/peto','id'=>Yii::$app->user->id])?>'  data-toggle="modaleAjax" data-target="#edit_subscriber" class="bet-status bet-status-editable"><div class="bet-status-inner"> <span class="icon-lock"></span>  </div></a>
                                                                <?php } ?>


                                                            <?php } ?>


                                                </div>




                                                <div class="rate-content">
                                                    <div class="rate-c__item rate-c__item__two">
                                                        <div class="rate-c">
                                                            <div class="title_rate_c"> <?=$front_element->getType() ;?></div>
                                                            <div class="value_rate_c"><?=$front_element->getSumAndPercent() ?></div>

                                                            <?php if($isSubscriber || $front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_FREE_ORDINAR || $front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_FREE_EXPRESS  ){ ?>

                                                                <?php if($front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_FREE_EXPRESS){ ?>
                                                                    <div class="value_rate_c">  <?=$front_element->getUserPercent() ?> </div>
                                                                <?php }else{ ?>
                                                                    <div class="value_rate_c">  <?=$front_element->getUserPercent() ?> </div>
                                                                <?php } ?>
                                                            <?php }else{  // смотрим чужой акканут закрытую ставку ?>


                                                                <?php if( $wager->status == Wager::STATUS_ENTERED || $wager->status == Wager::STATUS_NOT_ENTERD || $wager->status == Wager::STATUS_RETURN_BET){ ?>
                                                                    <div class="value_rate_c">  <?=$front_element->getUserPercent() ?> </div>
                                                                <?php }else{ ?>
                                                                    <div class="value_rate_c" id="FormantedNameAndPercent"><?=$front_element->getFormantedCloseText()?></div>
                                                                <?php } ?>

                                                            <?php  } ?>


                                                        </div>
                                                        <div class="rate-c">
                                                            <div class="title_rate_c"><?=$front_element->getStartAt() ?></div>
                                                            <?php if($isSubscriber || $front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_FREE_ORDINAR || $front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_FREE_EXPRESS  ){ ?>

                                                                <?php if($front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_FREE_EXPRESS){ ?>
                                                                    <div class="value_rate_c" id="FormantedNameAndPercent">Экспресс</div>
                                                                <?php }else{ ?>

                                                                    <div class="value_rate_c" id="FormantedNameAndPercent"> <?=$front_element->getFormantedNameAndPercent()  ?></div>
                                                                <?php } ?>
                                                            <?php }else{  // смотрим чужой акканут закрытую ставку ?>
                                                            <?php if( $wager->status == Wager::STATUS_ENTERED || $wager->status == Wager::STATUS_NOT_ENTERD || $wager->status == Wager::STATUS_RETURN_BET){ ?>
                                                                    <div class="value_rate_c" id="FormantedNameAndPercent"> <?=$front_element->getFormantedNameAndPercent()  ?></div>
                                                            <?php }else{ ?>
                                                                    <div class="value_rate_c" id="FormantedNameAndPercent"><?=$front_element->getType()?></div>
                                                                <?php } ?>

                                                            <?php  } ?>
                                                        </div>
                                                    </div>
                                                    <div class="rate-c__item">
                                                        <div class="rate-c">
                                                            <div class="title_rate_c"><?=$front_element->getSportAndTurnire()  ?></div>
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


                                                        <?php if($isSubscriber || $front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_FREE_ORDINAR || $front_element->getTypeExtend()== ConstantsHelper::BET_TYPE_FREE_EXPRESS  ){ ?>

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

                                                        <?php }else{  ?>

                                                        <?php if( $wager->status == Wager::STATUS_ENTERED || $wager->status == Wager::STATUS_NOT_ENTERD || $wager->status == Wager::STATUS_RETURN_BET){ ?>
                                                                <div class="link-rate">
                                                                    <a href="#" onclick="openModaleMoreDetail(this);" data-target="<?=Url::to(['/wager/default/viewdetail','id'=>$front_element->getId() ])?>" data-toggle="modaleAjax">Узнать прогноз</a>
                                                                </div>
                                                        <?php }else{  ?>
                                                                <div class="link-rate">
                                                                    <a href="#" onclick="openModaleMoreDetail(this);" data-target="<?=Url::to(['/subscribers/default/peto','id'=>Yii::$app->user->id])?>" data-toggle="modaleAjax">Узнать прогноз</a>
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
                        <?php } ?>


                        <div class="column-12 rate-column all-column" id="wrape_next_bet">
                            <a href="#" class="all-rate-btn" data-offset="<?=ConstantsHelper::COUNT_LOAD_NEXT_IN_BET?>" >
                                <i class="show-text">+  Все последние прогнозы</i>
                                <i class="hide-text">-  Все последние прогнозы</i>
                            </a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="column-4">
        <div class="table-wrapper video-table">
            <div class="table-inner">
                <div class="table-head">
                    <div class="tbl-icon">
                        <img src="/images/top_play.svg" alt="">
                    </div>
                    <div class="left-head-text">
                        <span class="text-head">Прогнозы от Look My Bet</span>
                    </div>
                </div>
                <div class="table-body">
                    <div class="video-item__t">
                        <div class="video-inner__t">


                            <?php if(0){ // exmaple ?>
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/k-29x5iI8dA?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

                            <?php } ?>
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/TxsqgQJLyi0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <div class="cover-video__t" style="background-image: url(/images/video-1@2x.png)">
                                <a href="#" class="round-play" data-toggle="modal" data-target="#main-video">
                                    <span class="icon-play"></span>
                                </a>
                                <div class="title-cover__t">
                                    Барселона - Реал (06.05.2018)
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="video-item__t">
                        <div class="video-inner__t">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/KrqeZ43Q65U" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <div class="cover-video__t" style="background-image: url(/images/video-2@2x.png2)">
                                <a href="#" class="round-play" data-toggle="modal" data-target="#main-video">
                                    <span class="icon-play"></span>
                                </a>
                                <div class="title-cover__t">
                                    Барселона - Реал (06.05.2018)
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-btn">
                    <a href="https://www.youtube.com/channel/UCyJaf537o7MQomzG0goLc-g" target="_blank" class="show-all-video main-btn">Перейти на Youtube канал</a>
                </div>
            </div>
        </div>
    </div>
</div>