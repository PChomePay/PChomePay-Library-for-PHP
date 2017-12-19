<?php
/**
 * Created by PhpStorm.
 * User: curly
 * Date: 2016/4/28
 * Time: 上午 10:21
 */

namespace PCPayClient\ValueObjects\Response;

/**
 * 訂單審單
 *
 * 合作平台如果有設定需要審單，訂單在滿足審單條件時訂單狀態並不會直接變為”成功”，而是進入 “平台審單中”的狀態。此時平台需要呼叫本API來決定是否接受客人的訂單
 *
 * Class AuditPostReqVO
 * @package PCPayClient\ValueObject\Request
 */
class PaymentAuditPostRspVO
{
    /**
     * 合作平台訂單編號, 此欄位為唯一值。特店所建立之訂單編號不得重複。
     *
     * @var string
     */
    public $order_id;

    /**
     * SUCC：呼叫成功
     * 失敗時見錯誤代碼說明
     *
     * @var string
     */
    public $status;
}
