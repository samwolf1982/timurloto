<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Wagerelements */

$this->title = 'Update Wagerelements: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Wagerelements', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="wagerelements-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
