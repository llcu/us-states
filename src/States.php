<?php

declare(strict_types=1);

namespace LLCU\UsStates;

/**
 * US States data provider with static method access.
 *
 * @package LLCU\UsStates
 */
final class States
{
    /**
     * All US states with abbreviation as key and full name as value.
     *
     * @var array<string, string>
     */
    private const STATES = [
        'AL' => 'Alabama',
        'AK' => 'Alaska',
        'AZ' => 'Arizona',
        'AR' => 'Arkansas',
        'CA' => 'California',
        'CO' => 'Colorado',
        'CT' => 'Connecticut',
        'DE' => 'Delaware',
        'FL' => 'Florida',
        'GA' => 'Georgia',
        'HI' => 'Hawaii',
        'ID' => 'Idaho',
        'IL' => 'Illinois',
        'IN' => 'Indiana',
        'IA' => 'Iowa',
        'KS' => 'Kansas',
        'KY' => 'Kentucky',
        'LA' => 'Louisiana',
        'ME' => 'Maine',
        'MD' => 'Maryland',
        'MA' => 'Massachusetts',
        'MI' => 'Michigan',
        'MN' => 'Minnesota',
        'MS' => 'Mississippi',
        'MO' => 'Missouri',
        'MT' => 'Montana',
        'NE' => 'Nebraska',
        'NV' => 'Nevada',
        'NH' => 'New Hampshire',
        'NJ' => 'New Jersey',
        'NM' => 'New Mexico',
        'NY' => 'New York',
        'NC' => 'North Carolina',
        'ND' => 'North Dakota',
        'OH' => 'Ohio',
        'OK' => 'Oklahoma',
        'OR' => 'Oregon',
        'PA' => 'Pennsylvania',
        'RI' => 'Rhode Island',
        'SC' => 'South Carolina',
        'SD' => 'South Dakota',
        'TN' => 'Tennessee',
        'TX' => 'Texas',
        'UT' => 'Utah',
        'VT' => 'Vermont',
        'VA' => 'Virginia',
        'WA' => 'Washington',
        'WV' => 'West Virginia',
        'WI' => 'Wisconsin',
        'WY' => 'Wyoming',
    ];

    /**
     * US territories.
     *
     * @var array<string, string>
     */
    private const TERRITORIES = [
        'AS' => 'American Samoa',
        'DC' => 'District of Columbia',
        'GU' => 'Guam',
        'MP' => 'Northern Mariana Islands',
        'PR' => 'Puerto Rico',
        'VI' => 'U.S. Virgin Islands',
    ];

    /**
     * Prevent instantiation.
     */
    private function __construct()
    {
    }

    /**
     * Get all US states.
     *
     * @return array<string, string> Abbreviation => Name pairs.
     */
    public static function all(): array
    {
        return self::STATES;
    }

    /**
     * Get all US states including territories.
     *
     * @return array<string, string> Abbreviation => Name pairs.
     */
    public static function allWithTerritories(): array
    {
        return array_merge(self::STATES, self::TERRITORIES);
    }

    /**
     * Get only US territories.
     *
     * @return array<string, string> Abbreviation => Name pairs.
     */
    public static function territories(): array
    {
        return self::TERRITORIES;
    }

    /**
     * Get state name by abbreviation.
     *
     * @param string $abbreviation Two-letter state abbreviation.
     * @return string|null State name or null if not found.
     */
    public static function getName(string $abbreviation): ?string
    {
        $abbreviation = strtoupper(trim($abbreviation));

        if (isset(self::STATES[$abbreviation])) {
            return self::STATES[$abbreviation];
        }

        if (isset(self::TERRITORIES[$abbreviation])) {
            return self::TERRITORIES[$abbreviation];
        }

        return null;
    }

    /**
     * Get state abbreviation by name.
     *
     * @param string $name Full state name.
     * @return string|null State abbreviation or null if not found.
     */
    public static function getAbbreviation(string $name): ?string
    {
        $name      = trim($name);
        $allStates = self::allWithTerritories();
        $flipped   = array_flip(array_map('strtolower', $allStates));
        $key       = strtolower($name);

        if (! isset($flipped[$key])) {
            return null;
        }

        return $flipped[$key];
    }

    /**
     * Check if abbreviation is a valid US state.
     *
     * @param string $abbreviation Two-letter state abbreviation.
     * @return bool True if valid state abbreviation.
     */
    public static function isValidState(string $abbreviation): bool
    {
        return isset(self::STATES[strtoupper(trim($abbreviation))]);
    }

    /**
     * Check if abbreviation is a valid US territory.
     *
     * @param string $abbreviation Two-letter territory abbreviation.
     * @return bool True if valid territory abbreviation.
     */
    public static function isValidTerritory(string $abbreviation): bool
    {
        return isset(self::TERRITORIES[strtoupper(trim($abbreviation))]);
    }

    /**
     * Check if abbreviation is a valid US state or territory.
     *
     * @param string $abbreviation Two-letter abbreviation.
     * @return bool True if valid state or territory abbreviation.
     */
    public static function isValid(string $abbreviation): bool
    {
        $abbreviation = strtoupper(trim($abbreviation));

        return isset(self::STATES[$abbreviation]) || isset(self::TERRITORIES[$abbreviation]);
    }

    /**
     * Get all state abbreviations.
     *
     * @return array<int, string> List of state abbreviations.
     */
    public static function abbreviations(): array
    {
        return array_keys(self::STATES);
    }

    /**
     * Get all state names.
     *
     * @return array<int, string> List of state names.
     */
    public static function names(): array
    {
        return array_values(self::STATES);
    }

    /**
     * Get the total count of US states.
     *
     * @return int Number of states.
     */
    public static function count(): int
    {
        return count(self::STATES);
    }

    /**
     * Search states by partial name match.
     *
     * @param string $query Search query.
     * @return array<string, string> Matching states (abbreviation => name).
     */
    public static function search(string $query): array
    {
        $query = strtolower(trim($query));

        if ($query === '') {
            return [];
        }

        return array_filter( self::allWithTerritories(), function ( $name ) use ( $query ) {
            return str_contains( strtolower( $name ), $query );
        } );
    }

    /**
     * Get states as options array for HTML select elements.
     *
     * @param bool $includeTerritories Include US territories.
     * @param string $placeholder Optional placeholder text.
     * @return array<string, string> Options array.
     */
    public static function asSelectOptions(bool $includeTerritories = false, string $placeholder = ''): array
    {
        $options = [];

        if ($placeholder !== '') {
            $options[''] = $placeholder;
        }

        $states = $includeTerritories ? self::allWithTerritories() : self::all();

        foreach ($states as $abbreviation => $name) {
            $options[$abbreviation] = $name;
        }

        return $options;
    }

    /**
     * Get a random state.
     *
     * @return array{abbreviation: string, name: string} Random state data.
     */
    public static function random(): array
    {
        $abbreviation = array_rand(self::STATES);

        return [
            'abbreviation' => $abbreviation,
            'name'         => self::STATES[$abbreviation],
        ];
    }
}
