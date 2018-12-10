<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Balancestatistics */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Balancestatistics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="balancestatistics-view">

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
            'user_id',
            'wager_id',
            'playlist_id',
            'event_id',
            'profit',
            'penetration',
            'middle_coef',
            'roi',
            'plus',
            'minus',
            'created_at',
            'created_own',
        ],
    ]) ?>

</div>
