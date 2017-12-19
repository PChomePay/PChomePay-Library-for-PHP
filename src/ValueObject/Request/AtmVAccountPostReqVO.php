<?php
/**
 * Author: Eric G. Huang
 * Date Time: 3/8/16 3:17 PM
 */

namespace PCPayClient\ValueObject\Request;

/**
 * 取得 ATM 虛擬帳號 Request VO
 *
 * Class AtmVAccountPostReqVO
 * @package PCPayCommon\ValueObjects\PrvtApi\Request
 */
class AtmVAccountPostReqVO extends IPaymentReqVO
{
    /**
     * 合作平台訂單編號，此欄位為唯一值
     *
     * 特店所建立之訂單編號不得重複
     *
     * @var string
     */
    public $order_id;

    /**
     * 訂單金額
     *
     * @var int
     */
    public $amount;

    /**
     * 合作平台訂單時間
     *
     * @var string
     */
    public $order_date;

    /**
     * 合作平台會員編號
     *
     * ```
     * 本欄位為選填，當平台為 B2B2C 的模式時，平台可以將訂單直接指定給平台下的用戶。
     * 但該平台用戶需要先與支付連的帳號做綁定。當平台用戶 ID 未綁定時系統會回應錯誤訊息
     * ```
     *
     * @var string
     */
    public $plat_userid;

    /**
     * 平台預扣金額
     *
     * ```
     * 本欄位為選填，當本欄位有值時，plat_userid 也不可為空。
     * 當有指定 plat_userid 時，平台可用此欄位將部分訂單金額撥給平台
     * ```
     *
     * @var int
     */
    public $plat_deduct_amt;

    /**
     * 商品名稱，會出現在畫面上供買家確認
     *
     * @var string
     */
    public $item_name;

    /**
     * 商品連結
     *
     * @var string
     */
    public $item_url;

    /**
     * 消費者產生虛擬帳號後可至 ATM 付款之期 限,期限需小於 5 天
     *
     * @var int
     */
    public $expire_days;

    /**
     * 要產生那家銀行的虛擬帳號,可用查詢虛擬帳 號銀行 API 取得可用之行銀代碼
     *
     * @var string
     */
    public $atm_bank;

    /**
     * 合作平台買家會員帳號
     * 若有選填此欄位，可提供支付連記錄會員付款時之相關功能。使用此欄位時，請務必注意此帳號不可共用，不同買家需傳送不同帳號。
     * @var string
     */
    public $buyer_id;

    /**
     * 買家email
     * 若有選填此欄位，付款時支付連也會另外寄信通知此email付款是否成功
     * @var string
     */
    public $buyer_email;
}
