<?php

namespace Gtmassey\Twine\Traits;

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
     * Returns the most frequent character of the string
     *
     * @return string
     */
    public function mostFrequentCharacter(): string
    {
        $frequency = [];
        $strLength = strlen($this->string);
        for ($i = 0; $i < $strLength; $i++) {
            $char = $this->string[$i];
            if (!isset($frequency[$char])) {
                $frequency[$char] = 0;
            }
            $frequency[$char]++;
        }

        $maxCount = max($frequency);
        return array_search($maxCount, $frequency);

    }

    /**
     * @param  int  $n
     * @return array<string, int>
     */
    public function mostFrequentCharacters(int $n = 1): array
    {
        return [];
    }

    /**
     * @return string
     */
    public function mostFrequentWord(): string
    {
        return '';
    }

    /**
     * @param  int  $n
     * @return array<string, int>
     */
    public function mostFrequentWords(int $n = 1): array
    {
        return [];
    }

    /**
     * Returns the number of words in a string, assumes
     * a standard space character (' ') as the word delimiter.
     *
     * @return int
     */
    public function wordCount(): int
    {
        return count($this->splitOnWords());
    }
}
