<?php
use yii\helpers\Html;


?>

<div class="row table-row">
    <div class="column-12">
        <div class="table-wrapper stats-table tbl-width-pl">
            <div class="table-inner">
                <div class="table-head head-with-tabs head-w_playlist">
                    <div class="tbl-icon">
                        <img src="images/stats.svg" alt="">
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
                                <li>
                                    <a href="#">Неделя</a>
                                </li>
                                <li class="active">
                                    <a href="#">За месяц</a>
                                </li>
                                <li>
                                    <a href="#">3 месяца</a>
                                </li>
                                <li>
                                    <a href="#">Год</a>
                                </li>
                                <li>
                                    <a href="#">За все время</a>
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
                                                    <?=$search_result['profit']?> <sup>%</sup>
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


