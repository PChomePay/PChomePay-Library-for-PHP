<?php
/**
 * Author: Eric G. Huang
 * Date Time: 2/29/16 6:00 PM
 */

namespace PCPayClient\Exceptions;

/**
 * Class ApiAuthException
 * @package PCPayClient\Exceptions
 * @codeCoverageIgnore
 */
class ApiAuthException extends ApiException
{

    public function getApiCode()
    {
        return 401;
    }

    /**
     * @return string
     */
    public function getApiType()
    {
        return "auth_error";
    }
}