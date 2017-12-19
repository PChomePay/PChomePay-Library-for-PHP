<?php
/**
 * Author: Eric G. Huang
 * Date Time: 3/8/16 3:43 PM
 */

namespace PCPayClient\ValueObject\Request;

/**
 * 查詢合作平台於支付連系統建立之訂單狀態,不同交易類型訂單將有額外不同訂單訊息 Request VO
 *
 * Class PaymentGetReqVO
 * @package PCPayCommon\ValueObjects\PrvtApi\Request
 */
class PaymentGetReqVO
{
    /**
     * 合作平台訂單編號
     *
     * @var string
     */
    public $order_id;
}
