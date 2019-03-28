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





                </ul>
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

                                        <a href="#" id="openMadaInner2" class="btn big-btn btn-primary btn-hover"  data-toggle="modal-reg"  data-target="#modal-auth">
                                            <i class="icon-man"></i>
                                            Присоединиться
                                            <span></span>
                                        </a>
                                        <a href="<?=Url::toRoute(['/matches'])?>" class="btn big-btn btn-primary btn-hover" >
                                            <i class="icon-network"></i>
                                            Дать прогноз
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
                                                <iframe width="100%" src="https://www.youtube.com/embed/a6ZX88897cI?rel=0&amp;fs=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="column-4 video-text">
                                    <p>
                                        Look My Bet - первое и единственное сообщество в мире, созданное, как для новичков в мире ставок, так и для профессионалов.
                                        Наша идея продуманна и реализована так, чтобы принести максимальную пользу, как для людей для которых ставки и спортивный анализ занимает внушительную часть их жизни, так и для людей для ,которых данный вид деятельности является хобби или же началом каперского пути
                                    </p>
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
                                                    ТУРНИРЫ
                                                    <span></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" data-target="#tab2" class="btn-tab btn-hover">
                                                    <i class="icon-arrow_right"></i>
                                                    БЕСПЛАТНЫЕ ПРОГНОЗЫ
                                                    <span></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" data-target="#tab3" class="btn-tab btn-hover">
                                                    <i class="icon-arrow_right"></i>
                                                    ПРОЗРАЧНАЯ СТАТИСТИКА
                                                    <span></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" data-target="#tab4" class="btn-tab btn-hover">
                                                    <i class="icon-arrow_right"></i>
                                                    ПРОСТОТА И УДОБСТВО
                                                    <span></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" data-target="#tab5" class="btn-tab btn-hover">
                                                    <i class="icon-arrow_right"></i>
                                                    ШИРОКИЕ ВОЗМОЖНОСТИ
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
                                                    ТУРНИРЫ
                                                    <i class="icon-arrow_down"></i>
                                                </h4>
                                            </div>
                                            <div class="tab-panel-inner">


                                                <p>  Хорошо разбираешься в ставках на спорт?</p>
                                                <p>  Чувствуешь в себе силы посостязаться с другими?</p>
                                                <p>  Тогда ты там, где нужно.</p>
                                                <p>  У нас ты имеешь уникальную возможность заработать на ставках, при этом ничего не вложив. Каждую неделю ты можешь участвовать в турнирах и побороться за 25 000 руб.</p>

                                            </div>
                                        </div>
                                        <div class="tab-panel" id="tab2">
                                            <div class="toggle-tabs-mobile">
                                                <h4 class="h2">
                                                    БЕСПЛАТНЫЕ ПРОГНОЗЫ
                                                    <i class="icon-arrow_down"></i>
                                                </h4>
                                            </div>
                                            <div class="tab-panel-inner">


                                                <p>Надоели постоянные впаривания платных прогнозов, непонятных закрытых групп?</p>
                                                <p>Здесь ты обретёшь то, чего нет ни на одной площадке.</p>
                                                <p>Ежедневно, лучшие аналитики будут публиковать свои прогнозы абсолютно бесплатно.</p>
                                                <p>Твоя задача, найти себе подходящего аналитика и подписаться на него.</p>

                                            </div>
                                        </div>
                                        <div class="tab-panel" id="tab3">
                                            <div class="toggle-tabs-mobile">
                                                <h4 class="h2">
                                                    ПРОЗРАЧНАЯ СТАТИСТИКА
                                                    <i class="icon-arrow_down"></i>
                                                </h4>
                                            </div>
                                            <div class="tab-panel-inner">


                                                <p>Я делаю 1500% каждый месяц, у меня ни одного проигрышного прогноза, знакомо?<p>
                                                <p>Наша площадка позволит навсегда забыть об этом.<p>
                                                <p>Все дело в открытой статистике и мошенник попросту не сможет обмануть человека из-за статистики, которая находится в общем доступе.<p>
                                            </div>
                                        </div>
                                        <div class="tab-panel" id="tab4">
                                            <div class="toggle-tabs-mobile">
                                                <h4 class="h2">
                                                    ПРОСТОТА И УДОБСТВО
                                                    <i class="icon-arrow_down"></i>
                                                </h4>
                                            </div>
                                            <div class="tab-panel-inner">
                                               <p> Все что тебе нужно - это просто зарегестрироваться.</p>
                                               <p> Нет никакой воды. Не нужно ломать себе голову и придумывать объяснение ставки.</p>
                                               <p> Ищешь грамотных людей в этой сфере?</p>
                                               <p> Просто подпишись на рассылку и все.</p>
                                               <p> Нет никого в окружении кто бы интересовался твоим хобби?</p>
                                              <p> Так же не проблема, наша социальная сеть в твоём распоряжении.</p>
                                               <p> Находи друзей, обсуждает предстоящие матчи и не только.</p>
                                               <p> Для регистрации в турнире нужно всего лишь дать первую ставку.</p>
                                            </div>
                                        </div>
                                        <div class="tab-panel" id="tab5">
                                            <div class="toggle-tabs-mobile">
                                                <h4 class="h2">
                                                    ШИРОКИЕ ВОЗМОЖНОСТИ
                                                    <i class="icon-arrow_down"></i>
                                                </h4>
                                            </div>
                                            <div class="tab-panel-inner">

                                               <p> Площадка создавалась с предпочтениями абсолютно каждого человека.</p>
                                               <p> Профи смогут участвовать в турнирах и бороться за денежный приз.</p>
                                               <p> Есть возможность предоставление свои лучших прогнозов для ограниченного количества пользователей.</p>
                                              <p>  Игроки среднего уровня и новички без особых проблем найдут себе профессионалов и будут следовать их советам и пользоваться их прогнозами.</p>
                                              <p>  Отслеживай успешность своих ставках по видам спорта, чемпионатам, исходам и по многим другим показателям.</p>
                                             </div>
                                        </div>
                                    </div>



                                </div>
                                <div class="column-12 btn-block">

                                    <?php   if(Yii::$app->user->isGuest) { ?>
                                    <a href="#" class="btn-round btn-primary" data-toggle="modal-reg" data-target="#modal-auth">
                                        <span class="icon-man"></span>
                                    </a>
                                    <?php } ?>
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

                                    <?php   if(Yii::$app->user->isGuest) { ?>
                                    <a href="#" class="btn-round btn-primary" data-toggle="modal-reg" data-target="#modal-auth">
                                        <span class="icon-man"></span>
                                    </a>
                                    <div class="arrow-review"></div>
                                    <?php } ?>
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

                            <?php   if(Yii::$app->user->isGuest) { ?>
                            <a href="#" class="user-btn" data-toggle="modal-reg" data-target="#modal-auth">
                                <span class="icon-man"></span>
                            </a>
                            <?php } ?>
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
