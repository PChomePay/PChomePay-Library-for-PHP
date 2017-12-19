# pcpay-api-client

The client library for PChomePay API.

## Install  via composer

### step 1

add composer.json

```
{
    "repositories": [
        {
            "url": "https://github.com/river0825/pcpay-api-client.git",
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

```php
<?php
include "./vendor/autoload.php";

//for session token storage
sessoin_start();

$client = new \PCPayClient\Client\PPApiClient($userId, $pass, null, false, true);
$r = $client->getTokenObj();

var_dump($r);
```
