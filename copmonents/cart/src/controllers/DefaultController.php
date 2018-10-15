<?php
namespace dvizh\cart\controllers;

use dvizh\cart\models\Cart;
use komer45\balance\models\Score;
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
//            $json['full_name_shod'] = $cartModel->current_market_name;
//            $json['coef'] = $this->getCurrentCooef($cartModel);
//            $json['m_name'] =  $cartModel->getMarketName();
            //$json['elementsHTML'] = \dvizh\cart\widgets\ElementsList::widget();

        } else {
            $json['count'] = 0;
            $json['price'] = 0;
        }


        $b= Score::find()->where(['user_id' => Yii::$app->user->id])->one()->balance;
//        $balance  = number_format($b, 0, '', ',');
        $json['currentBalance'] =  $b;

        return Json::encode($json);
    }

}
