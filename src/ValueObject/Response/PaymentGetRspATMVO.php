<?php
/**
 * Author: Eric G. Huang
 * Date Time: 3/8/16 3:50 PM
 */

namespace PCPayClient\ValueObjects\Response;

/**
 * ATM 訂單查詢物件
 *
 * Class PaymentGetRspATMVO
 * @package PCPayClient\ValueObjects\Response
 */
class PaymentGetRspATMVO
{
    /**
     * ATM 虛擬帳號
     *
     * @var string
     */
    public $virtual_account;

    /**
     * 虛擬帳號所屬銀行代碼
     *
     * @var string
     */
    public $bank_code;

    /**
     * 虛擬帳號過期時間
     *
     * @var string
     */
    public $expire_date;
}
