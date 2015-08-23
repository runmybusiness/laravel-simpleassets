<?php

namespace RunMyBusiness\Assets\tests;

use PHPUnit_Framework_TestCase;
use RunMyBusiness\Assets\SimpleAssets;

require_once dirname(__DIR__).'/src/RunMyBusiness/Assets/Simpleassets.php';

class SimpleassetsTest extends PHPUnit_Framework_TestCase
{
    public function testSimpleGeneration()
    {
        $options = [
            'enable' => true,
            'hash'   => '5a7319578bf4d83d08f3be1d8913f6ab',
            'prefix' => '',
            'cdn'    => '',
        ];
        $path = '/styles/styles.css';
        $expected = "{$path}?{$options['hash']}";
        $cachebuster = new Simpleassets($options);
        $this->assertEquals($expected, $cachebuster->url($path));
    }

    public function testprefixed()
    {
        $options = [
            'enable' => true,
            'hash'   => '5a7319578bf4d83d08f3be1d8913f6ab',
            'prefix' => 'assets',
            'cdn'    => '',
        ];
        $path = '/styles/styles.css';
        $expected = "/{$options['prefix']}{$path}?{$options['hash']}";
        $cachebuster = new Simpleassets($options);
        $this->assertEquals($expected, $cachebuster->url($path));
    }

    public function testCdn()
    {
        $options = [
            'enable' => true,
            'hash'   => '5a7319578bf4d83d08f3be1d8913f6ab',
            'prefix' => '',
            'cdn'    => 'http://cdn.static.com',
        ];
        $path = '/styles/styles.css';
        $expected = "{$options['cdn']}{$path}?{$options['hash']}";
        $cachebuster = new Simpleassets($options);
        $this->assertEquals($expected, $cachebuster->url($path));
    }

    public function testprefixedCdn()
    {
        $options = [
            'enable' => true,
            'hash'   => '5a7319578bf4d83d08f3be1d8913f6ab',
            'prefix' => 'assets',
            'cdn'    => 'http://cdn.static.com',
        ];
        $path = '/styles/styles.css';
        $expected = "{$options['cdn']}/{$options['prefix']}{$path}?{$options['hash']}";
        $cachebuster = new Simpleassets($options);
        $this->assertEquals($expected, $cachebuster->url($path));
    }

    public function testDisabled()
    {
        $options = [
            'enable' => false,
            'hash'   => '5a7319578bf4d83d08f3be1d8913f6ab',
            'prefix' => 'assets',
            'cdn'    => 'http://cdn.static.com',
        ];
        $path = '/styles/styles.css';
        $expected = "{$options['cdn']}{$path}";
        $cachebuster = new Simpleassets($options);
        $this->assertEquals($expected, $cachebuster->url($path));
    }

    public function getGenerateHash()
    {
        $hash = Simpleassets::generateHash();
        $this->assertEquals(32, strlen($hash));
    }

    public function getGenerateHashWithInput()
    {
        $hash = Simpleassets::generateHash('test-input');
        $this->assertEquals(32, strlen($hash));

        $this->assertEquals('b5f7f2b3e491718deb69195be3284b1b', $hash);
    }
}
