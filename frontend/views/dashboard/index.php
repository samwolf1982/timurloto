<?php

use app\copmonents\widgets\addbet\AddbetWidget;
use app\copmonents\widgets\dashboardcart\DashboardcartWidget;
use app\copmonents\widgets\dashboardcenter\DashboardcenterWidget;
use app\copmonents\widgets\dashboardgategory\DashboardgategoryWidget;
use app\copmonents\widgets\Dashboardpopular\DashboardpopularWidget;
use app\copmonents\widgets\showuser\ShowuserWidget;
use dvizh\cart\widgets\BuyButton;
use frontend\assets\DashboardAsset;

    DashboardAsset::register($this);
?>

<body class="home-page footer-login-page dasboard-page">
<header class="header-main front-header">
    <div class="header-inner">
        <div class="left-sidebar-btn">
            <button class="left-sidebar-trigger"><span class="icon-menu"></span></button>
        </div>
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

        <!--   вход выход  пользователя   -->
        <?= ShowuserWidget::widget(['userdata' => [],'view'=>'other']) ?>

    </div>


</header>

<div class="main-background">
    <div id="scene">
        <div data-depth="0.2" class="background-image" style="background-image: url(images/back-body.jpg)"></div>
    </div>
</div>
<button class="open-coupon">
    <i class="count-coup">0</i>
    <span class="icon-coupon"></span>
</button>
<div class="front-page-wrapper dashboard-page">
    <div class="front-page-inner">
        <div class="dashboard-bets">
            <div class="dashboard-bets-inner">
                <div class="dashboard-row">






                    <div class="dash-col dash-left-col">
                        <div class="overlay-sidebar"></div>
                        <button class="left-sidebar-close"><span class="icon-close2"></span></button>

                        <!--   популярные  как категория  -->
                        <?= DashboardpopularWidget::widget(['userdata' => []]) ?>


                        <!--   категории спорта -->
                        <?= DashboardgategoryWidget::widget(['userdata' => []]) ?>


                    </div>



                    <div class="dash-col dash-center-col">
                        <div class="content-center-col">


                            <div class="content-center-block">
                                <div class="head-pink">
                                    <h3>Топ Матчи</h3>
                                    <div class="arrows-carousel-nav" id="top-game"></div>
                                </div>
                                <div class="content-bg">
                                    <div class="top-carousel-wrapper">
                                        <div class="top-carousel">
                                            <div class="top-item">
                                                <div class="top-item-inner">
                                                    <div class="image-block" style="background-image: url(images/top-list-1.png)">
                                                        <div class="label-ligue">
                                                            <img src="images/ligue-img1.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="content-top-block" data-parents="ps1">
                                                        <div class="name-block">
                                                            <div class="b-icon-list">
                                                                <span class="icon-football"></span>
                                                            </div>
                                                            <a href="bet-dashboard-open.html" class="title-block">
                                                                <div class="title-placeholde">17 Сентября 19:30</div>
                                                                <div class="title-value">ПСЖ - Бенфика</div>
                                                            </a>
                                                        </div>
                                                        <div class="bets-info">
                                                            <ul class="bet-info-list">
                                                                <li>
                                                                    <button class="bet-parent-val-slider" data-id="id1" data-text="Победа">
                                                                        <span class="dark-text" data-team="ПСЖ">1</span>
                                                                        <span class="value-bet">2.20</span>
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button class="bet-parent-val-slider" data-id="id2" data-text="Ничья">
                                                                        <span class="dark-text" data-team="">X</span>
                                                                        <span class="value-bet">3.35</span>
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button class="bet-parent-val-slider" data-id="id3" data-text="Победа">
                                                                        <span class="dark-text" data-team="Бенфика">2</span>
                                                                        <span class="value-bet">3.35</span>
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="top-item">
                                                <div class="top-item-inner">
                                                    <div class="image-block" style="background-image: url(images/top-list-2.png)">
                                                        <div class="label-ligue">
                                                            <img src="images/ligue-img2.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="content-top-block" data-parents="ps2">
                                                        <div class="name-block">
                                                            <div class="b-icon-list">
                                                                <span class="icon-football"></span>
                                                            </div>
                                                            <a href="bet-dashboard-open.html" class="title-block">
                                                                <div class="title-placeholde">17 Сентября 19:30</div>
                                                                <div class="title-value">Лестер - Ливерпуль</div>
                                                            </a>
                                                        </div>
                                                        <div class="bets-info">
                                                            <ul class="bet-info-list">
                                                                <li>
                                                                    <button class="bet-parent-val-slider" data-id="id4" data-text="Победа">
                                                                        <span class="dark-text" data-team="Лестер">1</span>
                                                                        <span class="value-bet">2.20</span>
                                                                    </button>
                                                                </li>
                                                                <li><span class="dark-text">-</span></li>
                                                                <li>
                                                                    <button class="bet-parent-val-slider" data-id="id5" data-text="Победа">
                                                                        <span class="dark-text" data-team="Ливерпуль">2</span>
                                                                        <span class="value-bet">3.35</span>
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="top-item">
                                                <div class="top-item-inner">
                                                    <div class="image-block" style="background-image: url(images/top-list-3.png)">
                                                        <div class="label-ligue">
                                                            <img src="images/ligue-img3.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="content-top-block" data-parents="ps3">
                                                        <div class="name-block">
                                                            <div class="b-icon-list">
                                                                <span class="icon-football"></span>
                                                            </div>
                                                            <a href="bet-dashboard-open.html" class="title-block">
                                                                <div class="title-placeholde">17 Сентября 19:30</div>
                                                                <div class="title-value">Бавария - Шальке</div>
                                                            </a>
                                                        </div>
                                                        <div class="bets-info">
                                                            <ul class="bet-info-list">
                                                                <li>
                                                                    <button class="bet-parent-val-slider" data-id="id9" data-text="Победа">
                                                                        <span class="dark-text" data-team="Бавария">1</span>
                                                                        <span class="value-bet">2.20</span>
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button class="bet-parent-val-slider" data-id="id7" data-text="Ничья">
                                                                        <span class="dark-text" data-team="">X</span>
                                                                        <span class="value-bet">3.35</span>
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button class="bet-parent-val-slider" data-id="id8" data-text="Победа">
                                                                        <span class="dark-text" data-team="Шальке">2</span>
                                                                        <span class="value-bet">3.35</span>
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="top-item">
                                                <div class="top-item-inner">
                                                    <div class="image-block" style="background-image: url(images/top-list-1.png)">
                                                        <div class="label-ligue">
                                                            <img src="images/ligue-img1.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="content-top-block" data-parents="ps1">
                                                        <div class="name-block">
                                                            <div class="b-icon-list">
                                                                <span class="icon-football"></span>
                                                            </div>
                                                            <a href="bet-dashboard-open.html" class="title-block">
                                                                <div class="title-placeholde">17 Сентября 19:30</div>
                                                                <div class="title-value">ПСЖ - Бенфика</div>
                                                            </a>
                                                        </div>
                                                        <div class="bets-info">
                                                            <ul class="bet-info-list">
                                                                <li>
                                                                    <button class="bet-parent-val-slider" data-id="id1" data-text="Победа">
                                                                        <span class="dark-text" data-team="ПСЖ">1</span>
                                                                        <span class="value-bet">2.20</span>
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button class="bet-parent-val-slider" data-id="id2" data-text="Ничья">
                                                                        <span class="dark-text" data-team="">X</span>
                                                                        <span class="value-bet">3.35</span>
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button class="bet-parent-val-slider" data-id="id3" data-text="Победа">
                                                                        <span class="dark-text" data-team="Бенфика">2</span>
                                                                        <span class="value-bet">3.35</span>
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="top-item">
                                                <div class="top-item-inner">
                                                    <div class="image-block" style="background-image: url(images/top-list-2.png)">
                                                        <div class="label-ligue">
                                                            <img src="images/ligue-img2.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="content-top-block" data-parents="ps2">
                                                        <div class="name-block">
                                                            <div class="b-icon-list">
                                                                <span class="icon-football"></span>
                                                            </div>
                                                            <a href="bet-dashboard-open.html" class="title-block">
                                                                <div class="title-placeholde">17 Сентября 19:30</div>
                                                                <div class="title-value">Лестер - Ливерпуль</div>
                                                            </a>
                                                        </div>
                                                        <div class="bets-info">
                                                            <ul class="bet-info-list">
                                                                <li>
                                                                    <button class="bet-parent-val-slider" data-id="id4" data-text="Победа">
                                                                        <span class="dark-text" data-team="Лестер">1</span>
                                                                        <span class="value-bet">2.20</span>
                                                                    </button>
                                                                </li>
                                                                <li><span class="dark-text">-</span></li>
                                                                <li>
                                                                    <button class="bet-parent-val-slider" data-id="id5" data-text="Победа">
                                                                        <span class="dark-text" data-team="Ливерпуль">2</span>
                                                                        <span class="value-bet">3.35</span>
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="top-item">
                                                <div class="top-item-inner">
                                                    <div class="image-block" style="background-image: url(images/top-list-3.png)">
                                                        <div class="label-ligue">
                                                            <img src="images/ligue-img3.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="content-top-block" data-parents="ps3">
                                                        <div class="name-block">
                                                            <div class="b-icon-list">
                                                                <span class="icon-football"></span>
                                                            </div>
                                                            <a href="bet-dashboard-open.html" class="title-block">
                                                                <div class="title-placeholde">17 Сентября 19:30</div>
                                                                <div class="title-value">Бавария - Шальке</div>
                                                            </a>
                                                        </div>
                                                        <div class="bets-info">
                                                            <ul class="bet-info-list">
                                                                <li>
                                                                    <button class="bet-parent-val-slider" data-id="id9" data-text="Победа">
                                                                        <span class="dark-text" data-team="Бавария">1</span>
                                                                        <span class="value-bet">2.20</span>
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button class="bet-parent-val-slider" data-id="id7" data-text="Ничья">
                                                                        <span class="dark-text" data-team="">X</span>
                                                                        <span class="value-bet">3.35</span>
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button class="bet-parent-val-slider" data-id="id8" data-text="Победа">
                                                                        <span class="dark-text" data-team="Шальке">2</span>
                                                                        <span class="value-bet">3.35</span>
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="top-item">
                                                <div class="top-item-inner">
                                                    <div class="image-block" style="background-image: url(images/top-list-1.png)">
                                                        <div class="label-ligue">
                                                            <img src="images/ligue-img1.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="content-top-block" data-parents="ps1">
                                                        <div class="name-block">
                                                            <div class="b-icon-list">
                                                                <span class="icon-football"></span>
                                                            </div>
                                                            <a href="bet-dashboard-open.html" class="title-block">
                                                                <div class="title-placeholde">17 Сентября 19:30</div>
                                                                <div class="title-value">ПСЖ - Бенфика</div>
                                                            </a>
                                                        </div>
                                                        <div class="bets-info">
                                                            <ul class="bet-info-list">
                                                                <li>
                                                                    <button class="bet-parent-val-slider" data-id="id1" data-text="Победа">
                                                                        <span class="dark-text" data-team="ПСЖ">1</span>
                                                                        <span class="value-bet">2.20</span>
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button class="bet-parent-val-slider" data-id="id2" data-text="Ничья">
                                                                        <span class="dark-text" data-team="">X</span>
                                                                        <span class="value-bet">3.35</span>
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button class="bet-parent-val-slider" data-id="id3" data-text="Победа">
                                                                        <span class="dark-text" data-team="Бенфика">2</span>
                                                                        <span class="value-bet">3.35</span>
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="top-item">
                                                <div class="top-item-inner">
                                                    <div class="image-block" style="background-image: url(images/top-list-2.png)">
                                                        <div class="label-ligue">
                                                            <img src="images/ligue-img2.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="content-top-block" data-parents="ps2">
                                                        <div class="name-block">
                                                            <div class="b-icon-list">
                                                                <span class="icon-football"></span>
                                                            </div>
                                                            <a href="bet-dashboard-open.html" class="title-block">
                                                                <div class="title-placeholde">17 Сентября 19:30</div>
                                                                <div class="title-value">Лестер - Ливерпуль</div>
                                                            </a>
                                                        </div>
                                                        <div class="bets-info">
                                                            <ul class="bet-info-list">
                                                                <li>
                                                                    <button class="bet-parent-val-slider" data-id="id4" data-text="Победа">
                                                                        <span class="dark-text" data-team="Лестер">1</span>
                                                                        <span class="value-bet">2.20</span>
                                                                    </button>
                                                                </li>
                                                                <li><span class="dark-text">-</span></li>
                                                                <li>
                                                                    <button class="bet-parent-val-slider" data-id="id5" data-text="Победа">
                                                                        <span class="dark-text" data-team="Ливерпуль">2</span>
                                                                        <span class="value-bet">3.35</span>
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="top-item">
                                                <div class="top-item-inner">
                                                    <div class="image-block" style="background-image: url(images/top-list-3.png)">
                                                        <div class="label-ligue">
                                                            <img src="images/ligue-img3.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="content-top-block" data-parents="ps3">
                                                        <div class="name-block">
                                                            <div class="b-icon-list">
                                                                <span class="icon-football"></span>
                                                            </div>
                                                            <a href="bet-dashboard-open.html" class="title-block">
                                                                <div class="title-placeholde">17 Сентября 19:30</div>
                                                                <div class="title-value">Бавария - Шальке</div>
                                                            </a>
                                                        </div>
                                                        <div class="bets-info">
                                                            <ul class="bet-info-list">
                                                                <li>
                                                                    <button class="bet-parent-val-slider" data-id="id9" data-text="Победа">
                                                                        <span class="dark-text" data-team="Бавария">1</span>
                                                                        <span class="value-bet">2.20</span>
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button class="bet-parent-val-slider" data-id="id7" data-text="Ничья">
                                                                        <span class="dark-text" data-team="">X</span>
                                                                        <span class="value-bet">3.35</span>
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button class="bet-parent-val-slider" data-id="id8" data-text="Победа">
                                                                        <span class="dark-text" data-team="Шальке">2</span>
                                                                        <span class="value-bet">3.35</span>
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="top-item">
                                                <div class="top-item-inner">
                                                    <div class="image-block" style="background-image: url(images/top-list-1.png)">
                                                        <div class="label-ligue">
                                                            <img src="images/ligue-img1.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="content-top-block" data-parents="ps1">
                                                        <div class="name-block">
                                                            <div class="b-icon-list">
                                                                <span class="icon-football"></span>
                                                            </div>
                                                            <a href="bet-dashboard-open.html" class="title-block">
                                                                <div class="title-placeholde">17 Сентября 19:30</div>
                                                                <div class="title-value">ПСЖ - Бенфика</div>
                                                            </a>
                                                        </div>
                                                        <div class="bets-info">
                                                            <ul class="bet-info-list">
                                                                <li>
                                                                    <button class="bet-parent-val-slider" data-id="id1" data-text="Победа">
                                                                        <span class="dark-text" data-team="ПСЖ">1</span>
                                                                        <span class="value-bet">2.20</span>
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button class="bet-parent-val-slider" data-id="id2" data-text="Ничья">
                                                                        <span class="dark-text" data-team="">X</span>
                                                                        <span class="value-bet">3.35</span>
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button class="bet-parent-val-slider" data-id="id3" data-text="Победа">
                                                                        <span class="dark-text" data-team="Бенфика">2</span>
                                                                        <span class="value-bet">3.35</span>
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="top-item">
                                                <div class="top-item-inner">
                                                    <div class="image-block" style="background-image: url(images/top-list-2.png)">
                                                        <div class="label-ligue">
                                                            <img src="images/ligue-img2.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="content-top-block" data-parents="ps2">
                                                        <div class="name-block">
                                                            <div class="b-icon-list">
                                                                <span class="icon-football"></span>
                                                            </div>
                                                            <a href="bet-dashboard-open.html" class="title-block">
                                                                <div class="title-placeholde">17 Сентября 19:30</div>
                                                                <div class="title-value">Лестер - Ливерпуль</div>
                                                            </a>
                                                        </div>
                                                        <div class="bets-info">
                                                            <ul class="bet-info-list">
                                                                <li>
                                                                    <button class="bet-parent-val-slider" data-id="id4" data-text="Победа">
                                                                        <span class="dark-text" data-team="Лестер">1</span>
                                                                        <span class="value-bet">2.20</span>
                                                                    </button>
                                                                </li>
                                                                <li><span class="dark-text">-</span></li>
                                                                <li>
                                                                    <button class="bet-parent-val-slider" data-id="id5" data-text="Победа">
                                                                        <span class="dark-text" data-team="Ливерпуль">2</span>
                                                                        <span class="value-bet">3.35</span>
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="top-item">
                                                <div class="top-item-inner">
                                                    <div class="image-block" style="background-image: url(images/top-list-3.png)">
                                                        <div class="label-ligue">
                                                            <img src="images/ligue-img3.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="content-top-block" data-parents="ps3">
                                                        <div class="name-block">
                                                            <div class="b-icon-list">
                                                                <span class="icon-football"></span>
                                                            </div>
                                                            <a href="bet-dashboard-open.html" class="title-block">
                                                                <div class="title-placeholde">17 Сентября 19:30</div>
                                                                <div class="title-value">Бавария - Шальке</div>
                                                            </a>
                                                        </div>
                                                        <div class="bets-info">
                                                            <ul class="bet-info-list">
                                                                <li>
                                                                    <button class="bet-parent-val-slider" data-id="id9" data-text="Победа">
                                                                        <span class="dark-text" data-team="Бавария">1</span>
                                                                        <span class="value-bet">2.20</span>
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button class="bet-parent-val-slider" data-id="id7" data-text="Ничья">
                                                                        <span class="dark-text" data-team="">X</span>
                                                                        <span class="value-bet">3.35</span>
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button class="bet-parent-val-slider" data-id="id8" data-text="Победа">
                                                                        <span class="dark-text" data-team="Шальке">2</span>
                                                                        <span class="value-bet">3.35</span>
                                                                    </button>
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



                            <!--   центральная часть -->
                            <?= DashboardcenterWidget::widget(['userdata' => []]) ?>

                        </div>
                    </div>






                    <div class="dash-col dash-right-col">

                        <!--   корзина -->
                        <?= DashboardcartWidget::widget(['userdata' => []]) ?>

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
                            <div class="shared-block">
                                <div class="btn-shared">
                                    <button class="like"></button>
                                    <button class="shared">
                                        <span class="icon-network"></span>
                                    </button>
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
                            <div class="shared-block">
                                <div class="btn-shared">
                                    <button class="like"></button>
                                    <button class="shared">
                                        <span class="icon-network"></span>
                                    </button>
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
                            <div class="shared-block">
                                <div class="btn-shared">
                                    <button class="like"></button>
                                    <button class="shared">
                                        <span class="icon-network"></span>
                                    </button>
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
                            <div class="shared-block">
                                <div class="btn-shared">
                                    <button class="like"></button>
                                    <button class="shared">
                                        <span class="icon-network"></span>
                                    </button>
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
<div class="modal-wrapper bet-modal modal-640" id="modal-success-bet">
    <div class="modal-inner">
        <div class="modal-content">
            <div class="modal-content-inner">
                <div class="header-modal">
                    <button class="close" data-toggle="modal-dismiss"><span class="icon-close2"></span></button>
                </div>
                <div class="body-modal">
                    <div class="choose-bet-wrapper">
                        <div class="choose-bet-inner">
                            <div class="success-bets">
                                <h4>Твой прогноз принят</h4>
                                <p>Поздравляем, теперь вы лучше Виктора Файзулина. <br> Ведь вы в игре!</p>
                                <div class="shared-bet-social">
                                    <h5>Поделитесь прогнозом</h5>
                                    <ul class="social">
                                        <li><a href="#"><span class="icon-fb"></span></a></li>
                                        <li><a href="#"><span class="icon-gp"></span></a></li>
                                        <li><a href="#"><span class="icon-tw"></span></a></li>
                                        <li><a href="#"><span class="icon-vk"></span></a></li>
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




<!--<script src="js/script.min.js"></script>-->
<!-- Клики на меню -->
<!--<script src="js/bet.js"></script>-->


</body>
