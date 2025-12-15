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

// Get states including territories
$all = States::allWithTerritories();

// Get only territories
$territories = States::territories();
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

// Check if valid territory
States::isValidTerritory('DC');  // true
States::isValidTerritory('CA');  // false

// Check if valid state OR territory
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

// Including territories
$options = States::asSelectOptions(true, 'Select...');
```

### Random State

```php
$random = States::random();
// ['abbreviation' => 'CA', 'name' => 'California']
```

## API Reference

| Method | Parameters | Returns | Description |
|--------|------------|---------|-------------|
| `all()` | - | `array<string, string>` | All 50 US states |
| `allWithTerritories()` | - | `array<string, string>` | States + territories |
| `territories()` | - | `array<string, string>` | Only territories |
| `getName()` | `string $abbreviation` | `?string` | Get name by abbreviation |
| `getAbbreviation()` | `string $name` | `?string` | Get abbreviation by name |
| `isValidState()` | `string $abbreviation` | `bool` | Validate state abbreviation |
| `isValidTerritory()` | `string $abbreviation` | `bool` | Validate territory abbreviation |
| `isValid()` | `string $abbreviation` | `bool` | Validate any abbreviation |
| `abbreviations()` | - | `array<int, string>` | List of all abbreviations |
| `names()` | - | `array<int, string>` | List of all names |
| `count()` | - | `int` | Number of states (50) |
| `search()` | `string $query` | `array<string, string>` | Search by partial name |
| `asSelectOptions()` | `bool $includeTerritories`, `string $placeholder` | `array<string, string>` | HTML select options |
| `random()` | - | `array{abbreviation: string, name: string}` | Random state |

## Testing

This project uses [Pest](https://pestphp.com/) for testing.
