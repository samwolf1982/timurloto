   <?php


   use app\copmonents\widgets\dashboardcenter\DashboardcenterAsset;
   use common\models\Sportcategorynames;
   use common\models\wraps\EventsnamesExt;
   use common\models\wraps\SportcategoryExt;
   use common\models\wraps\SportcategorynamesExt;
   use common\models\wraps\TournamentsnamesExt;
   use yii\helpers\Html;
   use yii\helpers\Url;


   DashboardcenterAsset::register($this);
   ?>



   <div class="content-center-block main_center_block">
       <div class="head-pink">
           <h3>Популярные ставки на сегодня</h3>
       </div>
       <div class="content-bg pb-5">
           <div class="tab-parent">

               <?=  $this->render('tabs/tabs_navigation',[]) ?>


               <?=  $this->render('tabs/tabs_blocks',[]) ?>


           </div>
       </div>
   </div>



<!--   hideen -->
   <div class="content-center-block open_line_center_block">

       <a href="bet-dashboard.html" class="head-pink">
           <h3>Популярные ставки на сегодня</h3>
       </a>
       <div class="content-bg pb-5">
           <div class="open-bet-wrapper">
               <div class="open-bet-wrapper-inner" data-parents="mach-id22222">
                   <div class="head-open-bet">
                       <div class="icon-open-bet">
                           <span class="icon-football"></span>
                       </div>
                       <div class="title-open-bet">
                           <h3>Атлетико Мадрид - Уэска</h3>
                       </div>
                       <div class="date-open-icon">17 сентября 19:30</div>
                       <a href="bet-dashboard.html" class="total show-all-bets   closeLine">93</a>
                   </div>
                   <div class="body-open-bets">
                       <div class="body-open-bets-inner">
                           <div class="search-bets-block">
                               <div class="search-bets-block-inner">
                                   <form action="#">
                                       <input type="text" placeholder="Поиск по событию">
                                       <button id="search-bets" type="submit"><span class="icon-search"></span></button>
                                   </form>
                               </div>
                           </div>
                           <div class="open-collapsed-wrapper">
                               <div class="collapse-open-bet">
                                   <div class="collapse-open-bet-head">
                                       <button class="collapse-open-bet-trigger active">Победа</button>
                                   </div>
                                   <div class="collapse-open-bet-content">
                                       <div class="collapse-open-bet-item">
                                           <h4>Основное время</h4>
                                           <div class="row-bets-stats">
                                               <div class="column4">
                                                   <button class="bets-val" data-id="betID1">
                                                       <span class="mobile-name">1</span>
                                                       <span class="name-b">Атлетико Мадрид</span>
                                                       <span class="coefficient-b">1.26</span>
                                                   </button>
                                               </div>
                                               <div class="column4">
                                                   <button class="bets-val" data-id="betID2">
                                                       <span class="mobile-name">x</span>
                                                       <span class="name-b">Ничья</span>
                                                       <span class="coefficient-b">6.00</span>
                                                   </button>
                                               </div>
                                               <div class="column4">
                                                   <button class="bets-val" data-id="betID3">
                                                       <span class="mobile-name">2</span>
                                                       <span class="name-b">Уэска</span>
                                                       <span class="coefficient-b">12.75</span>
                                                   </button>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="collapse-open-bet-item">
                                           <h4>1 тайм</h4>
                                           <div class="row-bets-stats">
                                               <div class="column4">
                                                   <button class="bets-val" data-id="betID4">
                                                       <span class="name-b">Атлетико Мадрид</span>
                                                       <span class="coefficient-b">12.26</span>
                                                   </button>
                                               </div>
                                               <div class="column4">
                                                   <button class="bets-val" data-id="betID5">
                                                       <span class="name-b">Ничья</span>
                                                       <span class="coefficient-b">1.00</span>
                                                   </button>
                                               </div>
                                               <div class="column4">
                                                   <button class="bets-val" data-id="betID6">
                                                       <span class="name-b">Уэска</span>
                                                       <span class="coefficient-b">4.75</span>
                                                   </button>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="collapse-open-bet-item">
                                           <h4>2 тайм</h4>
                                           <div class="row-bets-stats">
                                               <div class="column4">
                                                   <button class="bets-val" data-id="betID7">
                                                       <span class="name-b">Атлетико Мадрид</span>
                                                       <span class="coefficient-b">3.00</span>
                                                   </button>
                                               </div>
                                               <div class="column4">
                                                   <button class="bets-val" data-id="betID8">
                                                       <span class="name-b">Ничья</span>
                                                       <span class="coefficient-b">3.00</span>
                                                   </button>
                                               </div>
                                               <div class="column4">
                                                   <button class="bets-val" data-id="betID9">
                                                       <span class="name-b">Уэска</span>
                                                       <span class="coefficient-b">5.75</span>
                                                   </button>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="collapse-open-bet">
                                   <div class="collapse-open-bet-head">
                                       <button class="collapse-open-bet-trigger active">Двойной исход</button>
                                   </div>
                                   <div class="collapse-open-bet-content">
                                       <div class="collapse-open-bet-item">
                                           <h4>Основное время</h4>
                                           <div class="row-bets-stats">
                                               <div class="column4">
                                                   <button class="bets-val" data-id="betID10">
                                                       <span class="name-b">1x</span>
                                                       <span class="coefficient-b">1.26</span>
                                                   </button>
                                               </div>
                                               <div class="column4">
                                                   <button class="bets-val" data-id="betID11">
                                                       <span class="name-b">12</span>
                                                       <span class="coefficient-b">6.00</span>
                                                   </button>
                                               </div>
                                               <div class="column4">
                                                   <button class="bets-val" data-id="betID12">
                                                       <span class="name-b">x2</span>
                                                       <span class="coefficient-b">12.75</span>
                                                   </button>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="collapse-open-bet">
                                   <div class="collapse-open-bet-head">
                                       <button class="collapse-open-bet-trigger active">Результат без ничьи</button>
                                   </div>
                                   <div class="collapse-open-bet-content">
                                       <div class="collapse-open-bet-item">
                                           <h4>Основное время</h4>
                                           <div class="row-bets-stats">
                                               <div class="column6">
                                                   <button class="bets-val" data-id="betID13">
                                                       <span class="name-b">Атлетико Мадрид</span>
                                                       <span class="coefficient-b">1.26</span>
                                                   </button>
                                               </div>
                                               <div class="column6">
                                                   <button class="bets-val" data-id="betID14">
                                                       <span class="name-b">Уэска</span>
                                                       <span class="coefficient-b">12.00</span>
                                                   </button>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="collapse-open-bet">
                                   <div class="collapse-open-bet-head">
                                       <button class="collapse-open-bet-trigger active">Фора</button>
                                   </div>
                                   <div class="collapse-open-bet-content">
                                       <div class="collapse-open-bet-item">
                                           <h4>Основное время</h4>
                                           <div class="row-bets-stats">
                                               <div class="column6">
                                                   <button class="bets-val" data-id="betID15">
                                                       <span class="name-b">Атлетико Мадрид (-4.0)</span>
                                                       <span class="coefficient-b">1.26</span>
                                                   </button>
                                               </div>
                                               <div class="column6">
                                                   <button class="bets-val" data-id="betID16">
                                                       <span class="name-b">Уэска (+4.0)</span>
                                                       <span class="coefficient-b">12.75</span>
                                                   </button>
                                               </div>
                                           </div>
                                           <div class="row-bets-stats">
                                               <div class="column6">
                                                   <button class="bets-val" data-id="betID17">
                                                       <span class="name-b">Атлетико Мадрид (-3.5)</span>
                                                       <span class="coefficient-b">1.26</span>
                                                   </button>
                                               </div>
                                               <div class="column6">
                                                   <button class="bets-val" data-id="betID18">
                                                       <span class="name-b">Уэска (+3.5)</span>
                                                       <span class="coefficient-b">12.75</span>
                                                   </button>
                                               </div>
                                           </div>
                                           <div class="row-bets-stats">
                                               <div class="column6">
                                                   <button class="bets-val" data-id="betID19">
                                                       <span class="name-b">Атлетико Мадрид (-3.0)</span>
                                                       <span class="coefficient-b">1.26</span>
                                                   </button>
                                               </div>
                                               <div class="column6">
                                                   <button class="bets-val" data-id="betID20">
                                                       <span class="name-b">Уэска (+3.0)</span>
                                                       <span class="coefficient-b">12.75</span>
                                                   </button>
                                               </div>
                                           </div>
                                           <div class="row-bets-stats">
                                               <div class="column6">
                                                   <button class="bets-val" data-id="betID21">
                                                       <span class="name-b">Атлетико Мадрид (-2.5)</span>
                                                       <span class="coefficient-b">1.26</span>
                                                   </button>
                                               </div>
                                               <div class="column6">
                                                   <button class="bets-val" data-id="betID22">
                                                       <span class="name-b">Уэска (+2.5)</span>
                                                       <span class="coefficient-b">12.75</span>
                                                   </button>
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
       </div>


   </div>




