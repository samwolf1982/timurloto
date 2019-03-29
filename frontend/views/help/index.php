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
            <h1 class="h1">Помощь</h1>
            <div class="content-page-text">
                <h2>Заголовок</h2>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                    ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas
                    sit aspernatur aut odit aut fugit, sed quia consequuntur</p>
                <p><a href="mailto:look.my.bet@gmail.com">look.my.bet@gmail.com</a></p>
                <h3>2. Заголовок</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                    ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. look.my.bet@gmail.com Nemo enim ipsam
                    voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.</p>
                <p>Totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam
                    voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.</p>
                <ul>
                    <li>Lorem ipsum dolor sit amet, consectetur</li>
                    <li>Sed do eiusmod tempor incididunt ut labore</li>
                    <li>Duis aute irure dolor in reprehenderit in</li>
                </ul>
                <h4>3. Заголовок</h4>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                    ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas
                    sit aspernatur aut odit aut fugit, sed quia consequuntur.</p>
                <p>Totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam
                    voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.</p>
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

