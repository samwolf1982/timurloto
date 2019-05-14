   <?php

   use app\copmonents\widgets\dashboardcart\DashboardcartAsset;
   use app\copmonents\widgets\dashboardgategory\DashboardgategoryAsset;
   use common\models\helpers\ConstantsHelper;
   use common\models\Sportcategorynames;
   use common\models\wraps\EventsnamesExt;
   use common\models\wraps\SportcategoryExt;
   use common\models\wraps\SportcategorynamesExt;
   use common\models\wraps\TournamentsnamesExt;
   use yii\helpers\Html;
   use yii\helpers\Url;



   DashboardcartAsset::register($this);


   ?>

   <?php if(YII_ENV=='prod'){ ?>
       <script> var devStatus=false; </script>
   <?php }else{ ?>
       <script> var devStatus=true; </script>
   <?php } ?>

   <div class="overlay-sidebar-right"></div>
   <button class="right-sidebar-close"><span class="icon-close2"></span></button>
   <div class="inner-sidebar">
       <div class="head-pink">
           <h3>Купон</h3>
       </div>
       <div class="coupon-tabs-wrapper loading-coupont-info">
           <div class="no-bet-selected-text">
               <div class="no-bet-selected-text-inner">
                   <h4>Пока ничего не выбрано</h4>
               </div>
           </div>

           <div class="coupon-tabs-wrapper-inner">
               <ul class="coupon-tabs-nav">
                   <li>
                       <a href="" class="coupon-trigger ordinator active">Ординар</a>
                   </li>
                   <li>
                       <a href="" class="coupon-trigger express">Экспресс</a>
                   </li>
               </ul>


<!--               загрузка корзина-->
               <div class="load-coupon-wrapper" style="display: none;">
                   <div class="load-coupon-inner">
                       <div class="round-load">
                           <div class="progress-load">
                               <svg width="160" height="160">
                                   <circle r="75" cx="80" cy="80" fill="none" stroke="rgba(255,255,255,.07)" stroke-width="5" />
                                   <circle class="load-circle" r="75" cx="80" cy="80" fill="none" stroke="#d00069" stroke-width="5" />
                               </svg>
                           </div>
                           <div class="center-icon-clock">
                               <span class="icon-sand-clock"></span>
                           </div>
                       </div>
                   </div>
               </div>

               <div class="coupon-tabs-body">
                   <div class="coupon-tab-item active" id="ordinator">

                       <div class="coupon-tab-content">
                           <ul class="bet-coup-list"></ul>
                           <div class="all-coeficient">
                               <span class="text-coef">Общий коэфициент</span>
                               <span class="val-coef" id="total-coeficient">3.35</span>
                           </div>
                           <div class="delete-block">
                               <a href="" class="delete-all-bets"><span class="icon-close2"></span> Удалить все события</a>
                           </div>

                           <div class="bet-info-calc">
                               <div class="bet-calc-row calculator-bet">
                                   <div class="calculator-bet-inner">


                                       <div class="plus-minus-block">
                                           <!--<button class="plus">+</button>-->
                                           <!--<button class="minus">-</button>-->
                                           <!--<input type="text"  class="value-bet" data-val="1" value="1%" readonly>-->


                                           <div class="custom-dropdown">
                                               <div class="custom-dropdown-inner">
                                                   <div class="val-drop">
                                                       <button class="val-drop-btn currentCooeficientDrop"><?=$currentCooeficientDrop?>%</button>
                                                   </div>
                                                   <div class="dropdown-list drop-percent">
                                                       <div class="play-list" id="currentCooeficientDropList">
                                                           <?php foreach (range(1,$max_coeficientDrop) as $keyItem) { ?>
                                                               <div class="drop-item">
                                                                   <div class="check-drop">
                                                                       <?php if($keyItem==$currentCooeficientDrop){ ?>
                                                                           <input name="playlistPercent" type="radio" id="playlistPercent_<?=$keyItem?>" checked="checked" value="<?=$keyItem?>%">
                                                                           <label for="playlistPercent_<?=$keyItem?>"><?=$keyItem?>%</label>
                                                                       <?php }else{ ?>
                                                                           <input name="playlistPercent" type="radio" id="playlistPercent_<?=$keyItem?>"  value="<?=$keyItem?>%">
                                                                           <label for="playlistPercent_<?=$keyItem?>"><?=$keyItem?>%</label>
                                                                       <?php  } ?>


                                                                   </div>
                                                               </div>
                                                           <?php  } ?>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>


                                           <?php if(0){ // delete ?>
                                               <div class="custom-dropdown hidden OLD">
                                                   <div class="custom-dropdown-inner">
                                                       <div class="val-drop">
                                                           <button class="val-drop-btn currentCooeficientDrop"><?=$currentCooeficientDrop?>%</button>
                                                       </div>
                                                       <div class="dropdown-list">
                                                           <div class="play-list" id="currentCooeficientDropList_ЩДВ">
                                                               <?php foreach (range(1,$max_coeficientDrop) as $keyItem) { ?>
                                                                   <div class="drop-item">
                                                                       <div class="check-drop">
                                                                           <?php if($keyItem==$currentCooeficientDrop){ ?>
                                                                               <input name="playlistPercent" type="radio" id="playlistPercent_<?=$keyItem?>" checked="checked" value="<?=$keyItem?>%">
                                                                               <label for="playlistPercent_<?=$keyItem?>"><?=$keyItem?>%</label>
                                                                           <?php }else{ ?>
                                                                               <input name="playlistPercent" type="radio" id="playlistPercent_<?=$keyItem?>"  value="<?=$keyItem?>%">
                                                                               <label for="playlistPercent_<?=$keyItem?>"><?=$keyItem?>%</label>
                                                                           <?php  } ?>


                                                                       </div>
                                                                   </div>
                                                               <?php  } ?>
                                                           </div>
                                                       </div>
                                                   </div>
                                               </div>
                                           <?php  } ?>


                                           <span class="title-calc-botif">от банка</span>

                                       </div>



                                       <div class="result-block">
                                           <div class="placeholder-text">Выигрыш</div>
                                           <div class="value-text"><span class="icon-betcoin-logo"></span>  <span id="maybeWin"> 335.00 </span></div>
                                       </div>
                                   </div>
                               </div>
                               <div class="notification-calculate">Максимальный процент на этот коэфициент 10</div>
                           </div>


                           <div class="more-bets-info">
                               <div class="playlist">
                                   <div class="summ-block">
                                       <div class="sub-label">Сумма ставки</div>
                                       <div class="sum-val"><span class="icon-betcoin-logo"></span>  <span id="betSum">0</span></div>
                                   </div>
                                   <!--<div class="custom-dropdown">-->
                                   <!--<div class="custom-dropdown-inner">-->
                                   <!--<div class="val-drop">-->
                                   <!--<button class="val-drop-btn">Плейлист #A</button>-->
                                   <!--</div>-->
                                   <!--<div class="dropdown-list">-->
                                   <!--<div class="play-list">-->
                                   <!--<div class="drop-item">-->
                                   <!--<div class="check-drop">-->
                                   <!--<input name="playlist" type="radio" id="playlist145" checked="checked" value="Плейлист #A">-->
                                   <!--<label for="playlist145">Плейлист #A</label>-->
                                   <!--</div>-->
                                   <!--</div>-->
                                   <!--<div class="drop-item">-->
                                   <!--<div class="check-drop">-->
                                   <!--<input name="playlist" type="radio" id="playlist245" value="Лига Чемпионов">-->
                                   <!--<label for="playlist245">Лига Чемпионов</label>-->
                                   <!--</div>-->
                                   <!--</div>-->
                                   <!--<div class="drop-item">-->
                                   <!--<div class="check-drop">-->
                                   <!--<input name="playlist" type="radio" id="playlist345" value="НБА">-->
                                   <!--<label for="playlist345">НБА</label>-->
                                   <!--</div>-->
                                   <!--</div>-->
                                   <!--</div>-->
                                   <!--<div class="drop-item">-->
                                   <!--<div class="create-playlist">-->
                                   <!--<div class="input-create">-->
                                   <!--<input type="text" placeholder="Новый плейлист">-->
                                   <!--</div>-->
                                   <!--<div class="btn-create">-->
                                   <!--<button class="btn-primary btn btn-hover create-btn">Создать</button>-->
                                   <!--</div>-->
                                   <!--</div>-->
                                   <!--</div>-->
                                   <!--</div>-->
                                   <!--</div>-->
                                   <!--</div>-->
                               </div>

                               <button class="type-list" id="statusBetPuPr">
                                   <?php if($currentStatus==ConstantsHelper::STATUS_PUBLIC_BET){   ?>
                                       <span class="show"><i class="icon-open"></i> Открытый</span>
                                       <span class=""><i class="icon-lock"></i> Закрытый</span>
                                   <?php }else{ ?>
                                       <span class=""><i class="icon-open"></i> Открытый</span>
                                       <span class="show"><i class="icon-lock"></i> Закрытый</span>
                                   <?      }  ?>
                               </button>



                               <?php     if (Yii::$app->user->isGuest) { ?>
                                   <style>
                                       .user-btn.w100,.send-bets{
                                           width: 100%;
                                       }
                                       .calculator-bet-inner .custom-dropdown .dropdown-list{
                                           height: auto !important;
                                           max-height: 240px;
                                       }
                                   </style>

                                   <div class="user-btn w100">
                                       <a href="#" class="btn btn-primary send-bets"  data-toggle="modal-reg" data-target="#modal-auth"><i class="icon-user"></i> <span>ВОЙТИ</span></a>
                                   </div>

                               <?php }else{ ?>
                                   <button id="smartCartButton"  class="btn btn-primary send-bets" onclick="SmartCart.createBet(this);" >Сделать Ставку</button>
                               <?php if(YII_ENV=='dev'){ ?>
                                   <button    id="smartCartButtonModal"  class="btn btn-primary send-bets " data-toggle="modal" data-target="#modal-success-bet">Сделать Ставку Модальное</button>
                               <?php } ?>
                               <?php } ?>


                               <!--<p>The complexity of mining crypto currency.</p>-->
                               <div class="balance-block">
                                   <div class="label-balance">Баланс</div>
                                   <div class="value-balance"><span class="icon-betcoin-logo"></span> <span id="currentBalance"><?= $total_balance ?> </span> </div>
                               </div>
                           </div>


                           <?php if(0){ ?>

                           <div class="more-bets-info hidden OLDDELETE">

                               <style>
                                   .wrap_buttons{
                                       display: flex;
                                   }
                                   .wrap_buttons > .playlist{
                                       min-width: 149px;
                                   }

                               </style>




                               <div class="wrap_buttons flex" style="width: 100%;">

                                   <p class="hidden " style="margin-top: 0; text-align: right;      -ms-text-align: right; -moz-text-align: right; -o-text-align: right; -webkit-text-align: right;  ">Сумма ставки: <span class="wl" id="betSum">0</span> <span class="icon-betcoin-logo wl"></span></p>

                               </div>


                               <div class="wrap_buttons">




                                   <div class="playlist">
                                       <div class="custom-dropdown">
                                           <div class="custom-dropdown-inner">


                                               <div class="val-drop">
                                                   <button class="val-drop-btn"><?= !empty($curent_playlist)?$curent_playlist->name:''; ?></button>
                                               </div>
                                               <div class="dropdown-list">

                                                   <?php if(0){  ?>
                                                   <div class="play-list">
                                                       <div class="drop-item">
                                                           <div class="check-drop">
                                                               <input name="playlist" type="radio" id="playlist145" checked="checked" value="Плейлист #A">
                                                               <label for="playlist145">Плейлист #A</label>
                                                           </div>
                                                       </div>
                                                       <div class="drop-item">
                                                           <div class="check-drop">
                                                               <input name="playlist" type="radio" id="playlist245" value="Лига Чемпионов">
                                                               <label for="playlist245">Лига Чемпионов</label>
                                                           </div>
                                                       </div>
                                                       <div class="drop-item">
                                                           <div class="check-drop">
                                                               <input name="playlist" type="radio" id="playlist345" value="НБА">
                                                               <label for="playlist345">НБА</label>
                                                           </div>
                                                       </div>
                                                   </div>
                                                   <?php } ?>


                                                   <div class="play-list">
                                                       <?php foreach ($playlists as $playlist) {  ?>
                                                           <div class="drop-item">
                                                               <div class="check-drop">
                                                                    <?php if( (!empty($curent_playlist)&&!empty($playlist) ) &&  $curent_playlist->id==$playlist->id){  ?>
                                                                   <input name="playlistUser" data-type="statistic" type="radio" id="playlist_statistic_<?=$playlist->id?>" <?='checked="checked"'?>  data-value="<?=$playlist->id?>" value="<?=$playlist->name?>">
                                                                   <?php }else{ ?>
                                                                        <input name="playlistUser" data-type="statistic" type="radio" id="playlist_statistic_<?=$playlist->id?>"  data-value="<?=$playlist->id?>" value="<?=$playlist->name?>">
                                                                  <?php } ?>
                                                                   <label for="playlist_statistic_<?=$playlist->id?>"><?=$playlist->name?></label>
                                                               </div>
                                                           </div>
                                                       <?php  }  ?>
                                                   </div>


                                                   <div class="drop-item" id="wrapePlayliste">
                                                       <div class="create-playlist" style="display: block;">
                                                           <div class="input-create" >
                                                               <input type="text" placeholder="Новый плейлист" >
                                                           </div>
                                                           <div class="btn-create">
                                                               <button class="btn-primary btn btn-hover create-btn" id="createPlaylist">Создать</button>
                                                           </div>

                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                   </div>

                                   <button class="type-list" id="statusBetPuPr">
                                       <?php if($currentStatus==ConstantsHelper::STATUS_PUBLIC_BET){   ?>
                                           <span class="show"><i class="icon-open"></i> Открытый</span>
                                           <span class=""><i class="icon-lock"></i> Закрытый</span>
                                       <?php }else{ ?>
                                           <span class=""><i class="icon-open"></i> Открытый</span>
                                           <span class="show"><i class="icon-lock"></i> Закрытый</span>
                                       <?      }  ?>
                                   </button>

                               </div>

                               <?php if(0) { ?>
                                   <button id="smartCartButton" data-target="#modal-success-bet" type="submit" class="btn btn-primary send-bets" data-toggle="modal">Сделать Ставку</button>
                               <?php  } ?>

                               <?php     if (Yii::$app->user->isGuest) { ?>
                                   <style>
                                       .user-btn.w100,.send-bets{
                                           width: 100%;
                                       }
                                       .calculator-bet-inner .custom-dropdown .dropdown-list{
                                           height: auto !important;
                                           max-height: 240px;
                                       }
                                   </style>
                                   <div class="user-btn w100">
                                       <a href="#" class="btn btn-primary send-bets"  data-toggle="modal-reg" data-target="#modal-auth"><i class="icon-user"></i> <span>ВОЙТИ</span></a>
                                   </div>
                               <?php }else{ ?>
                                   <style>
                                       .calculator-bet-inner .custom-dropdown .dropdown-list{
                                           height: auto;
                                           max-height: 240px;
                                       }
                                   </style>
                                   <button id="smartCartButton"  class="btn btn-primary send-bets" onclick="SmartCart.createBet(this);" >Сделать Ставку</button>
                               <?php if(YII_ENV=='dev'){ ?>
                                   <button hidden   id="smartCartButtonModal22"  class="btn btn-primary send-bets hidden" data-toggle="modal" data-target="#modal-success-bet">Сделать Ставку Модальное</button>
                               <?php } ?>
                               <?php } ?>


                               <p class="balanceText" style=" text-align: right;      -ms-text-align: right; -moz-text-align: right; -o-text-align: right; -webkit-text-align: right;  " >Баланс: <span id="currentBalance"><?= $total_balance ?> </span> <span class="icon-betcoin-logo wl"></span></p>
                               <p class="hidden">Сумма ставки: <span id="betSum">0</span> <span> betcoins</span></p>


                           </div>
                           <?php } ?>

                       </div>


                   </div>
               </div>
           </div>


       </div>
   </div>


   <?php  if(0){ ?>

       <div class="overlay-sidebar-right"></div>
       <button class="right-sidebar-close"><span class="icon-close2"></span></button>
       <div class="inner-sidebar">
           <div class="head-pink">
               <h3>Купон</h3>
           </div>
           <div class="coupon-tabs-wrapper">
               <div class="no-bet-selected-text">
                   <div class="no-bet-selected-text-inner">
                       <h4>Пока ничего не выбрано</h4>
                   </div>
               </div>
               <div class="coupon-tabs-wrapper-inner">
                   <ul class="coupon-tabs-nav">
                       <li>
                           <a href="" class="coupon-trigger ordinator active">Ординар</a>
                       </li>
                       <li>
                           <a href="" class="coupon-trigger express">Экспресс</a>
                       </li>

                   </ul>
                   <div class="coupon-tabs-body">
                       <div class="coupon-tab-item active" id="ordinator">
                           <div class="coupon-tab-content">
                               <ul class="bet-coup-list"></ul>
                               <div class="all-coeficient">
                                   <span class="text-coef">Общий коэфициент</span>
                                   <span class="val-coef" id="total-coeficient">3.35</span>
                               </div>
                               <div class="delete-block">
                                   <a href="" class="delete-all-bets"><span class="icon-close2"></span> Удалить все события</a>
                               </div>
                               <div class="bet-info-calc">
                                   <div class="bet-calc-row calculator-bet">
                                       <div class="calculator-bet-inner">
                                           <div class="plus-minus-block">
                                               <!--<button class="plus">+</button>-->
                                               <!--<button class="minus">-</button>-->
                                               <!--<input type="text"  class="value-bet" data-val="1" value="1%" readonly>-->
                                               <div class="custom-dropdown">
                                                   <div class="custom-dropdown-inner">
                                                       <div class="val-drop">
                                                           <button class="val-drop-btn">1%</button>
                                                       </div>
                                                       <div class="dropdown-list">
                                                           <div class="play-list">
                                                               <div class="drop-item">
                                                                   <div class="check-drop">
                                                                       <input name="playlist" type="radio" id="playlist14521" checked="checked" value="1%">
                                                                       <label for="playlist14521">1%</label>
                                                                   </div>
                                                               </div>
                                                               <div class="drop-item">
                                                                   <div class="check-drop">
                                                                       <input name="playlist" type="radio" id="playlist14532" checked="checked" value="2%">
                                                                       <label for="playlist14532">2%</label>
                                                                   </div>
                                                               </div>
                                                               <div class="drop-item">
                                                                   <div class="check-drop">
                                                                       <input name="playlist" type="radio" id="playlist24543" value="3%">
                                                                       <label for="playlist24543">3%</label>
                                                                   </div>
                                                               </div>
                                                               <div class="drop-item">
                                                                   <div class="check-drop">
                                                                       <input name="playlist" type="radio" id="playlist34554" value="4%">
                                                                       <label for="playlist34554">4%</label>
                                                                   </div>
                                                               </div>
                                                               <div class="drop-item">
                                                                   <div class="check-drop">
                                                                       <input name="playlist" type="radio" id="playlist34565" value="5%">
                                                                       <label for="playlist34565">5%</label>
                                                                   </div>
                                                               </div>
                                                               <div class="drop-item">
                                                                   <div class="check-drop">
                                                                       <input name="playlist" type="radio" id="playlist34576" value="6%">
                                                                       <label for="playlist34576">6%</label>
                                                                   </div>
                                                               </div><div class="drop-item">
                                                                   <div class="check-drop">
                                                                       <input name="playlist" type="radio" id="playlist34587" value="7%">
                                                                       <label for="playlist34587">7%</label>
                                                                   </div>
                                                               </div>
                                                               <div class="drop-item">
                                                                   <div class="check-drop">
                                                                       <input name="playlist" type="radio" id="playlist34598" value="8%">
                                                                       <label for="playlist34598">8%</label>
                                                                   </div>
                                                               </div>
                                                               <div class="drop-item">
                                                                   <div class="check-drop">
                                                                       <input name="playlist" type="radio" id="playlist345202" value="9%">
                                                                       <label for="playlist345202">9%</label>
                                                                   </div>
                                                               </div>
                                                               <div class="drop-item">
                                                                   <div class="check-drop">
                                                                       <input name="playlist" type="radio" id="playlist345301" value="10%">
                                                                       <label for="playlist345301">10%</label>
                                                                   </div>
                                                               </div>


                                                           </div>
                                                       </div>
                                                   </div>
                                               </div>
                                               <span class="title-calc-botif">от банка</span>
                                           </div>
                                           <div class="result-block">
                                               <div class="placeholder-text">Выигрыш</div>
                                               <div class="value-text"><span class="icon-betcoin-logo"></span>335.00</div>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="notification-calculate">---</div>
                               </div>




                               <div class="more-bets-info">

                                   <div class="playlist">
                                       <div class="custom-dropdown">
                                           <div class="custom-dropdown-inner">
                                               <div class="val-drop">
                                                   <button class="val-drop-btn">Плейлист #A</button>
                                               </div>
                                               <div class="dropdown-list">
                                                   <div class="play-list">
                                                       <div class="drop-item">
                                                           <div class="check-drop">
                                                               <input name="playlist" type="radio" id="playlist145" checked="checked" value="Плейлист #A">
                                                               <label for="playlist145">Плейлист #A</label>
                                                           </div>
                                                       </div>
                                                       <div class="drop-item">
                                                           <div class="check-drop">
                                                               <input name="playlist" type="radio" id="playlist245" value="Лига Чемпионов">
                                                               <label for="playlist245">Лига Чемпионов</label>
                                                           </div>
                                                       </div>
                                                       <div class="drop-item">
                                                           <div class="check-drop">
                                                               <input name="playlist" type="radio" id="playlist345" value="НБА">
                                                               <label for="playlist345">НБА</label>
                                                           </div>
                                                       </div>
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
                                   <button class="type-list">
                                                        <span class="show">
                                                            <i class="icon-open"></i> Открытый
                                                        </span>
                                       <span class="">
                                                            <i class="icon-lock"></i> Закрытый
                                                        </span>
                                   </button>
                                   <button data-target="#modal-success-bet" type="submit" class="btn btn-primary send-bets" data-toggle="modal">Сделать Ставку</button>
                                   <p>The complexity of mining crypto currency.</p>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>

  <?php } ?>



