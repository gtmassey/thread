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
