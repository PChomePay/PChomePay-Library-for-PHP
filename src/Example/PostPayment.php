<?php
/**
 * Created by PhpStorm.
 * User: river
 * Date: 2016/4/21
 * Time: 11:06
 */

use PCPayClient\Client\PPApiClient;
use PCPayClient\Storage\NullTokenStorage;

include "../../vendor/autoload.php";

date_default_timezone_set("Asia/Taipei");

$srv = new PPApiClient("app02", "secret", new NullTokenStorage());
