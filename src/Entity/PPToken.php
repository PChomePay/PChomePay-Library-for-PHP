<?php
/**
 * Created by PhpStorm.
 * User: river
 * Date: 2016/4/20
 * Time: 19:45
 */

namespace PCPayClient\Entity;

class PPToken
{

    public $tokenObj;

    public function __construct($tokenStr)
    {
        $this->tokenObj = json_decode($tokenStr);
        $err = json_last_error();
        if ($err !== JSON_ERROR_NONE) {
            throw new PPTokenException ("PPToken json_decode fail:" . $tokenStr);
        }

        if (!property_exists($this->tokenObj, "token")) {
            throw new PPTokenException ("PPToken properties error:" . $tokenStr);
        }

        if (!property_exists($this->tokenObj, "expired_in")) {
            throw new PPTokenException ("PPToken properties error:" . $tokenStr);
        }

        if (!property_exists($this->tokenObj, "expired_timestamp")) {
            throw new PPTokenException ("PPToken properties error:" . $tokenStr);
        }

    }

    public function getToken()
    {
        return $this->tokenObj->token;
    }

    public function willExpiredIn($seconds)
    {
        return (time() + $seconds) > $this->tokenObj->expired_timestamp;
    }

    public function getJson()
    {
        return json_encode($this->tokenObj);
    }

    public function getExpireTimestamp()
    {
        return $this->tokenObj->expired_timestamp;
    }
}

class PPTokenException extends \Exception
{

}