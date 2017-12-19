<?php
/**
 * Author: Eric G. Huang
 * Date Time: 3/7/16 11:20 AM
 */

namespace PCPayClient\ValueObjects\Response;

/**
 * 查詢餘額
 *
 * 查詢合作平台之各種餘額，包含總餘額、可提領餘額以及提領中餘額
 *
 * Class CheckingGetRspVO
 * @package PCPayClient\ValueObjects\Response
 */
class CheckingGetRspVO
{
    /**
     * 當日訂單成立之訂單陣列，資料格式同訂單查詢回應欄位
     *
     * @var array
     */
    public $orders;

    /**
     * 當日退款成立之退款資料陣列，資料格式同退款查詢回應欄位
     *
     * @var array
     */
    public $refunds;
}
