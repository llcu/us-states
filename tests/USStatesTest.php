<?php

declare(strict_types=1);

use LLCU\UsStates\States;

test('it returns all fifty states', function () {
    $states = States::all();

    expect($states)
        ->toHaveCount(50)
        ->toHaveKey('CA')
        ->toHaveKey('NY')
        ->toHaveKey('TX');
});

test('it gets state name by abbreviation', function (string $abbreviation, string $expectedName) {
    expect(States::getName($abbreviation))->toBe($expectedName);
})->with([
    ['CA', 'California'],
    ['ca', 'California'],
    ['NY', 'New York'],
    ['TX', 'Texas'],
]);

test('it returns null for invalid abbreviation', function () {
    expect( States::getName( 'XX' ) )->toBeNull()->and( States::getName( '' ) )->toBeNull();
});

test('it gets abbreviation by name', function (string $name, string $expectedAbbreviation) {
    expect(States::getAbbreviation($name))->toBe($expectedAbbreviation);
})->with([
    ['California', 'CA'],
    ['california', 'CA'],
    ['New York', 'NY'],
    ['Texas', 'TX'],
]);

test('it returns null for invalid name', function () {
    expect( States::getAbbreviation( 'Invalid State' ) )->toBeNull()
                                                        ->and( States::getAbbreviation( '' ) )->toBeNull();
});

test('it validates state abbreviation', function () {
    expect( States::isValidState( 'CA' ) )->toBeTrue()
                                          ->and( States::isValidState( 'ca' ) )->toBeTrue()
                                          ->and( States::isValidState( 'XX' ) )->toBeFalse();
});

test('it validates any abbreviation', function () {
    expect( States::isValid( 'CA' ) )->toBeTrue()
                                     ->and( States::isValid( 'XX' ) )->toBeFalse();
});

test('it returns all abbreviations', function () {
    $abbreviations = States::abbreviations();

    expect($abbreviations)
        ->toHaveCount(50)
        ->toContain('CA')
        ->toContain('NY');
});

test('it returns all names', function () {
    $names = States::names();

    expect($names)
        ->toHaveCount(50)
        ->toContain('California')
        ->toContain('New York');
});

test('it returns correct count', function () {
    expect(States::count())->toBe(50);
});

test('it searches states by partial name', function () {
    $results = States::search('new');

    expect($results)
        ->toHaveKey('NH')
        ->toHaveKey('NJ')
        ->toHaveKey('NM')
        ->toHaveKey('NY');
});

test('it returns empty array for empty search', function () {
    expect( States::search( '' ) )->toBe( [] )
                                  ->and( States::search( '   ' ) )->toBe( [] );
});

test('it returns select options with placeholder', function () {
    $options = States::asSelectOptions('Select a state...');

    expect($options)
        ->toHaveKey('')
        ->and($options[''])->toBe('Select a state...');
});

test('it returns random state', function () {
    $random = States::random();

    expect($random)
        ->toHaveKey('abbreviation')
        ->toHaveKey('name')
        ->and(States::isValidState($random['abbreviation']))->toBeTrue();
});
