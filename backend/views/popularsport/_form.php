<?php

use common\models\helpers\ConstantsHelper;
use kl83\widgets\AutocompleteDropdown;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Popularsport */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="popularsport-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-3 col-sm-2">&nbsp;</div>
    <div class="col-md-3 col-sm-4">

        <?= $form->field($model, 'sport_id')->widget('kl83\widgets\AutocompleteDropdown', [
            'source' => '/popularsport/autocomplete-source',
            'textValue' => $model->relsport->sport_name,
        ])->label('Название спорта') ?>

    </div>
    <div class="col-md-3 col-sm-4">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label("Перезаписываемое значение") ?>
    </div>
    <div class="col-md-3 col-sm-2">&nbsp;</div>

    <div class="clearfix"></div>
    <div class="col-md-3 col-sm-2">&nbsp;</div>
    <div class="col-md-3 col-sm-4">
        <?= $form->field($model, 'sort')->textInput() ?>
    </div>
    <div class="col-md-3 col-sm-4">
       <?= $form->field($model, 'status')->dropDownList([
         ConstantsHelper::STATUS_ACTIVE => 'Активный',
        ConstantsHelper::STATUS_UN_ACTIVE => 'Отключен',

        ]); ?>
        <?php// $form->field($model, 'status')->textInput() ?>
    </div>
    <div class="col-md-3 col-sm-2">&nbsp;</div>
<div class="clearfix"></div>







    <div class="col-sm-offset-9 form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
