<?php

namespace Gtmassey\Thread\Tests;

use Gtmassey\Thread\Thread;
use PHPUnit\Framework\TestCase;

class AnalyzerTest extends TestCase
{
    public function testLength(): void
    {
        $thread = new Thread('a');
        $this->assertEquals(1, $thread->length());

        $thread = new Thread('aa');
        $this->assertEquals(2, $thread->length());

        $thread = new Thread('aaa');
        $this->assertEquals(3, $thread->length());

        $thread = new Thread('');
        $this->assertEquals(0, $thread->length());

        $thread = new Thread('    ');
        $this->assertEquals(4, $thread->length());
    }

    public function testMostFrequentCharacter(): void
    {
        $thread = new Thread('a a a a b b b c c d');
        $this->assertEquals(['a' => 4], $thread->mostFrequentCharacter());

        $thread = new Thread('a a b b c c d d');
        $this->assertEquals(['a' => 2], $thread->mostFrequentCharacter());

        $thread = new Thread('');
        $this->assertEquals([], $thread->mostFrequentCharacter());

        $thread = new Thread('    ');
        $this->assertEquals([], $thread->mostFrequentCharacter());

        $thread = new Thread('a');
        $this->assertEquals(['a' => 1], $thread->mostFrequentCharacter());
    }

    public function testMostFrequentCharacters(): void
    {
        $thread = new Thread('a a a a b b b c c d');
        $this->assertEquals(['a' => 4, 'b' => 3, 'c' => 2], $thread->mostFrequentCharacters());

        $thread = new Thread('a a a a b b b c c d');
        $this->assertEquals(['a' => 4, 'b' => 3, 'c' => 2, 'd' => 1], $thread->mostFrequentCharacters(4));

        $thread = new Thread('');
        $this->assertEquals([], $thread->mostFrequentCharacters());
    }

    public function testMostFrequentWord(): void
    {
        $thread = new Thread('a a a a b b b c c d');
        $this->assertEquals(['a' => 4], $thread->mostFrequentWord());

        $thread = new Thread('a a a a b b b c c d');
        $this->assertEquals(['a' => 4], $thread->mostFrequentWord());

        $thread = new Thread('');
        $this->assertEquals([], $thread->mostFrequentWord());

        $thread = new Thread('a');
        $this->assertEquals(['a' => 1], $thread->mostFrequentWord());

        $thread = new Thread('      ');
        $this->assertEquals([], $thread->mostFrequentWord());

        $thread = new Thread('a a a b b b c c c');
        $this->assertEquals(['a' => 3], $thread->mostFrequentWord());
    }

    public function testMostFrequentWords(): void
    {
        $thread = new Thread('a a a a b b b c c d');
        $this->assertEquals(['a' => 4, 'b' => 3, 'c' => 2], $thread->mostFrequentWords());

        $thread = new Thread('a a a a b b b c c d');
        $this->assertEquals(['a' => 4, 'b' => 3, 'c' => 2, 'd' => 1], $thread->mostFrequentWords(4));

        $thread = new Thread('');
        $this->assertEquals([], $thread->mostFrequentWords());

        $thread = new Thread('a');
        $this->assertEquals(['a' => 1], $thread->mostFrequentWords());

        $thread = new Thread('      ');
        $this->assertEquals([], $thread->mostFrequentWords());

        $thread = new Thread('a a a b b b c c c');
        $this->assertEquals(['a' => 3, 'b' => 3, 'c' => 3], $thread->mostFrequentWords());
    }

    public function testWordCount(): void
    {
        $thread = new Thread('one two three four');
        $this->assertEquals(4, $thread->wordCount());

        $thread = new Thread('one');
        $this->assertEquals(1, $thread->wordCount());

        $thread = new Thread('');
        $this->assertEquals(0, $thread->wordCount());

        $thread = new Thread('    ');
        $this->assertEquals(0, $thread->wordCount());
    }
}
