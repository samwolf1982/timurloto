<?php
namespace dvizh\cart\controllers;

use dvizh\cart\models\Cart;
use dvizh\shop\models\Product;
use dvizh\order\models\Order;
use dvizh\order\models\ShippingType;
use yii\base\DynamicModel;
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

        // если гет убрать растояние из сесии
        if (Yii::$app->request->isGet) {
            $session = Yii::$app->session;
            $session->remove('distance');
        }

        $elements = yii::$app->cart->elements;

        $elementsExtendWithComplecs = [];

        foreach ($elements as $element) {
            //  yii::error($element);
            if ($element->model == 'common\\models\\Productext') {
                $tmpComplecs=[];
                $eli = json_decode($element->options);
                yii::error($eli);
                if (!empty($eli) && is_array($eli)) {
                       //   yii::error($eli);
                    $day = '';
                    foreach ($eli as $itemEli) {
                        $pId = $itemEli->id;
                        $pCount = $itemEli->count;

                        if (empty($day)) {
                            $day = $itemEli->day;
                        }

                        $compleksProd = Product::find()->where(['id' => $pId])->one();
                        $name = '';
                        $price = 0;
                        $priceText = '';
                        $show=true;// показывать в корзине если количество по умолчанию
                        $count = empty($pCount)  ? 1 : $pCount;
                        if ($compleksProd) {
                            $name = $compleksProd->name;
                            $price = $compleksProd->price;
                        }
                        if ($count==1){ $show=false; }
                           $priceText = sprintf("%sгрн /%dшт", $price, $count);

                        $tmpComplecs[]=['price'=>$price,'name'=>$name,'priceText'=>$priceText,'show'=>$show];

                    }



                    // запись дня
                    $day = $this->setDayComplecs($day);

                } else {
                    $day = 'cегодня';
                }


                $elementsExtendWithComplecs[] = ['element' => $element, 'is_compleks' => true, 'compleksProd'=>$tmpComplecs, 'day' => $day];
            } else {
                $elementsExtendWithComplecs[] = ['element' => $element, 'is_compleks' => false, 'compleksProd'=>'','priceText' => '', 'name' => '', 'day' => ''];
            }


        }


        $model_cart_surrender = new DynamicModel(['surrender']); //cдача
        $model_cart_surrender->addRule(['surrender'], 'string', ['max' => 128])->validate();


        //  yii::error([$pId,$pCount,$compleksProd,$name,$price,$count,$priceText]);
      //  yii::error($elementsExtendWithComplecs);
        // не переопределяется в конфиге
        return $this->render('@app/themes/theme2/cart/default/index.php', [
            'elements' => $elements, 'model_cart_surrender' => $model_cart_surrender, 'elementsExtendWithComplecs' => $elementsExtendWithComplecs
        ]);

        return $this->render('index', [
            'elements' => $elements
        ]);
    }

    private function setDayComplecs($day)
    {
        $res = 'сегодня';
        if (empty($day)) { return $res; }
        $dayName='';
        $day_list = [];
        $m_list = ['Января', 'Февраля', 'Марта', 'Апреля', 'Майя', 'Июня', 'Июля', 'Августа', 'Сентября', 'Октября', 'Ноября', 'Декабря'];
        $day_list_ru_name = ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье',];
        $day_list_en = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun',];
        $day_list_en_suf = ['m', 't', 'w', 'th', 'f', 'sa', 'su',];
        $day_list =
                [   'su1' => ['day' => 'Воскресенье','eday'=>'su','i'=>0],'m1' => ['day' => 'Понедельник','eday'=>'m','i'=>1], 't1' => ['day' => 'Вторник','eday'=>'t','i'=>2], 'w1' => ['day' => 'Среда','eday'=>'w','i'=>3], 'th1' => ['day' => 'Четверг','eday'=>'th','i'=>4], 'f1' => ['day' => 'Пятница','eday'=>'f','i'=>5], 'sa1' => ['day' => 'Суббота','eday'=>'sa','i'=>6],
                    'su2' => ['day' => 'Воскресенье','eday'=>'su','i'=>7], 'm2' => ['day' => 'Понедельник','eday'=>'m','i'=>8], 't2' => ['day' => 'Вторник','eday'=>'t','i'=>9], 'w2' => ['day' => 'Среда','eday'=>'w','i'=>10], 'th2' => ['day' => 'Четверг','eday'=>'th','i'=>11], 'f2' => ['day' => 'Пятница','eday'=>'f','i'=>12], 'sa2' => ['day' => 'Суббота','eday'=>'sa','i'=>13],];



        $curent_day_num = date('w');
      //  var_dump([$day,$day_list[$day]['i'],$curent_day_num]); die();
      // yii::error(['$curent_day_num'=>$curent_day_num,]);
        if($day_list[$day]['i']==$curent_day_num){
            $res = 'сегодня';
        }elseif ($day_list[$day]['i']>$curent_day_num){
            // // исключение для сегодня понедельник но выбрали воскресенье-второе su2 (пока что под присмотром)
            if ($day=='su2'&& $curent_day_num==1){
                $dayName=$day_list[$day]['day'];
                $countDayAdd=$day_list[$day]['i']+6;
                $sum=  strtotime(" +".$countDayAdd." days");
                $dateTo=date('d-m-Y',$sum);
                $res=sprintf('%s %s',$dayName,$dateTo);
            }else{
                $dayName=$day_list[$day]['day'];
                $countDayAdd=$day_list[$day]['i']-$curent_day_num;
                // strtotime(date() . " +".$countDayAdd." days");
                $sum=  strtotime(" +".$countDayAdd." days");
                $dateTo=date('d-m-Y',$sum);
                $res=sprintf('%s %s',$dayName,$dateTo);
            }

        }elseif ($day_list[$day]['i']<$curent_day_num){
            // исключение для сегодня понедельник но выбрали воскресенье (пока что под присмотром)
            if ($day=='su1'&& $curent_day_num==1){
                $dayName=$day_list[$day]['day'];
                $countDayAdd=$day_list[$day]['i']+6;
                $sum=  strtotime(" +".$countDayAdd." days");
                $dateTo=date('d-m-Y',$sum);
                $res=sprintf('%s %s',$dayName,$dateTo);
            }else{
                $res = 'день прошел';
            }

        }



        return$res;
        return ['res'=>$res,'dayName'=>$dayName,'countDayAdd'=>$countDayAdd,'dateTo'=>$dateTo];


//        echo date('d.m.Y', strtotime('Mon this week'));
        //echo date('d.m.Y', strtotime('Mon next week')) . '—' . date('d.m.Y', strtotime('Sun next week'));

        $gate_day = true;
        $week_day_suf = 1;
        $get_d = '';
        $pos = strripos($day, '2');
        if ($pos !== false) {
            $week_day_suf = 2;
        }
        $get_d = $day;


        $curent_day_num = date('w'); // 4
        if ($week_day_suf == 2) { //след неделя

            $tmp_day = strtotime($day_list[$day]['eday'] . ' next week');
        } else { // текущая неделя
            $tmp_day = strtotime($day_list[$day]['eday'] . ' this week');
        }
        $num_day = date('j', $tmp_day);
        $num_m = date('n', $tmp_day);
        $num_day_this = date('w', $tmp_day);





        foreach ($day_list_en as $i => $item) {

            $tmp = [];
            $tmp['name'] = $day_list_ru_name[$i];

            if ($week_day_suf == 2) {
                $tmp_day = strtotime($item . ' next week');
            } else {
                $tmp_day = strtotime($item . ' this week');
            }


            // date('d.m.Y', strtotime('Mon this week'));

            $num_day = date('j', $tmp_day);
            $num_m = date('n', $tmp_day);

            $num_day_this = date('w', $tmp_day);

            return $num_day_this;
            $class = '';
            if (empty($get_d)) {
                if ($curent_day_num == $num_day_this) {
                    $class = 'active';
                    $gate_day = false;
                } elseif ($curent_day_num < $num_day_this) {
                    if ($gate_day) {
                        $class = 'disabled';
                    }
                }
            } else {
                if ($get_d == $day_list_en_suf[$i] . $week_day_suf) {
                    $class = 'active';
                }
            }


        }
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


    public function actionInfomap() {
        // update distance
        if ($cartModel = yii::$app->cart) {
            $cartModel->update_distance($_POST['distance']);
        }
        return $this->_cartJsonmap();
    }


    private function _cartJsonmap($json=[])
    {
        if ($cartModel = yii::$app->cart) {
            $json['elementsHTML'] = \dvizh\cart\widgets\ElementsList::widget();
            $json['count'] = $cartModel->getCount();
            $json['clear_price'] = $cartModel->getCost(false);
            $json['price'] = $cartModel->getCostFormatted();
            $json['delivery_price'] =$cartModel->getCostDelivery();
            $json['total_price_ext'] =$cartModel->getCostFormatted();
            $json['total_price'] =$cartModel->getCostTotal();
//            yii::error($cartModel->info_message);
            yii::error( [get_class($cartModel),'deliv'=>$cartModel->getCostDelivery()]);// $cartModel->info_message);
            $json['info_message'] =$cartModel->info_message;
            $json['confirm_order_delivery_distrance'] =$cartModel->confirm_order_delivery_distrance;

        } else {
            $json['count'] = 0;
            $json['price'] = 0;
            $json['clear_price'] = 0;
            $json['delivery_price'] =0;
            $json['total_price_ext'] =0;
            $json['total_price'] =0;
            $json['info_message']='';
            $json['confirm_order_delivery_distrance'] =$cartModel->confirm_order_delivery_distrance;
        }
        return Json::encode($json);
    }
    private function _cartJson($json=[])
    {
        if ($cartModel = yii::$app->cart) {
            $json['elementsHTML'] = \dvizh\cart\widgets\ElementsList::widget();
            $json['count'] = $cartModel->getCount();
            $json['clear_price'] = $cartModel->getCost(false);
            $json['price'] = $cartModel->getCostFormatted();
            $json['delivery_price'] =$cartModel->getCostDelivery();
            $json['total_price_ext'] =$cartModel->getCostFormatted();
            $json['total_price'] =$cartModel->getCostTotal();
            yii::error( $cartModel->info_message);
            $json['info_message'] =$cartModel->info_message;

        } else {
            $json['count'] = 0;
            $json['price'] = 0;
            $json['clear_price'] = 0;
            $json['delivery_price'] =0;
            $json['total_price_ext'] =0;
            $json['total_price'] =0;
            $json['info_message']='';
        }
        return Json::encode($json);
    }
    public function beforeAction($action)
    {
        if ($action->id == 'infomap') {
            $this->enableCsrfValidation = false;
        }

        return parent::beforeAction($action);
    }


}
