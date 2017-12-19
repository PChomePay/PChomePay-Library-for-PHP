<?php
/**
 * Created by PhpStorm.
 * User: river
 * Date: 2016/4/21
 * Time: 10:22
 */

namespace PCPayClient\Storage;


class NullTokenStorage implements ITokenStorage
{
    private $token = false;
    /**
     * get jsonlized token from storage
     * @return string return jsonlized string
     */
    public function getTokenStr()
    {
        return $this->token;
    }

    /**
     * save jsonlized token to storage
     * @param $token string
     * @return boolean true while success, false when fail.
     */
    public function saveTokenStr($token)
    {
        $this->token = $token;
        return true;
    }
}