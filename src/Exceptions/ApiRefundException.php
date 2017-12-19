<?php
/**
 * Author: Eric G. Huang
 * Date Time: 2/29/16 6:02 PM
 */

namespace PCPayClient\Exceptions;

/**
 * Class ApiRefundException
 * @package PCPayClient\Exceptions
 * @codeCoverageIgnore
 */
class ApiRefundException extends ApiException
{
    public function getApiCode()
    {
        return 402;
    }

    public function getApiType()
    {
        return "refund_error";
    }
}

