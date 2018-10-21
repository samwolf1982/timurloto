<?php
namespace dvizh\cart\models;

use dvizh\cart\interfaces\Cart as CartInterface;
use yii;

class Cart extends \yii\db\ActiveRecord implements CartInterface
{
    private $element = null;
    
    public function init()
    {
        $this->element = yii::$container->get('cartElement');
    }
    
    public function my()
    {
        $query = new tools\CartQuery(get_called_class());
        return $query->my();
    }
    
    public function put(\dvizh\cart\interfaces\Element $elementModel)
    {
      //  $elementModel->hash = self::_generateHash($elementModel->model, $elementModel->price, $elementModel->getOptions());
        $elementModel->hash = self::_generateHash($elementModel->model, $elementModel->price);

//yii::error($elementModel->model);
//        $elementModel->parent_id= $this->element->event_id;
        $one=$this->my();
        $elementModel->link('cart', $one);



        if ($elementModel->validate() && $elementModel->save()) {
            return $elementModel;
        } else {
            throw new \Exception(current($elementModel->getFirstErrors()));
        }
    }
    
    public function getElements()
    {
        return $this->hasMany($this->element, ['cart_id' => 'id']);
    }
    
    public function getElement(\dvizh\cart\interfaces\CartElement $model, $options = [], $price = null)
    {
        $price = empty($price) ? $model->getCartPrice() : $price;
        yii::error([$model->getCartId()]);
        return $this->getElements()->where(['hash' => $this->_generateHash(get_class($model), $price), 'item_id' => $model->getCartId()])->one();
       // return $this->getElements()->where(['hash' => $this->_generateHash(get_class($model), $price, $options), 'item_id' => $model->getCartId()])->one();
    }


    public function getElementsByModel(\dvizh\cart\interfaces\CartElement $model)
    {
        return $this->getElements()->andWhere(['model' => get_class($model), 'item_id' => $model->getCartId()])->all();
    }
    
    public function getElementById($id)
    {
        return $this->getElements()->andWhere(['id' => $id])->one();
    }
    
    public function getCount()
    {
        return intval($this->getElements()->sum('count'));
    }
    
    public function getCost()
    {
        return $cost = $this->getElements()->sum('price*count');
    }

    public function getCoefficient()
    {
        return $this->current_coefficient;
    }
    public function getPlaylistid()
    {
        return $this->playlist_id;
    }
    
    public function truncate()
    {
        foreach($this->elements as $element) {
            $element->delete();
        }
        
        return $this;
    }

    public function rules()
    {
        return [
            [['created_time', 'user_id','current_coefficient','status'], 'required', 'on' => 'create'],
            [['tmp_user_id'], 'string'],
            [['updated_time', 'created_time','current_coefficient','playlist_id','status'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => yii::t('cart', 'ID'),
            'user_id' => yii::t('cart', 'User ID'),
            'tmp_user_id' => yii::t('cart', 'Tmp user ID'),
            'created_time' => yii::t('cart', 'Created Time'),
            'updated_time' => yii::t('cart', 'Updated Time'),
            'current_coefficient' => 'current coefficient',
            'playlist_id' => 'current playlist_id',
            'status' => 'status',
        ];
    }
    
    public static function tableName()
    {
        return '{{%cart}}';
    }
    
    public function beforeDelete()
    {
        foreach ($this->elements as $elem) {
            $elem->delete();
        }
        
        return true;
    }
    
    private static function _generateHash($modelName, $price, $options = [])
    {
        return md5($modelName.$price.serialize($options));
    }

    public function fromTmpToCurrentCart()
    {
        $session = yii::$app->session;
        $userIdSession = $session->get('tmp_user_id');
        if(yii::$app->user->id) {
            $cart_current =   Cart::find()->where(['user_id' => yii::$app->user->id])->one();
            $cart_tmp =   Cart::find()->where(['tmp_user_id' => $userIdSession])->one();
            if($cart_current && $cart_tmp){
                $cart_tmp->user_id=$cart_current->user_id;
                $cart_tmp->save(false);
                $cart_current->delete();
            }


        }

    }

}
