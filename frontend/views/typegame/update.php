<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Typegame */

$this->title = 'Update Typegame: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Typegames', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="typegame-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
