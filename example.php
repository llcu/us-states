<?php

require_once __DIR__ . '/vendor/autoload.php';

use Llcu\USStatesList\USStates;

echo "=== US States List Example ===\n\n";

// Example 1: Get all states
echo "1. Get all states (showing first 5):\n";
$states = USStates::getStates();
$count = 0;
foreach ($states as $prefix => $name) {
    echo "   $prefix => $name\n";
    if (++$count >= 5) break;
}
echo "   ... (total: " . count($states) . " states)\n\n";

// Example 2: Get states with overrides
echo "2. Get states with overrides:\n";
$customStates = USStates::getStates([
    'AL' => 'Modified Alabama',
    'XX' => 'Custom State'
]);
echo "   AL => " . $customStates['AL'] . "\n";
echo "   XX => " . $customStates['XX'] . "\n";
echo "   Total states: " . count($customStates) . "\n\n";

// Example 3: Get state names only
echo "3. Get state names only (showing first 5):\n";
$names = USStates::getStateNames();
foreach (array_slice($names, 0, 5) as $name) {
    echo "   - $name\n";
}
echo "   ... (total: " . count($names) . " names)\n\n";

// Example 4: Get state prefixes only
echo "4. Get state prefixes only (showing first 10):\n";
$prefixes = USStates::getStatePrefixes();
echo "   " . implode(', ', array_slice($prefixes, 0, 10)) . "\n";
echo "   ... (total: " . count($prefixes) . " prefixes)\n\n";

// Example 5: Check if a specific state exists
echo "5. Check if California exists:\n";
$states = USStates::getStates();
if (isset($states['CA'])) {
    echo "   CA => " . $states['CA'] . " ✓\n\n";
}

echo "=== Examples completed successfully! ===\n";
