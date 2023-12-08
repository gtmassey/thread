<?php

namespace Gtmassey\Thread\Traits;

use Gtmassey\Thread\Thread;

/**
 * Trait Trimable
 *
 * This trait contains methods for trimming strings.
 * Any action that removes characters from the string is
 * considered a trim action in this package.
 */
trait Trimmer
{
    /**
     * strip the string of all alphabetic characters
     * keeps special characters in the string
     *
     * example: 'abc123!' > stripAlpha() > '123!'
     *
     * @return Thread
     */
    public function stripAlpha(): Thread
    {
        $this->string = preg_replace('/[a-zA-Z]+/', '', $this->string) ?? '';

        return $this;
    }

    /**
     * strip the string of all alphabetic
     * and numeric characters
     *
     * example: 'abc123!' > stripAlphaNumeric() > '!'
     *
     * @return Thread
     */
    public function stripAlphaNumeric(): Thread
    {
        $this->string = preg_replace('/[a-zA-Z0-9]+/', '', $this->string) ?? '';

        return $this;
    }

    /**
     * strip the string of all non-numeric characters
     *
     * example: 'abc123!' > stripNonNumeric() > '123'
     *
     * @return Thread
     */
    public function stripNonNumeric(): Thread
    {
        $this->string = preg_replace('/[^0-9]/', '', $this->string) ?? '';

        return $this;
    }

    /**
     * strip the string of all numeric characters
     *
     * example: 'abc123' > stripNumeric() > 'abc'
     *
     * @return Thread
     */
    public function stripNumeric(): Thread
    {
        $this->string = preg_replace('/[0-9]/', '', $this->string) ?? '';

        return $this;
    }

    /**
     * strip the string of all special characters
     * (non alpha-numeric)
     *
     * example: 'abc123!' > stripSpecial() > 'abc123'
     *
     * @return Thread
     */
    public function stripSpecial(): Thread
    {
        $this->string = preg_replace('/[^A-Za-z0-9]/', '', $this->string) ?? '';

        return $this;
    }

    /**
     * strip the string all occurrences of substring
     *
     * example: 'abc123' > stripSubstring('a') > 'bc123'
     * example: 'abc123' > stripSubstring('d') > 'abc123'
     *
     * @param  string  $substring
     * @return Thread
     */
    public function stripSubstring(string $substring): Thread
    {
        $this->string = str_replace($substring, '', $this->string);

        return $this;
    }

    /**
     * strip the last "word" of the string
     * of all occurrences of substring
     *
     * example: 'abc123' > stripLastSubstring('3') > 'abc12'
     * example: 'Hello World' > stripEnd('l') > 'Hello Word'
     * example: 'Hello World' > stripEnd('ll') > 'Hello World'
     *
     * @param  string  $substring
     * @return Thread
     */
    public function stripSubstringFromEnd(string $substring): Thread
    {
        $string = $this->string;
        $words = explode(' ', $string);
        $lastWord = array_pop($words);
        $lastWord = str_replace($substring, '', $lastWord);
        $words[] = $lastWord;
        $this->string = implode(' ', $words);

        return $this;
    }

    /**
     * strip the first "word" of the string
     * of all occurrences of substring
     *
     * example: 'abc123' > stripFirstSubstring('a') > 'bc123'
     * example: 'Hello World' > stripStart('ll') > 'Heo World'
     * example: 'Hello World' > stripStart('x') > 'Hello World'
     *
     * @param  string  $substring
     * @return Thread
     */
    public function stripSubstringFromStart(string $substring): Thread
    {
        $string = $this->string;
        $words = explode(' ', $string);
        $firstWord = array_shift($words);
        $firstWord = str_replace($substring, '', $firstWord);
        //add the 'first word' back to the beginning of the array
        array_unshift($words, $firstWord);

        $this->string = implode(' ', $words);

        return $this;
    }

    /**
     * strip the string of all substrings in array
     *
     * example: 'abc123' > stripSubstrings(['a', '1']) > 'bc23'
     *
     * @param  string[]  $substrings
     * @return Thread
     */
    public function stripSubstrings(array $substrings): Thread
    {
        //strip a string of the given substrings
        foreach ($substrings as $substring) {
            $this->string = str_replace($substring, '', $this->string);
        }

        return $this;
    }

    /**
     * strip the string of all whitespace characters
     * (space, tab, newline, carriage return, vertical tab, form feed)
     *
     * example: 'abc 123' > stripWhitespace() > 'abc123'
     *
     * @return Thread
     */
    public function stripWhitespace(): Thread
    {
        $this->string = preg_replace('/\s+/', '', $this->string) ?? '';

        return $this;
    }

    /**
     * remove whitespace from beginning and end of string
     *
     * example: '   hello   world   ' > trim() > 'hello   world'
     *
     * @return Thread
     */
    public function trim(): Thread
    {
        $this->string = trim($this->string);

        return $this;
    }

    /**
     * remove whitespace from end of string
     *
     * example: '   hello   world   ' > trimEnd() > '   hello   world'
     *
     * @return Thread
     */
    public function trimEnd(): Thread
    {
        $this->string = rtrim($this->string);

        return $this;
    }

    /**
     * remove first and last character from string
     *
     * example: 'Hello' > trimBothEndChars() > 'ell'
     *
     * @return Thread
     */
    public function trimFirstAndLastChar(): Thread
    {
        return $this;
    }

    /**
     * remove first and last word from string
     *
     * example: 'Hello world and universe!' > trimBothEndWords() > 'world and'
     *
     * @return Thread
     */
    public function trimFirstAndLastWords(): Thread
    {
        $arr = explode(' ', $this->string);
        array_shift($arr);
        array_pop($arr);
        $this->string = implode(' ', $arr);

        return $this;
    }

    /**
     * remove first character from string
     *
     * example: 'Hello' > trimFirstChar() > 'ello'
     *
     * @return Thread
     */
    public function trimFirstChar(): Thread
    {
        return $this;
    }

    /**
     * remove first word from string
     *
     * example: 'Hello world and universe!' > trimFirstWord() > 'world and universe!'
     *
     * @return Thread
     */
    public function trimFirstWord(): Thread
    {
        $arr = explode(' ', $this->string);
        array_shift($arr);
        $this->string = implode(' ', $arr);

        return $this;
    }

    /**
     * remove last character from string
     *
     * example: 'Hello' > trimLastChar() > 'Hell'
     *
     * @return Thread
     */
    public function trimLastChar(): Thread
    {
        return $this;
    }

    /**
     * remove last word from string
     *
     * example: 'Hello world and universe!' > trimLastWord() > 'Hello world and'
     *
     * @return Thread
     */
    public function trimLastWord(): Thread
    {
        $arr = explode(' ', $this->string);
        array_pop($arr);
        $this->string = implode(' ', $arr);

        return $this;
    }

    /**
     * remove whitespace from beginning of string
     *
     * example: '   hello   world   ' > trimStart() > 'hello   world   '
     *
     * @return Thread
     */
    public function trimStart(): Thread
    {
        $this->string = ltrim($this->string);

        return $this;
    }

    /**
     * remove the substring from the last occurrence of the string
     *
     * example: 'abc123abc123' > trimSubstringFromEnd('abc') > 'abc123123'
     * example: 'a ab ac ad ae af' > trimSubstringFromEnd('a') > 'a ab ac ad ae f'
     *
     * @param  string  $substring
     * @return Thread
     */
    public function trimSubstringFromEnd(string $substring): Thread
    {
        return $this;
    }

    /**
     * remove the substring from the first occurrence of the string
     * but leave all other occurrences of the substring alone
     *
     * example: 'abc123abc123' > trimSubstring('abc') > '123abc123'
     * example: 'a ab ac ad ae af' > trimSubstring('a') > ' ab ac ad ae af'
     *
     * @param  string  $substring
     * @return Thread
     */
    public function trimSubstringFromStart(string $substring): Thread
    {
        return $this;
    }

    /**
     * remove the substring from the first and last occurrence of the string
     *
     * example: 'abc123abc123' > trimSubstringFromBothEnds('abc') > '123123'
     * example: 'a ab ac ad ae af' > trimSubstringFromBothEnds('a') > ' ab ac ad ae f'
     *
     * @param  string  $substring
     * @return Thread
     */
    public function trimSubstringFromStartAndEnd(string $substring): Thread
    {
        return $this;
    }
}
