   <?php
   use app\copmonents\widgets\addbet\AddbetAsset;
   use app\copmonents\widgets\dashboardpopular\DashboardpopularAsset;
   use common\models\Popularwiget;
   use common\models\Sportcategorynames;
   use common\models\wraps\EventsnamesExt;
   use common\models\wraps\SportcategoryExt;
   use common\models\wraps\SportcategorynamesExt;
   use common\models\wraps\TournamentsnamesExt;
   use yii\helpers\Html;
   use yii\helpers\Url;


  // DashboardpopularAsset::register($this);
   ?>

   <div class="inner-sidebar">


       <div class="head-pink">
           <h3>Популярное</h3>
       </div>

       <div class="top-list-rated">
           <ul class="top-list">

               <?php foreach ($models as $model) {

                   /** @var  $model Popularwiget */
//                   Popularwiget

                   ?>
                   <li>
                       <a href="#"  data-id="<?=$model->turnireid ?>" class="top-link-block">
                           <div class="icon-list">
                               <span class="icon-football"></span>
                           </div>
                           <div class="title-list">
                               <div class="placeholder"><?=$model->sportname?></div>
                               <div class="value-title"><?=$model->turnirename?></div>
                           </div>
                           <span class="count-item-link hidden">27</span>
                       </a>
                   </li>
               <?php } ?>


           </ul>


       </div>
   </div>



   <?php if(0){ // верстка ?>
       <div class="inner-sidebar">


           <div class="head-pink">
               <h3>Популярное</h3>
           </div>

           <div class="top-list-rated">
               <ul class="top-list">


                   <li>
                       <a href="#" class="top-link-block">
                           <div class="icon-list">
                               <span class="icon-football"></span>
                           </div>
                           <div class="title-list">
                               <div class="placeholder">Футбол</div>
                               <div class="value-title">Английская АПЛ</div>
                           </div>
                           <span class="count-item-link">27</span>
                       </a>
                   </li>
                   <li>
                       <a href="#" class="top-link-block">
                           <div class="icon-list">
                               <span class="icon-football"></span>
                           </div>
                           <div class="title-list">
                               <div class="placeholder">Футбол</div>
                               <div class="value-title">Английская АПЛ</div>
                           </div>
                           <span class="count-item-link">27</span>
                       </a>
                   </li>
                   <li>
                       <a href="#" class="top-link-block">
                           <div class="icon-list">
                               <span class="icon-football"></span>
                           </div>
                           <div class="title-list">
                               <div class="placeholder">Футбол</div>
                               <div class="value-title">Английская АПЛ</div>
                           </div>
                           <span class="count-item-link">27</span>
                       </a>
                   </li>
                   <li>
                       <a href="#" class="top-link-block">
                           <div class="icon-list">
                               <span class="icon-football"></span>
                           </div>
                           <div class="title-list">
                               <div class="placeholder">Футбол</div>
                               <div class="value-title">Английская АПЛ</div>
                           </div>
                           <span class="count-item-link">27</span>
                       </a>
                   </li>
                   <li>
                       <a href="#" class="top-link-block">
                           <div class="icon-list">
                               <span class="icon-football"></span>
                           </div>
                           <div class="title-list">
                               <div class="placeholder">Футбол</div>
                               <div class="value-title">Английская АПЛ</div>
                           </div>
                           <span class="count-item-link">27</span>
                       </a>
                   </li>
                   <li>
                       <a href="#" class="top-link-block">
                           <div class="icon-list">
                               <span class="icon-football"></span>
                           </div>
                           <div class="title-list">
                               <div class="placeholder">Футбол</div>
                               <div class="value-title">Английская АПЛ</div>
                           </div>
                           <span class="count-item-link">27</span>
                       </a>
                   </li>
                   <li>
                       <a href="#" class="top-link-block">
                           <div class="icon-list">
                               <span class="icon-football"></span>
                           </div>
                           <div class="title-list">
                               <div class="placeholder">Футбол</div>
                               <div class="value-title">Английская АПЛ</div>
                           </div>
                           <span class="count-item-link">27</span>
                       </a>
                   </li>
                   <li>
                       <a href="#" class="top-link-block">
                           <div class="icon-list">
                               <span class="icon-football"></span>
                           </div>
                           <div class="title-list">
                               <div class="placeholder">Футбол</div>
                               <div class="value-title">Английская АПЛ</div>
                           </div>
                           <span class="count-item-link">27</span>
                       </a>
                   </li>

                   <li>
                       <a href="#" class="top-link-block">
                           <div class="icon-list">
                               <span class="icon-tenis"></span>
                           </div>
                           <div class="title-list">
                               <div class="placeholder">Теннис</div>
                               <div class="value-title">US Open - мужчины</div>
                           </div>
                           <span class="count-item-link">27</span>
                       </a>
                   </li>
                   <li>
                       <a href="#" class="top-link-block">
                           <div class="icon-list">
                               <span class="icon-tenis"></span>
                           </div>
                           <div class="title-list">
                               <div class="placeholder">Теннис</div>
                               <div class="value-title">US Open - женщины</div>
                           </div>
                           <span class="count-item-link">27</span>
                       </a>
                   </li>
                   <li>
                       <a href="#" class="top-link-block">
                           <div class="icon-list">
                               <span class="icon-tenis"></span>
                           </div>
                           <div class="title-list">
                               <div class="placeholder">UFC 229</div>
                               <div class="value-title">Mcgregor vs NurmAgomedov</div>
                           </div>
                           <span class="count-item-link">27</span>
                       </a>
                   </li>
               </ul>


           </div>
       </div>
   <?php } ?>



