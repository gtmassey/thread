<?php

namespace Gtmassey\Twine;

class Twine
{
    use Traits\StringableTrait;

    protected string $string = '';

    /*
     |--------------------------------------------------------------------------
     | CONSTRUCTORS
     |--------------------------------------------------------------------------
     */

    /**
     * Constructor. accepts a string or null value.
     * If null, defaults to an empty string: ""
     */
    public function __construct(string $string = null)
    {
        $this->string = $string ?? '';
    }

    /**
     * Static constructor alias. Accepts a string or an array of strings.
     * ex: Twine::from('Hello') = new Twine('Hello')
     * ex: Twine::from(['Hello', 'World']) = new Twine('Hello World')
     */
    public static function from(string|array $string): Twine
    {
        return Twine::build($string);
    }

    /**
     * Static constructor alias. Accepts a string or an array of strings.
     * ex: Twine::make('Hello') = new Twine('Hello')
     * ex: Twine::make(['Hello', 'World']) = new Twine('Hello World')
     */
    public static function make(string|array $string): Twine
    {
        return Twine::build($string);
    }

    /**
     * Static constructor alias. Accepts a string or an array of strings.
     * ex: Twine::of('Hello') = new Twine('Hello')
     * ex: Twine::of(['Hello', 'World']) = new Twine('Hello World')
     */
    public static function of(string|array $string): Twine
    {
        return Twine::build($string);
    }

    /**
     * Private static constructor helper, implodes an array of strings
     * with a space, or uses the existing string to pass to the
     * default Twine constructor. Returns new Twine instance.
     */
    private static function build(string|array $string): Twine
    {
        if (is_array($string)) {
            $string = implode(' ', $string);
        }

        return new self($string);
    }

    /*
     |--------------------------------------------------------------------------
     | STATIC FUNCTIONS
     |--------------------------------------------------------------------------
     */

    public static function random(?int $n = 1): string
    {
        //return a random string of length n
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle($characters), 0, $n);
    }

    public static function randomAlpha(?int $n = 1): string
    {
        //return a random string of length n
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle($characters), 0, $n);
    }

    public static function randomNumeric(?int $n = 1): string
    {
        return '';
    }

    public static function randomHex(?int $n = 1): string
    {
        return '';
    }

    public static function randomBinary(?int $n = 1): string
    {
        return '';
    }

    public static function randomBase64(?int $n = 1): string
    {
        return '';
    }

    public static function randomOctal(?int $n = 1): string
    {
        return '';
    }

    public static function uuid(): string
    {
        //TODO: generate a UUID
        return '';
    }

    /*
     |--------------------------------------------------------------------------
     | PUBLIC FUNCTIONS
     |--------------------------------------------------------------------------

    /**
     * Returns the string property of the Twine object.
     */
    public function toString(): string
    {
        return '';
    }

    public function toArray(bool $onWords = false): array
    {
        return [];
    }

    public function splitWords(): array
    {
        return true;
    }

    public function contains(string $substring): bool
    {
        return true;
    }

    public function containsAll(string $substring): bool
    {
        return true;
    }

    public function containsAny(array $substrings): bool
    {
        return true;
    }

    public function containsNone(array $substrings): bool
    {
        return true;
    }

    public function count(string $substring): int
    {
        return true;
    }

    public function countAll(array $substrings): int
    {
        return 0;
    }

    public function countAny(array $substrings): int
    {
        return 0;
    }

    public function length(): int
    {
        return 0;
    }

    public function wordCount(): int
    {
        return 0;
    }

    public function splitOnWords(): array
    {
        return [];
    }

    public function splitOnSubstring(string $substring): array
    {
        return [];
    }

    public function splitOnSubstr(string $substring): array
    {
        return [];
    }

    public function splitOnChar(string $substring): array
    {
        return [];
    }

    public function splitOnCharacter(string $substring): array
    {
        return [];
    }

    public function splitOnUppercase(): array
    {
        return [];
    }

    public function splitOnLowercase(): array
    {
        return [];
    }

    public function splitOnUC(): array
    {
        return [];
    }

    public function splitOnLC(): array
    {
        return [];
    }

    public function split(): array
    {
        return [];
    }

    public function splitOn(string $substring): array
    {
        return [];
    }

    public function splitOnEmpty(): array
    {
        return [];
    }

    public function countSubstring(string $substring): int
    {
        return 0;
    }

    public function countSubstrings(array $substrings): int
    {
        return 0;
    }

    public function countChar(string $substring): int
    {
        return 0;
    }

    public function countCharacter(string $substring): int
    {
        return 0;
    }

    public function countChars(array $substrings): int
    {
        return 0;
    }

    public function countCharacters(array $substrings): int
    {
        return 0;
    }

    public function countUppercase(): int
    {
        return 0;
    }

    public function countLowercase(): int
    {
        return 0;
    }

    public function countUC(): int
    {
        return 0;
    }

    public function countLC(): int
    {
        return 0;
    }

    public function countAlpha(): int
    {
        return 0;
    }

    public function countNumeric(): int
    {
        return 0;
    }

    public function countAlphaNumeric(): int
    {
        return 0;
    }

    public function countSpecial(): int
    {
        return 0;
    }

    public function countWhitespace(): int
    {
        return 0;
    }

    public function countHex(): int
    {
        return 0;
    }

    public function countBinary(): int
    {
        return 0;
    }

    public function countWords(): int
    {
        return 0;
    }

    public function countLines(): int
    {
        return 0;
    }

    public function countSentences(): int
    {
        return 0;
    }

    public function countParagraphs(): int
    {
        return 0;
    }

    public function mostFrequentCharacter(): string
    {
        return '';
    }

    public function mostFrequentCharacters(int $n = 1): array
    {
        return [];
    }

    public function mostFrequentWord(): string
    {
        return '';
    }

    public function mostFrequentWords(int $n = 1): array
    {
        return [];
    }
}
