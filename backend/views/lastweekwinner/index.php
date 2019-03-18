<?php

use common\models\overiden\User;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\LastweekwinnerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'победители предыдущих недель';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lastweekwinners-index">

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
//            'uid',
            [
                'label' => 'Имя',
                'format' => 'raw',
                'value' => function($data){
                    $u=  User::find()->where(['id'=>$data->uid])->one();
                    return $u->username . " ({$data->uid})" ;
                },
            ],



            [
                'label' => 'Фото',
                'format' => 'raw',
                'value' => function($data){
                    $u=  User::find()->where(['id'=>$data->uid])->one();
                    return Html::img(Url::to('https://lookmybets.com/'. $u->imageurl),[
                        'alt'=>'yii2 - картинка в gridview',
                        'style' => 'width:55px; border-radius: 50%;'
                    ]);
                },
            ],


            [
                'attribute'=>'status',
                'value' => function($data) {

                    if ($data->status == 0) return 'Вкл.';
                    else return 'Выкл.';
                }
            ],
            'sort',


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
