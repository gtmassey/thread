<?php

namespace Gtmassey\Twine\Traits;

use Gtmassey\Twine\Twine;

/**
 * Trait Trimable
 *
 * This trait contains methods for trimming strings.
 * Any action that removes characters from the string is
 * considered a trim action in this package.
 *
 * @package Gtmassey\Twine\Traits
 */
trait Trimmer
{

    /**
     * strip the string of all alphabetic characters
     * keeps special characters in the string
     *
     * example: 'abc123!' > stripAlpha() > '123!'
     *
     * @return Twine
     */
    public function stripAlpha(): Twine
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
     * @return Twine
     */
    public function stripAlphaNumeric(): Twine
    {
        $this->string = preg_replace('/[a-zA-Z0-9]+/', '', $this->string) ?? '';

        return $this;
    }

    /**
     * strip the string of all non-numeric characters
     *
     * example: 'abc123!' > stripNonNumeric() > '123'
     *
     * @return Twine
     */
    public function stripNonNumeric(): Twine
    {
        $this->string = preg_replace('/[^0-9]/', '', $this->string) ?? '';

        return $this;
    }

    /**
     * strip the string of all numeric characters
     *
     * example: 'abc123' > stripNumeric() > 'abc'
     *
     * @return Twine
     */
    public function stripNumeric(): Twine
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
     * @return Twine
     */
    public function stripSpecial(): Twine
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
     * @return Twine
     */
    public function stripSubstring(string $substring): Twine
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
     * @return Twine
     */
    public function stripSubstringFromEnd(string $substring): Twine
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
     * @return Twine
     */
    public function stripSubstringFromStart(string $substring): Twine
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
     * @return Twine
     */
    public function stripSubstrings(array $substrings): Twine
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
     * @return Twine
     */
    public function stripWhitespace(): Twine
    {
        $this->string = preg_replace('/\s+/', '', $this->string) ?? '';

        return $this;
    }

    /**
     * remove whitespace from beginning and end of string
     *
     * example: '   hello   world   ' > trim() > 'hello   world'
     *
     * @return Twine
     */
    public function trim(): Twine
    {
        $this->string = trim($this->string);

        return $this;
    }

    /**
     * remove whitespace from end of string
     *
     * example: '   hello   world   ' > trimEnd() > '   hello   world'
     *
     * @return Twine
     */
    public function trimEnd(): Twine
    {
        $this->string = rtrim($this->string);

        return $this;
    }

    /**
     * remove first and last character from string
     *
     * example: 'Hello' > trimBothEndChars() > 'ell'
     *
     * @return Twine
     */
    public function trimFirstAndLastChar(): Twine
    {
        return $this;
    }

    /**
     * remove first and last word from string
     *
     * example: 'Hello world and universe!' > trimBothEndWords() > 'world and'
     *
     * @return Twine
     */
    public function trimFirstAndLastWords(): Twine
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
     * @return Twine
     */
    public function trimFirstChar(): Twine
    {
        return $this;
    }

    /**
     * remove first word from string
     *
     * example: 'Hello world and universe!' > trimFirstWord() > 'world and universe!'
     *
     * @return Twine
     */
    public function trimFirstWord(): Twine
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
     * @return Twine
     */
    public function trimLastChar(): Twine
    {
        return $this;
    }

    /**
     * remove last word from string
     *
     * example: 'Hello world and universe!' > trimLastWord() > 'Hello world and'
     *
     * @return Twine
     */
    public function trimLastWord(): Twine
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
     * @return Twine
     */
    public function trimStart(): Twine
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
     * @return Twine
     */
    public function trimSubstringFromEnd(string $substring): Twine
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
     * @return Twine
     */
    public function trimSubstringFromStart(string $substring): Twine
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
     * @return Twine
     */
    public function trimSubstringFromStartAndEnd(string $substring): Twine
    {
        return $this;
    }


}
