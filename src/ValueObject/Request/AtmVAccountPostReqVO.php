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
}
