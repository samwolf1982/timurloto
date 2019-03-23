<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var dektrium\user\models\User $model
 * @var dektrium\user\Module $module
 */

$this->title = Yii::t('user', 'Sign up');
$this->params['breadcrumbs'][] = $this->title;
//Html::a(Yii::t('user', 'Already registered? Sign in!'), ['/user/security/login'])

//    <input type="checkbox" id="konf">
//            <label for="konf" class="check-text">
//                Я прочитал <a href="#">Политику Конфиденциальности</a> сервиса Look My Bet
//            </label>
//            $readconfirm='';
?>








<div class="form-inner">
    <?php $form = ActiveForm::begin([
        'id' => 'registration-form',
        'enableAjaxValidation' => true,
         'method'=>'post',
        'enableClientValidation' => false,
//        'placeholdersFromLabels' => true
    ]); ?>
        <div class="input-row">
            <?= $form->field($model, 'fullname')->label('Имя',['class'=>'placeholder']) ?>
        </div>
        <div class="input-row">
            <?= $form->field($model, 'username')->label('Никнейм',['class'=>'placeholder']) ?>
        </div>
        <div class="input-row">
            <?= $form->field($model, 'email')->label('Email',['class'=>'placeholder']) ?>
        </div>
    <div class="input-row">
    <?php if ($module->enableGeneratingPassword == false): ?>
        <?= $form->field($model, 'password')->passwordInput()->label('Пароль - минимум 6 символов',['class'=>'placeholder']) ?>
    <?php endif ?>
    </div>

        <div class="checkbox-row">
            <?php //$form->field($model, 'readconfirm')->checkbox([ 'value' => '1', 'checked ' => true])->label(''); ?>
        </div>
        <div class="input-row btn-row">
            <?= Html::submitButton(Yii::t('user', 'СОЗДАТЬ АККАУНТ'), ['class' => 'btn big-btn btn-primary btn-hover']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div>


