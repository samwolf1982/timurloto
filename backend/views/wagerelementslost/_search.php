<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WagerelementsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wagerelements-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'wager_id') ?>

    <?= $form->field($model, 'coef') ?>

    <?= $form->field($model, 'event_id') ?>

    <?= $form->field($model, 'outcome_id') ?>

    <?php // echo $form->field($model, 'sport_id') ?>

    <?php // echo $form->field($model, 'sport_name') ?>

    <?php // echo $form->field($model, 'country_id') ?>

    <?php // echo $form->field($model, 'country_name') ?>

    <?php // echo $form->field($model, 'category_id') ?>

    <?php // echo $form->field($model, 'category_name') ?>

    <?php // echo $form->field($model, 'sub_category_id') ?>

    <?php // echo $form->field($model, 'sub_category_name') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'info_main_cat_name') ?>

    <?php // echo $form->field($model, 'info_name') ?>

    <?php // echo $form->field($model, 'info_name_full') ?>

    <?php // echo $form->field($model, 'info_cat_name') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
