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




// доступ к привату
    const ACCESS_TO_PRIVATE_DAY='llll'; //


    const ACCESS_TO_DAY='1 day'; //
    const ACCESS_TO_TWO_DAYS='2 day'; //
    const ACCESS_TO_THREE_DAYS='3 day'; //
    const ACCESS_TO_WEEK='1 week'; //
    const ACCESS_TO_TWO_WEEKS='2 week'; //
    const ACCESS_TO_MONTH='1 month'; //
    const ACCESS_TO_THREE_MONTHS='3 months'; //
    const ACCESS_TO_25_YEARS='25 year'; //



// длина текста в кометах в открытых пользователях число
 const LENGTH_COMMENT_ACCESS_USER=160; //











////////////////купленый парсер   or
    // const PARSE_BASE_URL='http://157.230.134.85:8081'; // not use
//    const PARSE_BASE_URL='http://157.230.134.85';
//    const PARSE_SPORT_TYPE_URL_PARTS='?lineSport/all/ru/j_zaxscdvfq1w2e3r4';  // 1
//    //  const PARSE_TOURNEY_TYPE_URL_PARTS='getChampsBySportId/line/12341/ru/j_zaxscdvfq1w2e3r4'; // 2   not use
//    const PARSE_TOURNEY_TYPE_URL_PARTS='?getChampsBySportId/line/%s/ru/j_zaxscdvfq1w2e3r4'; // 2
//    const PARSE_GAMES_IN_TOURNEY_URL_PARTS='?lineSport/%s/ru/j_zaxscdvfq1w2e3r4';  // 3 / http://157.230.134.85:8081/lineSport/131927/ru/j_zaxscdvfq1w2e3r4
//    const PARSE_EVENT_BY_ID_URL_PARTS='?getGameById/%s/ru/j_zaxscdvfq1w2e3r4';  // 4 / http://157.230.134.85:8081/getGameById/231729215/ru/j_zaxscdvfq1w2e3r4
// //   const PARSE_BASE_DOCUMENTATION_URL='https://part.upnp.xyz'; // not use
    ////////////////купленый парсер




    ////////////////купленый парсер   reg ru
    // const PARSE_BASE_URL='http://157.230.134.85:8081';
//    const PARSE_BASE_URL='http://89.108.65.253:3000';
//    const PARSE_BASE_URL='http://89.108.65.253:6543';
//    const PARSE_BASE_URL='http://89.108.65.253';
//    const PARSE_BASE_URL='http://89.108.65.253';
    const PARSE_BASE_URL='http://104.248.229.40'; // tim
    const PARSE_SPORT_TYPE_URL_PARTS='?lineSport/all/ru/j_zaxscdvfq1w2e3r4';  // 1
    //  const PARSE_TOURNEY_TYPE_URL_PARTS='getChampsBySportId/line/12341/ru/j_zaxscdvfq1w2e3r4'; // 2
    const PARSE_TOURNEY_TYPE_URL_PARTS='?getChampsBySportId/line/%s/ru/j_zaxscdvfq1w2e3r4'; // 2
    const PARSE_GAMES_IN_TOURNEY_URL_PARTS='?lineSport/%s/ru/j_zaxscdvfq1w2e3r4';  // 3 / http://157.230.134.85:8081/lineSport/131927/ru/j_zaxscdvfq1w2e3r4
    const PARSE_EVENT_BY_ID_URL_PARTS='?getGameById/%s/ru/j_zaxscdvfq1w2e3r4';  // 4 / http://157.230.134.85:8081/getGameById/231729215/ru/j_zaxscdvfq1w2e3r4
    //   const PARSE_BASE_DOCUMENTATION_URL='https://part.upnp.xyz';




//<div class="list-item">
//<button class="trig-val" data-value="day">день</button>
//</div>
//<div class="list-item">
//<button class="trig-val" data-value="two days">2 дня</button>
//</div>
//<div class="list-item">
//<button class="trig-val" data-value="three days">3 дня</button>
//</div>
//<div class="list-item">
//<button class="trig-val" data-value="week">Неделя</button>
//</div>
//<div class="list-item">
//<button class="trig-val" data-value="two weeks">2 недели</button>
//</div>
//<div class="list-item">
//<button class="trig-val" data-value="month">Месяц</button>
//</div>
//<div class="list-item">
//<button class="trig-val" data-value="three months"> 3 месяца</button>
//</div>
//<div class="list-item">
//<button class="trig-val" data-value="forever">Навсегда</button>
//</div>









}


