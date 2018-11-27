<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 24.11.2018
 * Time: 22:24
 */
namespace common\models\DTO\usersetting;

class UserDataSetting
{

    /** @var string */
    private $email;

    /** @var string */
    private $username;

    /**
     * UserDataSetting constructor.
     * @param string $email
     * @param string $username
     */
    public function __construct( $username,$email)
    {
        $this->email = $email;
        $this->username = $username;
    }


    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

}