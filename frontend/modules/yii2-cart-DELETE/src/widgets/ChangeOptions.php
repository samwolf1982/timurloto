<?php
namespace dvizh\cart\widgets;

use yii\helpers\Url;
use yii\helpers\Html;
use yii;

class ChangeOptions extends \yii\base\Widget
{
    const TYPE_SELECT = 'select';
    const TYPE_RADIO = 'radio';

    public $model = NULL;
    public $type = NULL;
    public $cssClass = '';
    public $defaultValues = [];
    public $prompt = ''; //
    public $label = ''; //

    public function init()
    {
        if ($this->type == NULL) {
            $this->type = self::TYPE_SELECT;
        }
        parent::init();

        \dvizh\cart\assets\WidgetAsset::register($this->getView());

        return true;
    }

    public function run()
    {
        if ($this->model instanceof \dvizh\cart\interfaces\CartElement) {
            $optionsList = $this->model->getCartOptions();
//            $optionsList2 = $this->model->modifications;
        //   yii::error($optionsList);


//yii::error([get_class($this->model) , $optionsList2]);
            $changerCssClass = 'dvizh-option-values-before';
            $id = $this->model->getCartId();
 //          die('111111111111111111111');

        } else {

            $optionsList = $this->model->getModel()->getCartOptions();


            $this->defaultValues = $this->model->getOptions();
            $id = $this->model->getId();
            $changerCssClass = 'dvizh-option-values';
        }
        if (!empty($optionsList)) {
//            yii::error($optionsList);
         //   foreach ($this->model->modifications as $modification){
//                yii::error([$modification->id]);
                // найти модификию-опцию

           //      yii::error(['id'=>$modification->id,'sort'=>$modification->sort]);
            //}
            //yii::error($optionsList);
// unset($modification);

// presort option

            $i = 1;
            foreach ($optionsList as $optionId => $optionData) {
                if (!is_array($optionData)) {
                    $optionData = [];
                }
                
                $cssClass = "{$changerCssClass} dvizh-cart-option{$id} ";

                if (!empty($this->prompt)){
                    $optionsArray = ['' => $optionData['name']];
                }else{   $optionsArray = []; }


                if (isset($optionData['variants'])) {
                    foreach ($optionData['variants'] as $variantId => $value) {
                        $optionsArray[$variantId] = $value;
                    }
                }
                if ($this->type == 'select2') { // пока что все радио
                    $list = Html::tag('span',$this->label).  Html::dropDownList('cart_options' . $id . '-' . $i,
                        $this->_defaultValue($optionId),
                        $optionsArray,
                        ['data-href' => Url::toRoute(["/cart/element/update"]), 'data-filter-id' => $optionId, 'data-name' => Html::encode($optionData['name']), 'data-id' => $id, 'class' => "form-control $cssClass"]
                    );
                } else {
                  //  yii::error(['radio list',$optionId]);
                    $list = Html::tag('div', Html::tag('strong', $optionData['name']), ['class' => 'dvizh-option-heading']);

//                    $p=                   ['123' => 'aaa', '124' => 'bbb', '345' => 'ccc',];
//                    $list.= Html::radioList('roles', [123], $p);
                    $optionData_name= Html::encode($optionData['name']);
                    $list .= Html::radioList('cart_options' . $id . '-' . $i,
//                        $this->_defaultValue($optionId),
                    1,
                        $optionsArray,
                        ['itemOptions' => [   'data-href' => Url::toRoute(["/cart/element/update"]), 'data-filter-id' => $optionId, 'data-name' => Html::encode($optionData['name']), 'data-id' => $id, 'class' => $cssClass],
                            'item'=>function($index, $label, $name, $checked, $value)use($optionId,$id,$optionData_name){
                                $check = $checked ? ' checked="checked"' : '';
                                return "<label class='green'>
<input type=\"radio\" class=\"dvizh-option-values-before dvizh-cart-option4\" name=\"$name\" 
value=\"$value\" data-href=\"/cart/element/update\" data-filter-id=\"$optionId\" 
  data-name=\"$optionData_name\" data-id=\"$id\"   $check  > <span>$label</span> 
</label>";
                        return '<label><input type="radio" class="dvizh-option-values-before dvizh-cart-option4 " name="cart_options4-1" value="1" checked="" data-href="/cart/element/update" data-filter-id="3" data-name="порция:" data-id="4"> 100гр.</label> ' ; }

                        ]
                    );
                }
               // <label><input type="radio" class="dvizh-option-values-before dvizh-cart-option4 " name="cart_options4-1" value="1" checked="" data-href="/cart/element/update" data-filter-id="3" data-name="порция:" data-id="4"> 100гр.</label>

                $options[] = Html::tag('div', $list, ['class' => "dvizh-option"]);
                $i++;
            }
        } else {
            return null;
        }

        return Html::tag('div', implode('', $options), ['class' => 'dvizh-change-options ' . $this->cssClass]);
    }

    private function _defaultValue($option)
    {
        if (isset($this->defaultValues[$option])) {
            return $this->defaultValues[$option];
        }

        return false;
    }
}
