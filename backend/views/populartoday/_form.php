<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Centerturnire */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="centerturnire-form">

    <?php $form = ActiveForm::begin(); ?>


    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'sportid')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'name')->textInput() ?>

        </div>

    </div>


    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'status')->dropDownList(['вкл','выкл'],['options' =>[ '0' => ['Selected' => true]]]); ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'sort')->textInput() ?>
        </div>

    </div>




    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
