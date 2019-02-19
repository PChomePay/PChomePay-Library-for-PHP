# PChomePay-Library-for-PHP

The client library for PChomePay API.

## Install  via composer

### step 1

add composer.json in your project

```
{
    "repositories": [
        {
            "url": "https://github.com/PChomePay/PChomePay-Library-for-PHP.git",
            "type": "git"
        }

    ],
    "require": {
                "pcpay/api-client":"dev-master"
    },
       	"minimum-stability": "dev"
}
```

### step 2
run composer

```bash
> composer install

```

## How to use

For libraries that specify autoload information, Composer generates a vendor/autoload.php file. 

You can simply include this file and start using the classes that those libraries provide without any extra work

Example: 
```php
<?php
include "./vendor/autoload.php";

$client = new \PCPayClient\Client\PPApiClient($userId, $pass, null, false, true);
$r = $client->getTokenObj();

var_dump($r);
```

##### See more examples in example folder