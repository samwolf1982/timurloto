<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\PopularwigetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ПОПУЛЯРНОЕ (лево)';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="popularwiget-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'logo',
            'sportname:ntext',
            'turnirename:ntext',
            'turnireid:ntext',
            'sort',
            [
                'attribute'=>'status',
                'value' => function($data) {

                    if ($data->status == 0) return 'Вкл.';
                    else return 'Выкл.';
                }
            ],
            //'count',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
