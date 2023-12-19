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
     * Returns the integer count of the number of instances
     * of the given substring. Case-sensitive.
     *
     * @param  string|array  $substring
     * @return int|array
     */
    public function countInstancesOf(string|array $substring): int|array
    {
        if (is_array($substring)) {
            $frequency = [];
            foreach ($substring as $sub) {
                $frequency[$sub] = substr_count($this->string, $sub);
            }
            return $frequency;
        }
        return substr_count($this->string, $substring);
    }

    /**
     * Alias of $this->countInstancesOf($substring)
     *
     * @param  string|array  $substring
     * @return int|array
     */
    public function countSubstr(string|array $substring): int|array
    {
        return $this->countInstancesOf($substring);
    }

    /**
     * Alias of $this->countInstancesOf($substring)
     *
     * @param  string|array  $substring
     * @return int|array
     */
    public function substrCount(string|array $substring): int|array
    {
        return $this->countInstancesOf($substring);
    }

    /**
     * Alias of $this->countInstancesOf($substring)
     *
     * @param  string|array  $substring
     * @return int|array
     */
    public function substringsCount(string|array $substring): int|array
    {
        return $this->countInstancesOf($substring);
    }

    /**
     * Alias of $this->countInstancesOf($substring)
     *
     * @param  string|array  $substring
     * @return int|array
     */
    public function countSubstrings(string|array $substring): int|array
    {
        return $this->countInstancesOf($substring);
    }

    /**
     * returns the exploded string as an array with
     * the characters as keys and the count of each character
     * as the value
     *
     * @return array<string, int>
     */
    public function characterFrequency(): array
    {
        $chars = str_split($this->string);
        $charFrequency = [];

        foreach ($chars as $char) {
            if (isset($charFrequency[$char])) {
                $charFrequency[$char]++;
            } else {
                $charFrequency[$char] = 1;
            }
        }
        return $charFrequency;
    }

    /**
     * alias of $this->characterFrequency()
     *
     * @return array<string, int>
     */
    public function charFrequency(): array
    {
        return $this->characterFrequency();
    }

    /**
     * alias of $this->characterFrequency()
     *
     * @return array<string, int>
     */
    public function charFreq(): array
    {
        return $this->characterFrequency();
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
     * Alias of $this->countLC()
     *
     * @return int
     */
    public function countLower(): int
    {
        return $this->countLC();
    }

    /**
     * returns the count of lines in a string
     *
     * @return int
     */
    public function countLines(): int
    {
        //given a large body of text, count the
        //number of lines in the text that are separated
        //by a newline character, return character, break character
        //or a combination of these characters

        //example: 'abc123\n abc123' > countLines() = 1
        return count(preg_split('/(\r\n|\n|\r)/', $this->string));
    }

    /**
     * alias of $this->countLines()
     *
     * @return int
     */
    public function countNewlines(): int
    {
        return $this->countLines();
    }

    /**
     * alias of $this->countLines()
     *
     * @return int
     */
    public function lineCount(): int
    {
        return $this->countLines();
    }

    /**
     * Alias of $this->countLC()
     *
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
     * Alias of $this->countNumeric()
     *
     * @return int
     */
    public function countNum(): int
    {
        return $this->countNumeric();
    }

    /**
     * Alias of $this->countNumeric()
     *
     * @return int
     */
    public function countNumber(): int
    {
        return $this->countNumeric();
    }

    /**
     * Alias of countLines, Assumes a new line indicates a new paragraph.
     * @return int
     */
    public function countParagraphs(): int
    {
        return $this->countLines();
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
        $sentences = explode('.', $this->string);
        //if any of them are empty, remove them
        $sentences = array_filter($sentences, fn ($sentence) => !empty($sentence));
        //return the count
        return count($sentences);
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
     * alias of $this->countUC()
     *
     * @return int
     */
    public function countUppercase(): int
    {
        return $this->countUC();
    }

    /**
     * alias of $this->countUC()
     *
     * @return int
     */
    public function countUpper(): int
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
        //count all whitespaces, new lines, return characters, tabs, etc.
        $count = preg_match_all('/\s/', $this->string);

        return $count ?: 0;
    }

    /**
     * Repeat of the analyzer's wordCount method
     * alias of Analyzer::this->wordCount();
     *
     * @return int
     */
    public function countWords(): int
    {
        return $this->wordCount();
    }
}
