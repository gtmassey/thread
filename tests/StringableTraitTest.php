<?php

namespace Gtmassey\Twine\Tests;

use Gtmassey\Twine\Twine;
use PHPUnit\Framework\TestCase;

class StringableTraitTest extends TestCase
{
    public function testAppend(): void
    {
        $string = new Twine('Hello World');

        $this->assertEquals('Hello World', $string->toString());
        $this->assertEquals('Hello World!', $string->append('!')->toString());
    }

    public function testCompress(): void
    {
        $string = new Twine('    Hello    World    ');

        $this->assertEquals('Hello World', $string->compress()->toString());
    }

    public function testCompressBetween(): void
    {
        $string = new Twine('    Hello    World    ');

        $this->assertEquals('    Hello World    ', $string->compressBetween()->toString());
    }

    public function testCompressEnd(): void
    {
        $string = new Twine('    Hello    World    ');

        $this->assertEquals('    Hello    World', $string->compressEnd()->toString());
    }

    public function testCompressStart(): void
    {
        $string = new Twine('    Hello    World    ');

        $this->assertEquals('Hello    World    ', $string->compressStart()->toString());
    }

    public function testDecodeHTML(): void
    {
        $string = new Twine('&lt;h1&gt;Hello World&lt;/h1&gt;');

        $this->assertEquals('<h1>Hello World</h1>', $string->decodeHTML()->toString());
    }

    public function testEncodeHTML(): void
    {
        $string = new Twine('<h1>Hello World</h1>');

        $this->assertEquals('&lt;h1&gt;Hello World&lt;/h1&gt;', $string->encodeHTML()->toString());
    }

    public function testLcFirst(): void
    {
        $string = new Twine('HELLO');

        $this->assertEquals('hELLO', $string->lcFirst()->toString());
    }

    public function testLcLast(): void
    {
        $string = new Twine('HELLO');

        $this->assertEquals('HELLo', $string->lcLast()->toString());
    }

    public function testPadBothEnds(): void
    {
        $string = new Twine('AA');

        $this->assertEquals('+=+=+=AA+=+=+=', $string->padBothEnds(14, '+=')->toString());

        $string = new Twine('A');
        $this->assertEquals('BAB', $string->padBothEnds(3, 'B')->toString());
    }

    public function testPadEnd(): void
    {
        $string = new Twine('AA');
        $this->assertEquals('AAB', $string->padEnd(3, 'B')->toString());

        $string = new Twine('AA');
        $this->assertEquals('AABB', $string->padEnd(4, 'B')->toString());
    }

    public function testPadStart(): void
    {
        $string = new Twine('AA');
        $this->assertEquals('BAA', $string->padStart(3, 'B')->toString());

        $string = new Twine('AA');
        $this->assertEquals('BBAA', $string->padStart(4, 'B')->toString());
    }

    public function testPrepend(): void
    {
        $string = new Twine('World');

        $this->assertEquals('Hello World', $string->prepend('Hello ')->toString());
    }

    public function testRepeat(): void
    {
        $string = new Twine('Hello');

        $this->assertEquals('HelloHelloHello', $string->repeat(3)->toString());

        $string = new Twine('Hello');

        $this->assertEquals('Hello! Hello! Hello! ', $string->repeat(3, '! ')->toString());
    }

    public function testReplace(): void
    {
        $string = new Twine('Hello World');

        $this->assertEquals('Hello Universe', $string->replace('World', 'Universe')->toString());
    }

    public function testReverse(): void
    {
        $string = new Twine('Hello World');

        $this->assertEquals('dlroW olleH', $string->reverse()->toString());
    }

    public function testStripSubstrings(): void
    {
        $string = new Twine('foo foobar foobaz foobar foobaz');

        $this->assertEquals('foo foo foo foo foo', $string->stripSubstrings(['bar', 'baz'])->toString());

        $string = new Twine('abc123');

        $this->assertEquals('bc23', $string->stripSubstrings(['a', '1'])->toString());
    }

    public function testStripSubstring(): void
    {
        $string = new Twine('Hello World');

        $this->assertEquals('Hello', $string->stripSubstring(' World')->toString());
    }

    public function testStripSubstringFromEnd(): void
    {
        $a = new Twine('abc123');
        $b = new Twine('Hello World');
        $c = new Twine('Hello World');

        $this->assertEquals('abc12', $a->stripSubstringFromEnd('3')->toString());
        $this->assertEquals('Hello Wrld', $b->stripSubstringFromEnd('o')->toString());
        $this->assertEquals('Hello World', $c->stripSubstringFromEnd('ll')->toString());
        $this->assertEquals('Hello World', $c->stripSubstringFromEnd('x')->toString());
    }

    public function testStripNonNumeric(): void
    {
        $string = new Twine('abc123!');
        $this->assertEquals('123', $string->stripNonNumeric()->toString());

        $string = new Twine('1111');
        $this->assertEquals('1111', $string->stripNonNumeric()->toString());
    }
}
