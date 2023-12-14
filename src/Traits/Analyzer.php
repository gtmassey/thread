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
     * Returns the most frequent character of the string,
     * excluding whitespace.
     * If two or more characters have the same frequency,
     * the first one encountered will be returned
     *
     * @return string
     */
    public function mostFrequentCharacter(): string
    {
        $string = preg_replace('/\s+/', '', $this->string);
        $frequency = [];
        $strLength = strlen($string);
        for ($i = 0; $i < $strLength; $i++) {
            $char = $string[$i];
            if (! isset($frequency[$char])) {
                $frequency[$char] = 0;
            }
            $frequency[$char]++;
        }

        $maxCount = max($frequency);

        return array_search($maxCount, $frequency);

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
        $string = preg_replace('/\s+/', '', $this->string);
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
     * returns the most frequent word in a string,
     * where a 'word' is considered a substring
     * separated by a space character or other whitespace
     * on both sides
     *
     * @return string
     */
    public function mostFrequentWord(): string
    {
        //TODO: check to make sure this works for
        //      situations where all words
        //      appear equally frequently
        $words = $this->splitOnWords();
        $frequency = [];
        foreach ($words as $word) {
            if (! isset($frequency[$word])) {
                $frequency[$word] = 0;
            }
            $frequency[$word]++;
        }

        $maxCount = max($frequency);

        return array_search($maxCount, $frequency);
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
        //TODO: check to make sure this works for
        //      situations where all words
        //      appear equally frequently
        $words = $this->splitOnWords();
        $frequency = [];
        foreach ($words as $word) {
            if (! isset($frequency[$word])) {
                $frequency[$word] = 0;
            }
            $frequency[$word]++;
        }

        arsort($frequency);

        return array_slice($frequency, 0, $n);
    }

    /**
     * Returns the number of words in a string, assumes
     * a standard space character (' ') as the word delimiter.
     *
     * @return int
     */
    public function wordCount(): int
    {
        //TODO: need to first check if the string
        //      is only whitespace, because exploding
        //      on whitespace only returns an array of empty
        //      strings, which defeats the purpose
        //
        //TODO: then, need to check if the split
        //      string array is empty, because if it is
        //      then the word count is 0
        return $this->length() === 0
            ? 0
            : count($this->splitOnWords());
    }
}
