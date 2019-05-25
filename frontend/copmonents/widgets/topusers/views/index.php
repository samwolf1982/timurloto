   <?php

   use common\models\helpers\HtmlGenerator;
   use common\models\overiden\User;
   use common\models\services\AccessInfo;
   use common\models\services\UserInfo;
   use yii\helpers\Html;
   use yii\helpers\Url;
   use yii\widgets\LinkPager;


   ?>


   <div class="row table-row">
       <div class="column-12">
           <div class="table-wrapper top-user-table">
               <div class="table-inner">
                   <div class="table-head head-with-tabs head-custom-tabs">
                       <div class="tbl-icon tbl-icon-select">
                           <img src="/images/champ.svg" alt="">
                       </div>
                       <div class="left-head-text">
                           <div class="title-w-select">Еженедельный Турнир  15,000 ₽ </div>
                           <div class="select-type-block">

                               <div class="select-type-block-inner">
                                   <?php $dtop= Yii::$app->request->get('dtop') ?>
                                   <select class="single-select"  onchange="if (this.value) window.location.href=this.value" >
                                       <option     value="<?=Url::toRoute(['/bet'])?>">&nbsp;Турнир текущий &nbsp;&nbsp;&nbsp;</option>
                                       <option style="white-space: nowrap;" <?=$dtop==$prewWeek_1?'selected':'' ?> value="<?=Url::toRoute(['/bet','dtop'=>$prewWeek_1])?>">1 Турнир (<?=$prewWeek_1_text?>)</option>
                                       <option style="white-space: nowrap;" <?=$dtop==$prewWeek_2?'selected':'' ?> value="<?=Url::toRoute(['/bet','dtop'=>$prewWeek_2])?>">2 Турнир (<?=$prewWeek_2_text?>)</option>
                                       <option style="white-space: nowrap;" <?=$dtop==$prewWeek_3?'selected':'' ?> value="<?=Url::toRoute(['/bet','dtop'=>$prewWeek_3])?>">3 Турнир (<?=$prewWeek_3_text?>)</option>
                                       <option style="white-space: nowrap;" <?=$dtop==$prewWeek_4?'selected':'' ?> value="<?=Url::toRoute(['/bet','dtop'=>$prewWeek_4])?>">4 Турнир (<?=$prewWeek_4_text?>)</option>

                                   </select>
                               </div>
                           </div>


                       </div>
                       <div class="right-head-tab">
                           <div class="for-mobile-drop desinbtn-drop">

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
                                   <div class="td table-cell td-passability">Проходимость</div>
                                   <div class="td table-cell td-coeficient">Коэффициент</div>
                                   <?php if(0){ // прячем рои ?>
                                       <div class="td table-cell td-roi">ROI</div>
                                   <?php } ?>
                                   <div class="td table-cell td-roi">Баланс</div>
                               </div>

                               <?php

                              // var_dump($dataProvider->getKeys()); die();
//                               var_dump($dataProvider->keys); die();
//                               var_dump($dataProvider->getModels()); die();

                               $models = array_values($dataProvider->getModels());


                               // индекс (номер в турнире) первого игрока потом инкремент
                               $startCount=1;
                               if(isset($models[0]['user_id'])){
                                   $accessInfo=new AccessInfo($models[0]['user_id']);
                                   $startCount=  $accessInfo->getWeekNum($models[0]['user_id']);
                               }
                            //   $keys = $dataProvider->getKeys();
                               $rows = [];

//                               var_dump($dataProvider); die();
                               foreach ($models as $index => $model) {
                                   $user=User::find()->where(['id'=>$model['user_id']])->one();
                                   if(!empty($user)){


                                   $useeInfo=new UserInfo($user->id);
                                   $pathToUser=Url::toRoute(['/account/view','id'=>$user->id]);

                                 $profite=  sprintf("%01.2f %%", $model['sume']);
                                 $penet=  sprintf("%01.2f %%", $model['penet']);
                                 $coef=sprintf("%01.2f", $model['mdc']);
                                   $roi=sprintf("%01.2f", ($model['ro']*100));
                                       // французский формат
                                       $balaneuser = number_format($useeInfo->getBalance(), 0, '', ' ');
// 1 234,56
                                       // перезапись профит иначе не совпадает // берем профит из кабинета
//                                       if(!Yii::$app->request->get('dtop')){
//                                           $accesInfo=new AccessInfo($user->id);
//                                           $profite=$accesInfo->getWeekProfit($user->id);
//                                       }


                                   echo '         <div class="hr table-row">
                                   <div class="td table-cell td-count">'.$startCount++.'</div>
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
                                   <div class="td table-cell td-roi">'.$balaneuser.'</div>
                               </div>';
                               }
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
               <img class="tournire_1"  src="/images/commercical/tournire1.jpg" alt="tournire1">
           </a>
       </div>
   </div>