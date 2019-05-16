   <?php

   use app\copmonents\widgets\dashboardgategory\DashboardgategoryAsset;
   use common\models\Sportcategorynames;
   use common\models\wraps\EventsnamesExt;
   use common\models\wraps\SportcategoryExt;
   use common\models\wraps\SportcategorynamesExt;
   use common\models\wraps\TournamentsnamesExt;
   use yii\helpers\Html;
   use yii\helpers\Url;


   DashboardgategoryAsset::register($this);
   ?>


   <div class="inner-sidebar" id="sportTypeSidebar">
       <div class="head-pink" >
           <h3>Виды Спорта</h3>
       </div>


       <div class="load-coupon-wrapper" style="" id="secondWrapperLoad">
           <div class="load-coupon-inner">
               <div class="round-load loadin-coupons">
                   <div class="progress-load">
                       <svg width="160" height="160">
                           <circle r="75" cx="80" cy="80" fill="none" stroke="rgba(255,255,255,.07)" stroke-width="5"></circle>
                           <circle class="load-circle" r="75" cx="80" cy="80" fill="none" stroke="#d00069" stroke-width="5"></circle>
                       </svg>
                   </div>
                   <div class="center-icon-clock">
                       <span class="icon-sand-clock"></span>
                   </div>
               </div>
           </div>
       </div>


            <?php foreach ($sport_categories  as $id_sport=>$sport_name) { continue;  ?>
                <div class="collapsed-type">
                    <div class="collapse-head">
                        <button class="trigger-collapse" data-id="<?=$id_sport?>"><span class="icon-football"></span><?=$sport_name ?></button>
                    </div>
                    <div class="collapse-block" >
                        <ul class="collapse-list" id="child_colapse_<?=$id_sport?>" >
                        </ul>
                    </div>
                </div>
           <?php  }  ?>



   </div>





   <?php  if(0){ ?>
       <div class="inner-sidebar">
           <div class="head-pink" >
               <h3>Виды Спорта</h3>
           </div>
           <div class="collapsed-type">
               <div class="collapse-head">
                   <button class="trigger-collapse"><span class="icon-football"></span>Футбол</button>
               </div>
               <div class="collapse-block">
                   <ul class="collapse-list">
                       <li class="">
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ua.png" alt="">
                                                    </span>
                               Европа
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>

                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/sp.png" alt="">
                                                    </span>
                               Южная Америка
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/en.png" alt="">
                                                    </span>
                               Азия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ua.png" alt="">
                                                    </span>
                               Украина
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/sp.png" alt="">
                                                    </span>
                               Испания
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/en.png" alt="">
                                                    </span>
                               Англия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/fr.png" alt="">
                                                    </span>
                               Франция
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ua.png" alt="">
                                                    </span>
                               Италия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/sp.png" alt="">
                                                    </span>
                               Германия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ru.png" alt="">
                                                    </span>
                               Россия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/fr.png" alt="">
                                                    </span>
                               Аргентина
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/au.png" alt="">
                                                    </span>
                               Австралия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                   </ul>
               </div>
           </div>
           <div class="collapsed-type">
               <div class="collapse-head">
                   <button class="trigger-collapse"><span class="icon-basketball"></span>Баскетбол</button>
               </div>
               <div class="collapse-block">
                   <ul class="collapse-list">
                       <li class="">
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ua.png" alt="">
                                                    </span>
                               Европа
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/sp.png" alt="">
                                                    </span>
                               Южная Америка
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/en.png" alt="">
                                                    </span>
                               Азия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ua.png" alt="">
                                                    </span>
                               Украина
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/sp.png" alt="">
                                                    </span>
                               Испания
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/en.png" alt="">
                                                    </span>
                               Англия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/fr.png" alt="">
                                                    </span>
                               Франция
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ua.png" alt="">
                                                    </span>
                               Италия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/sp.png" alt="">
                                                    </span>
                               Германия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ru.png" alt="">
                                                    </span>
                               Россия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/fr.png" alt="">
                                                    </span>
                               Аргентина
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/au.png" alt="">
                                                    </span>
                               Австралия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                   </ul>
               </div>
           </div>
           <div class="collapsed-type">
               <div class="collapse-head">
                   <button class="trigger-collapse"><span class="icon-tenis"></span>Теннис</button>
               </div>
               <div class="collapse-block">
                   <ul class="collapse-list">
                       <li class="">
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ua.png" alt="">
                                                    </span>
                               Европа
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/sp.png" alt="">
                                                    </span>
                               Южная Америка
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/en.png" alt="">
                                                    </span>
                               Азия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ua.png" alt="">
                                                    </span>
                               Украина
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/sp.png" alt="">
                                                    </span>
                               Испания
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/en.png" alt="">
                                                    </span>
                               Англия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/fr.png" alt="">
                                                    </span>
                               Франция
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ua.png" alt="">
                                                    </span>
                               Италия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/sp.png" alt="">
                                                    </span>
                               Германия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ru.png" alt="">
                                                    </span>
                               Россия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/fr.png" alt="">
                                                    </span>
                               Аргентина
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/au.png" alt="">
                                                    </span>
                               Австралия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                   </ul>
               </div>
           </div>
           <div class="collapsed-type">
               <div class="collapse-head">
                   <button class="trigger-collapse"><span class="icon-football"></span>Хоккей</button>
               </div>
               <div class="collapse-block">
                   <ul class="collapse-list">
                       <li class="">
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ua.png" alt="">
                                                    </span>
                               Европа
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/sp.png" alt="">
                                                    </span>
                               Южная Америка
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/en.png" alt="">
                                                    </span>
                               Азия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ua.png" alt="">
                                                    </span>
                               Украина
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/sp.png" alt="">
                                                    </span>
                               Испания
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/en.png" alt="">
                                                    </span>
                               Англия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/fr.png" alt="">
                                                    </span>
                               Франция
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ua.png" alt="">
                                                    </span>
                               Италия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/sp.png" alt="">
                                                    </span>
                               Германия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ru.png" alt="">
                                                    </span>
                               Россия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/fr.png" alt="">
                                                    </span>
                               Аргентина
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/au.png" alt="">
                                                    </span>
                               Австралия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                   </ul>
               </div>
           </div>
           <div class="collapsed-type">
               <div class="collapse-head">
                   <button class="trigger-collapse"><span class="icon-basketball"></span>Гандбол</button>
               </div>
               <div class="collapse-block">
                   <ul class="collapse-list">
                       <li class="">
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ua.png" alt="">
                                                    </span>
                               Европа
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/sp.png" alt="">
                                                    </span>
                               Южная Америка
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/en.png" alt="">
                                                    </span>
                               Азия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ua.png" alt="">
                                                    </span>
                               Украина
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/sp.png" alt="">
                                                    </span>
                               Испания
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/en.png" alt="">
                                                    </span>
                               Англия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/fr.png" alt="">
                                                    </span>
                               Франция
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ua.png" alt="">
                                                    </span>
                               Италия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/sp.png" alt="">
                                                    </span>
                               Германия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ru.png" alt="">
                                                    </span>
                               Россия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/fr.png" alt="">
                                                    </span>
                               Аргентина
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/au.png" alt="">
                                                    </span>
                               Австралия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                   </ul>
               </div>
           </div>
           <div class="collapsed-type">
               <div class="collapse-head">
                   <button class="trigger-collapse"><span class="icon-tenis"></span>Волейбол</button>
               </div>
               <div class="collapse-block">
                   <ul class="collapse-list">
                       <li class="">
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ua.png" alt="">
                                                    </span>
                               Европа
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/sp.png" alt="">
                                                    </span>
                               Южная Америка
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/en.png" alt="">
                                                    </span>
                               Азия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ua.png" alt="">
                                                    </span>
                               Украина
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/sp.png" alt="">
                                                    </span>
                               Испания
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/en.png" alt="">
                                                    </span>
                               Англия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/fr.png" alt="">
                                                    </span>
                               Франция
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ua.png" alt="">
                                                    </span>
                               Италия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/sp.png" alt="">
                                                    </span>
                               Германия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ru.png" alt="">
                                                    </span>
                               Россия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/fr.png" alt="">
                                                    </span>
                               Аргентина
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/au.png" alt="">
                                                    </span>
                               Австралия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                   </ul>
               </div>
           </div>
           <div class="collapsed-type">
               <div class="collapse-head">
                   <button class="trigger-collapse"><span class="icon-football"></span>Ампериканский Футбол</button>
               </div>
               <div class="collapse-block">
                   <ul class="collapse-list">
                       <li class="">
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ua.png" alt="">
                                                    </span>
                               Европа
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/sp.png" alt="">
                                                    </span>
                               Южная Америка
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/en.png" alt="">
                                                    </span>
                               Азия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ua.png" alt="">
                                                    </span>
                               Украина
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/sp.png" alt="">
                                                    </span>
                               Испания
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/en.png" alt="">
                                                    </span>
                               Англия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/fr.png" alt="">
                                                    </span>
                               Франция
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ua.png" alt="">
                                                    </span>
                               Италия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/sp.png" alt="">
                                                    </span>
                               Германия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ru.png" alt="">
                                                    </span>
                               Россия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/fr.png" alt="">
                                                    </span>
                               Аргентина
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/au.png" alt="">
                                                    </span>
                               Австралия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                   </ul>
               </div>
           </div>
           <div class="collapsed-type">
               <div class="collapse-head">
                   <button class="trigger-collapse"><span class="icon-basketball"></span>Футзал</button>
               </div>
               <div class="collapse-block">
                   <ul class="collapse-list">
                       <li class="">
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ua.png" alt="">
                                                    </span>
                               Европа
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/sp.png" alt="">
                                                    </span>
                               Южная Америка
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/en.png" alt="">
                                                    </span>
                               Азия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ua.png" alt="">
                                                    </span>
                               Украина
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/sp.png" alt="">
                                                    </span>
                               Испания
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/en.png" alt="">
                                                    </span>
                               Англия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/fr.png" alt="">
                                                    </span>
                               Франция
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ua.png" alt="">
                                                    </span>
                               Италия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/sp.png" alt="">
                                                    </span>
                               Германия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ru.png" alt="">
                                                    </span>
                               Россия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/fr.png" alt="">
                                                    </span>
                               Аргентина
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/au.png" alt="">
                                                    </span>
                               Австралия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                   </ul>
               </div>
           </div>
           <div class="collapsed-type">
               <div class="collapse-head">
                   <button class="trigger-collapse"><span class="icon-tenis"></span>Киберспорт</button>
               </div>
               <div class="collapse-block">
                   <ul class="collapse-list">
                       <li class="">
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ua.png" alt="">
                                                    </span>
                               Европа
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/sp.png" alt="">
                                                    </span>
                               Южная Америка
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/en.png" alt="">
                                                    </span>
                               Азия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ua.png" alt="">
                                                    </span>
                               Украина
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/sp.png" alt="">
                                                    </span>
                               Испания
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/en.png" alt="">
                                                    </span>
                               Англия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/fr.png" alt="">
                                                    </span>
                               Франция
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ua.png" alt="">
                                                    </span>
                               Италия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/sp.png" alt="">
                                                    </span>
                               Германия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ru.png" alt="">
                                                    </span>
                               Россия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/fr.png" alt="">
                                                    </span>
                               Аргентина
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/au.png" alt="">
                                                    </span>
                               Австралия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                   </ul>
               </div>
           </div>
           <div class="collapsed-type">
               <div class="collapse-head">
                   <button class="trigger-collapse"><span class="icon-football"></span>Бейсбол</button>
               </div>
               <div class="collapse-block">
                   <ul class="collapse-list">
                       <li class="">
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ua.png" alt="">
                                                    </span>
                               Европа
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/sp.png" alt="">
                                                    </span>
                               Южная Америка
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/en.png" alt="">
                                                    </span>
                               Азия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ua.png" alt="">
                                                    </span>
                               Украина
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/sp.png" alt="">
                                                    </span>
                               Испания
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/en.png" alt="">
                                                    </span>
                               Англия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/fr.png" alt="">
                                                    </span>
                               Франция
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ua.png" alt="">
                                                    </span>
                               Италия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/sp.png" alt="">
                                                    </span>
                               Германия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ru.png" alt="">
                                                    </span>
                               Россия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/fr.png" alt="">
                                                    </span>
                               Аргентина
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/au.png" alt="">
                                                    </span>
                               Австралия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                   </ul>
               </div>
           </div>
           <div class="collapsed-type">
               <div class="collapse-head">
                   <button class="trigger-collapse"><span class="icon-basketball"></span>Настольный Теннис</button>
               </div>
               <div class="collapse-block">
                   <ul class="collapse-list">
                       <li class="">
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ua.png" alt="">
                                                    </span>
                               Европа
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/sp.png" alt="">
                                                    </span>
                               Южная Америка
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/en.png" alt="">
                                                    </span>
                               Азия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ua.png" alt="">
                                                    </span>
                               Украина
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/sp.png" alt="">
                                                    </span>
                               Испания
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/en.png" alt="">
                                                    </span>
                               Англия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/fr.png" alt="">
                                                    </span>
                               Франция
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ua.png" alt="">
                                                    </span>
                               Италия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/sp.png" alt="">
                                                    </span>
                               Германия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ru.png" alt="">
                                                    </span>
                               Россия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/fr.png" alt="">
                                                    </span>
                               Аргентина
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/au.png" alt="">
                                                    </span>
                               Австралия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                   </ul>
               </div>
           </div>
           <div class="collapsed-type">
               <div class="collapse-head">
                   <button class="trigger-collapse"><span class="icon-football"></span>ММА</button>
               </div>
               <div class="collapse-block">
                   <ul class="collapse-list">
                       <li class="">
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ua.png" alt="">
                                                    </span>
                               Европа
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/sp.png" alt="">
                                                    </span>
                               Южная Америка
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/en.png" alt="">
                                                    </span>
                               Азия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ua.png" alt="">
                                                    </span>
                               Украина
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/sp.png" alt="">
                                                    </span>
                               Испания
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/en.png" alt="">
                                                    </span>
                               Англия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/fr.png" alt="">
                                                    </span>
                               Франция
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ua.png" alt="">
                                                    </span>
                               Италия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/sp.png" alt="">
                                                    </span>
                               Германия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ru.png" alt="">
                                                    </span>
                               Россия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/fr.png" alt="">
                                                    </span>
                               Аргентина
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/au.png" alt="">
                                                    </span>
                               Австралия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                   </ul>
               </div>
           </div>
           <div class="collapsed-type">
               <div class="collapse-head">
                   <button class="trigger-collapse"><span class="icon-football"></span>Бокс</button>
               </div>
               <div class="collapse-block">
                   <ul class="collapse-list">
                       <li class="">
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ua.png" alt="">
                                                    </span>
                               Европа
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/sp.png" alt="">
                                                    </span>
                               Южная Америка
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/en.png" alt="">
                                                    </span>
                               Азия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ua.png" alt="">
                                                    </span>
                               Украина
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/sp.png" alt="">
                                                    </span>
                               Испания
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/en.png" alt="">
                                                    </span>
                               Англия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/fr.png" alt="">
                                                    </span>
                               Франция
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ua.png" alt="">
                                                    </span>
                               Италия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/sp.png" alt="">
                                                    </span>
                               Германия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/ru.png" alt="">
                                                    </span>
                               Россия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/fr.png" alt="">
                                                    </span>
                               Аргентина
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                       <li>
                           <a href="#" class="trigger-sub-collapse">
                                                    <span class="flag">
                                                        <img src="/images/au.png" alt="">
                                                    </span>
                               Австралия
                           </a>
                           <div class="sub-collapse">
                               <ul class="sub-collapse-list">
                                   <li><a href="#">Премьер Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Чемпион Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Первая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Вторая Лига <span class="count-block">26</span></a></li>
                                   <li><a href="#">Национальная Лига <span class="count-block">26</span></a></li>
                               </ul>
                           </div>
                       </li>
                   </ul>
               </div>
           </div>
       </div>
  <?php } ?>



