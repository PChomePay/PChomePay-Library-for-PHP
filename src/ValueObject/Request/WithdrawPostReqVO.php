<?php
/**
 * Author: Eric G. Huang
 * Date Time: 3/8/16 4:18 PM
 */

namespace PCPayClient\ValueObject\Request;

/**
 * 提領 Request VO
 *
 * 合作平台透過支付連 API 將可提領之餘額提領至合作平台在支付連系統設定之銀行帳戶
 *
 * Class WithdrawPostReqVO
 * @package PCPayCommon\ValueObjects\PrvtApi\Request
 */
class WithdrawPostReqVO
{
    /**
     * 合作平台欲提領之金額
     *
     * @var int
     */
    public $amount;
}


