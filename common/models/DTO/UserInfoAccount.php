<?php

namespace common\models\DTO;

use common\models\helpers\ConstantsHelper;

class UserInfoAccount
{
    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @return mixed
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @return mixed
     */
    public function getInfoText()
    {
        return $this->info_text;
    }

    /**
     * @return mixed
     */
    public function getSocialLinks()
    {
        return $this->social_links;
    }

    private $user_id;
    private $name;
    private $balance;
    private $level;
    private $photo;
    private $info_text;
    private $social_links;

    /**
     * UserInfoAccount constructor.
     * @param $user_id
     * @param $name
     * @param $balance
     * @param $level
     * @param $photo
     * @param $info_text
     * @param $social_links
     */
    public function __construct($user_id, $name, $balance, $level, $photo, $info_text, $social_links)
    {
        $this->user_id = $user_id;
        $this->name = $name;

        $this->balance =    $balance;
        $this->level = $level;
        $this->photo = $photo;
        $this->info_text = $info_text;
        $this->social_links = $social_links;
    }


}
