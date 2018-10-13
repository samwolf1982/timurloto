<?php
namespace dvizh\cart\controllers;

use dvizh\cart\models\Cart;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii;

class DefaultController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'truncate' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $elements = yii::$app->cart->elements;

        return $this->render('index', [
            'elements' => $elements,
        ]);
    }

    public function actionTruncate()
    {
        $json = ['result' => 'undefined', 'error' => false];

        $cartModel = yii::$app->cart;
        
        if ($cartModel->truncate()) {
            $json['result'] = 'success';
        } else {
            $json['result'] = 'fail';
            $json['error'] = $cartModel->getCart()->getErrors();
        }

        return $this->_cartJson($json);
    }

    public function actionInfo() {
        return $this->_cartJson();
    }

    
    private function _cartJson($json=[])
    {
        /** @var Cart $cartModel */
        if ($cartModel = yii::$app->cart) {
//            var_dump($cartModel);
            $json['count'] = $cartModel->getCount();
            $json['elements'] = $cartModel->getElements();
            $json['price'] = $cartModel->getCostFormatted();
//            $json['coef'] = $this->getCurrentCooef($cartModel);
            $json['m_name'] = $this->getMarketName($cartModel);
            //$json['elementsHTML'] = \dvizh\cart\widgets\ElementsList::widget();

        } else {
            $json['count'] = 0;
            $json['price'] = 0;
        }
        return Json::encode($json);
    }

    /** @var Cart $cartModel */
    private function getMarketName($cartModel){
        return $cartModel->market_name;
    }


    /** @var Cart $cartModel */
    private function getCurrentCooef($cartModel){

        return 777777;
    }
}
