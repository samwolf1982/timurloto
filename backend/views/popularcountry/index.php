<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\PopularcountrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Страны';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="popularcountry-index">

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

          //  'id',
            //'sport_id',
            [
                'label' => 'Вид спорта',
                'attribute' => 'sport_id',
//            'filter' => ['0' => 'Elementary', '1' => 'Secondary', '2' => 'Higher'],
//            'filterInputOptions' => ['prompt' => 'All educations', 'class' => 'form-control', 'id' => null ]
                'content'=>function($data){

                    return sprintf('%s ( %s) ',$data->relsport->sport_name,$data->relsport->id ) ;
                }
            ],

            [
                'label' => 'Cтрана',
                'attribute' => 'selected_country_id',
                'content'=>function($data){
                    return sprintf('%s ( %s) ',$data->relturnire->category_name,$data->relturnire->id ) ;
                }
            ],

            'name',

           // 'selected_country_id',
            'sort',
            [
                'attribute' => 'status',
                'content'=>function($data){
                    return $data->status?"Активный":"Отключен"; ;
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
