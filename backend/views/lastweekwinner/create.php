<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Lastweekwinners */

$this->title = 'Добавить';
$this->params['breadcrumbs'][] = ['label' => 'победители предыдущих недель', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lastweekwinners-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dmodel' => $dmodel,
    ]) ?>

</div>
