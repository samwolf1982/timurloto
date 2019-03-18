<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Lastweekwinners */

$this->title = 'Create Lastweekwinners';
$this->params['breadcrumbs'][] = ['label' => 'Lastweekwinners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lastweekwinners-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
