   <?php
   use yii\helpers\Html;
   use yii\helpers\Url;



   ?>




        <div class="user-block">

            <div class="user-inner">

                <div class="user-status">

                    <div class="faq-block_2">
                        <a href="<?=Url::to(['/bet']) ?>" data-toggle="modal" data-target="#modal-faq"><i class="faq-icon"></i><span>Турниры</span></a>
                    </div>
                    <div class="faq-block">
                        <a href="#" data-toggle="modal" data-target="#modal-faq"><i class="faq-icon"></i><span>FAQ</span></a>
                    </div>

                    <?php
                    if (!Yii::$app->user->isGuest) { ?>
                        <div class="user-status-text"><?=Yii::$app->user->identity->username;?></div>
                    <?php } ?>

                        <?php
                        if (Yii::$app->user->isGuest) { ?>

                            <div class="user-status-icon">
                                <span class="icon-user"></span>
                            </div>




                        <?php }else{ ?>
                            <div class="avatar__user-block drop-menu">
                            <a href="#" class="avatar__user drop-menu-trigger">
                            <span class="avatar__user-inner">
                                <img src="<?=$userimage?>" alt="foto">
                            </span>
                            </a>
<!--                                drop-->
                            <div class="drop-wrapper drop-wrapper-small" style="display: none;">
                                <div class="drop-inner">
                                    <div class="drop-body">
                                        <div class="drop-row drop-message-row user-row">
                                            <div class="drop-link">
                                                <div class="drop-avatar">
                                                    <div class="drop-avatar-inner">
                                                        <img src="<?=$userimage?>" alt="foto">
                                                    </div>
                                                </div>
                                                <div class="drop-item-info">
                                                    <div class="title-block">
                                                        <div class="title-text"><?=Yii::$app->user->identity->username;?></div>
                                                    </div>
                                                    <div class="text-block">
                                                        <p class="muted-text">fj2667187@gmail.com</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="link-drop-list">
                                            <ul class="drop-list">
                                                <li><a href="<?= Url::to('/account'); ?>">перейти в кабинет</a></li>
                                                <li><a href="#" data-toggle="modal" data-target="#modal-chat">сообщения</a></li>
                                                <li><a href="#" data-toggle="modal" data-target="#modal-faq">FAQ</a></li>
                                                <li><a href="<?= Url::to('/settings'); ?>" target="_blank">Настройки</a></li>
                                                <li>
                                                    <?=  Html::beginForm(['/user/security/logout'], 'post',['id'=>'logoutform2']) ?>
                                                    <a href="" href="javascript:{}" onclick="document.getElementById('logoutform2').submit(); return false;" class=""  >
                                                        выйти</a>
                                                    <?= Html::endForm() ?>

                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                        <?php } ?>





                    <?php
                            if (Yii::$app->user->isGuest) { ?>
                        <div class="user-status-text">Вы вошли как гость</div>
                    <?php } ?>


                </div>
                <?php     if (Yii::$app->user->isGuest) { ?>
                    <div class="user-btn">
                        <a href="#" class="btn btn-small btn-primary"  data-toggle="modal" data-target="#modal-auth"><i class="icon-user"></i> <span>ВОЙТИ</span></a>
                    </div>
                <?php }else{ ?>
                    <div class="user-btn">
                       <?=  Html::beginForm(['/user/security/logout'], 'post',['id'=>'logoutform']) ?>
                            <a href="" href="javascript:{}" onclick="document.getElementById('logoutform').submit(); return false;" class="btn btn-small btn-primary "  ><i class="icon-user"></i> <span>ВЫЙТИ</span></a>
                       <?= Html::endForm() ?>

                    </div>
                <?php } ?>



            </div>
        </div>