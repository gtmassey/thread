<?php

namespace Gtmassey\Twine;

class Twine
{

    /*
     |--------------------------------------------------------------------------
     | TRAITS
     |--------------------------------------------------------------------------
     */
    use Traits\Analyzer;
    use Traits\Caser;
    use Traits\Counter;
    use Traits\Decoder;
    use Traits\Encoder;
    use Traits\Mutator;
    use Traits\Searcher;
    use Traits\Spacer;
    use Traits\Splitter;
    use Traits\Threader;
    use Traits\Trimmer;


    /*
     |--------------------------------------------------------------------------
     | CONSTANTS
     |--------------------------------------------------------------------------
     */
    const ALPHA_LOWER = 'abcdefghijklmnopqrstuvwxyz';
    const ALPHA_UPPER = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    const DIGITS = '0123456789';
    const HEX_LOWER = '0123456789abcdef';
    const HEX_UPPER = '0123456789ABCDEF';
    const BINARY = '01';
    const BASE64 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/';
    const OCTAL = '01234567';
    const E161 = [
        'a' => '2', 'b' => '22',
        'c' => '222', 'd' => '3',
        'e' => '33', 'f' => '333',
        'g' => '4', 'h' => '44',
        'i' => '444', 'j' => '5',
        'k' => '55', 'l' => '555',
        'm' => '6', 'n' => '66',
        'o' => '666', 'p' => '7',
        'q' => '77', 'r' => '777',
        's' => '7777', 't' => '8',
        'u' => '88', 'v' => '888',
        'w' => '9', 'x' => '99',
        'y' => '999', 'z' => '9999',
        ' ' => '0', '.' => '00',
    ];

    /*
     |--------------------------------------------------------------------------
     | PROPERTIES
     |--------------------------------------------------------------------------
     */
    /**
     * The string value
     *
     * @var string
     */
    protected string $string = '';

    /**
     * The encoded string value
     *
     * @var string
     */
    protected string $encodedString = '';


    /*
     |--------------------------------------------------------------------------
     | METHODS
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
     * Returns the string property of the
     * Twine object as an array of characters
     * @return string[]
     */
    public function __toArray(): array
    {
        return $this->toArray();
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
     * returns the string property
     * of the Twine object
     *
     * @return string
     */
    public function toString(): string
    {
        return $this->__toString();
    }

    /**
     * toString magic method. Returns the string property
     * of the Twine object.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->string ?? '';
    }

    /*
     |--------------------------------------------------------------------------
     | STATIC CONSTRUCTOR FUNCTIONS
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
        $characters = self::ALPHA_LOWER.self::ALPHA_UPPER.self::DIGITS;
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
        $alphabet = self::ALPHA_LOWER.self::ALPHA_UPPER;
        $randomString = '';
        for ($i = 0; $i < $n; $i++) {
            $randomString .= $alphabet[rand(0, strlen($alphabet) - 1)];
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
        $randomString = '';
        for ($i = 0; $i < $n; $i++) {
            $randomString .= self::DIGITS[rand(0, strlen(self::DIGITS) - 1)];
        }

        return $randomString;
    }

    /**
     * @param  int|null  $n
     * @return string
     */
    public static function randomHex(?int $n = 1, bool $uppercase = false): string
    {
        $randomString = '';
        if ($uppercase) {
            for ($i = 0; $i < $n; $i++) {
                $randomString .= self::HEX_UPPER[rand(0, strlen(self::HEX_UPPER) - 1)];
            }
        } else {
            for ($i = 0; $i < $n; $i++) {
                $randomString .= self::HEX_LOWER[rand(0, strlen(self::HEX_LOWER) - 1)];
            }
        }
        return $randomString;
    }

    /**
     * @param  int|null  $n
     * @return string
     */
    public static function randomBinary(?int $n = 1): string
    {
        $randomString = '';
        for ($i = 0; $i < $n; $i++) {
            $randomString .= self::BINARY[rand(0, strlen(self::BINARY) - 1)];
        }

        return $randomString;
    }

    /**
     * @param  int|null  $n
     * @return string
     */
    public static function randomBase64(?int $n = 1): string
    {
        $randomString = '';
        for ($i = 0; $i < $n; $i++) {
            $randomString .= self::BASE64[rand(0, strlen(self::BASE64) - 1)];
        }

        return $randomString;
    }

    /**
     * @param  int|null  $n
     * @return string
     */
    public static function randomOctal(?int $n = 1): string
    {
        $randomString = '';
        for ($i = 0; $i < $n; $i++) {
            $randomString .= self::OCTAL[rand(0, strlen(self::OCTAL) - 1)];
        }

        return $randomString;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public static function uuid(): string
    {
        $data = random_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
}
