<?php

namespace Gtmassey\Twine\Tests;

use Gtmassey\Twine\Twine;
use PHPUnit\Framework\TestCase;

class StringableTraitTest extends TestCase
{
    public function testAppend()
    {
        $string = new Twine('Hello World');

        $this->assertEquals('Hello World', $string->toString());
        $this->assertEquals('Hello World!', $string->append('!')->toString());
    }

    public function testCompress()
    {
        $string = new Twine('    Hello    World    ');

        $this->assertEquals('Hello World', $string->compress()->toString());
    }

    public function testCompressBetween()
    {
        $string = new Twine('    Hello    World    ');

        $this->assertEquals('    Hello World    ', $string->compressBetween()->toString());
    }

    public function testCompressEnd()
    {
        $string = new Twine('    Hello    World    ');

        $this->assertEquals('    Hello    World', $string->compressEnd()->toString());
    }

    public function testCompressStart()
    {
        $string = new Twine('    Hello    World    ');

        $this->assertEquals('Hello    World    ', $string->compressStart()->toString());
    }

    public function testDecodeHTML()
    {
        $string = new Twine('&lt;h1&gt;Hello World&lt;/h1&gt;');

        $this->assertEquals('<h1>Hello World</h1>', $string->decodeHTML()->toString());
    }

    public function testEncodeHTML()
    {
        $string = new Twine('<h1>Hello World</h1>');

        $this->assertEquals('&lt;h1&gt;Hello World&lt;/h1&gt;', $string->encodeHTML()->toString());
    }

    public function testLcFirst()
    {
        $string = new Twine('HELLO');

        $this->assertEquals('hELLO', $string->lcFirst()->toString());
    }

    public function testLcLast()
    {
        $string = new Twine('HELLO');

        $this->assertEquals('HELLo', $string->lcLast()->toString());
    }

    public function testPadBothEnds()
    {
        $string = new Twine('AA');

        $this->assertEquals('+=+=+=AA+=+=+=', $string->padBothEnds(14, '+=')->toString());

        $string = new Twine('A');
        $this->assertEquals('BAB', $string->padBothEnds(3, 'B')->toString());
    }

    public function testPadEnd()
    {
        $string = new Twine('AA');
        $this->assertEquals('AAB', $string->padEnd(3, 'B')->toString());

        $string = new Twine('AA');
        $this->assertEquals('AABB', $string->padEnd(4, 'B')->toString());
    }

    public function testPadStart()
    {
        $string = new Twine('AA');
        $this->assertEquals('BAA', $string->padStart(3, 'B')->toString());

        $string = new Twine('AA');
        $this->assertEquals('BBAA', $string->padStart(4, 'B')->toString());
    }

    public function testPrepend()
    {
        $string = new Twine('World');

        $this->assertEquals('Hello World', $string->prepend('Hello ')->toString());
    }

    public function testRepeat()
    {
        $string = new Twine('Hello');

        $this->assertEquals('HelloHelloHello', $string->repeat(3)->toString());

        $string = new Twine('Hello');

        $this->assertEquals('Hello! Hello! Hello! ', $string->repeat(3, '! ')->toString());
    }

    public function testReplace()
    {
        $string = new Twine('Hello World');

        $this->assertEquals('Hello Universe', $string->replace('World', 'Universe')->toString());
    }

    public function testReverse()
    {
        $string = new Twine('Hello World');

        $this->assertEquals('dlroW olleH', $string->reverse()->toString());
    }
}
