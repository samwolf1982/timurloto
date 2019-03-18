<?php

use common\models\DTO\WagerInfoFrontSingle;
use common\models\helpers\ConstantsHelper;
use yii\helpers\Html;
use yii\helpers\Url;


?>


<div class="table-wrapper table-winner">
    <div class="table-inner">
        <div class="table-head">
            <div class="tbl-icon">
                <img src="/images/top_star.svg" alt="">
            </div>
            <div class="left-head-text">
                <span class="text-head"><?=$text?></span>
            </div>
        </div>

        <div class="table-body">
            <div class="wins-slider">


                <?php foreach ($models as $ii => $model) { ?>
                    <div class="wins-item">
                        <div class="wins-item-inner">
                            <div class="date-wins"><?=$model->getPeriod($ii)?> </div>
                            <div class="row-ava">
                                <div class="rate-avatar-column">
                                    <div class="rate-avatar">
                                        <div class="circle-wrapper" data-ptc="<?=$model->userinfo->getUserLevelNumber() ?>">
                                            <a href="<?=Url::toRoute(['/account','id'=>$model->user->id])?>">    <div class="circle"></div>  </a>
                                        </div>
                                        <div class="avatar-user">
                                               <img src="/<?=$model->user->imageurl?>  " alt="<?=$model->user->username ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="user-info">
                                    <a href="<?=Url::toRoute(['/account','id'=>$model->user->id])?>"> <h4 class="name-r"><?=$model->user->username ?></h4> </a>
                                    <div class="level-user level-user-label">
                                        <div class="level-text">Уровень <?=$model->userinfo->getUserLevelNumber() ?></div>
                                        <?php if( $model->userinfo->getisPro() ){ ?>
                                            <span class="label-user label-user-pro">pro</span>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>




            </div>
        </div>


        <div class="table-footer">
            <div class="pagination slider-navigation" id="winner-nav">
                <div class="slider-navigation-inner">
                </div>
            </div>
        </div>
    </div>
</div>

<?php if(0){ // верстка ?>

    <div class="table-wrapper table-winner">
        <div class="table-inner">
            <div class="table-head">
                <div class="tbl-icon">
                    <img src="/images/top_star.svg" alt="">
                </div>
                <div class="left-head-text">
                    <span class="text-head"><?=$text?></span>
                </div>
            </div>

            <div class="table-body">
                <div class="wins-slider">
                    <div class="wins-item">
                        <div class="wins-item-inner">
                            <div class="date-wins">2.05-9.05</div>
                            <div class="row-ava">
                                <div class="rate-avatar-column">
                                    <div class="rate-avatar">
                                        <div class="circle-wrapper" data-ptc="11">
                                            <div class="circle"></div>
                                        </div>
                                        <div class="avatar-user">
                                            <img src="/images/ava1.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="user-info">
                                    <h4 class="name-r">john.baklan</h4>
                                    <div class="level-user level-user-label">
                                        <div class="level-text">Уровень 11</div>
                                        <span class="label-user label-user-pro">pro</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wins-item">
                        <div class="wins-item-inner">
                            <div class="date-wins">12.05-9.05</div>
                            <div class="row-ava">
                                <div class="rate-avatar-column">
                                    <div class="rate-avatar">
                                        <div class="circle-wrapper" data-ptc="14">
                                            <div class="circle"></div>
                                        </div>
                                        <div class="avatar-user">
                                            <img src="/images/ava2.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="user-info">
                                    <h4 class="name-r">john.baklan</h4>
                                    <div class="level-user level-user-label">
                                        <div class="level-text">Уровень 14</div>
                                        <span class="label-user label-user-pro">pro</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wins-item">
                        <div class="wins-item-inner">
                            <div class="date-wins">2.05-9.05</div>
                            <div class="row-ava">
                                <div class="rate-avatar-column">
                                    <div class="rate-avatar">
                                        <div class="circle-wrapper" data-ptc="21">
                                            <div class="circle"></div>
                                        </div>
                                        <div class="avatar-user">
                                            <img src="/images/ava3.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="user-info">
                                    <h4 class="name-r">john.baklan</h4>
                                    <div class="level-user level-user-label">
                                        <div class="level-text">Уровень 21</div>
                                        <span class="label-user label-user-pro">pro</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wins-item">
                        <div class="wins-item-inner">
                            <div class="date-wins">2.05-9.05</div>
                            <div class="row-ava">
                                <div class="rate-avatar-column">
                                    <div class="rate-avatar">
                                        <div class="circle-wrapper" data-ptc="2">
                                            <div class="circle"></div>
                                        </div>
                                        <div class="avatar-user">
                                            <img src="/images/ava4.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="user-info">
                                    <h4 class="name-r">john.baklan</h4>
                                    <div class="level-user level-user-label">
                                        <div class="level-text">Уровень 2</div>
                                        <span class="label-user label-user-pro">pro</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wins-item">
                        <div class="wins-item-inner">
                            <div class="date-wins">2.05-9.05</div>
                            <div class="row-ava">
                                <div class="rate-avatar-column">
                                    <div class="rate-avatar">
                                        <div class="circle-wrapper" data-ptc="17">
                                            <div class="circle"></div>
                                        </div>
                                        <div class="avatar-user">
                                            <img src="/images/ava5.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="user-info">
                                    <h4 class="name-r">john.baklan</h4>
                                    <div class="level-user level-user-label">
                                        <div class="level-text">Уровень 17</div>
                                        <span class="label-user label-user-pro">pro</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wins-item">
                        <div class="wins-item-inner">
                            <div class="date-wins">2.05-9.05</div>
                            <div class="row-ava">
                                <div class="rate-avatar-column">
                                    <div class="rate-avatar">
                                        <div class="circle-wrapper" data-ptc="20">
                                            <div class="circle"></div>
                                        </div>
                                        <div class="avatar-user">
                                            <img src="/images/ava1.png" alt="">
                                        </div>
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
                    </div>
                    <div class="wins-item">
                        <div class="wins-item-inner">
                            <div class="date-wins">2.05-9.05</div>
                            <div class="row-ava">
                                <div class="rate-avatar-column">
                                    <div class="rate-avatar">
                                        <div class="circle-wrapper" data-ptc="20">
                                            <div class="circle"></div>
                                        </div>
                                        <div class="avatar-user">
                                            <img src="/images/ava1.png" alt="">
                                        </div>
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
                    </div>
                    <div class="wins-item">
                        <div class="wins-item-inner">
                            <div class="date-wins">2.05-9.05</div>
                            <div class="row-ava">
                                <div class="rate-avatar-column">
                                    <div class="rate-avatar">
                                        <div class="circle-wrapper" data-ptc="20">
                                            <div class="circle"></div>
                                        </div>
                                        <div class="avatar-user">
                                            <img src="/images/ava1.png" alt="">
                                        </div>
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
                    </div>
                    <div class="wins-item">
                        <div class="wins-item-inner">
                            <div class="date-wins">2.05-9.05</div>
                            <div class="row-ava">
                                <div class="rate-avatar-column">
                                    <div class="rate-avatar">
                                        <div class="circle-wrapper" data-ptc="20">
                                            <div class="circle"></div>
                                        </div>
                                        <div class="avatar-user">
                                            <img src="/images/ava1.png" alt="">
                                        </div>
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
                    </div>
                    <div class="wins-item">
                        <div class="wins-item-inner">
                            <div class="date-wins">2.05-9.05</div>
                            <div class="row-ava">
                                <div class="rate-avatar-column">
                                    <div class="rate-avatar">
                                        <div class="circle-wrapper" data-ptc="20">
                                            <div class="circle"></div>
                                        </div>
                                        <div class="avatar-user">
                                            <img src="/images/ava1.png" alt="">
                                        </div>
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
                    </div>
                    <div class="wins-item">
                        <div class="wins-item-inner">
                            <div class="date-wins">2.05-9.05</div>
                            <div class="row-ava">
                                <div class="rate-avatar-column">
                                    <div class="rate-avatar">
                                        <div class="circle-wrapper" data-ptc="20">
                                            <div class="circle"></div>
                                        </div>
                                        <div class="avatar-user">
                                            <img src="/images/ava1.png" alt="">
                                        </div>
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
                    </div>
                    <div class="wins-item">
                        <div class="wins-item-inner">
                            <div class="date-wins">2.05-9.05</div>
                            <div class="row-ava">
                                <div class="rate-avatar-column">
                                    <div class="rate-avatar">
                                        <div class="circle-wrapper" data-ptc="20">
                                            <div class="circle"></div>
                                        </div>
                                        <div class="avatar-user">
                                            <img src="/images/ava1.png" alt="">
                                        </div>
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
                    </div>
                    <div class="wins-item">
                        <div class="wins-item-inner">
                            <div class="date-wins">2.05-9.05</div>
                            <div class="row-ava">
                                <div class="rate-avatar-column">
                                    <div class="rate-avatar">
                                        <div class="circle-wrapper" data-ptc="20">
                                            <div class="circle"></div>
                                        </div>
                                        <div class="avatar-user">
                                            <img src="/images/ava1.png" alt="">
                                        </div>
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
                    </div>
                    <div class="wins-item">
                        <div class="wins-item-inner">
                            <div class="date-wins">2.05-9.05</div>
                            <div class="row-ava">
                                <div class="rate-avatar-column">
                                    <div class="rate-avatar">
                                        <div class="circle-wrapper" data-ptc="20">
                                            <div class="circle"></div>
                                        </div>
                                        <div class="avatar-user">
                                            <img src="/images/ava1.png" alt="">
                                        </div>
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
                    </div>
                    <div class="wins-item">
                        <div class="wins-item-inner">
                            <div class="date-wins">2.05-9.05</div>
                            <div class="row-ava">
                                <div class="rate-avatar-column">
                                    <div class="rate-avatar">
                                        <div class="circle-wrapper" data-ptc="20">
                                            <div class="circle"></div>
                                        </div>
                                        <div class="avatar-user">
                                            <img src="/images/ava1.png" alt="">
                                        </div>
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
                    </div>
                </div>
            </div>


            <div class="table-footer">
                <div class="pagination slider-navigation" id="winner-nav">
                    <div class="slider-navigation-inner">
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

