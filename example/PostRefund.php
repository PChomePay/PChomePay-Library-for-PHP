<?php

use PCPayClient\Client\PPApiClient;
use PCPayClient\Storage\FileTokenStorage;
use PCPayClient\ValueObject\Request\RefundPostReqVO;

include __DIR__ . "/../vendor/autoload.php";

$userId = 'APPID';
$pass = 'SECRET';

$refundVo = new RefundPostReqVO();
$refundVo->order_id = '123456789';
$refundVo->refund_id = 'R123456789';
$refundVo->trade_amount = 30;

$client = new PPApiClient($userId, $pass, new FileTokenStorage(__DIR__ . "/../token.json"), true, true);

$r = $client->postRefund($refundVo);

echo "order_id: {$r->order_id} \n";
echo "refund_id: {$r->refund_id} \n";
echo "pay_type: {$r->pay_type} \n";
echo "trade_amount: {$r->trade_amount} \n";
echo "fee: {$r->fee} \n";
echo "transfer_fee: {$r->transfer_fee} \n";
echo "cover_transfee: {$r->cover_transfee} \n";
echo "redirect_url: {$r->redirect_url} \n";
echo "status: {$r->status} \n";
