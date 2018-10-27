<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PopularsportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Вид спорта';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="popularsport-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить вид спорта', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
            'id',
        [
            'label' => 'Название спорта',
            'attribute' => 'sport_id',
//            'filter' => ['0' => 'Elementary', '1' => 'Secondary', '2' => 'Higher'],
//            'filterInputOptions' => ['prompt' => 'All educations', 'class' => 'form-control', 'id' => null ]
                'content'=>function($data){
                    return sprintf('%s ( %s) ',$data->relsport->sport_name,$data->relsport->id ) ;
                }
        ],
//            'sport_id',
            [
                'label' => 'Перезаписываемое значение',
                'attribute' => 'name',
//            'filter' => ['0' => 'Elementary', '1' => 'Secondary', '2' => 'Higher'],
//            'filterInputOptions' => ['prompt' => 'All educations', 'class' => 'form-control', 'id' => null ]
            ],
//            'name',

            [
                'attribute' => 'status',
                'content'=>function($data){
                    return $data->status?"Активный":"Отключен"; ;
                }
            ],
            'sort',
//            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
