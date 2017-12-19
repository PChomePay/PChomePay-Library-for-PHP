<?php
/**
 * Author: Eric G. Huang
 * Date Time: 3/7/16 10:27 AM
 */

namespace PCPayClient\ValueObjects\Response;

/**
 * 查詢合作平台於支付連系統建立之訂單狀態,不同交易類型訂單將有額外不同訂單訊息 Response VO
 *
 * Class QueryPaymentRspVO
 * @package PCPayClient\ValueObjects\Response
 */
class PaymentGetRspVO
{
    /**
     * 合作平台訂單編號
     *
     * @var string
     */
    public $order_id;

    /**
     * 訂單金額，API 所帶入之金額
     *
     * @var int
     */
    public $amount;

    /**
     * 付款方式
     * @var string
     */
    public $pay_type;

    /**
     * 買家所支付的金額
     *
     * @var int
     */
    public $total_amount;

    /**
     * 平台可以得到的金額
     *
     * platform_amount = total_amount - pp_fee
     *
     * @var int
     */
    public $platform_amount;

    /**
     * 支付連手續費，交易時所收取之服務費
     *
     * @var int
     */
    public $pp_fee;

    /**
     * 支付連訂單建立時間
     *
     * @var string
     */
    public $create_date;

    /**
     * 支付連訂單交易完成時間
     *
     * @var string
     */
    public $pay_date;

    /**
     * 訂單失敗時間
     *
     * * 不會與 pay_date 同時存在。
     * * 當訂單取消、過期、自行審單逾期或其他的因 素造成訂單失敗時的時間訂單
     *
     * @var string
     */
    public $fail_date;

    /**
     * 訂單狀態
     *
     * * 交易完成：S
     * * 交易失敗：F
     * * 交易等待中：W (自行審單中、支付連審單中、ATM等待繳款中)
     *
     * @var string
     */
    public $status;

    /**
     * 各類交易類別訂單相應物件
     *
     * @var Object
     */
    public $payment_info;

    /**
     * 轉可提領日
     * @var string
     */
    public $available_date;
}
