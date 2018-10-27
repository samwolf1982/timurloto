<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Popularturnire */

$this->title = 'Create Popularturnire';
$this->params['breadcrumbs'][] = ['label' => 'Popularturnires', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="popularturnire-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
