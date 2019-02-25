<?php


use common\models\DTO\UserInfoAccount;
use common\models\helpers\ConstantsHelper;
use common\models\services\UserInfo;
use yii\helpers\Html;

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
                    <div class="level-info level8">
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
                        <div class="big-avatar-user">
                            <img src="/images/avatar-placeholder.svg" alt="">
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
                        <li class="add-soc">
                            <a href="#" class="select-btn-plus" data-toggle="modal" data-target="#modal-choose-bet">
                                <span class="icon-add-plus"></span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="user-acc-btn mt-0">
                    <a href="settings.html" class="btn btn-hover btn-default settings-btn">
                        <i class="icon-setting"></i> НАСТРОЙКИ
                        <span></span>
                    </a>
                </div>








            </div>
        </div>
    </div>
</div>


