<?php

namespace common\models\services;

use common\models\helpers\ConstantsHelper;
use common\models\wraps\EventsnamesExt;
use common\models\wraps\SportcategoryExt;
use common\models\wraps\TournamentsnamesExt;
use dektrium\user\models\User;
use yii\helpers\Url;

class FiltertCountryBySport
{
    private $sport_id;
    private $category_id;
    private $tournament_id;
    /**
     * FiltertByCountry constructor.
     * @param $country_id
     */
    public function __construct($sport_id,$category_id,$tournament_id)
    {
        $this->sport_id = $sport_id;
        $this->category_id = $category_id;
        $this->tournament_id = $tournament_id;
    }

    public function getTurnires($tag=null)
    {
        if($tag){
                $models=     SportcategoryExt::find()->select(['category_id','category_name'])->where(['sport_id'=>$this->sport_id,'status'=>ConstantsHelper::STATUS_ACTIVE])->andWhere(['like','category_name',$tag])->all(); // Sportcategory::findAll();

        }else{
            $models=     SportcategoryExt::find()->select(['category_id','category_name'])->where(['sport_id'=>$this->sport_id,'status'=>ConstantsHelper::STATUS_ACTIVE])->all(); // Sportcategory::findAll();

        }
             return  $models;
    }

    public function getTurniresByCountry($tag=null)
    {
        if($tag){
        $models=     TournamentsnamesExt::find()->select(['tournament_id','category_id','tournament_name'])->where(['category_id'=>$this->category_id,'status'=>ConstantsHelper::STATUS_ACTIVE])->andWhere(['like','tournament_name',$tag])->all();
        }else{
            $models=     TournamentsnamesExt::find()->select(['tournament_id','category_id','tournament_name'])->where(['category_id'=>$this->category_id,'status'=>ConstantsHelper::STATUS_ACTIVE])->all();
        }
        return  $models;
    }


    public function getTurniresByCountryFin()
    {
        $models=     EventsnamesExt::find()->select(['id','event_id','category_id','event_name','tournament_name','total_count_outcomes'])->where(['tournament_id'=>$this->tournament_id ,'status'=>ConstantsHelper::STATUS_ACTIVE])->all(); //common\models\wraps\EventsnamesExt
        return  $models;
    }

}
