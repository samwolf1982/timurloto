<?php

use app\copmonents\widgets\addbet\AddbetWidget;
use app\copmonents\widgets\dashboardcart\DashboardcartWidget;
use app\copmonents\widgets\dashboardcenter\DashboardcenterWidget;
use app\copmonents\widgets\dashboardgategory\DashboardgategoryWidget;
use app\copmonents\widgets\dashboardpopular\DashboardpopularWidget;
use app\copmonents\widgets\dashboardtopmatch\DashboardtopmatchWidget;
use app\copmonents\widgets\showuser\ShowuserWidget;
use app\modules\statistic\assets\WidgetAsset;
use dektrium\user\widgets\Connect;
use dvizh\cart\widgets\BuyButton;
use frontend\assets\DashboardAsset;

    DashboardAsset::register($this);
    WidgetAsset::register($this);
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
        <?php  if(Yii::$app->user->isGuest){   ?>
            <?= ShowuserWidget::widget(['userdata' => [],'view'=>'index']) ?>
        <?php }else{ ?>
            <?= ShowuserWidget::widget(['userdata' => [],'view'=>'other']) ?>
        <?php }  ?>


    </div>


</header>

<div class="main-background">
    <div id="scene">
        <div data-depth="0.2" class="background-image" style="background-image: url(/images/back-body.jpg)"></div>
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



                            <!--   центральная часть топ матчи -->
                            <?= DashboardtopmatchWidget::widget(['userdata' => []]) ?>




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

<?= $this->render('@app/views/layouts/footer');?>



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
                                <h4>Ваш прогноз принят</h4>
                                <p class="hidden">Поздравляем, теперь вы лучше Виктора Файзулина. <br> Ведь вы в игре!</p>
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



<div class="hidden">
    <?= Connect::widget([
        'baseAuthUrl' => ['/user/security/auth'],
    ]) ?>
</div>
<!--<script src="js/script.min.js"></script>-->
<!-- Клики на меню -->
<!--<script src="js/bet.js"></script>-->


</body>
