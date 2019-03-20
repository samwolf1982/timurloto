<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Popularwiget */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Popularwigets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="popularwiget-view">

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
            'logo',
            'sportname:ntext',
            'turnirename:ntext',
            'turnireid:ntext',
            'sort',
            'status',
            'count',
        ],
    ]) ?>

</div>
