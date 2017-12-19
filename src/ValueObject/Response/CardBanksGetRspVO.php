<?php
/**
 * Author: Eric G. Huang
 * Date Time: 3/8/16 3:39 PM
 */

namespace PCPayClient\ValueObjects\Response;

/**
 * 查詢分期信用卡銀行 Request VO
 *
 * 查詢目前可使用信用卡分期的銀行資訊
 *
 * Class CardBanksGetRspVO
 * @package PCPayClient\ValueObjects\Response
 */
class CardBanksGetRspVO
{
    /**
     * @var array[\PCPayClient\ValueObjects\Response\CardBanksGetRspBankVO]
     */
    public $banks;
}