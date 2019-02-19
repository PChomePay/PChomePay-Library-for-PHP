<?php

/**
 * Author: Eric G. Huang
 * Date Time: 3/7/16 11:24 AM
 */

namespace PCPayClient\ValueObject\Request;

class PaymentPostReqVO extends IPaymentReqVO
{
    /**
     * 合作平台訂單編號，此欄位為唯一值，特店所建立之訂單編號不得重複
     *
     * @var string
     */
    public $order_id;

    /**
     * 交易類別：本欄位可單選(以 string 方式)或是複選(以 array 方式)
     *
     * * 以單選方式時會將使用者直接導頁至該付款方式之頁面
     * * 以複選方式時會先讓使用者看到所指定之付款方式供使用者選後再行付款
     *
     * @var string|array
     */
    public $pay_type;

    /**
     * 訂單金額
     *
     * @var int
     */
    public $amount;

    /**
     * 合作平台買家帳號
     *
     * @var string
     */
    public $buyer_id;

    /**
     * 交易完成後會有「返回」的按鍵，該按鍵按下後會導頁至本欄位所設定之 URL。如無設定本欄位，將返回至合作平台設定時之預設 URL
     *
     * @var string
     */
    public $return_url;

    /**
     * 交易失敗後會有「返回」的按鍵，該按鍵按下後會導頁至本欄位所設定之 URL。如無設定本欄位，將返回至合作平台設定時之預設 URL
     *
     * @var string
     */
    public $fail_return_url;

    /**
     * 訂單結果通知 URL
     * @var string
     */
    public $notify_url;

    /**
     * 商品名稱，會出現在畫面上供買家確認
     *
     * @var string
     */
    public $item_name;

    /**
     * * 商品連結
     *
     * @var string
     */
    public $item_url;

    /**
     * ATM 訂單進階設定物件
     *
     * @var PaymentPostReqATMVO
     */
    public $atm_info;

    /**
     * 新信用卡訂單進階設定物件
     *
     * @var array
     */
    public $card_installment;
    /**
     * 信用卡訂單進階設定物件
     *
     * @var array
     */
    public $card_info;

    /**
     * 多商品名稱及連結
     * @var array<object>
     */
    public $items;

    /**
     * 設定是否開啟十秒跳轉 (Y/N)
     * @var string
     */
    public $return_timer;
}
