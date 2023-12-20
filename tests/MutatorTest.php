<?php

namespace Gtmassey\Thread\Tests;

use Gtmassey\Thread\Thread;
use PHPUnit\Framework\TestCase;

class MutatorTest extends TestCase
{
    public function testAfter(): void
    {
        $thread = new Thread('Hello, world!');
        $this->assertEquals('world!', $thread->after('Hello, ')->toString());

        $thread = new Thread('Hello, world!');
        $this->assertEquals('', $thread->after('world!')->toString());

        $thread = new Thread('');
        $this->assertEquals('', $thread->after('Hello, ')->toString());

        $thread = new Thread('');
        $this->assertEquals('', $thread->after('')->toString());
    }

    public function testBefore(): void
    {
        $thread = new Thread('Hello, world!');
        $this->assertEquals('Hello, ', $thread->before('world!')->toString());

        $thread = new Thread('Hello, world!');
        $this->assertEquals('', $thread->before('Hello, ')->toString());

        $thread = new Thread('');
        $this->assertEquals('', $thread->before('Hello, ')->toString());

        $thread = new Thread('');
        $this->assertEquals('', $thread->before('')->toString());
    }

    public function testBeforeLast(): void
    {
        $thread = new Thread('Hello, world!');
        $this->assertEquals('Hello, wor', $thread->beforeLast('l')->toString());

        $thread = new Thread('Hello, world!');
        $this->assertEquals('Hello, world!', $thread->beforeLast('')->toString());

        $thread = new Thread('');
        $this->assertEquals('', $thread->beforeLast('l')->toString());

        $thread = new Thread('');
        $this->assertEquals('', $thread->beforeLast('')->toString());
    }

    public function testBetween(): void
    {
        $thread = new Thread('Hello, world!');
        $this->assertEquals('llo, worl', $thread->between('He', 'd!')->toString());

        $thread = new Thread('Hello, world!');
        $this->assertEquals('llo, world!', $thread->between('He', '')->toString());

        $thread = new Thread('Hello, world!');
        $this->assertEquals('Hello, worl', $thread->between('', 'd!')->toString());

        $thread = new Thread('Hello, world!');
        $this->assertEquals('Hello, world!', $thread->between('', '')->toString());

        $thread = new Thread('Hello, world!');
        $this->assertEquals('', $thread->between('foo', 'bar')->toString());
    }

    public function testBetweenLast(): void
    {
        $thread = new Thread('aaa bbb ccc ddd');
        $this->assertEquals(' bbb cc', $thread->betweenLast('a', 'c')->toString());

        $thread = new Thread('aaa bbb ccc ddd');
        $this->assertEquals(' bbb ccc ddd', $thread->betweenLast('a', '')->toString());

        $thread = new Thread('aaa bbb ccc ddd');
        $this->assertEquals('aaa bbb ccc dd', $thread->betweenLast('', 'd')->toString());

        $thread = new Thread('aaa bbb ccc ddd');
        $this->assertEquals('aaa bbb ccc ddd', $thread->betweenLast('', '')->toString());
    }

    public function testLimit(): void
    {
        $thread = new Thread('0123456789');
        $this->assertEquals('01234', $thread->limit(5)->toString());

        $thread = new Thread('0123456789');
        $this->assertEquals('0123456789', $thread->limit(100)->toString());

        $thread = new Thread('0123456789');
        $this->assertEquals('01234...', $thread->limit(5, '...')->toString());

        $thread = new Thread('0123456789');
        $this->assertEquals('012345678', $thread->limit(-1)->toString());

        $thread = new Thread('0123456789');
        $this->assertEquals('', $thread->limit(0)->toString());

        $thread = new Thread('0123456789');
        $this->assertEquals('', $thread->limit(-100)->toString());
    }

    public function testMask(): void
    {
        $thread = new Thread('01234');
        $this->assertEquals('*****', $thread->mask()->toString());

        $thread = new Thread('01234');
        $this->assertEquals('0****', $thread->mask(1)->toString());

        $thread = new Thread('01234');
        $this->assertEquals('0***4', $thread->mask(1, 3)->toString());

        $thread = new Thread('01234');
        $this->assertEquals('0xxx4', $thread->mask(1, 3, 'x')->toString());
    }

    public function testMaskAfter(): void
    {
        $thread = new Thread('email@example.com');
        $this->assertEquals('email@***********', $thread->maskAfter('@')->toString());

        $thread = new Thread('email@example.com+');
        $this->assertEquals('email@example.com+', $thread->maskAfter('+')->toString());

        $thread = new Thread('email@example.com');
        $this->assertEquals('email@example.com', $thread->maskAfter('+')->toString());
    }

    public function testMaskBefore(): void
    {
        $thread = new Thread('email@example.com');
        $this->assertEquals('*****@example.com', $thread->maskBefore('@')->toString());

        $thread = new Thread('email@example.com');
        $this->assertEquals('*************.com', $thread->maskBefore('.')->toString());

        $thread = new Thread('email@example.com');
        $this->assertEquals('xxxxx@example.com', $thread->maskBefore('@', 'x')->toString());
    }

    public function testRepeat(): void
    {
        $thread = new Thread('+=');
        $this->assertEquals('+=+=', $thread->repeat(2)->toString());
        $this->assertEquals('+=+=+=+=+=+=', $thread->repeat(3)->toString());

        $this->assertEquals('+=+=+=+=+=+=|+=+=+=+=+=+=', $thread->repeat(2, '|')->toString());
    }

    public function testReplace(): void
    {
        $thread = new Thread('Hello, world!');
        $this->assertEquals('Hello, universe!', $thread->replace('world', 'universe')->toString());
        $this->assertEquals('Hello, universe!', $thread->replace('world', 'planet')->toString());
    }

    public function testReverse(): void
    {
        $thread = new Thread('12345');
        $this->assertEquals('54321', $thread->reverse()->toString());

        $thread = new Thread('');
        $this->assertEquals('', $thread->reverse()->toString());
    }

    //public function testSwap(): void {}

    //public function testToE161(): void {}

    //public function testToSlug(): void {}

}
