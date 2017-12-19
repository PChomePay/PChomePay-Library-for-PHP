<?php
/**
 * Author: Eric G. Huang
 * Date Time: 3/7/16 2:34 PM
 */

namespace PCPayClient\ValueObject\Request;


class PaymentPostReqATMVO
{
    /**
     * PaymentPostReqATMVO constructor.
     * @param $expire_days atm expire days
     */
    public function __construct($expire_days)
    {
        $this->expire_days = $expire_days;
    }

    /**
     * 消費者產生虛擬帳號後可至 ATM 付款貸期限，期限需小於 5 天
     *
     * @var int
     */
    public $expire_days;
}
