<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Typegame */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="typegame-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_typegamename')->textInput() ?>

    <?= $form->field($model, 'id_turnire')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
