<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Wager */

$this->title = 'Create Wager';
$this->params['breadcrumbs'][] = ['label' => 'Wagers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wager-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
