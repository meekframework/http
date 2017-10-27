# MeekFramework Http Component

[![Scrutinizer Build Status][scrutinizer-build-image]][scrutinizer-build-url]
[![Scrutinizer Code Quality][scrutinizer-code-quality-image]][scrutinizer-code-quality-url]
[![Scrutinizer Code Coverage][scrutinizer-code-coverage-image]][scrutinizer-code-coverage-url]
[![Packagist Latest Stable Version][packagist-image]][packagist-url]
[![MIT License][license-image]][license-url]

A [PSR7](http://www.php-fig.org/psr/psr-7/) compliant library for handling HTTP requests, responses, middleware and errors.

## Installation

With [Composer](https://getcomposer.org/):

```bash
composer require meekframework/route
```

## Usage

Here is an example integrating [Diactoros](https://github.com/zendframework/zend-diactoros) and [FastRoute](https://github.com/nikic/FastRoute) together with the Meek HTTP component:

```php
require __DIR__ . '/vendor/autoload.php';

use FastRoute\simpleDispatcher;
use FastRoute\RouteCollector;
use FastRoute\Dispatcher;
use Meek\Http\ClientError;
use Meek\Http\ClientError\MethodNotAllowed;
use Meek\Http\ClientError\NotFound;
use Zend\Diactoros\ServerRequestFactory;
use Zend\Diactoros\Response\TextResponse;
use Zend\Diactoros\Response\SapiEmitter;

$dispatcher = simpleDispatcher(function(RouteCollector $r) {
    $r->addRoute('GET', '/users', 'get_all_users_handler');
    $r->addRoute('GET', '/user/{id:\d+}', 'get_user_handler');
    $r->addRoute('GET', '/articles/{id:\d+}[/{title}]', 'get_article_handler');
});

$request = ServerRequestFactory::fromGlobals();
$routeInfo = $dispatcher->dispatch($request->getMethod(), $request->getRequestTarget());

try {
    switch ($routeInfo[0]) {
        case Dispatcher::NOT_FOUND:
            throw new NotFound();
            break;

        case Dispatcher::METHOD_NOT_ALLOWED:
            $allowedMethods = $routeInfo[1];
            throw new MethodNotAllowed($allowedMethods);
            break;

        case Dispatcher::FOUND:
            $response = call_user_func_array($routeInfo[1], $routeInfo[2]);
            break;
    }
} catch (ClientError $httpClientError) {
    $response = new TextResponse((string) $httpClientError);    // response body...
    $response = $httpClientError->prepare($response);   // add headers, code, etc...
}

(new SapiEmitter())->emit($response);
```

## API

## Contributing

See [CONTRIBUTING.md](CONTRIBUTING.md).

## Credits/Authors

## License

The MIT License (MIT). Please see [LICENSE.md](LICENSE.md) for more information.

[scrutinizer-build-url]: https://scrutinizer-ci.com/g/meekframework/http/build-status/master
[scrutinizer-build-image]: https://scrutinizer-ci.com/g/meekframework/http/badges/build.png?b=master
[scrutinizer-code-quality-url]: https://scrutinizer-ci.com/g/meekframework/http/?branch=master
[scrutinizer-code-quality-image]: https://scrutinizer-ci.com/g/meekframework/http/badges/quality-score.png?b=master
[scrutinizer-code-coverage-url]: https://scrutinizer-ci.com/g/meekframework/http/?branch=master
[scrutinizer-code-coverage-image]: https://scrutinizer-ci.com/g/meekframework/http/badges/coverage.png?b=master
[packagist-url]: https://packagist.org/packages/meekframework/http
[packagist-image]: https://img.shields.io/packagist/v/meekframework/http.svg
[license-url]: https://raw.githubusercontent.com/meekframework/http/master/LICENSE.md
[license-image]: https://img.shields.io/badge/license-MIT-blue.svg
