<?php

namespace Gtmassey\Thread\Tests;

use Gtmassey\Thread\Thread;
use PHPUnit\Framework\TestCase;

class ThreadTest extends TestCase
{
    public function testConstructor(): void
    {
        $twine = new Thread('Hello, world!');
        $this->assertEquals('Hello, world!', $twine->toString());

        $twine = new Thread();
        $this->assertEquals('', $twine->toString());
    }

    public function testContains(): void
    {
        $twine = new Thread('Hello, world!');
        $this->assertTrue($twine->contains('Hello'));

        $this->assertFalse($twine->contains('Universe'));

        $this->assertFalse($twine->contains('hello'));
    }

    public function testContainsAll(): void
    {
        $twine = new Thread('Hello, world!');
        $this->assertTrue($twine->containsAll(['Hello', 'world']));

        $this->assertFalse($twine->containsAll(['Hello', 'Universe']));

        $this->assertFalse($twine->containsAll(['hello', 'world']));
    }

    public function testContainsAny(): void
    {
        $twine = new Thread('Hello, world!');
        $this->assertTrue($twine->containsAny(['Hello', 'Universe']));

        $this->assertFalse($twine->containsAny(['hello', 'universe']));

        $this->assertFalse($twine->containsAny(['foo', 'bar']));

        $this->assertTrue($twine->containsAny(['foo', 'bar', 'Hello']));
    }

    public function testContainsNone(): void
    {
        $twine = new Thread('Hello, world!');
        $this->assertTrue($twine->containsNone(['foo', 'bar']));

        $this->assertFalse($twine->containsNone(['Hello', 'Universe']));

        $this->assertTrue($twine->containsNone(['hello', 'universe']));

        $this->assertFalse($twine->containsNone(['foo', 'bar', 'Hello']));
    }

    public function testCountAlpha(): void
    {
        $twine = new Thread('abc');
        $this->assertEquals(3, $twine->countAlpha());
        $twine = new Thread('123');
        $this->assertEquals(0, $twine->countAlpha());
    }

    public function testCountAlphaNumeric(): void
    {
        $twine = new Thread('abc123');
        $this->assertEquals(6, $twine->countAlphaNumeric());
        $twine = new Thread('!@#$%^&*()');
        $this->assertEquals(0, $twine->countAlphaNumeric());
    }

    public function testCountInstancesOf(): void
    {
        $twine = new Thread('a b c a b c a b c');
        $this->assertEquals(9, $twine->countInstancesOf(['a', 'b', 'c']));
        $this->assertEquals(0, $twine->countInstancesOf(['d', 'e', 'f']));
    }

    public function testCountSubstring(): void
    {
        $twine = new Thread('Hello, world!');
        $this->assertEquals(1, $twine->countSubstring('Hello'));

        $this->assertEquals(0, $twine->countSubstring('Universe'));

        $this->assertEquals(0, $twine->countSubstring('hello'));
    }

    public function testToArray(): void
    {
        $twine = new Thread('abc 123');
        $this->assertEquals(['a', 'b', 'c', ' ', '1', '2', '3'], $twine->toArray());
        $this->assertEquals(['abc', '123'], $twine->toArray(splitOnWords: true));
    }

    public function testToString(): void
    {
        $twine = new Thread('Hello, world!');
        $this->assertEquals('Hello, world!', $twine->toString());
    }
}
