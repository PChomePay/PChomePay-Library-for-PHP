<?php
/**
 * Author: Eric G. Huang
 * Date Time: 3/7/16 11:18 AM
 */

namespace PCPayClient\ValueObjects\Response;

/**
 * 提領 Response VO
 *
 * Class CreateWithdrawRspVO
 * @package PCPayClient\ValueObjects\Response
 */
class WithdrawPostRspVO
{
    /**
     * 提領金額
     * @var Int
     */
    public $withdraw_amount;
    /**
     * 跨行提領手續費
     * 該次提領所需負擔的跨行提領手續費
     * @var Int
     */
    public $transfer_fee;
    /**
     * 銀行代碼
     * @var String
     */
    public $bank_id;
    /**
     * 銀行帳號
     * @var String
     */
    public $bank_account;
}
