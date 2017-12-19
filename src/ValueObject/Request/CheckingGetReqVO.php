<?php
/**
 * Author: Eric G. Huang
 * Date Time: 3/8/16 4:20 PM
 */

namespace PCPayClient\ValueObject\Request;

/**
 * 對帳查詢 Request VO
 *
 * 合作平台透過支付連 API 查詢 30 日內之訂單成立、退款成立明細帳務資料
 *
 * Class CheckingGetReqVO
 * @package PCPayCommon\ValueObjects\PrvtApi\Request
 */
class CheckingGetReqVO
{
    /**
     * 欲查詢對帳之日期 (YYYYMMDD)
     *
     * @var string
     */
    public $date;

    /**
     * 訂單成立: orders
     * 退款成立: refunds
     *
     * @var string
     */
    public $type;
}
