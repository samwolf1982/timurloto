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
use frontend\assets\AccountIndexAsset;
use frontend\assets\MainAsset;
use yii\helpers\Url;

$this->title='LOOK MY BET';
AccountAsset::register($this);
AccountIndexAsset::register($this);


/**@var  AccessInfoAccount $accessInfoAccount **/
$accessInfoAccount;
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
        <?= ShowuserWidget::widget(['userdata' => [],'view'=>'other']) ?>



    </div>
</header>

<div class="account-statistic">
    <div class="content-container">
        <ul class="list-static two-row-list-table">

            <li>
                <a href="/account/open-access"    data-toggle="edit_subscriber" data-target="#edit_subscriber" class=""><span class="stat-title">Открытые Доступы</span> <span class="stat-val"><?=$accessInfoAccount->getCountTotalOpenAccess()?></span></a>
            </li>


            <li><a href="/account/my-subscriptions"  data-toggle="edit_bet" data-target="#edit_bet" class=""><span class="stat-title">Подписки</span> <span class="stat-val"><?=$accessInfoAccount->getCountSubscribe()?></span></a></li>
            <li><a href="/account/my-subscribers" data-toggle="edit_bet" data-target="#edit_bet" class=""><span class="stat-title">Подписчики</span> <span class="stat-val"><?=$accessInfoAccount->getCountSubscribers()?></span></a></li>
            <li><a href="#my-bet" class="ancor"><span class="stat-title">Прогнозы</span> <span class="stat-val"><?=$accessInfoAccount->getCountWagers()?></span></a></li>
            <li><a href="<?=Url::toRoute(['/bet'])?>" class=""><span class="stat-title">Турниры </span> <span class="stat-val">#<?=$weekNum?> </span></a></li>
            <li><a href="<?=Url::toRoute(['/bet','#'=>'user-rating'])?>" class=""><span class="stat-title">РЕЙТИНГ</span> <span class="stat-val">#<?=$top100?></span></a></li>



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

                    <?=UserBlockInformer::widget(['user_id'=>yii::$app->user->identity->id]) ?>


                </div>
                <div class="column-8">

                    <?=UserChartInformer::widget(['user_id'=>yii::$app->user->identity->id]) ?>

                </div>
            </div>



            <?php if(YII_ENV=='dev'){  ?>
            <div class="row table-row">
                <div class="column-4 fav-column">
                    <div class="table-wrapper">
                        <div class="table-inner">
                            <div class="table-body">
                                <div class="favorite-tbl">
                                    <div class="head-block-add">
                                        <h2 class="title-fav">любимые виды спорта</h2>
                                        <div class="block-btn-add">
                                            <a class="question-btn" data-toggle="tooltip" data-placement="bottom" title="Sed ut perspiciatis unde omnisiste natus error sit">
                                                <span>?</span>
                                            </a>
                                            <a href="#" class="add-event-btn" data-toggle="modal" data-target="#modal-choose-sport">
                                                <span class="icon-add-plus"></span>
                                            </a>
                                        </div>
                                    </div>
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
                                            <div class="favorite-item">
                                                <a href="#" class="favorite-item-inner" data-toggle="modal" data-target="#modal-choose-sport"></a>
                                            </div>
                                            <div class="favorite-item">
                                                <a href="#" class="favorite-item-inner" data-toggle="modal" data-target="#modal-choose-sport"></a>
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
                                    <div class="head-block-add">
                                        <h2 class="title-fav">любимые турниры</h2>
                                        <div class="block-btn-add">
                                            <a class="question-btn" data-toggle="tooltip" data-placement="bottom" title="Sed ut perspiciatis unde omnisiste natus error sit">
                                                <span>?</span>
                                            </a>
                                            <a href="#" class="add-event-btn" data-toggle="modal" data-target="#modal-choose-tourni">
                                                <span class="icon-add-plus"></span>
                                            </a>
                                        </div>
                                    </div>
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
                                            <div class="favorite-item">
                                                <a href="#" class="favorite-item-inner" data-toggle="modal" data-target="#modal-choose-tourni"></a>
                                            </div>
                                            <div class="favorite-item">
                                                <a href="#" class="favorite-item-inner" data-toggle="modal" data-target="#modal-choose-tourni"></a>
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
                                    <div class="head-block-add">
                                        <h2 class="title-fav">любимые команды</h2>
                                        <div class="block-btn-add">
                                            <a class="question-btn" data-toggle="tooltip" data-placement="bottom" title="Sed ut perspiciatis unde omnisiste natus error sit">
                                                <span>?</span>
                                            </a>
                                            <a href="#" class="add-event-btn" data-toggle="modal" data-target="#modal-choose-team">
                                                <span class="icon-add-plus"></span>
                                            </a>
                                        </div>
                                    </div>
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
                                            <div class="favorite-item">
                                                <a href="#" class="favorite-item-inner" data-toggle="modal" data-target="#modal-choose-team"></a>
                                            </div>
                                            <div class="favorite-item">
                                                <a href="#" class="favorite-item-inner" data-toggle="modal" data-target="#modal-choose-team"></a>
                                            </div>
                                            <div class="favorite-item">
                                                <a href="#" class="favorite-item-inner" data-toggle="modal" data-target="#modal-choose-team"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>



            <?=StatisticInformer::widget(['user_id'=>yii::$app->user->identity->id]); ?>





            <?=WagersInformer::widget(['is_own'=>true]) ?>



        </div>
    </div>
</div>

<?= $this->render('@app/views/layouts/footer');?>




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
                                    <img src="/images/logo_red.svg" alt="">
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


<!-- modad add bet  наверно нужно удалить ?? -->
<?= AddbetWidget ::widget([]); ?>

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
                                        <div class="radio-row">2131
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
<div class="modal-wrapper bet-modal modal-945" id="modal-choose-bet">
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
                            <div class="bet-list-choose">
                                <div class="bet-list-choose-inner">
                                    <div class="bet-list-choose-row">
                                        <div class="chose-item">
                                            <div class="chose-item-inner">
                                                <input type="checkbox" name="bookmaker" id="b1">
                                                <label for="b1">
                                                    <img src="/images/b1.png" alt="">
                                                    <span>1x bet</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="chose-item">
                                            <div class="chose-item-inner">
                                                <input type="checkbox" name="bookmaker" id="b2">
                                                <label for="b2">
                                                    <img src="/images/b2.png" alt="">
                                                    <span>БК Leon</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="chose-item">
                                            <div class="chose-item-inner">
                                                <input type="checkbox" name="bookmaker" id="b3">
                                                <label for="b3">
                                                    <img src="/images/b3.png" alt="">
                                                    <span>Пари Матч</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="chose-item">
                                            <div class="chose-item-inner">
                                                <input type="checkbox" name="bookmaker" id="b4">
                                                <label for="b4">
                                                    <img src="/images/b1.png" alt="">
                                                    <span>1x bet</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="chose-item">
                                            <div class="chose-item-inner">
                                                <input type="checkbox" name="bookmaker" id="b5">
                                                <label for="b5">
                                                    <img src="/images/b2.png" alt="">
                                                    <span>БК Leon</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="chose-item">
                                            <div class="chose-item-inner">
                                                <input type="checkbox" name="bookmaker" id="b6">
                                                <label for="b6">
                                                    <img src="/images/b3.png" alt="">
                                                    <span>Пари Матч</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bet-list-choose-row">
                                        <div class="chose-item">
                                            <div class="chose-item-inner">
                                                <input type="checkbox" name="bookmaker" id="b111">
                                                <label for="b111">
                                                    <img src="/images/b1.png" alt="">
                                                    <span>1x bet</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="chose-item">
                                            <div class="chose-item-inner">
                                                <input type="checkbox" name="bookmaker" id="b112">
                                                <label for="b112">
                                                    <img src="/images/b2.png" alt="">
                                                    <span>БК Leon</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="chose-item">
                                            <div class="chose-item-inner">
                                                <input type="checkbox" name="bookmaker" id="b113">
                                                <label for="b113">
                                                    <img src="/images/b3.png" alt="">
                                                    <span>Пари Матч</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="chose-item">
                                            <div class="chose-item-inner">
                                                <input type="checkbox" name="bookmaker" id="b114">
                                                <label for="b114">
                                                    <img src="/images/b1.png" alt="">
                                                    <span>1x bet</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="chose-item">
                                            <div class="chose-item-inner">
                                                <input type="checkbox" name="bookmaker" id="b115">
                                                <label for="b115">
                                                    <img src="/images/b2.png" alt="">
                                                    <span>БК Leon</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="chose-item">
                                            <div class="chose-item-inner">
                                                <input type="checkbox" name="bookmaker" id="b116">
                                                <label for="b116">
                                                    <img src="/images/b3.png" alt="">
                                                    <span>Пари Матч</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bet-list-choose-row">
                                        <div class="chose-item">
                                            <div class="chose-item-inner">
                                                <input type="checkbox" name="bookmaker" id="b121">
                                                <label for="b121">
                                                    <img src="/images/b1.png" alt="">
                                                    <span>1x bet</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="chose-item">
                                            <div class="chose-item-inner">
                                                <input type="checkbox" name="bookmaker" id="b122">
                                                <label for="b122">
                                                    <img src="/images/b2.png" alt="">
                                                    <span>БК Leon</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="chose-item">
                                            <div class="chose-item-inner">
                                                <input type="checkbox" name="bookmaker" id="b123">
                                                <label for="b123">
                                                    <img src="/images/b3.png" alt="">
                                                    <span>Пари Матч</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="chose-item">
                                            <div class="chose-item-inner">
                                                <input type="checkbox" name="bookmaker" id="b124">
                                                <label for="b124">
                                                    <img src="/images/b1.png" alt="">
                                                    <span>1x bet</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="chose-item"></div>
                                        <div class="chose-item"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-block-choose">
                                <span>Можно выбрать не более 3х контор!</span>
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
<div class="modal-wrapper bet-modal modal-640" id="modal-choose-team">
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
                                <h2>Любимые Команды</h2>
                                <p>Выберите до 10 любимых команд</p>
                            </div>
                            <div class="search-modal-block">
                                <div class="search-inp">
                                    <input type="text" placeholder="ПОИСК" class="search-inp-modal">
                                    <button>
                                        <span class="icon-search"></span>
                                    </button>
                                </div>
                                <div class="result-search">
                                    <span>3 результата по запросу «РЕАЛ»</span>
                                    <div class="radio-row">
                                        <input type="checkbox" name="comp-n" id="ca111">
                                        <label for="ca111">Реал Бетис</label>
                                    </div>
                                    <div class="radio-row">
                                        <input type="checkbox" name="comp-n" id="ca112">
                                        <label for="ca112">Реал Мадрид</label>
                                    </div>
                                    <div class="radio-row">
                                        <input type="checkbox" name="comp-n" id="ca113">
                                        <label for="ca113">Реал Сосьедад</label>
                                    </div>
                                </div>
                            </div>
                            <div class="complain-form team-form">
                                <h3>Популярные</h3>
                                <form action="#">
                                    <div class="complain-form-inner">
                                        <div class="radio-row">
                                            <input type="checkbox" name="comp-n" id="ca11">
                                            <label for="ca11">Манчестер Юнайтед</label>
                                        </div>
                                        <div class="radio-row">
                                            <input type="checkbox" name="comp-n" id="ca12">
                                            <label for="ca12">Арсенал</label>
                                        </div>
                                        <div class="radio-row">
                                            <input type="checkbox" name="comp-n" id="ca13">
                                            <label for="ca13">Челси</label>
                                        </div>
                                        <div class="radio-row">
                                            <input type="checkbox" name="comp-n" id="ca14">
                                            <label for="ca14">Ливерпуль</label>
                                        </div>
                                        <div class="radio-row">
                                            <input type="checkbox" name="comp-n" id="ca15">
                                            <label for="ca15">Тоттенхем</label>
                                        </div>
                                    </div>
                                </form>
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
<div class="modal-wrapper bet-modal modal-640" id="modal-choose-tourni">
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
                                <h2>Любимые Турниры</h2>
                                <p>Выберите до 5 любимых турниров</p>
                            </div>
                            <div class="search-modal-block">
                                <div class="search-inp">
                                    <input type="text" placeholder="ПОИСК" class="search-inp-modal">
                                    <button>
                                        <span class="icon-search"></span>
                                    </button>
                                </div>
                                <div class="result-search">
                                    <span>2 результата по запросу «Лига»</span>
                                    <div class="radio-row">
                                        <input type="checkbox" name="comp-n" id="ca1111">
                                        <label for="ca1111">Ла Лига</label>
                                    </div>
                                    <div class="radio-row">
                                        <input type="checkbox" name="comp-n" id="ca1112">
                                        <label for="ca1112">Лига Чемпионов</label>
                                    </div>
                                </div>
                            </div>
                            <div class="complain-form team-form">
                                <h3>Популярные</h3>
                                <form action="#">
                                    <div class="complain-form-inner">
                                        <div class="radio-row">
                                            <input type="checkbox" name="comp-n" id="ca211">
                                            <label for="ca211">Ла Лига</label>
                                        </div>
                                        <div class="radio-row">
                                            <input type="checkbox" name="comp-n" id="ca212">
                                            <label for="ca212">Лига Чемпионов</label>
                                        </div>
                                        <div class="radio-row">
                                            <input type="checkbox" name="comp-n" id="ca213">
                                            <label for="ca213">Премьер Лига</label>
                                        </div>
                                        <div class="radio-row">
                                            <input type="checkbox" name="comp-n" id="ca214">
                                            <label for="ca214">Серия А</label>
                                        </div>
                                        <div class="radio-row">
                                            <input type="checkbox" name="comp-n" id="ca215">
                                            <label for="ca215">НБА</label>
                                        </div>
                                    </div>
                                </form>
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
