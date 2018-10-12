<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Typegamename */

$this->title = 'Create Typegamename';
$this->params['breadcrumbs'][] = ['label' => 'Typegamenames', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="typegamename-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
