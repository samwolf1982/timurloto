   <?php
   use yii\helpers\Html;
   use yii\helpers\Url;
   ?>



   <div class="section review-section">
       <div class="content-block">
           <div class="content-block-inner">
               <div class="content-container">
                   <div class="row">
                       <div class="column-12">
                           <h2 class="h1">Отзывы Пользователей</h2>
                       </div>
                       <div class="slider-rev-block column-10">
                           <div class="rev-slider">


                               <?php foreach ($models as $i => $model) { ?>
                                   <div class="item-rev">
                                       <div class="review-inner">
                                           <div class="avatar-block">
                                               <div class="avatar">
                                                   <a href="<?=Url::toRoute(['/account/view',"id"=>$model->id]) ?>"> <img style="border-radius: 50%;" src="<?=$model->imageurl ?>" alt="<?=$model->username ?>"></a>
                                               </div>
                                           </div>
                                           <div class="text-review">
                                               <h4><?=$model->username ?></h4>
                                               <p>
                                                  <?=$comentsList[$i]?>
                                               </p>
                                           </div>
                                       </div>
                                   </div>
                              <?php } ?>



                           </div>
                       </div>
                       <div class="column-12 btn-block">

                           <?php   if(Yii::$app->user->isGuest) { ?>
                               <a href="#" class="btn-round btn-primary" data-toggle="modal-reg" data-target="#modal-auth">
                                   <span class="icon-man"></span>
                               </a>
                           <?php } ?>
                           <div class="arrow-review"></div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>