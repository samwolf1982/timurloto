<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use app\copmonents\widgets\addbet\AddbetWidget;
use app\copmonents\widgets\showuser\ShowuserWidget;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var dektrium\user\models\User $model
 * @var dektrium\user\models\Account $account
 */

$this->title = Yii::t('user', 'Sign in');
$this->params['breadcrumbs'][] = $this->title;
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
        <?php  if(Yii::$app->user->isGuest){   ?>
            <?= ShowuserWidget::widget(['userdata' => [],'view'=>'index']) ?>
        <?php }else{ ?>
            <?= ShowuserWidget::widget(['userdata' => [],'view'=>'other']) ?>
        <?php }  ?>





    </div>
</header>

<section class="modal-s-wrap">
    <div class="modal-s-wrap-inner">
        <a href="#" class="btn btn-primary btn-hover" data-toggle="modal" data-target="#modal-gracc">
            модальное окно поздравляем
            <span></span>
        </a>
        <a href="#" class="btn btn-primary btn-hover" data-toggle="modal" data-target="#modal-best">
            модальное Все отлично!
            <span></span>
        </a>
        <a href="#" class="btn btn-primary btn-hover" data-toggle="modal" data-target="#modal-reset-cong">
            модальное Все отлично! Сброс пароля
            <span></span>
        </a>
        <a href="#" class="btn btn-primary btn-hover" data-toggle="modal" data-target="#modal-reset-password">
            модальное Сброс пароля
            <span></span>
        </a>
        <a href="#" class="btn btn-primary btn-hover" data-toggle="modal" data-target="#modal-login">
            модальное Логин
            <span></span>
        </a>
    </div>

    <?php if(1){ ?>
        <div class="row table-row">
            <div class="column-12">
                <div class="table-wrapper table-winner">
                    <div class="table-inner">
                        <div class="table-body">
                            <div class="head-bets-slider text-center" >
                                <h3 style="font-size: large;" ><?= Html::encode($this->title) ?></h3>


                            </div>
                            <div class="bets-slider2">
                                <div class="column-12 text-center " style="padding: 1em;">





                                    <div class="wrapFormreset text-center" style="display: flex; justify-content: center;">
                                        <div class="panel panel-default" style="width: 50%;">
                                            <div class="panel-heading">
                                                <h3 class="panel-title"> </h3>
                                            </div>
                                            <div class="panel-body">

                                                <div class="form-inner">

                                                    <div class="alert alert-info">
                                                        <p>
                                                            <?= Yii::t(
                                                                'user',
                                                                'In order to finish your registration, we need you to enter following fields'
                                                            ) ?>:
                                                        </p>
                                                    </div>


                                                    <?php if(0){  ?>
                                                        <?php $form = ActiveForm::begin([
                                                            'id' => 'connect-account-form',
                                                        ]); ?>

                                                        <?= $form->field($model, 'email') ?>

                                                        <?= $form->field($model, 'username') ?>

                                                        <?= Html::submitButton(Yii::t('user', 'Continue'), ['class' => 'btn btn-success btn-block']) ?>

                                                        <?php ActiveForm::end(); ?>
                                                    <?php } ?>

                                                    <?php if(1){  ?>
                                                        <?php $form = ActiveForm::begin([
                                                            'id' => 'connect-account-form',
                                                        ]); ?>

                                                        <?= $form->field($model, 'email')->label('Email',['class'=>'placeholder'])  ?>

                                                        <?= $form->field($model, 'username')->label('Никнейм',['class'=>'placeholder']) ?>

                                                        <?= Html::submitButton('Подтвердить', ['class' => 'btn big-btn btn-primary btn-hover']) ?>

                                                        <?php ActiveForm::end(); ?>
                                                    <?php } ?>





                                                </div>
                                                <p class="text-center">



                                                </p>


                                            </div>
                                        </div>
                                    </div>



                                    <div class="input-row pull-right2">
                                        <a href="#" class="btn btn-small btn-primary" id="openMadaInner" data-toggle="modal-reg" data-target="#modal-auth"><i class="icon-user"></i> <span><?=  Yii::t(
                                                    'user',
                                                    'If you already registered, sign in and connect this account on settings page');
                                                ?></span></a>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="table-footer">
                            <div class="pagination slider-navigation" id="bets-nav">
                                <div class="slider-navigation-inner">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>




</section>

<div class="modal-wrapper bet-modal modal-640" id="modal-login">
    <div class="modal-inner">
        <div class="modal-content">
            <div class="modal-content-inner">
                <div class="header-modal">
                    <button class="close" data-toggle="modal-dismiss"><span class="icon-close2"></span></button>
                </div>
                <div class="body-modal">
                    <div class="info-modal-wrapper">
                        <div class="info-modal-inner">
                            <h2 class="h1">Авторизируйтесь</h2>
                            <div class="text-block-modal muted-text">Чтобы закончить регистрацию, Вы должны заполнить следующие поля</div>
                            <form action="#">
                                <div class="form-modal">
                                    <div class="form-row">
                                        <input type="email" placeholder="Email">
                                    </div>
                                    <div class="form-row">
                                        <input type="text" placeholder="Никнейм">
                                    </div>
                                </div>
                                <div class="btn-block-choose justify-center">
                                    <button class="btn btn-hover btn-primary" >
                                        +  Продолжить
                                    </button>
                                    <div class="form-link" >
                                        <a href="/">Вернуться на главную</a>
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <?php $form = ActiveForm::begin([
                                'id' => 'connect-account-form',
                                'enableAjaxValidation' => true,
                            ]); ?>

                            <?= $form->field($model, 'email')->label('Email',['class'=>'placeholder'])  ?>

                            <?= $form->field($model, 'username')->label('Никнейм',['class'=>'placeholder']) ?>

                            <div class="btn-block-choose justify-center">
                            <?= Html::submitButton('Подтвердить', ['class' => 'btn btn-hover btn-primary']) ?>
                                <div class="form-link" >
                                    <a href="/">Вернуться на главную</a>
                                </div>
                            </div>


                            <?php ActiveForm::end(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="main-footer front-footer">
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

<!-- modad add bet -->
<?= AddbetWidget ::widget([]); ?>








<script src="/js/script.min.js"></script>
</body>



<?php if(0){ ?>
    <div class="row">
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
                </div>
                <div class="panel-body">
                    <div class="alert alert-info">
                        <p>
                            <?= Yii::t(
                                'user',
                                'In order to finish your registration, we need you to enter following fields'
                            ) ?>:
                        </p>
                    </div>
                    <?php $form = ActiveForm::begin([
                        'id' => 'connect-account-form',
                    ]); ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'username') ?>

                    <?= Html::submitButton(Yii::t('user', 'Continue'), ['class' => 'btn btn-success btn-block']) ?>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
            <p class="text-center">
                <?= Html::a(
                    Yii::t(
                        'user',
                        'If you already registered, sign in and connect this account on settings page'
                    ),
                    ['/user/settings/networks']
                ) ?>.
            </p>
        </div>
    </div>
<?php  } ?>


