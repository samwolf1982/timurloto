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



    <?php if(0){ ?>
        <p>
            <?= Html::a('Подтвердить', ['confirm'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php } ?>


    <?php if(0){// показать все поля  ?>
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

                //------ coment
                'outcome_id',
                'sport_id',
                //------ coment

                'sport_name',

                //------ coment
                'country_id',
                //------ coment
                'country_name',

                //------ coment
                'category_id',
                //------ coment
                'category_name',

                //------ coment
                'sub_category_id',
                //------ coment
                'sub_category_name',
                //------ coment
                'name',
                //------ coment
                [

                    'attribute' => 'infoName',
                    'format'=>'raw',
                    'value'=>function($model){
                        return      Html::tag('p',$model->info_main_cat_name). Html::tag('p',$model->info_name). Html::tag('p',$model->info_cat_name);
//                    return      sprintf('$s | $s | $s') $model->countevents;
                    }
                ],

                //------ coment
                'info_main_cat_name',
                'info_name',
                'info_name_full',
                'info_cat_name',

                'status',
                //------ coment

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
                'created_at',

                //['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    <?php }else{  // только для продашн ?>
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

                //------ coment
                'outcome_id',
//                'sport_id',
                //------ coment

                'sport_name',

                //------ coment
//                'country_id',
                //------ coment

                'country_name',

                //------ coment
//                'category_id',
                //------ coment

                'category_name',

                //------ coment
//                'sub_category_id',
                //------ coment

                'sub_category_name',

                //------ coment
             //   'name',
                //------ coment
                [

                    'attribute' => 'infoName',
                    'format'=>'raw',
                    'value'=>function($model){
                        return      Html::tag('p',$model->info_main_cat_name). Html::tag('p',$model->info_name). Html::tag('p',$model->info_cat_name);
//                    return      sprintf('$s | $s | $s') $model->countevents;
                    }
                ],

                //------ coment
//                'info_main_cat_name',
//                'info_name',
//                'info_name_full',
//                'info_cat_name',
//
//                'status',
                //------ coment

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
                    'value'=>function($model){ // common\models\Wagerelements

                        if($model->status==Wager::STATUS_MANUAL_BET){
                            return Html::tag('p',   Wager::getStatusName($model->status),['class'=>'text-danger']);
                        }
                        return Html::tag('p',   Wager::getStatusName($model->status),[]);
//                        if($model->wager->status==Wager::STATUS_MANUAL_BET){
//                            return Html::tag('p',   Wager::getStatusName($model->wager->status),['class'=>'text-danger']);
//                        }
//                        return Html::tag('p',   Wager::getStatusName($model->wager->status),[]);
                        // old code
//                        if($model->status==Wager::STATUS_NOT_ENTERD){
//                            return Html::tag('p',   Wager::getStatusName($model->status),['class'=>'text-danger']);
//                        }
//                        return Html::tag('p',   Wager::getStatusName($model->status),[]);



                    }

                ],
               // 'created_at',

                //['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    <?php } ?>



</div>

<script>

    window.onload = function() {
        setTimeout(function () {
            $('#message').hide();
        },8000)
    }


</script>