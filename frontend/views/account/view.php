<?php

use app\copmonents\widgets\addbet\AddbetWidget;
use app\copmonents\widgets\showuser\ShowuserWidget;
use dektrium\user\widgets\Connect;
use frontend\assets\AccountAsset;
use frontend\assets\MainAsset;
use yii\helpers\Url;

$this->title='LOOK MY BET';

AccountAsset::register($this);
?>

<body class="footer-login-page front-page">
<header class="header-main front-header static-header">
    <div class="header-inner">
        <div class="logo-block">
            <a href="/">
                <img src="images/logo.svg" alt="Look My bet">
            </a>
        </div>
        <div class="search-block">
            <a href="#" class="close-search">
                <span class="icon-close2"></span>
            </a>
            <div class="search-inner">
                <form action="#">
                    <button type="submit"><span class="icon-search"></span></button>
                    <input type="text" placeholder="ПОИСК">
                </form>
            </div>
        </div>
        <div class="user-block">
            <div class="user-inner">
                <div class="hide-btn-search-block">
                    <a href="#" class="search-trigger">
                        <span class="icon-search"></span>
                    </a>
                </div>
                <div class="add-block">
                    <a href="#" class="btn btn-primary btn-hover" data-toggle="modal" data-target="#modal-add-prognoz">
                        +  <i>Дать Прогноз</i>
                        <span></span>
                    </a>
                </div>
                <div class="faq-block">
                    <a href="#" data-toggle="modal" data-target="#modal-faq"><i class="faq-icon"></i><span>FAQ</span></a>
                </div>
                <div class="notif-block drop-menu">
                    <a href="#" class="notification has-notification drop-menu-trigger">
                        <span class="icon-notification"></span>
                    </a>
                    <div class="drop-wrapper drop-wrapper-medium">
                        <div class="drop-inner">
                            <div class="drop-header">
                                <div class="left-head-drop">
                                    <div class="drop-title">Уведомления</div>
                                </div>
                            </div>
                            <div class="drop-body">
                                <div class="drop-row drop-message-row">
                                    <a href="#" class="drop-link">
                                        <div class="drop-avatar">
                                            <div class="drop-avatar-inner">
                                                <img src="images/avatar-placeholder.svg" alt="">
                                            </div>
                                        </div>
                                        <div class="drop-item-info">
                                            <div class="title-block">
                                                <div class="title-text">Alexandr</div>
                                                <div class="title-date">5 минут назад</div>
                                            </div>
                                            <div class="text-block">
                                                <p class="muted-text">Сделал новый прогноз</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="drop-row drop-message-row">
                                    <a href="#" class="drop-link">
                                        <div class="drop-avatar">
                                            <div class="drop-avatar-inner">
                                                <img src="images/avatar-placeholder.svg" alt="">
                                            </div>
                                        </div>
                                        <div class="drop-item-info">
                                            <div class="title-block">
                                                <div class="title-text">Valentin</div>
                                                <div class="title-date">2 часа назад</div>
                                            </div>
                                            <div class="text-block">
                                                <p class="muted-text">Поделился вашим прогнозом</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="message-block drop-menu">
                    <a href="#" class="message has-message drop-menu-trigger">
                        <span class="icon-message"></span>
                        <i class="count-message">8</i>
                    </a>
                    <div class="drop-wrapper drop-wrapper-large">
                        <div class="drop-inner">
                            <div class="drop-header">
                                <div class="left-head-drop">
                                    <div class="drop-title">СООБЩЕНИЯ</div>
                                </div>
                                <div class="right-head-drop">
                                    <div class="drop-rirle-link">
                                        <a href="#" data-toggle="modal" data-target="#modal-chat">Все Сообщения</a>
                                    </div>
                                </div>
                            </div>
                            <div class="drop-body">
                                <div class="drop-row drop-message-row">
                                    <a href="#" class="drop-link">
                                        <div class="drop-avatar">
                                            <span class="count-massage">5</span>
                                            <div class="drop-avatar-inner">
                                                <img src="images/avatar-placeholder.svg" alt="">
                                            </div>
                                        </div>
                                        <div class="drop-item-info">
                                            <div class="title-block">
                                                <div class="title-text">Alexandr</div>
                                                <div class="title-date">26 мар. 2018 г.</div>
                                            </div>
                                            <div class="text-block">
                                                <span class="icon-in_m"></span>
                                                <p>The complexity of mining crypto currency is growing rapidly The complexity of mining crypto currency is growing rapidly</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="drop-row drop-message-row">
                                    <a href="#" class="drop-link">
                                        <div class="drop-avatar">
                                            <span class="count-massage">3</span>
                                            <div class="drop-avatar-inner">
                                                <img src="images/avatar-placeholder.svg" alt="">
                                            </div>
                                        </div>
                                        <div class="drop-item-info">
                                            <div class="title-block">
                                                <div class="title-text">Valentin</div>
                                                <div class="title-date">26 мар. 2018 г.</div>
                                            </div>
                                            <div class="text-block">
                                                <span class="icon-in_m"></span>
                                                <p>The complexity of mining crypto currency is growing rapidly The complexity of mining crypto currency is growing rapidly</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="avatar__user-block drop-menu">
                    <a href="#" class="avatar__user drop-menu-trigger">
                            <span class="avatar__user-inner">
                                <img src="images/ava_top@2x.png" alt="">
                            </span>
                    </a>
                    <div class="drop-wrapper drop-wrapper-small">
                        <div class="drop-inner">
                            <div class="drop-body">
                                <div class="drop-row drop-message-row user-row">
                                    <div class="drop-link">
                                        <div class="drop-avatar">
                                            <div class="drop-avatar-inner">
                                                <img src="images/avatar-placeholder.svg" alt="">
                                            </div>
                                        </div>
                                        <div class="drop-item-info">
                                            <div class="title-block">
                                                <div class="title-text">Alexandr</div>
                                            </div>
                                            <div class="text-block">
                                                <p class="muted-text">fj2667187@gmail.com</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="link-drop-list">
                                    <ul class="drop-list">
                                        <li><a href="account.html">перейти в кабинет</a></li>
                                        <li><a href="#" data-toggle="modal" data-target="#modal-chat">сообщения</a></li>
                                        <li><a href="#" data-toggle="modal" data-target="#modal-faq">FAQ</a></li>
                                        <li><a href="settings.html" target="_blank">Настройки</a></li>
                                        <li><a href="#">выйти</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="account-statistic">
    <div class="content-container">
        <ul class="list-static">
            <li><a href="#" class=""><span class="stat-title">Подписчики</span> <span class="stat-val">2,389</span></a></li>
            <li><a href="#my-bet" class="ancor"><span class="stat-title">Прогнозы</span> <span class="stat-val">357</span></a></li>
            <li><a href="#" class=""><span class="stat-title">week 1</span> <span class="stat-val">#4</span></a></li>
            <li><a href="#stat-block" class="ancor"><span class="stat-title">TOP - 100</span> <span class="stat-val">#13</span></a></li>
        </ul>
    </div>
</div>
<div class="main-background">
    <div id="scene">
        <div data-depth="0.2" class="background-image" style="background-image: url(images/back-body.jpg)"></div>
    </div>
</div>


<div class="front-page-wrapper account-wrapper">
    <div class="front-page-inner">
        <div class="content-container">
            <div class="row table-row">
                <div class="column-4">
                    <div class="table-wrapper transparent-bg">
                        <div class="table-inner">
                            <div class="table-body">
                                <div class="user-block-acc">
                                    <div class="level-row">
                                        <!--
                                             green label ->  class="level-info"
                                             yellow label -> class="level-info medium-level"
                                             pink label -> class="level-info low-level"
                                               -->
                                        <div class="level-info level16">
                                            <div class="label-level">16</div>
                                            <span>уровень</span>
                                        </div>
                                        <div class="user-money">
                                    <p  class="user-money numberOnly">
                                        <?=$balance?>
                                    </p>
                                            <span class="currency">betcoins</span>
                                        </div>
                                    </div>
                                    <div class="big-user-avatar">
                                        <div class="big-rate-avatar">
                                            <!--
                                                data-ptc - percentage of occupancy
                                                -->
                                            <div class="big-circle-wrapper" data-ptc="16">
                                                <div class="big-circle"><canvas width="160" height="160"></canvas></div>
                                            </div>
                                            <div class="big-avatar-user">
                                                <img src="images/avatar-placeholder.svg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="user-acc-name">
                                        <h3><span>Konstantin</span> <span class="label-user-pro">pro</span></h3>
                                        <div class="user-nik-name">john.baklan</div>
                                    </div>
                                    <div class="user-acc-text">
                                        <p>The complexity of mining crypto currency is growing
                                            rapidly, and many crypto-currencies initially use POS
                                            or plan to switch to POW instead.</p>
                                    </div>
                                    <div class="book-user">
                                        <img src="/images/1b.png" alt="">
                                        <img src="/images/2b.png" alt="">
                                        <img src="/images/3b.png" alt="">
                                        <a href="#" class="select-btn-plus" data-toggle="modal" data-target="#modal-choose-bet">
                                            <span class="icon-add-plus"></span>
                                        </a>
                                    </div>
                                    <div class="user-acc-btn mt-0">
                                        <a href="settings.html" class="btn btn-hover btn-default settings-btn">
                                            <i class="icon-setting"></i> НАСТРОЙКИ
                                            <span></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column-8">
                    <div class="table-wrapper stats-table" id="stat-block">
                        <div class="table-inner">
                            <div class="table-head head-with-tabs">
                                <div class="tbl-icon">
                                    <img src="images/stats.svg" alt="">
                                </div>
                                <div class="left-head-text">
                                    <span class="text-head">Доходность</span>
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
                                <div class="chart-wrapper">
                                    <img src="images/charts.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row table-row">
                <div class="column-4 fav-column">
                    <div class="table-wrapper">
                        <div class="table-inner">
                            <div class="table-body">
                                <div class="favorite-tbl">
                                    <div class="head-block-add">
                                        <h2 class="title-fav">любимые виды спорта</h2>
                                        <div class="block-btn-add">
                                            <a class="question-btn" data-toggle="tooltip" data-placement="bottom" title="Sed ut perspiciatis unde omnisiste natus error sit">
                                                <span>?</span>
                                            </a>
                                            <a href="#" class="add-event-btn" data-toggle="modal" data-target="#modal-choose-sport">
                                                <span class="icon-add-plus"></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="fav-wrapper">
                                        <div class="fav-inner">
                                            <div class="favorite-item has-value">
                                                <div class="favorite-item-inner" data-toggle="tooltip" data-placement="top" title="Баскетбол">
                                                    <div class="fav-con">
                                                        <img src="images/basket.svg" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="favorite-item has-value">
                                                <div class="favorite-item-inner" data-toggle="tooltip" data-placement="top" title="Футбол">
                                                    <div class="fav-con">
                                                        <img src="images/footbol.svg" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="favorite-item has-value">
                                                <div class="favorite-item-inner" data-toggle="tooltip" data-placement="top" title="Большой Тенис">
                                                    <div class="fav-con">
                                                        <img src="images/tenis.svg" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="favorite-item">
                                                <a href="#" class="favorite-item-inner" data-toggle="modal" data-target="#modal-choose-sport"></a>
                                            </div>
                                            <div class="favorite-item">
                                                <a href="#" class="favorite-item-inner" data-toggle="modal" data-target="#modal-choose-sport"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column-4 fav-column">
                    <div class="table-wrapper">
                        <div class="table-inner">
                            <div class="table-body">
                                <div class="favorite-tbl">
                                    <div class="head-block-add">
                                        <h2 class="title-fav">любимые турниры</h2>
                                        <div class="block-btn-add">
                                            <a class="question-btn" data-toggle="tooltip" data-placement="bottom" title="Sed ut perspiciatis unde omnisiste natus error sit">
                                                <span>?</span>
                                            </a>
                                            <a href="#" class="add-event-btn" data-toggle="modal" data-target="#modal-choose-tourni">
                                                <span class="icon-add-plus"></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="fav-wrapper">
                                        <div class="fav-inner">
                                            <div class="favorite-item has-value">
                                                <div class="favorite-item-inner" data-toggle="tooltip" data-placement="top" title="Серия А">
                                                    <div class="fav-con">
                                                        <span>SeR A</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="favorite-item has-value">
                                                <div class="favorite-item-inner" data-toggle="tooltip" data-placement="top" title="Ла Лига">
                                                    <div class="fav-con">
                                                        <span>BBVA</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="favorite-item has-value">
                                                <div class="favorite-item-inner" data-toggle="tooltip" data-placement="top" title="НБА">
                                                    <div class="fav-con">
                                                        <span>NBA</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="favorite-item">
                                                <a href="#" class="favorite-item-inner" data-toggle="modal" data-target="#modal-choose-tourni"></a>
                                            </div>
                                            <div class="favorite-item">
                                                <a href="#" class="favorite-item-inner" data-toggle="modal" data-target="#modal-choose-tourni"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column-4 fav-column">
                    <div class="table-wrapper">
                        <div class="table-inner">
                            <div class="table-body">
                                <div class="favorite-tbl">
                                    <div class="head-block-add">
                                        <h2 class="title-fav">любимые команды</h2>
                                        <div class="block-btn-add">
                                            <a class="question-btn" data-toggle="tooltip" data-placement="bottom" title="Sed ut perspiciatis unde omnisiste natus error sit">
                                                <span>?</span>
                                            </a>
                                            <a href="#" class="add-event-btn" data-toggle="modal" data-target="#modal-choose-team">
                                                <span class="icon-add-plus"></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="fav-wrapper">
                                        <div class="fav-inner">
                                            <div class="favorite-item has-value">
                                                <div class="favorite-item-inner" data-toggle="tooltip" data-placement="top" title="Реал Мадрид">
                                                    <div class="fav-con">
                                                        <span>RM</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="favorite-item has-value">
                                                <div class="favorite-item-inner" data-toggle="tooltip" data-placement="top" title="Манчестер Юнайтед">
                                                    <div class="fav-con">
                                                        <span>MU</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="favorite-item">
                                                <a href="#" class="favorite-item-inner" data-toggle="modal" data-target="#modal-choose-team"></a>
                                            </div>
                                            <div class="favorite-item">
                                                <a href="#" class="favorite-item-inner" data-toggle="modal" data-target="#modal-choose-team"></a>
                                            </div>
                                            <div class="favorite-item">
                                                <a href="#" class="favorite-item-inner" data-toggle="modal" data-target="#modal-choose-team"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                <div class="play-list-drop">
                                    <div class="custom-dropdown">
                                        <div class="custom-dropdown-inner">
                                            <div class="val-drop">
                                                <button class="val-drop-btn">Плейлист #A</button>
                                            </div>
                                            <div class="dropdown-list">
                                                <div class="play-list">
                                                    <div class="drop-item">
                                                        <div class="check-drop">
                                                            <input name="playlist" type="radio" id="playlist145" checked="checked" value="Плейлист #A">
                                                            <label for="playlist145">Плейлист #A</label>
                                                        </div>
                                                    </div>
                                                    <div class="drop-item">
                                                        <div class="check-drop">
                                                            <input name="playlist" type="radio" id="playlist245" value="Лига Чемпионов">
                                                            <label for="playlist245">Лига Чемпионов</label>
                                                        </div>
                                                    </div>
                                                    <div class="drop-item">
                                                        <div class="check-drop">
                                                            <input name="playlist" type="radio" id="playlist345" value="НБА">
                                                            <label for="playlist345">НБА</label>
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
                                                    37 <sup>%</sup>
                                                </span>
                                            <span class="list-stats-tbl-title">
                                                    Прибыль
                                                </span>
                                        </li>
                                        <li>
                                                <span class="list-stats-tbl-val up-val">
                                                    75 <sup>%</sup>
                                                </span>
                                            <span class="list-stats-tbl-title">
                                                    Проходимость
                                                </span>
                                        </li>
                                        <li>
                                                <span class="list-stats-tbl-val up-val">
                                                    1.97
                                                </span>
                                            <span class="list-stats-tbl-title">
                                                    Средний Коэффициент
                                                </span>
                                        </li>
                                        <li>
                                                <span class="list-stats-tbl-val down-val">
                                                    85 <sup>%</sup>
                                                </span>
                                            <span class="list-stats-tbl-title">
                                                    ROI
                                                </span>
                                        </li>
                                        <li>
                                                <span class="list-stats-tbl-val up-val">
                                                    1,269
                                                </span>
                                            <span class="list-stats-tbl-title">
                                                    Количество Плюсов
                                                </span>
                                        </li>
                                        <li>
                                                <span class="list-stats-tbl-val up-val">
                                                    38
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
            <div class="row table-row" id="my-bet">
                <div class="column-12">
                    <div class="table-wrapper stats-table tbl-width-pl table-transparent my-bet">
                        <div class="table-inner table-transparent">
                            <div class="table-head head-with-tabs head-w_playlist">
                                <div class="tbl-icon">
                                    <img src="images/soccer-ball.svg" alt="">
                                </div>
                                <div class="left-head-text">
                                    <span class="text-head">Мои Ставки <sup>357</sup></span>
                                </div>
                                <div class="play-list-drop">
                                    <!--<button class="drop-trig-lay">Плейлист #A</button>-->
                                    <!--<div class="drop-play">-->
                                    <!--<ul class="drop-list">-->
                                    <!--<li>-->
                                    <!--<a class="pl-item" href="#">Плейлист #A</a>-->
                                    <!--<a class="pl-item" href="#">Плейлист #B</a>-->
                                    <!--<a class="pl-item" href="#">Плейлист #C</a>-->
                                    <!--</li>-->
                                    <!--</ul>-->
                                    <!--</div>-->
                                    <div class="custom-dropdown">
                                        <div class="custom-dropdown-inner">
                                            <div class="val-drop">
                                                <button class="val-drop-btn">Плейлист #A</button>
                                            </div>
                                            <div class="dropdown-list">
                                                <div class="play-list">
                                                    <div class="drop-item">
                                                        <div class="check-drop">
                                                            <input name="playlist" type="radio" id="playlist14" checked="checked" value="Плейлист #A">
                                                            <label for="playlist14">Плейлист #A</label>
                                                        </div>
                                                    </div>
                                                    <div class="drop-item">
                                                        <div class="check-drop">
                                                            <input name="playlist" type="radio" id="playlist24" value="Лига Чемпионов">
                                                            <label for="playlist24">Лига Чемпионов</label>
                                                        </div>
                                                    </div>
                                                    <div class="drop-item">
                                                        <div class="check-drop">
                                                            <input name="playlist" type="radio" id="playlist34" value="НБА">
                                                            <label for="playlist34">НБА</label>
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
                                            <li class="active">
                                                <a href="#">За месяц</a>
                                            </li>
                                            <li>
                                                <a href="#">3 месяца</a>
                                            </li>
                                            <li>
                                                <a href="#">За все время</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="table-body">
                                <div class="row">
                                    <div class="column-4 rate-column">
                                        <div class="rate-wrapper">
                                            <div class="rate-inner">
                                                <div class="user-rate">
                                                    <div class="user-rate-inner">
                                                        <div class="row-ava">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper" data-ptc="5">
                                                                    <div class="circle"><canvas width="74" height="74"></canvas></div>
                                                                </div>
                                                                <div class="avatar-status-bet avatar-status-bet-success"></div>
                                                            </div>
                                                            <div class="user-info">
                                                                <h4 class="name-r">john.baklan</h4>
                                                                <div class="level-user level-user-label">
                                                                    <div class="level-text">Уровень 5</div>
                                                                    <span class="label-user label-user-pro">pro</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="rate-content">
                                                            <div class="rate-c__item rate-c__item__two">
                                                                <div class="rate-c">
                                                                    <div class="title_rate_c">Ординар</div>
                                                                    <div class="value_rate_c">7,200 ₽ - 37%</div>
                                                                </div>
                                                                <div class="rate-c">
                                                                    <div class="title_rate_c">26.05.2018</div>
                                                                    <div class="value_rate_c">Тотал Больше 3.5 - x 1.67</div>
                                                                </div>
                                                            </div>
                                                            <div class="rate-c__item">
                                                                <div class="rate-c">
                                                                    <div class="title_rate_c">Футбол - Лига Чемпионов</div>
                                                                    <div class="value_rate_c">Реал Мадрид - Ливерпуль</div>
                                                                </div>
                                                            </div>
                                                            <div class="rate-c__footer">
                                                                <div class="btn-shared">
                                                                    <button class="like"></button>
                                                                    <div class="shared-block">
                                                                        <button class="shared">
                                                                            <span class="icon-network"></span>
                                                                        </button>
                                                                        <div class="drop-shared">
                                                                            <ul class="shared-social">
                                                                                <li>
                                                                                    <a href="https://twitter.com/home?status=http%3A//test6.tino.com.ua/account.html" target="_blank">
                                                                                        <span class="icon-tw"></span>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//test6.tino.com.ua/account.html" target="_blank">
                                                                                        <span class="icon-fb"></span>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="https://plus.google.com/share?url=https%3A//www.facebook.com/sharer/sharer.php?u=http%253A//test6.tino.com.ua/account.html" target="_blank">
                                                                                        <span class="icon-gp"></span>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="link-rate">
                                                                    <a href="#" data-toggle="modal" data-target="#bet1">+  Подробнее</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column-4 rate-column">
                                        <div class="rate-wrapper">
                                            <div class="rate-inner">
                                                <div class="user-rate">
                                                    <div class="user-rate-inner">
                                                        <div class="row-ava">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper" data-ptc="21">
                                                                    <div class="circle"><canvas width="74" height="74"></canvas></div>
                                                                </div>
                                                                <div class="avatar-status-bet avatar-status-bet-cancel"></div>
                                                            </div>
                                                            <div class="user-info">
                                                                <h4 class="name-r">rodrigo_pes</h4>
                                                                <div class="level-user level-user-label">
                                                                    <div class="level-text">Уровень 21</div>
                                                                    <span class="label-user label-user-pro">pro</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="rate-content">
                                                            <div class="rate-c__item rate-c__item__two">
                                                                <div class="rate-c">
                                                                    <div class="title_rate_c">Ординар</div>
                                                                    <div class="value_rate_c">7,200 ₽ - 9%</div>
                                                                </div>
                                                                <div class="rate-c">
                                                                    <div class="title_rate_c">26.05.2018 <span class="more__text">...+3</span></div>
                                                                    <div class="value_rate_c">Тотал Больше 3.5 - x 1.67 <span class="more__text">...+3</span></div>
                                                                </div>
                                                            </div>
                                                            <div class="rate-c__item">
                                                                <div class="rate-c">
                                                                    <div class="title_rate_c">Футбол, Хоккей, Теннис</div>
                                                                    <div class="value_rate_c">Реал Мадрид - Ливерпуль <span class="more__text">...+3</span></div>
                                                                </div>
                                                            </div>
                                                            <div class="rate-c__footer">
                                                                <div class="btn-shared">
                                                                    <button class="like"></button>
                                                                    <div class="shared-block">
                                                                        <button class="shared">
                                                                            <span class="icon-network"></span>
                                                                        </button>
                                                                        <div class="drop-shared">
                                                                            <ul class="shared-social">
                                                                                <li>
                                                                                    <a href="https://twitter.com/home?status=http%3A//test6.tino.com.ua/account.html" target="_blank">
                                                                                        <span class="icon-tw"></span>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//test6.tino.com.ua/account.html" target="_blank">
                                                                                        <span class="icon-fb"></span>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="https://plus.google.com/share?url=https%3A//www.facebook.com/sharer/sharer.php?u=http%253A//test6.tino.com.ua/account.html" target="_blank">
                                                                                        <span class="icon-gp"></span>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="link-rate">
                                                                    <a href="#" data-toggle="modal" data-target="#bet4">+  Подробнее</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column-4 rate-column">
                                        <div class="rate-wrapper">
                                            <div class="rate-inner">
                                                <div class="user-rate">
                                                    <div class="user-rate-inner">
                                                        <div class="row-ava">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper" data-ptc="3">
                                                                    <div class="circle"><canvas width="74" height="74"></canvas></div>
                                                                </div>
                                                                <div class="avatar-status-bet avatar-status-bet-success"></div>
                                                            </div>
                                                            <div class="user-info">
                                                                <h4 class="name-r">john.baklan</h4>
                                                                <div class="level-user level-user-label">
                                                                    <div class="level-text">Уровень 3</div>
                                                                    <span class="label-user label-user-pro">pro</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="rate-content">
                                                            <div class="rate-c__item rate-c__item__two">
                                                                <div class="rate-c">
                                                                    <div class="title_rate_c">Ординар</div>
                                                                    <div class="value_rate_c">7,200 ₽ - 37%</div>
                                                                </div>
                                                                <div class="rate-c">
                                                                    <div class="title_rate_c">26.05.2018</div>
                                                                    <div class="value_rate_c">Тотал Больше 3.5 - x 1.67</div>
                                                                </div>
                                                            </div>
                                                            <div class="rate-c__item">
                                                                <div class="rate-c">
                                                                    <div class="title_rate_c">Футбол - Лига Чемпионов</div>
                                                                    <div class="value_rate_c">Реал Мадрид - Ливерпуль</div>
                                                                </div>
                                                            </div>
                                                            <div class="rate-c__footer">
                                                                <div class="btn-shared">
                                                                    <button class="like"></button>
                                                                    <div class="shared-block">
                                                                        <button class="shared">
                                                                            <span class="icon-network"></span>
                                                                        </button>
                                                                        <div class="drop-shared">
                                                                            <ul class="shared-social">
                                                                                <li>
                                                                                    <a href="https://twitter.com/home?status=http%3A//test6.tino.com.ua/account.html" target="_blank">
                                                                                        <span class="icon-tw"></span>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//test6.tino.com.ua/account.html" target="_blank">
                                                                                        <span class="icon-fb"></span>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="https://plus.google.com/share?url=https%3A//www.facebook.com/sharer/sharer.php?u=http%253A//test6.tino.com.ua/account.html" target="_blank">
                                                                                        <span class="icon-gp"></span>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="link-rate">
                                                                    <a href="#" data-toggle="modal" data-target="#bet4">+  Подробнее</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column-4 rate-column">
                                        <div class="rate-wrapper">
                                            <div class="rate-inner">
                                                <div class="user-rate">
                                                    <div class="user-rate-inner">
                                                        <div class="row-ava">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper" data-ptc="10">
                                                                    <div class="circle"><canvas width="74" height="74"></canvas></div>
                                                                </div>
                                                                <div class="avatar-status-bet avatar-status-bet-cancel"></div>
                                                            </div>
                                                            <div class="user-info">
                                                                <h4 class="name-r">john.baklan</h4>
                                                                <div class="level-user level-user-label">
                                                                    <div class="level-text">Уровень 10</div>
                                                                    <span class="label-user label-user-pro">pro</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="rate-content">
                                                            <div class="rate-c__item rate-c__item__two">
                                                                <div class="rate-c">
                                                                    <div class="title_rate_c">Ординар</div>
                                                                    <div class="value_rate_c">7,200 ₽ - 37%</div>
                                                                </div>
                                                                <div class="rate-c">
                                                                    <div class="title_rate_c">26.05.2018</div>
                                                                    <div class="value_rate_c">Тотал Больше 3.5 - x 1.67</div>
                                                                </div>
                                                            </div>
                                                            <div class="rate-c__item">
                                                                <div class="rate-c">
                                                                    <div class="title_rate_c">Футбол - Лига Чемпионов</div>
                                                                    <div class="value_rate_c">Реал Мадрид - Ливерпуль</div>
                                                                </div>
                                                            </div>
                                                            <div class="rate-c__footer">
                                                                <div class="btn-shared">
                                                                    <button class="like"></button>
                                                                    <div class="shared-block">
                                                                        <button class="shared">
                                                                            <span class="icon-network"></span>
                                                                        </button>
                                                                        <div class="drop-shared">
                                                                            <ul class="shared-social">
                                                                                <li>
                                                                                    <a href="https://twitter.com/home?status=http%3A//test6.tino.com.ua/account.html" target="_blank">
                                                                                        <span class="icon-tw"></span>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//test6.tino.com.ua/account.html" target="_blank">
                                                                                        <span class="icon-fb"></span>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="https://plus.google.com/share?url=https%3A//www.facebook.com/sharer/sharer.php?u=http%253A//test6.tino.com.ua/account.html" target="_blank">
                                                                                        <span class="icon-gp"></span>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="link-rate">
                                                                    <a href="#" data-toggle="modal" data-target="#bet3">+  Подробнее</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="user-rate-info">
                                                    <div class="user-rate-info-inner">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column-4 rate-column">
                                        <div class="rate-wrapper">
                                            <div class="rate-inner">
                                                <div class="user-rate">
                                                    <div class="user-rate-inner">
                                                        <div class="row-ava">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper" data-ptc="18">
                                                                    <div class="circle"><canvas width="74" height="100"></canvas></div>
                                                                </div>
                                                                <div class="avatar-status-bet avatar-status-bet-success"></div>
                                                            </div>
                                                            <div class="user-info">
                                                                <h4 class="name-r">john.baklan</h4>
                                                                <div class="level-user level-user-label">
                                                                    <div class="level-text">Уровень 18</div>
                                                                    <span class="label-user label-user-pro">pro</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="rate-content">
                                                            <div class="rate-c__item rate-c__item__two">
                                                                <div class="rate-c">
                                                                    <div class="title_rate_c">Ординар</div>
                                                                    <div class="value_rate_c">7,200 ₽ - 37%</div>
                                                                </div>
                                                                <div class="rate-c">
                                                                    <div class="title_rate_c">26.05.2018</div>
                                                                    <div class="value_rate_c">Тотал Больше 3.5 - x 1.67</div>
                                                                </div>
                                                            </div>
                                                            <div class="rate-c__item">
                                                                <div class="rate-c">
                                                                    <div class="title_rate_c">Футбол - Лига Чемпионов</div>
                                                                    <div class="value_rate_c">Реал Мадрид - Ливерпуль</div>
                                                                </div>
                                                            </div>
                                                            <div class="rate-c__footer">
                                                                <div class="btn-shared">
                                                                    <button class="like"></button>
                                                                    <div class="shared-block">
                                                                        <button class="shared">
                                                                            <span class="icon-network"></span>
                                                                        </button>
                                                                        <div class="drop-shared">
                                                                            <ul class="shared-social">
                                                                                <li>
                                                                                    <a href="https://twitter.com/home?status=http%3A//test6.tino.com.ua/account.html" target="_blank">
                                                                                        <span class="icon-tw"></span>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//test6.tino.com.ua/account.html" target="_blank">
                                                                                        <span class="icon-fb"></span>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="https://plus.google.com/share?url=https%3A//www.facebook.com/sharer/sharer.php?u=http%253A//test6.tino.com.ua/account.html" target="_blank">
                                                                                        <span class="icon-gp"></span>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="link-rate">
                                                                    <a href="#" data-toggle="modal" data-target="#bet2">+  Подробнее</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="user-rate-info">
                                                    <div class="user-rate-info-inner">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column-4 rate-column">
                                        <div class="rate-wrapper">
                                            <div class="rate-inner">
                                                <div class="user-rate">
                                                    <div class="user-rate-inner">
                                                        <div class="row-ava">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper" data-ptc="19">
                                                                    <div class="circle"><canvas width="74" height="74"></canvas></div>
                                                                </div>
                                                                <div class="avatar-status-bet avatar-status-bet-success"></div>
                                                            </div>
                                                            <div class="user-info">
                                                                <h4 class="name-r">john.baklan</h4>
                                                                <div class="level-user level-user-label">
                                                                    <div class="level-text">Уровень 19</div>
                                                                    <span class="label-user label-user-pro">pro</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="rate-content">
                                                            <div class="rate-c__item rate-c__item__two">
                                                                <div class="rate-c">
                                                                    <div class="title_rate_c">Ординар</div>
                                                                    <div class="value_rate_c">7,200 ₽ - 37%</div>
                                                                </div>
                                                                <div class="rate-c">
                                                                    <div class="title_rate_c">26.05.2018</div>
                                                                    <div class="value_rate_c">Тотал Больше 3.5 - x 1.67</div>
                                                                </div>
                                                            </div>
                                                            <div class="rate-c__item">
                                                                <div class="rate-c">
                                                                    <div class="title_rate_c">Футбол - Лига Чемпионов</div>
                                                                    <div class="value_rate_c">Реал Мадрид - Ливерпуль</div>
                                                                </div>
                                                            </div>
                                                            <div class="rate-c__footer">
                                                                <div class="btn-shared">
                                                                    <button class="like"></button>
                                                                    <div class="shared-block">
                                                                        <button class="shared">
                                                                            <span class="icon-network"></span>
                                                                        </button>
                                                                        <div class="drop-shared">
                                                                            <ul class="shared-social">
                                                                                <li>
                                                                                    <a href="https://twitter.com/home?status=http%3A//test6.tino.com.ua/account.html" target="_blank">
                                                                                        <span class="icon-tw"></span>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//test6.tino.com.ua/account.html" target="_blank">
                                                                                        <span class="icon-fb"></span>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="https://plus.google.com/share?url=https%3A//www.facebook.com/sharer/sharer.php?u=http%253A//test6.tino.com.ua/account.html" target="_blank">
                                                                                        <span class="icon-gp"></span>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="link-rate">
                                                                    <a href="#" data-toggle="modal" data-target="#bet1">+  Подробнее</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="user-rate-info">
                                                    <div class="user-rate-info-inner">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-footer">
                                <div class="pagination">
                                    <ul class="pagination-list">
                                        <li class="first-pag">
                                            <a href="#"><span class="icon-arrow_left-small"></span></a>
                                        </li>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#" class="no-num-pag">...</a></li>
                                        <li><a href="#">10</a></li>
                                        <li class="last-pag">
                                            <a href="#"><span class="icon-arrow_right-small"></span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<footer class="main-footer front-footer">
    <div class="main-footer-inner">
        <div class="logo-footer">
            <a href="/">
                <img src="images/logo.svg" alt="Look My Bet">
            </a>
        </div>
        <div class="menu-footer">
            <ul class="bottom-menu">
                <li><a href="conf.html">политика конфиденциальности</a></li>
                <li><a href="term.html">Условия использования сайта</a></li>
                <li><a href="help.html">Помощь</a></li>
                <li><a href="contact.html">Контакты</a></li>
            </ul>
        </div>
        <div class="btn-footer">
            <div class="btn-shared">
                <div class="shared-block">
                    <button class="shared">
                        <span class="icon-network"></span>
                    </button>
                    <div class="drop-shared">
                        <ul class="shared-social">
                            <li>
                                <a href="https://twitter.com/home?status=http%3A//test6.tino.com.ua/account.html" target="_blank">
                                    <span class="icon-tw"></span>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//test6.tino.com.ua/account.html" target="_blank">
                                    <span class="icon-fb"></span>
                                </a>
                            </li>
                            <li>
                                <a href="https://plus.google.com/share?url=https%3A//www.facebook.com/sharer/sharer.php?u=http%253A//test6.tino.com.ua/account.html" target="_blank">
                                    <span class="icon-gp"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="fixed-footer-inner">
            <div class="social-block">
                <ul class="social-list">
                    <li>
                        <a href="#" target="_blank">
                            <span class="icon-youtube"></span>
                        </a>
                    </li>
                    <li>
                        <a href="#" target="_blank">
                            <span class="icon-telegram"></span>
                        </a>
                    </li>
                    <li>
                        <a href="#" target="_blank">
                            <span class="icon-mail"></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="copy-footer">
                <p>&copy; 2018 Look My Bet</p>
            </div>
            <div class="media-block">
                <a href="#" class="btn btn-default btn-hover" data-toggle="modal" data-target="#modal-feedback">оставить отзыв <span></span></a>
                <a href="#" class="btn btn-default hover-btn btn-hover">реклама <span></span></a>
            </div>
            <div class="arrow-top">
                <a href="#" id="top-btn"><span class="icon-arrow_up"></span></a>
            </div>
        </div>
    </div>
</footer>
<div class="modal-wrapper user-modal" id="modal-auth">
    <div class="modal-inner">
        <div class="modal-content">
            <div class="modal-content-inner">
                <div class="header-modal">
                    <button class="close" data-toggle="modal-dismiss"><span class="icon-close2"></span></button>
                </div>
                <div class="body-modal">
                    <div class="body-modal-inner">
                        <div class="left-side-login big-side-login">
                            <div class="left-side-inner register-inner">
                                <h2>Стань частью Look My Bet</h2>
                                <div class="social-login">
                                    <ul class="soc-login">
                                        <li><a href="#" class="soc-tw"><span class="icon-tw"></span></a></li>
                                        <li><a href="#" class="soc-fb"><span class="icon-fb"></span></a></li>
                                        <li><a href="#" class="soc-gp"><span class="icon-G"></span></a></li>
                                    </ul>
                                </div>
                                <div class="line-text">
                                    <span>или создайте аккаунт с помощью e-mail</span>
                                </div>
                                <div class="form-wrapper">
                                    <div class="form-inner">
                                        <form action="#">
                                            <div class="input-row">
                                                <input type="text">
                                                <label class="placeholder">Ваше Имя</label>
                                            </div>
                                            <div class="input-row">
                                                <input type="text">
                                                <label class="placeholder">Никнейм</label>
                                            </div>
                                            <div class="input-row">
                                                <input type="email">
                                                <label class="placeholder">Email</label>
                                            </div>
                                            <div class="input-row">
                                                <input type="text">
                                                <label class="placeholder">Пароль - <span>минимум 6 символов</span></label>
                                            </div>
                                            <div class="checkbox-row">
                                                <input type="checkbox" id="konf">
                                                <label for="konf" class="check-text">
                                                    Я прочитал <a href="#">Политику Конфиденциальности</a> сервиса Look My Bet
                                                </label>
                                            </div>
                                            <div class="input-row btn-row">
                                                <button type="submit" class="btn big-btn btn-primary btn-hover">
                                                    СОЗДАТЬ АККАУНТ
                                                    <span></span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="left-side-inner login-inner">
                                <h2>Авторизируйтесь</h2>
                                <div class="social-login">
                                    <ul class="soc-login">
                                        <li><a href="#" class="soc-tw"><span class="icon-tw"></span></a></li>
                                        <li><a href="#" class="soc-fb"><span class="icon-fb"></span></a></li>
                                        <li><a href="#" class="soc-gp"><span class="icon-G"></span></a></li>
                                    </ul>
                                </div>
                                <div class="line-text">
                                    <span>или войдите с помощью e-mail</span>
                                </div>
                                <div class="form-wrapper">
                                    <div class="form-inner">
                                        <form action="#">
                                            <div class="input-row">
                                                <input type="email">
                                                <label class="placeholder">Email</label>
                                            </div>
                                            <div class="input-row">
                                                <input type="text">
                                                <label class="placeholder">Пароль</label>
                                            </div>
                                            <div class="input-row btn-row">
                                                <button type="submit" class="btn big-btn btn-primary btn-hover">
                                                    ВОЙТИ
                                                    <span></span>
                                                </button>
                                            </div>
                                            <div class="input-row text-center text-row">
                                                <a href="#" class="forgot-btn">Забыли пароль?</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="left-side-inner forgot-inner">
                                <h2>Забыли Пароль?</h2>
                                <div class="line-text">
                                    <p>Введите почту, на которую зарегистрирован ваш аккаунт,
                                        и получите дальнейшие инструкци.</p>
                                </div>
                                <div class="form-wrapper">
                                    <div class="form-inner">
                                        <form action="#">
                                            <div class="input-row">
                                                <input type="email">
                                                <label class="placeholder">Email</label>
                                            </div>
                                            <div class="input-row btn-row">
                                                <button type="submit" class="btn big-btn btn-primary btn-hover">
                                                    Восстановить
                                                    <span></span>
                                                </button>
                                            </div>
                                            <div class="input-row text-center text-row">
                                                <a href="#" class="auth-btn">Вернуться к авторизации</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="right-side-login small-side-login">
                            <div class="right-side-inner">
                                <div class="logo-popup">
                                    <img src="images/logo_red.svg" alt="">
                                </div>
                                <div class="text-left">
                                    <p>Look My Bet - Первая социальная сеть в СНГ для
                                        любителей ставок на спорт</p>
                                </div>
                                <div class="from-block">
                                    <h3>Для чего нужна авторизация?</h3>
                                    <ul class="list-answer">
                                        <li>Lorem ipsum dolor sit amet, consectetur</li>
                                        <li>Sed do eiusmod tempor incididunt ut labore</li>
                                        <li>Duis aute irure dolor in reprehenderit in</li>
                                    </ul>
                                </div>
                                <div class="toggle-type-block">
                                    <div class="login-block active">
                                        <h2>Есть Аккаунт?</h2>
                                        <a href="#" class="btn btn-default btn-hover" id="show-login">
                                            <b>Войти</b>
                                            <span></span>
                                        </a>
                                    </div>
                                    <div class="register-block">
                                        <h2>Нет Аккаунта?</h2>
                                        <a href="#" class="btn btn-default btn-hover" id="show-register">
                                            <b>РЕГИСТРАЦИЯ</b>
                                            <span></span>
                                        </a>
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






<!-- modad add bet -->
<?= AddbetWidget ::widget([]); ?>

<div class="modal-wrapper bet-modal modal-640" id="modal-complaint">
    <div class="modal-inner">
        <div class="modal-content">
            <div class="modal-content-inner">
                <div class="header-modal">
                    <button class="close" data-toggle="modal-dismiss"><span class="icon-close2"></span></button>
                </div>
                <div class="body-modal">
                    <div class="choose-bet-wrapper">
                        <div class="choose-bet-inner">
                            <div class="head-choose">
                                <h2>Букмекерские конторы</h2>
                                <p>Выбери до 3х букмекерских контор, в которых играешь</p>
                            </div>
                            <div class="complain-form">
                                <form action="#">
                                    <div class="complain-form-inner">
                                        <div class="radio-row">
                                            <input type="radio" name="comp-n" id="ca1">
                                            <label for="ca1">Нецензурная лексика</label>
                                        </div>
                                        <div class="radio-row">
                                            <input type="radio" name="comp-n" id="ca2">
                                            <label for="ca2">Копирование прогнозов</label>
                                        </div>
                                        <div class="radio-row">2131
                                            <input type="radio" name="comp-n" id="ca3">
                                            <label for="ca3">Спам или введение в заблуждение</label>
                                        </div>
                                        <div class="radio-row">
                                            <input type="radio" name="comp-n" id="ca4">
                                            <label for="ca4">Оскорбления или проявления нетерпимости</label>
                                        </div>
                                        <div class="radio-row">
                                            <input type="radio" name="comp-n" id="ca5">
                                            <label for="ca5">Другая причина</label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="btn-block-choose">
                                <span>Можно выбрать не более 3х контор!</span>
                                <a href="#" class="btn btn-hover btn-primary" data-toggle="modal-dismiss">Готово</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-wrapper bet-modal modal-945" id="modal-choose-sport">
    <div class="modal-inner">
        <div class="modal-content">
            <div class="modal-content-inner">
                <div class="header-modal">
                    <button class="close" data-toggle="modal-dismiss"><span class="icon-close2"></span></button>
                </div>
                <div class="body-modal">
                    <div class="choose-bet-wrapper">
                        <div class="choose-bet-inner">
                            <div class="head-choose">
                                <h2>Любимые виды спорта</h2>
                                <p>Выбери до 5ти любимых видов спорта</p>
                            </div>
                            <div class="bet-list-choose">
                                <div class="spotrt-items">
                                    <div class="spotrt-item">
                                        <div class="spotrt-item-inner">
                                            <input type="checkbox" name="sport-check" id="s1">
                                            <label for="s1">
                                                    <span class="sport-icon">
                                                        <img src="images/s1.svg" alt="">
                                                    </span>
                                                <span class="title-sport">Баскетбол</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="spotrt-item">
                                        <div class="spotrt-item-inner">
                                            <input type="checkbox" name="sport-check" id="s2">
                                            <label for="s2">
                                                    <span class="sport-icon">
                                                        <img src="images/s2.svg" alt="">
                                                    </span>
                                                <span class="title-sport">Футбол</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="spotrt-item">
                                        <div class="spotrt-item-inner">
                                            <input type="checkbox" name="sport-check" id="s3">
                                            <label for="s3">
                                                    <span class="sport-icon">
                                                        <img src="images/s3.svg" alt="">
                                                    </span>
                                                <span class="title-sport">Большой теннис</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="spotrt-item">
                                        <div class="spotrt-item-inner">
                                            <input type="checkbox" name="sport-check" id="s4">
                                            <label for="s4">
                                                    <span class="sport-icon">
                                                        <img src="images/s3.svg" alt="">
                                                    </span>
                                                <span class="title-sport">Баскетбол</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="spotrt-item">
                                        <div class="spotrt-item-inner">
                                            <input type="checkbox" name="sport-check" id="s5">
                                            <label for="s5">
                                                    <span class="sport-icon">
                                                        <img src="images/s3.svg" alt="">
                                                    </span>
                                                <span class="title-sport">Большой теннис</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="spotrt-item">
                                        <div class="spotrt-item-inner">
                                            <input type="checkbox" name="sport-check" id="s6">
                                            <label for="s6">
                                                    <span class="sport-icon">
                                                        <img src="images/s3.svg" alt="">
                                                    </span>
                                                <span class="title-sport">Баскетбол</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="spotrt-item">
                                        <div class="spotrt-item-inner">
                                            <input type="checkbox" name="sport-check" id="s7">
                                            <label for="s7">
                                                    <span class="sport-icon">
                                                        <img src="images/s3.svg" alt="">
                                                    </span>
                                                <span class="title-sport">Футбол</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="spotrt-item">
                                        <div class="spotrt-item-inner">
                                            <input type="checkbox" name="sport-check" id="s8">
                                            <label for="s8">
                                                    <span class="sport-icon">
                                                        <img src="images/s3.svg" alt="">
                                                    </span>
                                                <span class="title-sport">Большой теннис</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="spotrt-item">
                                        <div class="spotrt-item-inner">
                                            <input type="checkbox" name="sport-check" id="s9">
                                            <label for="s9">
                                                    <span class="sport-icon">
                                                        <img src="images/s3.svg" alt="">
                                                    </span>
                                                <span class="title-sport">Баскетбол</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="spotrt-item">
                                        <div class="spotrt-item-inner">
                                            <input type="checkbox" name="sport-check" id="s10">
                                            <label for="s10">
                                                    <span class="sport-icon">
                                                        <img src="images/s3.svg" alt="">
                                                    </span>
                                                <span class="title-sport">Футбол</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="spotrt-item">
                                        <div class="spotrt-item-inner">
                                            <input type="checkbox" name="sport-check" id="s11">
                                            <label for="s11">
                                                    <span class="sport-icon">
                                                        <img src="images/s3.svg" alt="">
                                                    </span>
                                                <span class="title-sport">Большой теннис</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="spotrt-item">
                                        <div class="spotrt-item-inner">
                                            <input type="checkbox" name="sport-check" id="s12">
                                            <label for="s12">
                                                    <span class="sport-icon">
                                                        <img src="images/s3.svg" alt="">
                                                    </span>
                                                <span class="title-sport">Баскетбол</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="spotrt-item">
                                        <div class="spotrt-item-inner">
                                            <input type="checkbox" name="sport-check" id="s13">
                                            <label for="s13">
                                                    <span class="sport-icon">
                                                        <img src="images/s3.svg" alt="">
                                                    </span>
                                                <span class="title-sport">Большой теннис</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-block-choose">
                                <button class="btn btn-hover btn-primary save-btn">
                                    <i class="text-show">Готово</i>
                                    <i class="text-hide">Сохранено</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-wrapper bet-modal modal-945" id="modal-choose-bet">
    <div class="modal-inner">
        <div class="modal-content">
            <div class="modal-content-inner">
                <div class="header-modal">
                    <button class="close" data-toggle="modal-dismiss"><span class="icon-close2"></span></button>
                </div>
                <div class="body-modal">
                    <div class="choose-bet-wrapper">
                        <div class="choose-bet-inner">
                            <div class="head-choose">
                                <h2>Букмекерские конторы</h2>
                                <p>Выбери до 3х букмекерских контор, в которых играешь</p>
                            </div>
                            <div class="bet-list-choose">
                                <div class="bet-list-choose-inner">
                                    <div class="bet-list-choose-row">
                                        <div class="chose-item">
                                            <div class="chose-item-inner">
                                                <input type="checkbox" name="bookmaker" id="b1">
                                                <label for="b1">
                                                    <img src="images/b1.png" alt="">
                                                    <span>1x bet</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="chose-item">
                                            <div class="chose-item-inner">
                                                <input type="checkbox" name="bookmaker" id="b2">
                                                <label for="b2">
                                                    <img src="images/b2.png" alt="">
                                                    <span>БК Leon</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="chose-item">
                                            <div class="chose-item-inner">
                                                <input type="checkbox" name="bookmaker" id="b3">
                                                <label for="b3">
                                                    <img src="images/b3.png" alt="">
                                                    <span>Пари Матч</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="chose-item">
                                            <div class="chose-item-inner">
                                                <input type="checkbox" name="bookmaker" id="b4">
                                                <label for="b4">
                                                    <img src="images/b1.png" alt="">
                                                    <span>1x bet</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="chose-item">
                                            <div class="chose-item-inner">
                                                <input type="checkbox" name="bookmaker" id="b5">
                                                <label for="b5">
                                                    <img src="images/b2.png" alt="">
                                                    <span>БК Leon</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="chose-item">
                                            <div class="chose-item-inner">
                                                <input type="checkbox" name="bookmaker" id="b6">
                                                <label for="b6">
                                                    <img src="images/b3.png" alt="">
                                                    <span>Пари Матч</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bet-list-choose-row">
                                        <div class="chose-item">
                                            <div class="chose-item-inner">
                                                <input type="checkbox" name="bookmaker" id="b111">
                                                <label for="b111">
                                                    <img src="images/b1.png" alt="">
                                                    <span>1x bet</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="chose-item">
                                            <div class="chose-item-inner">
                                                <input type="checkbox" name="bookmaker" id="b112">
                                                <label for="b112">
                                                    <img src="images/b2.png" alt="">
                                                    <span>БК Leon</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="chose-item">
                                            <div class="chose-item-inner">
                                                <input type="checkbox" name="bookmaker" id="b113">
                                                <label for="b113">
                                                    <img src="images/b3.png" alt="">
                                                    <span>Пари Матч</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="chose-item">
                                            <div class="chose-item-inner">
                                                <input type="checkbox" name="bookmaker" id="b114">
                                                <label for="b114">
                                                    <img src="images/b1.png" alt="">
                                                    <span>1x bet</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="chose-item">
                                            <div class="chose-item-inner">
                                                <input type="checkbox" name="bookmaker" id="b115">
                                                <label for="b115">
                                                    <img src="images/b2.png" alt="">
                                                    <span>БК Leon</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="chose-item">
                                            <div class="chose-item-inner">
                                                <input type="checkbox" name="bookmaker" id="b116">
                                                <label for="b116">
                                                    <img src="images/b3.png" alt="">
                                                    <span>Пари Матч</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bet-list-choose-row">
                                        <div class="chose-item">
                                            <div class="chose-item-inner">
                                                <input type="checkbox" name="bookmaker" id="b121">
                                                <label for="b121">
                                                    <img src="images/b1.png" alt="">
                                                    <span>1x bet</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="chose-item">
                                            <div class="chose-item-inner">
                                                <input type="checkbox" name="bookmaker" id="b122">
                                                <label for="b122">
                                                    <img src="images/b2.png" alt="">
                                                    <span>БК Leon</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="chose-item">
                                            <div class="chose-item-inner">
                                                <input type="checkbox" name="bookmaker" id="b123">
                                                <label for="b123">
                                                    <img src="images/b3.png" alt="">
                                                    <span>Пари Матч</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="chose-item">
                                            <div class="chose-item-inner">
                                                <input type="checkbox" name="bookmaker" id="b124">
                                                <label for="b124">
                                                    <img src="images/b1.png" alt="">
                                                    <span>1x bet</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="chose-item"></div>
                                        <div class="chose-item"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-block-choose">
                                <span>Можно выбрать не более 3х контор!</span>
                                <button class="btn btn-hover btn-primary save-btn">
                                    <i class="text-show">Готово</i>
                                    <i class="text-hide">Сохранено</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-wrapper bet-modal modal-640" id="modal-choose-team">
    <div class="modal-inner">
        <div class="modal-content">
            <div class="modal-content-inner">
                <div class="header-modal">
                    <button class="close" data-toggle="modal-dismiss"><span class="icon-close2"></span></button>
                </div>
                <div class="body-modal">
                    <div class="choose-bet-wrapper">
                        <div class="choose-bet-inner">
                            <div class="head-choose">
                                <h2>Любимые Команды</h2>
                                <p>Выберите до 10 любимых команд</p>
                            </div>
                            <div class="search-modal-block">
                                <div class="search-inp">
                                    <input type="text" placeholder="ПОИСК" class="search-inp-modal">
                                    <button>
                                        <span class="icon-search"></span>
                                    </button>
                                </div>
                                <div class="result-search">
                                    <span>3 результата по запросу «РЕАЛ»</span>
                                    <div class="radio-row">
                                        <input type="checkbox" name="comp-n" id="ca111">
                                        <label for="ca111">Реал Бетис</label>
                                    </div>
                                    <div class="radio-row">
                                        <input type="checkbox" name="comp-n" id="ca112">
                                        <label for="ca112">Реал Мадрид</label>
                                    </div>
                                    <div class="radio-row">
                                        <input type="checkbox" name="comp-n" id="ca113">
                                        <label for="ca113">Реал Сосьедад</label>
                                    </div>
                                </div>
                            </div>
                            <div class="complain-form team-form">
                                <h3>Популярные</h3>
                                <form action="#">
                                    <div class="complain-form-inner">
                                        <div class="radio-row">
                                            <input type="checkbox" name="comp-n" id="ca11">
                                            <label for="ca11">Манчестер Юнайтед</label>
                                        </div>
                                        <div class="radio-row">
                                            <input type="checkbox" name="comp-n" id="ca12">
                                            <label for="ca12">Арсенал</label>
                                        </div>
                                        <div class="radio-row">
                                            <input type="checkbox" name="comp-n" id="ca13">
                                            <label for="ca13">Челси</label>
                                        </div>
                                        <div class="radio-row">
                                            <input type="checkbox" name="comp-n" id="ca14">
                                            <label for="ca14">Ливерпуль</label>
                                        </div>
                                        <div class="radio-row">
                                            <input type="checkbox" name="comp-n" id="ca15">
                                            <label for="ca15">Тоттенхем</label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="btn-block-choose">
                                <button class="btn btn-hover btn-primary save-btn">
                                    <i class="text-show">Готово</i>
                                    <i class="text-hide">Сохранено</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-wrapper bet-modal modal-640" id="modal-choose-tourni">
    <div class="modal-inner">
        <div class="modal-content">
            <div class="modal-content-inner">
                <div class="header-modal">
                    <button class="close" data-toggle="modal-dismiss"><span class="icon-close2"></span></button>
                </div>
                <div class="body-modal">
                    <div class="choose-bet-wrapper">
                        <div class="choose-bet-inner">
                            <div class="head-choose">
                                <h2>Любимые Турниры</h2>
                                <p>Выберите до 5 любимых турниров</p>
                            </div>
                            <div class="search-modal-block">
                                <div class="search-inp">
                                    <input type="text" placeholder="ПОИСК" class="search-inp-modal">
                                    <button>
                                        <span class="icon-search"></span>
                                    </button>
                                </div>
                                <div class="result-search">
                                    <span>2 результата по запросу «Лига»</span>
                                    <div class="radio-row">
                                        <input type="checkbox" name="comp-n" id="ca1111">
                                        <label for="ca1111">Ла Лига</label>
                                    </div>
                                    <div class="radio-row">
                                        <input type="checkbox" name="comp-n" id="ca1112">
                                        <label for="ca1112">Лига Чемпионов</label>
                                    </div>
                                </div>
                            </div>
                            <div class="complain-form team-form">
                                <h3>Популярные</h3>
                                <form action="#">
                                    <div class="complain-form-inner">
                                        <div class="radio-row">
                                            <input type="checkbox" name="comp-n" id="ca211">
                                            <label for="ca211">Ла Лига</label>
                                        </div>
                                        <div class="radio-row">
                                            <input type="checkbox" name="comp-n" id="ca212">
                                            <label for="ca212">Лига Чемпионов</label>
                                        </div>
                                        <div class="radio-row">
                                            <input type="checkbox" name="comp-n" id="ca213">
                                            <label for="ca213">Премьер Лига</label>
                                        </div>
                                        <div class="radio-row">
                                            <input type="checkbox" name="comp-n" id="ca214">
                                            <label for="ca214">Серия А</label>
                                        </div>
                                        <div class="radio-row">
                                            <input type="checkbox" name="comp-n" id="ca215">
                                            <label for="ca215">НБА</label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="btn-block-choose">
                                <button class="btn btn-hover btn-primary save-btn">
                                    <i class="text-show">Готово</i>
                                    <i class="text-hide">Сохранено</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-wrapper bet-modal modal-860" id="bet1">
    <div class="modal-inner">
        <div class="modal-content">
            <div class="modal-content-inner">
                <div class="header-modal">
                    <button class="close" data-toggle="modal-dismiss"><span class="icon-close2"></span></button>
                </div>
                <div class="body-modal">
                    <div class="bet-modal-inner">
                        <div class="head-bets">
                            <div class="row-ava">
                                <div class="rate-avatar">
                                    <div class="circle-wrapper" data-ptc="90">
                                        <div class="circle"></div>
                                    </div>
                                    <div class="avatar-user">
                                        <img src="images/ava3.png" alt="">
                                    </div>
                                </div>
                                <div class="user-info">
                                    <h4 class="name-r">john.baklan</h4>
                                    <div class="level-user level-user-label">
                                        <div class="level-text">Уровень 68</div>
                                        <span class="label-user label-user-pro">pro</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="body-bets">
                            <div class="table-bets">
                                <div class="table-bets-row">
                                    <div class="count-row__t">1</div>
                                    <div class="item-tbl-row-bts">
                                        <div class="title__t">Футбол</div>
                                        <div class="value__t">Реал Мадрид - Ливерпуль</div>
                                    </div>
                                    <div class="item-tbl-row-bts">
                                        <div class="title__t">26.05.2018</div>
                                        <div class="value__t">Тотал Больше 3.5 - x 1.67</div>
                                    </div>
                                </div>
                                <div class="table-bets-row">
                                    <div class="count-row__t">2</div>
                                    <div class="item-tbl-row-bts">
                                        <div class="title__t">Теннис</div>
                                        <div class="value__t">М. Шарапова - Р. Агнешка</div>
                                    </div>
                                    <div class="item-tbl-row-bts">
                                        <div class="title__t">26.05.2018</div>
                                        <div class="value__t">Победа 1 - x 2.85</div>
                                    </div>
                                </div>
                                <div class="table-bets-row">
                                    <div class="count-row__t">3</div>
                                    <div class="item-tbl-row-bts">
                                        <div class="title__t">Футбол</div>
                                        <div class="value__t">Реал Мадрид - Ливерпуль</div>
                                    </div>
                                    <div class="item-tbl-row-bts">
                                        <div class="title__t">26.05.2018</div>
                                        <div class="value__t">Тотал Больше 3.5 - x 1.67</div>
                                    </div>
                                </div>
                                <div class="table-bets-row">
                                    <div class="count-row__t">4</div>
                                    <div class="item-tbl-row-bts">
                                        <div class="title__t">Теннис</div>
                                        <div class="value__t">М. Шарапова - Р. Агнешка</div>
                                    </div>
                                    <div class="item-tbl-row-bts">
                                        <div class="title__t">26.05.2018</div>
                                        <div class="value__t">Победа 1 - x 2.85</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="footer-bets">
                            <div class="text-footer-bets">
                                <div class="text-bets">
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                                        totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                                        dicta sunt explicabo.</p>
                                </div>
                                <div class="static-footer-bets">
                                    <div class="static-footer-bets-title">Экспресс</div>
                                    <div class="static-footer-bets-value">7,200 р. - <span>9 %</span></div>
                                </div>
                            </div>
                            <div class="shared-block-modal">
                                <div class="btn-shared">
                                    <button class="like"></button>
                                    <div class="shared-block">
                                        <button class="shared">
                                            <span class="icon-network"></span>
                                        </button>
                                        <div class="drop-shared">
                                            <ul class="shared-social">
                                                <li>
                                                    <a href="https://twitter.com/home?status=http%3A//test6.tino.com.ua/account.html" target="_blank">
                                                        <span class="icon-tw"></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//test6.tino.com.ua/account.html" target="_blank">
                                                        <span class="icon-fb"></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://plus.google.com/share?url=https%3A//www.facebook.com/sharer/sharer.php?u=http%253A//test6.tino.com.ua/account.html" target="_blank">
                                                        <span class="icon-gp"></span>
                                                    </a>
                                                </li>
                                            </ul>
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
<div class="modal-wrapper bet-modal modal-860" id="bet2">
    <div class="modal-inner">
        <div class="modal-content">
            <div class="modal-content-inner">
                <div class="header-modal">
                    <button class="close" data-toggle="modal-dismiss"><span class="icon-close2"></span></button>
                </div>
                <div class="body-modal">
                    <div class="bet-modal-inner">
                        <div class="head-bets">
                            <div class="row-ava">
                                <div class="rate-avatar">
                                    <div class="circle-wrapper" data-ptc="45">
                                        <div class="circle"></div>
                                    </div>
                                    <div class="avatar-user">
                                        <img src="images/ava1.png" alt="">
                                    </div>
                                </div>
                                <div class="user-info">
                                    <h4 class="name-r">john.baklan</h4>
                                    <div class="level-user level-user-label">
                                        <div class="level-text">Уровень 68</div>
                                        <span class="label-user label-user-pro">pro</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="body-bets">
                            <div class="table-bets">
                                <div class="table-bets-row">
                                    <div class="count-row__t">1</div>
                                    <div class="item-tbl-row-bts">
                                        <div class="title__t">Футбол</div>
                                        <div class="value__t">Реал Мадрид - Ливерпуль</div>
                                    </div>
                                    <div class="item-tbl-row-bts">
                                        <div class="title__t">26.05.2018</div>
                                        <div class="value__t">Тотал Больше 3.5 - x 1.67</div>
                                    </div>
                                </div>
                                <div class="table-bets-row">
                                    <div class="count-row__t">2</div>
                                    <div class="item-tbl-row-bts">
                                        <div class="title__t">Теннис</div>
                                        <div class="value__t">М. Шарапова - Р. Агнешка</div>
                                    </div>
                                    <div class="item-tbl-row-bts">
                                        <div class="title__t">26.05.2018</div>
                                        <div class="value__t">Победа 1 - x 2.85</div>
                                    </div>
                                </div>
                                <div class="table-bets-row">
                                    <div class="count-row__t">3</div>
                                    <div class="item-tbl-row-bts">
                                        <div class="title__t">Футбол</div>
                                        <div class="value__t">Реал Мадрид - Ливерпуль</div>
                                    </div>
                                    <div class="item-tbl-row-bts">
                                        <div class="title__t">26.05.2018</div>
                                        <div class="value__t">Тотал Больше 3.5 - x 1.67</div>
                                    </div>
                                </div>
                                <div class="table-bets-row">
                                    <div class="count-row__t">4</div>
                                    <div class="item-tbl-row-bts">
                                        <div class="title__t">Теннис</div>
                                        <div class="value__t">М. Шарапова - Р. Агнешка</div>
                                    </div>
                                    <div class="item-tbl-row-bts">
                                        <div class="title__t">26.05.2018</div>
                                        <div class="value__t">Победа 1 - x 2.85</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="footer-bets">
                            <div class="text-footer-bets">
                                <div class="text-bets">
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                                        totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                                        dicta sunt explicabo.</p>
                                </div>
                                <div class="static-footer-bets">
                                    <div class="static-footer-bets-title">Экспресс</div>
                                    <div class="static-footer-bets-value">7,200 р. - <span>9 %</span></div>
                                </div>
                            </div>
                            <div class="shared-block-modal">
                                <div class="btn-shared">
                                    <button class="like"></button>
                                    <div class="shared-block">
                                        <button class="shared">
                                            <span class="icon-network"></span>
                                        </button>
                                        <div class="drop-shared">
                                            <ul class="shared-social">
                                                <li>
                                                    <a href="https://twitter.com/home?status=http%3A//test6.tino.com.ua/account.html" target="_blank">
                                                        <span class="icon-tw"></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//test6.tino.com.ua/account.html" target="_blank">
                                                        <span class="icon-fb"></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://plus.google.com/share?url=https%3A//www.facebook.com/sharer/sharer.php?u=http%253A//test6.tino.com.ua/account.html" target="_blank">
                                                        <span class="icon-gp"></span>
                                                    </a>
                                                </li>
                                            </ul>
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
<div class="modal-wrapper bet-modal modal-860" id="bet3">
    <div class="modal-inner">
        <div class="modal-content">
            <div class="modal-content-inner">
                <div class="header-modal">
                    <button class="close" data-toggle="modal-dismiss"><span class="icon-close2"></span></button>
                </div>
                <div class="body-modal">
                    <div class="bet-modal-inner">
                        <div class="head-bets">
                            <div class="row-ava">
                                <div class="rate-avatar">
                                    <div class="circle-wrapper" data-ptc="68">
                                        <div class="circle"></div>
                                    </div>
                                    <div class="avatar-user">
                                        <img src="images/ava5.png" alt="">
                                    </div>
                                </div>
                                <div class="user-info">
                                    <h4 class="name-r">john.baklan</h4>
                                    <div class="level-user level-user-label">
                                        <div class="level-text">Уровень 68</div>
                                        <span class="label-user label-user-pro">pro</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="body-bets">
                            <div class="table-bets">
                                <div class="table-bets-row">
                                    <div class="count-row__t">1</div>
                                    <div class="item-tbl-row-bts">
                                        <div class="title__t">Футбол</div>
                                        <div class="value__t">Реал Мадрид - Ливерпуль</div>
                                    </div>
                                    <div class="item-tbl-row-bts">
                                        <div class="title__t">26.05.2018</div>
                                        <div class="value__t">Тотал Больше 3.5 - x 1.67</div>
                                    </div>
                                </div>
                                <div class="table-bets-row">
                                    <div class="count-row__t">2</div>
                                    <div class="item-tbl-row-bts">
                                        <div class="title__t">Теннис</div>
                                        <div class="value__t">М. Шарапова - Р. Агнешка</div>
                                    </div>
                                    <div class="item-tbl-row-bts">
                                        <div class="title__t">26.05.2018</div>
                                        <div class="value__t">Победа 1 - x 2.85</div>
                                    </div>
                                </div>
                                <div class="table-bets-row">
                                    <div class="count-row__t">3</div>
                                    <div class="item-tbl-row-bts">
                                        <div class="title__t">Футбол</div>
                                        <div class="value__t">Реал Мадрид - Ливерпуль</div>
                                    </div>
                                    <div class="item-tbl-row-bts">
                                        <div class="title__t">26.05.2018</div>
                                        <div class="value__t">Тотал Больше 3.5 - x 1.67</div>
                                    </div>
                                </div>
                                <div class="table-bets-row">
                                    <div class="count-row__t">4</div>
                                    <div class="item-tbl-row-bts">
                                        <div class="title__t">Теннис</div>
                                        <div class="value__t">М. Шарапова - Р. Агнешка</div>
                                    </div>
                                    <div class="item-tbl-row-bts">
                                        <div class="title__t">26.05.2018</div>
                                        <div class="value__t">Победа 1 - x 2.85</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="footer-bets">
                            <div class="text-footer-bets">
                                <div class="text-bets">
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                                        totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                                        dicta sunt explicabo.</p>
                                </div>
                                <div class="static-footer-bets">
                                    <div class="static-footer-bets-title">Экспресс</div>
                                    <div class="static-footer-bets-value">7,200 р. - <span>9 %</span></div>
                                </div>
                            </div>
                            <div class="shared-block-modal">
                                <div class="btn-shared">
                                    <button class="like"></button>
                                    <div class="shared-block">
                                        <button class="shared">
                                            <span class="icon-network"></span>
                                        </button>
                                        <div class="drop-shared">
                                            <ul class="shared-social">
                                                <li>
                                                    <a href="https://twitter.com/home?status=http%3A//test6.tino.com.ua/account.html" target="_blank">
                                                        <span class="icon-tw"></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//test6.tino.com.ua/account.html" target="_blank">
                                                        <span class="icon-fb"></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://plus.google.com/share?url=https%3A//www.facebook.com/sharer/sharer.php?u=http%253A//test6.tino.com.ua/account.html" target="_blank">
                                                        <span class="icon-gp"></span>
                                                    </a>
                                                </li>
                                            </ul>
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
<div class="modal-wrapper bet-modal modal-860" id="bet4">
    <div class="modal-inner">
        <div class="modal-content">
            <div class="modal-content-inner">
                <div class="header-modal">
                    <button class="close" data-toggle="modal-dismiss"><span class="icon-close2"></span></button>
                </div>
                <div class="body-modal">
                    <div class="bet-modal-inner">
                        <div class="head-bets">
                            <div class="row-ava">
                                <div class="rate-avatar">
                                    <div class="circle-wrapper" data-ptc="27">
                                        <div class="circle"></div>
                                    </div>
                                    <div class="avatar-user">
                                        <img src="images/ava1.png" alt="">
                                    </div>
                                </div>
                                <div class="user-info">
                                    <h4 class="name-r">john.baklan</h4>
                                    <div class="level-user level-user-label">
                                        <div class="level-text">Уровень 27</div>
                                        <span class="label-user label-user-pro">pro</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="body-bets">
                            <div class="table-bets">
                                <div class="table-bets-row">
                                    <div class="count-row__t">1</div>
                                    <div class="item-tbl-row-bts">
                                        <div class="title__t">Футбол</div>
                                        <div class="value__t">Реал Мадрид - Ливерпуль</div>
                                    </div>
                                    <div class="item-tbl-row-bts">
                                        <div class="title__t">26.05.2018</div>
                                        <div class="value__t">Тотал Больше 3.5 - x 1.67</div>
                                    </div>
                                </div>
                                <div class="table-bets-row">
                                    <div class="count-row__t">2</div>
                                    <div class="item-tbl-row-bts">
                                        <div class="title__t">Теннис</div>
                                        <div class="value__t">М. Шарапова - Р. Агнешка</div>
                                    </div>
                                    <div class="item-tbl-row-bts">
                                        <div class="title__t">26.05.2018</div>
                                        <div class="value__t">Победа 1 - x 2.85</div>
                                    </div>
                                </div>
                                <div class="table-bets-row">
                                    <div class="count-row__t">3</div>
                                    <div class="item-tbl-row-bts">
                                        <div class="title__t">Футбол</div>
                                        <div class="value__t">Реал Мадрид - Ливерпуль</div>
                                    </div>
                                    <div class="item-tbl-row-bts">
                                        <div class="title__t">26.05.2018</div>
                                        <div class="value__t">Тотал Больше 3.5 - x 1.67</div>
                                    </div>
                                </div>
                                <div class="table-bets-row">
                                    <div class="count-row__t">4</div>
                                    <div class="item-tbl-row-bts">
                                        <div class="title__t">Теннис</div>
                                        <div class="value__t">М. Шарапова - Р. Агнешка</div>
                                    </div>
                                    <div class="item-tbl-row-bts">
                                        <div class="title__t">26.05.2018</div>
                                        <div class="value__t">Победа 1 - x 2.85</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="footer-bets">
                            <div class="text-footer-bets">
                                <div class="text-bets">
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                                        totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                                        dicta sunt explicabo.</p>
                                </div>
                                <div class="static-footer-bets">
                                    <div class="static-footer-bets-title">Экспресс</div>
                                    <div class="static-footer-bets-value">7,200 р. - <span>9 %</span></div>
                                </div>
                            </div>
                            <div class="shared-block-modal">
                                <div class="btn-shared">
                                    <button class="like"></button>
                                    <div class="shared-block">
                                        <button class="shared">
                                            <span class="icon-network"></span>
                                        </button>
                                        <div class="drop-shared">
                                            <ul class="shared-social">
                                                <li>
                                                    <a href="https://twitter.com/home?status=http%3A//test6.tino.com.ua/account.html" target="_blank">
                                                        <span class="icon-tw"></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//test6.tino.com.ua/account.html" target="_blank">
                                                        <span class="icon-fb"></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://plus.google.com/share?url=https%3A//www.facebook.com/sharer/sharer.php?u=http%253A//test6.tino.com.ua/account.html" target="_blank">
                                                        <span class="icon-gp"></span>
                                                    </a>
                                                </li>
                                            </ul>
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
<div class="modal-wrapper bet-modal modal-945" id="modal-faq">
    <div class="modal-inner">
        <div class="modal-content">
            <div class="modal-content-inner">
                <div class="header-modal">
                    <button class="close" data-toggle="modal-dismiss"><span class="icon-close2"></span></button>
                </div>
                <div class="body-modal">
                    <div class="choose-bet-wrapper">
                        <div class="choose-bet-inner">
                            <div class="head-choose faq-title">
                                <h2>F.A.Q.</h2>
                            </div>
                            <div class="faq-wrapper">
                                <div class="faq-list collapse-wrapper">
                                    <div class="collapse-item">
                                        <div class="collapse-item-head">
                                            <a href="#faq1" data-toggle="collap">Для чего нужен наш сервис?</a>
                                        </div>
                                        <div class="collapse-item-body" id="faq1">
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                                                ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas
                                                sit aspernatur aut odit aut fugit, sed quia consequuntur</p>
                                        </div>
                                    </div>
                                    <div class="collapse-item">
                                        <div class="collapse-item-head">
                                            <a href="#faq2" data-toggle="collap">Как написать другим пользователям сообщение?</a>
                                        </div>
                                        <div class="collapse-item-body" id="faq2">
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                                                ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas
                                                sit aspernatur aut odit aut fugit, sed quia consequuntur</p>
                                        </div>
                                    </div>
                                    <div class="collapse-item">
                                        <div class="collapse-item-head">
                                            <a href="#faq3" data-toggle="collap">Как дать прогноз?</a>
                                        </div>
                                        <div class="collapse-item-body" id="faq3">
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                                                ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas
                                                sit aspernatur aut odit aut fugit, sed quia consequuntur</p>
                                        </div>
                                    </div>
                                    <div class="collapse-item">
                                        <div class="collapse-item-head">
                                            <a href="#faq4" data-toggle="collap">Как посмотреть свои прогнозы?</a>
                                        </div>
                                        <div class="collapse-item-body" id="faq4">
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                                                ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas
                                                sit aspernatur aut odit aut fugit, sed quia consequuntur</p>
                                        </div>
                                    </div>
                                    <div class="collapse-item">
                                        <div class="collapse-item-head">
                                            <a href="#faq5" data-toggle="collap">Как поменять имя пользователя?</a>
                                        </div>
                                        <div class="collapse-item-body" id="faq5">
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                                                ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas
                                                sit aspernatur aut odit aut fugit, sed quia consequuntur</p>
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
<div class="modal-wrapper bet-modal modal-640" id="modal-feedback">
    <div class="modal-inner">
        <div class="modal-content">
            <div class="modal-content-inner">
                <div class="header-modal">
                    <button class="close" data-toggle="modal-dismiss"><span class="icon-close2"></span></button>
                </div>
                <div class="body-modal">
                    <div class="choose-bet-wrapper">
                        <div class="choose-bet-inner">
                            <div class="head-choose">
                                <h2>Отзыв</h2>
                                <p>Напишите отзыв</p>
                            </div>
                            <div class="complain-form">
                                <form action="#">
                                    <div class="feedback-form-inner">
                                        <div class="input-row">
                                            <div class="input-row-inner">
                                                <input type="text" placeholder="">
                                                <label class="placeholder">Имя</label>
                                            </div>
                                        </div>
                                        <div class="input-row textarea-row">
                                            <div class="input-row-inner">
                                                <textarea placeholder=""></textarea>
                                                <label class="placeholder">Сообщение</label>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="btn-block-choose justify-end">
                                <button class="btn btn-hover btn-primary save-btn">
                                    <i class="text-show">Отправить</i>
                                    <i class="text-hide">Отправлено</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/script.min.js"></script>
</body>
