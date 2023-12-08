<?php

namespace Gtmassey\Twine\Traits;

trait Searcher
{

    /**
     * Returns true if the string contains the
     * substring. Case-sensitive.
     *
     * example: 'Hello, world!' > contains('Hello') = true
     * example: 'Hello, world!' > contains('Universe') = false
     * example: 'Hello, world!' > contains('hello') = false
     *
     * @param  string  $substring
     * @return bool
     */
    public function contains(string $substring): bool
    {
        return str_contains($this->string, $substring);
    }


    /**
     * Returns true if the string contains all
     * the given substrings in any order and any number
     * Case-sensitive.
     *
     * example: 'Hello, world!' > containsAll(['Hello', 'world']) = true
     * example: 'Hello, world!' > containsAll(['Hello', 'Universe']) = false
     * example: 'Hello, world!' > containsAll(['hello', 'world']) = false
     *
     * @param  string[]  $substrings
     * @return bool
     */
    public function containsAll(array $substrings): bool
    {
        foreach ($substrings as $string) {
            if (!str_contains($this->string, $string)) {
                return false;
            }
        }

        return true;
    }

    /**
     * returns true if the string contains at least
     * one of the substrings. Case-sensitive.
     *
     * example: 'Hello, world!' > containsAny(['Hello', 'world']) = true
     * example: 'Hello, world!' > containsAny(['Hello', 'Universe']) = true
     * example: 'Hello, world!' > containsAny(['hello', 'world']) = true
     * example: 'Hello, world!' > containsAny(['hello', 'universe']) = false
     *
     * @param  array<string>  $substrings
     * @return bool
     */
    public function containsAny(array $substrings): bool
    {
        foreach ($substrings as $string) {
            if (str_contains($this->string, $string)) {
                return true;
            }
        }

        return false;
    }


    /**
     * Returns true if the string does NOT
     * contain ANY of the given substrings
     * Case-sensitive.
     *
     * example: 'Hello, world!' > containsNone(['Hello', 'world']) = false
     * example: 'Hello, world!' > containsNone(['Hello', 'Universe']) = false
     * example: 'Hello, world!' > containsNone(['hello', 'Universe']) = true
     *
     * @param  array<string>  $substrings
     * @return bool
     */
    public function containsNone(array $substrings): bool
    {
        foreach ($substrings as $string) {
            if (str_contains($this->string, $string)) {
                return false;
            }
        }

        return true;
    }
}
