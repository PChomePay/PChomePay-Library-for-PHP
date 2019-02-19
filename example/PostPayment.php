<?php

use PCPayClient\Client\PPApiClient;
use PCPayClient\Storage\FileTokenStorage;
use PCPayClient\ValueObject\Request\PaymentPostReqVO;

include __DIR__ . "/../vendor/autoload.php";

$userId = 'APPID';
$pass = 'SECRET';

$paymentVo = new PaymentPostReqVO();
$paymentVo->order_id = '123456789';
$paymentVo->pay_type = ['CARD', 'ATM', 'EACH', 'ACCT'];
$paymentVo->amount = 30;
$paymentVo->items = [
    ["name" => "測試用物品1", "url" => "https://www.pchomepay.com.tw"],
    ["name" => "測試用物品2", "url" => "https://www.pchomepay.com.tw"]
];
$paymentVo->return_url = 'https://www.google.com.tw';
$paymentVo->fail_return_url = 'https://www.pchomepay.com.tw';
$paymentVo->notify_url = 'https://www.pchomepay.com.tw';
$paymentVo->return_timer = 'Y';
$paymentVo->atm_info = ['expire_days' => 3];
$paymentVo->card_info = [
    ["installment" => 3],
    ["installment" => 6],
    ["installment" => 12]
];

$client = new PPApiClient($userId, $pass, new FileTokenStorage(__DIR__ . "/../token.json"), true, true);

$r = $client->postPayment($paymentVo);

echo "order_id: {$r->order_id} \n";
echo "payment_url: {$r->payment_url} \n";
