<?php

use common\models\services\UserInfo;
use common\models\Wager;
use common\models\Wagerelements;
use yii\helpers\Url;


/**@var Wager $model */
/**@var UserInfo $userInfo */



?>
<div class="modal-wrapper bet-modal modal-860 active" id="bet_" style="display: block;">
    <div class="modal-inner">
        <div class="modal-content">
            <div class="modal-content-inner">
                <div class="header-modal">
                    <button class="close" data-toggle="modal-dismiss" onclick="Custombox.modal.closeAll(); return false; "><span class="icon-close2"></span></button>
                </div>
                <div class="body-modal">
                    <div class="bet-modal-inner">
                        <div class="head-bets">
                            <div class="row-ava">
                                <div class="rate-avatar">
                                    <div class="circle-wrapper" data-ptc="<?=$userInfo->getUserLevelNumber()?>">
                                        <div class="circle"><canvas width="74" height="74"></canvas></div>
                                    </div>
                                    <div class="avatar-user">
                                        <img src="/<?=$userInfo->getUserImage();?>" alt="<?=$userInfo->getUserName()?>">
                                    </div>
                                </div>
                                <div class="user-info">
                                    <h4 class="name-r"><?=$userInfo->getUserName()?></h4>
                                    <div class="level-user level-user-label">
                                        <div class="level-text"><?=$userInfo->getUserLevel()?></div>
                                        <?php if($userInfo->getisPro()){   ?>
                                            <span class="label-user label-user-pro">pro</span>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="body-bets" id="modalePetoBody">
                            <div class="table-bets wrapModaleText" >
                                <p style="color: lightcoral;">Функция отправки сообщения еще в разработке</p>
                                <p>Этот прогноз "Закрытый" для того чтобы его узнать нужно написать сообщения автору.</p>
                                <br>
                                <ul style="list-style: initial;">
                                    <li>Закрытый - это тип прогноза, который доступен только вам и людям, которым вы открыли доступ для просмотра. Возможность использования появляется при достижении 6 уровня аккаунта ( от 25,001% профита уровень PRO)</li>
                                    <li> Как получить доступ к закрытым прогнозам других пользователей?
                                        В этом случае, вы связываетесь на прямую с человеком у которого хотите получить доступ к закрытым прогнозам.</li>
                                    <li>
                                        На какой срок могу получить/дать доступ к закрытым прогнозам?<br>
                                        + Доступ предоставляется на: <br>

                                        - 1 день <br>
                                        - 2 дня <br>
                                        - 3 дня <br>
                                        - 5 дней <br>
                                        - 1 неделя <br>
                                        - 2 недели <br>
                                        - 1 месяц <br>
                                        - 3 месяца <br>
                                        - навсегда <br>
                                        <br>
                                        <p>Отсчет времени начинается с того момента, как был открыт доступ.</p>
                                    </li>
                                </ul>
                                <br>
                                <hr>
                                <div class="col-md-12">
                                    <form  id="formPeto" onsubmit="sendPeto(); return false;" method="post" action="<?= Url::to(['/subscribers/default/add-message']);?>">
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Написать сообщение</label><br>
                                            <textarea autofocus maxlength="180" id="petoMessage" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="текст сообщения (180 знаков)"></textarea>
                                        </div>
                                        <div class="form-group pull-right">
                                            <input  id="petoUserId" type="hidden" name="user" value="<?=Yii::$app->user->id;?>">

                                            <button type="submit" class="btn btn-primary">Отправить</button>
                                        </div>
                                    </form>
                                </div>





                            </div>
                        </div>
                        <div class="footer-bets">
                            <div class="text-footer-bets">
                                <div class="text-bets">
                                    <p></p>
                                </div>
                                <div class="static-footer-bets">

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
