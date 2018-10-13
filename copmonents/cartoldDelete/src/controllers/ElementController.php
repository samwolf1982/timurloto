<?php
namespace dvizh\cart\controllers;

use common\models\Bets;
use common\models\wraps\BetsExt;
use yii\helpers\Json;
use yii\filters\VerbFilter;
use yii;

class ElementController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'create' => ['post'],
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actionDelete()
    {
        $json = ['result' => 'undefined', 'error' => false];
        $elementId = yii::$app->request->post('elementId');

        $cart = yii::$app->cart;

        $elementModel = $cart->getElementById($elementId);

        if($cart->deleteElement($elementModel)) {
            $json['result'] = 'success';
        }
        else {
            $json['result'] = 'fail';
        }

        return $this->_cartJson($json);
    }

    public function actionCreate()
    {
        $json = ['result' => 'undefined', 'error' => false];

        $cart = yii::$app->cart;
        $postData = yii::$app->request->post();
        $model = $postData['CartElement']['model'];
        if($model){
            $productModel = new $model($postData['CartElement']['cat_id'],$postData['CartElement']['item_id'],$postData['CartElement']['players_id']);  //app\models\Wagercart
            // $productModel = $productModel::findOne($postData['CartElement']['cat_id']);
            // $productModel = $productModel::findOne($postData['CartElement']['item_id']);
            //   $productModel->
            $options = [];
//            if(isset($postData['CartElement']['options'])) {
//                $options = $postData['CartElement']['options'];
//            }
            if($postData['CartElement']['price'] && $postData['CartElement']['price'] != 'false') {
                $elementModel = $cart->putWithPrice($productModel, $postData['CartElement']['price'], $postData['CartElement']['count'], $options);
            } else {
                $elementModel = $cart->put($productModel, $postData['CartElement']['count'], $options);
            }

            $json['elementId'] = $elementModel->getId();
            $json['result'] = 'success';
        }else{
            $json['result'] = 'fail';
            $json['error'] = 'empty model';
        }

        return $this->_cartJson($json);
    }


    /**
     * смена состояния чекбокса
     * @return string
     */
    public function actionChose()
    {
        $json = ['result' => 'undefined', 'error' => false];
        $cart = yii::$app->cart;
        $elementId = yii::$app->request->post('elementId');
        $elementModel = $cart->getElementById($elementId);

//        if(isset($postData['CartElement']['count'])) {
//            $elementModel->setCount($postData['CartElement']['count'], true);
//        }
//
//        if(isset($postData['CartElement']['options'])) {
//            $elementModel->setOptions($postData['CartElement']['options'], true);
//        }
        $state=yii::$app->request->post('status');
        if(empty($state)){
            $state=0;
        }else{
            $state=1;
        }
        $elementModel->setStatus($state,true);

        $json['elementId'] = $elementModel->getId();
        $json['result'] = 'success';

        return $this->_cartJson($json);
    }

    public function actionUpdate()
    {
        $json = ['result' => 'undefined', 'error' => false];

        $cart = yii::$app->cart;
        
        $postData = yii::$app->request->post();

        $elementModel = $cart->getElementById($postData['CartElement']['id']);
        
        if(isset($postData['CartElement']['count'])) {
            $elementModel->setCount($postData['CartElement']['count'], true);
        }
        
        if(isset($postData['CartElement']['options'])) {
            $elementModel->setOptions($postData['CartElement']['options'], true);
        }
        
        $json['elementId'] = $elementModel->getId();
        $json['result'] = 'success';

        return $this->_cartJson($json);
    }

    private function _cartJson($json)
    {
        if ($cartModel = yii::$app->cart) {
            if(!$elementsListWidgetParams = yii::$app->request->post('elementsListWidgetParams')) {
                $elementsListWidgetParams = [];
            }

          //  $json['elementsHTML'] = \dvizh\cart\widgets\ElementsList::widget($elementsListWidgetParams);
            $json['elementsHTML'] =$this->generateHtml($json);
            $json['count'] = $cartModel->getCount();
            $json['clear_price'] = $cartModel->getCost(false);
            $json['price'] = $cartModel->getCostFormatted();
        } else {
            $json['count'] = 0;
            $json['price'] = 0;
            $json['clear_price'] = 0;
        }
        return Json::encode($json);
    }
    public static function generateHtml($json){
        $cart = yii::$app->cart;
      //  yii::error($cart->getElements());
        $res='';
        foreach ( yii::$app->cart->getElements() as $item ) {
           // yii::error( get_class($item) );
            // todo здесь можно сделать кешырование по полю время обновление в парсере (если есть такое    )
           // yii::error( $item->status );
           // $modelsTmp=     BetsExt::find()->select(['event_id','market_id','outcomes','market_name','result_type_id','market_template_id','result_type_name'])->where(['event_id'=>$item->category_id,'status'=>1])->one(); // TournamentsnamesExt::findAll();

           //   $modelsTmp=     BetsExt::find()->select(['event_id','market_id','outcomes','market_name','result_type_id','market_template_id','result_type_name'])->where(['id'=>rand(5,25000)])->one(); // TournamentsnamesExt::findAll();
           //   $modelsTmp=     BetsExt::find()->select(['event_id','market_id','outcomes','market_name','result_type_id','market_template_id','result_type_name'])->where(['market_id'=>$item->category_id])->one(); // TournamentsnamesExt::findAll();
           //   $modelsTmp=     BetsExt::find()->select(['event_id','market_id','outcomes','market_name','result_type_id','market_template_id','result_type_name'])->where(['event_id'=>$item->category_id])->one(); // TournamentsnamesExt::findAll();
            //  yii::error( $item->category_id );
             //yii::error( $modelsTmp );
//            $catName=$modelsTmp->market_name;
            $catName=$item->name_full;
            $subCatName=$item->main_cat_name.' '.$item->cat_name;
            $evtentName=$item->name;
            $coof=$item->coof;
            $res.='<div class="cartElement" data-cod="1">
                                    <div class="closeE">
                                        <button type="button" class="close stickiClose" data-id="'.$item->id.'" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="selectE">
                                        <div class="form-check form-check-inline">';

            // проверка на чекбокс актив или нет
            if (empty($item->status)){
                $res.=  '<input class="form-check-input" name="bets['.$item->id.']" data-id="'.$item->id.'"  type="checkbox" value="0">';
            }else{
                $res.=  '<input class="form-check-input" name="bets['.$item->id.']" data-id="'.$item->id.'"  type="checkbox" value="'.$item->status .'"    checked  checked="checked" >';
            }
                                     $res.='</div>
                                    </div>
                                    <div class="infoE">
                                        <div class="name1">'.$catName.' </div>
                                        <div class="name2">'.$subCatName.'</div>
                                        <div class="name3">
                                               <div class="_name3">
                                                 '.$evtentName.'
                                               </div>
                                            <div class="_name3Cof">
                                                 X  '.$coof.'
                                               </div>

                                        </div>
                                    </div>

                                </div> <hr/>';

          //  break;
        }
        return $res;

    }

}
