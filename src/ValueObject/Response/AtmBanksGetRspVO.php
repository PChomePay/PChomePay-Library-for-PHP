<?php
/**
 * Author: Eric G. Huang
 * Date Time: 3/8/16 3:33 PM
 */

namespace PCPayClient\ValueObjects\Response;

/**
 * 查詢可用 ATM 虛擬帳號銀行 Response VO
 *
 * Class AtmBanksGetRspVO
 * @package PCPayClient\ValueObjects\Response
 */
class AtmBanksGetRspVO
{
    /**
     * 銀行物件陣型
     *
     * @var array[\PCPayClient\ValueObjects\Response\QueryAtmBankVO]
     */
    public $banks;
}
