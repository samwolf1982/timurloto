<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 27.11.2018
 * Time: 9:53
 */

namespace common\models\overiden;

use dektrium\user\models\Profile;
use dektrium\user\models\RegistrationForm as BaseRegistrationForm;
use dektrium\user\models\User;

class RegistrationForm extends BaseRegistrationForm
{
    /**
     * Add a new field
     * @var string
     */
    public $fullname;
    public $user;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules[] = ['fullname', 'required'];
        $rules[] = ['fullname', 'string', 'max' => 255];
        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        $labels = parent::attributeLabels();
        $labels['fullname'] = "Имя";
        return $labels;
    }


    public function getNewusero()
    {
        return $this->user;
    }

    /**
     * @inheritdoc
     */
    public function loadAttributes(User $user)
    {
        $this->user=$user;
        // here is the magic happens
        $user->setAttributes([
            'email'    => $this->email,
            'username' => $this->username,
            'password' => $this->password,
        ]);
        /** @var Profile $profile */
//        $profile = \Yii::createObject(Profile::className());
//        $profile->setAttributes([
//            'fullname' => $this->fullname,
//        ]);
//        $user->setProfile($profile);
    }
}