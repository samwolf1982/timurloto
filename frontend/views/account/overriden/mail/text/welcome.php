<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

/**
 * @var dektrium\user\models\User
 */
?>
<?= Yii::t('user', 'Добрый день') ?>,

<?= Yii::t('user', 'Ваш аккаунт в первой социальной сети для любителей ставок на спорт "{0}", был создан', Yii::$app->name) ?>.
<?php if ($module->enableGeneratingPassword): ?>
<?= Yii::t('user', 'Мы сгенерировали для вас пароль') ?>:
<?= $user->password ?>
<?php endif ?>

<?php if ($token !== null): ?>
<?= Yii::t('user', 'Для завершения регистрации перейдите по ссылке ниже') ?>.

    <?php // смена урла для подтверждения для переопределения/ самый простой способ
    $rUrl=$token->url;
    $rUrl= str_replace('/user/confirm/','/uregistration/confirm/',$rUrl);
    ?>
    <?= $rUrl ?>

<?= Yii::t('user', 'Если вы не можете нажать на ссылку, тогда скопируйте ёё и вставьте в ваш браузер.') ?>.
<?php endif ?>

<?= Yii::t('user', 'Если вы не создавали данный запрос просто проигнорируйте его.') ?>.
