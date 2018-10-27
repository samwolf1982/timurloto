<?php

use common\models\services\PopularToday;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Popularcountry */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="popularcountry-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'sport_id')->textInput() ?>
    <?= $form->field($model, 'sport_id')->dropDownList(PopularToday::getDropCountryFromSport()) ?>

    <?php // $form->field($model, 'selected_country_id')->textInput() ?>

    <?= $form->field($model, 'selected_country_id')->widget('kl83\widgets\AutocompleteDropdown', [
        'source' => '/popularcountry/autocomplete-source',
        'textValue' => $model->relturnire->sport_name,
    ])->label('Название страны')?>


    <?= $form->field($model, 'sort')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
