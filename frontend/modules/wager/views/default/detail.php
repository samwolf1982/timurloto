<?php

use common\models\services\UserInfo;
use common\models\Wager;
use common\models\Wagerelements;


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
                        <div class="body-bets">
                            <div class="table-bets">


                                <?php
                                /** @var Wagerelements $item */
                                foreach ($model->wagerelements  as $k => $item) { //var_dump($item);die(); ?>
                                    <div class="table-bets-row">
                                    <div class="count-row__t"><?=$k+1?></div>
                                    <div class="item-tbl-row-bts">
                                        <div class="title__t"><?=$item->sport_name ?></div>
                                        <div class="value__t"><?=$item->name ?></div>
                                    </div>
                                    <div class="item-tbl-row-bts">
                                        <div class="title__t"><?= $item->getFormantedStartGame(); ?></div>
                                        <div class="value__t">  <?=$item->getFormantedNameAndPercent() ?></div>

                                    </div>
                                </div>
                              <?php   } ?>
                                <?php if(0){  // delete ?>
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
                                <?php  } ?>
                            </div>
                        </div>
                        <div class="footer-bets">
                            <div class="text-footer-bets">
                                <div class="text-bets">
                                    <p><?=$model->comment ?></p>
                                </div>
                                <div class="static-footer-bets">
                                    <div class="static-footer-bets-title"><?=$model->getTypeWager() ?></div>
                                    <div class="static-footer-bets-value"><?=$model->getTotalAndPercent()?></div>
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
