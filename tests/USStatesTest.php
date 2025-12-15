<?php

namespace Llcu\USStatesList\Tests;

use Llcu\USStatesList\USStates;
use PHPUnit\Framework\TestCase;

class USStatesTest extends TestCase
{
    public function testGetStatesReturnsAllStates()
    {
        $states = USStates::getStates();
        
        $this->assertIsArray($states);
        $this->assertCount(50, $states);
        $this->assertArrayHasKey('AL', $states);
        $this->assertEquals('Alabama', $states['AL']);
        $this->assertArrayHasKey('WY', $states);
        $this->assertEquals('Wyoming', $states['WY']);
    }

    public function testGetStatesWithOverrides()
    {
        $overrides = [
            'AL' => 'Custom Alabama',
            'XX' => 'Custom State'
        ];
        
        $states = USStates::getStates($overrides);
        
        $this->assertCount(51, $states);
        $this->assertEquals('Custom Alabama', $states['AL']);
        $this->assertEquals('Custom State', $states['XX']);
        $this->assertEquals('California', $states['CA']);
    }

    public function testGetStateNamesReturnsOnlyNames()
    {
        $names = USStates::getStateNames();
        
        $this->assertIsArray($names);
        $this->assertCount(50, $names);
        $this->assertContains('Alabama', $names);
        $this->assertContains('Wyoming', $names);
        $this->assertNotContains('AL', $names);
        $this->assertNotContains('WY', $names);
    }

    public function testGetStateNamesWithOverrides()
    {
        $overrides = [
            'AL' => 'Custom Alabama',
            'XX' => 'Custom State'
        ];
        
        $names = USStates::getStateNames($overrides);
        
        $this->assertCount(51, $names);
        $this->assertContains('Custom Alabama', $names);
        $this->assertContains('Custom State', $names);
    }

    public function testGetStatePrefixesReturnsOnlyPrefixes()
    {
        $prefixes = USStates::getStatePrefixes();
        
        $this->assertIsArray($prefixes);
        $this->assertCount(50, $prefixes);
        $this->assertContains('AL', $prefixes);
        $this->assertContains('WY', $prefixes);
        $this->assertNotContains('Alabama', $prefixes);
        $this->assertNotContains('Wyoming', $prefixes);
    }

    public function testGetStatePrefixesWithOverrides()
    {
        $overrides = [
            'XX' => 'Custom State'
        ];
        
        $prefixes = USStates::getStatePrefixes($overrides);
        
        $this->assertCount(51, $prefixes);
        $this->assertContains('AL', $prefixes);
        $this->assertContains('XX', $prefixes);
    }

    public function testAllMethodsAreStatic()
    {
        $reflection = new \ReflectionClass(USStates::class);
        
        $this->assertTrue($reflection->getMethod('getStates')->isStatic());
        $this->assertTrue($reflection->getMethod('getStateNames')->isStatic());
        $this->assertTrue($reflection->getMethod('getStatePrefixes')->isStatic());
    }
}
