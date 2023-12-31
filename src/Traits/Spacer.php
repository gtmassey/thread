<?php

namespace Gtmassey\Thread\Traits;

use Gtmassey\Thread\Thread;

trait Spacer
{
    /**
     * append a string to the end of
     * the string.
     *
     * example: 'hello'->append(' world') = 'hello world'
     *
     * @param  string  $string
     * @return Thread
     */
    public function append(string $string): Thread
    {
        $this->string .= $string;

        return $this;
    }

    /**
     * Removes excess whitespace from string
     * Leaves only one space character between words
     * Trims whitespace from ends of string.
     *
     * example: '   hello   world   ' > 'hello world'
     *
     * @return Thread
     */
    public function compress(): Thread
    {
        $this->string = preg_replace('/\s+/', ' ', $this->string) ?? '';

        return $this->trim();
    }

    /**
     * remove excess whitespace between words
     * leaves whitespace at start and end of
     * string alone.
     *
     * example: '   hello   world   ' > '   hello world   '
     *
     * @return Thread
     */
    public function compressBetween(): Thread
    {
        $this->string = preg_replace('/(?<=\S)\s+(?=\S)/', ' ', $this->string) ?? '';

        return $this;
    }

    /**
     * remove excess whitespace at end of string
     * leaves all other whitespaces alone
     *
     * example: '   hello   world   ' > '   hello   world'
     *
     * @return Thread
     */
    public function compressEnd(): Thread
    {
        $this->string = rtrim($this->string);

        return $this;
    }

    /**
     * remove excess whitespace at start of string
     * leaves all other whitespaces alone
     *
     * example: '   hello   world   ' > 'hello   world   '
     *
     * @return Thread
     */
    public function compressStart(): Thread
    {
        $this->string = ltrim($this->string);

        return $this;
    }

    /**
     * Append and prepend given fill string
     * to string until n length is reached
     *
     * example: 'Hi' > padBothEnds(10, '+=') > '+=+=Hi+=+='
     *
     * @param  int  $n
     * @param  string  $string
     * @return Thread
     */
    public function padBothEnds(int $n, string $string): Thread
    {
        $this->string = str_pad($this->string, $n, $string, STR_PAD_BOTH);

        return $this;
    }

    /**
     * append fill string to string until
     * n length is reached
     *
     * example: 'Hi' > padEnd(10, '+=') > 'Hi+=+=+=+='
     *
     * @param  int  $n
     * @param  string  $string
     * @return Thread
     */
    public function padEnd(int $n, string $string): Thread
    {
        $this->string = str_pad($this->string, $n, $string);

        return $this;
    }

    /**
     * prepend fill string to string until
     * n length is reached
     *
     * example: 'Hi' > padStart(10, '+=') > '+=+=+=+=Hi'
     *
     * @param  int  $n
     * @param  string  $string
     * @return Thread
     */
    public function padStart(int $n, string $string): Thread
    {
        $this->string = str_pad($this->string, $n, $string, STR_PAD_LEFT);

        return $this;
    }

    /**
     * add string to start of string
     *
     * example: 'world' > prepend('hello ') > 'hello world'
     *
     * @param  string  $string
     * @return Thread
     */
    public function prepend(string $string): Thread
    {
        $this->string = $string.$this->string;

        return $this;
    }
}
