<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 28.12.2018
 * Time: 21:55
 */
namespace console\models\DTO;

use yii\base\Model;

class DtoClearCollector extends Model
{
    private $data=[];

    public function addElement($el)
    {
        $this->data[]=$el;
    }



    public function getCount()
    {
       return count($this->data);
    }
    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function getDataString()
    {
       return implode(',',$this->data);
    }





}