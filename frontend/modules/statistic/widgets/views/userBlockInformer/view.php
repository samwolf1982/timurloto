<?php


use common\models\DTO\UserInfoAccount;
use common\models\helpers\ConstantsHelper;
use yii\helpers\Html;
use yii\helpers\Url;

/**@var  UserInfoAccount $userInfoAccount **/
$userInfoAccount;
/**@var  UserInfo $userInfo**/
$userInfo;

?>

<div class="table-wrapper transparent-bg">
    <div class="table-inner">
        <div class="table-body">
            <div class="user-block-acc">
                <div class="level-row">
                    <!--
                         green label ->  class="level-info"
                         yellow label -> class="level-info medium-level"
                         pink label -> class="level-info low-level"
                           -->
                    <div class="level-info level<?=$userInfo->getUserLevelNumber() ?>">
                        <div class="label-level"><?=$userInfo->getUserLevelNumber() ?> </div>
                        <span>уровень</span>
                    </div>
                    <div class="user-money">

                        <?=$userInfoAccount->getBalance();?>
                        <span class="currency">betcoins</span>
                    </div>
                </div>
                <div class="big-user-avatar">
                    <div class="big-rate-avatar">
                        <!--
                            data-ptc - percentage of occupancy
                            -->
                        <div class="big-circle-wrapper" data-ptc="<?=$userInfo->getUserLevelNumber() ?>">
                            <div class="big-circle"><canvas width="160" height="160"></canvas></div>
                        </div>
                        <div class="big-avatar-user" style="    top: -9px; left: -9px; position: relative;">
                            <img style="border-radius: 50%;     width: 140px;" src="/<?=$userInfo->getUserImage();?>" alt="<?=$userInfoAccount->getName();?>">

                        </div>
                    </div>
                </div>
                <div class="user-acc-name">
                    <h3><span> <?=$userInfoAccount->getName();?></span>
                        <?php if($userInfo->getisPro()) { ?>
                            <span class="label-user-pro">pro</span>
                        <?php  } ?>

                    </h3>
                    <div class="user-nik-name hidden">john.baklan</div>
                </div>
                <div class="user-acc-text">
                    <p><?=$userInfoAccount->getInfoText();?></p>
                </div>
                <!-- Коментируем блок с логотипами юзера -->
                <!-- <div class="book-user">
                        <img src="/images/1b.png" alt="">
                        <img src="/images/2b.png" alt="">
                        <img src="/images/3b.png" alt="">
                    </div> -->
                <!-- Добавляем блок с соц сетями -->
                <div class="user-acc-social">
                    <ul class="social-user">
                        <li><a href="#"><span class="icon-vk"></span></a></li>
                        <li><a href="#"><span class="icon-insta"></span></a></li>
                        <li><a href="#"><span class="icon-tw"></span></a></li>
                        <li><a href="#"><span class="icon-fb"></span></a></li>
                        <li><a href="#"><span class="icon-telegram"></span></a></li>
                        <li><a href="#"><span class="icon-youtube"></span></a></li>
                    </ul>
                </div>
                <div class="user-acc-btn mt-0">







                    <?php if(!Yii::$app->user->isGuest){ ?>
                        <a href="#" onclick="openModaleMoreDetail(this);"  data-target='<?=Url::to(['/subscribers/default/send-message','id'=>Yii::$app->user->id])?>' data-toggle="modaleAjax" data-target="#edit_subscriber"  class="btn btn-hover btn-primary no-before">
                            <i class="icon-mail"></i>Сообщение
                            <span></span>
                        </a>


                        <a href="#" class="btn btn-hover btn-default event-subscribe-btn " id="subscriberMail">
                        <?php if($user->isSubscriberMailfront()){ ?>
                            <i class="text-show  unSubscribeMail">Отписаться</i>
                        <?php }else{ ?>
                            <i class="text-show subscribeMail">Подписаться</i>
                       <?php  } ?>

                            <span></span>
                        </a>

                    <?php }else{  ?>

                        <a href="#" class="btn btn-small btn-primary" id="openMadaInner" data-toggle="modal-reg" data-target="#modal-auth">
                            <i class="icon-mail"></i>Сообщение
                            <span></span>
                        </a>


                    <?php } ?>

                </div>
                <!-- Добавлена ссылка и класс j-center -->
                <div class="link-acc j-center">
                    <?php if(!Yii::$app->user->isGuest){ ?>
                        <a href="#" data-toggle="modal" data-target="#modal-complaint">Пожаловаться</a>
                    <?php }else{ ?>
                        <a href="#"  id="openMadaInner" data-toggle="modal-reg" data-target="#modal-auth">Пожаловаться</a>
                    <?php } ?>


                    <?php if(!Yii::$app->user->isGuest){ ?>
                        <div class="drop-open-block  <?= $user->isSubscriberfront()?'locked-bet':'' ?> ">
                            <a href="#" class="trigg-op-block ">
                                <?php if($user->isSubscriberfront()){ ?>
                                    <span class="shown-text">Открыть Доступ</span>
                                    <span class="hidden-text" >Закрыть Доступ</span>
                                <?php }else{ ?>
                                    <span class="shown-text">Открыть Доступ</span>
                                    <span class="hidden-text" >Закрыть Доступ</span>
                                <?php } ?>
                            </a>


                            <div class="drop-list">

                                <div class="drop-list-inner" id="period_parent" data-parent-id="<?=$userInfoAccount->getUserId();?>">
                                    <div class="list-item">
                                        <button class="trig-val" data-value="<?=ConstantsHelper::ACCESS_TO_DAY?>">день</button>
                                    </div>
                                    <div class="list-item">
                                        <button class="trig-val" data-value="<?=ConstantsHelper::ACCESS_TO_TWO_DAYS?>">2 дня</button>
                                    </div>
                                    <div class="list-item">
                                        <button class="trig-val" data-value="<?=ConstantsHelper::ACCESS_TO_THREE_DAYS?>">3 дня</button>
                                    </div>
                                    <div class="list-item">
                                        <button class="trig-val" data-value="<?=ConstantsHelper::ACCESS_TO_WEEK?>">Неделя</button>
                                    </div>
                                    <div class="list-item">
                                        <button class="trig-val" data-value="<?=ConstantsHelper::ACCESS_TO_TWO_WEEKS?>">2 недели</button>
                                    </div>
                                    <div class="list-item">
                                        <button class="trig-val" data-value="<?=ConstantsHelper::ACCESS_TO_MONTH?>">Месяц</button>
                                    </div>
                                    <div class="list-item">
                                        <button class="trig-val" data-value="<?=ConstantsHelper::ACCESS_TO_THREE_MONTHS?>"> 3 месяца</button>
                                    </div>
                                    <div class="list-item">
                                        <button class="trig-val" data-value="<?=ConstantsHelper::ACCESS_TO_25_YEARS?>">Навсегда</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>



                </div>
            </div>
        </div>
    </div>
</div>


