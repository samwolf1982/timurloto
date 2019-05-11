<?php

use common\models\helpers\ConstantsHelper;
use yii\helpers\Html;
use yii\helpers\Url;


?>


<div class="row table-row">
    <div class="column-12">
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
                                    <button class="val-drop-btn">Плейлист #A</button>
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
                <div class="mobile-tab-block">
                    <div class="play-list-drop" >
                        <div class="custom-dropdown">
                            <div class="custom-dropdown-inner">
                                <div class="val-drop">
                                    <button class="val-drop-btn">Плейлист #A</button>
                                </div>
                                <div class="dropdown-list">
                                    <div class="play-list">
                                        <div class="drop-item">
                                            <div class="check-drop">
                                                <input name="playlist" type="radio" id="playlist133444" checked="checked" value="Плейлист #A">
                                                <label for="playlist133444">Плейлист #A</label>
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
                            <a href="#" class="trig-filter">За месяц</a>
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
                                <a class="question-btn" data-toggle="tooltip" data-placement="top" title="Sed ut perspiciatis unde omnisiste natus error sit">
                                    <span>?</span>
                                </a>
                                <span class="list-stats-tbl-val up-val">
                                                    <?php if(0){ //старый профит относительно ставки НЕ баланса ?>
                                                        <?=$search_result['profit']?> <sup>%</sup>
                                                    <?php } ?>
                                    <?=$newProfit?> <sup>%</sup>

                                                </span>
                                <span class="list-stats-tbl-title">
                                                    Прибыль
                                                </span>
                            </li>
                            <li>
                                <a class="question-btn" data-toggle="tooltip" data-placement="top" title="Sed ut perspiciatis unde omnisiste natus error sit">
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
                                <a class="question-btn" data-toggle="tooltip" data-placement="top" title="Sed ut perspiciatis unde omnisiste natus error sit">
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
                                <a class="question-btn" data-toggle="tooltip" data-placement="top" title="Sed ut perspiciatis unde omnisiste natus error sit">
                                    <span>?</span>
                                </a>
                                <span class="list-stats-tbl-val up-val">
                                                      <?=$search_result['profit']?><sup>%</sup>
                                                </span>
                                <span class="list-stats-tbl-title">
                                                    Недельный профит
                                                </span>
                            </li>

                            <li>
                                <a class="question-btn" data-toggle="tooltip" data-placement="top" title="Sed ut perspiciatis unde omnisiste natus error sit">
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
                                                <span class="list-stats-tbl-val down-val">
                                                    <?=$search_result['roi']?>  <sup>%</sup>
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
                                        <button class="val-drop-btn">Плейлисты</button>
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



