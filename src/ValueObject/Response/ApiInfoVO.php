<?php
/**
 * Created by PhpStorm.
 * User: river
 * Date: 2016/4/8
 * Time: 17:48
 */

namespace PCPayClient\ValueObjects\Response;


class ApiInfoVO
{
    public $appid;
    public $secret;
    public $memid;
    public $platform;
    public $status;
    /**
     * @var AppConfigVO
     */
    public $config;
    public $createdttm;
    public $modifydttm;
}