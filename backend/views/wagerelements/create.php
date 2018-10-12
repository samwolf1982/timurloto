<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Wagerelements */

$this->title = 'Create Wagerelements';
$this->params['breadcrumbs'][] = ['label' => 'Wagerelements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wagerelements-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
