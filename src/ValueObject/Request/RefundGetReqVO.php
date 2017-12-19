<?php
/**
 * Author: Eric G. Huang
 * Date Time: 3/8/16 4:05 PM
 */

namespace PCPayClient\ValueObject\Request;

/**
 * 查詢退款 Request VO
 *
 * 合作平台可請求查詢退款 API 查詢訂單退款詳細，查詢內容與建立退款回應相同
 *
 * Class RefundGetReqVO
 * @package PCPayCommon\ValueObjects\PrvtApi\Request
 */
class RefundGetReqVO
{
    /**
     * 合作平台退款編號,此欄位填入只回應該筆退 款之物件
     *
     * @var string
     */
    public $refund_id;

}
