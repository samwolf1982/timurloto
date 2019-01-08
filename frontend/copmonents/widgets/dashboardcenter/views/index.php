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

               <?=  $this->render('tabs/tabs_navigation',['tabs'=>$tabs,'activeIdtab'=>$activeIdtab]); ?>
<?php //var_dump($listTurnire); die(); ?>
               <?=  $this->render('tabs/tabs_blocks',['listTurnire'=>$listTurnire]) ?>


           </div>
       </div>
   </div>



<!--   hideen -->
   <div class="content-center-block open_line_center_block">

   </div>




