<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Balancestatistics */

$this->title = 'Create Balancestatistics';
$this->params['breadcrumbs'][] = ['label' => 'Balancestatistics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="balancestatistics-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
