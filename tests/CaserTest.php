<?php

namespace Gtmassey\Thread\Tests;

use Gtmassey\Thread\Thread;
use PHPUnit\Framework\TestCase;

class CaserTest extends TestCase
{
    public function testLowercaseFirst(): void
    {
        $thread = new Thread('HELLO WORLD');
        $this->assertEquals('hELLO WORLD', $thread->lcFirst());
    }

    public function testLowercaseLast(): void
    {
        $thread = new Thread('HELLO WORLD');
        $this->assertEquals('HELLO WORLd', $thread->lcLast());
    }

    public function testLowercaseNth(): void
    {
        $thread = new Thread('HELLO WORLD');
        $this->assertEquals('HELlO WORLD', $thread->lcNth(3));

        $thread = new Thread('HELLO WORLD');
        $this->assertEquals('HELLO WORLD', $thread->lcNth(100));

        $thread = new Thread('HELLO WORLD');
        $this->assertEquals('hELLO WORLD', $thread->lcNth(0));

        $thread = new Thread('HELLO WORLD');
        $this->assertEquals('HELLO WORLD', $thread->lcNth(-1));
    }

    public function testToCamelCase(): void
    {
        $thread = new Thread('hello world');
        $this->assertEquals('helloWorld', $thread->toCamelCase());

        $thread = new Thread('this is a test of Camel Case');
        $this->assertEquals('thisIsATestOfCamelCase', $thread->toCamelCase());

        $thread = new Thread('');
        $this->assertEquals('', $thread->toCamelCase());

        $thread = new Thread('    ');
        $this->assertEquals('', $thread->toCamelCase());

        $thread = new Thread('hello');
        $this->assertEquals('hello', $thread->toCamelCase());
    }

    public function testToKebabCaseUC(): void
    {
        $thread = new Thread('hello world');
        $this->assertEquals('HELLO-WORLD', $thread->toKebabCaseUC());

        $thread = new Thread('this is a test of Kebab Case');
        $this->assertEquals('THIS-IS-A-TEST-OF-KEBAB-CASE', $thread->toKebabCaseUC());

        $thread = new Thread('');
        $this->assertEquals('', $thread->toKebabCaseUC());

        $thread = new Thread('    ');
        $this->assertEquals('', $thread->toKebabCaseUC());

        $thread = new Thread('hello');
        $this->assertEquals('HELLO', $thread->toKebabCaseUC());
    }

    public function testToKebabCase(): void
    {
        $thread = new Thread('hello world');
        $this->assertEquals('hello-world', $thread->toKebabCase());

        $thread = new Thread('this is a test of Kebab Case');
        $this->assertEquals('this-is-a-test-of-kebab-case', $thread->toKebabCase());

        $thread = new Thread('');
        $this->assertEquals('', $thread->toKebabCase());

        $thread = new Thread('    ');
        $this->assertEquals('', $thread->toKebabCase());

        $thread = new Thread('hello');
        $this->assertEquals('hello', $thread->toKebabCase());
    }

    public function testToUpperCase(): void
    {
        $thread = new Thread('hello world');
        $this->assertEquals('HELLO WORLD', $thread->toUpperCase());

        $thread = new Thread('this is a test of Upper Case');
        $this->assertEquals('THIS IS A TEST OF UPPER CASE', $thread->toUpperCase());

        $thread = new Thread('');
        $this->assertEquals('', $thread->toUpperCase());

        $thread = new Thread('    ');
        $this->assertEquals('    ', $thread->toUpperCase());

        $thread = new Thread('hello');
        $this->assertEquals('HELLO', $thread->toUpperCase());
    }

    public function testToLowerCase(): void
    {
        $thread = new Thread('HELLO world');
        $this->assertEquals('hello world', $thread->toLowerCase());

        $thread = new Thread('THIS IS A TEST OF LOWER CASE');
        $this->assertEquals('this is a test of lower case', $thread->toLowerCase());

        $thread = new Thread('');
        $this->assertEquals('', $thread->toLowerCase());

        $thread = new Thread('    ');
        $this->assertEquals('    ', $thread->toLowerCase());

        $thread = new Thread('HELLO');
        $this->assertEquals('hello', $thread->toLowerCase());

        $thread = new Thread('hello');
        $this->assertEquals('hello', $thread->toLowerCase());
    }

    public function testToPascalCase(): void
    {
        $thread = new Thread('hello world');
        $this->assertEquals('HelloWorld', $thread->toPascalCase());

        $thread = new Thread('this is a test of Pascal Case');
        $this->assertEquals('ThisIsATestOfPascalCase', $thread->toPascalCase());

        $thread = new Thread('');
        $this->assertEquals('', $thread->toPascalCase());

        $thread = new Thread('    ');
        $this->assertEquals('', $thread->toPascalCase());

        $thread = new Thread('hello');
        $this->assertEquals('Hello', $thread->toPascalCase());
    }

    public function testToSnakeCaseUC(): void
    {
        $thread = new Thread('hello world');
        $this->assertEquals('HELLO_WORLD', $thread->toSnakeCaseUC());

        $thread = new Thread('this is a test of Snake Case');
        $this->assertEquals('THIS_IS_A_TEST_OF_SNAKE_CASE', $thread->toSnakeCaseUC());

        $thread = new Thread('');
        $this->assertEquals('', $thread->toSnakeCaseUC());

        $thread = new Thread('    ');
        $this->assertEquals('', $thread->toSnakeCaseUC());

        $thread = new Thread('hello');
        $this->assertEquals('HELLO', $thread->toSnakeCaseUC());
    }

    public function testToSnakeCase(): void
    {
        $thread = new Thread('hello world');
        $this->assertEquals('hello_world', $thread->toSnakeCase());

        $thread = new Thread('this is a test of Snake Case');
        $this->assertEquals('this_is_a_test_of_snake_case', $thread->toSnakeCase());

        $thread = new Thread('');
        $this->assertEquals('', $thread->toSnakeCase());

        $thread = new Thread('    ');
        $this->assertEquals('', $thread->toSnakeCase());

        $thread = new Thread('hello');
        $this->assertEquals('hello', $thread->toSnakeCase());
    }

    public function testToTitleCase(): void
    {
        $thread = new Thread('hello world');
        $this->assertEquals('Hello World', $thread->toTitleCase());

        $thread = new Thread('this is a test of Title Case');
        $this->assertEquals('This Is A Test Of Title Case', $thread->toTitleCase());

        $thread = new Thread('');
        $this->assertEquals('', $thread->toTitleCase());

        $thread = new Thread('    ');
        $this->assertEquals('    ', $thread->toTitleCase());

        $thread = new Thread('hello');
        $this->assertEquals('Hello', $thread->toTitleCase());
    }

    public function testUppercaseFirst(): void
    {
        $thread = new Thread('hello world');
        $this->assertEquals('Hello world', $thread->ucFirst());

        $thread = new Thread('');
        $this->assertEquals('', $thread->ucFirst());

        $thread = new Thread('    ');
        $this->assertEquals('    ', $thread->ucFirst());
    }

    public function testUppercaseLast(): void
    {
        $thread = new Thread('hello world');
        $this->assertEquals('hello worlD', $thread->ucLast());

        $thread = new Thread('');
        $this->assertEquals('', $thread->ucLast());

        $thread = new Thread('    ');
        $this->assertEquals('    ', $thread->ucLast());
    }

    public function testUppercaseNth(): void
    {
        $thread = new Thread('hello world');
        $this->assertEquals('hellO world', $thread->ucNth(4));

        $thread = new Thread('hello world');
        $this->assertEquals('hello world', $thread->ucNth(100));

        $thread = new Thread('hello world');
        $this->assertEquals('Hello world', $thread->ucNth(0));

        $thread = new Thread('hello world');
        $this->assertEquals('hello world', $thread->ucNth(-1));
    }

    public function testTest(): void
    {
        //simple change to test github actions.
        $this->assertTrue(true);
    }
}
