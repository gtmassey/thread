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

        return $count ?: 0;
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

        return $count ?: 0;
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
        //TODO: implement. Not sure if it should count the number of 1's and 0's
        //      or the actual binary values found in the string?? not sure.

        return 0;
    }

    /**
     * Alias of $this->countInstanceOf($substring)
     *
     * @param  string  $substring
     * @return int
     */
    public function countSubstr(string $substring): int
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
        return $this->countInstancesOf($substrings);
    }

    /**
     * returns the count of the instances of the given characters
     * returns an array of key values where the key is the substring
     * and the value is its count
     *
     * @param  array<string>  $substrings
     * @return array<string, int>
     */
    public function countChars(array $substrings): array
    {
        $substr = [];
        for ($i = 0; $i < count($substrings); $i++) {
            $substr[$substrings[$i]] = $this->countInstanceOf($substrings[$i]);
        }

        return $substr;
    }

    /**
     * returns the count of the number of hexidecimal
     * characters in a string. See https://en.wikipedia.org/wiki/Hexadecimal
     * This function is not case sensitive.
     *
     * @return int
     */
    public function countHex(): int
    {
        $count = preg_match_all('/[0-9A-Fa-f]/', $this->string);

        return $count ?: 0;
    }

    /**
     * returns a count of lowercase characters
     * in the string
     *
     * @return int
     */
    public function countLC(): int
    {
        $count = preg_match_all('/[a-z]/', $this->string);

        return $count ?: 0;
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
        return $this->countLC();
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

        return $count ?: 0;
    }

    /**
     * @return int
     */
    public function countParagraphs(): int
    {
        return 0;
    }

    /**
     * Returns the count of sentences in the string.
     * Assumes that all sentences are separated by a single
     * period '.' character. Does not account for abbreviations.
     *
     * @return int
     */
    public function countSentences(): int
    {
        return count(explode('.', $this->string));
    }

    /**
     * Returns a count of special characters in the
     * string. Does NOT include alphanumeric characters
     * or whitespace.
     *
     * @return int
     */
    public function countSpecial(): int
    {
        $specialChars = preg_quote(implode('', self::SPECIAL_CHARS), '/');
        $count = preg_match_all("/[$specialChars]/", $this->string);

        return $count ?: 0;
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
     * Returns a count of the number of
     * uppercase characters in the string
     *
     * @return int
     */
    public function countUC(): int
    {
        $count = preg_match_all('/[A-Z]/', $this->string);

        return $count ?: 0;
    }

    /**
     * @return int
     */
    public function countUppercase(): int
    {
        return $this->countUC();
    }

    /**
     * returns a count of all whitespace characters
     * such as space " ", tab "\t", and newline "\n"
     * and return characters "\r"
     *
     * @return int
     */
    public function countWhitespace(): int
    {
        $count = preg_match_all('/\s/', $this->string);

        return $count ?: 0;
    }

    /**
     * @return int
     */
    public function countWords(): int
    {
        return 0;
    }
}
