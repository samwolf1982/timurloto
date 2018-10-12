<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Typegame */

$this->title = 'Create Typegame';
$this->params['breadcrumbs'][] = ['label' => 'Typegames', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="typegame-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
