<?php
/**
 * Author: Eric G. Huang
 * Date Time: 3/7/16 11:16 AM
 */

namespace PCPayClient\ValueObjects\Response;

/**
 * 查詢餘額 Response VO
 *
 * Class BalanceGetRspVO
 * @package PCPayClient\ValueObjects\Response
 */
class BalanceGetRspVO
{
    /**
     * 總餘額
     *
     * 查詢帳戶中所有的金額
     *
     * @var int
     */
    public $all;

    /**
     * 可提領餘額
     *
     * 查詢帳戶中所有可提領的金額
     *
     * @var int
     */
    public $available;

    /**
     * 處理中餘額
     *
     * 查詢帳戶中所有提領中或其他清算中金額
     *
     * @var int
     */
    public $processing;
}
