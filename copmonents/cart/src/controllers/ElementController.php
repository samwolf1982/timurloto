<?php
namespace dvizh\cart\controllers;

use common\models\helpers\ConstantsHelper;
use common\models\services\UserPlaylists;
use dvizh\cart\Cart;
use komer45\balance\models\Score;
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
        $elementItemId = yii::$app->request->post('elementId');

        $cart = yii::$app->cart;
        $elementId= $this->findIdByItemId($elementItemId);

        if(!is_null($elementId))  {
            $elementModel = $cart->getElementById($elementId);
        }else{
            $json['result'] = 'fail';
            $json['info'] = 'id is null';
        }
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
        /**@var Cart $cart*/
        $cart = yii::$app->cart;
        $postData = yii::$app->request->post();
        $current_cart=$cart->getCart()->my();

        $current_cart->current_coefficient=$postData['CartElement']['currentCooeficientDrop'];
        if(empty($postData['CartElement']['currentCooeficientDrop'])){  $current_cart->current_coefficient = ConstantsHelper::DEFAULT_COEFFICIENT; }

        $current_cart->playlist_id=$postData['CartElement']['playlist_id'];

       // $current_cart->status= $this->setStatusBet( $postData['CartElement']['status']);
        $current_cart->save();

        $model = $postData['CartElement']['model'];
        if($model) {
            $productModel = new $model();
            $productModel = $productModel::findOne($postData['CartElement']['item_id']);


            $options = [];
            if(isset($postData['CartElement']['options'])) {
                $options = $postData['CartElement']['options'];
            }

            if($postData['CartElement']['price'] && $postData['CartElement']['price'] != 'false') {
                yii::error('price');
                $elementModel = $cart->putWithPrice($productModel, $postData['CartElement']['price'], $postData['CartElement']['count'], $options);
            } else {
                yii::error(get_class($cart));

                $elementModel = $cart->put($productModel, $postData['CartElement']['count'], $options,null);
            }

            $json['elementId'] = $elementModel->getId();
            $json['result'] = 'success';
        } else {
            $json['result'] = 'fail';
            $json['error'] = 'empty model';
        }

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

    public function actionUpdateCoefficient()
    {
        $json = ['result' => 'undefined', 'error' => false];
        /**@var Cart $cart*/
        $cart = yii::$app->cart;
        $postData = yii::$app->request->post();
        $current_cart=$cart->getCart()->my();
        $current_cart->current_coefficient=$postData['CartElement']['currentCooeficientDrop'];

       if($current_cart->validate() && $current_cart->save()){
           $json['result'] = 'success';
       }else{
           $json['result'] = 'actionUpdateCoefficient has error';
       }

        return $this->_cartJson($json);
    }

    public function actionUpdatePlaylist()
    {
        $json = ['result' => 'undefined', 'error' => false];
        /**@var Cart $cart*/
        $cart = yii::$app->cart;
        $postData = yii::$app->request->post();
        $current_cart=$cart->getCart()->my();
        $userPlaylist =new UserPlaylists(Yii::$app->user->id,$postData['CartElement']['playlist'],$current_cart);
        $userPlaylist->changePlaylist();

        if($userPlaylist->changePlaylist()){
            $json['result'] = 'success';
        }else{
            $json['result'] = 'actionUpdatePlaylist has error';
        }

        return $this->_cartJson($json);
    }


    /**
     * обновить чекбокс в корзине
     * @return string
     */
    public function actionUpdateBetStatus()
    {
        $json = ['result' => 'undefined', 'error' => false];

        $cart = yii::$app->cart;

        $postData = yii::$app->request->post();
        $elementModel=null;
        if(isset($postData['CartElement']['status'])) {

            foreach ($cart->elements as $element) {
                if($element->item_id==$postData['CartElement']['id']){
                    if($postData['CartElement']['status'] > 0){
                        $element->status= ConstantsHelper::STATUS_CHECKBOX_BET_ACTIVE ;

                    }else{
                        $element->status=ConstantsHelper::STATUS_CHECKBOX_BET_UN_ACTIVE;
                    }

                    if($element->validate() && $element->save()){
                        $elementModel=$element;
                    }else{
                        yii::error($element->errors);
                    }
                }
            }
//          die(  var_dump( get_class($elementModel)));
//            $elementModel->setStatuscheckbox($postData['CartElement']['status'], true);
        }

        if(is_null($elementModel)){
            $json['result'] = 'some error in actionUpdateBetStatus';
        }else{
            $json['elementId'] = $elementModel;
            $json['result'] = 'success';
        }



        return $this->_cartJson($json);
    }


    public function actionUpdateStatus()
    {
        $json = ['result' => 'undefined', 'error' => false];
        /**@var Cart $cart*/
        $cart = yii::$app->cart;
        $postData = yii::$app->request->post();
        $current_cart=$cart->getCart()->my();

        $current_cart->status= $this->setStatusBet( $postData['CartElement']['status']);

        if($current_cart->validate() && $current_cart->save()){
            $json['result'] = 'success';
        }else{
            $json['result'] = 'actionUpdateStatus has error';
        }

        return $this->_cartJson($json);
    }


    private function _cartJson($json)
    {


        if ($cartModel = yii::$app->cart) {
            if(!$elementsListWidgetParams = yii::$app->request->post('elementsListWidgetParams')) {
                $elementsListWidgetParams = [];
            }

            //$json['elementsHTML'] = \dvizh\cart\widgets\ElementsList::widget($elementsListWidgetParams);
            $json['elements'] = $cartModel->getElements();
            $json['count'] = $cartModel->getCount();
            $json['clear_price'] = $cartModel->getCost(false);
            $json['price'] = $cartModel->getCostFormatted();
//            $json['currentCooeficientDrop'] = 777;


        } else {
            $json['count'] = 0;
            $json['price'] = 0;
            $json['clear_price'] = 0;
        }

        $b= Score::find()->where(['user_id' => Yii::$app->user->id])->one()->balance;
        $balance  = number_format($b, 0, '', ',');
        $json['currentBalance'] = $balance;


        return Json::encode($json);
    }

    private function findIdByItemId($item_id){

        if ($cartModel = yii::$app->cart) {
                   foreach ($cartModel->getElements() as $cartElement) {
                       if ($cartElement->item_id==$item_id) return $cartElement->id;
                   }
        }
        return null;
            //$json['elementsHTML'] = \dvizh\cart\widgets\ElementsList::widget($elementsListWidgetParams);
//            $json['elements'] = $cartModel->getElements();
//            $json['count'] = $cartModel->getCount();
//            $json['clear_price'] = $cartModel->getCost(false);
//            $json['price'] = $cartModel->getCostFormatted();
//        foreach ($cartElements as $cartElement) {
//                    if ($cartElement->item_id==$item_id) return $cartElement->id;
//                }
//                return null;

    }


    private function setStatusBet($status)
    {
        yii::error($status);
        if($status == 'public'){
            return ConstantsHelper::STATUS_PUBLIC_BET;
        }else if($status == 'private'){
            return ConstantsHelper::STATUS_PRIVATE_BET;
        }else{

            return ConstantsHelper::STATUS_PUBLIC_BET;
        }
    }
}
