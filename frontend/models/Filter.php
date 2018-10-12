<?php

namespace frontend\models;

use common\models\AreaRecord;
use common\models\Buildertype;
use common\models\Demorooms;
use common\models\DemoroomsSearch;
use common\models\DistrictCityRecord;
use common\models\JkRecord;
use common\models\Jktype;
use common\models\LocalityRecord;
use common\models\NewsRecord;
use common\models\RegionRecord;
use common\models\Sportcategory;
use common\models\wraps\SportcategorynamesExt;
use Yii;
use yii\base\Component;
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;
use yii\helpers\Url;

/**
* фильтр для
 */
class Filter  extends Component
{
    private  $tResponce;
    private  $tFilter;
    private  $tData;
    function __construct() {
        if(yii::$app->request->isGet){
            $this->tResponce = 'get';
            $this->tFilter =yii::$app->request->get('type_filter');
            $this->tData =yii::$app->request->get('data');
            }
        if(yii::$app->request->isPost){
            $this->tResponce = 'post';
            $this->tFilter =yii::$app->request->post('type_filter');
            $this->tData =yii::$app->request->post('data');
        }
//        if(yii::$app->request->isAjax){
//            $this->tResponce = 'ajax';
//            $this->tFilter =yii::$app->request->get('type_filter');
//        }

    }



    /**
     * фильтр для каталога и возможно главной
     * @return array|void
     */
    public function getFilter(){


        if (empty($this->tData)){     // по умолчанию

            return $this->getEmptyfilter();
        }
        if ($this->tFilter=='common\models\wraps\SportcategoryExt'){
            return $this->getSportcategoryExt();
        }
        if ($this->tFilter=='common\models\wraps\TournamentsnamesExt'){
            return $this->getTournamentsnamesExt();
        }
        if ($this->tFilter=='common\models\wraps\TournamentsnamesExt3'){
            $this->tFilter='common\models\wraps\TournamentsnamesExt';
            return $this->getEventsnamesExt();
        }

        if ($this->tFilter=='common\models\wraps\EventsnamesExt'){
            return $this->getEventsnamesExt();
        }
        if ($this->tFilter=='common\models\wraps\BetsExt'){
            return $this->getBetsExt();
          //  return $this->getBetsExt1();
        }
        if ($this->tFilter=='grid'){
            return $this->getGrid();
            //  return $this->getBetsExt1();
        }

        return $this->getSimplefilter();
    }



    //     WORKERS fun
    private function getSportcategoryExt(){
                      $sportId=   intval( $this->tData);// sport_id;
        if (empty($sportId)){
            $res=['models'=>'good luck','status'=>'error'];
        }else{
            $models=     $this->tFilter::find()->select(['category_id','category_name'])->where(['sport_id'=>$sportId,'status'=>1])->all(); // Sportcategory::findAll();
            $res=['models'=>$models,'status'=>'ok','type_filter'=>'sportcategoryExt'];
        }
        return $res;
    }

    //     WORKERS fun
    private function getTournamentsnamesExt(){ //2
        $sportId=   intval( $this->tData);// sport_id;
        if (empty($sportId)){
            $res=['models'=>'good luck','status'=>'error'];
        }else{
            $models=     $this->tFilter::find()->select(['tournament_id','category_id','tournament_name'])->where(['category_id'=>$sportId,'status'=>1])->all(); // TournamentsnamesExt::findAll();
            $res=['models'=>$models,'status'=>'ok','type_filter'=>'tournamentsnamesExt'];
        }
        return $res;
    }


    //     WORKERS fun
    private function getEventsnamesExt(){  //3   // SELECT  * FROM  eventsnames WHERE  category_id=917; премер лига украина
        $sportId=   intval( $this->tData);// sport_id;
        if (empty($sportId)){
            $res=['models'=>'good luck','status'=>'error'];
        }else{
           // $models=     $this->tFilter::find()->select(['event_id','category_id','event_name'])->where(['category_id'=>$sportId,'status'=>1])->all(); // TournamentsnamesExt::findAll();
            $models=     $this->tFilter::find()->select(['event_id','category_id','event_name'])->where(['tournament_id'=>$sportId,'status'=>1])->all(); // TournamentsnamesExt::findAll();
            // $models=     $this->tFilter::find()->select(['event_id','category_id','event_name'])->where(['tournament_id'=>$sportId,'status'=>1])->all(); // TournamentsnamesExt::findAll();
         //   $res=['models'=>$models,'status'=>'ok','type_filter'=>'tournamentsnamesExt'];
            $res=['models'=>$models,'status'=>'ok','type_filter'=>'eventsnamesExt'];
        }
        return $res;
    }

    //     WORKERS fun
    private function getBetsExt(){
        $sportId=   intval( $this->tData);// sport_id;
        if (empty($sportId)){
            $res=['models'=>'good luck','status'=>'error'];
        }else{
            $modelsTmp=     $this->tFilter::find()->select(['id','event_id','market_id','outcomes','market_name','result_type_id','market_template_id','result_type_name'])->where(['event_id'=>$sportId,'status'=>1])->all(); // TournamentsnamesExt::findAll();
            $models=[];
            $groups_arr=[];

            foreach ($modelsTmp as $model) {
                $groups_arr[$model['market_template_id']][]=['model'=>$model,'name'=>$model['market_name'],'result_type_name'=>$model['result_type_name']];
//             /   $groups_arr[$model['result_type_id']][]=['model'=>$model,'name'=>$model['market_name']];
              //  $models[]=['res'=> $this->generateHtml($model['outcomes'],$model['market_name']),'id'=>$model['market_id']];
            }
            foreach ($groups_arr as $k => $group_arr) {
               // $html='<div class="nameBetWrap"><h3 class="nameBet">'.$group_arr[0]['name'].'</h3></div><ul class="betUl gridder">';
                $html='<div class="nameBetWrap"><h3 class="nameBet">'.$group_arr[0]['name'].'</h3></div>';

                // групировка по  result_type_name
                $result_type_name_last='';
                $count_group=count($group_arr);
                foreach ($group_arr as $k => $mdl) {
                        if ($k==0 ){
                            $html.='<div class="nameBetWrapUnder"><h3 class="nameBetUnder text-center" >'.$mdl['result_type_name'].'</h3></div><ul class="betUl gridder">';
                            $result_type_name_last=$mdl['result_type_name'];
                        }else{ // next
                            if ($result_type_name_last!=$mdl['result_type_name']){
                                $html.='</ul></div>';
                                $html.='<div class="nameBetWrapUnder"><h3 class="nameBetUnder text-center">'.$mdl['result_type_name'].'</h3></div><ul class="betUl gridder">';
                                $result_type_name_last=$mdl['result_type_name'];
                            }
                        }
                   // $html.=$this->generateSimpleHtml($mdl['model']['outcomes'],$mdl['model']['event_id']);
                    $html.=$this->generateSimpleHtml($mdl['model']['outcomes'],$mdl['model']['market_id'],$mdl['model']['id']);
                    if( ($k +1) >= $count_group){
                        $html.='</ul></div>';
                    }
                }

                $models[]=['res'=>$html];

              //  $groups_arr[$model['result_type_id']]=$model;
                //  $models[]=['res'=> $this->generateSimpleHtml($model['outcomes'],$model['market_name']),'id'=>$model['market_id']];
            }



            $res=['models'=>$models,'status'=>'ok','type_filter'=>'eventsbetsExt'];
        }
        return $res;
    }
//    //     WORKERS fun
//    private function getBetsExt1(){
//        $sportId=   intval( $this->tData);// sport_id;
//        if (empty($sportId)){
//            $res=['models'=>'good luck','status'=>'error'];
//        }else{
//            $modelsTmp=     $this->tFilter::find()->select(['market_id','outcomes','market_name','result_type_id'])->where(['event_id'=>$sportId,'status'=>1])->all(); // TournamentsnamesExt::findAll();
//            $models=[];
//            $groups_arr=[];
//
//
//            foreach ($groups_arr as $group_arr) {
//                $html='<div class="nameBetWrap"><h3 class="nameBet">'.$group_arr[0]['name'].'</h3></div><ul class="betUl gridder">';
//                foreach ($group_arr as $mdl) {
//                    // var_dump($mdl); die();
//                    $html.=$this->generateSimpleHtml1($mdl['model']['outcomes']);
//                    //$tmp=['res'=> $this->generateSimpleHtml($model['outcomes'],$model['market_name']),'id'=>$model['market_id']];
//                }
//                $html.='</ul>';
//                $models[]=['res'=>$html];
//                //  $groups_arr[$model['result_type_id']]=$model;
//                //  $models[]=['res'=> $this->generateSimpleHtml($model['outcomes'],$model['market_name']),'id'=>$model['market_id']];
//            }
//
//
//
//            $res=['models'=>$models,'status'=>'ok','type_filter'=>'eventsbetsExt'];
//        }
//        return $res;
//    }


    private function getGrid(){




        return $this->generateGriderHtml( $this->tData);

        }


    // delete bottom

    /**
     * @param $data
     * @param $cat_id  == market_id
     * @param $base_id   --- ид в базе данных для корзины чтобы не дергать каждый раз базу
     * @return string
     */
    private function generateSimpleHtml($data, $cat_id, $base_id){
      //  yii::error($data);
      //  $res='<div class="nameBetWrap"><h3 class="nameBet">'.$nameBet.'</h3></div><ul class="betUl">';
        $res='';
    $p= json_decode($data,true);
    foreach ($p as $item) {
        $name=$item['outcome_name'];
        $id=$item['outcome_id'];
        $coof=$item['outcome_coef'];
        $res.= '<li class="betLi gridder-list" data-model="app\models\Wagercart" data-players="'.$this->tData.'"  data-position="'.$base_id.'"  data-cat="'.$cat_id.'"  data-id="'.$id.'" data-griddercontent="'.Url::to(['rest/grid','data'=>$id,'type_filter'=>'grid']).'"> <a href="#" data-id="'.$id.'"> '.$name.'</a> <span class="betCoof">'.$coof.'</span> </li>';
        }
            $res;
        return $res;
}
    private function generateSimpleHtml1($data,$nameBet){
        //  $res='<div class="nameBetWrap"><h3 class="nameBet">'.$nameBet.'</h3></div><ul class="betUl">';
        $res='';
        $p= json_decode($data,true);
        foreach ($p as $item) {
            $name=$item['outcome_name'];
            $id=$item['outcome_id'];
            $coof=$item['outcome_coef'];
            $res.= '<li class="betLi gridder-list" data-griddercontent="'.Url::to(['rest/grid','data'=>$id,'type_filter'=>'grid']).'"> <a href="#" data-id="'.$id.'"> '.$name.'</a> <span class="betCoof">'.$coof.'</span> </li>';
        }
        $res;
        return $res;
    }



    private function generateGriderHtml($data){
    $unik=uniqid();
    $unik2=uniqid();
        $res='<ul class="nav nav-tabs" id="betTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="bet_ordinar_tab" data-toggle="tab" href="#bet_ordinar" role="tab" aria-controls="home" aria-selected="true">Ординар</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="bet_express_tab" data-toggle="tab" href="#bet_express" role="tab" aria-controls="profile" aria-selected="false">Экспресс</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="bet_system_tab" data-toggle="tab" href="#bet_system" role="tab" aria-controls="contact" aria-selected="false">Система</a>
  </li>
</ul>
<div class="tab-content" id="betTabContent">
  <div class="tab-pane fade show active" id="bet_ordinar" role="tabpanel" aria-labelledby="bet_ordinar_tab">
  
  <h2 class="text-center infoMessage_'.$unik.'">Здесь можна сделать ставку ординар</h2><form class="betForm" id="'.$unik.'" action="#" onsubmit="submitBetForm(this); return false;"><div class="row">
                                           <div class="input-row column-6">
                                               <div class="input-row-inner">
                                                   <input type="text" value="56" title="Значение должно быть целым числом, больше нуля, максимальное значение не более 5000" pattern="(5000|([1-4][0-9][0-9][0-9])|([1-9][0-9][0-9])|([1-9][0-9])|[1-9])" required="required" required   class="inputBetForm" id="sum" name="sum" placeholder="Сумма">
                                                    <input type="hidden" value="'.$data.'" name="bet" >
                                                    <input type="hidden" value="'.$unik.'" name="hash" >
                                                    <input type="hidden" value="ordinar" name="typeBet" >
                                               </div>
                                           </div>
                                           <div class="input-row column-6">
                                               <div class="input-row-inner">
                                                   <button type="submit" class="btn btn-primary pull-right inputBetSubmit">Сделать ставку</button>
                                               </div>
                                           </div>
                                       </div>
                                       </form>
</div>

  <div class="tab-pane fade" id="bet_express" role="tabpanel" aria-labelledby="bet_express_tab">
  
  <h2 class="text-center infoMessage_'.$unik.'">Здесь можна сделать ставку експрес</h2><form class="betForm" id="'.$unik2.'" action="#" onsubmit="submitBetForm(this); return false;"><div class="row">
                                           <div class="input-row column-6">
                                               <div class="input-row-inner">
                                                   <input type="text" value="56" title="Значение должно быть целым числом, больше нуля, максимальное значение не более 5000" pattern="(5000|([1-4][0-9][0-9][0-9])|([1-9][0-9][0-9])|([1-9][0-9])|[1-9])" required="required" required   class="inputBetForm" id="sum" name="sum" placeholder="Сумма">
                                                    <input type="hidden" value="'.$data.'" name="bet" >
                                                    <input type="hidden" value="'.$unik2.'" name="hash" >
                                                    <input type="hidden" value="ordinar" name="typeBet" >
                                               </div>
                                           </div>
                                           <div class="input-row column-6">
                                               <div class="input-row-inner">
                                                   <button type="submit" class="btn btn-primary pull-right inputBetSubmit">Сделать ставку</button>
                                               </div>
                                           </div>
                                       </div>
                                       </form>
</div>
  <div class="tab-pane fade" id="bet_system" role="tabpanel" aria-labelledby="bet_system_tab">
 Lorem 3 ipsum dolor sit amet, consectetur adipisicing elit. Aliquid deserunt ducimus inventore iusto numquam obcaecati unde ut? A corporis esse est magnam magni nulla quidem quis quisquam suscipit voluptatem! Quisquam. 
 
</div>
</div>';


        return $res;
    }












    /**
     * фильтр для новостроя
     * @return array|void
     */
    public function getFilterNovostroy(){
        $res=[];

        $regions=$this->getRegionsZk();

        $areas=$this->getAreas();
        $locality=$this->getLocality();
        $districtSity = $this->getDistrictCity();
        $districtSityOdessa = $this->getDistrictCity(33); /// Одесса
        $zastroi = $this->getAllJkZastroi(); /// Одесса
        $zk = $this->getAllJk(); /// Одесса


        //$res['realType']=$realType;

        $res['regions']=$regions;
        $res['areas']=$areas;
        $res['locality']=$locality;
        $res['districtSity']=$districtSity;
        $res['districtSityOdessa']=$districtSityOdessa;
        $res['zastroi']=$zastroi;
        $res['zk']=$zk;

        $res['minPrice']=JkRecord::find()->min('price');
        $res['maxPrice']=JkRecord::find()->max('price');;

        $res['minSquare']=Demorooms::find(['Total_area'])->where(1)-> min('Total_area');
        $res['maxSquare']=Demorooms::find(['Total_area'])->where(1)-> max('Total_area');


//yii::error([$res['minPrice'], $res['maxPrice']]);



        return $res;

    }

    //     WORKERS fun   defaut
    private function getEmptyfilter(){
          $res=[];
//        <option value="secondary">Квартира Вторичка</option>
//                                <option value="new-building">Квартира Новострой</option>
//                                <option value="houses">Дома, дачи</option>
//                                <option value="sector">Участок</option>
//                                <option value="commerce">Коммерция</option>
       // $realType=['name'=>'Тип недвижимости','options'=>[ ['name'=>'Квартира Вторичка','val'=>'secondary','status'=>'selected'], ['name'=>'Квартира Новострой','val'=>'new-building','status'=>''], ['name'=>'Дома, дачи','val'=>'houses','status'=>''], ['name'=>'Участок','val'=>'sector','status'=>''], ['name'=>'Коммерция','val'=>'commerce','status'=>''], ]];

        $realType=['name'=>'Тип недвижимости','options'=>[ ['name'=>'Квартира Вторичка','val'=>'secondary','status'=>'selected'], ['name'=>'Квартира Новострой','val'=>'new-building','status'=>''],  ['name'=>'Дома, дачи','val'=>'houses','status'=>''], ['name'=>'Участок','val'=>'sector','status'=>''], ['name'=>'Коммерция','val'=>'commerce','status'=>''], ]];
        if ('catalog'==Yii::$app->controller->id){ // без жк
            $realType=['name'=>'Тип недвижимости','options'=>[ ['name'=>'Квартира Вторичка','val'=>'secondary','status'=>'selected'],  ['name'=>'Дома, дачи','val'=>'houses','status'=>''], ['name'=>'Участок','val'=>'sector','status'=>''], ['name'=>'Коммерция','val'=>'commerce','status'=>''], ]];
        }



        $regions=$this->getRegions();
        $areas=$this->getAreas();
        $locality=$this->getLocality();
        $districtSity = $this->getDistrictCity(33);
        $districtSityOdessa = $this->getDistrictCity(33); /// Одесса


        $res['realType']=$realType;
        $res['regions']=$regions;
        $res['areas']=$areas;
        $res['locality']=$locality;
        $res['districtSity']=$districtSity;
        $res['districtSityOdessa']=$districtSityOdessa;
        $res['minPrice']=Demorooms::find(['price'])->where(1)-> min('price');
        $res['maxPrice']=Demorooms::find(['price'])->where(1)-> max('price');


        $res['minPriceNovostroi']=intval( JkRecord::find(['price'])->where(1)-> min('price'));
        $res['maxPriceNovostroi']=intval(JkRecord::find(['price'])->where(1)-> max('price'));

        $res['minPriceHouse']=1;
        $res['maxPriceHouse']=1001;
        $res['minPricePlace']=2;
        $res['maxPricePlace']=1002;
        $res['minPriceComerce']=3;
        $res['maxPriceComerce']=1003;




        $res['minSquare']=Demorooms::find(['Total_area'])->where(1)-> min('Total_area');
        $res['maxSquare']=Demorooms::find(['Total_area'])->where(1)-> max('Total_area');


        $res['minSquarePlace']=5; // площадь соток для участка
        $res['maxSquarePlace']=500;

        $res['minSquareHouse']=21; // площадь  для дома
        $res['maxSquareHouse']=250;
        $res['minSquareSotkaHouse']=5; // площадь соток для дома
        $res['maxSquareSotkaHouse']=225;

        $res['minSquareComerce']=121; // площадь  для комерции
        $res['maxSquareComerce']=1500;

//------------------------------     новострои фильтр  жк и застройщики
        $res['filterNovostroi']=$this->getFilterNovostroy();  // возможно нужно почитсить от ностроя улиц


//var_dump($res['filterNovostroi']);die();

//yii::error([$res['minPrice'], $res['maxPrice']]);



        return $res;
    }

    //     фильт для региона
    private function getRegionFilter(){
        $res=[];
        $res['type_filter']=$this->tFilter; // возврат типа фильтра
//        <option value="secondary">Квартира Вторичка</option>
//                                <option value="new-building">Квартира Новострой</option>
//                                <option value="houses">Дома, дачи</option>
//                                <option value="sector">Участок</option>
//                                <option value="commerce">Коммерция</option>
        // $realType=['name'=>'Тип недвижимости','options'=>[ ['name'=>'Квартира Вторичка','val'=>'secondary','status'=>'selected'], ['name'=>'Квартира Новострой','val'=>'new-building','status'=>''], ['name'=>'Дома, дачи','val'=>'houses','status'=>''], ['name'=>'Участок','val'=>'sector','status'=>''], ['name'=>'Коммерция','val'=>'commerce','status'=>''], ]];
         $realType=['name'=>'Тип недвижимости','options'=>[ ['name'=>'Квартира Вторичка','val'=>'secondary','status'=>'selected'], ['name'=>'Квартира Новострой','val'=>'new-building','status'=>''],  ['name'=>'Дома, дачи','val'=>'houses','status'=>''], ['name'=>'Участок','val'=>'sector','status'=>''], ['name'=>'Коммерция','val'=>'commerce','status'=>''], ]];
       // $regions=$this->getRegions();
        $areas=$this->getAreas($this->tData);

        $res['areas']=$areas;

        return $res;
    }

    //     фильт для обласного района
    private function getAreaFilter(){
        $res=[];
        $res['type_filter']=$this->tFilter; // возврат типа фильтра
//        <option value="secondary">Квартира Вторичка</option>
//                                <option value="new-building">Квартира Новострой</option>
//                                <option value="houses">Дома, дачи</option>
//                                <option value="sector">Участок</option>
//                                <option value="commerce">Коммерция</option>
        // $realType=['name'=>'Тип недвижимости','options'=>[ ['name'=>'Квартира Вторичка','val'=>'secondary','status'=>'selected'], ['name'=>'Квартира Новострой','val'=>'new-building','status'=>''], ['name'=>'Дома, дачи','val'=>'houses','status'=>''], ['name'=>'Участок','val'=>'sector','status'=>''], ['name'=>'Коммерция','val'=>'commerce','status'=>''], ]];
        $realType=['name'=>'Тип недвижимости','options'=>[ ['name'=>'Квартира Вторичка','val'=>'secondary','status'=>'selected'], ['name'=>'Квартира Новострой','val'=>'new-building','status'=>''],  ['name'=>'Дома, дачи','val'=>'houses','status'=>''], ['name'=>'Участок','val'=>'sector','status'=>''], ['name'=>'Коммерция','val'=>'commerce','status'=>''], ]];
        // $regions=$this->getRegions();
        //$areas=$this->getAreas($this->tData);
        $locality=$this->getLocality($this->tData);

        $res['location']=$locality;

        return $res;
    }
    //     фильт для обласного района
    private function getPlaceFilter(){
        $res=[];
        $res['type_filter']=$this->tFilter; // возврат типа фильтра
//        <option value="secondary">Квартира Вторичка</option>
//                                <option value="new-building">Квартира Новострой</option>
//                                <option value="houses">Дома, дачи</option>
//                                <option value="sector">Участок</option>
//                                <option value="commerce">Коммерция</option>
        // $realType=['name'=>'Тип недвижимости','options'=>[ ['name'=>'Квартира Вторичка','val'=>'secondary','status'=>'selected'], ['name'=>'Квартира Новострой','val'=>'new-building','status'=>''], ['name'=>'Дома, дачи','val'=>'houses','status'=>''], ['name'=>'Участок','val'=>'sector','status'=>''], ['name'=>'Коммерция','val'=>'commerce','status'=>''], ]];
        $realType=['name'=>'Тип недвижимости','options'=>[ ['name'=>'Квартира Вторичка','val'=>'secondary','status'=>'selected'], ['name'=>'Квартира Новострой','val'=>'new-building','status'=>''],  ['name'=>'Дома, дачи','val'=>'houses','status'=>''], ['name'=>'Участок','val'=>'sector','status'=>''], ['name'=>'Коммерция','val'=>'commerce','status'=>''], ]];
        // $regions=$this->getRegions();
        //$areas=$this->getAreas($this->tData);
       // $locality=$this->getLocality($this->tData);
        $districtSity = $this->getDistrictCity($this->tData);
        $res['place']=$districtSity;

        return $res;
    }



    //     WORKERS fun
    private function getSimplefilter(){

    }


    /** районы города >Малиновский Киевский Одесская обл.
     * @return array
     */
    public function getDistrictCity($idLocality=false)
    {

        $arr=['name'=>'Район города'];
        $tmp=[];
        if(empty($idLocality)){
            foreach (DistrictCityRecord::find()->where(1)->all() as $key => $value) {
                $tmp[]=['name'=>$value->Description,'val'=>$value->id_element,'status'=>''];

            }
        }else{
            foreach (DistrictCityRecord::find()->where(['id_locality'=>$idLocality])->all() as $key => $value) {
                $tmp[]=['name'=>$value->Description,'val'=>$value->id_element,'status'=>''];

            }
        }

        $arr['options']=$tmp;
        return $arr;
    }


    /**все области Одесская Львовская..
     * @return array
     */
    private function getRegions(){
        $arr=['name'=>'Область'];
        $tmp=[];
        foreach (RegionRecord::find()->where(1)->all() as $key => $value) {
            $tmp[]=['name'=>$value->Description,'val'=>$value->id_element,'status'=>''];
        }
        $arr['options']=$tmp;
        return $arr;
    }

    /**все Районы для жк
     * @return array
     */
    private  function getRegionsZk()
    {
        $arr=['name'=>'Область'];
        $tmp=[];
        foreach (RegionRecord::find()->where(1)->all() as $key => $value) {
            $tmp[]=['name'=>$value->Description,'val'=>$value->id_element,'status'=>''];
        }
        $arr['options']=$tmp;
        return $arr;
        //------------------------------

        $arr=['name'=>'Районы'];
        $tmp=[];
//        $n=JkRecord::find()->select('district_city')->orderBy('district_city')->all();
        $n=JkRecord::find()->where(1)->groupBy('region')->all();
        foreach (  $n as $key => $value ) {
          //  $tmp[]=['name'=>$value->Description,'val'=>$value->id_element,'status'=>''];
            $tmp[]=['name'=>$value->district_city,'val'=>$value->id,'status'=>''];
        }
        $arr['options']=$tmp;
        return $arr;
        // Yii::$app->cache->flush();

//        $db=JkRecord::getDb();
//        $res = $db->cache(function ($db) {
//
//            // Результат SQL запроса будет возвращен из кэша если
//            // кэширование запросов включено и результат запроса присутствует в кэше
//            return ArrayHelper::map( JkRecord::find()->select('district_city')->orderBy('district_city')->asArray()->all(), 'district_city', 'district_city');
//
//        },360);
//        return $res;
    }


    /**все  жк названия
     * @return array
     */
    private  function getAllJk()
    {

        $arr=['name'=>'ЖК'];
        $tmp=[];
//        $n=JkRecord::find()->select('district_city')->orderBy('district_city')->all();
        $n=Jktype::find()->where(['status'=>1])->orderBy(['sort'=>SORT_ASC])->all();
      //  $n= JkRecord::find()->where(1)orderBy('name_jk')->asArray()->all()
        foreach (  $n as $key => $value ) {
            $tmp[]=['name'=>$value->name,'val'=>$value->id,'status'=>''];
        }
        $arr['options']=$tmp;
        return $arr;
//        $db = JkRecord::getDb();
//        $res = $db->cache(function ($db) {
//
//            // Результат SQL запроса будет возвращен из кэша если
//            // кэширование запросов включено и результат запроса присутствует в кэше
//            return ArrayHelper::map(JkRecord::find()->select('name_jk')->orderBy('name_jk')->asArray()->all(), 'name_jk', 'name_jk');
//
//        });


    }

    /**все  застройщики
     * @return array
     */
    private  function getAllJkZastroi()
    {

        $arr=['name'=>'ЖК'];
        $tmp=[];
//        $n=JkRecord::find()->where(1)->groupBy('name_builder')->all();
        $n= Buildertype::find()->where(['status'=>1])->orderBy(['sort'=>SORT_ASC])->all();
        foreach (  $n as $key => $value ) {
            $tmp[]=['name'=>$value->name,'val'=>$value->id,'status'=>''];
        }
        $arr['options']=$tmp;
        return $arr;
//        $db = JkRecord::getDb();
//        $res = $db->cache(function ($db) {
//
//            // Результат SQL запроса будет возвращен из кэша если
//            // кэширование запросов включено и результат запроса присутствует в кэше
//            return ArrayHelper::map(JkRecord::find()->select('name_jk')->orderBy('name_jk')->asArray()->all(), 'name_jk', 'name_jk');
//
//        });


    }

    /**все обласные районы.. коминтеровский беляевский г.Одесса
     * @param string $id_element   ид ел
     * @return array
     */
    private function getAreas($id_element=''){
        $arr=['name'=>'Областной район'];
        $id_odessa=23;
        if (empty($id_element)) {
            $res=AreaRecord::find()->where(1)->all();
        }else{
            $res= AreaRecord::find()->where(['id_region'=>$id_element])->all();
        }
        $tmp=[];
        foreach ($res as $key => $value) {
            $tmp[]=['name'=>$value->Description,'val'=>$value->id_element,'status'=>$value->id_element==$id_odessa?'selected':'' ];
        }
        $arr['options']=$tmp;
        return $arr;
    }


    /**
     * Населенный пункт  золотая горка совинье..
     * @param string $id_element
     * @return array
     */
    public  function getLocality($id_element='')   // was SRATiC??
    {
        $arr=['name'=>'Населенный пункт'];
        $tmp=[];
        $id_odessa=33;
        if (empty($id_element)) {
            $res=LocalityRecord::find()->where(1)->orderBy('Description ASC')->all();
        }else{
            $res=LocalityRecord::find()->where(['id_area'=>$id_element])->orderBy('Description ASC')->all();
        }
        foreach ($res as $key => $value) {
            $tmp[]=['name'=>$value->Description,'val'=>$value->id_element,'status'=>$value->id_element==$id_odessa?'selected':''];
        }
        $arr['options']=$tmp;
        return $arr;
    }


//    /**
//     * фильтр для франщиз0ы один регион  - список городов
//     */
//    private function getFranshizafilter(){
//
//
//    }


}
