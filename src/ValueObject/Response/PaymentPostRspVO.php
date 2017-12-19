<?php
/**
 * Author: Eric G. Huang
 * Date Time: 3/7/16 10:22 AM
 */

namespace PCPayClient\ValueObjects\Response;


class PaymentPostRspVO
{
    /**
     * 合作平台訂單編號
     *
     * @var string
     */
    public $order_id;

    /**
     * 回傳一組 URL 以供合作平台將消費者導頁至 支付連相應付款頁面。
     *
     * @var string
     */
    public $payment_url;
}