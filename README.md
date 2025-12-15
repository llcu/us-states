# US States List

A PHP package that provides a convenient way to work with US states list using static methods.

## Installation

Install via Composer:

```bash
composer require llcu/us-states-list
```

## Usage

The package provides a `USStates` class with three static methods to work with US states data.

### Get All States

Returns an associative array with state prefixes as keys and state names as values:

```php
use Llcu\USStatesList\USStates;

$states = USStates::getStates();

// Returns:
// [
//     'AL' => 'Alabama',
//     'AK' => 'Alaska',
//     'AZ' => 'Arizona',
//     ...
// ]
```

### Get All States with Overrides

You can override or add custom states by passing an array:

```php
$overrides = [
    'AL' => 'Custom Alabama Name',
    'XX' => 'Custom State'
];

$states = USStates::getStates($overrides);

// 'AL' will have the custom name
// 'XX' will be added to the list
```

### Get State Names Only

Returns an indexed array containing only the state names:

```php
$names = USStates::getStateNames();

// Returns:
// ['Alabama', 'Alaska', 'Arizona', ...]
```

### Get State Prefixes Only

Returns an indexed array containing only the state prefixes:

```php
$prefixes = USStates::getStatePrefixes();

// Returns:
// ['AL', 'AK', 'AZ', ...]
```

### All Methods Support Overrides

All methods accept an optional `$overrides` parameter:

```php
// Override with custom values
$names = USStates::getStateNames(['AL' => 'Modified Alabama']);

// Add new entries
$prefixes = USStates::getStatePrefixes(['XX' => 'Custom State']);
```

## Features

- ✅ PHP 7.2+ compatible
- ✅ Uses proper PHP namespaces and classes
- ✅ All methods are static
- ✅ Supports overriding default states
- ✅ Three convenient methods for different use cases
- ✅ Fully tested with PHPUnit
- ✅ PSR-4 autoloading

## Testing

Run the test suite:

```bash
composer test
```

Or directly with PHPUnit:

```bash
./vendor/bin/phpunit
```

## License

MIT