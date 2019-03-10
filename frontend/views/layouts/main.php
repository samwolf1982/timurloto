<?php

/* @var $this \yii\web\View */
/* @var $content string */

use dektrium\user\widgets\Connect;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="/images/favicon.png" type="image/png">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


<?= $content ?>



<?php $this->endBody() ?>

<style>
   .social-login>.soc-login .auth-clients{
        display: flex;
    }
   .social-login>.soc-login .auth-icon{
        position: relative;
        top: 23px;
    }
   .soc-login li a.facebook.auth-link:hover {
       color: #fff;
       background: #3B5997;
   }
   .soc-login li a.vkontakte.auth-link:hover {
       color: #fff;
       background: #5371A0;
   }


   .soc-login li a.google.auth-link:hover {
       color: #fff;
       background: #EA4336;
   }
   .modal-backdrop.in{
       background-color:  transparent;
   }
</style>

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

                                        <?= Connect::widget([
                                            'baseAuthUrl' => ['/user/security/auth'],
                                        ]) ?>

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
                                        <?= Connect::widget([
                                            'baseAuthUrl' => ['/user/security/auth'],
                                        ]) ?>
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
                                                            <img src="images/avatar-placeholder.svg" alt="">
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
                                                            <img src="images/avatar-placeholder.svg" alt="">
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
                                                            <img src="images/avatar-placeholder.svg" alt="">
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
                                                            <img src="images/avatar-placeholder.svg" alt="">
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
                                                            <img src="images/avatar-placeholder.svg" alt="">
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
                                                            <img src="images/avatar-placeholder.svg" alt="">
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
                                                            <img src="images/avatar-placeholder.svg" alt="">
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
                                                            <img src="images/avatar-placeholder.svg" alt="">
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
                                                            <img src="images/avatar-placeholder.svg" alt="">
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
                                                            <img src="images/avatar-placeholder.svg" alt="">
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
                                                            <img src="images/avatar-placeholder.svg" alt="">
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
                                                            <img src="images/avatar-placeholder.svg" alt="">
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
                                                            <img src="images/avatar-placeholder.svg" alt="">
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
                                                            <img src="images/avatar-placeholder.svg" alt="">
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
                                                            <img src="images/avatar-placeholder.svg" alt="">
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
                                                            <img src="images/avatar-placeholder.svg" alt="">
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
                                                            <img src="images/avatar-placeholder.svg" alt="">
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
                                                            <img src="images/avatar-placeholder.svg" alt="">
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
                                                            <img src="images/avatar-placeholder.svg" alt="">
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
                                                            <img src="images/avatar-placeholder.svg" alt="">
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
                                            <img src="images/chat.svg" alt="">
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
                                            <img src="images/message-chanel.svg" alt="">
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
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
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
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
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
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
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
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
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
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
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
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
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
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
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
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
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
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
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
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
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
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
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
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
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
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
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
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
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
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
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
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
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
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
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
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
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
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
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
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae.</p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row user-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-text">
                                                        <div class="message-text-inner">
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                                                beatae vitae dicta sunt explicabo. </p>
                                                            <div class="date">14:27</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-row my-message">
                                                    <div class="user-message-avatar">
                                                        <div class="message-avatar-inner">
                                                            <div class="message-avatar">
                                                                <img src="images/avatar-placeholder.svg" alt="">
                                                            </div>
                                                        </div>
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











<div id="modalWrapper" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>







<!-- Новые модалки -->
<div class="modal-wrapper bet-modal modal-640" id="edit_bet">
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
                                <h2>Мои Подписки <span class="muted-text">356</span></h2>
                            </div>
                            <div class="search-subscribe">
                                <div class="search-subscribe-inner">
                                    <input type="text" placeholder="ПОИСК">
                                </div>
                            </div>
                            <div class="list-block-subscribe">
                                <div class="list-block-subscribe-inner" data-simplebar data-simplebar-auto-hide="true">
                                    <div class="for-scroll">
                                        <?php if(0){ ?>

                                        <div class="subscribe-item">
                                            <div class="rate-avatar">
                                                <div class="circle-wrapper grey-null-full" data-ptc="15">
                                                    <div class="circle"></div>
                                                </div>
                                                <div class="count-rate-av">
                                                    <span>5</span>
                                                </div>
                                                <div class="avatar-user">
                                                    <img src="images/ava3.png" alt="">
                                                </div>
                                            </div>
                                            <div class="name-block">
                                                <h5><a href="">Alexandr</a></h5>
                                            </div>
                                            <div class="btn-subscibe-block">
                                                <a href="#" class="btn-subscribe">
                                                    <span class="shown-text">Отписаться</span>
                                                    <span class="hidden-text">Подписаться</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="subscribe-item">
                                            <div class="rate-avatar">
                                                <div class="circle-wrapper grey-null-full" data-ptc="11">
                                                    <div class="circle"></div>
                                                </div>
                                                <div class="avatar-user">
                                                    <img src="images/ava2.png" alt="">
                                                </div>
                                            </div>
                                            <div class="name-block">
                                                <h5><a href="">Valentin Real</a></h5>
                                            </div>
                                            <div class="btn-subscibe-block">
                                                <a href="#" class="btn-subscribe">
                                                    <span class="shown-text">Отписаться</span>
                                                    <span class="hidden-text">Подписаться</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="subscribe-item">
                                            <div class="rate-avatar">
                                                <div class="circle-wrapper grey-null-full" data-ptc="10">
                                                    <div class="circle"></div>
                                                </div>
                                                <div class="avatar-user">
                                                    <img src="images/ava2.png" alt="">
                                                </div>
                                            </div>
                                            <div class="name-block">
                                                <h5><a href="">Babu</a></h5>
                                            </div>
                                            <div class="btn-subscibe-block">
                                                <a href="#" class="btn-subscribe">
                                                    <span class="shown-text">Отписаться</span>
                                                    <span class="hidden-text">Подписаться</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="subscribe-item">
                                            <div class="rate-avatar">
                                                <div class="circle-wrapper grey-null-full" data-ptc="9">
                                                    <div class="circle"></div>
                                                </div>
                                                <div class="avatar-user">
                                                    <img src="images/ava2.png" alt="">
                                                </div>
                                                <div class="count-rate-av">
                                                    <span>5</span>
                                                </div>
                                            </div>
                                            <div class="name-block">
                                                <h5><a href="">Valentin Real</a></h5>
                                            </div>
                                            <div class="btn-subscibe-block">
                                                <a href="#" class="btn-subscribe">
                                                    <span class="shown-text">Отписаться</span>
                                                    <span class="hidden-text">Подписаться</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="subscribe-item">
                                            <div class="rate-avatar">
                                                <div class="circle-wrapper grey-null-full" data-ptc="8">
                                                    <div class="circle"></div>
                                                </div>
                                                <div class="avatar-user">
                                                    <img src="images/ava2.png" alt="">
                                                </div>
                                            </div>
                                            <div class="name-block">
                                                <h5><a href="">Babu</a></h5>
                                            </div>
                                            <div class="btn-subscibe-block">
                                                <a href="#" class="btn-subscribe">
                                                    <span class="shown-text">Отписаться</span>
                                                    <span class="hidden-text">Подписаться</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="subscribe-item">
                                            <div class="rate-avatar">
                                                <div class="circle-wrapper grey-null-full" data-ptc="7">
                                                    <div class="circle"></div>
                                                </div>
                                                <div class="avatar-user">
                                                    <img src="images/ava2.png" alt="">
                                                </div>
                                                <div class="count-rate-av">
                                                    <span>5</span>
                                                </div>
                                            </div>
                                            <div class="name-block">
                                                <h5><a href="">Alexandr</a></h5>
                                            </div>
                                            <div class="btn-subscibe-block">
                                                <a href="#" class="btn-subscribe">
                                                    <span class="shown-text">Отписаться</span>
                                                    <span class="hidden-text">Подписаться</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="subscribe-item">
                                            <div class="rate-avatar">
                                                <div class="circle-wrapper grey-null-full" data-ptc="6">
                                                    <div class="circle"></div>
                                                </div>
                                                <div class="avatar-user">
                                                    <img src="images/ava2.png" alt="">
                                                </div>
                                            </div>
                                            <div class="name-block">
                                                <h5><a href="">Babu</a></h5>
                                            </div>
                                            <div class="btn-subscibe-block">
                                                <a href="#" class="btn-subscribe">
                                                    <span class="shown-text">Отписаться</span>
                                                    <span class="hidden-text">Подписаться</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="subscribe-item">
                                            <div class="rate-avatar">
                                                <div class="circle-wrapper grey-null-full" data-ptc="5">
                                                    <div class="circle"></div>
                                                </div>
                                                <div class="avatar-user">
                                                    <img src="images/ava2.png" alt="">
                                                </div>
                                            </div>
                                            <div class="name-block">
                                                <h5><a href="">Dmitriy</a></h5>
                                            </div>
                                            <div class="btn-subscibe-block">
                                                <a href="#" class="btn-subscribe">
                                                    <span class="shown-text">Отписаться</span>
                                                    <span class="hidden-text">Подписаться</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="subscribe-item">
                                            <div class="rate-avatar">
                                                <div class="circle-wrapper grey-null-full" data-ptc="4">
                                                    <div class="circle"></div>
                                                </div>
                                                <div class="avatar-user">
                                                    <img src="images/ava2.png" alt="">
                                                </div>
                                            </div>
                                            <div class="name-block">
                                                <h5><a href="">Jon Doe</a></h5>
                                            </div>
                                            <div class="btn-subscibe-block">
                                                <a href="#" class="btn-subscribe">
                                                    <span class="shown-text">Отписаться</span>
                                                    <span class="hidden-text">Подписаться</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="subscribe-item">
                                            <div class="rate-avatar">
                                                <div class="circle-wrapper grey-null-full" data-ptc="3">
                                                    <div class="circle"></div>
                                                </div>
                                                <div class="avatar-user">
                                                    <img src="images/ava2.png" alt="">
                                                </div>
                                            </div>
                                            <div class="name-block">
                                                <h5><a href="">Grisha Goga</a></h5>
                                            </div>
                                            <div class="btn-subscibe-block">
                                                <a href="#" class="btn-subscribe">
                                                    <span class="shown-text">Отписаться</span>
                                                    <span class="hidden-text">Подписаться</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="subscribe-item">
                                            <div class="rate-avatar">
                                                <div class="circle-wrapper grey-null-full" data-ptc="2">
                                                    <div class="circle"></div>
                                                </div>
                                                <div class="avatar-user">
                                                    <img src="images/ava2.png" alt="">
                                                </div>
                                                <div class="count-rate-av">
                                                    <span>5</span>
                                                </div>
                                            </div>
                                            <div class="name-block">
                                                <h5><a href="">Zizu</a></h5>
                                            </div>
                                            <div class="btn-subscibe-block">
                                                <a href="#" class="btn-subscribe">
                                                    <span class="shown-text">Отписаться</span>
                                                    <span class="hidden-text">Подписаться</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="subscribe-item">
                                            <div class="rate-avatar">
                                                <div class="circle-wrapper grey-null-full" data-ptc="1">
                                                    <div class="circle"></div>
                                                </div>
                                                <div class="avatar-user">
                                                    <img src="images/ava2.png" alt="">
                                                </div>
                                            </div>
                                            <div class="name-block">
                                                <h5><a href="">Alexandr</a></h5>
                                            </div>
                                            <div class="btn-subscibe-block">
                                                <a href="#" class="btn-subscribe">
                                                    <span class="shown-text">Отписаться</span>
                                                    <span class="hidden-text">Подписаться</span>
                                                </a>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <!-- Этот текст выводим когда идет подгрузка контента -->
                            <!--<div class="load-subscriber-text">-->
                            <!--<span>…   Загрузка</span>-->
                            <!--</div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal-wrapper bet-modal modal-edit-subscriber modal-960" id="edit_subscriber">
    <div class="modal-inner">
        <div class="modal-content">
            <div class="modal-content-inner">
                <div class="header-modal">
                    <button class="close" data-toggle="modal-dismiss"><span class="icon-close2"></span></button>
                </div>
                <div class="body-modal">
<!--load ajax...-->
                </div>
            </div>
        </div>
    </div>
</div>





<div class="modal-wrapper bet-modal modal-edit-subscriber modal-960" id="edit_subscriberDEL_OR">
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
                                <div class="tabs-modal-trigger">
                                    <ul class="tabs-nav">
                                        <li class="active">
                                            <a href="#tab1">Я открыл <span class="text-muted">19</span></a>
                                        </li>
                                        <li>
                                            <a href="#tab2">Мне открыли <span class="text-muted">8</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tabs-modal-block">
                                <div class="tabs-modal-block-inner">
                                    <div class="tabs-item active" id="tab1">
                                        <div class="tabs-item-inner">
                                            <div class="list-block-subscribe">
                                                <div class="list-block-subscribe-inner" data-simplebar data-simplebar-auto-hide="true">
                                                    <div class="for-scroll">
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="15">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava3.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">Alexandr</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <p>The complexity of mining crypto currency is growing rapidly,
                                                                        and many crypto-currencies.</p>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe">
                                                                    <span class="shown-text">Закрыть Доступ</span>
                                                                    <span class="hidden-text">Открыть Доступ</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="21">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava1.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">john.baklan</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <textarea class="add-notification" placeholder="Добавить заметку до 100 символов"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe">
                                                                    <span class="shown-text">Закрыть Доступ</span>
                                                                    <span class="hidden-text">Открыть Доступ</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="21">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava1.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">john.baklan</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <textarea class="add-notification" placeholder="Добавить заметку до 100 символов"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe">
                                                                    <span class="shown-text">Закрыть Доступ</span>
                                                                    <span class="hidden-text">Открыть Доступ</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="15">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava3.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">Alexandr</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <p>The complexity of mining crypto currency is growing rapidly,
                                                                        and many crypto-currencies.</p>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe">
                                                                    <span class="shown-text">Закрыть Доступ</span>
                                                                    <span class="hidden-text">Открыть Доступ</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="15">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava3.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">Alexandr</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <p>The complexity of mining crypto currency is growing rapidly,
                                                                        and many crypto-currencies.</p>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe">
                                                                    <span class="shown-text">Закрыть Доступ</span>
                                                                    <span class="hidden-text">Открыть Доступ</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="21">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava1.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">john.baklan</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <textarea class="add-notification" placeholder="Добавить заметку до 100 символов"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe">
                                                                    <span class="shown-text">Закрыть Доступ</span>
                                                                    <span class="hidden-text">Открыть Доступ</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="21">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava1.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">john.baklan</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <textarea class="add-notification" placeholder="Добавить заметку до 100 символов"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe">
                                                                    <span class="shown-text">Закрыть Доступ</span>
                                                                    <span class="hidden-text">Открыть Доступ</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="15">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava3.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">Alexandr</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <p>The complexity of mining crypto currency is growing rapidly,
                                                                        and many crypto-currencies.</p>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe">
                                                                    <span class="shown-text">Закрыть Доступ</span>
                                                                    <span class="hidden-text">Открыть Доступ</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="15">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava3.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">Alexandr</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <p>The complexity of mining crypto currency is growing rapidly,
                                                                        and many crypto-currencies.</p>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe">
                                                                    <span class="shown-text">Закрыть Доступ</span>
                                                                    <span class="hidden-text">Открыть Доступ</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="21">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava1.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">john.baklan</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <textarea class="add-notification" placeholder="Добавить заметку до 100 символов"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe">
                                                                    <span class="shown-text">Закрыть Доступ</span>
                                                                    <span class="hidden-text">Открыть Доступ</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="21">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava1.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">john.baklan</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <textarea class="add-notification" placeholder="Добавить заметку до 100 символов"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe">
                                                                    <span class="shown-text">Закрыть Доступ</span>
                                                                    <span class="hidden-text">Открыть Доступ</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="15">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava3.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">Alexandr</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <p>The complexity of mining crypto currency is growing rapidly,
                                                                        and many crypto-currencies.</p>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe">
                                                                    <span class="shown-text">Закрыть Доступ</span>
                                                                    <span class="hidden-text">Открыть Доступ</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="15">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava3.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">Alexandr</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <p>The complexity of mining crypto currency is growing rapidly,
                                                                        and many crypto-currencies.</p>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe">
                                                                    <span class="shown-text">Закрыть Доступ</span>
                                                                    <span class="hidden-text">Открыть Доступ</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="21">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava1.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">john.baklan</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <textarea class="add-notification" placeholder="Добавить заметку до 100 символов"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe">
                                                                    <span class="shown-text">Закрыть Доступ</span>
                                                                    <span class="hidden-text">Открыть Доступ</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="21">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava1.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">john.baklan</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <textarea class="add-notification" placeholder="Добавить заметку до 100 символов"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe">
                                                                    <span class="shown-text">Закрыть Доступ</span>
                                                                    <span class="hidden-text">Открыть Доступ</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="15">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava3.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">Alexandr</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <p>The complexity of mining crypto currency is growing rapidly,
                                                                        and many crypto-currencies.</p>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe">
                                                                    <span class="shown-text">Закрыть Доступ</span>
                                                                    <span class="hidden-text">Открыть Доступ</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="15">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava3.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">Alexandr</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <p>The complexity of mining crypto currency is growing rapidly,
                                                                        and many crypto-currencies.</p>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe">
                                                                    <span class="shown-text">Закрыть Доступ</span>
                                                                    <span class="hidden-text">Открыть Доступ</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="21">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava1.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">john.baklan</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <textarea class="add-notification" placeholder="Добавить заметку до 100 символов"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe">
                                                                    <span class="shown-text">Закрыть Доступ</span>
                                                                    <span class="hidden-text">Открыть Доступ</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="21">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava1.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">john.baklan</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <textarea class="add-notification" placeholder="Добавить заметку до 100 символов"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe">
                                                                    <span class="shown-text">Закрыть Доступ</span>
                                                                    <span class="hidden-text">Открыть Доступ</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="15">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava3.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">Alexandr</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <p>The complexity of mining crypto currency is growing rapidly,
                                                                        and many crypto-currencies.</p>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe">
                                                                    <span class="shown-text">Закрыть Доступ</span>
                                                                    <span class="hidden-text">Открыть Доступ</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="15">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava3.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">Alexandr</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <p>The complexity of mining crypto currency is growing rapidly,
                                                                        and many crypto-currencies.</p>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe">
                                                                    <span class="shown-text">Закрыть Доступ</span>
                                                                    <span class="hidden-text">Открыть Доступ</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="21">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava1.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">john.baklan</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <textarea class="add-notification" placeholder="Добавить заметку до 100 символов"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe">
                                                                    <span class="shown-text">Закрыть Доступ</span>
                                                                    <span class="hidden-text">Открыть Доступ</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="21">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava1.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">john.baklan</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <textarea class="add-notification" placeholder="Добавить заметку до 100 символов"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe">
                                                                    <span class="shown-text">Закрыть Доступ</span>
                                                                    <span class="hidden-text">Открыть Доступ</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="15">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava3.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">Alexandr</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <p>The complexity of mining crypto currency is growing rapidly,
                                                                        and many crypto-currencies.</p>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe">
                                                                    <span class="shown-text">Закрыть Доступ</span>
                                                                    <span class="hidden-text">Открыть Доступ</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tabs-item" id="tab2">
                                        <div class="tabs-item-inner">
                                            <div class="list-block-subscribe">
                                                <div class="list-block-subscribe-inner" data-simplebar data-simplebar-auto-hide="true">
                                                    <div class="for-scroll">
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="15">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava3.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">Alexandr</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <p>The complexity of mining crypto currency is growing rapidly,
                                                                        and many crypto-currencies.</p>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe opening-succes">
                                                                    <span class="shown-text">Открыть в ответ</span>
                                                                    <span class="hidden-text">Открыто</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="21">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava1.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">john.baklan</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <textarea class="add-notification" placeholder="Добавить заметку до 100 символов"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe opening-succes">
                                                                    <span class="shown-text">Открыть в ответ</span>
                                                                    <span class="hidden-text">Открыто</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="21">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava1.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">john.baklan</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <textarea class="add-notification" placeholder="Добавить заметку до 100 символов"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe opening-succes">
                                                                    <span class="shown-text">Открыть в ответ</span>
                                                                    <span class="hidden-text">Открыто</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="15">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava3.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">Alexandr</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <p>The complexity of mining crypto currency is growing rapidly,
                                                                        and many crypto-currencies.</p>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe opening-succes">
                                                                    <span class="shown-text">Открыть в ответ</span>
                                                                    <span class="hidden-text">Открыто</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="15">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava3.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">Alexandr</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <p>The complexity of mining crypto currency is growing rapidly,
                                                                        and many crypto-currencies.</p>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe opening-succes">
                                                                    <span class="shown-text">Открыть в ответ</span>
                                                                    <span class="hidden-text">Открыто</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="21">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava1.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">john.baklan</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <textarea class="add-notification" placeholder="Добавить заметку до 100 символов"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe opening-succes">
                                                                    <span class="shown-text">Открыть в ответ</span>
                                                                    <span class="hidden-text">Открыто</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="21">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava1.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">john.baklan</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <textarea class="add-notification" placeholder="Добавить заметку до 100 символов"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe opening-succes">
                                                                    <span class="shown-text">Открыть в ответ</span>
                                                                    <span class="hidden-text">Открыто</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="15">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava3.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">Alexandr</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <p>The complexity of mining crypto currency is growing rapidly,
                                                                        and many crypto-currencies.</p>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe opening-succes">
                                                                    <span class="shown-text">Открыть в ответ</span>
                                                                    <span class="hidden-text">Открыто</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="15">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava3.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">Alexandr</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <p>The complexity of mining crypto currency is growing rapidly,
                                                                        and many crypto-currencies.</p>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe opening-succes">
                                                                    <span class="shown-text">Открыть в ответ</span>
                                                                    <span class="hidden-text">Открыто</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="21">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava1.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">john.baklan</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <textarea class="add-notification" placeholder="Добавить заметку до 100 символов"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe opening-succes">
                                                                    <span class="shown-text">Открыть в ответ</span>
                                                                    <span class="hidden-text">Открыто</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="21">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava1.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">john.baklan</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <textarea class="add-notification" placeholder="Добавить заметку до 100 символов"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe opening-succes">
                                                                    <span class="shown-text">Открыть в ответ</span>
                                                                    <span class="hidden-text">Открыто</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="15">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava3.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">Alexandr</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <p>The complexity of mining crypto currency is growing rapidly,
                                                                        and many crypto-currencies.</p>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe opening-succes">
                                                                    <span class="shown-text">Открыть в ответ</span>
                                                                    <span class="hidden-text">Открыто</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="15">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava3.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">Alexandr</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <p>The complexity of mining crypto currency is growing rapidly,
                                                                        and many crypto-currencies.</p>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe opening-succes">
                                                                    <span class="shown-text">Открыть в ответ</span>
                                                                    <span class="hidden-text">Открыто</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="21">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava1.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">john.baklan</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <textarea class="add-notification" placeholder="Добавить заметку до 100 символов"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe opening-succes">
                                                                    <span class="shown-text">Открыть в ответ</span>
                                                                    <span class="hidden-text">Открыто</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="21">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava1.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">john.baklan</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <textarea class="add-notification" placeholder="Добавить заметку до 100 символов"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe opening-succes">
                                                                    <span class="shown-text">Открыть в ответ</span>
                                                                    <span class="hidden-text">Открыто</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="15">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava3.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">Alexandr</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <p>The complexity of mining crypto currency is growing rapidly,
                                                                        and many crypto-currencies.</p>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe opening-succes">
                                                                    <span class="shown-text">Открыть в ответ</span>
                                                                    <span class="hidden-text">Открыто</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="15">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava3.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">Alexandr</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <p>The complexity of mining crypto currency is growing rapidly,
                                                                        and many crypto-currencies.</p>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe opening-succes">
                                                                    <span class="shown-text">Открыть в ответ</span>
                                                                    <span class="hidden-text">Открыто</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="21">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava1.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">john.baklan</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <textarea class="add-notification" placeholder="Добавить заметку до 100 символов"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe opening-succes">
                                                                    <span class="shown-text">Открыть в ответ</span>
                                                                    <span class="hidden-text">Открыто</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="21">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava1.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">john.baklan</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <textarea class="add-notification" placeholder="Добавить заметку до 100 символов"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe opening-succes">
                                                                    <span class="shown-text">Открыть в ответ</span>
                                                                    <span class="hidden-text">Открыто</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="15">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava3.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">Alexandr</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <p>The complexity of mining crypto currency is growing rapidly,
                                                                        and many crypto-currencies.</p>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe opening-succes">
                                                                    <span class="shown-text">Открыть в ответ</span>
                                                                    <span class="hidden-text">Открыто</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="15">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava3.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">Alexandr</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <p>The complexity of mining crypto currency is growing rapidly,
                                                                        and many crypto-currencies.</p>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe opening-succes">
                                                                    <span class="shown-text">Открыть в ответ</span>
                                                                    <span class="hidden-text">Открыто</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="21">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava1.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">john.baklan</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <textarea class="add-notification" placeholder="Добавить заметку до 100 символов"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe opening-succes">
                                                                    <span class="shown-text">Открыть в ответ</span>
                                                                    <span class="hidden-text">Открыто</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="21">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava1.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">john.baklan</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <textarea class="add-notification" placeholder="Добавить заметку до 100 символов"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe opening-succes">
                                                                    <span class="shown-text">Открыть в ответ</span>
                                                                    <span class="hidden-text">Открыто</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="subscribe-item user-access-item">
                                                            <div class="rate-avatar">
                                                                <div class="circle-wrapper grey-null-full" data-ptc="15">
                                                                    <div class="circle"></div>
                                                                </div>
                                                                <div class="avatar-user">
                                                                    <img src="images/ava3.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="name-block">
                                                                <div class="left-name-b">
                                                                    <h5><a href="">Alexandr</a></h5>
                                                                    <div class="date-b">17 дней осталось</div>
                                                                </div>
                                                                <div class="right-name-b">
                                                                    <p>The complexity of mining crypto currency is growing rapidly,
                                                                        and many crypto-currencies.</p>
                                                                </div>
                                                            </div>
                                                            <div class="btn-subscibe-block">
                                                                <a href="#" class="btn-subscribe opening-succes">
                                                                    <span class="shown-text">Открыть в ответ</span>
                                                                    <span class="hidden-text">Открыто</span>
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
                            <!-- Этот текст выводим когда идет подгрузка контента -->
                            <!--<div class="load-subscriber-text">-->
                            <!--<span>…   Загрузка</span>-->
                            <!--</div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>













</body>
</html>


<?php $this->endPage() ?>
