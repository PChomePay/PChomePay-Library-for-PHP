<?php

use PCPayClient\Client\PPApiClient;
use PCPayClient\Storage\FileTokenStorage;

include __DIR__ . "/../vendor/autoload.php";

$userId ='APPID';
$password ='SECRET';

$client = new PPApiClient($userId, $password, new FileTokenStorage(__DIR__ . "/../token.json"), true);
$r = $client->getBalance();

echo "all: {$r->all} \n";
echo "available: {$r->available} \n";
echo "processing: {$r->processing} \n";