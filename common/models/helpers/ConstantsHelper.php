<?php

namespace common\models\helpers;


use common\models\wraps\EventsnamesExt;
use common\models\wraps\SportcategoryExt;
use common\models\wraps\TournamentsnamesExt;
use dektrium\user\models\User;
use Yii;
use yii\helpers\Url;

class ConstantsHelper
{
        const STATUS_ACTIVE=1;
        const STATUS_UN_ACTIVE=0;


        const STATUS_PUBLIC_BET=0;
        const STATUS_PRIVATE_BET=1;


        const STATUS_CHECKBOX_BET_ACTIVE=0;
        const STATUS_CHECKBOX_BET_UN_ACTIVE=1;


        const STATUS_PlAYLIST_DEFAULT=1;
        const STATUS_PlAYLIST_OTHER=0;

        //коофициент для корзины по умолчанию если первый раз создается
        const DEFAULT_COEFFICIENT=1;




}


