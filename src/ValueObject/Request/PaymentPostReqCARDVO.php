<?php
/**
 * Author: Eric G. Huang
 * Date Time: 3/7/16 2:37 PM
 */

namespace PCPayClient\ValueObject\Request;


class PaymentPostReqCARDVO
{
    /**
     * 合作平台允許可分期
     *
     * @var int
     */
    public $installment;

    /**
     * 向買家收取之分期信用卡手續費
     *
     * @var float
     */
    public $rate;

    /**
     * PaymentPostReqCARDVO constructor.
     * @param $installment int
     * @param $rate float
     */
    public function __construct($installment, $rate)
    {
        $this->installment = $installment;
        $this->rate = $rate;
    }
}
