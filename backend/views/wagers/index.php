<?php

use common\models\Wager;
use yii\helpers\Html;
use yii\grid\GridView;
use yii2mod\editable\EditableColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WagerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Wagers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wager-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Wager', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'playlist_id',
            'total',
            'coef',
            //'comment:ntext',
//            'status',
            [
            'class' => EditableColumn::className(),
            'attribute' => 'status',
            'url' => ['change-status'],
            'type' => 'select',
            'editableOptions' => function ($model) {
                return [
//                    'source' => [1 => 'Active', 2 => 'Deleted'],
                    'source' => Wager::getStatusNames(),
                    'value' =>  $model->status,

                ];
            },
                'format'=>'raw',
                'value'=>function($model){
                    return Wager::getStatusName($model->status);
                }

             ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
