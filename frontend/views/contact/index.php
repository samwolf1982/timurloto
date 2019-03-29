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

<section class="text-section contact-wrapper">
    <div class="text-section-inner">
        <div class="text-content">
            <h1 class="h1">Контакты</h1>
            <div class="contact-section mt-0">
                <div class="contact-inner-section">
                    <div class="row">
                        <div class="contact-block">
                            <div class="c-title">Поддержка</div>
                            <div class="c-value">
                                <a href="support@lookmybets.com">support@lookmybets.com</a>
                            </div>
                        </div>
                        <div class="contact-block">
                            <div class="c-title">Работа</div>
                            <div class="c-value">   <a href="work@lookmybets.com">work@lookmybets.com</a></div>
                        </div>

                    </div>
                    <div class="row">


                        <div class="contact-block">
                            <div class="c-title">Реклама</div>
                            <div class="c-value">---------</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?= $this->render('@app/views/layouts/footer');?>









<!-- modad add bet -->
<?= AddbetWidget ::widget([]); ?>








<script src="/js/script.min.js"></script>
</body>

