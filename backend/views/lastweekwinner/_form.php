<?php

use common\models\overiden\User;
use yii\helpers\Html;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete2; // Указываете путь до библиотеки
/* @var $this yii\web\View */
/* @var $model common\models\Lastweekwinners */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lastweekwinners-form">


    <?
    //фомируем список
    $listdata=User::find()
        ->select(['username as value', 'username as label','id as id',])
        ->asArray()
        ->all();
    ?>

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($dmodel, 'username')->widget(
                AutoComplete::className(), [
                'clientOptions' => [
                    'source' => $listdata,
                    'autoFill'=>true,
                    'minLength'=>'0',
                    'select' => new JsExpression("function( event, ui ) {
        console.log(ui);
        $('#lastweekwinners-uid').val(ui.item.id);
      }"),
                ],
                'options'=>[
                    'class'=>'form-control'
                ]
            ]);
            ?>
            <?= $form->field($model, 'uid')->hiddenInput()->label(false) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'sort')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'status')->dropDownList(['вкл','выкл'],['options' =>[ '0' => ['Selected' => true]]]); ?>
        </div>
    </div>


<!--    'name' => 'company',-->
<!--    'id' => 'ddd',-->
<!--    'clientOptions' => [-->
<!--    'source' => [-->
<!--    ['label'=>'color1', 'value'=>'key1', 'id'=>'c_id1'],-->
<!--    ['label'=>'color2', 'value'=>'key2', 'id'=>'c_id2']-->
<!--    ],-->
<!--    'autoFill'=>true,-->
<!--    'minLength'=>'0',-->
<!--    'select' => new JsExpression("function( event, ui ) {-->
<!--    console.log(ui);-->
<!--    $('#user_company').val(ui.item.id);-->
<!--    }")-->
<!---->
<!---->
<!--    ],-->





<!--    dropDownList('cat', '10', $items, $params);-->


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
