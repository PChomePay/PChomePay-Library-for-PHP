<?php
/**
 * Author: Eric G. Huang
 * Date Time: 2/29/16 6:01 PM
 */

namespace PCPayClient\Exceptions;

/**
 * Class ApiInvalidRequestException
 * @package PCPayClient\Exceptions
 * @codeCoverageIgnore
 */
class ApiInvalidRequestException extends ApiException
{
    const ORDER_EXISTS = 20001;

    public function getApiCode()
    {
        return 400;
    }

    public function getApiType()
    {
        return "invalid_request_error";
    }
}