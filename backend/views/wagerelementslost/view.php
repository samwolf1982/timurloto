<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Wagerelements */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Wagerelements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wagerelements-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'wager_id',
            'coef',
            'event_id',
            'outcome_id',
            'sport_id',
            'sport_name',
            'country_id',
            'country_name',
            'category_id',
            'category_name',
            'sub_category_id',
            'sub_category_name',
            'name',
            'info_main_cat_name',
            'info_name',
            'info_name_full',
            'info_cat_name',
            'status',
            'created_at',
        ],
    ]) ?>

</div>
