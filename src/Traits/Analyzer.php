<?php

namespace Gtmassey\Thread\Traits;

trait Analyzer
{
    /**
     * Returns the length of the string
     *
     * @return int
     */
    public function length(): int
    {
        return strlen($this->string);
    }

    /**
     * Returns an array containing the most frequent character
     * and the number of times it occurs. If there is a tie
     * for the most frequent character, the first character
     * encountered with the highest frequency will be returned.
     * e.g. 'a a b b c c' will return ['a' => 2]
     *
     * @return array<string, int>
     */
    public function mostFrequentCharacter(): array
    {
        //first, get the string
        $string = $this->string;

        //now check if the string only contains whitespace
        $isWhitespace = (trim($string) === '');
        if ($isWhitespace) {
            return [];
        }

        //strip the whitespace
        $string = preg_replace('/\s+/', '', $string);

        //now, count the occurrence of each character
        //and return the most frequent character
        $frequency = [];
        $strLength = strlen($string);
        for ($i = 0; $i < $strLength; $i++) {
            $char = $string[$i];
            if (! isset($frequency[$char])) {
                $frequency[$char] = 0;
            }
            $frequency[$char]++;
        }

        //sort by most frequent
        arsort($frequency);

        //return the first element
        $keys = array_keys($frequency);
        $key = $keys[0];

        return [$key => $frequency[$key]];
    }

    /**
     * Returns the top n most frequent characters in a string,
     * along with their count. excluding whitespace
     * default n = 3 if not provided
     *
     * @param  int  $n
     * @return array<string, int>
     */
    public function mostFrequentCharacters(int $n = 3): array
    {
        //get the string
        $string = $this->string;

        //now check if the string only contains whitespace
        $isWhitespace = (trim($string) === '');
        if ($isWhitespace) {
            return [];
        }

        //strip the string
        $string = preg_replace('/\s+/', '', $string);

        //now, count the occurrence of each character
        $frequency = [];
        $strLength = strlen($string);
        for ($i = 0; $i < $strLength; $i++) {
            $char = $string[$i];
            if (! isset($frequency[$char])) {
                $frequency[$char] = 0;
            }
            $frequency[$char]++;
        }

        arsort($frequency);

        return array_slice($frequency, 0, $n);
    }

    /**
     * returns an array with the most frequent word
     * as the key and the number of times it occurs
     * as the value. A single element array
     *
     * If there is a tie for the most frequent word
     * the first word encountered with the highest frequency
     * will be returned. e.g. 'a a b b c c' will return ['a' => 2]
     *
     * @return array<string, int>
     */
    public function mostFrequentWord(): array
    {
        //get the string
        $string = $this->string;

        //first, check if the string is empty
        $length = $this->length();
        if ($length === 0) {
            return [];
        }

        //now check if the string only contains whitespace
        $isWhitespace = (trim($string) === '');
        if ($isWhitespace) {
            return [];
        }

        //now, split the string on a single
        //space character, and count the occurrence
        //of each word, then return an array only containing
        //the most frequent word
        $words = $this->splitOnWords();
        $frequency = array_count_values($words);
        arsort($frequency);

        return array_slice($frequency, 0, 1, true);

    }

    /**
     * returns the top n most frequent words in a string,
     * where a 'word' is considered a substring
     * separated by a space character or other whitespace
     * on both sides
     * default n = 3 if not provided
     *
     * @param  int  $n
     * @return array<string, int>
     */
    public function mostFrequentWords(int $n = 3): array
    {
        //get the string
        $string = $this->string;

        //first, check if the string is empty
        $length = $this->length();
        if ($length === 0) {
            return [];
        }

        //now check if the string only contains whitespace
        $isWhitespace = (trim($string) === '');
        if ($isWhitespace) {
            return [];
        }

        //now, split the string on a single
        //space character, and count the occurrence
        //of each word, then return the top n words
        //along with their count
        $words = $this->splitOnWords();
        $frequency = array_count_values($words);
        arsort($frequency);

        return array_slice($frequency, 0, $n, true);
    }

    /**
     * Returns the number of words in a string, assumes
     * a standard space character (' ') as the word delimiter.
     *
     * @return int
     */
    public function wordCount(): int
    {
        return str_word_count($this->string);
    }
}
