# IBanking Package for Laravel 5.6

[![Laravel 5.6](https://img.shields.io/badge/laravel-5.6-orange.svg?style=flat-square)](http://laravel.com)
[![Build Status](https://img.shields.io/badge/build-devmaster-lightgrey.svg?style=flat-square)](https://github.com/arifr007/ibanking)
[![Source](https://img.shields.io/badge/source-arifr007%2Fibanking-blue.svg?style=flat-square)](https://github.com/arifr007/ibanking)
[![License](http://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](https://tldrlegal.com/license/mit-license)

This package allows you to crawl and parse your bank balance and statement. Currently available for Bank BCA and Bank Mandiri.

## Quick Installation

To get started with IBanking, run this command or add the package to your `composer.json`
```php
composer require arifr007/ibanking
```

## Configuration

After installing the IBanking package, simply add this classes to the `providers` array in your project's config/app.php file:
```php
Arifr007\IBanking\IBankingServiceProvider::class
```

Also, add the `IBanking` facade to the `aliases` array in your `app` configuration file:
```php
'IBanking' => Arifr007\IBanking\Facades\IBanking::class,
```

Finally add these lines to your `config/services.php` file:
```php
'bca' => [
    'username' => 'your-klikbca-username',
    'password' => 'your-klikbca-password'
],
'mandiri' => [
    'username' => 'your-mandiri-username',
    'password' => 'your-mandiri-password'
]
```

## How To Use

After all sets, use the IBanking as follows:
```php
$ibank = IBanking::bank('bca'); // or use IBanking::bank('mandiri') for mandiri user

$ibank->login();

$balance = $ibank->getBalance();

$statement = $ibank->getStatement(3); // mutation within last 3 days. Default: 1 (yesterday)

$ibank->logout();
```

The `logout()` method should be called to avoid single session at a time restriction from the internet banking provider.
This means if you don't call the `logout()` method at the end of your codes, you won't be able to login to your internet banking from anywhere until its session expired.

## Non-Laravel Usage

You can stil use IBanking without Laravel. This is how:

After running `composer require arifr007/ibanking`, create a php file in your project folder and put the following codes

```php
require 'vendor/autoload.php';

use Arifr007\IBanking\CrawlerParser;
use Arifr007\IBanking\Providers\BCAProvider;

$ibank = new BCAProvider(new CrawlerParser(), 'username', 'password');
$ibank->login();
$balance = $ibank->getBalance();
$statement = $ibank->getStatement();
$ibank->logout();

// the rest of your code...
```

## Tips & Advice

You can place the above code under the Scheduled Command job (Laravel) and sets it to run [not more than 100x per day](http://www.randomlog.org/article/bca-parser-lagi/#comment-2912).
The less you run it per day, the less chances you are being suspended by the internet banking provider.
Please make any necessary effort to keep your ibank username and password safe and secure.
Changing your password regularly can help to keep it more secure.

## Issues

> For bug reporting or code discussions.
More info on how to work with GitHub on help.github.com.

## Contributing

Contributions are **welcome** and will be fully **credited**.

## Credits

> this project's base from [Rick20](https://github.com/Rick20/ibanking) iBanking and modified for compatibility to latest laravel 5.6.

## License

The module is licensed under [MIT](./LICENSE.md). In short, this license allows you to do everything as long as the copyright statement stays present.