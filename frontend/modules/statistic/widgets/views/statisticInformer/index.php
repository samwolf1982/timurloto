<?php

use common\models\helpers\ConstantsHelper;
use yii\helpers\Html;
use yii\helpers\Url;



?>


<div class="row table-row">
    <div class="column-12" id="user-statistic">
        <div class="table-wrapper stats-table tbl-width-pl">
            <div class="table-inner">
                <div class="table-head head-with-tabs head-w_playlist head_w-statistic">
                    <div class="tbl-icon">
                        <img src="images/stats.svg" alt="">
                    </div>
                    <div class="left-head-text">
                        <span class="text-head">Статистика</span>
                    </div>
                    <div class="play-list-drop ">
                        <div class="custom-dropdown">
                            <div class="custom-dropdown-inner">
                                <div class="val-drop">
                                    <button class="val-drop-btn">Лист #A</button>
                                </div>
                                <div class="dropdown-list">
                                    <div class="play-list">

                                        <?php foreach ($playlists as $playlist) {  ?>
                                            <div class="drop-item">
                                                <div class="check-drop">
                                                    <input name="playlist" data-type="statistic" type="radio" id="playlist_statistic_<?=$playlist->id?>" checked="checked" data-value="<?=$playlist->id?>" value="<?=$playlist->name?>">
                                                    <label for="playlist_statistic_<?=$playlist->id?>"><?=$playlist->name?></label>
                                                </div>
                                            </div>
                                        <?php }  ?>


                                    </div>
                                    <div class="drop-item">
                                        <div class="create-playlist">
                                            <div class="input-create">
                                                <input type="text" placeholder="Новый плейлист">
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
                    <div class="right-head-tab">

                            <div class="for-mobile-drop">

                                <?php if(Yii::$app->request->get('stat-period')==ConstantsHelper::STATTICTIC_FILTER_PREIOD_WEEK ){ ?>
                                    <a href="#" df="1" class="trig-filter">Неделя</a>
                                <?php }elseif (Yii::$app->request->get('stat-period')==ConstantsHelper::STATTICTIC_FILTER_PREIOD_MONTH){ ?>
                                    <a href="#" df="2" class="trig-filter">За месяц</a>
                                <?php }elseif (Yii::$app->request->get('stat-period')==ConstantsHelper::STATTICTIC_FILTER_PREIOD_3_MONTH){   ?>
                                    <a href="#" df="3" class="trig-filter">3 месяца</a>
                                <?php }elseif (Yii::$app->request->get('stat-period')==ConstantsHelper::STATTICTIC_FILTER_PREIOD_YEAR){ ?>
                                    <a href="#" df="6" class="trig-filter">Год</a>
                                <?php }else{ ?>
                                    <a href="#" df="8" class="trig-filter">За все время</a>
                                <?php } ?>

                                <ul class="head-tabs">
                                    <li class="<?=Yii::$app->request->get('stat-period')==ConstantsHelper::STATTICTIC_FILTER_PREIOD_WEEK?'active':''?> ">
                                        <a href="<?=Url::toRoute(['/account/view','stat-period'=>ConstantsHelper::STATTICTIC_FILTER_PREIOD_WEEK,'id'=>$user_id,'#'=>'user-statistic'])?>">Неделя</a>
                                    </li>
                                    <li class="<?=Yii::$app->request->get('stat-period')==ConstantsHelper::STATTICTIC_FILTER_PREIOD_MONTH?'active':''?> ">
                                        <a href="<?=Url::toRoute(['/account/view','id'=>$user_id,'stat-period'=>ConstantsHelper::STATTICTIC_FILTER_PREIOD_MONTH,'#'=>'user-statistic'])?>">За месяц</a>
                                    </li>
                                    <li  class="<?=Yii::$app->request->get('stat-period')==ConstantsHelper::STATTICTIC_FILTER_PREIOD_3_MONTH?'active':''?> " >
                                        <a href="<?=Url::toRoute(['/account/view','id'=>$user_id,'stat-period'=>ConstantsHelper::STATTICTIC_FILTER_PREIOD_3_MONTH,'#'=>'user-statistic'])?>">3 месяца</a>
                                    </li>
                                    <li  class="<?=Yii::$app->request->get('stat-period')==ConstantsHelper::STATTICTIC_FILTER_PREIOD_YEAR?'active':''?> ">
                                        <a href="<?=Url::toRoute(['/account/view','id'=>$user_id,'stat-period'=>ConstantsHelper::STATTICTIC_FILTER_PREIOD_YEAR,'#'=>'user-statistic'])?>">Год</a>
                                    </li>
                                    <li  class="<?= empty( Yii::$app->request->get('stat-period'))?'active':''?> ">
                                        <a href="<?=Url::toRoute(['/account/view','id'=>$user_id,'#'=>'user-statistic'])?>">За все время</a>
                                    </li>

                                </ul>
                            </div>




                    </div>
                </div>
                <div class="mobile-tab-block">
                    <div class="play-list-drop" >
                        <div class="custom-dropdown">
                            <div class="custom-dropdown-inner">
                                <div class="val-drop">
                                    <button class="val-drop-btn">Лист #A</button>
                                </div>
                                <div class="dropdown-list">
                                    <div class="play-list">
                                        <div class="drop-item">
                                            <div class="check-drop">
                                                <input name="playlist" type="radio" id="playlist133444" checked="checked" value="Лист #A">
                                                <label for="playlist133444">Лист #A</label>
                                            </div>
                                        </div>
                                        <div class="drop-item">
                                            <div class="check-drop">
                                                <input name="playlist" type="radio" id="playlist233444" value="Лига Чемпионов">
                                                <label for="playlist233444">Лига Чемпионов</label>
                                            </div>
                                        </div>
                                        <div class="drop-item">
                                            <div class="check-drop">
                                                <input name="playlist" type="radio" id="playlist333444" value="НБА">
                                                <label for="playlist333444">НБА</label>
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

                    <div class="right-head-tab">
                        <div class="for-mobile-drop">




                            <?php if(Yii::$app->request->get('stat-period')==ConstantsHelper::STATTICTIC_FILTER_PREIOD_WEEK ){ ?>
                                <a href="#" df="1" class="trig-filter">Неделя</a>
                            <?php }elseif (Yii::$app->request->get('stat-period')==ConstantsHelper::STATTICTIC_FILTER_PREIOD_MONTH){ ?>
                                <a href="#" df="2" class="trig-filter">За месяц</a>
                            <?php }elseif (Yii::$app->request->get('stat-period')==ConstantsHelper::STATTICTIC_FILTER_PREIOD_3_MONTH){   ?>
                                <a href="#" df="3" class="trig-filter">3 месяца</a>
                            <?php }elseif (Yii::$app->request->get('stat-period')==ConstantsHelper::STATTICTIC_FILTER_PREIOD_YEAR){ ?>
                                <a href="#" df="6" class="trig-filter">Год</a>
                            <?php }else{ ?>
                                <a href="#" df="8" class="trig-filter">За все время</a>
                            <?php } ?>



                            <ul class="head-tabs">
                                <li class="<?=Yii::$app->request->get('stat-period')==ConstantsHelper::STATTICTIC_FILTER_PREIOD_WEEK?'active':''?> ">
                                    <a onclick="window.location='<?=Url::toRoute(['/account/view','stat-period'=>ConstantsHelper::STATTICTIC_FILTER_PREIOD_WEEK,'id'=>$user_id])?>'"  href="<?=Url::toRoute(['/account/view','stat-period'=>ConstantsHelper::STATTICTIC_FILTER_PREIOD_WEEK,'id'=>$user_id])?>">Неделя</a>
                                </li>
                                <li class="<?=Yii::$app->request->get('stat-period')==ConstantsHelper::STATTICTIC_FILTER_PREIOD_MONTH?'active':''?> ">
                                    <a onclick="window.location='<?=Url::toRoute(['/account/view','stat-period'=>ConstantsHelper::STATTICTIC_FILTER_PREIOD_MONTH,'id'=>$user_id])?>'"  href="<?=Url::toRoute(['/account/view','id'=>$user_id,'stat-period'=>ConstantsHelper::STATTICTIC_FILTER_PREIOD_MONTH])?>">За месяц</a>
                                </li>
                                <li  class="<?=Yii::$app->request->get('stat-period')==ConstantsHelper::STATTICTIC_FILTER_PREIOD_3_MONTH?'active':''?> " >
                                    <a onclick="window.location='<?=Url::toRoute(['/account/view','stat-period'=>ConstantsHelper::STATTICTIC_FILTER_PREIOD_3_MONTH,'id'=>$user_id])?>'" href="<?=Url::toRoute(['/account/view','id'=>$user_id,'stat-period'=>ConstantsHelper::STATTICTIC_FILTER_PREIOD_3_MONTH])?>">3 месяца</a>
                                </li>
                                <li  class="<?=Yii::$app->request->get('stat-period')==ConstantsHelper::STATTICTIC_FILTER_PREIOD_YEAR?'active':''?> ">
                                    <a onclick="window.location='<?=Url::toRoute(['/account/view','stat-period'=>ConstantsHelper::STATTICTIC_FILTER_PREIOD_YEAR,'id'=>$user_id])?>'" href="<?=Url::toRoute(['/account/view','id'=>$user_id,'stat-period'=>ConstantsHelper::STATTICTIC_FILTER_PREIOD_YEAR])?>">Год</a>
                                </li>
                                <li  class="<?= empty( Yii::$app->request->get('stat-period'))?'active':''?> ">
                                    <a onclick="window.location='<?=Url::toRoute(['/account/view','id'=>$user_id])?>'" href="<?=Url::toRoute(['/account/view','id'=>$user_id])?>">За все время</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="table-body">
                    <div class="stats-tbl-wrapper">
                        <ul class="list-stats-tbl">
                            <li>
                                <a class="question-btn" data-toggle="tooltip" data-placement="top" title="Показатель прибыли от общего баланса. Определяется по суммам ставок в bet coin.">
                                    <span>?</span>
                                </a>
                                <span class="list-stats-tbl-val up-val">
                                                    <?php if(0){ //старый профит относительно ставки НЕ баланса ?>
                                                        <?=$search_result['profit']?> <sup>%</sup>
                                                    <?php } ?>
                                    <?= $newProfit ?> <sup>%</sup>

                                                </span>
                                <span class="list-stats-tbl-title">
                                                    Прибыль
                                                </span>
                            </li>
                            <li>
                                <a class="question-btn" data-toggle="tooltip" data-placement="top" title="Показатель прибыли от банка в 100%
Определяется по суммам ставок в % от игрового банка. Основной показатель Рейтинга">
                                    <span>?</span>
                                </a>
                                <span class="list-stats-tbl-val up-val">
                                                      <?=$search_result['profit']?><sup>%</sup>
                                                </span>
                                <span class="list-stats-tbl-title">
                                                    Турнирная Прибыль
                                                </span>
                            </li>

                            <li>
                                <a class="question-btn" data-toggle="tooltip" data-placement="top" title="Показатель прибыли от банка в 100%
Определяется по суммам ставок в % от игрового банка. Обновляется каждую неделю, является основным пользователем в еженедельном турнире.">
                                    <span>?</span>
                                </a>
                                <span class="list-stats-tbl-val up-val">
                                                      <?=$weekProfit?><sup>%</sup>
                                                </span>
                                <span class="list-stats-tbl-title">
                                                    Недельная прибыль
                                                </span>
                            </li>

                            <li>
                                <a class="question-btn" data-toggle="tooltip" data-placement="top" title="Проходимость - это процент проходимости прогнозов пользователя">
                                    <span>?</span>
                                </a>
                                <span class="list-stats-tbl-val up-val">
                                                     <?=$search_result['penetration']?> <sup>%</sup>
                                                </span>
                                <span class="list-stats-tbl-title">
                                                    Проходимость
                                                </span>
                            </li>




                            <li>
                                <a class="question-btn" data-toggle="tooltip" data-placement="top" title="Средний коэффициент - это среднее значение коэффициента прогнозов пользователя">
                                    <span>?</span>
                                </a>
                                <span class="list-stats-tbl-val up-val">
                                                    <?=$search_result['middle_coef']?>
                                                </span>
                                <span class="list-stats-tbl-title">
                                                    Средний Коэффициент
                                                </span>
                            </li>
                            <li>
                                <a class="question-btn" data-toggle="tooltip" data-placement="top" title="РОИ - это коэффициент возврата инвестиций в %
Доход от вложений / Размер вложений * 100%">
                                    <span>?</span>
                                </a>
                                                <span class="list-stats-tbl-val down-val">
                                                    <?=$search_result['roi'] ?>  <sup>%</sup>
                                                </span>
                                <span class="list-stats-tbl-title">
                                                    ROI
                                                </span>
                            </li>
                            <li>
                                   <a class="question-btn" data-toggle="tooltip" data-placement="top" title="Количество плюсов - это количество выигрышных ставок пользователя">
                                    <span>?</span>
                                </a>
                                                <span class="list-stats-tbl-val up-val">
                                                    <?= empty($search_result['plus'])?0:$search_result['plus'] ?>
                                                </span>
                                <span class="list-stats-tbl-title">
                                                    Количество Плюсов
                                                </span>
                            </li>
                            <li>
                                   <a class="question-btn" data-toggle="tooltip" data-placement="top" title="Количество минусов - это количество проигрышных ставок пользователя">
                                    <span>?</span>
                                </a>
                                                <span class="list-stats-tbl-val up-val">
                                                      <?=empty($search_result['minus'])?0:$search_result['minus'] ?>
                                                </span>
                                <span class="list-stats-tbl-title">
                                                    Количество Минусов
                                                </span>
                            </li>


                            <?php if(0){ ?>
                                <li>
                                                <span class="list-stats-tbl-val up-val">
                                                    38
                                                </span>
                                    <span class="list-stats-tbl-title">
                                                    Количество Минусов
                                                </span>
                                </li>
                           <?php  } ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php if(0){ // old code ?>
    <div class="row table-row">
        <div class="column-12">
            <div class="table-wrapper stats-table tbl-width-pl">
                <div class="table-inner">
                    <div class="table-head head-with-tabs head-w_playlist">
                        <div class="tbl-icon">
                            <img src="/images/stats.svg" alt="">
                        </div>
                        <div class="left-head-text">
                            <span class="text-head">Статистика</span>
                        </div>








                        <div class="play-list-drop  play-list-drop-statistic">

                            <div class="custom-dropdown">
                                <div class="custom-dropdown-inner">
                                    <div class="val-drop">
                                        <button class="val-drop-btn">Лист</button>
                                    </div>
                                    <div class="dropdown-list">
                                        <div class="play-list">


                                            <?php foreach ($playlists as $playlist) {  ?>
                                                <div class="drop-item">
                                                    <div class="check-drop">
                                                        <input name="playlist" data-type="statistic" type="radio" id="playlist_statistic_<?=$playlist->id?>" checked="checked" data-value="<?=$playlist->id?>" value="<?=$playlist->name?>">
                                                        <label for="playlist_statistic_<?=$playlist->id?>"><?=$playlist->name?></label>
                                                    </div>
                                                </div>
                                            <?php }  ?>


                                        </div>
                                        <div class="drop-item">
                                            <div class="create-playlist">
                                                <div class="input-create">
                                                    <input type="text" placeholder="Новый плейлист">
                                                </div>
                                                <div class="btn-create">
                                                    <button class="btn-primary btn btn-hover create-btn_backend " id="createPlaylist">Создать</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="right-head-tab">
                            <div class="for-mobile-drop">
                                <a href="#" class="trig-filter">За месяц</a>
                                <ul class="head-tabs">
                                    <li class="<?=Yii::$app->request->get('stat-period')==ConstantsHelper::STATTICTIC_FILTER_PREIOD_WEEK?'active':''?> ">
                                        <a href="<?=Url::toRoute(['/account/view','stat-period'=>ConstantsHelper::STATTICTIC_FILTER_PREIOD_WEEK,'id'=>$user_id])?>">Неделя</a>
                                    </li>
                                    <li class="<?=Yii::$app->request->get('stat-period')==ConstantsHelper::STATTICTIC_FILTER_PREIOD_MONTH?'active':''?> ">
                                        <a href="<?=Url::toRoute(['/account/view','id'=>$user_id,'stat-period'=>ConstantsHelper::STATTICTIC_FILTER_PREIOD_MONTH])?>">За месяц</a>
                                    </li>
                                    <li  class="<?=Yii::$app->request->get('stat-period')==ConstantsHelper::STATTICTIC_FILTER_PREIOD_3_MONTH?'active':''?> " >
                                        <a href="<?=Url::toRoute(['/account/view','id'=>$user_id,'stat-period'=>ConstantsHelper::STATTICTIC_FILTER_PREIOD_3_MONTH])?>">3 месяца</a>
                                    </li>
                                    <li  class="<?=Yii::$app->request->get('stat-period')==ConstantsHelper::STATTICTIC_FILTER_PREIOD_YEAR?'active':''?> ">
                                        <a href="<?=Url::toRoute(['/account/view','id'=>$user_id,'stat-period'=>ConstantsHelper::STATTICTIC_FILTER_PREIOD_YEAR])?>">Год</a>
                                    </li>
                                    <li  class="<?= empty( Yii::$app->request->get('stat-period'))?'active':''?> ">
                                        <a href="<?=Url::toRoute(['/account/view','id'=>$user_id])?>">За все время</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="table-body">
                        <div class="stats-tbl-wrapper">
                            <ul class="list-stats-tbl">
                                <li>

                                                <span class="list-stats-tbl-val up-val">

                                                    <?php if(0){ //старый профит относительно ставки НЕ баланса ?>
                                                        <?=$search_result['profit']?> <sup>%</sup>
                                                    <?php } ?>
                                                    <?=$newProfit?>  /  <?=$search_result['profit']?>  <sup>%</sup>

                                                </span>
                                    <span class="list-stats-tbl-title">
                                                    Прибыль
                                                </span>
                                </li>
                                <li>
                                                <span class="list-stats-tbl-val up-val">
                                                  <?=$search_result['penetration']?>   <sup>%</sup>
                                                </span>
                                    <span class="list-stats-tbl-title">
                                                    Проходимость
                                                </span>
                                </li>
                                <li>
                                                <span class="list-stats-tbl-val up-val">
                                                    <?=$search_result['middle_coef']?>
                                                </span>
                                    <span class="list-stats-tbl-title">
                                                    Средний Коэффициент
                                                </span>
                                </li>
                                <li>
                                                <span class="list-stats-tbl-val down-val">
                                                     <?=$search_result['roi']?> <sup>%</sup>
                                                </span>
                                    <span class="list-stats-tbl-title">
                                                    ROI
                                                </span>
                                </li>
                                <li>
                                                <span class="list-stats-tbl-val up-val">
                                                    <?=$search_result['plus']?>
                                                </span>
                                    <span class="list-stats-tbl-title">
                                                    Количество Плюсов
                                                </span>
                                </li>
                                <li>
                                                <span class="list-stats-tbl-val up-val">
                                                     <?=$search_result['minus']?>
                                                </span>
                                    <span class="list-stats-tbl-title">
                                                    Количество Минусов
                                                </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>



