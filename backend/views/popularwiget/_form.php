<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Popularwiget */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="popularwiget-form">


        <p> ид брать отсюда
            <a href="http://test.lookmybets.com/site/tourney?id=12341" target="_blank">http://test.lookmybets.com/site/tourney?id=12341</a></p>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'logo')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'count')->hiddenInput()->label(false) ?>








    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'turnireid')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'sportname')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'turnirename')->textInput() ?>
        </div>
    </div>


    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'status')->dropDownList(['вкл','выкл'],['options' =>[ '0' => ['Selected' => true]]]); ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'sort')->textInput() ?>
        </div>
        <div class="col-md-3">

        </div>
    </div>





    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
