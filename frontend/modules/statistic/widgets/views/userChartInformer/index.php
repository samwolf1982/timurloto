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

<?php
//$this->registerJs( <<< EOT_JS_CODE
//var userChartUrl='/account/chart';
//EOT_JS_CODE
//);


$hr= <<< EOT_JS_CODE
<script>
   var userChartUrl='{$chartUrl}'; 
</script>
EOT_JS_CODE;
echo  $hr;
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
            <div class="right-head-tab "  style="opacity: 0;">
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


                <?php if($countChart>1){  ?>
                    <div id="containerChart" style="height: 400px; min-width: 100%">

                    </div>
               <?php  }else{ ?>
                    <style>
                        #containerChartEmpty{
                            color: white;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                        }
                    </style>
                    <div id="containerChartEmpty" style="height: 400px; min-width: 100%">
                      Не достаточно статистики для отображения графика
                    </div>
                <?php } ?>



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



