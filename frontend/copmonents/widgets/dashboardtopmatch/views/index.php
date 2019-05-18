   <?php

   use app\copmonents\widgets\dashboardtopmatch\DashboardtopmatchAsset;
   use common\models\helpers\ConstantsHelper;

   use yii\helpers\Html;
   use yii\helpers\Url;

   DashboardtopmatchAsset::register($this);
   ?>


   <div class="content-center-block  main_center_block">
       <?php if(0): ?>
       <div class="head-pink">
           <h3>Реклама</h3>
           <div class="arrows-carousel-nav" id="top-game"></div>
       </div>
       <?php endif; ?>
       <div class="content-bg">
           <div class="top-carousel-wrapper">
               <a href="/" target="_blank">   <img src="/images/commercical/matches.jpg" alt="comercical" class="img-responsive"></a>
           </div>
       </div>
   </div>


   <?php if(0){ // верстка ?>
       <div class="content-center-block  main_center_block">
           <div class="head-pink">
               <h3>Топ Матчи</h3>
               <div class="arrows-carousel-nav" id="top-game"></div>
           </div>
           <div class="content-bg">
               <div class="top-carousel-wrapper">
                   <div class="top-carousel">
                       <div class="top-item">
                           <div class="top-item-inner">
                               <div class="image-block" style="background-image: url(images/top-list-1.png)">
                                   <div class="label-ligue">
                                       <img src="/images/ligue-img1.png" alt="">
                                   </div>
                               </div>
                               <div class="content-top-block" data-parents="ps1">
                                   <div class="name-block">
                                       <div class="b-icon-list">
                                           <span class="icon-football"></span>
                                       </div>
                                       <a href="bet-dashboard-open.html" class="title-block">
                                           <div class="title-placeholde">17 Сентября 19:30</div>
                                           <div class="title-value">ПСЖ - Бенфика</div>
                                       </a>
                                   </div>
                                   <div class="bets-info">
                                       <ul class="bet-info-list">
                                           <li>
                                               <button class="bet-parent-val-slider" data-id="id1" data-text="Победа">
                                                   <span class="dark-text" data-team="ПСЖ">1</span>
                                                   <span class="value-bet">2.20</span>
                                               </button>
                                           </li>
                                           <li>
                                               <button class="bet-parent-val-slider" data-id="id2" data-text="Ничья">
                                                   <span class="dark-text" data-team="">X</span>
                                                   <span class="value-bet">3.35</span>
                                               </button>
                                           </li>
                                           <li>
                                               <button class="bet-parent-val-slider" data-id="id3" data-text="Победа">
                                                   <span class="dark-text" data-team="Бенфика">2</span>
                                                   <span class="value-bet">3.35</span>
                                               </button>
                                           </li>
                                       </ul>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="top-item">
                           <div class="top-item-inner">
                               <div class="image-block" style="background-image: url(images/top-list-2.png)">
                                   <div class="label-ligue">
                                       <img src="/images/ligue-img2.png" alt="">
                                   </div>
                               </div>
                               <div class="content-top-block" data-parents="ps2">
                                   <div class="name-block">
                                       <div class="b-icon-list">
                                           <span class="icon-football"></span>
                                       </div>
                                       <a href="bet-dashboard-open.html" class="title-block">
                                           <div class="title-placeholde">17 Сентября 19:30</div>
                                           <div class="title-value">Лестер - Ливерпуль</div>
                                       </a>
                                   </div>
                                   <div class="bets-info">
                                       <ul class="bet-info-list">
                                           <li>
                                               <button class="bet-parent-val-slider" data-id="id4" data-text="Победа">
                                                   <span class="dark-text" data-team="Лестер">1</span>
                                                   <span class="value-bet">2.20</span>
                                               </button>
                                           </li>
                                           <li><span class="dark-text">-</span></li>
                                           <li>
                                               <button class="bet-parent-val-slider" data-id="id5" data-text="Победа">
                                                   <span class="dark-text" data-team="Ливерпуль">2</span>
                                                   <span class="value-bet">3.35</span>
                                               </button>
                                           </li>
                                       </ul>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="top-item">
                           <div class="top-item-inner">
                               <div class="image-block" style="background-image: url(images/top-list-3.png)">
                                   <div class="label-ligue">
                                       <img src="/images/ligue-img3.png" alt="">
                                   </div>
                               </div>
                               <div class="content-top-block" data-parents="ps3">
                                   <div class="name-block">
                                       <div class="b-icon-list">
                                           <span class="icon-football"></span>
                                       </div>
                                       <a href="bet-dashboard-open.html" class="title-block">
                                           <div class="title-placeholde">17 Сентября 19:30</div>
                                           <div class="title-value">Бавария - Шальке</div>
                                       </a>
                                   </div>
                                   <div class="bets-info">
                                       <ul class="bet-info-list">
                                           <li>
                                               <button class="bet-parent-val-slider" data-id="id9" data-text="Победа">
                                                   <span class="dark-text" data-team="Бавария">1</span>
                                                   <span class="value-bet">2.20</span>
                                               </button>
                                           </li>
                                           <li>
                                               <button class="bet-parent-val-slider" data-id="id7" data-text="Ничья">
                                                   <span class="dark-text" data-team="">X</span>
                                                   <span class="value-bet">3.35</span>
                                               </button>
                                           </li>
                                           <li>
                                               <button class="bet-parent-val-slider" data-id="id8" data-text="Победа">
                                                   <span class="dark-text" data-team="Шальке">2</span>
                                                   <span class="value-bet">3.35</span>
                                               </button>
                                           </li>
                                       </ul>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="top-item">
                           <div class="top-item-inner">
                               <div class="image-block" style="background-image: url(images/top-list-1.png)">
                                   <div class="label-ligue">
                                       <img src="/images/ligue-img1.png" alt="">
                                   </div>
                               </div>
                               <div class="content-top-block" data-parents="ps1">
                                   <div class="name-block">
                                       <div class="b-icon-list">
                                           <span class="icon-football"></span>
                                       </div>
                                       <a href="bet-dashboard-open.html" class="title-block">
                                           <div class="title-placeholde">17 Сентября 19:30</div>
                                           <div class="title-value">ПСЖ - Бенфика</div>
                                       </a>
                                   </div>
                                   <div class="bets-info">
                                       <ul class="bet-info-list">
                                           <li>
                                               <button class="bet-parent-val-slider" data-id="id1" data-text="Победа">
                                                   <span class="dark-text" data-team="ПСЖ">1</span>
                                                   <span class="value-bet">2.20</span>
                                               </button>
                                           </li>
                                           <li>
                                               <button class="bet-parent-val-slider" data-id="id2" data-text="Ничья">
                                                   <span class="dark-text" data-team="">X</span>
                                                   <span class="value-bet">3.35</span>
                                               </button>
                                           </li>
                                           <li>
                                               <button class="bet-parent-val-slider" data-id="id3" data-text="Победа">
                                                   <span class="dark-text" data-team="Бенфика">2</span>
                                                   <span class="value-bet">3.35</span>
                                               </button>
                                           </li>
                                       </ul>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="top-item">
                           <div class="top-item-inner">
                               <div class="image-block" style="background-image: url(images/top-list-2.png)">
                                   <div class="label-ligue">
                                       <img src="/images/ligue-img2.png" alt="">
                                   </div>
                               </div>
                               <div class="content-top-block" data-parents="ps2">
                                   <div class="name-block">
                                       <div class="b-icon-list">
                                           <span class="icon-football"></span>
                                       </div>
                                       <a href="bet-dashboard-open.html" class="title-block">
                                           <div class="title-placeholde">17 Сентября 19:30</div>
                                           <div class="title-value">Лестер - Ливерпуль</div>
                                       </a>
                                   </div>
                                   <div class="bets-info">
                                       <ul class="bet-info-list">
                                           <li>
                                               <button class="bet-parent-val-slider" data-id="id4" data-text="Победа">
                                                   <span class="dark-text" data-team="Лестер">1</span>
                                                   <span class="value-bet">2.20</span>
                                               </button>
                                           </li>
                                           <li><span class="dark-text">-</span></li>
                                           <li>
                                               <button class="bet-parent-val-slider" data-id="id5" data-text="Победа">
                                                   <span class="dark-text" data-team="Ливерпуль">2</span>
                                                   <span class="value-bet">3.35</span>
                                               </button>
                                           </li>
                                       </ul>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="top-item">
                           <div class="top-item-inner">
                               <div class="image-block" style="background-image: url(images/top-list-3.png)">
                                   <div class="label-ligue">
                                       <img src="/images/ligue-img3.png" alt="">
                                   </div>
                               </div>
                               <div class="content-top-block" data-parents="ps3">
                                   <div class="name-block">
                                       <div class="b-icon-list">
                                           <span class="icon-football"></span>
                                       </div>
                                       <a href="bet-dashboard-open.html" class="title-block">
                                           <div class="title-placeholde">17 Сентября 19:30</div>
                                           <div class="title-value">Бавария - Шальке</div>
                                       </a>
                                   </div>
                                   <div class="bets-info">
                                       <ul class="bet-info-list">
                                           <li>
                                               <button class="bet-parent-val-slider" data-id="id9" data-text="Победа">
                                                   <span class="dark-text" data-team="Бавария">1</span>
                                                   <span class="value-bet">2.20</span>
                                               </button>
                                           </li>
                                           <li>
                                               <button class="bet-parent-val-slider" data-id="id7" data-text="Ничья">
                                                   <span class="dark-text" data-team="">X</span>
                                                   <span class="value-bet">3.35</span>
                                               </button>
                                           </li>
                                           <li>
                                               <button class="bet-parent-val-slider" data-id="id8" data-text="Победа">
                                                   <span class="dark-text" data-team="Шальке">2</span>
                                                   <span class="value-bet">3.35</span>
                                               </button>
                                           </li>
                                       </ul>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="top-item">
                           <div class="top-item-inner">
                               <div class="image-block" style="background-image: url(images/top-list-1.png)">
                                   <div class="label-ligue">
                                       <img src="/images/ligue-img1.png" alt="">
                                   </div>
                               </div>
                               <div class="content-top-block" data-parents="ps1">
                                   <div class="name-block">
                                       <div class="b-icon-list">
                                           <span class="icon-football"></span>
                                       </div>
                                       <a href="bet-dashboard-open.html" class="title-block">
                                           <div class="title-placeholde">17 Сентября 19:30</div>
                                           <div class="title-value">ПСЖ - Бенфика</div>
                                       </a>
                                   </div>
                                   <div class="bets-info">
                                       <ul class="bet-info-list">
                                           <li>
                                               <button class="bet-parent-val-slider" data-id="id1" data-text="Победа">
                                                   <span class="dark-text" data-team="ПСЖ">1</span>
                                                   <span class="value-bet">2.20</span>
                                               </button>
                                           </li>
                                           <li>
                                               <button class="bet-parent-val-slider" data-id="id2" data-text="Ничья">
                                                   <span class="dark-text" data-team="">X</span>
                                                   <span class="value-bet">3.35</span>
                                               </button>
                                           </li>
                                           <li>
                                               <button class="bet-parent-val-slider" data-id="id3" data-text="Победа">
                                                   <span class="dark-text" data-team="Бенфика">2</span>
                                                   <span class="value-bet">3.35</span>
                                               </button>
                                           </li>
                                       </ul>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="top-item">
                           <div class="top-item-inner">
                               <div class="image-block" style="background-image: url(images/top-list-2.png)">
                                   <div class="label-ligue">
                                       <img src="/images/ligue-img2.png" alt="">
                                   </div>
                               </div>
                               <div class="content-top-block" data-parents="ps2">
                                   <div class="name-block">
                                       <div class="b-icon-list">
                                           <span class="icon-football"></span>
                                       </div>
                                       <a href="bet-dashboard-open.html" class="title-block">
                                           <div class="title-placeholde">17 Сентября 19:30</div>
                                           <div class="title-value">Лестер - Ливерпуль</div>
                                       </a>
                                   </div>
                                   <div class="bets-info">
                                       <ul class="bet-info-list">
                                           <li>
                                               <button class="bet-parent-val-slider" data-id="id4" data-text="Победа">
                                                   <span class="dark-text" data-team="Лестер">1</span>
                                                   <span class="value-bet">2.20</span>
                                               </button>
                                           </li>
                                           <li><span class="dark-text">-</span></li>
                                           <li>
                                               <button class="bet-parent-val-slider" data-id="id5" data-text="Победа">
                                                   <span class="dark-text" data-team="Ливерпуль">2</span>
                                                   <span class="value-bet">3.35</span>
                                               </button>
                                           </li>
                                       </ul>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="top-item">
                           <div class="top-item-inner">
                               <div class="image-block" style="background-image: url(images/top-list-3.png)">
                                   <div class="label-ligue">
                                       <img src="/images/ligue-img3.png" alt="">
                                   </div>
                               </div>
                               <div class="content-top-block" data-parents="ps3">
                                   <div class="name-block">
                                       <div class="b-icon-list">
                                           <span class="icon-football"></span>
                                       </div>
                                       <a href="bet-dashboard-open.html" class="title-block">
                                           <div class="title-placeholde">17 Сентября 19:30</div>
                                           <div class="title-value">Бавария - Шальке</div>
                                       </a>
                                   </div>
                                   <div class="bets-info">
                                       <ul class="bet-info-list">
                                           <li>
                                               <button class="bet-parent-val-slider" data-id="id9" data-text="Победа">
                                                   <span class="dark-text" data-team="Бавария">1</span>
                                                   <span class="value-bet">2.20</span>
                                               </button>
                                           </li>
                                           <li>
                                               <button class="bet-parent-val-slider" data-id="id7" data-text="Ничья">
                                                   <span class="dark-text" data-team="">X</span>
                                                   <span class="value-bet">3.35</span>
                                               </button>
                                           </li>
                                           <li>
                                               <button class="bet-parent-val-slider" data-id="id8" data-text="Победа">
                                                   <span class="dark-text" data-team="Шальке">2</span>
                                                   <span class="value-bet">3.35</span>
                                               </button>
                                           </li>
                                       </ul>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="top-item">
                           <div class="top-item-inner">
                               <div class="image-block" style="background-image: url(images/top-list-1.png)">
                                   <div class="label-ligue">
                                       <img src="/images/ligue-img1.png" alt="">
                                   </div>
                               </div>
                               <div class="content-top-block" data-parents="ps1">
                                   <div class="name-block">
                                       <div class="b-icon-list">
                                           <span class="icon-football"></span>
                                       </div>
                                       <a href="bet-dashboard-open.html" class="title-block">
                                           <div class="title-placeholde">17 Сентября 19:30</div>
                                           <div class="title-value">ПСЖ - Бенфика</div>
                                       </a>
                                   </div>
                                   <div class="bets-info">
                                       <ul class="bet-info-list">
                                           <li>
                                               <button class="bet-parent-val-slider" data-id="id1" data-text="Победа">
                                                   <span class="dark-text" data-team="ПСЖ">1</span>
                                                   <span class="value-bet">2.20</span>
                                               </button>
                                           </li>
                                           <li>
                                               <button class="bet-parent-val-slider" data-id="id2" data-text="Ничья">
                                                   <span class="dark-text" data-team="">X</span>
                                                   <span class="value-bet">3.35</span>
                                               </button>
                                           </li>
                                           <li>
                                               <button class="bet-parent-val-slider" data-id="id3" data-text="Победа">
                                                   <span class="dark-text" data-team="Бенфика">2</span>
                                                   <span class="value-bet">3.35</span>
                                               </button>
                                           </li>
                                       </ul>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="top-item">
                           <div class="top-item-inner">
                               <div class="image-block" style="background-image: url(images/top-list-2.png)">
                                   <div class="label-ligue">
                                       <img src="/images/ligue-img2.png" alt="">
                                   </div>
                               </div>
                               <div class="content-top-block" data-parents="ps2">
                                   <div class="name-block">
                                       <div class="b-icon-list">
                                           <span class="icon-football"></span>
                                       </div>
                                       <a href="bet-dashboard-open.html" class="title-block">
                                           <div class="title-placeholde">17 Сентября 19:30</div>
                                           <div class="title-value">Лестер - Ливерпуль</div>
                                       </a>
                                   </div>
                                   <div class="bets-info">
                                       <ul class="bet-info-list">
                                           <li>
                                               <button class="bet-parent-val-slider" data-id="id4" data-text="Победа">
                                                   <span class="dark-text" data-team="Лестер">1</span>
                                                   <span class="value-bet">2.20</span>
                                               </button>
                                           </li>
                                           <li><span class="dark-text">-</span></li>
                                           <li>
                                               <button class="bet-parent-val-slider" data-id="id5" data-text="Победа">
                                                   <span class="dark-text" data-team="Ливерпуль">2</span>
                                                   <span class="value-bet">3.35</span>
                                               </button>
                                           </li>
                                       </ul>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="top-item">
                           <div class="top-item-inner">
                               <div class="image-block" style="background-image: url(images/top-list-3.png)">
                                   <div class="label-ligue">
                                       <img src="/images/ligue-img3.png" alt="">
                                   </div>
                               </div>
                               <div class="content-top-block" data-parents="ps3">
                                   <div class="name-block">
                                       <div class="b-icon-list">
                                           <span class="icon-football"></span>
                                       </div>
                                       <a href="bet-dashboard-open.html" class="title-block">
                                           <div class="title-placeholde">17 Сентября 19:30</div>
                                           <div class="title-value">Бавария - Шальке</div>
                                       </a>
                                   </div>
                                   <div class="bets-info">
                                       <ul class="bet-info-list">
                                           <li>
                                               <button class="bet-parent-val-slider" data-id="id9" data-text="Победа">
                                                   <span class="dark-text" data-team="Бавария">1</span>
                                                   <span class="value-bet">2.20</span>
                                               </button>
                                           </li>
                                           <li>
                                               <button class="bet-parent-val-slider" data-id="id7" data-text="Ничья">
                                                   <span class="dark-text" data-team="">X</span>
                                                   <span class="value-bet">3.35</span>
                                               </button>
                                           </li>
                                           <li>
                                               <button class="bet-parent-val-slider" data-id="id8" data-text="Победа">
                                                   <span class="dark-text" data-team="Шальке">2</span>
                                                   <span class="value-bet">3.35</span>
                                               </button>
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
   <?php } ?>




