<?php

namespace Gtmassey\Twine;

class Twine
{
    use Traits\StringableTrait;

    /**
     * @var string|null
     */
    protected ?string $string = '';

    //each character in the string is an element in the array
    protected array $chars = [];

    //splitting the string by whitespace
    protected array $words = [];

    //sequences are arrays of strings that are split
    //from the original string based on a delimiter
    //it could be a period and space ". " or a comma and space ", "
    //or any other delimiter.
    protected array $sequences = [];

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
     *
     * @param  string|array<string>  $string
     * @return Twine
     */
    public static function from(string|array $string): Twine
    {
        return Twine::build($string);
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

    /*
     |--------------------------------------------------------------------------
     | STATIC FUNCTIONS
     |--------------------------------------------------------------------------
     */

    /**
     * @param  int|null  $n
     * @return string
     */
    public static function random(?int $n = 1): string
    {
        //return a random string of length n
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle($characters), 0, $n);
    }

    /**
     * @param  int|null  $n
     * @return string
     */
    public static function randomAlpha(?int $n = 1): string
    {
        //return a random string of length n
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle($characters), 0, $n);
    }

    /**
     * @param  int|null  $n
     * @return string
     */
    public static function randomNumeric(?int $n = 1): string
    {
        return '';
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
        return '';
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

    /*
     |--------------------------------------------------------------------------
     | PUBLIC FUNCTIONS
     |--------------------------------------------------------------------------

    /**
     * Returns the string property of the Twine object.
     */
    /**
     * @return string
     */
    public function toString(): string
    {
        return $this->string ?? '';
    }

    /**
     * @param  bool  $onWords
     * @return array<string>
     */
    public function toArray(bool $onWords = false): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    public function splitWords(): array
    {
        return [];
    }

    /**
     * @param  string  $substring
     * @return bool
     */
    public function contains(string $substring): bool
    {
        return true;
    }

    /**
     * @param  string  $substring
     * @return bool
     */
    public function containsAll(string $substring): bool
    {
        return true;
    }

    /**
     * @param  array<string>  $substrings
     * @return bool
     */
    public function containsAny(array $substrings): bool
    {
        return true;
    }

    /**
     * @param  array<string>  $substrings
     * @return bool
     */
    public function containsNone(array $substrings): bool
    {
        return true;
    }

    /**
     * @param  string  $substring
     * @return int
     */
    public function count(string $substring): int
    {
        return 0;
    }

    /**
     * @param  array<string>  $substrings
     * @return int
     */
    public function countAll(array $substrings): int
    {
        return 0;
    }

    /**
     * @param  array<string>  $substrings
     * @return int
     */
    public function countAny(array $substrings): int
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
     * @return int
     */
    public function wordCount(): int
    {
        return 0;
    }

    /**
     * @return array<string>
     */
    public function splitOnWords(): array
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
    public function splitOnUppercase(): array
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
     * @return array<string>
     */
    public function splitOnUC(): array
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
     * @return array<string>
     */
    public function splitOnEmpty(): array
    {
        return [];
    }

    /**
     * @param  string  $substring
     * @return int
     */
    public function countSubstring(string $substring): int
    {
        return 0;
    }

    /**
     * @param  array<string>  $substrings
     * @return int
     */
    public function countSubstrings(array $substrings): int
    {
        return 0;
    }

    /**
     * @param  string  $substring
     * @return int
     */
    public function countChar(string $substring): int
    {
        return 0;
    }

    /**
     * @param  string  $substring
     * @return int
     */
    public function countCharacter(string $substring): int
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
     * @param  array<string>  $substrings
     * @return int
     */
    public function countCharacters(array $substrings): int
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
    public function countLowercase(): int
    {
        return 0;
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
    public function countLC(): int
    {
        return 0;
    }

    /**
     * @return int
     */
    public function countAlpha(): int
    {
        return 0;
    }

    /**
     * @return int
     */
    public function countNumeric(): int
    {
        return 0;
    }

    /**
     * @return int
     */
    public function countAlphaNumeric(): int
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
     * @return int
     */
    public function countWhitespace(): int
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
    public function countBinary(): int
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
    public function countLines(): int
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
    public function countParagraphs(): int
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
}
