[![Latest Stable Version][latest stable version]][1]
 [![GitHub stars][github stars]][1]
 [![Total Downloads][total downloads]][1]
 [![GitHub Workflow Status][github workflow status]][2]
 [![Scrutinizer code quality][code quality]][3]
 [![Type Coverage][type coverage]][4]
 [![Code Coverage][code coverage]][3]
 [![License][license]][1]
 [![Donate!][donate github]][5]
 [![Donate!][donate paypal]][6]

# PSR-17 http-factories implementation

The [PSR-17 specification](https://www.php-fig.org/psr/psr-17/) is about HTTP factories.

There are many PSR-17 interfaces and the purpose of this package is to regroup them all
in one single interface: `PSR17Interface`.

This package also implements a `PSR17` class which implements this interface and
provide a basic implementation.

# Requirements

* PHP >= 7.4

# Installation

```bash
composer require loophp/psr17
```

# Usage

```php
$psr17 = new \loophp\psr17\Psr17();
$request = $psr17->createRequest('GET', 'https://github.com');
$response = $psr17->createResponse(200, 'hello');
$stream = $psr17->createStream('foobar');
```


## Code quality, tests and benchmarks

Every time changes are introduced into the library, [Github][11] run the tests and the benchmarks.

The library has tests written with [PHPSpec][12].
Feel free to check them out in the `spec` directory. Run `composer phpspec` to trigger the tests.

Before each commit some inspections are executed with [GrumPHP][13], run `./vendor/bin/grumphp run` to check manually.

[PHPInfection][14] is used to ensure that your code is properly tested, run `composer infection` to test your code.

## Contributing

Feel free to contribute by sending Github pull requests. I'm quite responsive :-)

## Changelog

See [CHANGELOG.md][15] for a changelog based on [git commits][16].

For more detailed changelogs, please check [the release changelogs][17].

[1]: https://packagist.org/packages/loophp/psr17
[2]: https://github.com/loophp/psr17/actions
[latest stable version]: https://img.shields.io/packagist/v/loophp/psr17.svg?style=flat-square
[github stars]: https://img.shields.io/github/stars/loophp/psr17.svg?style=flat-square
[total downloads]: https://img.shields.io/packagist/dt/loophp/psr17.svg?style=flat-square
[github workflow status]: https://img.shields.io/github/workflow/status/loophp/psr17/Unit%20tests?style=flat-square
[code quality]: https://img.shields.io/scrutinizer/quality/g/loophp/psr17/master.svg?style=flat-square
[3]: https://scrutinizer-ci.com/g/loophp/psr17/?branch=master
[type coverage]: https://img.shields.io/badge/dynamic/json?style=flat-square&color=color&label=Type%20coverage&query=message&url=https%3A%2F%2Fshepherd.dev%2Fgithub%2Floophp%2Fpsr17%2Fcoverage
[4]: https://shepherd.dev/github/loophp/psr17
[code coverage]: https://img.shields.io/scrutinizer/coverage/g/loophp/psr17/master.svg?style=flat-square
[license]: https://img.shields.io/packagist/l/loophp/psr17.svg?style=flat-square
[donate github]: https://img.shields.io/badge/Sponsor-Github-brightgreen.svg?style=flat-square
[donate paypal]: https://img.shields.io/badge/Sponsor-Paypal-brightgreen.svg?style=flat-square
[5]: https://github.com/sponsors/drupol
[6]: https://www.paypal.me/drupol
[10]: https://github.com/symfony/psr-http-message-bridge
[11]: https://github.com/loophp/psr17/actions
[12]: http://www.phpspec.net/
[13]: https://github.com/phpro/grumphp
[14]: https://github.com/infection/infection
[15]: https://github.com/phpstan/phpstan
[16]: https://github.com/vimeo/psalm
[15]: https://github.com/loophp/psr17/blob/master/CHANGELOG.md
[16]: https://github.com/loophp/psr17/commits/master
[17]: https://github.com/loophp/psr17/releases
