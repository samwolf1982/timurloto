<?php

use app\copmonents\widgets\addbet\AddbetWidget;
use app\copmonents\widgets\showuser\ShowuserWidget;
use app\modules\statistic\widgets\StatisticInformer;
use app\modules\statistic\widgets\UserBlockInformer;
use app\modules\statistic\widgets\UserChartInformer;
use app\modules\statistic\widgets\WagersInformer;
use common\models\DTO\AccessInfoAccount;
use dektrium\user\widgets\Connect;
use frontend\assets\AccountAsset;
use frontend\assets\AccountViewAsset;
use frontend\assets\MainAsset;
use yii\helpers\Url;

$this->title='LOOK MY BET';
AccountAsset::register($this);
AccountViewAsset::register($this);


/**@var  AccessInfoAccount $accessInfoAccount **/
$accessInfoAccount
?>

<body class="footer-login-page front-page">

<header class="header-main front-header static-header">
    <div class="header-inner">
        <div class="logo-block">
            <a href="/">
                <img src="/images/logo.svg" alt="Look My bet">
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

        <!--   вход выход  пользователя   -->
        <?php // ShowuserWidget::widget(['userdata' => [],'view'=>'other']) ?>

        <?php  if(Yii::$app->user->isGuest){   ?>
            <?= ShowuserWidget::widget(['userdata' => [],'view'=>'index']) ?>
        <?php }else{ ?>
            <?= ShowuserWidget::widget(['userdata' => [],'view'=>'other']) ?>
        <?php }  ?>

    </div>
</header>
<div class="account-statistic">
    <div class="content-container">
        <ul class="list-static two-row-list-table">
            <li><a href="#" class=""><span class="stat-title">Подписчики</span> <span class="stat-val"><?=$accessInfoAccount->getCountSubscribers()?></span></a></li>
            <li><a href="#my-bet" class="ancor"><span class="stat-title">Прогнозы</span> <span class="stat-val"><?=$accessInfoAccount->getCountWagers()?></span></a></li>
            <li><a href="<?=Url::toRoute(['/bet'])?>" class=""><span class="stat-title">week </span> <span class="stat-val">#<?=$weekNum?></span></a></li>
            <li><a href="<?=Url::toRoute(['/bet','#'=>'user-rating'])?>" class="ancor"><span class="stat-title">РЕЙТИНГ</span> <span class="stat-val">#<?=$top100?></span></a></li>
        </ul>
    </div>
</div>

<div class="main-background">
    <div id="scene">
        <div data-depth="0.2" class="background-image" style="background-image: url(/images/back-body.jpg)"></div>
    </div>
</div>

<div class="front-page-wrapper account-wrapper">
    <div class="front-page-inner">
        <div class="content-container">



            <div class="row table-row">
                <div class="column-4">
                    <?=UserBlockInformer::widget(['user_id'=>yii::$app->request->get('id'),'view'=>'userBlockInformer/view']) ?>
                </div>
                <div class="column-8">
                    <?=UserChartInformer::widget(['user_id'=>yii::$app->request->get('id')]) ?>
                </div>

            </div>

            <?php if(YII_ENV=='dev'){  ?>
            <div class="row table-row">
                <div class="column-4 fav-column">
                    <div class="table-wrapper">
                        <div class="table-inner">
                            <div class="table-body">
                                <div class="favorite-tbl">
                                    <h2 class="title-fav">любимые виды спорта</h2>
                                    <div class="fav-wrapper">
                                        <div class="fav-inner">
                                            <div class="favorite-item has-value">
                                                <div class="favorite-item-inner" data-toggle="tooltip" data-placement="top" title="Баскетбол">
                                                    <div class="fav-con">
                                                        <img src="/images/basket.svg" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="favorite-item has-value">
                                                <div class="favorite-item-inner" data-toggle="tooltip" data-placement="top" title="Футбол">
                                                    <div class="fav-con">
                                                        <img src="/images/footbol.svg" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="favorite-item has-value">
                                                <div class="favorite-item-inner" data-toggle="tooltip" data-placement="top" title="Большой Тенис">
                                                    <div class="fav-con">
                                                        <img src="/images/tenis.svg" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="favorite-item member-item">
                                                <div class="favorite-item-inner"></div>
                                            </div>
                                            <div class="favorite-item member-item">
                                                <div class="favorite-item-inner"></div>
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
                                    <h2 class="title-fav">любимые турниры</h2>
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
                                            <div class="favorite-item member-item">
                                                <div class="favorite-item-inner"></div>
                                            </div>
                                            <!-- Этот блок для просмотра всех зарегистрированых юзеро.
                                                Блоки в которые добавляются розовая рамка и плюсик
                                                предназначен для личного кабинета. В нем можно отредактировать любимые виды спорта и тд.  -->
                                            <div class="favorite-item member-item">
                                                <div class="favorite-item-inner"></div>
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
                                    <h2 class="title-fav">любимые команды</h2>
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
                                            <div class="favorite-item member-item">
                                                <div class="favorite-item-inner"></div>
                                            </div>
                                            <div class="favorite-item member-item">
                                                <div class="favorite-item-inner"></div>
                                            </div>
                                            <div class="favorite-item member-item">
                                                <div class="favorite-item-inner"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }  ?>

            <?=StatisticInformer::widget(['user_id'=>yii::$app->request->get('id')]); ?>



            <?=WagersInformer::widget(['user_id'=>yii::$app->request->get('id'),'text'=>'Все ставки']) ?>

            <?php if(0){ ?>
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
                                    <div class="play-list-drop">
                                        <button class="drop-trig-lay">Плейлист #A</button>
                                        <div class="drop-play">
                                            <ul class="drop-list">
                                                <li>
                                                    <a class="pl-item" href="#">Плейлист #A</a>
                                                    <a class="pl-item" href="#">Плейлист #B</a>
                                                    <a class="pl-item" href="#">Плейлист #C</a>
                                                </li>
                                            </ul>
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
                                        <img src="/images/soccer-ball.svg" alt="">
                                    </div>
                                    <div class="left-head-text">
                                        <span class="text-head">Мои Ставки <sup>357</sup></span>
                                    </div>
                                    <div class="play-list-drop">
                                        <button class="drop-trig-lay">Плейлист #A</button>
                                        <div class="drop-play">
                                            <ul class="drop-list">
                                                <li>
                                                    <a class="pl-item" href="#">Плейлист #A</a>
                                                    <a class="pl-item" href="#">Плейлист #B</a>
                                                    <a class="pl-item" href="#">Плейлист #C</a>
                                                </li>
                                            </ul>
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
                                                                    <div class="circle-wrapper" data-ptc="20">
                                                                        <div class="circle"><canvas width="74" height="74"></canvas></div>
                                                                    </div>
                                                                    <div class="avatar-status-bet avatar-status-bet-success"></div>
                                                                </div>
                                                                <div class="user-info">
                                                                    <h4 class="name-r">john.baklan</h4>
                                                                    <div class="level-user level-user-label">
                                                                        <div class="level-text">Уровень 20</div>
                                                                        <span class="label-user label-user-pro">pro</span>
                                                                    </div>
                                                                </div>
                                                                <div class="bet-status">
                                                                    <div class="bet-status-inner">
                                                                        <span class="icon-open"></span>
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
                                                                        <a href="#" data-toggle="modal" data-target="#bet20">+  Показать Экспресс</a>
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
                                                                    <div class="circle-wrapper" data-ptc="11">
                                                                        <div class="circle"><canvas width="74" height="74"></canvas></div>
                                                                    </div>
                                                                    <div class="avatar-status-bet avatar-status-bet-cancel"></div>
                                                                </div>
                                                                <div class="user-info">
                                                                    <h4 class="name-r">rodrigo_pes</h4>
                                                                    <div class="level-user level-user-label">
                                                                        <div class="level-text">Уровень 11</div>
                                                                        <span class="label-user label-user-pro">pro</span>
                                                                    </div>
                                                                </div>
                                                                <div class="bet-status">
                                                                    <div class="bet-status-inner">
                                                                        <span class="icon-open"></span>
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
                                                                    <div class="circle-wrapper" data-ptc="2">
                                                                        <div class="circle"><canvas width="74" height="74"></canvas></div>
                                                                    </div>
                                                                    <div class="avatar-status-bet avatar-status-bet-success"></div>
                                                                </div>
                                                                <div class="user-info">
                                                                    <h4 class="name-r">john.baklan</h4>
                                                                    <div class="level-user level-user-label">
                                                                        <div class="level-text">Уровень 2</div>
                                                                        <span class="label-user label-user-pro">pro</span>
                                                                    </div>
                                                                </div>
                                                                <div class="bet-status">
                                                                    <div class="bet-status-inner">
                                                                        <span class="icon-lock"></span>
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
                                                                        <a href="#">+  узнать прогноз</a>
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
                                                                    <div class="avatar-status-bet avatar-status-bet-cancel"></div>
                                                                </div>
                                                                <div class="user-info">
                                                                    <h4 class="name-r">john.baklan</h4>
                                                                    <div class="level-user level-user-label">
                                                                        <div class="level-text">Уровень 3</div>
                                                                        <span class="label-user label-user-pro">pro</span>
                                                                    </div>
                                                                </div>
                                                                <div class="bet-status">
                                                                    <div class="bet-status-inner">
                                                                        <span class="icon-lock"></span>
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
                                                                        <a href="#" data-toggle="modal" data-target="#bet3">+  узнать прогноз</a>
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
                                                                    <div class="circle-wrapper" data-ptc="4">
                                                                        <div class="circle"><canvas width="74" height="100"></canvas></div>
                                                                    </div>
                                                                    <div class="avatar-status-bet avatar-status-bet-success"></div>
                                                                </div>
                                                                <div class="user-info">
                                                                    <h4 class="name-r">john.baklan</h4>
                                                                    <div class="level-user level-user-label">
                                                                        <div class="level-text">Уровень 4</div>
                                                                        <span class="label-user label-user-pro">pro</span>
                                                                    </div>
                                                                </div>
                                                                <div class="bet-status">
                                                                    <div class="bet-status-inner">
                                                                        <span class="icon-open"></span>
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
                                                                <div class="bet-status">
                                                                    <div class="bet-status-inner">
                                                                        <span class="icon-open"></span>
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
            <?php } ?>



        </div>
    </div>
</div>



<?= $this->render('@app/views/layouts/footer');?>





<div class="modal-wrapper chat-modal" id="modal-chat">
    <div class="modal-inner">
        <div class="modal-content">
            <div class="modal-content-inner">
                <div class="header-modal">
                    <button class="close" data-toggle="modal-dismiss"><span class="icon-close2"></span></button>
                </div>
                <div class="body-modal">
                    <div class="chat-wrapper">
                        <div class="left-chat">
                            <div class="button-trig-l-s">
                                <a href="#" class="trigger-all-tabs-list">
                                    <span class="icon-message"></span>
                                </a>
                            </div>
                            <div class="left-chat-inner">
                                <div class="head-left">
                                    <h3>СООБЩЕНИЯ</h3>
                                    <div class="create-block">
                                        <button class="create-chat-btn create-groupe">
                                            <span class="icon-add-plus"></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="scrollbar-chat" data-simplebar data-simplebar-auto-hide="false">
                                    <div class="list-chat-item">
                                        <h3 class="favorite-item-chat-title"><span class="icon-star"></span>Избранные</h3>
                                        <ul class="list-chat favorite-list-chat"></ul>
                                        <h3 class="all-item-chat-title">Последние Сообщения</h3>
                                        <ul class="list-chat all-item-chat">
                                            <li class="chat-item">
                                                <div class="check-box checkbox-notext">
                                                    <input type="checkbox" name="chat" id="c1">
                                                    <label for="c1"></label>
                                                </div>
                                                <div data-toggle="#chat1" class="chat-tab-trigger active">
                                                    <div class="avatar-chat">
                                                        <div class="count-message-chat">5</div>
                                                        <div class="avatar-chat-inner">
                                                            <img src="/images/avatar-placeholder.svg" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="chat-info">
                                                        <div class="chat-name">Alexandr</div>
                                                        <div class="chat-date">26 мар. 2018 г.</div>
                                                        <div class="chat-message">
                                                            <span class="icon-in_m"></span>
                                                            <p>The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list-setting-massage">
                                                    <button class="favorite-btn">
                                                        <span class="icon-star"></span>
                                                        <span class="icon-star-active"></span>
                                                    </button>
                                                    <button class="blocked-btn">
                                                        <span class="icon-block"></span>
                                                    </button>
                                                    <button class="delete-btn">
                                                        <span class="icon-delete"></span>
                                                    </button>
                                                </div>
                                            </li>
                                            <li class="chat-item">
                                                <div class="check-box checkbox-notext">
                                                    <input type="checkbox" name="chat" id="c2">
                                                    <label for="c2"></label>
                                                </div>
                                                <div data-toggle="#chat2" class="chat-tab-trigger">
                                                    <div class="avatar-chat">
                                                        <div class="avatar-chat-inner">
                                                            <img src="/images/avatar-placeholder.svg" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="chat-info">
                                                        <div class="chat-name">Alexandr</div>
                                                        <div class="chat-date">26 мар. 2018 г.</div>
                                                        <div class="chat-message">
                                                            <span class="icon-in_m"></span>
                                                            <p>The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list-setting-massage">
                                                    <button class="favorite-btn">
                                                        <span class="icon-star"></span>
                                                        <span class="icon-star-active"></span>
                                                    </button>
                                                    <button class="blocked-btn">
                                                        <span class="icon-block"></span>
                                                    </button>
                                                    <button class="delete-btn">
                                                        <span class="icon-delete"></span>
                                                    </button>
                                                </div>
                                            </li>
                                            <li class="chat-item">
                                                <div class="check-box checkbox-notext">
                                                    <input type="checkbox" name="chat" id="c3">
                                                    <label for="c3"></label>
                                                </div>
                                                <div data-toggle="#chat3" class="chat-tab-trigger">
                                                    <div class="avatar-chat">
                                                        <div class="avatar-chat-inner">
                                                            <img src="/images/avatar-placeholder.svg" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="chat-info">
                                                        <div class="chat-name">Alexandr</div>
                                                        <div class="chat-date">26 мар. 2018 г.</div>
                                                        <div class="chat-message">
                                                            <span class="icon-in_m"></span>
                                                            <p>The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list-setting-massage">
                                                    <button class="favorite-btn">
                                                        <span class="icon-star"></span>
                                                        <span class="icon-star-active"></span>
                                                    </button>
                                                    <button class="blocked-btn">
                                                        <span class="icon-block"></span>
                                                    </button>
                                                    <button class="delete-btn">
                                                        <span class="icon-delete"></span>
                                                    </button>
                                                </div>
                                            </li>
                                            <li class="chat-item">
                                                <div class="check-box checkbox-notext">
                                                    <input type="checkbox" name="chat" id="c4">
                                                    <label for="c4"></label>
                                                </div>
                                                <div data-toggle="#chat4" class="chat-tab-trigger">

                                                    <div class="avatar-chat">
                                                        <div class="avatar-chat-inner">
                                                            <img src="/images/avatar-placeholder.svg" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="chat-info">
                                                        <div class="chat-name">Alexandr</div>
                                                        <div class="chat-date">26 мар. 2018 г.</div>
                                                        <div class="chat-message">
                                                            <span class="icon-in_m"></span>
                                                            <p>The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list-setting-massage">
                                                    <button class="favorite-btn">
                                                        <span class="icon-star"></span>
                                                        <span class="icon-star-active"></span>
                                                    </button>
                                                    <button class="blocked-btn">
                                                        <span class="icon-block"></span>
                                                    </button>
                                                    <button class="delete-btn">
                                                        <span class="icon-delete"></span>
                                                    </button>
                                                </div>
                                            </li>
                                            <li class="chat-item">
                                                <div class="check-box checkbox-notext">
                                                    <input type="checkbox" name="chat" id="c5">
                                                    <label for="c5"></label>
                                                </div>
                                                <div data-toggle="#chat5" class="chat-tab-trigger">
                                                    <div class="avatar-chat">
                                                        <div class="avatar-chat-inner">
                                                            <img src="/images/avatar-placeholder.svg" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="chat-info">
                                                        <div class="chat-name">Alexandr</div>
                                                        <div class="chat-date">26 мар. 2018 г.</div>
                                                        <div class="chat-message">
                                                            <span class="icon-in_m"></span>
                                                            <p>The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list-setting-massage">
                                                    <button class="favorite-btn">
                                                        <span class="icon-star"></span>
                                                        <span class="icon-star-active"></span>
                                                    </button>
                                                    <button class="blocked-btn">
                                                        <span class="icon-block"></span>
                                                    </button>
                                                    <button class="delete-btn">
                                                        <span class="icon-delete"></span>
                                                    </button>
                                                </div>
                                            </li>
                                            <li class="chat-item">
                                                <div class="check-box checkbox-notext">
                                                    <input type="checkbox" name="chat" id="c6">
                                                    <label for="c6"></label>
                                                </div>
                                                <div data-toggle="#chat6" class="chat-tab-trigger">
                                                    <div class="avatar-chat">
                                                        <div class="avatar-chat-inner">
                                                            <img src="/images/avatar-placeholder.svg" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="chat-info">
                                                        <div class="chat-name">Alexandr</div>
                                                        <div class="chat-date">26 мар. 2018 г.</div>
                                                        <div class="chat-message">
                                                            <span class="icon-in_m"></span>
                                                            <p>The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list-setting-massage">
                                                    <button class="favorite-btn">
                                                        <span class="icon-star"></span>
                                                        <span class="icon-star-active"></span>
                                                    </button>
                                                    <button class="blocked-btn">
                                                        <span class="icon-block"></span>
                                                    </button>
                                                    <button class="delete-btn">
                                                        <span class="icon-delete"></span>
                                                    </button>
                                                </div>
                                            </li>
                                            <li class="chat-item">
                                                <div class="check-box checkbox-notext">
                                                    <input type="checkbox" name="chat" id="c7">
                                                    <label for="c7"></label>
                                                </div>
                                                <div data-toggle="#chat7" class="chat-tab-trigger">
                                                    <div class="avatar-chat">
                                                        <div class="avatar-chat-inner">
                                                            <img src="/images/avatar-placeholder.svg" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="chat-info">
                                                        <div class="chat-name">Alexandr</div>
                                                        <div class="chat-date">26 мар. 2018 г.</div>
                                                        <div class="chat-message">
                                                            <span class="icon-in_m"></span>
                                                            <p>The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list-setting-massage">
                                                    <button class="favorite-btn">
                                                        <span class="icon-star"></span>
                                                        <span class="icon-star-active"></span>
                                                    </button>
                                                    <button class="blocked-btn">
                                                        <span class="icon-block"></span>
                                                    </button>
                                                    <button class="delete-btn">
                                                        <span class="icon-delete"></span>
                                                    </button>
                                                </div>
                                            </li>
                                            <li class="chat-item">
                                                <div class="check-box checkbox-notext">
                                                    <input type="checkbox" name="chat" id="c8">
                                                    <label for="c8"></label>
                                                </div>
                                                <div data-toggle="#chat8" class="chat-tab-trigger">
                                                    <div class="avatar-chat">
                                                        <div class="avatar-chat-inner">
                                                            <img src="/images/avatar-placeholder.svg" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="chat-info">
                                                        <div class="chat-name">Alexandr</div>
                                                        <div class="chat-date">26 мар. 2018 г.</div>
                                                        <div class="chat-message">
                                                            <span class="icon-in_m"></span>
                                                            <p>The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list-setting-massage">
                                                    <button class="favorite-btn">
                                                        <span class="icon-star"></span>
                                                        <span class="icon-star-active"></span>
                                                    </button>
                                                    <button class="blocked-btn">
                                                        <span class="icon-block"></span>
                                                    </button>
                                                    <button class="delete-btn">
                                                        <span class="icon-delete"></span>
                                                    </button>
                                                </div>
                                            </li>
                                            <li class="chat-item">
                                                <div class="check-box checkbox-notext">
                                                    <input type="checkbox" name="chat" id="c9">
                                                    <label for="c9"></label>
                                                </div>
                                                <div data-toggle="#chat9" class="chat-tab-trigger">
                                                    <div class="avatar-chat">
                                                        <div class="avatar-chat-inner">
                                                            <img src="/images/avatar-placeholder.svg" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="chat-info">
                                                        <div class="chat-name">Alexandr</div>
                                                        <div class="chat-date">26 мар. 2018 г.</div>
                                                        <div class="chat-message">
                                                            <span class="icon-in_m"></span>
                                                            <p>The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list-setting-massage">
                                                    <button class="favorite-btn">
                                                        <span class="icon-star"></span>
                                                        <span class="icon-star-active"></span>
                                                    </button>
                                                    <button class="blocked-btn">
                                                        <span class="icon-block"></span>
                                                    </button>
                                                    <button class="delete-btn">
                                                        <span class="icon-delete"></span>
                                                    </button>
                                                </div>
                                            </li>
                                            <li class="chat-item">
                                                <div class="check-box checkbox-notext">
                                                    <input type="checkbox" name="chat" id="c10">
                                                    <label for="c10"></label>
                                                </div>
                                                <div data-toggle="#chat10" class="chat-tab-trigger">
                                                    <div class="avatar-chat">
                                                        <div class="avatar-chat-inner">
                                                            <img src="/images/avatar-placeholder.svg" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="chat-info">
                                                        <div class="chat-name">Alexandr</div>
                                                        <div class="chat-date">26 мар. 2018 г.</div>
                                                        <div class="chat-message">
                                                            <span class="icon-in_m"></span>
                                                            <p>The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list-setting-massage">
                                                    <button class="favorite-btn">
                                                        <span class="icon-star"></span>
                                                        <span class="icon-star-active"></span>
                                                    </button>
                                                    <button class="blocked-btn">
                                                        <span class="icon-block"></span>
                                                    </button>
                                                    <button class="delete-btn">
                                                        <span class="icon-delete"></span>
                                                    </button>
                                                </div>
                                            </li>
                                            <li class="chat-item">
                                                <div class="check-box checkbox-notext">
                                                    <input type="checkbox" name="chat" id="c11">
                                                    <label for="c11"></label>
                                                </div>
                                                <div data-toggle="#chat11" class="chat-tab-trigger">
                                                    <div class="avatar-chat">
                                                        <div class="avatar-chat-inner">
                                                            <img src="/images/avatar-placeholder.svg" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="chat-info">
                                                        <div class="chat-name">Alexandr</div>
                                                        <div class="chat-date">26 мар. 2018 г.</div>
                                                        <div class="chat-message">
                                                            <span class="icon-in_m"></span>
                                                            <p>The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list-setting-massage">
                                                    <button class="favorite-btn">
                                                        <span class="icon-star"></span>
                                                        <span class="icon-star-active"></span>
                                                    </button>
                                                    <button class="blocked-btn">
                                                        <span class="icon-block"></span>
                                                    </button>
                                                    <button class="delete-btn">
                                                        <span class="icon-delete"></span>
                                                    </button>
                                                </div>
                                            </li>
                                            <li class="chat-item">
                                                <div class="check-box checkbox-notext">
                                                    <input type="checkbox" name="chat" id="c12">
                                                    <label for="c12"></label>
                                                </div>
                                                <div data-toggle="#chat12" class="chat-tab-trigger">
                                                    <div class="avatar-chat">
                                                        <div class="avatar-chat-inner">
                                                            <img src="/images/avatar-placeholder.svg" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="chat-info">
                                                        <div class="chat-name">Alexandr</div>
                                                        <div class="chat-date">26 мар. 2018 г.</div>
                                                        <div class="chat-message">
                                                            <span class="icon-in_m"></span>
                                                            <p>The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list-setting-massage">
                                                    <button class="favorite-btn">
                                                        <span class="icon-star"></span>
                                                        <span class="icon-star-active"></span>
                                                    </button>
                                                    <button class="blocked-btn">
                                                        <span class="icon-block"></span>
                                                    </button>
                                                    <button class="delete-btn">
                                                        <span class="icon-delete"></span>
                                                    </button>
                                                </div>
                                            </li>
                                            <li class="chat-item">
                                                <div class="check-box checkbox-notext">
                                                    <input type="checkbox" name="chat" id="c13">
                                                    <label for="c13"></label>
                                                </div>
                                                <div data-toggle="#chat13" class="chat-tab-trigger">
                                                    <div class="avatar-chat">
                                                        <div class="avatar-chat-inner">
                                                            <img src="/images/avatar-placeholder.svg" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="chat-info">
                                                        <div class="chat-name">Alexandr</div>
                                                        <div class="chat-date">26 мар. 2018 г.</div>
                                                        <div class="chat-message">
                                                            <span class="icon-in_m"></span>
                                                            <p>The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list-setting-massage">
                                                    <button class="favorite-btn">
                                                        <span class="icon-star"></span>
                                                        <span class="icon-star-active"></span>
                                                    </button>
                                                    <button class="blocked-btn">
                                                        <span class="icon-block"></span>
                                                    </button>
                                                    <button class="delete-btn">
                                                        <span class="icon-delete"></span>
                                                    </button>
                                                </div>
                                            </li>
                                            <li class="chat-item">
                                                <div class="check-box checkbox-notext">
                                                    <input type="checkbox" name="chat" id="c14">
                                                    <label for="c14"></label>
                                                </div>
                                                <div data-toggle="#chat14" class="chat-tab-trigger">
                                                    <div class="avatar-chat">
                                                        <div class="avatar-chat-inner">
                                                            <img src="/images/avatar-placeholder.svg" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="chat-info">
                                                        <div class="chat-name">Alexandr</div>
                                                        <div class="chat-date">26 мар. 2018 г.</div>
                                                        <div class="chat-message">
                                                            <span class="icon-in_m"></span>
                                                            <p>The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list-setting-massage">
                                                    <button class="favorite-btn">
                                                        <span class="icon-star"></span>
                                                        <span class="icon-star-active"></span>
                                                    </button>
                                                    <button class="blocked-btn">
                                                        <span class="icon-block"></span>
                                                    </button>
                                                    <button class="delete-btn">
                                                        <span class="icon-delete"></span>
                                                    </button>
                                                </div>
                                            </li>
                                            <li class="chat-item">
                                                <div class="check-box checkbox-notext">
                                                    <input type="checkbox" name="chat" id="c15">
                                                    <label for="c15"></label>
                                                </div>
                                                <div data-toggle="#chat15" class="chat-tab-trigger">
                                                    <div class="avatar-chat">
                                                        <div class="avatar-chat-inner">
                                                            <img src="/images/avatar-placeholder.svg" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="chat-info">
                                                        <div class="chat-name">Alexandr</div>
                                                        <div class="chat-date">26 мар. 2018 г.</div>
                                                        <div class="chat-message">
                                                            <span class="icon-in_m"></span>
                                                            <p>The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list-setting-massage">
                                                    <button class="favorite-btn">
                                                        <span class="icon-star"></span>
                                                        <span class="icon-star-active"></span>
                                                    </button>
                                                    <button class="blocked-btn">
                                                        <span class="icon-block"></span>
                                                    </button>
                                                    <button class="delete-btn">
                                                        <span class="icon-delete"></span>
                                                    </button>
                                                </div>
                                            </li>
                                            <li class="chat-item">
                                                <div class="check-box checkbox-notext">
                                                    <input type="checkbox" name="chat" id="c16">
                                                    <label for="c16"></label>
                                                </div>
                                                <div data-toggle="#chat16" class="chat-tab-trigger">
                                                    <div class="avatar-chat">
                                                        <div class="avatar-chat-inner">
                                                            <img src="/images/avatar-placeholder.svg" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="chat-info">
                                                        <div class="chat-name">Alexandr</div>
                                                        <div class="chat-date">26 мар. 2018 г.</div>
                                                        <div class="chat-message">
                                                            <span class="icon-in_m"></span>
                                                            <p>The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list-setting-massage">
                                                    <button class="favorite-btn">
                                                        <span class="icon-star"></span>
                                                        <span class="icon-star-active"></span>
                                                    </button>
                                                    <button class="blocked-btn">
                                                        <span class="icon-block"></span>
                                                    </button>
                                                    <button class="delete-btn">
                                                        <span class="icon-delete"></span>
                                                    </button>
                                                </div>
                                            </li>
                                            <li class="chat-item">
                                                <div class="check-box checkbox-notext">
                                                    <input type="checkbox" name="chat" id="c17">
                                                    <label for="c17"></label>
                                                </div>
                                                <div data-toggle="#chat17" class="chat-tab-trigger">
                                                    <div class="avatar-chat">
                                                        <div class="avatar-chat-inner">
                                                            <img src="/images/avatar-placeholder.svg" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="chat-info">
                                                        <div class="chat-name">Alexandr</div>
                                                        <div class="chat-date">26 мар. 2018 г.</div>
                                                        <div class="chat-message">
                                                            <span class="icon-in_m"></span>
                                                            <p>The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list-setting-massage">
                                                    <button class="favorite-btn">
                                                        <span class="icon-star"></span>
                                                        <span class="icon-star-active"></span>
                                                    </button>
                                                    <button class="blocked-btn">
                                                        <span class="icon-block"></span>
                                                    </button>
                                                    <button class="delete-btn">
                                                        <span class="icon-delete"></span>
                                                    </button>
                                                </div>
                                            </li>
                                            <li class="chat-item">
                                                <div class="check-box checkbox-notext">
                                                    <input type="checkbox" name="chat" id="c18">
                                                    <label for="c18"></label>
                                                </div>
                                                <div data-toggle="#chat18" class="chat-tab-trigger">
                                                    <div class="avatar-chat">
                                                        <div class="avatar-chat-inner">
                                                            <img src="/images/avatar-placeholder.svg" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="chat-info">
                                                        <div class="chat-name">Alexandr</div>
                                                        <div class="chat-date">26 мар. 2018 г.</div>
                                                        <div class="chat-message">
                                                            <span class="icon-in_m"></span>
                                                            <p>The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list-setting-massage">
                                                    <button class="favorite-btn">
                                                        <span class="icon-star"></span>
                                                        <span class="icon-star-active"></span>
                                                    </button>
                                                    <button class="blocked-btn">
                                                        <span class="icon-block"></span>
                                                    </button>
                                                    <button class="delete-btn">
                                                        <span class="icon-delete"></span>
                                                    </button>
                                                </div>
                                            </li>
                                            <li class="chat-item">
                                                <div class="check-box checkbox-notext">
                                                    <input type="checkbox" name="chat" id="c19">
                                                    <label for="c19"></label>
                                                </div>
                                                <div data-toggle="#chat19" class="chat-tab-trigger">
                                                    <div class="avatar-chat">
                                                        <div class="avatar-chat-inner">
                                                            <img src="/images/avatar-placeholder.svg" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="chat-info">
                                                        <div class="chat-name">Alexandr</div>
                                                        <div class="chat-date">26 мар. 2018 г.</div>
                                                        <div class="chat-message">
                                                            <span class="icon-in_m"></span>
                                                            <p>The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list-setting-massage">
                                                    <button class="favorite-btn">
                                                        <span class="icon-star"></span>
                                                        <span class="icon-star-active"></span>
                                                    </button>
                                                    <button class="blocked-btn">
                                                        <span class="icon-block"></span>
                                                    </button>
                                                    <button class="delete-btn">
                                                        <span class="icon-delete"></span>
                                                    </button>
                                                </div>
                                            </li>
                                            <li class="chat-item">
                                                <div class="check-box checkbox-notext">
                                                    <input type="checkbox" name="chat" id="c20">
                                                    <label for="c20"></label>
                                                </div>
                                                <div data-toggle="#chat20" class="chat-tab-trigger">
                                                    <div class="avatar-chat">
                                                        <div class="avatar-chat-inner">
                                                            <img src="/images/avatar-placeholder.svg" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="chat-info">
                                                        <div class="chat-name">Alexandr</div>
                                                        <div class="chat-date">26 мар. 2018 г.</div>
                                                        <div class="chat-message">
                                                            <span class="icon-in_m"></span>
                                                            <p>The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing The complexity of mining crypto currency is growing</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list-setting-massage">
                                                    <button class="favorite-btn">
                                                        <span class="icon-star"></span>
                                                        <span class="icon-star-active"></span>
                                                    </button>
                                                    <button class="blocked-btn">
                                                        <span class="icon-block"></span>
                                                    </button>
                                                    <button class="delete-btn">
                                                        <span class="icon-delete"></span>
                                                    </button>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="right-chat">
                            <div class="chanel-screen groupe-block">
                                <div class="chanel-screen-content">
                                    <div class="head-chanel">
                                        <a href="#" class="back-link-chat new_c">
                                            <span class="icon-arrow_left-small"></span>
                                            Новый Канал
                                        </a>
                                    </div>
                                    <div class="chanel-info">
                                        <div class="icon-chanel-info">
                                            <img src="/images/chat.svg" alt="">
                                        </div>
                                        <h4>Что Такое группа?</h4>
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                            laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                            beatae vitae dicta sunt explicabo. </p>
                                        <div class="btn-chanel">
                                            <button class="btn btn-hover btn-primary">
                                                Создать Группу
                                                <span></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="chanel-screen chanel-block">
                                <div class="chanel-screen-content">
                                    <div class="head-chanel">
                                        <a href="#" class="back-link-chat new_g">
                                            <span class="icon-arrow_left-small"></span>
                                            Новая Группа
                                        </a>
                                    </div>
                                    <div class="chanel-info">
                                        <div class="icon-chanel-info">
                                            <img src="/images/message-chanel.svg" alt="">
                                        </div>
                                        <h4>Что Такое канал?</h4>
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                            laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                            beatae vitae dicta sunt explicabo. </p>
                                        <div class="btn-chanel">
                                            <button class="btn btn-hover btn-primary">
                                                Создать Канал
                                                <span></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tabs-chat-wrapper">
                                <div class="chat-content-item show" id="chat1">
                                    <div class="head-chat-content">
                                        <h4>Переписка с <strong>Alexandr</strong></h4>
                                    </div>
                                    <div class="body-chat-content">
                                        <div class="body-chat-scroll" data-simplebar data-simplebar-auto-hide="false">
                                            <div class="body-chat-content-inner">
                                                <div class="chat-row date-message-row">
                                                    <span>26 мар. 2018 г.</span>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer-chat">
                                        <form action="#">
                                            <div class="message-field">
                                                <textarea name="" cols="30" rows="10" placeholder="Введите сообщение"></textarea>
                                                <button type="submit" class="send-btn"><span class="icon-telegram"></span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="chat-content-item" id="chat2">
                                    <div class="head-chat-content">
                                        <h4>Переписка с <strong>Alexandr</strong></h4>
                                    </div>
                                    <div class="body-chat-content">
                                        <div class="body-chat-scroll" data-simplebar data-simplebar-auto-hide="false">
                                            <div class="body-chat-content-inner">
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer-chat">
                                        <form action="#">
                                            <div class="message-field">
                                                <textarea name="" cols="30" rows="10" placeholder="Введите сообщение"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="chat-content-item" id="chat3">
                                    <div class="head-chat-content">
                                        <h4>Переписка с <strong>Alexandr</strong></h4>
                                    </div>
                                    <div class="body-chat-content">
                                        <div class="body-chat-scroll" data-simplebar data-simplebar-auto-hide="false">
                                            <div class="body-chat-content-inner">
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer-chat">
                                        <form action="#">
                                            <div class="message-field">
                                                <textarea name="" cols="30" rows="10" placeholder="Введите сообщение"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="chat-content-item" id="chat4">
                                    <div class="head-chat-content">
                                        <h4>Переписка с <strong>Alexandr</strong></h4>
                                    </div>
                                    <div class="body-chat-content">
                                        <div class="body-chat-scroll" data-simplebar data-simplebar-auto-hide="false">
                                            <div class="body-chat-content-inner">
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer-chat">
                                        <form action="#">
                                            <div class="message-field">
                                                <textarea name="" cols="30" rows="10" placeholder="Введите сообщение"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="chat-content-item" id="chat5">
                                    <div class="head-chat-content">
                                        <h4>Переписка с <strong>Alexandr</strong></h4>
                                    </div>
                                    <div class="body-chat-content">
                                        <div class="body-chat-scroll" data-simplebar data-simplebar-auto-hide="false">
                                            <div class="body-chat-content-inner">
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer-chat">
                                        <form action="#">
                                            <div class="message-field">
                                                <textarea name="" cols="30" rows="10" placeholder="Введите сообщение"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="chat-content-item" id="chat6">
                                    <div class="head-chat-content">
                                        <h4>Переписка с <strong>Alexandr</strong></h4>
                                    </div>
                                    <div class="body-chat-content">
                                        <div class="body-chat-scroll" data-simplebar data-simplebar-auto-hide="false">
                                            <div class="body-chat-content-inner">
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer-chat">
                                        <form action="#">
                                            <div class="message-field">
                                                <textarea name="" cols="30" rows="10" placeholder="Введите сообщение"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="chat-content-item" id="chat7">
                                    <div class="head-chat-content">
                                        <h4>Переписка с <strong>Alexandr</strong></h4>
                                    </div>
                                    <div class="body-chat-content">
                                        <div class="body-chat-scroll" data-simplebar data-simplebar-auto-hide="false">
                                            <div class="body-chat-content-inner">
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer-chat">
                                        <form action="#">
                                            <div class="message-field">
                                                <textarea name="" cols="30" rows="10" placeholder="Введите сообщение"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="chat-content-item" id="chat8">
                                    <div class="head-chat-content">
                                        <h4>Переписка с <strong>Alexandr</strong></h4>
                                    </div>
                                    <div class="body-chat-content">
                                        <div class="body-chat-scroll" data-simplebar data-simplebar-auto-hide="false">
                                            <div class="body-chat-content-inner">
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer-chat">
                                        <form action="#">
                                            <div class="message-field">
                                                <textarea name="" cols="30" rows="10" placeholder="Введите сообщение"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="chat-content-item" id="chat9">
                                    <div class="head-chat-content">
                                        <h4>Переписка с <strong>Alexandr</strong></h4>
                                    </div>
                                    <div class="body-chat-content">
                                        <div class="body-chat-scroll" data-simplebar data-simplebar-auto-hide="false">
                                            <div class="body-chat-content-inner">
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer-chat">
                                        <form action="#">
                                            <div class="message-field">
                                                <textarea name="" cols="30" rows="10" placeholder="Введите сообщение"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="chat-content-item" id="chat10">
                                    <div class="head-chat-content">
                                        <h4>Переписка с <strong>Alexandr</strong></h4>
                                    </div>
                                    <div class="body-chat-content">
                                        <div class="body-chat-scroll" data-simplebar data-simplebar-auto-hide="false">
                                            <div class="body-chat-content-inner">
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer-chat">
                                        <form action="#">
                                            <div class="message-field">
                                                <textarea name="" cols="30" rows="10" placeholder="Введите сообщение"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="chat-content-item" id="chat11">
                                    <div class="head-chat-content">
                                        <h4>Переписка с <strong>Alexandr</strong></h4>
                                    </div>
                                    <div class="body-chat-content">
                                        <div class="body-chat-scroll" data-simplebar data-simplebar-auto-hide="false">
                                            <div class="body-chat-content-inner">
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer-chat">
                                        <form action="#">
                                            <div class="message-field">
                                                <textarea name="" cols="30" rows="10" placeholder="Введите сообщение"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="chat-content-item" id="chat12">
                                    <div class="head-chat-content">
                                        <h4>Переписка с <strong>Alexandr</strong></h4>
                                    </div>
                                    <div class="body-chat-content">
                                        <div class="body-chat-scroll" data-simplebar data-simplebar-auto-hide="false">
                                            <div class="body-chat-content-inner">
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer-chat">
                                        <form action="#">
                                            <div class="message-field">
                                                <textarea name="" cols="30" rows="10" placeholder="Введите сообщение"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="chat-content-item" id="chat13">
                                    <div class="head-chat-content">
                                        <h4>Переписка с <strong>Alexandr</strong></h4>
                                    </div>
                                    <div class="body-chat-content">
                                        <div class="body-chat-scroll" data-simplebar data-simplebar-auto-hide="false">
                                            <div class="body-chat-content-inner">
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer-chat">
                                        <form action="#">
                                            <div class="message-field">
                                                <textarea name="" cols="30" rows="10" placeholder="Введите сообщение"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="chat-content-item" id="chat14">
                                    <div class="head-chat-content">
                                        <h4>Переписка с <strong>Alexandr</strong></h4>
                                    </div>
                                    <div class="body-chat-content">
                                        <div class="body-chat-scroll" data-simplebar data-simplebar-auto-hide="false">
                                            <div class="body-chat-content-inner">
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer-chat">
                                        <form action="#">
                                            <div class="message-field">
                                                <textarea name="" cols="30" rows="10" placeholder="Введите сообщение"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="chat-content-item" id="chat15">
                                    <div class="head-chat-content">
                                        <h4>Переписка с <strong>Alexandr</strong></h4>
                                    </div>
                                    <div class="body-chat-content">
                                        <div class="body-chat-scroll" data-simplebar data-simplebar-auto-hide="false">
                                            <div class="body-chat-content-inner">
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer-chat">
                                        <form action="#">
                                            <div class="message-field">
                                                <textarea name="" cols="30" rows="10" placeholder="Введите сообщение"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="chat-content-item" id="chat16">
                                    <div class="head-chat-content">
                                        <h4>Переписка с <strong>Alexandr</strong></h4>
                                    </div>
                                    <div class="body-chat-content">
                                        <div class="body-chat-scroll" data-simplebar data-simplebar-auto-hide="false">
                                            <div class="body-chat-content-inner">
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer-chat">
                                        <form action="#">
                                            <div class="message-field">
                                                <textarea name="" cols="30" rows="10" placeholder="Введите сообщение"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="chat-content-item" id="chat17">
                                    <div class="head-chat-content">
                                        <h4>Переписка с <strong>Alexandr</strong></h4>
                                    </div>
                                    <div class="body-chat-content">
                                        <div class="body-chat-scroll" data-simplebar data-simplebar-auto-hide="false">
                                            <div class="body-chat-content-inner">
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer-chat">
                                        <form action="#">
                                            <div class="message-field">
                                                <textarea name="" cols="30" rows="10" placeholder="Введите сообщение"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="chat-content-item" id="chat18">
                                    <div class="head-chat-content">
                                        <h4>Переписка с <strong>Alexandr</strong></h4>
                                    </div>
                                    <div class="body-chat-content">
                                        <div class="body-chat-scroll" data-simplebar data-simplebar-auto-hide="false">
                                            <div class="body-chat-content-inner">
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer-chat">
                                        <form action="#">
                                            <div class="message-field">
                                                <textarea name="" cols="30" rows="10" placeholder="Введите сообщение"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="chat-content-item" id="chat19">
                                    <div class="head-chat-content">
                                        <h4>Переписка с <strong>Alexandr</strong></h4>
                                    </div>
                                    <div class="body-chat-content">
                                        <div class="body-chat-scroll" data-simplebar data-simplebar-auto-hide="false">
                                            <div class="body-chat-content-inner">
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer-chat">
                                        <form action="#">
                                            <div class="message-field">
                                                <textarea name="" cols="30" rows="10" placeholder="Введите сообщение"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="chat-content-item" id="chat20">
                                    <div class="head-chat-content">
                                        <h4>Переписка с <strong>Alexandr</strong></h4>
                                    </div>
                                    <div class="body-chat-content">
                                        <div class="body-chat-scroll" data-simplebar data-simplebar-auto-hide="false">
                                            <div class="body-chat-content-inner">
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="/images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer-chat">
                                        <form action="#">
                                            <div class="message-field">
                                                <textarea name="" cols="30" rows="10" placeholder="Введите сообщение"></textarea>
                                            </div>
                                        </form>
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
<div class="modal-wrapper bet-modal modal-945" id="modal-add-prognoz">
    <div class="modal-inner">
        <div class="modal-content">
            <div class="modal-content-inner">
                <div class="header-modal">
                    <button class="close" data-toggle="modal-dismiss"><span class="icon-close2"></span></button>
                </div>
                <div class="body-modal">
                    <div class="add-bet-inner">
                        <div class="title-modal">
                            <h2>Новый Прогноз</h2>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                                ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas
                                sit aspernatur aut odit aut fugit, sed quia consequuntur</p>
                        </div>
                        <div class="form-add-bet">
                            <form action="#">
                                <div class="field-set-add-bet">
                                    <div class="row">
                                        <div class="input-row column-6">
                                            <div class="input-row-inner">
                                                <select name="тип " class="single-select">
                                                    <option value="1">Экспресс</option>
                                                    <option value="1">Экспресс 2</option>
                                                    <option value="1">Экспресс 3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="input-row column-6">
                                            <div class="input-row-inner">
                                                <select name="Букмекер" class="single-select">
                                                    <option value="1">Букмекер</option>
                                                    <option value="1">Букмекер 2</option>
                                                    <option value="1">Букмекер 3</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="event-block">
                                        <div class="event-item">
                                            <div class="row delete-row">
                                                <div class="column-12">
                                                    <a href="#" class="delete-event">- Удалить</a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-row column-6">
                                                    <div class="input-row-inner">
                                                        <select name="Вид спорта" class="single-select">
                                                            <option value="1">Вид спорта</option>
                                                            <option value="1">Вид спорта 2</option>
                                                            <option value="1">Вид спорта 3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="input-row column-6">
                                                    <div class="input-row-inner">
                                                        <div class="custom-dropdown">
                                                            <div class="custom-dropdown-inner">
                                                                <div class="val-drop">
                                                                    <button class="val-drop-btn">Плейлист #A</button>
                                                                </div>
                                                                <div class="dropdown-list">
                                                                    <div class="play-list">
                                                                        <div class="drop-item">
                                                                            <div class="check-drop">
                                                                                <input name="playlist" type="radio" id="playlist1" checked="checked" value="Плейлист #A">
                                                                                <label for="playlist1">Плейлист #A</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="drop-item">
                                                                            <div class="check-drop">
                                                                                <input name="playlist" type="radio" id="playlist2" value="Лига Чемпионов">
                                                                                <label for="playlist2">Лига Чемпионов</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="drop-item">
                                                                            <div class="check-drop">
                                                                                <input name="playlist" type="radio" id="playlist3" value="НБА">
                                                                                <label for="playlist3">НБА</label>
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
                                        </div>
                                    </div>
                                    <div class="row add-event-row">
                                        <div class="column-12">
                                            <div class="add-event-btn-wrap">
                                                <a href="#" class="add-event-btn">+   Добавить Событие</a>
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
                                    <div class="row btn-row">
                                        <div class="input-row column-12">
                                            <div class="input-row-inner text-center">
                                                <button class="btn btn-hover btn-primary">Дать Прогноз</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
                                        <div class="radio-row">
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
                                                        <img src="/images/s1.svg" alt="">
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
                                                        <img src="/images/s2.svg" alt="">
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
                                                        <img src="/images/s3.svg" alt="">
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
                                                        <img src="/images/s3.svg" alt="">
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
                                                        <img src="/images/s3.svg" alt="">
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
                                                        <img src="/images/s3.svg" alt="">
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
                                                        <img src="/images/s3.svg" alt="">
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
                                                        <img src="/images/s3.svg" alt="">
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
                                                        <img src="/images/s3.svg" alt="">
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
                                                        <img src="/images/s3.svg" alt="">
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
                                                        <img src="/images/s3.svg" alt="">
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
                                                        <img src="/images/s3.svg" alt="">
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
                                                        <img src="/images/s3.svg" alt="">
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
                                        <img src="/images/ava3.png" alt="">
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
                                        <img src="/images/ava1.png" alt="">
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
                                        <img src="/images/ava5.png" alt="">
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
                                        <img src="/images/ava1.png" alt="">
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
<!--Модальное окно Показать Экспресс-->
<div class="modal-wrapper bet-modal modal-860" id="bet20">
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
                                        <img src="/images/ava1.png" alt="">
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
                                    <div class="text-bets-title">Итоговый коэффициент</div>
                                    <div class="text-bets-val">x 21.02</div>
                                </div>
                                <div class="static-footer-bets">
                                    <div class="static-footer-bets-title">Express</div>
                                    <div class="static-footer-bets-value">$250 - <span>14 %</span></div>
                                </div>
                            </div>
                            <div class="shared-block">
                                <div class="btn-shared">
                                    <button class="like"></button>
                                    <button class="shared">
                                        <span class="icon-network"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="status-more-bets">
                                <div class="status-more-bets-inner">
                                    <span class="icon-open"></span>
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


<script src="/js/script.min.js"></script>
</body>

