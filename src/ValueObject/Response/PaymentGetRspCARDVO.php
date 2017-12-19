<?php
/**
 * Author: Eric G. Huang
 * Date Time: 3/8/16 3:52 PM
 */

namespace PCPayClient\ValueObjects\Response;

/**
 * 信用卡訂單查詢物件
 *
 * Class PaymentGetRspCARDVO
 * @package PCPayClient\ValueObjects\Response
 */
class PaymentGetRspCARDVO
{
    /**
     * 買家所選的分期期數
     *
     * @var int
     */
    public $installment;
}
