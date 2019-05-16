<?php

use app\copmonents\widgets\addbet\AddbetWidget;
use app\copmonents\widgets\showuser\ShowuserWidget;
use app\modules\statistic\widgets\LastBets;
use app\modules\statistic\widgets\LastWeekWinnersWidg;
use common\models\helpers\ConstantsHelper;
use common\models\helpers\HtmlGenerator;
use common\models\overiden\User;
use dvizh\cart\widgets\BuyButton;
use frontend\assets\BetAsset;
use frontend\assets\BetDinotableAsset;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\LinkPager;

BetAsset::register($this);
//BetDinotableAsset::register($this);
?>
<body class="home-page footer-login-page">

<header class="header-main front-header">
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
        <?php  if(Yii::$app->user->isGuest){   ?>
            <?= ShowuserWidget::widget(['userdata' => [],'view'=>'index']) ?>
        <?php }else{ ?>
            <?= ShowuserWidget::widget(['userdata' => [],'view'=>'other']) ?>
        <?php }  ?>




    </div>
</header>

<!--<div class="main-background">-->
<!--    <div id="scene">-->
<!--        <div data-depth="0.2" class="background-image" style="background-image: url(/images/bg-player.jpg)"></div>-->
<!--    </div>-->
<!--</div>-->
<div class="page-404-wrapper">
    <div class="page-404-inner">
        <div class="content-container">
            <?php if(1){ ?>
                <div class="content-404">
                    <div class="content-404-inner">
                        <h3 style="font-size: large; color: white;" class="text-center" >Мы уже работаем над этим</h3>
                        <div class="img-404">
                            <img class="img-responsive" style="display: initial;" src="/images/404.png" alt="404 error">
                        </div>
                        <?php if( Yii::$app->params['showErrorOnPage404'] ): ?>
                            <!--  отображение ошыбок на сайте только для администратора или быстрого дебага  -->
                            <div class="wraperrormessage">
                                <?= Yii::$app->errorHandler->exception; ?>
                            </div>
                        <?php endif; ?>
                        <div class="btn-404 text-center">
                            <a href="/matches" class="btn btn-primary btn-hover">
                                +  <i>Продолжить</i>
                                <span ></span>
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<div class="footer-404-wrapper">
    <?= $this->render('@app/views/layouts/footer');?>
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



<!-- modad add bet -->
<?= AddbetWidget ::widget([]); ?>







<div class="modal-wrapper video-modal" id="main-video">
    <div class="modal-inner">
        <button class="close" data-toggle="modal-dismiss"><span class="icon-close2"></span></button>
        <div class="modal-content">
            <div class="modal-content-inner">
                <div class="body-modal">
                    <div class="video-wrapper">
                        <div class="video-wrapper-border">
                            <span class="left-top"></span>
                            <span class="left-bottom"></span>
                            <span class="right-bottom"></span>
                            <span class="right-top"></span>
                            <?php if(0){ // for example ?>

                                <iframe width="100%" src="https://www.youtube.com/embed/Hbd8ghFICJk?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            <?php  } ?>
                            <iframe width="1280" height="720" src="https://www.youtube.com/embed/TxsqgQJLyi0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                        </div>
                    </div>



                    <div class="text-video-modal">
                        <h2>Первая социальная сеть в СНГ </h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto laborum libero ratione suscipit vitae? Amet dolores eaque minima, nesciunt optio quae quaerat rerum sit! Ab dolor eligendi illo ipsam tempore.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto laborum libero ratione suscipit vitae? Amet dolores eaque minima, nesciunt optio quae quaerat rerum sit! Ab dolor eligendi illo ipsam tempore.</p>
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
<script src="/js/script.min.js"></script>
</body>

