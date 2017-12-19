<?php
/**
 * Author: Eric G. Huang
 * Date Time: 2/29/16 6:00 PM
 */

namespace PCPayClient\Exceptions;

/**
 * Class ApiServerError
 * @package PCPayClient\Exceptions
 * @codeCoverageIgnore
 */
class ApiServerError extends ApiException
{

    public function getApiCode()
    {
        return 500;
    }

    /**
     * @return string
     */
    public function getApiType()
    {
        return "server_error";
    }
}