<?php

namespace Gtmassey\Twine\Traits;

trait Splitter
{

    /**
     * @return array<string>
     */
    public function split(): array
    {
        return [];
    }

    /**
     * @param  string  $substring
     * @return array<string>
     */
    public function splitOn(string $substring): array
    {
        return [];
    }

    /**
     * @param  string  $substring
     * @return array<string>
     */
    public function splitOnChar(string $substring): array
    {
        return [];
    }

    /**
     * @param  string  $substring
     * @return array<string>
     */
    public function splitOnCharacter(string $substring): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    public function splitOnEmpty(): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    public function splitOnLC(): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    public function splitOnLowercase(): array
    {
        return [];
    }

    /**
     * @param  string  $substring
     * @return array<string>
     */
    public function splitOnSubstr(string $substring): array
    {
        return [];
    }

    /**
     * @param  string  $substring
     * @return array<string>
     */
    public function splitOnSubstring(string $substring): array
    {
        return [];
    }

    /**
     * Returns an array of substrings where the string
     * is split on uppercase characters.
     * This is a destructive split, as the uppercase
     * character is no longer present in the resulting array,
     * which means the array cannot be joined back together
     * to form the original string.
     *
     * @return string[]
     */
    public function splitOnUC(): array
    {
        $arr = preg_split('/(?=[A-Z])/', $this->string, -1, PREG_SPLIT_NO_EMPTY);
        if (!$arr) {
            return [];
        }

        return $arr;
    }

    /**
     * Alias of splitOnUC()
     *
     * @return array<string>
     */
    public function splitOnUppercase(): array
    {
        return $this->splitOnUppercase();
    }

    /**
     * Alias of splitOnWords()
     *
     * @return string[]
     */
    public function splitWords(): array
    {
        return $this->splitOnWords();
    }

    /**
     * Returns an array of words in the string
     * Assumes a standard space character (' ')
     * as the word delimiter.
     *
     * @return string[]
     */
    public function splitOnWords(): array
    {
        return explode(' ', $this->string);
    }
}
