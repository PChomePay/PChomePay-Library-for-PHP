<?php

use PCPayClient\Client\PPApiClient;
use PCPayClient\Storage\FileTokenStorage;
use PCPayClient\ValueObject\Request\PaymentGetReqVO;

include __DIR__ . "/../vendor/autoload.php";

$userId = 'APPID';
$pass = 'SECRET';

$getPaymentVo = new PaymentGetReqVO();
$getPaymentVo->order_id = '123456789';

$client = new PPApiClient($userId, $pass, new FileTokenStorage(__DIR__ . "/../token.json"), true, true);

$r = $client->getPayment($getPaymentVo);

$r->items = json_encode($r->items);
$r->payment_info = json_encode($r->payment_info);

echo "order_id: {$r->order_id} \n";
echo "amount: {$r->amount}";
echo "pay_type: {$r->pay_type} \n";
echo "trade_amount: {$r->trade_amount} \n";
echo "pp_fee: {$r->pp_fee} \n";
echo "create_date: {$r->create_date} \n";
echo "pay_date: {$r->pay_date} \n";
echo "actual_pay_date: {$r->actual_pay_date} \n";
echo "fail_date: {$r->fail_date} \n";
echo "status: {$r->status} \n";
echo "status_code: {$r->status_code} \n";
echo "items: {$r->items} \n";
echo "payment_info: {$r->payment_info} \n";
echo "available_date: {$r->available_date} \n";
