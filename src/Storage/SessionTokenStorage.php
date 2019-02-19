<?php
/**
 * Created by PhpStorm.
 * User: Jerry
 * Date: 2019/2/18
 * Time: 10:34 AM
 */

namespace PCPayClient\Storage;


class SessionTokenStorage implements ITokenStorage
{
    public function __construct()
    {
        session_start();
    }

    /**
     * get jsonlized token from session
     * @return string return jsonlized string
     */
    public function getTokenStr()
    {
        return $_SESSION['token'] ?: null;
    }

    /**
     * save jsonlized token to session
     * @param $token string
     * @return boolean true while success, false when fail.
     */
    public function saveTokenStr($token)
    {
        $_SESSION['token'] = $token;

        return true;
    }
}