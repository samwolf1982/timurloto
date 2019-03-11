<?php

namespace common\models;

use common\models\DTO\WagerInfoStringResult;
use common\models\helpers\ConstantsHelper;
use Yii;
use yii\base\ErrorException;

/**
 * This is the model class for table "wager".
 *
 * @property int $id
 * @property int $user_id user id 
 * @property int $playlist_id playlist id  может и не быть плейслисты создвются в кабинете или в форме
 * @property string $total сумма общая
 * @property double $coef Коофициент общий  висчитивать из wagerelements - coef+coef+coef...
 * @property string $comment Коментарий пользователя
 * @property int $status (общее) Только что создана пустая -1 Статут 0 - закрыто, 1-открыто, 2-истекла 3-блокировано, 4-зайшла 5 не зайшла
 * @property string $created_at
 *
 * @property Wagerelements[] $wagerelements
 */
class Wager extends \yii\db\ActiveRecord
{



//(общее) Статут 0 - закрыто, 1-открыто, 2-истекла 3-блокировано, 4-зайшла 5 не зайшла
    const  STATUS_CREATE=-1;
    const  STATUS_NEW=0;
    const  STATUS_OPEN=1;
    const  STATUS_CLOSE=2;
    const  STATUS_C0NFIRM=3;
    const  STATUS_EXPIRED=4;
    const  STATUS_BLOCKED=5;
    const  STATUS_ENTERED=6;
    const  STATUS_NOT_ENTERD=7;
    const  STATUS_RETURN=8;    // NOT USE select STATUS_RETURN_BET
   // const  STATUS_PAID_FOR=9;  //  уже насчитано конечный статус // всем начитало пофиксить
    const  STATUS_RETURN_BET=10;  //  возврат
    const  STATUS_MANUAL_BET=11;  //  'Ручное подтверждение',


    public static function getStatusName($status){
        $arr=[self::STATUS_CREATE=>'Етап создания',
            self::STATUS_CLOSE=>'Закрыта',
            self::STATUS_NEW=>'Новая',
            self::STATUS_OPEN=>'Открыта',
            self::STATUS_C0NFIRM=>'Подтверждена',
            self::STATUS_EXPIRED=>'Прострочена',
            self::STATUS_BLOCKED=>'Заблокинована',
            self::STATUS_ENTERED=>'Прошла',
            self::STATUS_RETURN_BET=>'Возврат',
            self::STATUS_MANUAL_BET=>'Ручное подтверждение',
        ];
        return $arr[$status];
    }
    public static function getStatusNames(){
        $arr=[self::STATUS_CREATE=>'Етап создания',
            self::STATUS_CLOSE=>'Закрыта',
            self::STATUS_NEW=>'Новая',
            self::STATUS_OPEN=>'Открыта',
            self::STATUS_C0NFIRM=>'Подтверждена',
            self::STATUS_EXPIRED=>'Прострочена',
            self::STATUS_BLOCKED=>'Заблокинована',
            self::STATUS_ENTERED=>'Прошла',
            self::STATUS_NOT_ENTERD=>'Не прошла',
            self::STATUS_RETURN_BET=>'Возврат',
            self::STATUS_MANUAL_BET=>'Ручное подтверждение',
        ];
        return $arr;
    }

    public static function getStatusNamesIshod(){
        $arr=[
//            self::STATUS_NEW=>'Новая',
            self::STATUS_ENTERED=>'Прошла',
            self::STATUS_NOT_ENTERD=>'Не прошла',
            self::STATUS_RETURN_BET=>'Возврат',
            self::STATUS_MANUAL_BET=>'Ручное подтверждение',
        ];
        return $arr;
    }




    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wager';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'total', 'coef', 'status','select_coef','bid'], 'required'],
            [['user_id', 'playlist_id', 'status','is_private','bid'], 'integer'],
            [['total', 'coef','select_coef'], 'number'],
            [['comment'], 'string'],
            [['created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'user id ',
            'playlist_id' => 'playlist id  может и не быть плейслисты создвются в кабинете или в форме',
            'total' => 'сумма общая',
            'coef' => 'Коофициент общий  висчитивать из wagerelements - coef+coef+coef...',
            'select_coef' => 'Коофищиент выбраный из дропа',

            'comment' => 'Коментарий пользователя',
            'status' => '(общее) Только что создана пустая -1 Статут 0 - закрыто, 1-открыто, 2-истекла 3-блокировано, 4-зайшла 5 не зайшла',
            'created_at' => 'Created At',
            'is_private' => 'is_private 0 нет 1 да',

            'bid'=>'Значение из сonfirm  ид ставки НЕ события'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWagerelements()
    {
        return $this->hasMany(Wagerelements::className(), ['wager_id' => 'id']);
    }




    public function getTypeWager(){
        if(count($this->wagerelements)>1) return  'Экспресс';
        return  'Ординар';
    }
    public function getTotalAndPercent(){

      return   sprintf('%.2f р. - <span>%s %%</span>',$this->total,$this->select_coef);

    }

    public function geFormatedWin(){


        Yii::error([$this->id,$this->status]);
        if($this->status==Wager::STATUS_ENTERED )    return   sprintf(' %.2f р.', ($this->total*$this->coef));
        if($this->status==Wager::STATUS_RETURN_BET )    return   'Возврат';
        if($this->status==Wager::STATUS_NOT_ENTERD )    return   sprintf(' -%.2f р.', ($this->total));


        return   'Расчет';

    }

    public function getFormatedBetSum(){

        return   sprintf('%.2f р. <span>%s %%</span>','5000 ',152);
        return   sprintf('%.2f р. <span>%s %%</span>',$this->total,$this->select_coef);

    }





    public function checkCloseElements()
    {
        return true;
        $is_close=true;
            $status_new_arr=[self::STATUS_NEW,self::STATUS_OPEN,self::STATUS_CREATE]; // ,self::STATUS_CREATE ??
            foreach ($this->wagerelements as $item) {
                if(in_array($item->status,$status_new_arr)){ $is_close=false; break;}
            }
        return $is_close;
    }



    public function getFinalStatus()
    {

        if(count($this->wagerelements)==1){ //  для ординоров
            yii::error($this->wagerelements[0]->status);
            return $this->wagerelements[0]->status;
        }

        // для експресов все проверки линейные зависят друг от друга порядок важен
        $status=null;

        // цикл проверок
        // 1 на присутсвие  STATUS_NOT_ENTERD // если есть ставка не прошла полностю
        $gate=true;
        foreach ($this->wagerelements as $item) {
            if($item->status==self::STATUS_NOT_ENTERD){ $status = self::STATUS_NOT_ENTERD; $gate= false;  break; }
        }

        // цикл проверок
        // 2 на присутсвие  STATUS_ENTERED // если есть ставка прошла
        if($gate){
            $entere=true;
            foreach ($this->wagerelements as $item) {
                if($item->status !=self::STATUS_ENTERED){ $entere=false;  break; }
            }
            if($entere){  $status = self::STATUS_ENTERED; $gate= false; }
        }

        // цикл проверок
        // 3 на присутсвие  STATUS_RETURN_BET // все исходы возврат
        if($gate){
            $returno=true;
            foreach ($this->wagerelements as $item) {
                if($item->status !=self::STATUS_RETURN_BET){ $returno=false;  break; }
            }
            if($returno){  $status = self::STATUS_ENTERED; $gate= false; }
        }

        // цикл проверок
        // 4 на присутсвие  STATUS_RETURN_BET STATUS_ENTERED // все исходы  ставка прошла но может быть один возврать
        if($gate){
            $entere_returno=true;
            foreach ($this->wagerelements as $item) {
                if($item->status !=self::STATUS_RETURN_BET AND $item->status !=self::STATUS_ENTERED ) { $entere_returno=false;  break; }
            }
            if($entere_returno){  $status = self::STATUS_ENTERED; $gate= false; }
        }


        // цикл проверок
        //  на присутсвие  STATUS_MANUAL_BET // все исходы  ставка если хоть один манула тогда и ставка мануал
        if($gate){
            $manualo=false;
            foreach ($this->wagerelements as $item) {
                if($item->status ==self::STATUS_MANUAL_BET) { $manualo=true;  break; }
            }
            if($manualo){  $status = self::STATUS_MANUAL_BET; $gate= false; }
        }



        // возможно еще варианты

        if(is_null($status)){// ошыбка !
            $statusList=[];
            foreach ($this->wagerelements as $item) {
                $statusList[]=['id'=>$item->id,'status'=>$item->status];
            }
            Yii::error($statusList);
           // throw  new ErrorException('hzNULL  status ');

        }


        $statusList=[];
        foreach ($this->wagerelements as $item) {
            $statusList[]=['id'=>$item->id,'status'=>$item->status,'resStatus'=>$status,'wagerID'=>$this->id];
        }

        Yii::error($statusList);


        // check STATUS_ENTERED;
//         foreach ($this->wagerelements as $item) {
//            if($item->status != self::STATUS_ENTERED){
//                if($item->status==self::STATUS_NOT_ENTERD){ $status = self::STATUS_NOT_ENTERD;  break; }
////                if($item->status==self::STATUS_RETURN){ $status = self::STATUS_RETURN;  break; }
//                if($item->status==self::STATUS_MANUAL_BET){ $status = self::STATUS_MANUAL_BET;  break; }
//
//                if($item->status==self::STATUS_RETURN_BET){ $status = self::STATUS_MANUAL_BET;  break; }
//
//                //if($item->status==self::STATUS_PAID_FOR){ throw  new ErrorException('hz status '.$item->status)}
//                //10
//                 throw  new ErrorException('hz status '.$item->status);
//
//            }
//        }
        return $status;
    }



    public function checkCloseState()
    {
        $is_close=true;
        $status_close_arr=[self::STATUS_CLOSE, self::STATUS_C0NFIRM, self::STATUS_EXPIRED, self::STATUS_BLOCKED, self::STATUS_ENTERED,self::STATUS_NOT_ENTERD, self::STATUS_RETURN];
        if( !in_array( $this->status,$status_close_arr )){$is_close=false; }
        return $is_close;
    }

    public function changeStatus($status)
    {
        $status_close_arr=[self::STATUS_CLOSE, self::STATUS_C0NFIRM, self::STATUS_EXPIRED, self::STATUS_BLOCKED, self::STATUS_ENTERED,self::STATUS_NOT_ENTERD, self::STATUS_RETURN];
        if( !in_array( $this->status,$status_close_arr )) {
            foreach ($this->wagerelements as $item) {
                $item->status = $status;
                $item->update(false);
            }
        }
    }


    // возврат констант для фронта тип ставки  ConstantsHelper::BET_TYPE_...
    public function getFronttypebet()
    {
        $count =   $this->getWagerelements()->count();  // >1 тогда експресс




        if($this->is_private){ // приватная
            if($count>1){
                return ConstantsHelper::BET_TYPE_PRIVATE_EXPRESS;
            }else{
                return ConstantsHelper::BET_TYPE_PRIVATE_ORDINAR;
            }
        }else{
            if($count>1){
                return ConstantsHelper::BET_TYPE_FREE_EXPRESS;
            }else{
                return ConstantsHelper::BET_TYPE_FREE_ORDINAR;
            }

        }
        Yii::error('Wager some error getFronttypebet не попал в if');

    }

    public function getOpenedbet(){
        return $this->hasMany(Openedbet::className(), ['bet_id' => 'id']);
    }

    public function canShow()
    {

        if($this->user_id == Yii::$app->user->id) return true;
        return $this->isSubscriber($this->user_id,Yii::$app->user->id);

//        return false;
//         $this->user_id;
    }

    /**
     * @param $user_sub_id // пользователь на кого подписан (берем ид странички где находимся)
     * @param $current_user_id  // текуший пользователь
     * @return bool
     */
    public function isSubscriber($user_sub_id, $current_user_id){


        $user_owm = User::find()->where(['id'=>$user_sub_id])->one();
        $current_user = User::find()->where(['id'=>$current_user_id])->one();

        if($user_owm && $current_user ){
//         'user_own_id', 'user_sub_id'
            Yii::error(['qwert',$user_sub_id, $current_user_id]);
            //   $subscriber=Subscriber::find()->where(['user_sub_id'=>(integer)$user_sub_id,'user_own_id'=>$current_user_id])->one();
            $subscriber=Subscriber::find()->where(['user_sub_id'=>$current_user_id,'user_own_id'=>$user_sub_id])->one();

            if($subscriber){

                return true;
            }
        }
        return false;

    }



}
