<?php
/**
 * Created by PchomePay.
 * Author: Eric G. Huang <justericgg@pchomepay.com.tw>
 * Date: 2014/7/31
 * Time: 上午 10:10
 */

namespace PCPayClient\Client;

use Exception;
use PCPayClient\Entity\PPToken;
use PCPayClient\Entity\PPTokenException;
use PCPayClient\Exceptions\ApiException;
use PCPayClient\Exceptions\ApiInvalidRequestException;
use PCPayClient\Exceptions\ApiServerError;
use PCPayClient\Storage\ITokenStorage;
use PCPayClient\Storage\SessionTokenStorage;
use PCPayClient\Utils\CurlTool;
use PCPayClient\ValueObject\Request\AtmVAccountPostReqVO;
use PCPayClient\ValueObject\Request\CheckingGetReqVO;
use PCPayClient\ValueObject\Request\PaymentAuditPostReqVO;
use PCPayClient\ValueObject\Request\PaymentPostReqVO;
use PCPayClient\ValueObject\Request\RefundPostReqVO;
use PCPayClient\ValueObject\Request\WithdrawPostReqVO;
use PCPayClient\ValueObjects\Response\AtmBanksGetRspVO;
use PCPayClient\ValueObjects\Response\AtmVAccountPostRspVO;
use PCPayClient\ValueObjects\Response\BalanceGetRspVO;
use PCPayClient\ValueObjects\Response\CardBanksGetRspVO;
use PCPayClient\ValueObjects\Response\CheckingGetRspVO;
use PCPayClient\ValueObjects\Response\PaymentAuditPostRspVO;
use PCPayClient\ValueObjects\Response\PaymentGetRspVO;
use PCPayClient\ValueObjects\Response\PaymentPostRspVO;
use PCPayClient\ValueObjects\Response\RefundGetRspVO;
use PCPayClient\ValueObjects\Response\RefundPostRspVO;
use PCPayClient\ValueObjects\Response\WithdrawPostRspVO;

class PPApiClient
{
    const TOKEN_EXPIRE_SEC = 1800; //30 * 60;  //30 minutes
    const BASE_URL = "https://api.pchomepay.com.tw/v1";
    const SB_BASE_URL = "https://sandbox-api.pchomepay.com.tw/v1";

    protected $userAuth;
    protected $tokenStorage;
    protected $token;
    private $ignoreSSL;


    /**
     * PPApiClient constructor.
     * @param                    $userId
     * @param                    $secret
     * @param ITokenStorage|null $tokenStorage
     * @param bool               $sandBox
     * @param bool               $ignoreSSL
     */
    public function __construct($userId, $secret, ITokenStorage $tokenStorage = null, $sandBox = false, $ignoreSSL = false)
    {
        $baseURL = $sandBox ? PPApiClient::SB_BASE_URL : PPApiClient::BASE_URL;

        $this->tokenURL = $baseURL . "/token";
        $this->postPaymentURL = $baseURL . "/payment";
        $this->getPaymentURL = $baseURL . "/payment/{order_id}";
        $this->postPaymentAtmVAURL = $baseURL . "/payment/atmva";
        $this->postPaymentAuditURL = $baseURL . "/payment/audit";
        $this->getPaymentAtmBanksURL = $baseURL . "/payment/atm/banks";
        $this->getPaymentCardBanksURL = $baseURL . "/payment/card/banks";
        $this->getRefundURL = $baseURL . "/refund/{refund_id}";
        $this->postRefundURL = $baseURL . "/refund";
        $this->postWithdrawURL = $baseURL . "/withdraw";
        $this->getCheckingURL = $baseURL . "/checking/{date}/{type}";
        $this->getBalanceURL = $baseURL . "/balance";

        $this->userAuth = "{$userId}:{$secret}";

        if ($tokenStorage == null) {
            $tokenStorage = new SessionTokenStorage();
        }

        $this->tokenStorage = $tokenStorage;

        $this->ignoreSSL = $ignoreSSL;
    }

    /**
     * get token from storage, if the token will be expired soon. Get another one from server, and save it to storage
     * @param $fromStorage boolean
     * @return PPToken
     * @throws Exception
     */
    public function getTokenObj($fromStorage = true)
    {
        $tokenFail = false;

        //從 storage 取得資料
        if ($fromStorage && !$this->token) {
            $str = $this->tokenStorage->getTokenStr();
            if (!empty($str)) {
                try {
                    $this->token = new PPToken($this->tokenStorage->getTokenStr());
                } catch (PPTokenException $ex) {
                    $tokenFail = true;
                }
            } else {
                $tokenFail = true;
            }
        }


        //如果沒有資料 或 token 快過期時 , 取得新的 token
        if ($tokenFail || empty($this->token) || $this->token->willExpiredIn(PPApiClient::TOKEN_EXPIRE_SEC)) {

            $curl = CurlTool::getInstance();
            $body = $curl->postToken($this->userAuth, $this->tokenURL);
            $this->handleResult($body);
            $this->token = new PPToken($body);
            $this->tokenStorage->saveTokenStr($this->token->getJson());
        }

        return $this->token;
    }


    /**
     * @param PaymentPostReqVO $data
     * @return PaymentPostRspVO
     * @throws Exception
     */
    public function postPayment(PaymentPostReqVO $data)
    {
        $tokenObj = $this->getTokenObj();
        $result = $this->curlPost($tokenObj->getToken(), $this->postPaymentURL, json_encode($data));
        return $this->handleResult($result);
    }

    /**
     * @param AtmVAccountPostReqVO $data
     * @return AtmVAccountPostRspVO
     * @throws Exception
     */
    public function postPaymentAtmVA(AtmVAccountPostReqVO $data)
    {
        $tokenObj = $this->getTokenObj();
        $result = $this->curlPost($tokenObj->getToken(), $this->postPaymentAtmVAURL, json_encode($data));
        return $this->handleResult($result);
    }

    /**
     * @param PaymentAuditPostReqVO $data
     * @return PaymentAuditPostRspVO
     * @throws Exception
     */
    public function postPaymentAudit(PaymentAuditPostReqVO $data)
    {
        $tokenObj = $this->getTokenObj();
        $result = $this->curlPost($tokenObj->getToken(), $this->postPaymentAuditURL, json_encode($data));
        return $this->handleResult($result);
    }

    /**
     * @param RefundPostReqVO $data
     * @return RefundPostRspVO
     * @throws Exception
     */
    public function postRefund(RefundPostReqVO $data)
    {
        $tokenObj = $this->getTokenObj();
        $result = $this->curlPost($tokenObj->getToken(), $this->postRefundURL, json_encode($data));
        return $this->handleResult($result);
    }

    /**
     * @param $amount
     * @return WithdrawPostRspVO
     * @throws Exception
     */
    //public function postWithdraw(WithdrawPostReqVO $data)
    public function postWithdraw($amount)
    {
        $data = new WithdrawPostReqVO();
        $data->amount = $amount;
        $tokenObj = $this->getTokenObj();
        $result = $this->curlPost($tokenObj->getToken(), $this->postWithdrawURL, json_encode($data));
        return $this->handleResult($result);
    }

    /**
     * @param $orderId
     * @return PaymentGetRspVO
     * @throws Exception
     */
    public function getPayment($orderId)
    {
        if (!is_string($orderId) || stristr($orderId, "/")) {
            throw new ApiInvalidRequestException('Order does not exist!', 20002);
        }
        $tokenObj = $this->getTokenObj();
        $result = $this->curlGet($tokenObj->getToken(), str_replace("{order_id}", $orderId, $this->getPaymentURL));
        return $this->handleResult($result);
    }

    /**
     * @return AtmBanksGetRspVO
     * @throws Exception
     */
    public function getPaymentAtmBanks()
    {
        $tokenObj = $this->getTokenObj();
        $result = $this->curlGet($tokenObj->getToken(), $this->getPaymentAtmBanksURL);
        return $this->handleResult($result);
    }

    /**
     * @return CardBanksGetRspVO
     * @throws Exception
     */
    public function getPaymentCardBanks()
    {
        $tokenObj = $this->getTokenObj();
        $result = $this->curlGet($tokenObj->getToken(), $this->getPaymentCardBanksURL);
        return $this->handleResult($result);
    }

    /**
     * @param $refundId
     * @return RefundGetRspVO
     * @throws Exception
     */
    public function getRefund($refundId)
    {
        if (!is_string($refundId) || stristr($refundId, "/")) {
            throw new ApiInvalidRequestException('Order does not exist!', 20002);
        }
        $tokenObj = $this->getTokenObj();
        $result = $this->curlGet($tokenObj->getToken(), str_replace("{refund_id}", $refundId, $this->getRefundURL));
        return $this->handleResult($result);
    }

    /**
     * Process the result line by line recommended
     * @param CheckingGetReqVO $data
     * @return CheckingGetRspVO
     * @throws Exception
     */
    public function getChecking(CheckingGetReqVO $data)
    {
        if (!is_string($data->date) || !is_string($data->type) || stristr($data->date, "/") || stristr($data->type, "/")) {
            throw new ApiInvalidRequestException('訂單不存在', 20002);
        }
        $tokenObj = $this->getTokenObj();
        $str = $data->date . "/" . $data->type;
        $result = $this->curlGet($tokenObj->getToken(), str_replace("{date}/{type}", $str, $this->getCheckingURL));
        //$this->handleResult(strtok($result, "\n"));
        return $result;
    }

    /**
     * @return BalanceGetRspVO
     * @throws Exception
     */
    public function getBalance()
    {
        $tokenObj = $this->getTokenObj();
        $result = $this->curlGet($tokenObj->getToken(), $this->getBalanceURL);
        return $this->handleResult($result);
    }

    protected function curlPost($token, $url, $data)
    {
        $curl = CurlTool::getInstance();
        return $curl->postAPI($token, $url, $data);
    }


    protected function curlGet($token, $url, $data = [])
    {
        $curl = CurlTool::getInstance();
        return $curl->getAPI($token, $url, $data);
    }


    /**
     * handle the message come from server
     * if there is error, throw the right ApiException
     *
     * @param $result string
     * @return \stdClass
     * @throws \Exception | ApiException
     */
    private function handleResult($result)
    {
        $jsonErrMap = [
            JSON_ERROR_NONE => 'No error has occurred',
            JSON_ERROR_DEPTH => 'The maximum stack depth has been exceeded',
            JSON_ERROR_STATE_MISMATCH => 'Invalid or malformed JSON',
            JSON_ERROR_CTRL_CHAR => 'Control character error, possibly incorrectly encoded',
            JSON_ERROR_SYNTAX => 'Syntax error',
            JSON_ERROR_UTF8 => 'Malformed UTF-8 characters, possibly incorrectly encoded	PHP 5.3.3',
            JSON_ERROR_RECURSION => 'One or more recursive references in the value to be encoded	PHP 5.5.0',
            JSON_ERROR_INF_OR_NAN => 'One or more NAN or INF values in the value to be encoded	PHP 5.5.0',
            JSON_ERROR_UNSUPPORTED_TYPE => 'A value of a type that cannot be encoded was given	PHP 5.5.0'
        ];

        $obj = json_decode($result);

        $err = json_last_error();

        if ($err) {
            $errStr = "($err)" . $jsonErrMap[$err];
            if (empty($errStr)) {
                $errStr = " - unknow error, error code ({$err})";
            }
            throw new ApiServerError("server result error($err) {$errStr}:$result");
        }

        if (property_exists($obj, "error_type")) {
            $expClass = ApiException::getExceptionClassNameByErrorType($obj->error_type);
            if (class_exists($expClass)) {
                throw new $expClass($obj->message, $obj->code);
            } else {
                throw new Exception($obj->message, $obj->code);
            }
        }
        return $obj;
    }

}