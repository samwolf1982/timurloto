<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\BalancestatisticsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="balancestatistics-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'wager_id') ?>

    <?= $form->field($model, 'playlist_id') ?>

    <?= $form->field($model, 'event_id') ?>

    <?php // echo $form->field($model, 'profit') ?>

    <?php // echo $form->field($model, 'penetration') ?>

    <?php // echo $form->field($model, 'middle_coef') ?>

    <?php // echo $form->field($model, 'roi') ?>

    <?php // echo $form->field($model, 'plus') ?>

    <?php // echo $form->field($model, 'minus') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_own') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
