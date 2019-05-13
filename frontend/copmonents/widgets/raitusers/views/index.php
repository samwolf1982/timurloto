   <?php

   use common\models\helpers\ConstantsHelper;
   use common\models\helpers\HtmlGenerator;
   use common\models\overiden\User;
   use common\models\search\BalancestatisticsSearch;
   use common\models\services\UserInfo;
   use yii\helpers\Html;
   use yii\helpers\Url;
   use yii\widgets\LinkPager;

   ?>

   <div class="row table-row">
       <div class="column-12">
           <div class="table-wrapper top-user-table raite-table">
               <div class="table-inner">
                   <div class="table-head head-with-tabs head-custom-tabs">
                       <div class="tbl-icon tbl-icon-select">
                           <img src="/images/champ.svg" alt="">
                       </div>
                       <div class="left-head-text">
                           <div class="title-w-select"> РЕЙТИНГ ПОЛЬЗОВАТЕЛЕЙ</div>


                           
                       </div>



                           <div class="right-head-tab" id="tope100">
                               <div class="for-mobile-drop desinbtn-drop">



                                   <?php  if( $period3m == 'active'){  ?>
                                       <a href="#" class="trig-filter">3 месяца</a>
                                   <?php  }elseif ($periodAll == 'active'){   ?>
                                       <a href="#" class="trig-filter">За все время</a>
                                   <?php  }else{   ?>
                                       <a href="#" class="trig-filter">За месяц</a>
                                   <?php } ?>
                                   <ul class="head-tabs">
                                       <li class="<?=$periodOne?>">
                                           <a onclick="window.location='<?=Url::to(['/bet']);?>'" href="<?=Url::to(['/bet']);?>">За месяц</a>
                                       </li>
                                       <li class="<?=$period3m?>">
                                           <a onclick="window.location='<?=Url::to(['/bet','period'=>ConstantsHelper::PERIOD_3_M]);?>'" href="<?=Url::to(['/bet','period'=>ConstantsHelper::PERIOD_3_M]);?>">3 месяца</a>
                                       </li>
                                       <li class="<?=$periodAll?>">
                                           <a onclick="window.location='<?=Url::to(['/bet','period'=>ConstantsHelper::PERIOD_ALL]);?>'" href="<?=Url::to(['/bet','period'=>ConstantsHelper::PERIOD_ALL]);?>">За все время</a>
                                       </li>
                                   </ul>
                               </div>
                           </div>





                   </div>

                   <div class="table-body">
                       <div class="table-block-rating">
                           <div class="table-block-rating-inner">
                               <div class="hr table-head">
                                   <div class="td table-cell td-count">#</div>
                                   <div class="td table-cell td-user"></div>
                                   <div class="td table-cell td-profit">Profit</div>
                                   <div class="td table-cell td-passability">Проход<span class="show-sm-own" >.</span><span class="hidden-sm-own">имость</span></div>
                                   <div class="td table-cell td-coeficient">Коэф<span class="show-sm-own" >.</span><span class="hidden-sm-own">фициент</span></div>
                                   <div class="td table-cell td-roi">ROI</div>
                                   <div class="td table-cell td-roi">Плюс</div>
                                   <div class="td table-cell td-roi">Минус</div>
                               </div>

                               <?php
                               $models = array_values($dataProvider->getModels());
                               $keys = $dataProvider->getKeys();
                               $rows = [];
                               foreach ($models as $index => $model) {

                                   $user=User::find()->where(['id'=>$model['user_id']])->one();
                                   if(empty($user)) continue;
                                   $useeInfo=new UserInfo($user->id);
                                   $pathToUser=Url::toRoute(['/account/view','id'=>$user->id]);
                                 $profite=  sprintf("%01.2f %%", $model['sume']);
                                 $penet=  sprintf("%01.2f %%", $model['penet']);
                                 $coef=sprintf("%01.2f", $model['mdc']);


                                   $lv= BalancestatisticsSearch::generateLastWeekParams();
                                   $roi=sprintf("%01.2f", BalancestatisticsSearch::newRoiCalk($model['user_id'],$lv['lastWeek'],$lv['lastLastWeek']));  ;

                                   $period=ConstantsHelper::STATTICTIC_FILTER_PREIOD_MONTH;
                                   if(Yii::$app->request->get('period')=='3m')$period=ConstantsHelper::STATTICTIC_FILTER_PREIOD_3_MONTH;
                                   if(Yii::$app->request->get('period')=='all')$period='all';
                                   $lv= BalancestatisticsSearch::searchCountPeroiod($model['user_id'],$period);
                                   $lv_plus = $lv['plus'];


                                   $period=ConstantsHelper::STATTICTIC_FILTER_PREIOD_MONTH;
                                   if(Yii::$app->request->get('period')=='3m')$period=ConstantsHelper::STATTICTIC_FILTER_PREIOD_3_MONTH;
                                   if(Yii::$app->request->get('period')=='all')$period='all';
                                   $lv= BalancestatisticsSearch::searchCountPeroiod($model['user_id'],$period);
                                   $lv_minus=  $lv['minus'];

                                   echo '         <div class="hr table-row">
                                   <div class="td table-cell td-count">'.($index+1).'</div>
                                   <div class="td table-cell td-user">
                                      <div class="row-ava">
                                           <div class="rate-avatar">
                                             <a href="'.$pathToUser.'">  <div class="circle-wrapper" data-ptc="'.$useeInfo->getUserLevelNumber().'">
                                                   <div class="circle"></div>
                                               </div>
                                               </a>
                                               <div class="avatar-user">
                                                   <img src="/'.$user->imageurl.'" alt="'.$useeInfo->getUserName().'">
                                               </div>
                                               
                                           </div>
                                           <div class="user-info">
                                               <a href="'.$pathToUser.'" style="color: white;"> <h4 class="name-r">'.$useeInfo->getUserName().'</h4> </a>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="td table-cell td-profit">'.$profite.'</div>
                                   <div class="td table-cell td-passability">'.$penet.'</div>
                                   <div class="td table-cell td-coeficient">'.$coef.'</div>
                                   <div class="td table-cell td-roi">'.$roi.'</div>
                                    <div class="td table-cell td-roi">'.$lv_plus.'</div>
                                    <div class="td table-cell td-roi">'.$lv_minus.'</div>
                               </div>';
                               }

                               ?>




                           </div>
                       </div>
                   </div>


                   <?php

                   $pagination = $dataProvider->getPagination();
                   if ($pagination === false || $dataProvider->getCount() <= 0) {

                   }

                   ?>
                   <div class="table-footer">
                     <div class="pagination">
                         <?php
                         // отображаем ссылки на страницы
                         echo LinkPager::widget([
                             'pagination' => $pagination,
                             'firstPageCssClass' => 'first-pag',
                             'lastPageCssClass' => 'last-pag',
                              'options' => ['class' => 'pagination-list'],
                         ]);
                         ?>
                     </div>


                   </div>

               </div>
           </div>
       </div>
       <div class="column-12 block-bnr">
           <a href="#">
               <img src="/images/ad@3x.jpg" alt="">
           </a>
       </div>
   </div>