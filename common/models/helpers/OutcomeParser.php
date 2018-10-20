<?php

namespace common\models\helpers;


use common\models\Eventsnames;
use common\models\wraps\EventsnamesExt;
use common\models\wraps\SportcategoryExt;
use common\models\wraps\TournamentsnamesExt;
use dektrium\user\models\User;
use Yii;
use yii\helpers\Url;

class OutcomeParser
{
    public static function getName($element)
    {
        $j=json_decode($element->options);
        return $j->outcome_name;
    }
    public static function getCoefficient($element)
    {
        $j=json_decode($element->options);
        return $j->outcome_coef;
    }
    public static function getId($element)
    {
        $j=json_decode($element->options);
        return $j->outcome_id;
    }
}


