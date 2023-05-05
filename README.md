[![Latest Stable Version][latest stable version]][1]
[![GitHub stars][github stars]][1]
[![Total Downloads][total downloads]][1]
[![GitHub Workflow Status][github workflow status]][github actions link]
[![Type Coverage][type coverage]][4]
[![License][license]][1]
[![Donate!][donate github]][5]

# PSR-17 http-factories implementation

The [PSR-17 specification][22] is about HTTP factories.

There are many PSR-17 interfaces and the purpose of this package is to regroup
them all in one single interface: `PSR17Interface`.

This package also implements a `PSR17` class which implements this interface and
provide a basic implementation.

## Requirements

- PHP >= 7.4

## Installation

```bash
composer require loophp/psr17
```

This package requires also a [psr/http-factory-implementation][18]. I advise to
use [nyholm/psr7][19] from [Tobias Nyholm][20].

## Usage

```php
<?php

declare(strict_types=1);

namespace App;

use loophp\psr17\Psr17;
use Nyholm\Psr7\Factory\Psr17Factory;

include __DIR__ . '/vendor/autoload.php';

// In this example, I used nyholm/psr7
// But you could any another library of your choice.
$requestFactory = $responseFactory = $streamFactory = $uploadedFileFactory = $uriFactory = $serverRequestFactory = new Psr17Factory();

$psr17 = new Psr17($requestFactory, $responseFactory, $streamFactory, $uploadedFileFactory, $uriFactory, $serverRequestFactory);

$request = $psr17->createRequest('GET', 'https://github.com');
$response = $psr17->createResponse(200, 'hello');
$stream = $psr17->createStream('foobar');
$uploadedFile = $psr17->createUploadedFile($stream);
$uri = $psr17->createUri('https://github.com/loophp/psr17');
$serverRequest = $psr17->createServerRequest('GET', 'https://github.com/');
```

### Integration with Symfony

Since the 29 of July, a [Symfony recipe][21] has been published for this
package.

Therefore, if you're using [Symfony Flex][23], then you don't have anything to
do. When the package will be installed by Composer, Symfony Flex will install
the configuration file in your application and automatically do the necessary
services and interfaces wiring.

If you're not using Flex, add in `services.yaml`:

```yaml
services:
  # Register loophp/psr17/Psr17 class and autowire/autoconfigure it.
  loophp\psr17\Psr17:
    autowire: true
    autoconfigure: true

  # Alias the service to the Psr17 interface.
  loophp\psr17\Psr17Interface: '@loophp\psr17\Psr17'
```

Once again, you will need to have proper wiring for the dependencies of the
`Psr17` class.

This is left up to the user but if you want a default implementation, you can
use [nyholm/psr7][19] which provides also a Symfony recipe with the required
dependencies so the container will be able to _autowire_ the `Psr17` service.

## Code quality, tests and benchmarks

Every time changes are introduced into the library, [Github][11] run the tests
and the benchmarks.

The library has tests written with [PHPSpec][12]. Feel free to check them out in
the `spec` directory. Run `composer phpspec` to trigger the tests.

Before each commit some inspections are executed with [GrumPHP][13], run
`./vendor/bin/grumphp run` to check manually.

[PHPInfection][14] is used to ensure that your code is properly tested, run
`composer infection` to test your code.

## Contributing

Feel free to contribute by sending Github pull requests. I'm quite responsive
:-)

## Changelog

See [CHANGELOG.md][15] for a changelog based on [git commits][16].

For more detailed changelogs, please check [the release changelogs][17].

[1]: https://packagist.org/packages/loophp/psr17
[2]: https://github.com/loophp/psr17/actions
[latest stable version]:
  https://img.shields.io/packagist/v/loophp/psr17.svg?style=flat-square
[github stars]:
  https://img.shields.io/github/stars/loophp/psr17.svg?style=flat-square
[total downloads]:
  https://img.shields.io/packagist/dt/loophp/psr17.svg?style=flat-square
[github actions link]: https://github.com/loophp/psr17/actions
[github workflow status]:
  https://img.shields.io/github/actions/workflow/status/loophp/psr17/tests.yml?branch=master&style=flat-square
[type coverage]:
  https://img.shields.io/badge/dynamic/json?style=flat-square&color=color&label=Type%20coverage&query=message&url=https%3A%2F%2Fshepherd.dev%2Fgithub%2Floophp%2Fpsr17%2Fcoverage
[4]: https://shepherd.dev/github/loophp/psr17
[license]: https://img.shields.io/packagist/l/loophp/psr17.svg?style=flat-square
[donate github]:
  https://img.shields.io/badge/Sponsor-Github-brightgreen.svg?style=flat-square
[donate paypal]:
  https://img.shields.io/badge/Sponsor-Paypal-brightgreen.svg?style=flat-square
[5]: https://github.com/sponsors/drupol
[6]: https://www.paypal.me/drupol
[10]: https://github.com/symfony/psr-http-message-bridge
[11]: https://github.com/loophp/psr17/actions
[12]: http://www.phpspec.net/
[13]: https://github.com/phpro/grumphp
[14]: https://github.com/infection/infection
[15]: https://github.com/loophp/psr17/blob/master/CHANGELOG.md
[16]: https://github.com/loophp/psr17/commits/master
[17]: https://github.com/loophp/psr17/releases
[18]: https://packagist.org/providers/psr/http-factory-implementation
[19]: https://packagist.org/packages/nyholm/psr7
[20]: https://tnyholm.se/
[21]: https://github.com/symfony/recipes-contrib/pull/1180
[22]: https://www.php-fig.org/psr/psr-17/
[23]: https://symfony.com/doc/current/setup/flex.html
