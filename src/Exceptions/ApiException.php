<?php
/**
 * Author: Eric G. Huang
 * Date Time: 2/29/16 5:58 PM
 */

namespace PCPayClient\Exceptions;

use RuntimeException;

abstract class ApiException extends RuntimeException
{
    public abstract function getApiCode();
    public abstract function getApiType();

    public static function getExceptionClassNameByErrorType($type){
        $type = str_replace("_error", "", $type);

        $inputs = explode("_", $type);
        $camelString = '';
        foreach ($inputs as $input) {
            $camelString .= ucfirst($input);
        }
        $className = "\\PCPayClient\\Exceptions\\Api".$camelString."Exception";
        if(class_exists($className)){
            return $className;
        }else{
            return null;
        }
    }
}