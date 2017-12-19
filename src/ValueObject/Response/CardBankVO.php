<?php
/**
 * Author: Eric G. Huang
 * Date Time: 3/8/16 3:41 PM
 */

namespace PCPayClient\ValueObjects\Response;

/**
 * 信用卡銀行物件
 *
 * Class CardBankVO
 * @package PCPayClient\ValueObjects\Response
 */
class CardBankVO
{
    /**
     * 銀行代碼
     *
     * @var string
     */
    public $bank_id;

    /**
     * 銀行名稱
     *
     * @var string
     */
    public $bank_name;

    /**
     * 可用分期期數，逗號分隔
     *
     * @var string
     */
    public $installment;
}
