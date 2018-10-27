<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Popularcountry */

$this->title = 'Update Popularcountry: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Popularcountries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="popularcountry-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
