## Laravel Template

This will remain as a template to start a new [Laravel](https://laravel.com) project.

### Table of Content

1. [Development Environment](#development-environment)
2. [Access URL](#access-url)
    1. [Log Viewer](#log-viewer)
    2. [Laravel Telescope](#laravel-telescope)
    3. [Mailpit Inbox](#mailpit-inbox)
3. [Code Standard](#code-standard)
4. [Static Analysis](#static-analysis)
5. [Testing](#testing)
6. [CLI Helpers](#cli-helpers)
    1. [Pint](#linting)
    2. [PHPStan](#static-analyser)
    3. [Tests](#tests)
    4. [IDE Helpers](#ide-helpers)
7. [Supporting Links](#supporting-links)

### Development Environment

Docker containers have been prepared for the local development purpose which includes all the required development environment dependencies. To start working on the API, you must have [Docker](https://docker.com) installed in your local machine.

[Laravel Sail](https://laravel.com/docs/10.x/sail) is used as a command-line interface to interact with the default Docker development environment. Sail has been installed and configured for the API. When working with fresh clone of the API, use the following command to install Sail along with other composer dependencies. Once Sail is installed, you can follow the Sail documentation to start your Docker containers for the _Laravel Template_.

```shell
docker run --rm -v $(pwd):/var/www/html raazpuspa/larasail:8.2 composer install
```

By default, _Sail_ commands are invoked using the `vendor/bin/sail` script:

```shell
vendor/bin/sail up
```

However, instead of repeatedly typing `vendor/bin/sail` to execute _Sail_ commands, you may wish to configure a shell alias that allows you to execute Sail's commands more easily:

```shell
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
```

### Access URL

#### Log Viewer

Once you start the project, you can access the Laravel logs in the following path:

```shell
http://localhost:9000/log-viewer
```

_**Note**: The route path for log-viewer is configured via `LOG_VIEWER_PREFIX` environment variable._

#### Laravel Telescope

For already running/served application, you can access the [Laravel Telescope](https://laravel.com/docs/10.x/telescope) at the following path:

```shell
http://localhost:9000/telescope
```

_**Note**: The route path for Laravel telescope is configured via `TELESCOPE_PATH` environment variable._

#### Mailpit Inbox

Mailpit has been configured with docker container. It is an email testing tool for developers. It acts as both an SMTP server, and provides a web interface to view all captured emails. To access mailpit inbox, check the following URL:

```shell
http://localhost:9002
```

_**Note**: Laravel telescope is only available in `local` app environment._

_**Note**: The port will be as defined in `.env` via `FORWARD_APP_PORT` variable._

_**Note**: The mailpit UI port will be as defined in `.env` via `FORWARD_MAIL_PORT` variable._

### Code Standard

We follow the [PSR-12](https://www.php-fig.org/psr/psr-12/) coding standard and the
[PSR-4](https://www.php-fig.org/psr/psr-4/) autoloading standard.

### Static Analysis

> Compiled languages need to know about the type of every variable, return type of every method, etc. before the program runs. This is why the compiler needs to make sure that the program is “correct” and will happily point out to you these kinds of mistakes in the source code, like calling an undefined method or passing a wrong number of arguments to a function. The compiler acts as a first line of defense before you are able to deploy the application into production.
>
> On the other hand, PHP is nothing like that. If you make a mistake, the program will crash when the line of code with the mistake is executed. When testing a PHP application, whether manually or automatically, developers spend a lot of their time discovering mistakes that would not even compile in other languages, leaving less time for testing actual business logic. [Source](https://phpstan.org/blog/find-bugs-in-your-code-without-writing-tests)

To make sure we do not leave any broken code that could have been caught by any compiler in supported language, we have configured [PHPStan](https://phpstan.org/). PHPStan focuses on finding errors in your code without actually running it. It catches whole classes of bugs even before you write tests for the code. It moves PHP closer to compiled languages in the sense that the correctness of the code can be checked before you run the actual line.

On top of the PHPStan, _Laravel Template_ uses [Larastan](https://github.com/nunomaduro/larastan), which extends PHPStan to support APIs provided by the Laravel framework by adding static typing to Laravel.

### Testing

PHPUnit with Pest plugin is used to facilitate Unit and Feature testing. Pre-configured Docker setup includes XDebug extension for test coverage. **Test coverage of minimum 95% is required for all newly made changes.**

### CLI Helpers

During the development phase of _Laravel Template_, you need to make sure all of your changes meet defined standards and static analysis is not reporting any issues. To see the reporting result within your local development environment, the following commands might come handy:

#### Linting

- Run code linting (with [Laravel Pint](https://laravel.com/docs/10.x/pint))

```shell
sail bin pint
```

- Run code linting tests

```shell
sail bin pint:test
```

#### Static analyser

- Run static analysis (with [PHPStan](https://phpstan.org/))

```shell
sail bin phpstan analyse
```

#### Tests

- Run unit tests

```shell
sail bin pest --testsuite=Unit
```

- Run feature tests

```shell
sail bin pest --testsuite=Feature
```

- Run available tests (includes coverage)

```shell
sail bin pest --coverage
```

#### IDE Helpers

- Automatic PHPDoc generation for Laravel Facades

```shell
vendor/bin/sail artisan ide-helper:generate
```

- Automatic PHPDocs for models

```shell
vendor/bin/sail artisan ide-helper:models -M
```

- PhpStorm Meta for Container instances

```shell
vendor/bin/sail artisan ide-helper:meta
```

_**Note**: IDE helper commands are configured to run automatically whenever required. You may not require running them manually._

#### Laravel Sail usage

If your development environment is configured with Laravel Sail, replace `php artisan` with `vendor/bin/sail artisan`.

### Supporting Links

- [Laravel](https://laravel.com/docs/10.x)
- [Laravel Sail](https://laravel.com/docs/10.x/sail)
- [Laravel Telescope](https://laravel.com/docs/10.x/telescope)
- [Laravel Pint](https://laravel.com/docs/10.x/pint)
- [Docker](https://docker.com)
- [XDebug](https://xdebug.org/)
- [PestPHP](https://pestphp.com/docs)
- [PHPStan](https://phpstan.org/)
- [Larastan](https://github.com/nunomaduro/larastan)
- [PSR-12](https://www.php-fig.org/psr/psr-12/)
- [Laravel IDE Helper](https://github.com/barryvdh/laravel-ide-helper)
- [Mailpit](https://github.com/axllent/mailpit)
