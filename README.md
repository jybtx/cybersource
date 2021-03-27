<h1 align="center"> cybersource </h1>

<p align="center"> CyberSource PHP SOAP client.</p>


## Installing

```shell
$ composer require jybtx/cybersource -vvv
```

## Usage

```php

use CyberSource;

$request = CyberSource::createRequest();
// 银行卡信息
$card = new stdClass();
$card->accountNumber = '4622 9431 2701 3705';
$card->expirationMonth = '12';
$card->expirationYear = '22';
$request->card = $card;

$ccAuthService = new stdClass();
$ccAuthService->run = 'true';
$request->ccAuthService = $ccAuthService;

$ccCaptureService = new stdClass();
$ccCaptureService->run = 'true';
$request->ccCaptureService = $ccCaptureService;

// 个人信息
$billTo = new stdClass();
$billTo->firstName = 'first name';
$billTo->lastName = 'last name';
$billTo->street1 = '1295 Charleston Road';
$billTo->city = 'Mountain View';
$billTo->state = 'CA';
//        $billTo->postalCode = '838';
$billTo->country = 'CN';
$billTo->email = 'xx@xx.com';
$billTo->ipAddress = request()->ip();
$request->billTo = $billTo;
//
$purchaseTotals = new stdClass();
$purchaseTotals->currency = 'USD';
$purchaseTotals->grandTotalAmount = '0.1';
$request->purchaseTotals = $purchaseTotals;

$reply = CyberSource::runTransaction($request);
dd($reply);

```

## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/jybtx/cybersource/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/jybtx/cybersource/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT