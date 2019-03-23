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
        <div class="input-row">
          <p>Ваш аккаунт успешно зарегестрирован.</p>
        </div>
        <div class="input-row">
            <p>Для того чтобы начать игру подтвердите вашу електронную почту.</p>
        </div>

    <div class="input-row">
        <p>Уведомление выслали на указаный вами адресс.</p>
    </div>


    <div class="input-row">
        <p>Желаем приятного времяпрепровождения</p>
    </div>
</div>


