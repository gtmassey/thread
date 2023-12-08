<?php

namespace Gtmassey\Thread\Traits;

trait Counter
{
    /**
     * return the number of alphabetical characters in the string
     *
     * example: 'abc123' > countAlpha() = 3
     * example: 'abc123!' > countAlpha() = 3
     * example: '!@#$%^&*()' > countAlpha() = 0
     * example: '123' > countAlpha() = 0
     *
     * @return int
     */
    public function countAlpha(): int
    {
        $count = preg_match_all('/[A-Za-z]/', $this->string);
        if (! $count) {
            return 0;
        }

        return $count;
    }

    /**
     * Returns the number of alphanumeric characters in the string
     *
     * example: 'abc123' > countAlphaNumeric() = 6
     * example: 'abc123!' > countAlphaNumeric() = 6
     * example: '!@#$%^&*()' > countAlphaNumeric() = 0
     *
     * @return int
     */
    public function countAlphaNumeric(): int
    {
        $count = preg_match_all('/[A-Za-z0-9]/', $this->string);
        if (! $count) {
            return 0;
        }

        return $count;
    }

    /**
     * Alias of $this->countInstancesOf($substrings)
     *
     * @param  array<string>  $substrings
     * @return int
     */
    public function countAny(array $substrings): int
    {
        return $this->countInstancesOf($substrings);
    }

    /**
     * returns the total count of the instances of the given
     * array of substrings. In any order, and any number of times
     * Case-sensitive.
     *
     * @param  array<string>  $substrings
     * @return int
     */
    public function countInstancesOf(array $substrings): int
    {
        $count = 0;
        foreach ($substrings as $string) {
            $count += substr_count($this->string, $string);
        }

        return $count;
    }

    /**
     * @return int
     */
    public function countBinary(): int
    {
        return 0;
    }

    /**
     * Alias of $this->countInstanceOf($substring)
     *
     * @param  string  $substring
     * @return int
     */
    public function countChar(string $substring): int
    {
        return $this->countInstanceOf($substring);
    }

    /**
     * Returns the integer count of the number of instances
     * of the given substring. Case-sensitive.
     *
     * @param  string  $substring
     * @return int
     */
    public function countInstanceOf(string $substring): int
    {
        return substr_count($this->string, $substring);
    }

    /**
     * Alias of $this->countInstanceOf($substring)
     *
     * @param  string  $substring
     * @return int
     */
    public function countCharacter(string $substring): int
    {
        return $this->countInstanceOf($substring);
    }

    /**
     * @param  array<string>  $substrings
     * @return int
     */
    public function countCharacters(array $substrings): int
    {
        return 0;
    }

    /**
     * @param  array<string>  $substrings
     * @return int
     */
    public function countChars(array $substrings): int
    {
        return 0;
    }

    /**
     * @return int
     */
    public function countHex(): int
    {
        return 0;
    }

    /**
     * @return int
     */
    public function countLC(): int
    {
        return 0;
    }

    /**
     * @return int
     */
    public function countLines(): int
    {
        return 0;
    }

    /**
     * @return int
     */
    public function countLowercase(): int
    {
        return 0;
    }

    /**
     * Returns the count of numeric characters in the string
     *
     * example: 'abc123' > countNumeric() = 3
     * example: 'abc123!' > countNumeric() = 3
     * example: '!@#$%^&*()' > countNumeric() = 0
     * example: 'abc' > countNumeric() = 0
     *
     * @return int
     */
    public function countNumeric(): int
    {
        $count = preg_match_all('/[0-9]/', $this->string);
        if (! $count) {
            return 0;
        }

        return $count;
    }

    /**
     * @return int
     */
    public function countParagraphs(): int
    {
        return 0;
    }

    /**
     * @return int
     */
    public function countSentences(): int
    {
        return 0;
    }

    /**
     * @return int
     */
    public function countSpecial(): int
    {
        return 0;
    }

    /**
     * @param  string  $substring
     * @return int
     */
    public function countSubstring(string $substring): int
    {
        return $this->countInstanceOf($substring);
    }

    /**
     * @param  array<string>  $substrings
     * @return int
     */
    public function countSubstrings(array $substrings): int
    {
        return $this->countInstancesOf($substrings);
    }

    /**
     * @return int
     */
    public function countUC(): int
    {
        return 0;
    }

    /**
     * @return int
     */
    public function countUppercase(): int
    {
        return 0;
    }

    /**
     * @return int
     */
    public function countWhitespace(): int
    {
        return 0;
    }

    /**
     * @return int
     */
    public function countWords(): int
    {
        return 0;
    }
}
