<?php
namespace dvizh\cart\controllers;

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

}
