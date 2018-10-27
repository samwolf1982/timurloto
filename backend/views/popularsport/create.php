<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Popularsport */

$this->title = 'Create Popularsport';
$this->params['breadcrumbs'][] = ['label' => 'Popularsports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="popularsport-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
