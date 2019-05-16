<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 19.11.2018
 * Time: 13:15
 */

use common\models\User;
use common\models\Subscriber;
use yii\helpers\Url;

?>


<div class="choose-bet-wrapper">
    <div class="choose-bet-inner">
        <div class="head-choose">
            <div class="tabs-modal-trigger">
                <ul class="tabs-nav">
                    <li class="active">
                        <a href="#tab1">Я открыл <span class="text-muted countOpenMe" ><?=count($openMe)?></span></a>
                    </li>
                    <li>
                        <a href="#tab2">Мне открыли <span class="text-muted countOpenForMe"><?=count($openForMe)?></span></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tabs-modal-block" id="subscribersModalBlock">
            <div class="tabs-modal-block-inner">



                <div class="tabs-item TabOpenMe active" id="tab1">
                    <div class="tabs-item-inner">
                        <div class="list-block-subscribe">
                            <div class="list-block-subscribe-inner" data-simplebar data-simplebar-auto-hide="true">
                                <div class="for-scroll">


                                    <?php if( empty( $openMe)){  ?>
                                        <div class="subscribe-item user-access-item" style="justify-content: center;">
                                            <p style="color: black;"> Вы еще никому не открыли доступ</p>
                                        </div>
                                    <?php }else{  ?>
                                    <?php
                                    /** @var Subscriber $us */
                                    foreach ($openMe as $sub) { ?>
                                        <div class="subscribe-item user-access-item subscribe-item_<?=$sub->usersub->id?>">
                                            <div class="rate-avatar">
                                                <div class="circle-wrapper grey-null-full" data-ptc="15">
                                                    <div class="circle"></div>
                                                </div>
                                                <div class="avatar-user">



                                                    <img src="/<?=$sub->usersub->imguse->avatar?>" alt="">


                                                </div>
                                            </div>
                                            <div class="name-block">
                                                <div class="left-name-b">
                                                    <h5><a href="<?=Url::to(['/account/'.$sub->usersub->id]);?>"><?=$sub->usersub->username?></a></h5>
                                                    <div class="date-b"><?=$sub->getFormatedExpired()?> </div>
                                                </div>
                                                <div class="right-name-b">
                                                        <textarea data-parent-id="<?=$sub->usersub->id?>" class="add-notification" placeholder="Добавить заметку до 100 символов"><?php if(!empty($sub->text)){ ?><?=$sub->text?><?php } ?></textarea>
                                                </div>
                                            </div>
                                            <div class="btn-subscibe-block">
                                                <?php if($sub->checkExpiredTime()){ ?>
                                                    <a href="<?=Url::to(['/account/'.$sub->usersub->id]);?>" class="btn-subscribe">
                                                        <span class="shown-text">Открыть Доступ</span>
                                                    </a>
                                              <?php  }else{ ?>
                                                    <a href="#" class="btn-subscribe" data-parent-id="<?=$sub->usersub->id?>">
                                                        <span class="shown-text">Закрыть Доступ</span>
                                                        <span class="hidden-text">Открыть Доступ</span>
                                                    </a>
                                               <?php  } ?>

                                            </div>
                                        </div>
                                   <?php  } }?>




                                    <?php if(0){ ?>
                                        <div class="subscribe-item user-access-item">
                                            <div class="rate-avatar">
                                                <div class="circle-wrapper grey-null-full" data-ptc="21">
                                                    <div class="circle"></div>
                                                </div>
                                                <div class="avatar-user">
                                                    <img src="/images/ava1.png" alt="">
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
                                                    <img src="/images/ava1.png" alt="">
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
                                                    <img src="/images/ava3.png" alt="">
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
                                                    <img src="/images/ava3.png" alt="">
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
                                                    <img src="/images/ava1.png" alt="">
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
                                                    <img src="/images/ava1.png" alt="">
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
                                                    <img src="/images/ava3.png" alt="">
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
                                                    <img src="/images/ava3.png" alt="">
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
                                                    <img src="/images/ava1.png" alt="">
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
                                                    <img src="/images/ava1.png" alt="">
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
                                                    <img src="/images/ava3.png" alt="">
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
                                                    <img src="/images/ava3.png" alt="">
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
                                                    <img src="/images/ava1.png" alt="">
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
                                                    <img src="/images/ava1.png" alt="">
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
                                                    <img src="/images/ava3.png" alt="">
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
                                                    <img src="/images/ava3.png" alt="">
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
                                                    <img src="/images/ava1.png" alt="">
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
                                                    <img src="/images/ava1.png" alt="">
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
                                                    <img src="/images/ava3.png" alt="">
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
                                                    <img src="/images/ava3.png" alt="">
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
                                                    <img src="/images/ava1.png" alt="">
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
                                                    <img src="/images/ava1.png" alt="">
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
                                                    <img src="/images/ava3.png" alt="">
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
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="tabs-item TabOpenForMe" id="tab2" >
                    <div class="tabs-item-inner">
                        <div class="list-block-subscribe">
                            <div class="list-block-subscribe-inner" data-simplebar data-simplebar-auto-hide="true">
                                <div class="for-scroll">


                                    <?php if( empty( $openForMe)){  ?>
                                        <div class="subscribe-item user-access-item" style="justify-content: center;">
                                            <p style="color: black;"> Вам еще никто не открыл доступ</p>
                                        </div>
                                    <?php }else{  ?>
                                    <?php
                                     /** @var Subscriber $us */
                                    foreach ($openForMe as $sub) { ?>
                                    <div class="subscribe-item user-access-item">
                                        <div class="rate-avatar">
                                            <div class="circle-wrapper grey-null-full" data-ptc="15">
                                                <div class="circle"></div>
                                            </div>
                                            <div class="avatar-user">
                                                <img src="/<?=$sub->usersub->imguse->avatar?>" alt="">
                                                <img src="/<?=$sub->imguse->avatar?>" alt="">
                                            </div>
                                        </div>
                                        <div class="name-block">
                                            <div class="left-name-b">
                                                <h5><a href="<?=Url::to(['/account/'.$sub->user_own_id]);?>">
                                                        <?=$sub->userown->username?>
                                                    </a></h5>
                                                <div class="date-b"><?=$sub->getFormatedExpired()?></div>
                                            </div>
                                            <div class="right-name-b">
                                                <p></p>
                                            </div>
                                        </div>


                                        <div class="btn-subscibe-block">
                                            <a href="<?=Url::to(['/account/'.$sub->user_own_id]);?>" class="btn-subscribe opening-succes">

                                                <?php

                                              $u=  $sub->usersub->check_openly_in_response($sub->user_own_id);
                                              if($sub->usersub->check_openly_in_response($sub->user_own_id)){

                                                  echo ' <span class="shown-text">Открыто</span>';
                                                  echo ' <span class="hidden-text">Открыто</span>';
                                              }else{
                                                  echo '  <span class="shown-text">Открыть в ответ</span>';
                                                  echo '  <span class="hidden-text">Открыто</span>';
                                              }
                                                ?>


                                            </a>
                                        </div>

                                    </div>
                                    <?php  } }  ?>


                                    <?php if(0){ ?>

                                    <div class="subscribe-item user-access-item">
                                        <div class="rate-avatar">
                                            <div class="circle-wrapper grey-null-full" data-ptc="21">
                                                <div class="circle"></div>
                                            </div>
                                            <div class="avatar-user">
                                                <img src="/images/ava1.png" alt="">
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
                                                <img src="/images/ava1.png" alt="">
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
                                                <img src="/images/ava3.png" alt="">
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
                                                <img src="/images/ava3.png" alt="">
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
                                                <img src="/images/ava1.png" alt="">
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
                                                <img src="/images/ava1.png" alt="">
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
                                                <img src="/images/ava3.png" alt="">
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
                                                <img src="/images/ava3.png" alt="">
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
                                                <img src="/images/ava1.png" alt="">
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
                                                <img src="/images/ava1.png" alt="">
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
                                                <img src="/images/ava3.png" alt="">
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
                                                <img src="/images/ava3.png" alt="">
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
                                                <img src="/images/ava1.png" alt="">
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
                                                <img src="/images/ava1.png" alt="">
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
                                                <img src="/images/ava3.png" alt="">
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
                                                <img src="/images/ava3.png" alt="">
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
                                                <img src="/images/ava1.png" alt="">
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
                                                <img src="/images/ava1.png" alt="">
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
                                                <img src="/images/ava3.png" alt="">
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
                                                <img src="/images/ava3.png" alt="">
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
                                                <img src="/images/ava1.png" alt="">
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
                                                <img src="/images/ava1.png" alt="">
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
                                                <img src="/images/ava3.png" alt="">
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
                                    <?php  }?>

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
