<?php

namespace common\models;

use common\models\services\UserInfo;
use Yii;
use common\models;
use common\models\overiden\User;

/**
 * This is the model class for table "lastweekwinners".
 *
 * @property int $id
 * @property int $uid id пользователя
 * @property int $sort сортировка
 * @property int $status статус
 */
class Lastweekwinners extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lastweekwinners';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'sort', 'status'], 'required'],
            [['uid', 'sort', 'status'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => 'Uid',
            'sort' => 'Sort',
            'status' => 'Status',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'uid']);
    }


    /**
     *
     * возврать периода недели относительно текущей недели  2.05-9.05
     * @param $num
     */
    public function getPeriod($num)
    {

        $num++;
        //2.05-9.05
        $lastWeekStartTime = strtotime("last sunday",strtotime("-{$num} week"));
        $lastWeekEndTime = strtotime("this sunday",strtotime("-{$num} week"));
        $lastWeekStart = date("m-d",$lastWeekStartTime);
        $lastWeekEnd = date("m-d",$lastWeekEndTime);
        return  $lastWeekStart.' '.$lastWeekEnd;

//        return $this->hasOne(User::className(), ['id' => 'uid']);
    }


    public function getUserinfo()
    {
        $userInfo = new UserInfo($this->uid);

        return $userInfo;
    }


}
