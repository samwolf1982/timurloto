<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 28.12.2018
 * Time: 21:43
 */

namespace console\models\services;
use common\models\Bets;
use console\models\DTO\DtoClearCollector;
use Yii;
use  yii\console\Exception;


class ClearCollectort
{

    /**@var DtoClearCollector $this->dto **/
    private  $dto;


    /**
     * ClearCollectort constructor.
     * @param $ddo    обэкт для передачи данных
     */
    public function __construct($dto)
    {
        $this->dto = $dto;
    }

    /**
     * чистка не исполюзуемых категорий для фафорите 1)   DELETE FROM `sportcategorynames` WHERE sport_id NOT IN (1,2)
     */
    public function clearFavoritCategorynames()
    {
    if(!empty($this->dto->count)){
         Yii::$app->db->createCommand("DELETE FROM `sportcategorynames` WHERE sport_id NOT IN (".$this->dto->getDataString().")")->execute();
    }else{
        throw new   Exception('count is empty line: '.__LINE__);
    }

    }



    /**
     * чистка не исполюзуемых категорий для фафорите 2)   DELETE FROM `sportcategory` WHERE category_id NOT IN (1,2)
     */
    public function clearTournamentsNames()
    {
        if(!empty($this->dto->count)){
//         var_dump($this->dto->getDataString());
               Yii::$app->db->createCommand("DELETE FROM `sportcategory` WHERE category_id NOT IN (".$this->dto->getDataString().")")->execute();
        }else{
            throw new   Exception('count is empty line: '.__LINE__);
        }

    }


    /**
     * чистка не исполюзуемых категорий для фафорите 3)   DELETE FROM `tournamentsnames` WHERE tournament_id NOT IN (1,2)
     */
    public function clearEventsNames()
    {
        if(!empty($this->dto->count)){
        // var_dump($this->dto->getDataString());
            Yii::$app->db->createCommand("DELETE FROM `tournamentsnames` WHERE tournament_id NOT IN (".$this->dto->getDataString().")")->execute();
        }else{
            throw new   Exception('count is empty line: '.__LINE__);
        }

    }
    /**
     * чистка не исполюзуемых категорий для фафорите 4)   DELETE FROM `eventsnames` WHERE event_id NOT IN (1,2)
     */
    public function clearGamesNames()
    {
        if(!empty($this->dto->count)){
           //  var_dump($this->dto->getDataString());
            Yii::$app->db->createCommand("DELETE FROM `eventsnames` WHERE event_id NOT IN (".$this->dto->getDataString().")")->execute();
        }else{
            throw new   Exception('count is empty line: '.__LINE__);
        }

    }





}