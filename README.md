<h1> coinpayment </h1>

<p align="left"> CoinPayment 币种钱包地址生成</p>


## Installing

### Composer
Execute the following command to get the latest version of the package:

```shell
$ composer require jybtx/coinpayment
```
### Laravel

#### >= laravel5.5

ServiceProvider will be attached automatically

#### Other

In your `config/app.php` add `Jybtx\CoinPayment\CoinPaymentServiceProvider::class` to the end of the `providers` array:

```php
'providers' => [
    ...
    Jybtx\CoinPayment\CoinPaymentServiceProvider::class,
],
'aliases'  => [
    ...
    "CoinPayment": Jybtx\CoinPayment\CoinPaymentFacade::class,
]
```
Publish Configuration

```shell
php artisan vendor:publish --provider "Jybtx\CoinPayment\CoinPaymentServiceProvider"
```
OR
```shell
php artisan vendor:publish --tag=coin-payment
```

## Usage

```php
use CoinPayment;
CoinPayment::GetDepositAddress('currency');
```

## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/jybtx/coinpayment/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/jybtx/coinpayment/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT