   <?php
   // тольо модальное окно

   use app\copmonents\widgets\addbet\AddbetAsset;
   use common\models\Sportcategorynames;
   use common\models\wraps\EventsnamesExt;
   use common\models\wraps\SportcategoryExt;
   use common\models\wraps\SportcategorynamesExt;
   use common\models\wraps\TournamentsnamesExt;
   use yii\helpers\Html;
   use yii\helpers\Url;


   AddbetAsset::register($this);
   ?>


   <div class="modal-wrapper bet-modal modal-945" id="modal-add-prognoz">
       <div class="modal-inner">


           <?php if(0){ ?>
           <div id="cartStycky" class="sticky sidebar-wrapper sidebar-fixed">
               <ul class="nav nav-tabs" id="betTab" role="tablist">
                   <li class="nav-item">
                       <a class="nav-link active" id="bet_ordinar_tab" data-toggle="tab" href="#bet_ordinar" role="tab" aria-controls="home" aria-selected="true">Ординар</a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" id="bet_express_tab" data-toggle="tab" href="#bet_express" role="tab" aria-controls="profile" aria-selected="false">Экспресс</a>
                   </li>

               </ul>
               <div class="tab-content" id="betTabContent">
                   <div class="tab-pane fade show active" id="bet_ordinar" role="tabpanel" aria-labelledby="bet_ordinar_tab">

                       <h2 class="text-center infoMessage_">Здесь можна сделать ставку ординар</h2><form class="betForm" id="457" action="#" onsubmit="submitBetForm(this); return false;"><div class="row">
                               <div class="input-row column-6">
                                   <div class="input-row-inner">
                                       <input type="text" value="56" title="Значение должно быть целым числом, больше нуля, максимальное значение не более 5000" pattern="(5000|([1-4][0-9][0-9][0-9])|([1-9][0-9][0-9])|([1-9][0-9])|[1-9])" required="required" required   class="inputBetForm" id="sum" name="sum" placeholder="Сумма">
                                       <input type="hidden" value="123" name="bet" >
                                       <input type="hidden" value="123" name="hash" >
                                       <input type="hidden" value="ordinar" name="typeBet" >
                                   </div>
                               </div>
                               <div class="input-row column-6">
                                   <div class="input-row-inner">
                                       <button type="submit" class="btn btn-primary pull-right inputBetSubmit">Сделать ставку</button>
                                   </div>
                               </div>
                           </div>
                       </form>
                   </div>

                   <div class="tab-pane fade" id="bet_express" role="tabpanel" aria-labelledby="bet_express_tab">

                       <h2 class="text-center infoMessage_">Здесь можна сделать ставку експрес</h2><form class="betForm" id="456" action="#" onsubmit="submitBetForm(this); return false;"><div class="row">
                               <div class="input-row column-6">
                                   <div class="input-row-inner">
                                       <input type="text" value="56" title="Значение должно быть целым числом, больше нуля, максимальное значение не более 5000" pattern="(5000|([1-4][0-9][0-9][0-9])|([1-9][0-9][0-9])|([1-9][0-9])|[1-9])" required="required" required   class="inputBetForm" id="sum" name="sum" placeholder="Сумма">
                                       <input type="hidden" value="'.$data.'" name="bet" >
                                       <input type="hidden" value="'.$unik2.'" name="hash" >
                                       <input type="hidden" value="ordinar" name="typeBet" >
                                   </div>
                               </div>
                               <div class="input-row column-6">
                                   <div class="input-row-inner">
                                       <button type="submit" class="btn btn-primary pull-right inputBetSubmit">Сделать ставку</button>
                                   </div>
                               </div>
                           </div>
                       </form>
                   </div>

               </div>
           </div>
<?php } ?>

           <div id="cartStycky" class="sticky sidebar-wrapper sidebar-fixed">
               <h3 class="cartStyckyHeader text-center">Игровой билет</h3>
               <ul class="nav nav-pills nav-justified">
                   <li  class="cartCat  active"><a href="#">Ординар</a></li>
                   <li  class="cartCat" ><a href="#">Экспресс</a></li>
               </ul>

               <div class="wrapCart">
               <div class="cartError"></div>
               <div class="cartInfo"></div>
               <div class="cartBody">
                   <form action="" id="cartBet" method="post">
                       <div class="playliste">
                           <div class="row">
                               <div class="input-row column-12">
                                   <div class="input-row-inner">

                                       <?= Html::dropDownList('playlist',null,$playlists, ['prompt' => 'Плейлист', 'id'=>'playlistExt', 'class'=>'single-select']) ?>

                                   </div>
                               </div>
                           </div>
                       </div>

                            <div class="cartElements">

                                 <?= $block_bets ?>


                                <?php   foreach (range(0,0) as $k=>$el){ break;   // удалить  ?>
                                <div class="cartElement" data-cod="<?=$el?>" >
                                    <div class="closeE">
                                        <button type="button" class="close stickiClose" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="selectE">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </div>
                                    <div class="infoE">
                                        <div class="name1">name </div>
                                        <div class="name2">name name</div>
                                        <div class="name3">
                                               <div class="_name3">
                                                 name name name
                                               </div>
                                            <div class="_name3Cof">
                                                 X 12.5
                                               </div>

                                        </div>
                                    </div>

                                </div>
                                    <hr>
                                <?php  } ?>


                            </div>



                       <div class="cartInfoFooter"></div>

                       <div class="cartComments">
                           <div class="input-row column-12">
                               <div class="input-row-inner ">
                                   <textarea name="comment" required id="commentCart"  cols="30" rows="10" placeholder="Ваш коментарий">Тестовый коментарий                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam debitis dolor, excepturi incidunt ipsam iure nobis perferendis quidem. A ab at doloremque illo qui recusandae rem repellendus soluta tempora ullam.</textarea>
                               </div>
                           </div>
                       </div>

                            <div class="cartSubmit">
                                <div class="input-row column-12">
                                    <div class="input-row-inner text-center">
                                        <button type="submit" class="btn btn-hover btn-primary">Сделать ставку</button>
                                    </div>
                                </div>
                            </div>
                   </form>
               </div>
               <div class="cartFooter"></div>
               </div>
           </div>

           <div class="modal-content">
               <div class="modal-content-inner">
                   <div class="header-modal">
                       <button class="close" data-toggle="modal-dismiss"><span class="icon-close2"></span></button>
                   </div>
                   <div class="body-modal">
                       <div class="add-bet-inner">
                           <div class="title-modal">
                               <h2>Новый Прогноз</h2>

                               <p>
                                  <?=$betMessage; ?>
                               </p>
                           </div>
                           <div class="form-add-bet">

                                   <div class="field-set-add-bet">
                                       <div class="row">
                                           <div class="input-row column-6">
                                               <div class="input-row-inner">

                                                   <?= Html::dropDownList('sportcategorynamesExt',null,SportcategorynamesExt::getAll(), ['prompt' => 'Вид спорта', 'id'=>'sportcategorynamesExt', 'class'=>'single-select']) ?>

                                               </div>
                                           </div>
                                           <div class="input-row column-6">
                                               <div class="input-row-inner">

                                                   <?= Html::dropDownList('sportcategoryExt',null,SportcategoryExt::getAll(), ['prompt' => 'Страна', 'id'=>'sportcategoryExt', 'class'=>'single-select']) ?>

                                               </div>
                                           </div>
                                       </div>
                                       <div class="row">
                                           <div class="input-row column-6">
                                               <div class="input-row-inner">

                                                   <?= Html::dropDownList('tournamentsnamesExt',null,TournamentsnamesExt::getAll(), ['prompt' => 'Турнир', 'id'=>'tournamentsnamesExt', 'class'=>'single-select']) ?>

                                               </div>
                                           </div>
                                           <div class="input-row column-6">
                                               <div class="input-row-inner">

                                                   <?= Html::dropDownList('eventsnamesExt',null,EventsnamesExt::getAll(), ['prompt' => 'Событие', 'id'=>'eventsnamesExt', 'class'=>'single-select']) ?>






                                               </div>
                                           </div>
                                       </div>
                                       <div class="row">
                                           <div class="input-row column-6">
                                               <div class="input-row-inner">
                                                   <input type="text" placeholder="Название матча">
                                               </div>
                                           </div>
                                           <div class="input-row column-6">
                                               <div class="input-row-inner">
                                                   <input type="text" placeholder="Прогноз">
                                               </div>
                                           </div>
                                       </div>
                                       <div class="row">
                                           <div class="input-row column-3">
                                               <div class="input-row-inner">
                                                   <input type="text" placeholder="Коэффициент">
                                               </div>
                                           </div>
                                           <div class="input-row column-3">
                                               <div class="input-row-inner">
                                                   <input type="text" placeholder="Процент от банка (%)">
                                               </div>
                                           </div>
                                           <div class="input-row column-6 column-m-12">
                                               <div class="input-row-inner date-drop">
                                                   <input type="text" placeholder="Дата">
                                                   <span class="icon-calendar"></span>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="row">
                                           <div class="input-row column-12">
                                               <div class="input-row-inner">
                                                   <textarea placeholder="Описание прогноза"></textarea>
                                               </div>
                                           </div>
                                       </div>

                                       <div class="row">
                                           <div class="input-row column-12">
                                               <div class="betsArea" id="betsArea">

                                               </div>
                                           </div>
                                       </div>




                                       <div class="row btn-row">
                                           <div class="input-row column-12">
                                               <div class="input-row-inner text-center">
                                                   <button class="btn btn-hover btn-primary">Дать Прогноз</button>
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