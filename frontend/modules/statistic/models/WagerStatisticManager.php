<?php
namespace app\modules\statistic\models;
use app\models\WagerSearch;
use common\models\DTO\WagerInfoFront;
use common\models\DTO\WagerInfoFrontSingle;
use common\models\DTO\WagerInfoStringResult;
use common\models\helpers\ConstantsHelper;
use common\models\services\UserInfo;
use common\models\Wager;
use yii;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;

class WagerStatisticManager
{
  private $user_id;
  private $queryParams;

  private $wagerInfoFrontSingle;  // инициализируется в getAllWagers !! важно

    private $paginationPages;

  public function __construct($user_id,$queryParams)
  {
          $this->user_id=$user_id;
          $this->queryParams=$queryParams;
  }




    public function getAllWagers(){

        $searchModelWager = new WagerSearch();
        // $dataProviderWagers = $searchModelWager->search($this->queryParams);

        $own_query=['user_id'=>$this->user_id];
        $this->queryParams= array_merge($this->queryParams,$own_query);
        $dataProviderWagers = $searchModelWager->searchWithPagination($this->queryParams);
      //  $pages = new Pagination(['totalCount' => $dataProviderWagers->getTotalCount()]);
        $result=$this->prepareWagers($dataProviderWagers);
        $this->paginationPages = $searchModelWager->getPages();

        return $result;

    }


    /**
     * последнии ставки для /bet
     * @return array
     */
    public function getLastWagers(){

        $searchModelWager = new WagerSearch();
        // $dataProviderWagers = $searchModelWager->search($this->queryParams);

//        sort=last_login_at
        $own_query=['sort'=>'created_at'];
        $this->queryParams= array_merge($this->queryParams,$own_query);
        $dataProviderWagers = $searchModelWager->searchWithPagination($this->queryParams,ConstantsHelper::COUNT_LOAD_NEXT_IN_BET);
        //  $pages = new Pagination(['totalCount' => $dataProviderWagers->getTotalCount()]);
//        var_dump($dataProviderWagers); die();
        $result=$this->prepareWagers($dataProviderWagers);
        $this->paginationPages = $searchModelWager->getPages();

        return $result;

    }

    /**
     * последнии ставки для /bet дозаполнение
     * @return array
     */
    public function getNextWagers(){

        $searchModelWager = new WagerSearch();
        // $dataProviderWagers = $searchModelWager->search($this->queryParams);

//        sort=last_login_at
        $own_query=['sort'=>'created_at'];
        $this->queryParams= array_merge($this->queryParams,$own_query);
        $dataProviderWagers = $searchModelWager->searchNextElements($this->queryParams,ConstantsHelper::COUNT_LOAD_NEXT_IN_BET);
        //  $pages = new Pagination(['totalCount' => $dataProviderWagers->getTotalCount()]);
        $result=$this->prepareWagers($dataProviderWagers);
        $this->paginationPages = $searchModelWager->getPages();

        return $result;

    }





   private function prepareWagers($modelsWagers){
       $result_all=[];
//       var_dump ( get_class( $modelsWagers[0] )); die();
       /** @var Wager $wager */
       foreach ($modelsWagers as $wager){

           $wagerelements=$wager->wagerelements;
             $type=$this->getTypeWager($wagerelements);
             $prepare_elements=$this->prepareWager($wagerelements);
             if(empty($prepare_elements)){

                 //yii::error(['empty elements wager id:', $wager->id]);

                 continue; }
//             var_dump($prepare_elements); die();
             $frontElement=new WagerInfoFrontSingle($wager->id,$type,$prepare_elements,$wager->coef,$wager->total,$wager->created_at,$wager->fronttypebet,$wager->select_coef);
             $userInfo = new UserInfo($wager->user_id);
            // $result_all[]=['elements'=>$prepare_elements,'front_element'=>$frontElement,'model'=>$wager];
             $result_all[]=['elements'=>$prepare_elements,'front_element'=>$frontElement,'model'=>$wager,'userInfo'=>$userInfo];
            }
            return $result_all;
  }

    private function prepareWager($wagerelements){
      $res=[];
        foreach ($wagerelements as $wagerelement) { //var_dump($wagerelement); die();
            $wagerInfoStringResult=new WagerInfoStringResult($wagerelement->info_main_cat_name,$wagerelement->info_cat_name,$wagerelement->info_name);

            $res[]=  new WagerInfoFront($wagerelement->id,$wagerelement->coef,$wagerelement->created_at,$wagerelement->info_name_full,$wagerelement->sport_name,$wagerelement->category_name,$wagerelement->name, 'status',$wagerInfoStringResult,$wagerelement->startgame);
      }
      return $res;
    }


    private function getTypeWager($wagerelements){
        if(count($wagerelements)>1) return  'Экспресс';
        return  'Ординар';
    }

    private function setFrontWagerSingle($wagerList){
               if(empty($wagerList)) $this->wagerInfoFrontSingle= [];



    }


    /**
     * @return mixed
     */
    public function getPaginationPages()
    {
        return $this->paginationPages;
    }

    /**
     * @return mixed
     */
    public function getWagerInfoFrontSingle()
    {
        return $this->wagerInfoFrontSingle;
    }
    public function getInfoAboutWagers(){

    }

    public function getCountAllElements(){
      return  Wager::find()->where(['user_id'=>$this->user_id])->count();
    }

    public function getFormatedNotPlaySum(){
//        return sprintf('%.2f р.',99999999);
       return   sprintf('%.2f ',Wager::find()->where(['user_id'=>$this->user_id])->andWhere(['in','status',[Wager::STATUS_NEW,Wager::STATUS_MANUAL_BET]])->sum('total'));
        return   ;
    }






}
