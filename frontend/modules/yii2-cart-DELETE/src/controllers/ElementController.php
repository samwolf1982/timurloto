<?php
namespace dvizh\cart\controllers;

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

    /**
     * переделано цену делим на количество
     * @return string
     */
    public function actionCreate()
    {
        $json = ['result' => 'undefined', 'error' => false];

        $cart = yii::$app->cart;

        $postData = yii::$app->request->post();

        $model = $postData['CartElement']['model'];
        if($model) {
            $productModel = new $model();
            $productModel = $productModel::findOne($postData['CartElement']['item_id']);
           // var_dump('sss'); die();
            $options = [];
            if(isset($postData['CartElement']['options'])) {
                $options = $postData['CartElement']['options'];
            }

//            if($postData['CartElement']['price'] && $postData['CartElement']['price'] != 'false') {    // can put own price
            // для комплексов всегда пересчет в беке
            if($postData['CartElement']['price'] && $postData['CartElement']['price'] != 'false' && $postData['CartElement']['model'] !='common\models\Productext' ) {    // can put own price
                        // var_dump('sss1'); die();

                  //$elementModel = $cart->putWithPrice($productModel, $postData['CartElement']['price'], $postData['CartElement']['count'], $options);
                $elementModel = $cart->putWithPrice($productModel, ($postData['CartElement']['price'] / $postData['CartElement']['count']), $postData['CartElement']['count'], $options);
            } else {
                // var_dump(get_class($cart)); die();  //dvizh\cart\Cart
                //var_dump('sss2'); die();
                $elementModel = $cart->put($productModel, $postData['CartElement']['count'], $options);

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

    public function actionCreateOR()
    {
        $json = ['result' => 'undefined', 'error' => false];

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
                $elementModel = $cart->putWithPrice($productModel, $postData['CartElement']['price'], $postData['CartElement']['count'], $options);
            } else {
                $elementModel = $cart->put($productModel, $postData['CartElement']['count'], $options);
            }

            $json['elementId'] = $elementModel->getId();
            $json['result'] = 'success';
        } else {
            $json['result'] = 'fail';
            $json['error'] = 'empty model';
        }

        return $this->_cartJson($json);
    }
    public function actionUpdateOR()
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
            $postData = yii::$app->request->post();
            if(!$elementsListWidgetParams = yii::$app->request->post('elementsListWidgetParams')) {
                $elementsListWidgetParams = [];
            }
//            $postData['CartElement']['id']
//yii::error([$cartModel->getElementById($postData['CartElement']['id'])->price ]);
            $json['elementsHTML'] = \dvizh\cart\widgets\ElementsList::widget($elementsListWidgetParams);
            $json['count'] = $cartModel->getCount();
            $json['clear_price'] = $cartModel->getCost(false);
            $json['price'] = $cartModel->getCostFormatted();
            $json['delivery_price'] =$cartModel->getCostDelivery();
            $json['total_price_ext'] =$cartModel->getCostFormatted();
            $json['total_price'] =$cartModel->getCostTotal();
            $json['info_message'] =$cartModel->info_message;
            $json['single_price'] =   number_format(($cartModel->getElementById($postData['CartElement']['id'])->price * $postData['CartElement']['count']), 0, '.', '') ;
        } else {
            $json['count'] = 0;
            $json['price'] = 0;
            $json['clear_price'] = 0;
            $json['delivery_price'] =0;
            $json['total_price_ext'] =0;
            $json['total_price'] =0;
            $json['info_message']='';
            $json['single_price'] =0;
        }
        return Json::encode($json);
    }

}
