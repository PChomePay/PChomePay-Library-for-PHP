<?php
/**
 * Author: Eric G. Huang
 * Date Time: 4/11/16 2:24 PM
 */

namespace PCPayClient\Exceptions;


/**
 * Class ApiTransactionException
 * @package PCPayClient\Exceptions
 * @codeCoverageIgnore
 */
class ApiTransactionException extends ApiException
{
    public function getApiCode()
    {
        return 402;
    }

    public function getApiType()
    {
        return "transaction_error";
    }
}