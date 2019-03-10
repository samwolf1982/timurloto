<?php

namespace common\models;

use common\models\helpers\HtmlGenerator;
use DateTime;
use Yii;

/**
 * This is the model class for table "subscriber".
 *
 * @property int $id
 * @property int $user_own_id ид пользователя
 * @property int $user_sub_id ид подписчика
 * @property string $expired_at время окончания
 * @property int $status статус блокирован активен прострочено время ...
 * @property string $created_at создан
 */
class Subscriber extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subscriber';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_own_id', 'user_sub_id', 'status'], 'integer'],
            [['text'], 'string'],
            [['expired_at', 'created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_own_id' => 'ид пользователя',
            'user_sub_id' => 'ид подписчика',
            'expired_at' => 'время окончания',
            'status' => 'статус блокирован активен прострочено время ...',
            'text' => "Кометарий пользователя",
            'created_at' => 'создан',
        ];
    }

    public function isSubscriber(){

    }

    public function getUserown()
    {
        return $this->hasOne(User::className(), ['id' => 'user_own_id']);
    }
    public function getUsersub()
    {
        return $this->hasOne(User::className(), ['id' => 'user_sub_id']);
    }

    public function getFormatedExpired()
    {


        $dt_end = new DateTime($this->expired_at);
        $remain = $dt_end->diff(new DateTime());
        if($dt_end > new DateTime()){
            $remain = $dt_end->diff(new DateTime());
//             Бывает “1 отзыв”, “2 отзыва” и “12 отзывов”.
            if(!empty($remain->d)){
                $textPadez=  HtmlGenerator::NumberEnd($remain->d,['день','дня','дней']);
                return sprintf('%d %s осталось',$remain->d,$textPadez);
            }elseif(!empty($remain->h)){
                $textPadez=  HtmlGenerator::NumberEnd($remain->h,['час','часа','часов']);
                return sprintf('%d %s осталось',$remain->h,$textPadez);
            }elseif (!empty($remain->i)){
                $textPadez=  HtmlGenerator::NumberEnd($remain->i,['минута','минуты','минут']);
                return sprintf('%d %s осталось',$remain->i,$textPadez);
            }
        }


        return  'Время доступа закончилось'.$remain->m;

    }



    public function checkExpiredTime()
    {
        $dt_end = new DateTime($this->expired_at);
        if($dt_end > new DateTime()){
            return false;
        }
        return  true;
        //  echo $a.' отзыв'.NumberEnd($a, array('','а','ов'));
        //$remain->d . ' days and ' . $remain->h . ' hours';
    }





}


