<?php
/**
 * Author: Eric G. Huang
 * Date Time: 3/7/16 10:34 AM
 */

namespace PCPayClient\ValueObjects\Response;

/**
 * 建立退款 Request VO
 *
 * Class RefundPostRspVO
 * @package PCPayClient\ValueObjects\Response
 */
class RefundPostRspVO
{
    /**
     * 合作平台欲退款原訂單編號
     *
     * @var string
     */
    public $order_id;

    /**
     * 合作平台退款編號
     *
     * @var string
     */
    public $refund_id;

    /**
     * 退款方式
     *
     * @var string
     */
    public $pay_type;

    /**
     * 退款總金額
     *
     * @var int
     */
    public $trade_amount;

    /**
     * 退還手續費
     *
     * ```
     * 退款時會依照付款方式不同會產生手續費之退回
     * 如信用卡手續費會依照退款的比例退回
     * 假設有一筆 1000 元的訂單
     * 信用卡手續費為 20 元
     * 第一次退款的時後退 500 元，則會返回 10 元之手續費
     * ```
     *
     * @var int
     */
    public $fee;

    /**
     * 跨行轉帳手續費
     *
     * ATM 退款時如遇到跨行時會收取每筆 10 元之 跨行手續費
     *
     * @var int
     */
    public $transfer_fee;

    /**
     * 賣家負擔跨行手續費 Y/N
     *
     * ATM 退款時如遇到跨行時會收取每筆 10 元之 跨行手續費，如為 Y 時為賣家負擔
     *
     * @var string
     */
    public $cover_transfee;

    /**
     * deprecated
     * 導頁URL
     * 如果本欄位有值請將使用者導頁至該 URL
     * 當買家以ATM退款時，且串接廠商無法提供身份證字號或是統編時，本頁面會收集正確的資訊以進行退款。
     * @var string
     */
    public $redirect_url;

    /**
     * 狀態
     *
     * @var string
     */
    public $status;
}
