<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Popularcountry */

$this->title = 'Create Popularcountry';
$this->params['breadcrumbs'][] = ['label' => 'Popularcountries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="popularcountry-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
