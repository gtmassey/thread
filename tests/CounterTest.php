<?php

namespace Gtmassey\Thread\Tests;

use Gtmassey\Thread\Thread;
use PHPUnit\Framework\TestCase;

class CounterTest extends TestCase
{
    public function testCountAlpha(): void
    {
        $thread = new Thread('abc123');
        $this->assertEquals(3, $thread->countAlpha());

        $thread = new Thread('abc123!');
        $this->assertEquals(3, $thread->countAlpha());

        $thread = new Thread('!@#$%^&*()');
        $this->assertEquals(0, $thread->countAlpha());

        $thread = new Thread('123');
        $this->assertEquals(0, $thread->countAlpha());
    }

    public function testCountAlphaNumeric(): void
    {
        $thread = new Thread('abc123');
        $this->assertEquals(6, $thread->countAlphaNumeric());

        $thread = new Thread('abc123!');
        $this->assertEquals(6, $thread->countAlphaNumeric());

        $thread = new Thread('!@#$%^&*()');
        $this->assertEquals(0, $thread->countAlphaNumeric());
    }

    public function testCountNumeric(): void
    {
        $thread = new Thread('abc123');
        $this->assertEquals(3, $thread->countNumeric());
        $this->assertEquals(3, $thread->countNum());
        $this->assertEquals(3, $thread->countNumber());

        $thread = new Thread('abc123!');
        $this->assertEquals(3, $thread->countNumeric());

        $thread = new Thread('!@#$%^&*()');
        $this->assertEquals(0, $thread->countNumeric());

        $thread = new Thread('123');
        $this->assertEquals(3, $thread->countNumeric());
    }

    public function testCountSubstr(): void
    {
        $thread = new Thread('abc123abc123');
        $this->assertEquals(2, $thread->countInstancesOf('abc'));
        $this->assertEquals(2, $thread->countSubstrings('abc'));
        $this->assertEquals(2, $thread->countSubstr('abc'));
        $this->assertEquals(2, $thread->substrCount('abc'));
        $this->assertEquals(2, $thread->substringsCount('abc'));

        //arrays
        $thread = new Thread('abc123abc123');
        $this->assertEquals([
            'abc' => 2,
            '123' => 2,
        ], $thread->countInstancesOf(['abc', '123']));
    }

    public function testCharacterFrequency(): void
    {
        $thread = new Thread('aa bb cc dd ee');
        $this->assertEquals([
            'a' => 2,
            'b' => 2,
            'c' => 2,
            'd' => 2,
            'e' => 2,
            ' ' => 4,
        ], $thread->characterFrequency());
    }

    public function testCountLowercase(): void
    {
        $thread = new Thread('abc123');
        $this->assertEquals(3, $thread->countLowercase());
        $this->assertEquals(3, $thread->countLC());
        $this->assertEquals(3, $thread->countLower());

        $thread = new Thread('abc123!');
        $this->assertEquals(3, $thread->countLowercase());

        $thread = new Thread('!@#$%^&*()');
        $this->assertEquals(0, $thread->countLowercase());

        $thread = new Thread('123');
        $this->assertEquals(0, $thread->countLowercase());

        $thread = new Thread('ABC123');
        $this->assertEquals(0, $thread->countLowercase());
    }

    public function testCountLines(): void
    {
        $thread = new Thread("This is line 1.\nThis is line 2.\rThis is line 3.\r\nThis is line 4.");
        $this->assertEquals(4, $thread->countLines());
    }

    public function testCountSentences(): void
    {
        $thread = new Thread('This is sentence 1. This is sentence 2. This is sentence 3.');
        $this->assertEquals(3, $thread->countSentences());
    }

    public function testCountSpecial(): void
    {
        $thread = new Thread('abc123');
        $this->assertEquals(0, $thread->countSpecial());

        $thread = new Thread('abc123!');
        $this->assertEquals(1, $thread->countSpecial());

        $thread = new Thread('!@#$%^&*()');
        $this->assertEquals(10, $thread->countSpecial());

        $thread = new Thread('123');
        $this->assertEquals(0, $thread->countSpecial());
    }

    public function testCountUppecase(): void
    {
        $thread = new Thread('abc123');
        $this->assertEquals(0, $thread->countUppercase());
        $this->assertEquals(0, $thread->countUC());
        $this->assertEquals(0, $thread->countUpper());

        $thread = new Thread('abc123!');
        $this->assertEquals(0, $thread->countUppercase());

        $thread = new Thread('!@#$%^&*()');
        $this->assertEquals(0, $thread->countUppercase());

        $thread = new Thread('123');
        $this->assertEquals(0, $thread->countUppercase());

        $thread = new Thread('ABC123');
        $this->assertEquals(3, $thread->countUppercase());
    }

    public function testCountWords(): void
    {
        $thread = new Thread('one two three four five');
        $this->assertEquals(5, $thread->countWords());

        $thread = new Thread('one');
        $this->assertEquals(1, $thread->countWords());

        $thread = new Thread('one two');
        $this->assertEquals(2, $thread->countWords());

        $thread = new Thread('onetwothree');
        $this->assertEquals(1, $thread->countWords());

        $thread = new Thread(''); //empty string
        $this->assertEquals(0, $thread->countWords());

        $thread = new Thread('   '); //spaces
        $this->assertEquals(0, $thread->countWords());
    }

    public function testCountWhitespace(): void
    {
        $thread = new Thread(' ');
        $this->assertEquals(1, $thread->countWhitespace());

        $thread = new Thread('  ');
        $this->assertEquals(2, $thread->countWhitespace());

        $thread = new Thread("\n");
        $this->assertEquals(1, $thread->countWhitespace());

        $thread = new Thread("\r");
        $this->assertEquals(1, $thread->countWhitespace());

        $thread = new Thread("\t");
        $this->assertEquals(1, $thread->countWhitespace());

        $thread = new Thread("\r\n");
        $this->assertEquals(2, $thread->countWhitespace());

        $thread = new Thread("");
        $this->assertEquals(0, $thread->countWhitespace());
    }
}
