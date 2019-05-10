<?php


use common\models\DTO\UserInfoAccount;
use common\models\helpers\ConstantsHelper;
use common\models\services\UserInfo;
use yii\helpers\Html;
use yii\helpers\Url;

/**@var  UserInfoAccount $userInfoAccount **/
$userInfoAccount;

/**@var  UserInfo $userInfo**/
$userInfo;
?>

<div class="table-wrapper transparent-bg" style="background-color: #37226A;">
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


                        <?php  if($userInfo->getSocial_vk()):?>
                            <li><a href="<?=$userInfo->getSocial_vk()?>"><span class="icon-vk"></span></a></li>
                        <?php  endif;  ?>
                        <?php  if($userInfo->getSocial_fb()):  ?>
                            <li><a href="<?=$userInfo->getSocial_fb()?>"><span class="icon-fb"></span></a></li>
                        <?php  endif;  ?>
                        <?php  if($userInfo->getSocial_in()):  ?>
                            <li><a href="<?=$userInfo->getSocial_in()?>"><span class="icon-insta"></span></a></li>
                        <?php  endif;  ?>
                        <?php  if($userInfo->getSocial_tv()):  ?>
                            <li><a href="<?=$userInfo->getSocial_tv()?>"><span class="icon-tw"></span></a></li>
                        <?php  endif;  ?>
                        <?php  if($userInfo->getSocial_yt()):  ?>
                            <li><a href="<?=$userInfo->getSocial_yt()?>"><span class="icon-telegram"></span></a></li>
                        <?php  endif;  ?>




                    </ul>
                </div>

                <div class="user-acc-btn mt-0">
                    <a href="<?=Url::to(['/settings'])?>" class="btn btn-hover btn-default settings-btn">
                        <i class="icon-setting"></i> НАСТРОЙКИ
                        <span></span>
                    </a>
                </div>








            </div>
        </div>
    </div>
</div>


