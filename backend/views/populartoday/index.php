<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\CenterturnireSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Популярное сегодня';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="centerturnire-index">

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
            'sportid:ntext',
            'name:ntext',

            'sort',
            [
                'attribute'=>'status',
                'value' => function($data) {

                    if ($data->status == 0) return 'Вкл.';
                    else return 'Выкл.';
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
