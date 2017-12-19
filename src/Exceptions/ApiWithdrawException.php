<?php
/**
 * Author: Eric G. Huang
 * Date Time: 4/11/16 5:50 PM
 */

namespace PCPayClient\Exceptions;

/**
 * Class ApiWithdrawException
 * @package PCPayClient\Exceptions
 * @codeCoverageIgnore
 */
class ApiWithdrawException extends ApiException
{

    public function getApiCode()
    {
        return 402;
    }

    public function getApiType()
    {
        return "withdraw_error";
    }
}