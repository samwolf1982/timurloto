<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Wagerelements */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wagerelements-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'wager_id')->textInput() ?>

    <?= $form->field($model, 'coef')->textInput() ?>

    <?= $form->field($model, 'event_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'outcome_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sport_id')->textInput() ?>

    <?= $form->field($model, 'sport_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sub_category_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sub_category_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'info_main_cat_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'info_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'info_name_full')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'info_cat_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
