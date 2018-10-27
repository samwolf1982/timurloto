<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\PopularturnireSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Турниры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="popularturnire-index">

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

           // 'id',

            [
                'label' => 'Страна',
                'attribute' => 'country_id_id',
//            'filter' => ['0' => 'Elementary', '1' => 'Secondary', '2' => 'Higher'],
//            'filterInputOptions' => ['prompt' => 'All educations', 'class' => 'form-control', 'id' => null ]
                'content'=>function($data){

                    return sprintf('%s ( %s) ',$data->relcountry->category_name,$data->relcountry->category_id ) ;
                }
            ],

            [
                'label' => 'Турнир',
                'attribute' => 'selected_turnire_id',
//            'filter' => ['0' => 'Elementary', '1' => 'Secondary', '2' => 'Higher'],
//            'filterInputOptions' => ['prompt' => 'All educations', 'class' => 'form-control', 'id' => null ]
                'content'=>function($data){

                    return sprintf('%s ( %s) ',$data->relturnire->tournament_name,$data->relturnire->tournament_id ) ;
                }
            ],

//            'country_id_id',
          //  'selected_turnire_id',
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
