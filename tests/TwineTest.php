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
}
