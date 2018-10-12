<?php
use frontend\assets\MainAsset;

$this->title='LOOK MY BET';

MainAsset::register($this);
?>

<div class="site-index">

    <div class="jumbotron">
        <h1>Главная страничка</h1>

        <p class="lead">Для возможности делать прогноз пожалуйста войдите в свой аккаунт.</p>


                     <?php     if (Yii::$app->user->isGuest) { ?>
                         <p><a class="btn btn-lg btn-success" href="/user/login">Вход</a></p>
                     <?php }else{ ?>
                         <p><a class="btn btn-lg btn-success" href="/games">Перейти к играм</a></p>
                     <?php } ?>


    </div>

    <div class="body-content">

        <div class="row">

            <div class="col-sm-12 text-center">
                <div class="wrp_flex_center">
                    <img src="/upload/images/kak_pravilno_delat_stavki_na_footbol.png" alt="a" class="img-responsive">
                </div>

            </div>

            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
