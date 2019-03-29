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


















<section class="text-section">
    <div class="text-section-inner">
        <div class="text-content">
            <h1 class="h1">Условия использования сайта</h1>
            <div class="content-page-text">
                <h2>Участие</h2>
                <p>Для участия в ежемесячном розыгрыше призов, пользователю необходимо сделать как минимум 30 прогнозов на различные события с текстовым описанием в течение данного розыгрыша. Временем совершения ставки для участия в рейтинге прогнозистов является время начала матча, на который был совершен прогноз, а не время совершения самой ставки. При одинаковом результате нескольких пользователей дополнительным показателем, по которому определяется позиция пользователя в рейтинге, является количество совершенных ставок. Чем больше прогнозов сделал пользователь, тем выше он в рейтинге. При равенстве данного показателя, считаем, что пользователи разделили между собой данные места.
                </p>
                <h3>ВИРТУАЛЬНАЯ ВАЛЮТА САЙТА</h3>
                <p>Каждому пользователю при регистрации на Сайте начисляется 100 000 bet coin.</p>
                <p>Сайт не является азартной игрой, не принимает ставки на реальную валюту, лишь предоставляет пользователям возможность соревноваться между собой в предсказании результатов матчей.</p>

                <h4>ПРИЗЫ</h4>
                <p>Денежный приз начисляется переводом на удобную для пользователя электронную платежную систему. Выбор платежной системы определяется в течение 72 часов после подведения итогов конкурса.</p>

                <p>Организатор оставляет за собой право изменять величину приза или отказать в получении денежного приза в случае нарушении правил розыгрыша без объяснения причин.</p>
                <p>Все спорные вопросы принимаются в течение 30 дней с даты расчета прогноза на основании письменного заявления игрока.</p>
            </div>

            <?php if(0){ ?>
            <div class="contact-section">
                <h2 class="h1">Контакты</h2>
                <div class="contact-inner-section">
                    <div class="row">
                        <div class="contact-block">
                            <div class="c-title">Телефон</div>
                            <div class="c-value">+380992233232</div>
                        </div>
                        <div class="contact-block">
                            <div class="c-title">Адрес</div>
                            <div class="c-value">ул. Екатерининская 49 , г.Одесса</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="contact-block">
                            <div class="c-title">E-mail</div>
                            <div class="c-value">look.my.bet@gmail.com</div>
                        </div>
                        <div class="contact-block">
                            <div class="c-title">Время работы</div>
                            <div class="c-value">09:00 - 22:00 (без выходных)</div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>


<?= $this->render('@app/views/layouts/footer');?>









<!-- modad add bet -->
<?= AddbetWidget ::widget([]); ?>








<script src="/js/script.min.js"></script>
</body>

