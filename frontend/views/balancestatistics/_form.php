<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Balancestatistics */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="balancestatistics-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'wager_id')->textInput() ?>

    <?= $form->field($model, 'playlist_id')->textInput() ?>

    <?= $form->field($model, 'event_id')->textInput() ?>

    <?= $form->field($model, 'profit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'penetration')->textInput() ?>

    <?= $form->field($model, 'middle_coef')->textInput() ?>

    <?= $form->field($model, 'roi')->textInput() ?>

    <?= $form->field($model, 'plus')->textInput() ?>

    <?= $form->field($model, 'minus')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'created_own')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
