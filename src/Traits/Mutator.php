<?php

namespace Gtmassey\Thread\Traits;

use Gtmassey\Thread\Thread;

trait Mutator
{
    /**
     * return the substring after the first occurrence of the string
     *
     * example: 'Hello World' > after('Hello') > ' World'
     *
     * @param  string  $delimiter
     * @return Thread
     */
    public function after(string $delimiter): Thread
    {
        //if the delimiter is empty, return the current string
        if (empty($delimiter)) {
            return $this;
        }

        $this->string = substr($this->string, strpos($this->string, $delimiter) + strlen($delimiter));

        return $this;
    }

    /**
     * Returns the substring after the last occurrence of a given
     * delimiter. If the delimiter is empty, the current string returns
     * if the delimiter does not exist in the string, the unchanged string returns
     *
     * @param  string  $delimiter
     * @return Thread
     */
    public function afterLast(string $delimiter): Thread
    {
        //if the delimiter is empty, return the current string
        if (empty($delimiter)) {
            return $this;
        }

        //if the delimiter doesn't exist in the string
        //return the current string
        if (! str_contains($this->string, $delimiter)) {
            return $this;
        }

        //finally, if the delimiter exists in the string
        //return the substring after the last occurrence of the delimiter
        $this->string = substr($this->string, strrpos($this->string, $delimiter) + strlen($delimiter));

        return $this;
    }

    /**
     * return the substring before the first occurrence of the string
     *
     * example: 'Hello World' > before('World') > 'Hello '
     *
     * @param  string  $delimiter
     * @return Thread
     */
    public function before(string $delimiter): Thread
    {
        //if the delimiter is empty, return the current string
        if (empty($delimiter)) {
            return $this;
        }

        //get position of split
        $position = strpos($this->string, $delimiter);

        //split
        $this->string = substr($this->string, 0, $position);

        //return
        return $this;
    }

    /**
     * return the substring before the last occurrence of the string
     *
     * example: 'Hello World' > beforeLast('l') > 'Hello Wor'
     *
     * @param  string  $delimiter
     * @return Thread
     */
    public function beforeLast(string $delimiter): Thread
    {
        //first check that the delimiter exists
        if (str_contains($this->string, $delimiter)) {
            $this->string = substr($this->string, 0, strrpos($this->string, $delimiter));
        }

        return $this;

    }

    /**
     * return the substring between the first occurrence of the first string
     * and the first occurrence of the second string
     *
     * example: 'Hello World' > between('H', 'd') > 'ello Worl'
     *
     * @param  string  $start
     * @param  string  $end
     * @return Thread
     */
    public function between(string $start, string $end): Thread
    {
        //first, get the substring after the start substring:
        $this->string = $this->after($start);
        //then, get the substring before the end substring:
        $this->string = $this->before($end);

        return $this;
    }

    /**
     * return the substring between the last occurrence of the
     * first string and the last occurrence of the second string
     *
     * example: 'Hello World' > betweenLast('l', 'l') > 'o Wor'
     *
     * @param  string  $start
     * @param  string  $end
     * @return Thread
     */
    public function betweenLast(string $start, string $end): Thread
    {
        $this->string = $this->afterLast($start);
        $this->string = $this->beforeLast($end);

        return $this;
    }

    /**
     * limit the string to a certain number of characters.
     * Accepts an optional ending character or substring
     *
     * Important note: the limiting assumes the start character
     * is at index 0, so if you limit to 5 characters, the 5th
     * character will be at index 4.
     *
     * Using a negative number will yield a limit from the end of the string
     *
     * example: 'Some long text' > limit(9) > 'Some long'
     * example: 'Some long text' > limit(9, '...') > 'Some long...'
     *
     * @param  int  $limit
     * @param  string|null  $end
     * @return Thread
     */
    public function limit(int $limit, ?string $end = ''): Thread
    {
        $this->string = substr($this->string, 0, $limit).$end;

        return $this;
    }

    /**
     * mask the string with a character or substring.
     * Accepts an optional start and end position to mask
     * Also accepts a second optional making character
     *
     * example: 'Hello World' > mask() > '***********'
     * example: 'Hello World' > mask(1, 3) > 'H***o World'
     * example: 'Hello World' > mask(1, 3, 'x') > 'Hxxxo World'
     *
     * @param  int|null  $start
     * @param  int|null  $end
     * @param  string|null  $maskChar
     * @return Thread
     */
    public function mask(?int $start = 0, ?int $end = null, ?string $maskChar = '*'): Thread
    {
        //if the mask char is null, set it to the * char
        if (is_null($maskChar)) {
            $maskChar = '*';
        }

        //if the end argument is null, then we mask the entire string
        if (is_null($end)) {
            $end = strlen($this->string) - 1;
        }

        //now, starting at the $start index, replace the characters
        //with the mask character until we reach the $end index
        for ($i = $start; $i <= $end; $i++) {
            $this->string[$i] = $maskChar;
        }

        return $this;
    }

    /**
     * Mask the string after a given substring
     * Accepts an optional making character
     *
     * example: 'email@website.com' > maskAfter('.') > "email@website.***"
     *
     * @param  string  $delimiter
     * @param  string|null  $maskChar
     * @return Thread
     */
    public function maskAfter(string $delimiter, ?string $maskChar = '*'): Thread
    {
        //if the delimiter is empty, return the current string
        if (empty($delimiter)) {
            return $this;
        }

        //if the delimiter doesn't exist in the string
        //return the current string
        if (! str_contains($this->string, $delimiter)) {
            return $this;
        }

        //get the position of the delimiter
        $position = strpos($this->string, $delimiter);

        //if the delimiter is at the end of the string, return the current string
        if ($position === strlen($this->string) - 1) {
            return $this;
        }

        //now, starting at the character after the delimiter
        //replace the characters with the mask character
        for ($i = $position + 1; $i < strlen($this->string); $i++) {
            $this->string[$i] = $maskChar;
        }

        return $this;
    }

    /**
     * Mask the string before a given substring
     * Accepts an optional making character
     *
     * example: 'email@website.com' > maskBefore('@') > "*****@website.com"
     *
     * @param  string  $delimiter
     * @param  string|null  $maskChar
     * @return Thread
     */
    public function maskBefore(string $delimiter, ?string $maskChar = '*'): Thread
    {
        //if the delimiter is empty, return the current string
        if (empty($delimiter)) {
            return $this;
        }

        //if the delimiter doesn't exist in the string
        //return the current string
        if (! str_contains($this->string, $delimiter)) {
            return $this;
        }

        //get the position of the delimiter
        $position = strpos($this->string, $delimiter);

        //if the delimiter is at the beginning of the string, return the current string
        if ($position === 0) {
            return $this;
        }

        //now, starting at the character after the delimiter
        //replace the characters with the mask character
        for ($i = 0; $i < $position; $i++) {
            $this->string[$i] = $maskChar;
        }

        return $this;
    }

    /**
     * repeat string N times with separator
     * (default is no separator)
     *
     * example: 'hello' > repeat(3, ' ') > 'hello hello hello'
     * example: 'hello' > repeat(3) > 'hellohellohello'
     *
     * @param  int  $n
     * @param  string|null  $separator
     * @return Thread
     */
    public function repeat(?int $n = 1, ?string $separator = null): Thread
    {
        $this->string = str_repeat($this->string.$separator, $n);

        //if the separator is not null, remove the extra separator from
        //the end of the string
        if (! is_null($separator)) {
            $this->string = substr($this->string, 0, strlen($this->string) - strlen($separator));
        }

        return $this;
    }

    /**
     * replace all occurrences of substring with replacement
     *
     * example: 'hello world' > replace('world', 'universe') > 'hello universe'
     *
     * @param  string  $needle
     * @param  string  $replacement
     * @return Thread
     */
    public function replace(string $needle, string $replacement): Thread
    {
        $this->string = str_replace($needle, $replacement, $this->string);

        return $this;
    }

    /**
     * reverse string
     *
     * example: 'hello world' > reverse() > 'dlrow olleh'
     *
     * @return Thread
     */
    public function reverse(): Thread
    {
        $this->string = strrev($this->string);

        return $this;
    }

    /**
     * swap a substring for a substring in a string using strstr.
     * Accepts an array of substrings to swap and their values
     *
     * example: 'Hello World' > swap(['Hello' => 'Goodbye']) > 'Goodbye World'
     * example: 'Hello World' > swap(['Hello' => 'Goodbye', 'World' => 'Universe']) > 'Goodbye Universe'
     *
     * @param  array<string>  $swaps
     * @return Thread
     */
    public function swap(array $swaps): Thread
    {
        //TODO: implement method
        return $this;
    }

    /**
     * convert string to e161 with a pipe char
     * as a delimiter, since the string 'aa' = 22
     * but the string 'b' is also 22.
     *
     * You can pass in a string argument to use
     * as a custom delimiter
     *
     * example: 'Hello' > toE161() > '44|33|555|555|666'
     *
     * @param  string|null  $delimiter
     * @return Thread
     */
    public function toE161(?string $delimiter = '|'): Thread
    {
        //TODO: test method
        $this->toLowerCase();
        $arr = str_split($this->string);
        foreach ($arr as $key => $char) {
            $arr[$key] = Thread::E161[$char];
        }
        $this->string = implode($delimiter ?? '', $arr);

        return $this;
    }

    /**
     * convert the string to a URL friendly slug.
     * Most often uses the '-' as a separator
     * Optional argument to use a different separator.
     * If the separator is not url-safe (i.e. it's not a letter, number, underscore, or dash)
     * then the separator is replaced with a dash.
     *
     * example: 'Hello World' > toSlug() > 'hello-world'
     * example: 'Hello World' > toSlug('G') > 'helloGworld'
     * example: 'Hello World' > toSlug('_') > 'hello_world'
     *
     * @param  string  $separator
     * @return Thread
     */
    public function toSlug(string $separator): Thread
    {
        //TODO: implement method
        return $this;
    }
}
