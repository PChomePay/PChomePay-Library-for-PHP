<?php
/**
 * Author: Eric G. Huang
 * Date Time: 2/29/16 8:19 PM
 */

date_default_timezone_set("Asia/Taipei");

if (!include __DIR__ . '/../vendor/autoload.php') {
    echo 'Install Unit test using `composer install`';
    exit(1);
}