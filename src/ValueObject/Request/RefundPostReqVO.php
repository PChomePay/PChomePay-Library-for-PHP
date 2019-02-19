<?php
/**
 * Author: Eric G. Huang
 * Date Time: 3/8/16 3:57 PM
 */

namespace PCPayClient\ValueObject\Request;

/**
 * 建立退款 Request VO
 *
 * 合作平台請求支付連 API 做退款動作,同一筆訂單可做多次退款,每筆退款+每筆退款 手續費不得超過訂單金額。
 *
 * Class RefundPostReqVO
 * @package PCPayCommon\ValueObjects\PrvtApi\Request
 */
class RefundPostReqVO
{
    /**
     * 合作平台欲退款原訂單編號
     *
     * @var string
     */
    public $order_id;

    /**
     * 合作平台退款編號
     *
     * @var string
     */
    public $refund_id;

    /**
     * 退款金額,需小於等於訂單 TradeAmount
     *
     * @var int
     */
    public $trade_amount;
}
