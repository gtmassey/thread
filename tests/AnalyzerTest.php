<?php

namespace Gtmassey\Thread\Tests;

use Gtmassey\Thread\Thread;
use PHPUnit\Framework\TestCase;

class AnalyzerTest extends TestCase
{
    public function testLength(): void
    {
        $twine = new Thread('One');
        $this->assertEquals(3, $twine->length());

        $twine = new Thread('Two');
        $this->assertEquals(3, $twine->length());

        $twine = new Thread('Three');
        $this->assertEquals(5, $twine->length());
    }

    public function testMostFrequentCharacter(): void
    {
        $twine = new Thread('Hello, world!');
        $this->assertEquals('l', $twine->mostFrequentCharacter());

        $twine = new Thread('Foo bar baz');
        $this->assertEquals('o', $twine->mostFrequentCharacter());

        $twine = new Thread('Foo bar baz Foo bar baz');
        $this->assertEquals('o', $twine->mostFrequentCharacter());
    }

    public function testMostFrequentCharacters(): void
    {
        //TODO: check test validity
        $twine = new Thread('one two three four');
        $this->assertEquals(['o' => 3, 'e' => 3, 't' => 2], $twine->mostFrequentCharacters());
    }

    public function mostFrequentWord(): void
    {
        $twine = new Thread('one two three four one');
        $this->assertEquals('one', $twine->mostFrequentWord());

        $twine = new Thread('one two three four one two');
        $this->assertEquals('one', $twine->mostFrequentWord());

        $twine = new Thread('one two three four');
        $this->assertEquals('', $twine->mostFrequentWord());
    }

    public function mostFrequentWords(): void
    {
        //TODO: implement test
        $this->assert(true);
    }

    public function testWordCount(): void
    {
        //TODO: implement test
        $this->assert(true);
    }
}
