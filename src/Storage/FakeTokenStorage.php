<?php
/**
 * Created by PhpStorm.
 * User: river
 * Date: 2016/4/21
 * Time: 17:18
 */

namespace PCPayClient\Storage;


class FakeTokenStorage implements ITokenStorage
{
    private $fakeToken;

    /**
     * FakeTokenStorage constructor.
     * @param string $string
     */
    public function __construct($string)
    {
        $this->fakeToken = $string;
    }

    /**
     * get jsonlized token from storage
     * @return string
     */
    public function getTokenStr()
    {
        return $this->fakeToken;
    }

    /**
     * save jsonlized token to storage
     * @param $token string
     * @return boolean true while success, false when fail.
     */
    public function saveTokenStr($token)
    {
        $this->fakeToken = $token;
    }
}