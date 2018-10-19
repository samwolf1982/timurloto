<?php

use app\copmonents\widgets\showuser\ShowuserWidget;
use dektrium\user\widgets\Connect;
use frontend\assets\MainAsset;
use yii\helpers\Url;

$this->title='LOOK MY BET';

MainAsset::register($this);
?>

<body class="home-page">
<header class="header-main">
    <div class="header-inner">
        <div class="logo-block">
            <a href="/">
                <img src="images/logo.svg" alt="Look My bet">
            </a>
        </div>
        <div class="menu-block">
            <div class="menu-inner">
                <ul class="top-menu" id="menu-slide">
                    <li data-menuanchor="textScreen">
                        <a href="#textScreen"><span class="icon-play"></span> Видео</a>
                    </li>
                    <li data-menuanchor="aboutScreen">
                        <a href="#aboutScreen">О Проекте</a>
                    </li>
                    <li data-menuanchor="reviewScreen">
                        <a href="#reviewScreen">Отзывы</a>
                    </li>

                    <li data-menuanchor="reviewScreen">
                        <a href="<?=Url::to('/dashboard')?>">Дать прогноз</a>
                    </li>



                </ul>
            </div>
        </div>



<!--   вход выход  пользователя   -->
        <?= ShowuserWidget::widget(['userdata' => [],'view'=>'index']) ?>



    </div>
</header>
<div class="home-page-wrapper">
    <div class="main-background">
        <div id="scene">
            <div data-depth="0.2" class="background-image" style="background-image: url(images/back-body.jpg)"></div>
        </div>
    </div>
    <div class="home-page-inner">
        <div class="pagination-wrapper">
            <div class="pagination-inner">
                <div class="block-screen-count">
                    <div class="active-screen">
                        0<span>1</span>
                    </div>
                </div>
                <div class="line-pagination">
                    <ul class="line-list" id="nav-line">
                        <li class="active"><a href="#mainScreen" data-index="1"></a></li>
                        <li><a href="#textScreen" data-index="2"></a></li>
                        <li><a href="#aboutScreen" data-index="3"></a></li>
                        <li><a href="#reviewScreen" data-index="4"></a></li>
                    </ul>
                </div>
                <div class="block-screen-count">
                    <div class="total-screen">
                        0<span>4</span>
                    </div>
                </div>
            </div>
        </div>
        <div id="home-scroll">
            <div class="section first-screen">
                <div class="content-block">
                    <div class="content-block-inner">
                        <div class="content-container">
                            <div class="row">
                                <div class="active image-first-screen">
                                    <img class="next-particle"
                                         id="logo"
                                         data-mouse-force="300"
                                         data-width="1200"
                                         data-height="1200"
                                         data-max-width="70%"
                                         data-particle-gap="6"
                                         src="images/logo-big.png" alt="">
                                </div>
                                <div class="column-12">
                                    <h1 class="h1">Первая социальная сеть в СНГ <br>для любителей ставок на спорт</h1>
                                    <p>Создай команду единомышленников и зарабатывай</p>
                                    <?php   if(Yii::$app->user->isGuest) { ?>
                                    <div class="button-block">
                                        <a href="#" class="btn big-btn btn-primary btn-hover" data-toggle="modal" data-target="#modal-auth">
                                            <i class="icon-man"></i>
                                            Присоединиться
                                            <span></span>
                                        </a>
                                        <a href="#" class="btn big-btn btn-default btn-hover" data-toggle="modal" data-target="#modal-auth">
                                            <i class="icon-network"></i>
                                            Войти Через Соцсеть
                                            <span></span>
                                        </a>
                                    </div>
                                    <?php   } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section video-section">
                <div class="content-block">
                    <div class="content-block-inner">
                        <!--<div class="image-background-section image-two-screen image-background-section-2" style="background-image: url(images/football_img.jpg)"></div>-->
                        <!--<div class="back-two-slide-wrapepr">-->
                        <!--<div class="back-two-slide">-->
                        <!--<div class="image-back" style="background-image: url(images/football_img.jpg)"></div>-->
                        <!--</div>-->
                        <!--</div>-->
                        <div class="content-container">
                            <div class="row">
                                <div class="column-6">
                                    <div class="play-video-block">
                                        <div class="video-wrapper">
                                            <div class="video-wrapper-border">
                                                <span class="left-top"></span>
                                                <span class="left-bottom"></span>
                                                <span class="right-bottom"></span>
                                                <span class="right-top"></span>
                                                <iframe width="100%" src="https://www.youtube.com/embed/Hbd8ghFICJk?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="column-4 video-text">
                                    <p>The complexity of mining crypto currency is growing rapidly, and many
                                        crypto-currencies initially use POS or plan to switch to POW instead.
                                        The financial well-being of miners is under threat.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section section-about">
                <div class="content-block">
                    <div class="content-block-inner">
                        <div class="content-container">
                            <div class="row">
                                <div class="column-12">
                                    <h2 class="h1">О проекте</h2>
                                </div>
                                <div class="column-3">
                                    <div class="tab-list">
                                        <ul class="tab">
                                            <li class="active">
                                                <a href="#" data-target="#tab1" class="btn-tab btn-hover">
                                                    <i class="icon-arrow_right"></i>
                                                    Как Пользоваться?
                                                    <span></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" data-target="#tab2" class="btn-tab btn-hover">
                                                    <i class="icon-arrow_right"></i>
                                                    общение
                                                    <span></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" data-target="#tab3" class="btn-tab btn-hover">
                                                    <i class="icon-arrow_right"></i>
                                                    заработок
                                                    <span></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" data-target="#tab4" class="btn-tab btn-hover">
                                                    <i class="icon-arrow_right"></i>
                                                    контроль
                                                    <span></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="column-6">
                                    <div class="tab-content">
                                        <div class="tab-panel active" id="tab1">
                                            <div class="toggle-tabs-mobile active">
                                                <h4 class="h2">
                                                    Как Пользоваться?
                                                    <i class="icon-arrow_down"></i>
                                                </h4>
                                            </div>
                                            <div class="tab-panel-inner">
                                                <p>
                                                    The complexity of mining crypto currency is growing rapidly, and many crypto-currencies
                                                    initially use POS or plan to switch to POW instead. The financial well-being of miners is under
                                                    threat.
                                                </p>
                                                <p>
                                                    MARK.SPACE means hundreds of thousands of high-end renders, which requires terabytes
                                                    of content to create. We have created a protocol for decentralized rendering and data
                                                    storage. Miners will be able to download our program to perform the rendering. For data
                                                    storage they will receive rewards in the form of MRK tokens. In addition, our ecosystem
                                                    implies a great number of transactions.
                                                </p>
                                                <p>
                                                    The complexity of mining crypto currency is growing rapidly, and many crypto-currencies
                                                    initially use POS or plan to switch to POW instead.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="tab-panel" id="tab2">
                                            <div class="toggle-tabs-mobile">
                                                <h4 class="h2">
                                                    общение
                                                    <i class="icon-arrow_down"></i>
                                                </h4>
                                            </div>
                                            <div class="tab-panel-inner">
                                                <p>
                                                    The complexity of mining crypto currency is growing rapidly, and many crypto-currencies
                                                    initially use POS or plan to switch to POW instead. The financial well-being of miners is under
                                                    threat.
                                                </p>
                                                <p>
                                                    MARK.SPACE means hundreds of thousands of high-end renders, which requires terabytes
                                                    of content to create. We have created a protocol for decentralized rendering and data
                                                    storage. Miners will be able to download our program to perform the rendering. For data
                                                    storage they will receive rewards in the form of MRK tokens. In addition, our ecosystem
                                                    implies a great number of transactions.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="tab-panel" id="tab3">
                                            <div class="toggle-tabs-mobile">
                                                <h4 class="h2">
                                                    заработок
                                                    <i class="icon-arrow_down"></i>
                                                </h4>
                                            </div>
                                            <div class="tab-panel-inner">
                                                <p>
                                                    The complexity of mining crypto currency is growing rapidly, and many crypto-currencies
                                                    initially use POS or plan to switch to POW instead. The financial well-being of miners is under
                                                    threat.
                                                </p>
                                                <p>
                                                    MARK.SPACE means hundreds of thousands of high-end renders, which requires terabytes
                                                    of content to create. We have created a protocol for decentralized rendering and data
                                                    storage. Miners will be able to download our program to perform the rendering. For data
                                                    storage they will receive rewards in the form of MRK tokens. In addition, our ecosystem
                                                    implies a great number of transactions.
                                                </p>
                                                <p>
                                                    The complexity of mining crypto currency is growing rapidly, and many crypto-currencies
                                                    initially use POS or plan to switch to POW instead.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="tab-panel" id="tab4">
                                            <div class="toggle-tabs-mobile">
                                                <h4 class="h2">
                                                    контроль
                                                    <i class="icon-arrow_down"></i>
                                                </h4>
                                            </div>
                                            <div class="tab-panel-inner">
                                                <p>
                                                    MARK.SPACE means hundreds of thousands of high-end renders, which requires terabytes
                                                    of content to create. We have created a protocol for decentralized rendering and data
                                                    storage. Miners will be able to download our program to perform the rendering. For data
                                                    storage they will receive rewards in the form of MRK tokens. In addition, our ecosystem
                                                    implies a great number of transactions.
                                                </p>
                                                <p>
                                                    The complexity of mining crypto currency is growing rapidly, and many crypto-currencies
                                                    initially use POS or plan to switch to POW instead.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="column-12 btn-block">
                                    <a href="#" class="btn-round btn-primary" data-toggle="modal" data-target="#modal-auth">
                                        <span class="icon-man"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                        <div class="item-rev">
                                            <div class="review-inner">
                                                <div class="avatar-block">
                                                    <div class="avatar">
                                                        <img src="images/ava1.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="text-review">
                                                    <h4>john.wick.49</h4>
                                                    <p>Уже 47 лет зависаю на look my bet. Очень крутая
                                                        социальная сеть, где можно заработать денег,
                                                        не рискуя своими.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-rev">
                                            <div class="review-inner">
                                                <div class="avatar-block">
                                                    <div class="avatar">
                                                        <img src="images/ava2.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="text-review">
                                                    <h4>john.wick.49</h4>
                                                    <p>Уже 47 лет зависаю на look my bet. Очень крутая
                                                        социальная сеть, где можно заработать денег,
                                                        не рискуя своими.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-rev">
                                            <div class="review-inner">
                                                <div class="avatar-block">
                                                    <div class="avatar">
                                                        <img src="images/ava3.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="text-review">
                                                    <h4>john.wick.49</h4>
                                                    <p>Уже 47 лет зависаю на look my bet. Очень крутая
                                                        социальная сеть, где можно заработать денег,
                                                        не рискуя своими.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-rev">
                                            <div class="review-inner">
                                                <div class="avatar-block">
                                                    <div class="avatar">
                                                        <img src="images/ava4.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="text-review">
                                                    <h4>john.wick.49</h4>
                                                    <p>Уже 47 лет зависаю на look my bet. Очень крутая
                                                        социальная сеть, где можно заработать денег,
                                                        не рискуя своими.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-rev">
                                            <div class="review-inner">
                                                <div class="avatar-block">
                                                    <div class="avatar">
                                                        <img src="images/ava3.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="text-review">
                                                    <h4>john.wick.49</h4>
                                                    <p>Уже 47 лет зависаю на look my bet. Очень крутая
                                                        социальная сеть, где можно заработать денег,
                                                        не рискуя своими.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-rev">
                                            <div class="review-inner">
                                                <div class="avatar-block">
                                                    <div class="avatar">
                                                        <img src="images/ava2.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="text-review">
                                                    <h4>john.wick.49</h4>
                                                    <p>Уже 47 лет зависаю на look my bet. Очень крутая
                                                        социальная сеть, где можно заработать денег,
                                                        не рискуя своими.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-rev">
                                            <div class="review-inner">
                                                <div class="avatar-block">
                                                    <div class="avatar">
                                                        <img src="images/ava1.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="text-review">
                                                    <h4>john.wick.49</h4>
                                                    <p>Уже 47 лет зависаю на look my bet. Очень крутая
                                                        социальная сеть, где можно заработать денег,
                                                        не рискуя своими.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-rev">
                                            <div class="review-inner">
                                                <div class="avatar-block">
                                                    <div class="avatar">
                                                        <img src="images/ava4.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="text-review">
                                                    <h4>john.wick.49</h4>
                                                    <p>Уже 47 лет зависаю на look my bet. Очень крутая
                                                        социальная сеть, где можно заработать денег,
                                                        не рискуя своими.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-rev">
                                            <div class="review-inner">
                                                <div class="avatar-block">
                                                    <div class="avatar">
                                                        <img src="images/ava1.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="text-review">
                                                    <h4>john.wick.49</h4>
                                                    <p>Уже 47 лет зависаю на look my bet. Очень крутая
                                                        социальная сеть, где можно заработать денег,
                                                        не рискуя своими.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-rev">
                                            <div class="review-inner">
                                                <div class="avatar-block">
                                                    <div class="avatar">
                                                        <img src="images/ava4.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="text-review">
                                                    <h4>john.wick.49</h4>
                                                    <p>Уже 47 лет зависаю на look my bet. Очень крутая
                                                        социальная сеть, где можно заработать денег,
                                                        не рискуя своими.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-rev">
                                            <div class="review-inner">
                                                <div class="avatar-block">
                                                    <div class="avatar">
                                                        <img src="images/ava3.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="text-review">
                                                    <h4>john.wick.49</h4>
                                                    <p>Уже 47 лет зависаю на look my bet. Очень крутая
                                                        социальная сеть, где можно заработать денег,
                                                        не рискуя своими.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-rev">
                                            <div class="review-inner">
                                                <div class="avatar-block">
                                                    <div class="avatar">
                                                        <img src="images/ava2.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="text-review">
                                                    <h4>john.wick.49</h4>
                                                    <p>Уже 47 лет зависаю на look my bet. Очень крутая
                                                        социальная сеть, где можно заработать денег,
                                                        не рискуя своими.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="column-12 btn-block">
                                    <a href="#" class="btn-round btn-primary" data-toggle="modal" data-target="#modal-auth">
                                        <span class="icon-man"></span>
                                    </a>
                                    <div class="arrow-review"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section footer-section fp-auto-height">
                <div class="footer-block">
                    <div class="content-container">
                        <div class="row">
                            <div class="column-12 text-err">
                                <div class="background-text">
                                    <div class="icon-18-plus"></div>
                                    <!--<button class="close-text"><span class="icon-close"></span></button>-->
                                    <p>Играйте ответственно. При признаках зависимости обратитесь к специалисту.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="main-footer">
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
                            <a href="#" class="user-btn" data-toggle="modal" data-target="#modal-auth">
                                <span class="icon-man"></span>
                            </a>
                            <a href="#" class="shared-btn">
                                <span class="icon-network"></span>
                            </a>
                        </div>
                        <div class="copy-footer">
                            <p>&copy; 2018 Look My Bet</p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</div>
<div class="fixed-footer">
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
        <div class="arrow-main-slider">
            <a href="#" class="arrow-down">
                <span class="icon-arrow_down"></span>
            </a>
            <a href="#" class="arrow-up">
                <span class="icon-arrow_up"></span>
            </a>
        </div>
    </div>
</div>



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
                            <iframe width="100%" src="https://www.youtube.com/embed/Hbd8ghFICJk?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
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
<script src="js/script.min.js"></script>

<div class="hidden">
    <?= Connect::widget([
        'baseAuthUrl' => ['/user/security/auth', 'success' => 'type1'],

    ]) ?>
</div>

</body>
