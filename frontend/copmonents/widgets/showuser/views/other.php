   <?php
   use yii\helpers\Html;
   use yii\helpers\Url;

   ?>


   <div class="user-block">
       <div class="user-inner">
           <div class="hide-btn-search-block">
               <a href="#" class="search-trigger">
                   <span class="icon-search"></span>
               </a>
           </div>
           <div class="add-block">

               <a href="<?=Url::to(['/matches']) ?>" class="btn btn-primary btn-hover">
                   +  <i>Дать Прогноз</i>
                   <span></span>
               </a>

           </div>

           <style>
 .block_2 a{
     padding-right: 40px;
     padding-left: 20px;
     font-weight: 800;
     font-size: 14px;
     color: #FFF;
     letter-spacing: 1px;
     line-height: 14px;
   }
 a {
     color: white;
     text-decoration: none;
 }
 @media (max-width: 767px){
     .dasboard-page .add-block {
         display: initial;
         padding-left: 0.5em;
         padding-right: 0.5em;
     }
 }



           </style>

           <div class="faq-block_2">
               <a href="<?=Url::to(['/bet']) ?>" data-toggle="modal" data-target="#modal-faq"><i class="faq-icon"></i><span>Турниры</span></a>
           </div>
           <div class="faq-block">
               <a href="#" data-toggle="modal" data-target="#modal-faq"><i class="faq-icon"></i><span>FAQ</span></a>
           </div>


           <div class="notif-block drop-menu">
               <a href="#" class="notification has-notification drop-menu-trigger">
                   <span class="icon-notification"></span>
               </a>
               <div class="drop-wrapper drop-wrapper-medium">
                   <div class="drop-inner">
                       <div class="drop-header">
                           <div class="left-head-drop">
                               <div class="drop-title">Уведомления</div>
                           </div>
                       </div>
                       <div class="drop-body">
                           <div class="drop-row drop-message-row">
                               <a href="#" class="drop-link">
                                   <div class="drop-avatar">
                                       <div class="drop-avatar-inner">
                                           <img src="images/avatar-placeholder.svg" alt="">
                                       </div>
                                   </div>
                                   <div class="drop-item-info">
                                       <div class="title-block">
                                           <div class="title-text">Alexandr</div>
                                           <div class="title-date">5 минут назад</div>
                                       </div>
                                       <div class="text-block">
                                           <p class="muted-text">Сделал новый прогноз</p>
                                       </div>
                                   </div>
                               </a>
                           </div>
                           <div class="drop-row drop-message-row">
                               <a href="#" class="drop-link">
                                   <div class="drop-avatar">
                                       <div class="drop-avatar-inner">
                                           <img src="images/avatar-placeholder.svg" alt="">
                                       </div>
                                   </div>
                                   <div class="drop-item-info">
                                       <div class="title-block">
                                           <div class="title-text">Valentin</div>
                                           <div class="title-date">2 часа назад</div>
                                       </div>
                                       <div class="text-block">
                                           <p class="muted-text">Поделился вашим прогнозом</p>
                                       </div>
                                   </div>
                               </a>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <div class="message-block drop-menu">
               <a href="#" class="message has-message drop-menu-trigger">
                   <span class="icon-message"></span>
                   <i class="count-message">8</i>
               </a>
               <div class="drop-wrapper drop-wrapper-large">
                   <div class="drop-inner">
                       <div class="drop-header">
                           <div class="left-head-drop">
                               <div class="drop-title">СООБЩЕНИЯ</div>
                           </div>
                           <div class="right-head-drop">
                               <div class="drop-rirle-link">
                                   <a href="#" data-toggle="modal" data-target="#modal-chat">Все Сообщения</a>
                               </div>
                           </div>
                       </div>
                       <div class="drop-body">
                           <div class="drop-row drop-message-row">
                               <a href="#" class="drop-link">
                                   <div class="drop-avatar">
                                       <span class="count-massage">5</span>
                                       <div class="drop-avatar-inner">
                                           <img src="images/avatar-placeholder.svg" alt="">
                                       </div>
                                   </div>
                                   <div class="drop-item-info">
                                       <div class="title-block">
                                           <div class="title-text">Alexandr</div>
                                           <div class="title-date">26 мар. 2018 г.</div>
                                       </div>
                                       <div class="text-block">
                                           <span class="icon-in_m"></span>
                                           <p>The complexity of mining crypto currency is growing rapidly The complexity of mining crypto currency is growing rapidly</p>
                                       </div>
                                   </div>
                               </a>
                           </div>
                           <div class="drop-row drop-message-row">
                               <a href="#" class="drop-link">
                                   <div class="drop-avatar">
                                       <span class="count-massage">3</span>
                                       <div class="drop-avatar-inner">
                                           <img src="images/avatar-placeholder.svg" alt="">
                                       </div>
                                   </div>
                                   <div class="drop-item-info">
                                       <div class="title-block">
                                           <div class="title-text">Valentin</div>
                                           <div class="title-date">26 мар. 2018 г.</div>
                                       </div>
                                       <div class="text-block">
                                           <span class="icon-in_m"></span>
                                           <p>The complexity of mining crypto currency is growing rapidly The complexity of mining crypto currency is growing rapidly</p>
                                       </div>
                                   </div>
                               </a>
                           </div>
                       </div>
                   </div>
               </div>
           </div>

           <div class="avatar__user-block drop-menu">

               <a href="#" class="avatar__user drop-menu-trigger">
                            <span class="avatar__user-inner">
                                <img src="<?=$userimage?>" alt="foto">
                            </span>
               </a>


               <div class="drop-wrapper drop-wrapper-small">
                   <div class="drop-inner">
                       <div class="drop-body">
                           <div class="drop-row drop-message-row user-row">
                               <div class="drop-link">
                                   <div class="drop-avatar">
                                       <div class="drop-avatar-inner">
                                           <img src="<?=$userimage?>" alt="drop foto">
                                       </div>
                                   </div>
                                   <div class="drop-item-info">
                                       <div class="title-block">
                                           <div class="title-text"><?=$username?></div>
                                       </div>
                                       <div class="text-block">
                                           <p class="muted-text"><?=$useremail?></p>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="link-drop-list">
                               <ul class="drop-list">
                                   <li><a href="<?=Url::to(['/account'])?>">перейти в кабинет</a></li>
                                   <li><a href="#" data-toggle="modal" data-target="#modal-chat">сообщения</a></li>
                                   <li><a href="#" data-toggle="modal" data-target="#modal-faq">FAQ</a></li>
                                   <li><a href="<?=Url::to(['/settings'])?>" target="_blank">Настройки</a></li>
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
       </div>
   </div>


<?php  if(0){ ?>
        <div class="user-block">
            <div class="user-inner">
                <div class="user-status">

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
   <?php } ?>