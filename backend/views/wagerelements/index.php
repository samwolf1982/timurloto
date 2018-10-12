<?php

use common\models\Wager;
use yii\helpers\Html;
use yii\grid\GridView;
use yii2mod\editable\EditableColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WagerelementsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Исходы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wagerelements-index">

    <h1><?= Html::encode($this->title) ?></h1>


<?php  if(Yii::$app->session->getFlash('success')){ ?>
    <div id="message" class="alert alert-success fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="fa fa-check"></i>&nbsp;Успешно</h4> <?= Yii::$app->session->getFlash('success');?>
    </div>
<?php } ?>



    <p>
        <?= Html::a('Подтвердить', ['confirm'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
           // 'wager_id',
//            'count',
            [

                'attribute' => 'countevents',
                'format'=>'raw',
                'value'=>function($model){
                    return $model->countevents;
                }
            ],
            'coef',
            'event_id',
           // 'event_id',
//            'outcome_id',

        //    'sport_id',
            'sport_name',


            //'country_id',
            'country_name',

           // 'category_id',
            'category_name',

          //  'sub_category_id',
            'sub_category_name',

//            'name',
            [

                'attribute' => 'infoName',
                'format'=>'raw',
                'value'=>function($model){
                    return      Html::tag('p',$model->info_main_cat_name). Html::tag('p',$model->info_name). Html::tag('p',$model->info_cat_name);
//                    return      sprintf('$s | $s | $s') $model->countevents;
                }
            ],


//            'info_main_cat_name',
//            'info_name',
//            'info_name_full',
//            'info_cat_name',

         //   'status',
            [
                'class' => EditableColumn::className(),
                'attribute' => 'status',
                'url' => ['change-status'],
                'type' => 'select',
                'editableOptions' => function ($model) {
                    return [
//                    'source' => [1 => 'Active', 2 => 'Deleted'],
//                        'source' => Wager::getStatusNames(),
                        'source' => Wager::getStatusNamesIshod(),
                        'value' =>  $model->status,

                    ];
                },
                'format'=>'raw',
                'value'=>function($model){
                    if($model->status==Wager::STATUS_NEW){
                        return Html::tag('p',   Wager::getStatusName($model->status),['class'=>'text-danger']);
                    }
                        return Html::tag('p',   Wager::getStatusName($model->status),[]);



                }

            ],
            //'created_at',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<script>

    window.onload = function() {
        setTimeout(function () {
            $('#message').hide();
        },8000)
    }


</script>