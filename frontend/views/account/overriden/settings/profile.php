<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use app\copmonents\widgets\showuser\ShowuserWidget;
use yii\helpers\Html;
use dektrium\user\helpers\Timezone;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var dektrium\user\models\Profile $modelProfile
 */

$this->title = Yii::t('user', 'Profile settings');
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>



<body class="footer-login-page">


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


<section class="setting-section">
    <div class="setting-section-inner">
        <?php $form = ActiveForm::begin([
            'id' => 'profile-form',
            'options' => ['class' => 'form-horizontal','multiple' => true],
//            'options' => [],
//            'fieldConfig' => [
//                'template' => "{label}\n<div class=\"col-lg-9\">{input}</div>\n<div class=\"col-sm-offset-3 col-lg-9\">{error}\n{hint}</div>",
//                'labelOptions' => ['class' => 'col-lg-3 control-label'],
//            ],
            'enableAjaxValidation' => true,
            'enableClientValidation' => false,
            'validateOnBlur' => false,
        ]); ?>


            <div class="content-container">
                <div class="settings-fields">
                    <div class="settings-fields-inner">
                        <div class="column-12">
                            <h1 class="text-center">Настройки аккаунта</h1>
                        </div>
                        <div class="column-12 input-row-wrapper">
                            <div class="avatar-row">
                                <div class="avatar-inner">
                                    
                                    <div class="round-avatar" style="background-image: url(<?=$modelUser->imageurl;?>);"></div>

                                    <div class="edit-avatar">

                                        <?= $form->field($modelUser, 'avatarUser')->fileInput(['id'=>'avatr-edit'])->label(false); ?>
                                     
                                        <label for="avatr-edit"><span class="icon-edit"></span></label>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="input-row">

                                <?= $form->field($modelProfile, 'name')->textInput(['maxlength' => 255, 'class' => 'emptyClassField'])->label(false); ?>
<!--                                <input type="text" value="Александр">-->
                                <label class="placeholder">Ваше Имя</label>
                            </div>
                            <div class="input-row">
                                <?= $form->field($modelUser, 'username')->textInput(['maxlength' => 255, 'class' => 'emptyClassField'])->label(false); ?>
                                <label class="placeholder">Никнейм</label>
                            </div>
                            <div class="input-row">
                                <?= $form->field($modelUser, 'email')->textInput(['class' => 'emptyClassField'])->label(false); ?>
                                <label class="placeholder">Email</label>
                            </div>
                            <div class="input-row">
                                <?= $form->field($modelUser, 'password')->passwordInput(['class' => 'emptyClassField'])->label(false); ?>
                                <label class="placeholder">Новый пароль - минимум 6 символов</label>
                            </div>

                            <div class="input-row hidden">
                                <?php // $form->field($modelAccount, 'new_password')->passwordInput(['class' => 'emptyClassField'])->label(false); ?>
                                <label class="placeholder">Новый пароль - минимум 6 символов</label>
                            </div>
                            <div class="input-row">
                                <input type="text" value="Я с 52 лет занимаюсь проффессиональным футболом.">
                                <label class="placeholder">Описание</label>
                            </div>
                            <div class="input-row">
                                <label class="title-row">Часто используемые букмекеры</label>
                                <div class="select-book-row">
                                    <div class="selected-book">
                                        <img src="/images/1xbet.png" alt="">
                                        <img src="/images/leon.png" alt="">
                                        <img src="/images/parimatch.png" alt="">
                                    </div>
                                    <div class="select-book-btn">
                                        <a href="#" class="select-btn-plus" data-toggle="modal" data-target="#modal-choose-bet"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="input-row text-center btn-row">
                                <button class="btn btn-hover btn-primary save-btn hidden">
                                    <i class="text-show">Применить</i>
                                    <i class="text-hide">Сохранено</i>
                                </button>
                                <?= Html::submitButton(Yii::t('user', 'Применить'), ['class' => 'btn btn-hover btn-primary']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
</section>

<footer class="main-footer front-footer">
    <div class="main-footer-inner">
        <div class="logo-footer">
            <a href="/">
                <img src="/images/logo.svg" alt="Look My Bet">
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
            <a href="#" class="shared-btn">
                <span class="icon-network"></span>
            </a>
        </div>
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
            <div class="copy-footer">
                <p>&copy; 2018 Look My Bet</p>
            </div>
            <div class="media-block">
                <a href="#" class="btn btn-default btn-hover" data-toggle="modal" data-target="#modal-feedback">оставить отзыв <span></span></a>
                <a href="#" class="btn btn-default hover-btn btn-hover">реклама <span></span></a>
            </div>
            <div class="arrow-top">
                <a href="#" id="top-btn"><span class="icon-arrow_up"></span></a>
            </div>
        </div>
    </div>
</footer>


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
                                        <h4>78Что Такое группа?</h4>
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
                                        <h4>Что Такое канал?11</h4>
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
                                    <div class="event-block">
                                        <div class="event-item">
                                            <div class="row delete-row">
                                                <div class="column-12">
                                                    <a href="#" class="delete-event">- Удалить</a>
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
                                        </div>
                                    </div>
                                    <div class="row add-event-row">
                                        <div class="column-12">
                                            <div class="add-event-btn-wrap">
                                                <a href="#" class="add-event-btn">+   Добавить Событие</a>
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














<?php if(0){  ?>

    <?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>

    <div class="row">
        <div class="col-md-3">
            <?= $this->render('_menu') ?>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?= Html::encode($this->title) ?>
                </div>
                <div class="panel-body">


                    <?php $form = ActiveForm::begin([
                        'id' => 'profile-form',
                        'options' => ['class' => 'form-horizontal'],
                        'fieldConfig' => [
                            'template' => "{label}\n<div class=\"col-lg-9\">{input}</div>\n<div class=\"col-sm-offset-3 col-lg-9\">{error}\n{hint}</div>",
                            'labelOptions' => ['class' => 'col-lg-3 control-label'],
                        ],
                        'enableAjaxValidation' => true,
                        'enableClientValidation' => false,
                        'validateOnBlur' => false,
                    ]); ?>


                    <?= $form->field($modelProfile, 'name') ?>

                    <?= $form->field($modelProfile, 'public_email') ?>

                    <?= $form->field($modelProfile, 'website') ?>

                    <?= $form->field($modelProfile, 'location') ?>

                    <?= $form
                        ->field($modelProfile, 'timezone')
                        ->dropDownList(
                            ArrayHelper::map(
                                Timezone::getAll(),
                                'timezone',
                                'name'
                            )
                        ); ?>

                    <?= $form
                        ->field($modelProfile, 'gravatar_email')
                        ->hint(Html::a(Yii::t('user', 'Change your avatar at Gravatar.com'), 'http://gravatar.com')) ?>

                    <?= $form->field($modelProfile, 'bio')->textarea() ?>

                    <div class="form-group">
                        <div class="col-lg-offset-3 col-lg-9">
                            <?= Html::submitButton(Yii::t('user', 'Save'), ['class' => 'btn btn-block btn-success']) ?>
                            <br>
                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>

<?php } ?>

