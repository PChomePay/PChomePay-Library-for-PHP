<?php
/**
 * Author: Eric G. Huang
 * Date Time: 3/8/16 3:36 PM
 */

namespace PCPayCommon\ValueObjects\PrvtApi\Response;

/**
 * 銀行物件
 *
 * Class AtmBankVO
 * @package PCPayCommon\ValueObjects\PrvtApi\Response
 */
class AtmBanksGetRspBankVO
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
}
