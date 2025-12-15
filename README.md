# LLCU - US States

A PHP package providing US states data with static method access.

## Requirements

- PHP 8.3 or higher

## Installation

```bash
composer require llcu/us-states
```

## Usage

All methods are static, so no instantiation is required.

### Get All States

```php
use LLCU\UsStates\States;

// Get all 50 US states (abbreviation => name)
$states = States::all();
// ['AL' => 'Alabama', 'AK' => 'Alaska', ...]
```

### Lookup Methods

```php
// Get state name by abbreviation
$name = States::getName('CA');
// 'California'

// Get abbreviation by state name
$abbr = States::getAbbreviation('California');
// 'CA'
```

### Validation

```php
// Check if valid state
States::isValidState('CA');      // true
States::isValidState('DC');      // false (DC is a territory)

// Check if valid state
States::isValid('CA');           // true
States::isValid('DC');           // true
States::isValid('XX');           // false
```

### Lists

```php
// Get all abbreviations
$abbreviations = States::abbreviations();
// ['AL', 'AK', 'AZ', ...]

// Get all names
$names = States::names();
// ['Alabama', 'Alaska', 'Arizona', ...]

// Get count
$count = States::count();
// 50
```

### Search

```php
// Search states by partial name
$results = States::search('new');
// ['NH' => 'New Hampshire', 'NJ' => 'New Jersey', 'NM' => 'New Mexico', 'NY' => 'New York']
```

### HTML Select Options

```php
// Basic options
$options = States::asSelectOptions();

// With placeholder
$options = States::asSelectOptions(false, 'Select a state...');
// ['' => 'Select a state...', 'AL' => 'Alabama', ...]
```

### Random State

```php
$random = States::random();
// ['abbreviation' => 'CA', 'name' => 'California']
```

## Testing

This project uses [Pest](https://pestphp.com/) for testing.
