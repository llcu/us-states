<?php

namespace Llcu\USStatesList;

class USStates
{
    /**
     * Get US states list with state prefix as key and state name as value
     *
     * @param array $overrides Array of states to override the default list
     * @return array
     */
    public static function getStates(array $overrides = []): array
    {
        $states = [
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
            'WY' => 'Wyoming'
        ];

        return array_merge($states, $overrides);
    }

    /**
     * Get only the state names
     *
     * @param array $overrides Array of states to override the default list
     * @return array
     */
    public static function getStateNames(array $overrides = []): array
    {
        return array_values(self::getStates($overrides));
    }

    /**
     * Get only the state prefixes
     *
     * @param array $overrides Array of states to override the default list
     * @return array
     */
    public static function getStatePrefixes(array $overrides = []): array
    {
        return array_keys(self::getStates($overrides));
    }
}
