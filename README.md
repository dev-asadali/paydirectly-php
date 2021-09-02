<p align="center">
 
</p>

# Paydirectly SDK for PHP

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
