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


        const MAX_DROP_COEFFICIENT=10;



        // баланс для новосозданных
        const DEFAULT_USER_CREATE_BALANCE=100000;



        // типы ставок  для фронта
        const BET_TYPE_FREE_EXPRESS=1;
        const BET_TYPE_FREE_ORDINAR=2;

        const BET_TYPE_PRIVATE_EXPRESS=3; //
        const BET_TYPE_PRIVATE_ORDINAR=4; //

    // пока что не используются
//        const BET_TYPE_OPEN_EXPRESS=5;  // cтавка уже кому тo открыта, раньше была или PRIVAT    или FREE
//        const BET_TYPE_OPEN_ORDINAR=6;// cтавка уже кому тo открыта, раньше была или PRIVAT      или FREE












}


