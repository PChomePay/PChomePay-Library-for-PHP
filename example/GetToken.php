<?php

use PCPayClient\Client\PPApiClient;
use PCPayClient\Storage\FileTokenStorage;

include __DIR__ . "/../vendor/autoload.php";

$userId ='APPID';
$password ='SECRET';

$client = new PPApiClient($userId, $password, new FileTokenStorage(__DIR__ . "/../token.json"), true);
$token = $client->getTokenObj();

echo "token: {$token->getToken()} \n";
echo "will expired in: " . date("Y/m/d H:i:s", $token->getExpireTimestamp()) . "\n";