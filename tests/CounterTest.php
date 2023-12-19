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

    public function testCountInstancesOf(): void
    {
        $thread = new Thread('abc123abc123abc123');
        $this->assertEquals(3, $thread->countInstancesOf(['abc']));
        $this->assertEquals(3, $thread->countAny(['abc']));

        $this->assertEquals(0, $thread->countInstancesOf(['xyz']));
        $this->assertEquals(0, $thread->countAny(['xyz']));

        $this->assertEquals(3, $thread->countInstancesOf(['abc', 'xyz']));
        $this->assertEquals(3, $thread->countAny(['abc', 'xyz']));

        $this->assertEquals(0, $thread->countInstancesOf([]));
    }

    public function testCountBinary(): void
    {
        //TODO: implement test
        $this->assertTrue(true);
    }
}
