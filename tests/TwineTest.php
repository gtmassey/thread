<?php

namespace Gtmassey\Twine\Tests;

use Gtmassey\Twine\Twine;
use PHPUnit\Framework\TestCase;

class TwineTest extends TestCase
{
    public function testConstructor(): void
    {
        $twine = new Twine('Hello, world!');
        $this->assertEquals('Hello, world!', $twine->toString());

        $twine = new Twine();
        $this->assertEquals('', $twine->toString());
    }

    public function testContains(): void
    {
        $twine = new Twine('Hello, world!');
        $this->assertTrue($twine->contains('Hello'));

        $this->assertFalse($twine->contains('Universe'));

        $this->assertFalse($twine->contains('hello'));
    }

    public function testContainsAll(): void
    {
        $twine = new Twine('Hello, world!');
        $this->assertTrue($twine->containsAll(['Hello', 'world']));

        $this->assertFalse($twine->containsAll(['Hello', 'Universe']));

        $this->assertFalse($twine->containsAll(['hello', 'world']));
    }

    public function testContainsAny(): void
    {
        $twine = new Twine('Hello, world!');
        $this->assertTrue($twine->containsAny(['Hello', 'Universe']));

        $this->assertFalse($twine->containsAny(['hello', 'universe']));

        $this->assertFalse($twine->containsAny(['foo', 'bar']));

        $this->assertTrue($twine->containsAny(['foo', 'bar', 'Hello']));
    }

    public function testContainsNone(): void
    {
        $twine = new Twine('Hello, world!');
        $this->assertTrue($twine->containsNone(['foo', 'bar']));

        $this->assertFalse($twine->containsNone(['Hello', 'Universe']));

        $this->assertTrue($twine->containsNone(['hello', 'universe']));

        $this->assertFalse($twine->containsNone(['foo', 'bar', 'Hello']));
    }

    public function testCountAlpha(): void
    {
        $twine = new Twine('abc');
        $this->assertEquals(3, $twine->countAlpha());
        $twine = new Twine('123');
        $this->assertEquals(0, $twine->countAlpha());
    }

    public function testCountAlphaNumeric(): void
    {
        $twine = new Twine('abc123');
        $this->assertEquals(6, $twine->countAlphaNumeric());
        $twine = new Twine('!@#$%^&*()');
        $this->assertEquals(0, $twine->countAlphaNumeric());
    }

    public function testCountInstancesOf(): void
    {
        $twine = new Twine('a b c a b c a b c');
        $this->assertEquals(9, $twine->countInstancesOf(['a', 'b', 'c']));
        $this->assertEquals(0, $twine->countInstancesOf(['d', 'e', 'f']));
    }

    public function testCountSubstring(): void
    {
        $twine = new Twine('Hello, world!');
        $this->assertEquals(1, $twine->countSubstring('Hello'));

        $this->assertEquals(0, $twine->countSubstring('Universe'));

        $this->assertEquals(0, $twine->countSubstring('hello'));
    }

    public function testToArray(): void
    {
        $twine = new Twine('abc 123');
        $this->assertEquals(['a', 'b', 'c', ' ', '1', '2', '3'], $twine->toArray());
        $this->assertEquals(['abc', '123'], $twine->toArray(splitOnWords: true));
    }

    public function testToString(): void
    {
        $twine = new Twine('Hello, world!');
        $this->assertEquals('Hello, world!', $twine->toString());
    }
}
