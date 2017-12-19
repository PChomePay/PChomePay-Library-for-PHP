<?php
/**
 * Created by PhpStorm.
 * User: river
 * Date: 2016/4/21
 * Time: 10:44
 */

include "../../vendor/autoload.php";

use PCPayClient\Client\PPApiClient;
use PCPayClient\Storage\FileTokenStorage;
use PCPayClient\Storage\FileTokenStorageAES;

date_default_timezone_set("Asia/Taipei");

//$key = "605db901e1032eeb1a0434e5cac49b10f5e9ea31d39f00f5060be7e05b2c0821";
//$srv = new PPApiClient("app02", "secret", new FileTokenStorageAES(__DIR__."/../../token.json", $key));
$srv = new PPApiClient("app02", "secret", new FileTokenStorage(__DIR__."/../../token.json"));
$token = $srv->getTokenObj();

echo "token: {$token->getToken()} \n";
echo "will expired in: ".date("Y/m/d H:i:s", $token->getExpireTimestamp());