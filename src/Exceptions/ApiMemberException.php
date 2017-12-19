<?php
/**
 * Author: Eric G. Huang
 * Date Time: 2/29/16 6:02 PM
 */

namespace PCPayClient\Exceptions;

/**
 * Class ApiMemberException
 * @package PCPayClient\Exceptions
 * @codeCoverageIgnore
 */
class ApiMemberException extends ApiException
{
    public function getApiCode()
    {
        return 402;
    }

    public function getApiType()
    {
        return "member_error";
    }
}