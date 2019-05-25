<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 29.03.2019
 * Time: 6:52
 */

use yii\helpers\Url;

?>
<footer class="main-footer front-footer">
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
            <div class="btn-shared">
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
                        <a href="https://www.instagram.com/lookmybet/"target="_blank">
                            <span class="icon-insta"></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="copy-footer" style="margin-right: 42%;">
                <p>&copy; <?=date('Y')?> Look My Bet</p>
            </div>
            <div class="media-block hidden">
                <a href="#" class="btn btn-primary btn-hover" data-toggle="modal" data-target="#modal-feedback">оставить отзыв <span></span></a>
                <a href="#" class="btn btn-primary btn-hover">реклама <span></span></a>
            </div>
            <div class="arrow-top">
                <a href="#" id="top-btn"><span class="icon-arrow_up"></span></a>
            </div>
        </div>
    </div>
</footer>
