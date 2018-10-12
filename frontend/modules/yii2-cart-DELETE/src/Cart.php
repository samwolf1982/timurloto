<?php
namespace dvizh\cart;

use common\models\Wishlist;
use dvizh\order\models\Order;
use dvizh\order\models\ShippingType;
use yii\base\Component;
use yii\helpers\ArrayHelper;
use dvizh\cart\events\Cart as CartEvent;
use dvizh\cart\events\CartElement as CartElementEvent;
use dvizh\cart\events\CartGroupModels;
use yii;
use yii\web\Response;

class Cart extends Component
{

    const EVENT_CART_INIT = 'cart_init';
    const EVENT_CART_TRUNCATE = 'cart_truncate';
    const EVENT_CART_COST = 'cart_cost';
    const EVENT_CART_COUNT = 'cart_count';
    const EVENT_CART_PUT = 'cart_put';
    const EVENT_CART_UPDATE = 'cart_update';
    const EVENT_CART_ROUNDING = 'cart_rounding';
    const EVENT_MODELS_ROUNDING = 'cart_models_rounding';
    const EVENT_ELEMENT_COST = 'element_cost';
    const EVENT_ELEMENT_PRICE = 'element_price';
    const EVENT_ELEMENT_ROUNDING = 'element_rounding';
    const EVENT_ELEMENT_COST_CALCULATE = 'element_cost_calculate';
    const EVENT_ELEMENT_BEFORE_DELETE = 'element_before_delete';


    // проверка на  растояниеи и сумму      * return 0,1,2,3     0- нету растояния и суммы 1 - растоняние ок но нету суммы 2 - растоняие ок и сумма ок 3-free delivery
    const DISNATCE_NO_SUM_NO  = 0;
    const DISNATCE_OK_SUM_NO  = 1;
    const DISNATCE_OK_SUM_OK  = 2;
    const DISNATCE_OK_SUM_OK_FREE_DELIVERY  = 3;

    private $cost = 0;
    private $element = null;
    private $cart = null;

    public $currency = NULL;
    public $elementBehaviors = [];
    public $currencyPosition = 'after';
    public $priceFormat = [2, '.', ''];
    public $info_message='';
   // public $msg="Для доставки в указаное место доберите товара <br/> на сумму %s грн.";
    public $msg="Для доставки в указаное место доберите товара  на сумму %s грн.";
    public $confirm_order_delivery_distrance=false;   // если + тогда можна делать субмит в форме

    public function __construct(interfaces\Cart $Cart, interfaces\Element $Element, $config = [])
    {
        $this->cart = $Cart;
        $this->element = $Element;

        parent::__construct($config);
    }

    public function init()
    {
        $this->trigger(self::EVENT_CART_INIT, new CartEvent(['cart' => $this->cart]));
        $this->update();

        return $this;
    }



    public function put(\dvizh\cart\interfaces\CartElement $model, $count = 1, $options = [], $comment = null,$components='')
    {


      //  $this->cart  --- dvizh\cart\models\Cart
        //$elementModel --- dvizh\cart\Cart
        //$model --- common\models\Productext
    // var_dump( get_class($this->cart->getElement($model, $options))); die();
//     var_dump( get_class($model)); die();
        if (!$elementModel = $this->cart->getElement($model, $options)) {// если такой елемет нет   в корзине  тогда просто добавить иначе просто пересчет пересчет
            $elementModel = new $this->element;   //   dvizh\cart\models\CartElement
           // var_dump( get_class($elementModel)); die();
            $elementModel->setCount((int)$count);
            $priceModel=$model->getCartPrice();
            if(get_class($model)=='common\models\Productext'){
               // var_dump($priceModel);  die( 'prdodd');
            }
            //var_dump( get_class($elementModel)); die();
            //  $elementModel->setPrice($model->getCartPrice());
            $elementModel->setPrice($priceModel);
            $elementModel->setItemId($model->getCartId());
            $elementModel->setModel(get_class($model));
            $elementModel->setOptions($options);
            $elementModel->setComment($comment);
           // var_dump(  $elementModel); die();
            //var_dump(  ['stop here'=>__DIR__]); die();


           // $elementModel->setComponents($components);

            $elementEvent = new CartElementEvent(['element' => $elementModel]);
            $this->trigger(self::EVENT_CART_PUT, $elementEvent);
            if(!$elementEvent->stop) {
                try {
                    $this->cart->put($elementModel);
                } catch (Exception $e) {
                    throw new \yii\base\Exception(current($e->getMessage()));
                }
            }
        } else {
            $elementModel->countIncrement($count);
        }

        // TODO DRY
        $this->update();
        $elementEvent = new CartEvent([
            'cart' => $this->getElements(),
            'cost' => $this->getCost(),
            'count' => $this->getCount(),
        ]);
        $this->trigger(self::EVENT_CART_UPDATE, $elementEvent);
        return $elementModel;
    }

    public function putWithPrice(\dvizh\cart\interfaces\CartElement $model, $price = 0, $count = 1, $options = [], $comment = null,$components='')
    {
        //var_dump( get_class($model)); die();
        if (!$elementModel = $this->cart->getElement($model, $options, $price)) {
            $elementModel = $this->element;
            $elementModel->setCount((int)$count);
            $elementModel->setPrice($price);
            $elementModel->setItemId($model->getCartId());
            $elementModel->setModel(get_class($model));
            $elementModel->setOptions($options);
            $elementModel->setComment($comment);

            $elementEvent = new CartElementEvent(['element' => $elementModel]);
            $this->trigger(self::EVENT_CART_PUT, $elementEvent);

            if(!$elementEvent->stop) {
                try {
                    $this->cart->put($elementModel);
                } catch (Exception $e) {
                    throw new \yii\base\Exception(current($e->getMessage()));
                }
            }
        } else {
            $elementModel->countIncrement($count);
        }

        // TODO DRY
        $this->update();
        $elementEvent = new CartEvent([
            'cart' => $this->getElements(),
            'cost' => $this->getCost(),
            'count' => $this->getCount(),
        ]);
        $this->trigger(self::EVENT_CART_UPDATE, $elementEvent);


        return $elementModel;
    }


    private function putExtProd(){

    }


    public function getElements()
    {
        return $this->cart->elements;
    }

    public function getHash()
    {
        $elements = $this->elements;

        return md5(implode('-', ArrayHelper::map($elements, 'id', 'id')).implode('-', ArrayHelper::map($elements, 'count', 'count')));
    }

    public function getCount()
    {
        $count = $this->cart->getCount();

        $cartEvent = new CartEvent(['cart' => $this->cart, 'count' => $count]);
        $this->trigger(self::EVENT_CART_COUNT, $cartEvent);
        $count = $cartEvent->count;

        return $count;
    }

    public function getCountlike()
    {

        $cookies = Yii::$app->request->cookies;
        $user_tmp_id=Yii::$app->user->getId();
        if(is_null($user_tmp_id)){
            $user_tmp_id = $cookies->getValue('user_tmp_id');
        }
        $count =  Wishlist::find()->where(['user_id'=>$user_tmp_id])->count();
        return $count;
    }

    public function getCost($withTriggers = true)
    {
        $elements = $this->cart->elements;

        $pricesByModels = [];

        foreach($elements as $element) {
            $price = $element->getCost($withTriggers);

            if (!isset($pricesByModels[$element->model])) {
                $pricesByModels[$element->model] = 0;
            }

            $pricesByModels[$element->model] += $price;
        }

        $cost = 0;

        foreach($pricesByModels as $model => $price) {
            $cartGroupModels = new CartGroupModels(['cart' => $this->cart, 'cost' => $price, 'model' => $model]);
            $this->trigger(self::EVENT_MODELS_ROUNDING, $cartGroupModels);
            $cost += $cartGroupModels->cost;
        }

        $cartEvent = new CartEvent(['cart' => $this->cart, 'cost' => $cost]);

        if($withTriggers) {
            $this->trigger(self::EVENT_CART_COST, $cartEvent);
            $this->trigger(self::EVENT_CART_ROUNDING, $cartEvent);
        }

        $cost = $cartEvent->cost;

        $this->cost = $cost;

        return $this->cost;
    }


    /**
     * вывод полной стоимости
     * @param bool $withTriggers
     * @return int
     */
    public function getCostTotal($withTriggers = true)
    {

        $ship_price=0;
        $orderModel = new Order;
        if(empty($orderModel->shipping_type_id) && $orderShippingType = yii::$app->session->get('orderShippingType')) {
            if($orderShippingType > 0) {
                $orderModel->shipping_type_id = (int)$orderShippingType;
            }
        }else{
            $orderShippingType = yii::$app->session->get('orderShippingType');
        }
        $orderShipping=   ShippingType::find()->where(['id'=>$orderShippingType])->one();

        if ($orderShipping){
            $is_pecent=false;
            $is_negative=false;
            if (strstr($orderShipping->cost,'%')){$is_pecent=true;}
            if (strstr($orderShipping->cost,'-')){$is_negative=true;}
            if ($is_pecent){ // для процентов сейчас расчета нету
                 $ship_price= $orderShipping->cost;
            }else{
                $ship_price= $orderShipping->cost;
            }
            $ship_price= $orderShipping->cost;
        }

    //   -----------
        $elements = $this->cart->elements;

        $pricesByModels = [];

        foreach($elements as $element) {
            $price = $element->getCost($withTriggers);

            if (!isset($pricesByModels[$element->model])) {
                $pricesByModels[$element->model] = 0;
            }

            $pricesByModels[$element->model] += $price;
        }

        $cost = 0;

        foreach($pricesByModels as $model => $price) {
            $cartGroupModels = new CartGroupModels(['cart' => $this->cart, 'cost' => $price, 'model' => $model]);
            $this->trigger(self::EVENT_MODELS_ROUNDING, $cartGroupModels);
            $cost += $cartGroupModels->cost;
        }

        $cartEvent = new CartEvent(['cart' => $this->cart, 'cost' => $cost]);

        if($withTriggers) {
            $this->trigger(self::EVENT_CART_COST, $cartEvent);
            $this->trigger(self::EVENT_CART_ROUNDING, $cartEvent);
        }

        $cost = $cartEvent->cost;
        $this->cost = $cost+$ship_price;

        // доставка если есть
        $delivery=$this->getCostDelivery(0);
        if (!empty($delivery)){
            $this->cost+=$delivery;
        }

          return  $this->getCostFormatted(  $this->cost); ;
    }


    /**
     *     /**
     * вывод только стоимости доставки
     * own code getCostDelivery
     *
     *
     * @param bool $formated     //  вывод простого чила или форматированоно с валютой
     * @return string
     */
    public function getCostDelivery($formated=true)
    {
        $session = Yii::$app->session;
        $orderModel = new Order;
        if(empty($orderModel->shipping_type_id) && $orderShippingType = yii::$app->session->get('orderShippingType')) {
            if($orderShippingType > 0) {
                $orderModel->shipping_type_id = (int)$orderShippingType;
            }
        }else{
            $orderShippingType = yii::$app->session->get('orderShippingType');
        }
        $cost=0;
        $orderShipping=   ShippingType::find()->where(['id'=>$orderShippingType])->one();
        if ($orderShipping){
            yii::error(['cost delivery'=>$orderShipping->cost]);
            // проверка на тип записи + - %
            $is_pecent=false;
            $is_negative=false;
            if (strstr($orderShipping->cost,'%')){$is_pecent=true;}
            if (strstr($orderShipping->cost,'-')){$is_negative=true;}
            if ($is_pecent){ // для процентов сейчас расчета нету
                $cost=$orderShipping->cost;
            }else{
                $cost=$orderShipping->cost;
            }
        }
        //       растояние  и подсчет.
        $distance=$session->get('distance');





        if($this->getCost()>=250){
        if(!empty($distance)){

//yii::error(['cost'=>$this->getCost(),'dist'=>$distance]);
            if($distance<=5000 && $this->getCost() < 300){
                $cost=50;
            }
            if($distance<=5000 && $this->getCost() >= 300){ // бесплатная доствака до 5км и больше 300гр
                $cost=0;
            }

            if($distance>5000 && $distance<=9000 && $this->getCost() >= 350){ // бесплатная доствака до 5 - 9км и больше 350гр
                $cost=0;
            }
            if($distance>5000 && $distance<=9000 && $this->getCost() < 350){
                $cost=70;
            }

            if($distance>9000 && $distance<=11000 && $this->getCost() >= 400){ // бесплатная доствака до 9 - 11км и больше 400гр
                $cost=0;
            }
            if($distance>9000 && $distance<=11000 && $this->getCost() < 400){ //
                $this->info_message = sprintf($this->msg,400);
            }

            if($distance>11000 && $distance<=13000 && $this->getCost() >= 600){ // бесплатная доствака до 11 - 13км и больше 600гр
                $cost=0;
            }
            if($distance>11000 && $distance<=13000 && $this->getCost() < 600){ //
                $this->info_message = sprintf($this->msg,600);
            }

            if($distance>13000){ //
                $this->info_message = 'Слишком далеко пока.';
            }

        }
        }else{
            $this->info_message = "Минимальная сумма заказа 250грн. + доставка";
        } // end if  250








        //------------------new method for change
//        $p[]= [0,2000,250,50,       300, 0];
//        $p[]= [2000,5000,300,60,    350 ,0];
//        $p[]= [5000,9000,350,70,    400, 0];
//        $p[]= [9000,11000,400,80,   450, 0];
//        $p[]= [11000,14000,600,90,  700, 0];

        if($this->getCost()>=250) {
            if (!empty($distance)) {

               // yii::error(['cost' => $this->getCost(), 'dist' => $distance]);
            }
        }


        // отчет идет от самых большых растояний
        $delivery_cost_min_sum=600;
        $delivery_cost=90;
      $r =  $this->distance_check($distance , 11000,14000, $this->getCost() ,$delivery_cost_min_sum,700);

      $d_num=4;

        if($r==Cart::DISNATCE_NO_SUM_NO){
            $delivery_cost_min_sum=400;
            $r =  $this->distance_check($distance , 9000,11000, $this->getCost() ,$delivery_cost_min_sum,450);
            $delivery_cost=80;
            $d_num=3;
        }
        if($r==Cart::DISNATCE_NO_SUM_NO){
            $delivery_cost_min_sum=350;
            $delivery_cost=70;
            $r =  $this->distance_check($distance , 5000,9000, $this->getCost() ,$delivery_cost_min_sum,400);
            $d_num=2;
        }
        if($r==Cart::DISNATCE_NO_SUM_NO){
            $delivery_cost_min_sum=300;
            $delivery_cost=60;
            $r =  $this->distance_check($distance , 2000,5000, $this->getCost() ,$delivery_cost_min_sum,350);
            $d_num=1;
        }
        if($r==Cart::DISNATCE_NO_SUM_NO){
            $delivery_cost_min_sum=250;
            $delivery_cost=50;
            $r =  $this->distance_check($distance , 0,2000, $this->getCost() ,$delivery_cost_min_sum,300);
            $d_num=0;
        }


//            обработка результата проверки дистанции и сумыы

        if ($r==Cart::DISNATCE_OK_SUM_NO){
            $this->info_message = $this->info_message = sprintf($this->msg,$delivery_cost_min_sum);
            //"В етот рейон минимальная сумма заказа 250грн. + доставка";
        }

        if($distance>14000){ //
            $this->info_message = 'Слишком далеко пока.';
            $delivery_cost=0;
        }
        if (empty($distance)){
            $delivery_cost=0;
            if ($this->getCost()<250){
                $delivery_cost=50;
            }
        }elseif($distance<2000 && $this->getCost()>250){
            $delivery_cost=0;
        }
//        if ($r==2){
//            $delivery_cost=0;
//        }
        if ($r==Cart::DISNATCE_OK_SUM_OK_FREE_DELIVERY){
            $delivery_cost=0;
        }
        if ($r==Cart::DISNATCE_OK_SUM_OK_FREE_DELIVERY ||$r==Cart::DISNATCE_OK_SUM_OK  ){
            $this->confirm_order_delivery_distrance=true;
        }
        if ($this->getCost()<=0){
            $delivery_cost=0;
        }

      //$r =  $this->distance_check($distance , 0,2000, $this->getCost() ,250);

        yii::error(['cost' => $this->getCost(), 'dist' => $distance ,'res_check'=>$r,'$delivery_cost'=>$delivery_cost ,'$d_num'=>$d_num]);



        if (!$formated){
            return $delivery_cost;
        }
        return  $this->getCostFormatted(  $delivery_cost);
    }


    /**
     * @param $distance растояние
     * @param $distabce_from  мин растояние
     * @param $distabce_to  мак растояние
     * @param $sum  текущая сумма
     * @param $price_min   минимальная сумма
     * return 0,1,2,3     0- нету растояния и суммы 1 - растоняние ок но нету суммы 2 - растоняие ок и сумма ок 3-free delivery
     *
     */
    private function distance_check($distance , $distabce_from,$distabce_to, $sum ,$price_min,$free_suum){
        $res=Cart::DISNATCE_NO_SUM_NO;
        if ($distance>=$distabce_from && $distance < $distabce_to){
             $res=Cart::DISNATCE_OK_SUM_NO;
             if ($sum>=$price_min){ $res=Cart::DISNATCE_OK_SUM_OK;}
             if ($sum>=$free_suum){ $res=Cart::DISNATCE_OK_SUM_OK_FREE_DELIVERY;}
        }
        return $res;
    }



    public function update_distance($distance){
        $session = Yii::$app->session;
        $session->set('distance',$distance);

    }

    public function getCostFormatted($cost=null)
    {
        if (is_null($cost)){
            $price = number_format($this->getCost(), $this->priceFormat[0], $this->priceFormat[1], $this->priceFormat[2]);
        }else{
            $price = number_format($cost, $this->priceFormat[0], $this->priceFormat[1], $this->priceFormat[2]);
        }

        if ($this->currencyPosition == 'after') {
            return "<span>$price</span>{$this->currency}";
        } else {
            return "<span>{$this->currency}</span>$price";
        }
    }

    public function getElementsByModel(\dvizh\cart\interfaces\CartElement $model)
    {
        return $this->cart->getElementByModel($model);
    }

    public function getElementById($id)
    {
        return $this->cart->getElementById($id);
    }

    public function getCart()
    {
        return $this->cart;
    }

    public function truncate()
    {
        $this->trigger(self::EVENT_CART_TRUNCATE, new CartEvent(['cart' => $this->cart]));
        $truncate = $this->cart->truncate();
        $this->update();

        return $truncate;
    }

    public function deleteElement($element)
    {
        $eventBeforeDelete = new CartElementEvent([
            'element' => $element,
        ]);
        $this->trigger(self::EVENT_ELEMENT_BEFORE_DELETE, $eventBeforeDelete);

        if ($element->delete()) {

            // TODO DRY
            $this->update();
            $elementEvent = new CartEvent([
                'cart' => $this->getElements(),
                'cost' => $this->getCost(),
                'count' => $this->getCount(),
            ]);
            $this->trigger(self::EVENT_CART_UPDATE, $elementEvent);

            return true;
        } else {
            return false;
        }
    }

    private function update()
    {
        $this->cart = $this->cart->my();
        $this->cost = $this->cart->getCost();

        return true;
    }
}
