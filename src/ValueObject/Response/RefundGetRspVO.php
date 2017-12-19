<?php
/**
 * Author: Eric G. Huang
 * Date Time: 3/7/16 10:36 AM
 */

namespace PCPayClient\ValueObjects\Response;

/**
 * 查詢退款 Request VO
 *
 * Class QueryRefundRspVO
 * @package PCPayClient\ValueObjects\Response
 */
class RefundGetRspVO
{
    /**
     * 合作平台退款編號
     *
     * @var string
     */
    public $refund_id;

    /**
     * 退款狀態
     *
     * 建立: INIT 處理中: WAIT 已退款: SUCC 失敗: FAIL
     *
     * @var string
     */
    public $status;

    /**
     * 退款金額
     *
     * @var int
     */
    public $amount;

    /**
     * 退還手續費
     *
     * @var int
     */
    public $fee;

    /**
     * 跨行轉帳手續費
     *
     * ATM 退款時如遇到跨行時會收取每筆 10 元 之跨行手續費
     *
     * @var int
     */
    public $transfer_fee;

    /**
     * 退款於支付連建立時間
     *
     * @var string
     */
    public $refund_date;

    /**
     * 賣家負擔退款跨行手續費
     * Y/N
     *
     * @var string
     */
    public $cover_transfee;
}
