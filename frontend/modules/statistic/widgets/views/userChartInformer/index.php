<?php

use app\modules\statistic\models\WagerStatisticManager;
use common\models\DTO\WagerInfoFront;
use common\models\DTO\WagerInfoFrontSingle;
use common\models\helpers\ConstantsHelper;
use common\models\services\PageInfo;
use common\models\services\UserInfo;
use common\models\Wager;
use frontend\modules\statistic\widgets\assets\UserChartAssets;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;



UserChartAssets::register($this);

?>

<div class="table-wrapper stats-table" id="stat-block">
    <div class="table-inner">
        <div class="table-head head-with-tabs">
            <div class="tbl-icon">
                <img src="/images/stats.svg" alt="">
            </div>
            <div class="left-head-text">
                <span class="text-head">Доходность</span>
            </div>
            <div class="right-head-tab">
                <div class="for-mobile-drop">
                    <a href="#" class="trig-filter">За месяц</a>
                    <ul class="head-tabs">
                        <li>
                            <a href="#">Неделя</a>
                        </li>
                        <li class="active">
                            <a href="#">За месяц</a>
                        </li>
                        <li>
                            <a href="#">3 месяца</a>
                        </li>
                        <li>
                            <a href="#">Год</a>
                        </li>
                        <li>
                            <a href="#">За все время</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="table-body">
            <div class="chart-wrapper">

                <div id="containerChart" style="width:100%; height:400px;">
                    {{createChart}}
                </div>

            </div>
        </div>
    </div>
</div>





<?php if(0){ // cтарая верстка  ?>
    <div class="table-wrapper stats-table" id="stat-block">
        <div class="table-inner">
            <div class="table-head head-with-tabs">
                <div class="tbl-icon">
                    <img src="/images/stats.svg" alt="">
                </div>
                <div class="left-head-text">
                    <span class="text-head">Доходность</span>
                </div>
                <div class="right-head-tab">
                    <div class="for-mobile-drop">
                        <a href="#" class="trig-filter">За месяц</a>
                        <ul class="head-tabs">
                            <li>
                                <a href="#">Неделя</a>
                            </li>
                            <li class="active">
                                <a href="#">За месяц</a>
                            </li>
                            <li>
                                <a href="#">3 месяца</a>
                            </li>
                            <li>
                                <a href="#">Год</a>
                            </li>
                            <li>
                                <a href="#">За все время</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="table-body">
                <div class="chart-wrapper">
                    <img src="/images/charts.png" alt="">
                </div>
            </div>
        </div>
    </div>
<?php } ?>



