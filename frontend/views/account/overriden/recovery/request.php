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
 * @var yii\widgets\ActiveForm $form
 * @var dektrium\user\models\RecoveryForm $model
 */

$this->title = Yii::t('user', 'Recover your password');
$this->params['breadcrumbs'][] = $this->title;
?>

        <div class="form-inner">
            <h2 class="text-center">Забыли Пароль?</h2>
            <div class="line-text">
                <p style="    color: black; font-size: large;">Введите почту, на которую зарегистрирован ваш аккаунт, и получите дальнейшие инструкци.</p>
            </div>
            <?php $form = ActiveForm::begin([
                'id' => 'password-recovery-form',
                'enableAjaxValidation' => true,
                'enableClientValidation' => false,
            ]); ?>
                <div class="input-row">
                    <?= $form->field($model, 'email')->textInput(['autofocus' => true])->label('Email',['class'=>'placeholder']) ?>
                </div>
                <div class="input-row btn-row">
                    <?= Html::submitButton('Восстановить', ['class' => 'btn big-btn btn-primary btn-hover']) ?>
                </div>
                <div class="input-row text-center text-row">
                    <a href="#" onclick="UserReg.loadFormLogin();" class="auth-btn">Вернуться к авторизации</a>
                </div>
            <?php ActiveForm::end(); ?>
        </div>



<?php if(0): ?>
    <div class="row">
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
                </div>
                <div class="panel-body">
                    <?php $form = ActiveForm::begin([
                        'id' => 'password-recovery-form',
                        'enableAjaxValidation' => true,
                        'enableClientValidation' => false,
                    ]); ?>

                    <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                    <?= Html::submitButton(Yii::t('user', 'Continue'), ['class' => 'btn btn-primary btn-block']) ?><br>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>



