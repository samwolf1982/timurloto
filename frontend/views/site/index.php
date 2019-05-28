<?php

use app\copmonents\widgets\commentusers\CommentusersWidget;
use app\copmonents\widgets\showuser\ShowuserWidget;
use dektrium\user\widgets\Connect;
use frontend\assets\MainAsset;
use yii\helpers\Url;

$this->title='LOOK MY BET';
MainAsset::register($this);
$showPointsEffect=false; // ефект для точек
?>

<body class="home-page">
<header class="header-main">
    <div class="header-inner">
        <div class="logo-block">
            <a href="/">
                <img src="/images/logo.svg" alt="Look My bet">
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

<?php    if ( $this->beginCache('__sitepage_',$cache_params)) { ?>
<div class="home-page-wrapper">
    <div class="main-background">
        <div id="scene">
            <div data-depth="0.2" class="background-image" style="background-image: url(/images/back-body.jpg)"></div>
        </div>
    </div>
    <div class="home-page-inner">
        <div class="pagination-wrapper">
            <div class="pagination-inner">
                <div class="line-pagination">
                    <ul class="line-list" id="nav-line">
                        <li class="active"><a href="#mainScreen" data-index="1"><span>01</span></a></li>
                        <li><a href="#textScreen" data-index="2"><span>02</span></a></li>
                        <li><a href="#aboutScreen" data-index="3"><span>03</span></a></li>
                        <li><a href="#reviewScreen" data-index="4"><span>04</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="home-scroll">
            <div class="section first-screen">
                <div class="content-block">
                    <div class="content-block-inner first-screen-block-content">
                        <div class="content-container">
                            <div class="row">
                                <div class="active image-first-screen">

                                    <?php if($showPointsEffect){ ?>
                                        <img class="next-particle"
                                             id="logo"
                                             data-mouse-force="300"
                                             data-width="1200"
                                             data-height="1200"
                                             data-max-width="70%"
                                             data-particle-gap="6"
                                             src="/images/logo-big.png" alt="">
                                    <?php } ?>


                                </div>
                                <div class="column-6 image-col-block">
                                    <div class="image-first-screen-block">
                                        <img src="/images/main-mockup@2x.png" alt="">
                                    </div>
                                </div>
                                <div class="column-6 info-first-screen">
                                    <h1 class="h1">Первая социальная сеть в СНГ <br>для любителей ставок на спорт</h1>
                                    <p>Создай команду единомышленников и зарабатывай</p>
                                    <?php   if(Yii::$app->user->isGuest) { ?>
                                    <div class="button-block">
                                        <a href="#" class="btn big-btn btn-primary btn-hover" data-toggle="modal-reg" data-target="#modal-auth">
                                            <i class="icon-man"></i>
                                            Присоединиться
                                            <span></span>
                                        </a>
                                        <a href="#" class="btn big-btn btn-default btn-hover" data-toggle="modal-reg" data-target="#modal-auth">
                                            <i class="icon-network"></i>
                                            Войти Через Соцсеть
                                            <span></span>
                                        </a>
                                    </div>
                                    <?php  }  ?>
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
                                <div class="column-12">
                                    <div class="play-video-block">
                                        <div class="video-wrapper">
                                            <div class="video-mokup">
                                                <div class="video-mokup-inner">
                                                    <div class="mockup-bg">
                                                        <img src="/images/mockup@2x.png" alt="">
                                                    </div>
                                                    <div class="cover-video">
                                                        <img src="/images/video-cover.jpg" alt="">
                                                        <button class="play-video-main">
                                                            <span class="icon-play"></span>
                                                        </button>
                                                    </div>
                                                    <video src="/data/video/LMB-video.mp4" controls id="main-video-player"></video>
                                                </div>
                                            </div>
                                            <div class="video-text-block">
                                                <p>Look My Bets - первое и единственное сообщество в мире, созданное, как для новичков в мире ставок, так и для профессионалов. </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section section-about">
                <div class="content-block">
                    <div class="content-block-inner tab-with-image">
                        <div class="content-container">
                            <div class="row">
                                <div class="column-12">
                                    <h2 class="h1">О проекте</h2>
                                </div>
                                <div class="column-3 tab-main-wrapper">
                                    <div class="tab-list">
                                        <ul class="tab">
                                            <li class="active">
                                                <a href="#" data-target="#tab1" class="btn-tab btn-hover">
                                                    <i class="icon-arrow_right"></i>
                                                    Турниры
                                                    <span></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" data-target="#tab2" class="btn-tab btn-hover">
                                                    <i class="icon-arrow_right"></i>
                                                    ШИРОКАЯ ЛИНИЯ
                                                    <span></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" data-target="#tab3" class="btn-tab btn-hover">
                                                    <i class="icon-arrow_right"></i>
                                                    КАК ЗАРАБОТАТЬ
                                                    <span></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" data-target="#tab4" class="btn-tab btn-hover">
                                                    <i class="icon-arrow_right"></i>
                                                    АНАЛИЗ ИГРЫ
                                                    <span></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" data-target="#tab5" class="btn-tab btn-hover">
                                                    <i class="icon-arrow_right"></i>
                                                    БЕЗОПАСНОСТЬ
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
                                                    Турниры
                                                    <i class="icon-arrow_down"></i>
                                                </h4>
                                            </div>
                                            <div class="tab-panel-wrapper">
                                                <div class="tab-panel-inner">



<p style="font-size: 120%;">Еженедельные турниры прогнозистов. Каждую неделю проходит турнир, где лучшие прогнозисты выигрывают реальные деньги. Проект только открылся и наша цель с развитием поднимать призовые турниров симметрично с количеством участников, при этом добавлять множество разновидностей турниров. Данная идея позволит собрать лучших в своём деле в одном месте, которые будут бороться за круглые суммы. Участие в турнире принять легко, достаточно просто оставить прогноз и все, никаких вложений.</p>
                                                                     </div>
                                                <div class="image-tab-wrapper">
                                                    <img src="/images/img-3-1@2x.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-panel" id="tab2">
                                            <div class="toggle-tabs-mobile">
                                                <h4 class="h2">
                                                    ШИРОКАЯ ЛИНИЯ
                                                    <i class="icon-arrow_down"></i>
                                                </h4>
                                            </div>
                                            <div class="tab-panel-wrapper">
                                                <div class="tab-panel-inner">

                                       <p style="font-size: 120%;">Оставляйте свои прогнозы за секунды. Это очень просто, так как сайт полностью имитирует реальную БК и имеет широкий выбор событий. Наша платформа станет для вас настоящей тренировочной площадкой, где вы сможете оставлять прогнозы на основные исходы, 1-й тайм, 2-й тайм, желтые карты, угловые, удары, фолы и т. д. и делать это за секунды экономя свое время.</p>
                                                </div>
                                                <div class="image-tab-wrapper">
                                                    <img src="/images/img-3-2@2x.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-panel" id="tab3">
                                            <div class="toggle-tabs-mobile">
                                                <h4 class="h2">
                                                    КАК ЗАРАБОТАТЬ
                                                    <i class="icon-arrow_down"></i>
                                                </h4>
                                            </div>
                                            <div class="tab-panel-wrapper">
                                                <div class="tab-panel-inner">
                                                  <p style="font-size: 120%;">Варианты для профи: турниры, предоставление доступов к закрытым прогнозам, создание команды. Наш проект не берет никакие комиссии со сделок и в целом в них не вникает. Мы - это просто площадка с инструментами для вас.</p>


                                                   <p style="font-size: 120%;"> Для новичков: доступ к множеству бесплатных прогнозов от профи, каждый дань и бесплатно. Развитие в сфере ставок без потери реальных денег.</p>
                                                </div>
                                                <div class="image-tab-wrapper">
                                                    <img src="/images/img-3-3@2x.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-panel" id="tab4">
                                            <div class="toggle-tabs-mobile">
                                                <h4 class="h2">
                                                    АНАЛИЗ ИГРЫ
                                                    <i class="icon-arrow_down"></i>
                                                </h4>
                                            </div>
                                            <div class="tab-panel-wrapper">
                                                <div class="tab-panel-inner">
                                                <p style="font-size: 120%;">
                                                    Профессиональный личный кабинет. Наш кабинет отображает полную статистику ваших прогнозов, сортируя по времени и по созданным вами же спискам. Вы имеете возможность видеть насколько вы эффективны на дистанции, насколько вы хороши в отдельных видах спорта, командах, стратегиях и т.д.
                                                </p>
                                                                 </div>
                                                <div class="image-tab-wrapper">
                                                    <img src="/images/img-3-4@2x.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-panel" id="tab5">
                                            <div class="toggle-tabs-mobile">
                                                <h4 class="h2">
                                                    БЕЗОПАСНОСТЬ
                                                    <i class="icon-arrow_down"></i>
                                                </h4>
                                            </div>
                                            <div class="tab-panel-wrapper">
                                                <div class="tab-panel-inner">
                                                 <p style="font-size: 120%;">
                                                     Этот вопрос очень важен, так как в наши дни интернет полностью пропитан капперами-мошенниками, которые используют людей как ресурс набивая свои карманы. Мы меняем эту тенденцию. Используя нашу систему невозможно быть обманутым, ведь аккаунт каждого игрока открыт, полная статистика каждого всегда на виду, статистику подкрутить нельзя, прогнозы удалять нельзя, закрытые прогнозы после завершения матча открываются всем. Все просто.
                                                 </p>
                                                </div>
                                                <div class="image-tab-wrapper">
                                                    <img src="/images/img-3-5@2x.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="column-12 btn-block">
                                    <a href="#" class="btn-round btn-primary" data-toggle="modal-reg" data-target="#modal-auth">
                                        <span class="icon-man"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!--            Отзывы Пользователей-->
            <?=CommentusersWidget::widget(); ?>


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
                                <img src="/images/logo.svg" alt="Look My Bet">
                            </a>
                        </div>
                        <div class="menu-footer">
                            <ul class="bottom-menu">
                                <li><a href="<?=Url::toRoute(['/privacy-policy']) ?>">политика конфиденциальности</a></li>
                                <li><a href="<?=Url::toRoute(['/terms-of-use']) ?>">Условия использования сайта</a></li>
                                <li><a href="<?=Url::toRoute(['/help']) ?>">Помощь</a></li>
                                <li><a href="<?=Url::toRoute(['/contact']) ?>">Контакты</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#modal-faq" class="">FAQ</a></li>
                            </ul>
                        </div>
                        <div class="btn-footer">
                            <a href="#" class="user-btn" data-toggle="modal-reg" data-target="#modal-auth">
                                <span class="icon-man"></span>
                            </a>
                            <a href="#" class="shared-btn">
                                <span class="icon-network"></span>
                            </a>
                        </div>
                        <div class="copy-footer">
                            <p>&copy; <?=date('Y')?> Look My Bet</p>
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
                    <a href="https://www.youtube.com/channel/UCw9BOXOTaRzoMAZVBpkzBvA?view_as=subscriber" target="_blank">
                        <span class="icon-youtube"></span>
                    </a>
                </li>
                <li>
                    <a href="https://tglink.ru/footballlmb" target="_blank">
                        <span class="icon-telegram"></span>
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/lookmybet/" target="_blank">
                        <span class="icon-insta"></span>
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

<?php $this->endCache(); } ?>