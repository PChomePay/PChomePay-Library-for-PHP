<?php
/**
 * Author: Eric G. Huang
 * Date Time: 3/8/16 3:25 PM
 */

namespace PCPayClient\ValueObjects\Response;

/**
 * 取得 ATM 虛擬帳號 Response VO
 *
 * Class AtmVAccountPostRspVO
 * @package PCPayClient\ValueObjects\Response
 */
class AtmVAccountPostRspVO
{
    public $order_id;
    
    /**
     * ATM 虛擬帳號
     *
     * @var string
     */
    public $virtual_account;

    /**
     * 銀行代碼
     *
     * @var int
     */
    public $bank_id;

    /**
     * 失效日期
     *
     * @var string
     */
    public $expire_date;
}
