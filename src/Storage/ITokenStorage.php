<?php
/**
 * Created by PhpStorm.
 * User: river
 * Date: 2016/4/20
 * Time: 19:43
 */

namespace PCPayClient\Storage;


interface ITokenStorage
{
    /**
     * get jsonlized token from storage
     * @return string
     */
    public function getTokenStr();

    /**
     * save jsonlized token to storage
     * @param $token string
     * @return boolean true while success, false when fail.
     */
    public function saveTokenStr($token);
}