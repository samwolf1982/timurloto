<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\BalancestatisticsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Balancestatistics';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="balancestatistics-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Balancestatistics', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'wager_id',
            'playlist_id',
            'event_id',
            //'profit',
            //'penetration',
            //'middle_coef',
            //'roi',
            //'plus',
            //'minus',
            //'created_at',
            //'created_own',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
