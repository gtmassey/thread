<?php

namespace Gtmassey\Twine;

class Twine
{
    use Traits\StringableTrait;

    /**
     * The string value
     *
     * @var string
     */
    protected string $string = '';

    /**
     * The characters of the string as an array
     *
     * @var string[]
     */
    protected array $chars = [];

    /**
     * The words of the string as an array
     *
     * @var string[]
     */
    protected array $words = [];

    /**
     * Specific sequences of the string as an array
     * with a key of the sequence's delimiter
     * and a value of an array of the sequence's
     *
     * @var array<string, array<string>>
     */
    protected array $sequences = [];

    /**
     * Constructor. accepts a string or null value.
     * If null, defaults to an empty string: ""
     */
    public function __construct(string $string = null)
    {
        $this->string = $string ?? '';
    }

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
            if (! str_contains($this->string, $string)) {
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
     * Returns the string property of the Twine object.
     */

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

    /**
     * @return int
     */
    public function length(): int
    {
        return 0;
    }

    /**
     * @return string
     */
    public function mostFrequentCharacter(): string
    {
        return '';
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
        if (! $arr) {
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

    /**
     * Converts the entire string into an array of characters.
     * If the $splitOnWords parameter is true, the string will be split
     * into an array of words using $this->splitOnWords().
     *
     * @param  bool  $splitOnWords
     * @return array<string>
     */
    public function toArray(bool $splitOnWords = false): array
    {
        if ($splitOnWords) {
            return $this->splitOnWords();
        }

        return str_split($this->string);
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return $this->string ?? '';
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

    /*
     |--------------------------------------------------------------------------
     | STATIC FUNCTIONS
     |--------------------------------------------------------------------------
     */

    /**
     * Static constructor alias. Accepts a string or an array of strings.
     * ex: Twine::from('Hello') = new Twine('Hello')
     * ex: Twine::from(['Hello', 'World']) = new Twine('Hello World')
     *
     * @param  string|array<string>  $string
     * @return Twine
     */
    public static function from(string|array $string): Twine
    {
        return Twine::build($string);
    }

    /**
     * Private static constructor helper, implodes an array of strings
     * with a space, or uses the existing string to pass to the
     * default Twine constructor. Returns new Twine instance.
     *
     * @param  string|array<string>  $string
     * @return Twine
     */
    private static function build(string|array $string): Twine
    {
        if (is_array($string)) {
            $string = implode(' ', $string);
        }

        return new self();
    }

    /**
     * Static constructor alias. Accepts a string or an array of strings.
     * ex: Twine::make('Hello') = new Twine('Hello')
     * ex: Twine::make(['Hello', 'World']) = new Twine('Hello World')
     *
     * @param  string|array<string>  $string
     * @return Twine
     */
    public static function make(string|array $string): Twine
    {
        return Twine::build($string);
    }

    /**
     * Static constructor alias. Accepts a string or an array of strings.
     * ex: Twine::of('Hello') = new Twine('Hello')
     * ex: Twine::of(['Hello', 'World']) = new Twine('Hello World')
     *
     * @param  string|array<string>  $string
     * @return Twine
     */
    public static function of(string|array $string): Twine
    {
        return Twine::build($string);
    }

    /**
     * @param  int|null  $n
     * @return string
     */
    public static function random(?int $n = 1): string
    {
        //return a random string of length n
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $n; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }

    /**
     * @param  int|null  $n
     * @return string
     */
    public static function randomAlpha(?int $n = 1): string
    {
        //return a random string of length n
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $n; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }

    /**
     * @param  int|null  $n
     * @return string
     */
    public static function randomNumeric(?int $n = 1): string
    {
        //return a random numeric string of length n
        $characters = '0123456789';
        $randomString = '';
        for ($i = 0; $i < $n; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }

    /**
     * @param  int|null  $n
     * @return string
     */
    public static function randomHex(?int $n = 1): string
    {
        return '';
    }

    /**
     * @param  int|null  $n
     * @return string
     */
    public static function randomBinary(?int $n = 1): string
    {
        $characters = '01';
        $randomString = '';
        for ($i = 0; $i < $n; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }

    /**
     * @param  int|null  $n
     * @return string
     */
    public static function randomBase64(?int $n = 1): string
    {
        return '';
    }

    /**
     * @param  int|null  $n
     * @return string
     */
    public static function randomOctal(?int $n = 1): string
    {
        return '';
    }

    /**
     * @return string
     */
    public static function uuid(): string
    {
        //TODO: generate a UUID
        return '';
    }
}
