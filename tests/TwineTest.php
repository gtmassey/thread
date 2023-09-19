<?php

namespace Gtmassey\Twine\Tests;

use Gtmassey\Twine\Twine;
use PHPUnit\Framework\TestCase;

class TwineTest extends TestCase
{
    public function testConstructor()
    {
        $twine = new Twine('Hello, world!');
        $this->assertEquals('Hello, world!', $twine->toString());

        $twine = new Twine();
        $this->assertEquals('', $twine->toString());
    }

    public function testContains()
    {
        $twine = new Twine('Hello, world!');
        $this->assertTrue($twine->contains('Hello'));
        $this->assertTrue($twine->contains('world'));
        $this->assertFalse($twine->contains('Universe'));
    }

    public function testContainsAll()
    {
        $twine = new Twine('Hello, world!');
        $this->assertTrue($twine->containsAll(['Hello', 'world']));
        $this->assertFalse($twine->containsAll(['Hello', 'Universe']));
    }

    public function testContainsAny()
    {
        $twine = new Twine('Hello, world!');
        $this->assertTrue($twine->containsAny(['Hello', 'Universe']));
        $this->assertFalse($twine->containsAny(['Universe', 'World']));
    }

    public function testContainsNone()
    {
        $twine = new Twine('Hello, world!');
        $this->assertTrue($twine->containsNone(['Universe', 'World']));
        $this->assertFalse($twine->containsNone(['Hello', 'Universe']));
    }

    public function testLength()
    {
        $twine = new Twine('Hello, world!');
        $this->assertEquals(13, $twine->length());
    }

    public function testSplitWords()
    {
        $twine = new Twine('Hello, world!');
        $this->assertEquals(['Hello,', 'world!'], $twine->splitWords());
    }

    public function testSplitUppercase()
    {
        $twine = new Twine('HelloWorld');
        $this->assertEquals(['Hello', 'World'], $twine->splitUppercase());
        $twine = new Twine('Hello World');
        $this->assertEquals(['Hello ', 'World'], $twine->splitUppercase());
        $twine = new Twine('Helloworld');
        $this->assertEquals(['Helloworld'], $twine->splitUppercase());
    }

    public function testToString()
    {
        $twine = new Twine('Hello, world!');
        $this->assertEquals('Hello, world!', $twine->toString());
    }
}
