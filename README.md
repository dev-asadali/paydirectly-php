<p align="center">
  <a href="https://github.com/paydirectlyio/paydirectly-php/releases"><img src="https://img.shields.io/github/release/paydirectlyio/paydirectly-php.svg" alt="Latest Version" /></a> <a href="https://travis-ci.com/paydirectlyio/paydirectly-php"><img src="https://img.shields.io/travis/paydirectlyio/paydirectly-php.svg" alt="Build Status" /></a> <a href="https://scrutinizer-ci.com/g/paydirectlyio/paydirectly-php/"><img src="https://scrutinizer-ci.com/g/paydirectlyio/paydirectly-php/badges/quality-score.png?b=master" alt="Scrutinizer" /></a> <a href="https://scrutinizer-ci.com/g/paydirectlyio/paydirectly-php/"><img src="https://scrutinizer-ci.com/g/paydirectlyio/paydirectly-php/badges/coverage.png?b=master" alt="Coverage" /></a>
</p>

# paydirectly SDK for PHP

PHP library for [paydirectly](https://paydirectly.io) API.

## Installation

The recommended way to install *paydirectly-php* is through [Composer](https://getcomposer.org/):

```sh
composer require paydirectly/paydirectly-php
```

After installing, you need to require Composer's autoloader:

```php
require 'vendor/autoload.php';
```

## Quickstart

All configs are passed around as a single variable `config`:

```php
$paydirectly = new \paydirectly\paydirectly([
    'merchant_id' => 'id_ ...',
    'secret_key' => 'sk_live_ ...',
]);
```

## Documentation

Fantastic documentation is available at [https://php.paydirectly.io](https://php.paydirectly.io).
