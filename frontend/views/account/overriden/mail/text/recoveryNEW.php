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
 * @var dektrium\user\models\User   $user
 * @var dektrium\user\models\Token  $token
 */
?>
<?= Yii::t('user', 'Добрый день') ?>,

<?= Yii::t('user', 'Mы отправили запрос на востановление пароля на сайте {0}', Yii::$app->name) ?>.
<?= Yii::t('user', 'Пожалуйста перейдите по ссылке ниже') ?>.

<?php // смена урла для подтверждения для переопределения/ самый простой способ
$rUrl=$token->url;
$rUrl= str_replace('/user/recover/','/uregistration/recover/',$rUrl);
?>
<?= $rUrl ?>

<?= Yii::t('user', 'Если вы не можете нажать на ссылку, тогда скопируйте ёё и вставьте в ваш браузер.') ?>.

<?= Yii::t('user', 'Если вы не создавали данный запрос просто проигнорируйте его.') ?>.
