<?php
namespace dvizh\cart\controllers;

use common\models\services\UserCoeficient;
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


    /**
     * полная проверка  проверяем в парсере
     * @return string
     */
    public function actionInfo() {
        return $this->_cartJsonLocalStorage();
    }

    private function _cartJsonLocalStorage($json=[])
    {
        /** @var Cart $cartModel */
        if ($cartModel = yii::$app->cart) {       // проверка если по времени не будет долго.
          //  yii::error(Yii::$app->request->post('CartElements'));
          // var_dump($cartModel);
            $json['count'] = count(Yii::$app->request->post('CartElements'));
//            $json['elements']=$cartModel->getElements();
            $json['elements']=Yii::$app->request->post('CartElements');
//            $json['price'] = $cartModel->getCostFormatted();
            $json['price'] = 55;

            $current_cart=$cartModel->getCart()->my();
            $currentCooeficientDrop= $current_cart->current_coefficient;
            if(empty($currentCooeficientDrop)){ $currentCooeficientDrop =1; }

            $userCoefficient=new UserCoeficient(Yii::$app->request->post('CartElements'));
            $max_coeficientDrop=$userCoefficient->getMaxCoeficient();


            if($max_coeficientDrop < $currentCooeficientDrop){ // перезапись если коофициент не совпадает по процентам. ставим максимально возможный  в виджете тоже нужно править --frontend/copmonents/widgets/dashboardcart/DashboardcartWidget.php
                $currentCooeficientDrop =$max_coeficientDrop;
                $current_cart->current_coefficient=$currentCooeficientDrop;
                $current_cart->save(false);
            }


            $json['currentCooeficientDrop'] = $current_cart->current_coefficient;
            $json['max_coeficientDrop'] = $max_coeficientDrop;
//            $json['full_name_shod'] = $cartModel->current_market_name;
//            $json['coef'] = $this->getCurrentCooef($cartModel);
//            $json['m_name'] =  $cartModel->getMarketName();
            //$json['elementsHTML'] = \dvizh\cart\widgets\ElementsList::widget();

        } else {
            $json['count'] = 0;
            $json['price'] = 0;
        }

        $scope=Score::find()->where(['user_id' => Yii::$app->user->id])->one();
        $b=!empty($scope)?$scope->balance:0;
        //  $b= Score::find()->where(['user_id' => Yii::$app->user->id])->one()->balance;
//        $balance  = number_format($b, 0, '', ',');
        $json['currentBalance'] =  $b;


        return Json::encode($json);
    }
    
    private function _cartJson($json=[])
    {
        /** @var Cart $cartModel */
        if ($cartModel = yii::$app->cart) {
//            var_dump($cartModel);
            $json['count'] = $cartModel->getCount();
            $json['elements'] = $cartModel->getElements();
            $json['price'] = $cartModel->getCostFormatted();
            $current_cart=$cartModel->getCart()->my();
            $currentCooeficientDrop= $current_cart->current_coefficient;
            if(empty($currentCooeficientDrop)){ $currentCooeficientDrop =1; }

            $userCoefficient=new UserCoeficient(yii::$app->cart);
            $max_coeficientDrop=$userCoefficient->getMaxCoeficient();
            if($max_coeficientDrop < $currentCooeficientDrop){ // перезапись если коофициент не совпадает по процентам. ставим максимально возможный  в виджете тоже нужно править --frontend/copmonents/widgets/dashboardcart/DashboardcartWidget.php
                $currentCooeficientDrop =$max_coeficientDrop;
                $current_cart->current_coefficient=$currentCooeficientDrop;
                $current_cart->save(false);
            }

            $json['currentCooeficientDrop'] = $current_cart->current_coefficient;
            $json['max_coeficientDrop'] = $max_coeficientDrop;
//            $json['full_name_shod'] = $cartModel->current_market_name;
//            $json['coef'] = $this->getCurrentCooef($cartModel);
//            $json['m_name'] =  $cartModel->getMarketName();
            //$json['elementsHTML'] = \dvizh\cart\widgets\ElementsList::widget();

        } else {
            $json['count'] = 0;
            $json['price'] = 0;
        }

        $scope=Score::find()->where(['user_id' => Yii::$app->user->id])->one();
        $b=!empty($scope)?$scope->balance:0;
      //  $b= Score::find()->where(['user_id' => Yii::$app->user->id])->one()->balance;
//        $balance  = number_format($b, 0, '', ',');
        $json['currentBalance'] =  $b;


        return Json::encode($json);
    }

}
