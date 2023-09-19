<?php

namespace Gtmassey\Twine\Traits;

use Gtmassey\Twine\Twine;

trait StringableTrait
{
    /**
     * Some notes and vocabulary:
     *  - trim: in the context of this package
     *      the act of removing from the beginning
     *      and end of a string
     *  - strip:
     *      strip removes all instances of a
     *      character from a string based on the
     *      parameters and the needle passed in
     *  - to: converts the string from format a
     *      to format b, overwriting the original
     */

    /**
     * The english T9 dictionary
     *
     * @var array|string[]
     */
    public static array $T9 = [
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
    ];

    public function append(string $string): self
    {
        $this->string .= $string;

        return $this;
    }

    /**
     * Removes excess whitespace from the string.
     * ex: '  hello   world  ' => 'hello world'
     *
     * @return Twine|StringableTrait
     */
    public function compress(): self
    {
        $this->string = preg_replace('/\s+/', ' ', $this->string);

        return $this;
    }

    /**
     * Removes excess whitespace between words, leaving
     * only a single space between the words. Leaves
     * the start and end of the string alone.
     *
     * ex: '  hello   world  ' => '  hello world  '
     */
    public function compressBetween(): self
    {
        $this->string = preg_replace('/\s+/', ' ', $this->string);

        return $this;
    }

    /**
     * Removes excess whitespace from the end of the string.
     * Leaves a single space at the end.
     * Leaves the start and between words alone
     *
     * ex: '  hello   world  ' => '  hello   world '
     */
    public function compressEnd(): self
    {
        $this->string = preg_replace('/\s+$/', ' ', $this->string);

        return $this;
    }

    /**
     * Removes excess whitespace from the start of the string.
     * Leaves a single space at the start
     * Leaves the end of the string and between words alone
     *
     * ex: '    hello   world  ' => ' hello   world  '
     */
    public function compressStart(): self
    {
        $this->string = preg_replace('/^\s+/', ' ', $this->string);

        return $this;
    }

    public function decodeHTML(): self
    {
        $this->string = htmlspecialchars($this->string);

        return $this;
    }

    public function decodeJson(): self
    {
        $this->string = json_decode($this->string);

        return $this;
    }

    public function encodeHTML(): self
    {
        $this->string = htmlspecialchars_decode($this->string);

        return $this;
    }

    public function encodeJson(): self
    {
        $this->string = json_encode($this->string);

        return $this;
    }

    /**
     * Lowercases the first character of the string
     * ex: 'Hello world' => 'hello world'
     *
     * @return Twine|StringableTrait
     */
    public function lcFirst(): self
    {
        $this->string = lcfirst($this->string);

        return $this;
    }

    /**
     * Lowercases the last character of the string
     * ex: 'HELLO WORLD' => 'HELLO WORLd'
     *
     * @return Twine|StringableTrait
     */
    public function lcLast(): self
    {
        $this->string = lcfirst(strrev($this->string));

        return $this;
    }

    /**
     * Pads the end of a string with a given substring a
     * set number of times
     * ex: 'abcde' > padEnd('+=', 3) => 'abcde+=+=+='
     *
     * @return Twine|StringableTrait
     */
    public function padEnd(string $pad, int $length = 0): self
    {
        $this->string = str_pad($this->string, $length, $pad, STR_PAD_RIGHT);

        return $this;
    }

    /**
     * Pads both ends of a string with a given substring a
     * set number of times
     *
     * ex: 'abcde' > padEnds('+=', 3) => '+=+=+=abcde+=+=+='
     *
     * @return Twine|StringableTrait
     */
    public function padEnds(string $pad, int $length = 0): self
    {
        $this->string = str_pad($this->string, $length, $pad, STR_PAD_BOTH);

        return $this;
    }

    /**
     * Pads the start of a string with a given substring a
     * set number of times
     * ex: 'abcde' > padStart('+=', 3) => '+=+=+=abcde'
     *
     * @return Twine|StringableTrait
     */
    public function padStart(string $pad, int $length = 0): self
    {
        $this->string = str_pad($this->string, $length, $pad, STR_PAD_LEFT);

        return $this;
    }

    public function prepend(string $string): self
    {
        $this->string = $string.$this->string;

        return $this;
    }

    /**
     * Repeats a string n times, appending it to the end of itself
     * ex: 'a' > repeat(3) => 'aaa'
     * ex: 'a' > repeat(3, '-') => 'a-a-a'
     *
     * @return Twine|StringableTrait
     */
    public function repeat(int $times, string $separator = ''): self
    {
        $this->string = implode($separator, array_fill(0, $times, $this->string));

        return $this;
    }

    /**
     * Replaces all occurences of a substring with
     * a new substring.
     * ex: 'Hello World' > replace('World', 'Universe') => 'Hello Universe'
     * ex: 'Hello World' > replace('l', '1') => 'He11o Wor1d'
     *
     * @return Twine|StringableTrait
     */
    public function replace(string $search, string $replace): self
    {
        $this->string = str_replace($search, $replace, $this->string);

        return $this;
    }

    /**
     * Reverses a string
     * ex: 'Hello World' => 'dlroW olleH'
     *
     * @return Twine|StringableTrait
     */
    public function reverse(): self
    {
        $this->string = strrev($this->string);

        return $this;
    }

    /**
     * Recursively strips a string of all substrings that match the
     * needles. Each needle is stripped from the string in order.
     *
     * ex: 'Hello World 123' stripChars(['123', 'll', 'o']) => 'He Wrd'
     *
     * @return StringableTrait
     */
    public function stripChars(array $chars): self
    {
        foreach ($chars as $char) {
            $this->stripChar($char);
        }

        return $this;
    }

    /**
     * Strips a string of all substrings that match the needle
     *
     * ex: 'Hello World 123' strip('123') => 'Hello World '
     * ex: 'Hello World 123' strip('ll') => 'Heo Word 123'
     * ex: 'Hello World 123' strip('lo') => 'He Wrd 123'
     *
     * @return StringableTrait
     */
    public function stripChar(string $char): self
    {
        //first, convert the string to an array of single characters
        $this->string = str_split($this->string);
        //filter out the needle
        $this->string = array_filter($this->string, function ($c) use ($char) {
            return $c !== $char;
        });
        //convert back to a string
        $this->string = implode('', $this->string);

        //return
        return $this;
    }

    /**
     * Removes all instances of the needle from the end of the string
     * If the needle is null, then assume to strip whitespace.
     *
     * ex: 'Hello World 123' stripEnd(' 123') => 'Hello World'
     *
     * @return StringableTrait
     */
    public function stripEnd(string $needle): self
    {
        $this->string = preg_replace('/'.$needle.'$/', '', $this->string);

        return $this;
    }

    public function stripNonNumeric(): self
    {
        $this->string = preg_replace('/[^0-9]/', '', $this->string);

        return $this;
    }

    /**
     * Removes all instances of the needle from the start of the string
     *
     * ex: 'Hello World 123' stripStart('Hello ') => 'World 123'
     *
     * @return StringableTrait
     */
    public function stripStart(string $needle): self
    {
        $this->string = preg_replace('/^'.$needle.'/', '', $this->string);

        return $this;
    }

    /**
     * Unlike stripChar, stripSubstr removes all instances of the
     * substring from the string instead of the character from the
     * string.
     *
     * ex: 'Hello World 123' stripSubstr('ll') => 'Heo World 123'
     * Notice how the 'l' in 'World' is not removed because 'l' != 'll'
     *
     * @return StringableTrait
     */
    public function stripSubstring(string $needle): self
    {
        $this->string = str_replace($needle, '', $this->string);

        return $this;
    }

    /**
     * Given an array of needles, stripSubstrs removes all instances
     * of each needle from the string in order. Preserves whitespace
     *
     * ex: 'aa bb cc dd ab ac' stripSubstrs(['aa', 'cc']) => ' bb  dd ab ac'
     *
     * @return StringableTrait
     */
    public function stripSubstrings(array $needles): self
    {
        foreach ($needles as $needle) {
            $this->stripSubstr($needle);
        }

        return $this;
    }

    public function stripWhitespace(): self
    {
        $this->string = preg_replace('/\s+/', '', $this->string);

        return $this;
    }

    /**
     * Converts a string to camelCase
     *
     * ex: 'hello world' => 'helloWorld'
     *
     * @return Twine|StringableTrait
     */
    public function toCamelCase(): self
    {
        $this->string = lcfirst($this->toPascalCase()->toString());

        return $this;
    }

    /**
     * Converts a string to PascalCase
     *
     * ex: 'hello world' => 'HelloWorld'
     *
     * @return Twine|StringableTrait
     */
    public function toPascalCase(): self
    {
        $this->string = str_replace(' ', '', ucwords(str_replace('_', ' ', $this->string)));

        return $this;
    }

    /**
     * Converts a string to kebab-case
     *
     * ex: 'Hello World' => 'hello-world'
     *
     * @return Twine|StringableTrait
     */
    public function toKebabCase(): self
    {
        //first convert to lower case
        $this->toLowerCase();
        //then replace spaces with dashes
        $this->string = preg_replace('/(?<!^)[A-Z]/', '-$0', $this->string);

        //return
        return $this;
    }

    /**
     * Randomly switches characters from upper to lower
     * and lower to upper. Oft used in memes. No real use.
     *
     * ex: 'Programming is fun' => 'pRoGrAMmiNG iS FuN'
     *
     * @return StringableTrait
     */
    public function toMemeCase(): self
    {
        $this->string = implode('', array_map(function ($c) {
            return rand(0, 1) ? strtoupper($c) : strtolower($c);
        }, str_split($this->string)));

        return $this;
    }

    /**
     * Converts a string to snake_case
     *
     * ex: 'Hello World' => 'hello_world'
     *
     * @return Twine|StringableTrait
     */
    public function toSnakeCase(): self
    {
        //first convert to lower case
        $this->toLowerCase();
        //then replace spaces with underscores
        $this->string = str_replace(' ', '_', $this->string);

        //return
        return $this;
    }

    /**
     * Converts all uppercase characters to lowercase
     * in the string, regardless of position
     *
     * ex: 'Hello World' => 'hello world'
     *
     * @return Twine|StringableTrait
     */
    public function toLowerCase(): self
    {
        $this->string = strtolower($this->string);

        return $this;
    }

    /**
     * Converts a string to UPPERCASE_SNAKE_CASE
     * ex: 'Hello World' => 'HELLO_WORLD'
     *
     * @return Twine|StringableTrait
     */
    public function toSnakeCaseUC(): self
    {
        //first, convert to uppercase
        $this->toUpperCase();
        //then replace spaces with underscores
        $this->string = preg_replace('/(?<!^)[A-Z]/', '_$0', $this->string);

        //return
        return $this;
    }

    /**
     * converts all lowercase characters to uppercase
     * in the string, regardless of position
     *
     * ex: 'Hello World' => 'HELLO WORLD'
     *
     * @return Twine|StringableTrait
     */
    public function toUpperCase(): self
    {
        $this->string = strtoupper($this->string);

        return $this;
    }

    /**
     * Converts a string to the english T9 text equivalent
     * with spaces between each word.
     * ex: 'Hello World' => '4433555 96753'
     *
     * @return Twine|StringableTrait
     */
    public function toT9(): self
    {
        $this->string = implode(' ', array_map(function ($word) {
            return implode('', array_map(function ($char) {
                return array_search($char, self::$T9);
            }, str_split($word)));
        }, explode(' ', $this->string)));

        return $this;
    }

    /**
     * Converts a string's format to Title Case:
     *
     * ex: 'hello world' => 'Hello World'
     *
     * @return Twine|StringableTrait
     */
    public function toTitleCase(): self
    {
        $this->string = ucwords($this->string);

        return $this;
    }

    /**
     * Removes the first character from the string
     *
     * ex: 'Hello World' => 'ello World'
     *
     * @return Twine|StringableTrait
     */
    public function trimFirstChar(): self
    {
        $this->string = substr($this->string, 1);

        return $this;
    }

    /**
     * Removes the first word from the string.
     *
     * ex: 'Hello World' => 'World'
     *
     * @return Twine|StringableTrait
     */
    public function trimFirstWord(): self
    {
        //split string into words
        $words = $this->splitWords();
        //remove first element
        array_shift($words);
        $this->string = implode(' ', $words);

        return $this;
    }

    /**
     * Removes the last character from the string
     *
     * ex: 'Hello World' => 'Hello Worl'
     *
     * @return Twine|StringableTrait
     */
    public function trimLastChar(): self
    {
        $this->string = substr($this->string, 0, -1);

        return $this;
    }

    /**
     * Removes the last word from the string.
     * Trims whitespace when concatenating the
     * remaining words back together.
     *
     * ex: 'Hello World' => 'Hello'
     *
     * @return Twine|StringableTrait
     */
    public function trimLastWord(): self
    {
        //split string into words
        $words = $this->splitWords();
        //remove last element
        array_pop($words);
        $this->string = implode(' ', $words);

        return $this;
    }

    /**
     * Trims a given substring from the end of the string. If the
     * substring does not exist, the string is left unchanged
     *
     * ex: 'Hello World' > trimSubstrFromEnd(' World') => 'Hello'
     * ex: 'Hello World' > trimSubstrFromEnd(' Universe') => 'Hello World'
     *
     * @return Twine|StringableTrait
     */
    public function trimSubstrFromEnd(string $needle = null): self
    {
        $this->string = rtrim($this->string, $needle);

        return $this;
    }

    /**
     * Trims a given substring from the start and end of the string.
     * If the substring does not exist at those positions,
     * the string is left unchanged
     *
     * ex: 'abcdefga' > trimSubstrFromEnds('a') => 'bcdefg'
     * ex: 'abcdefga' > trimSubstrFromEnds('howdy') => 'abcdefga'
     *
     * @return Twine|StringableTrait
     */
    public function trimSubstrFromEnds(string $needle = null): self
    {
        $this->string = trim($this->string, $needle);

        return $this;
    }

    /**
     * Removes the given substring from the start of the string if
     * it exists. If the substring does not exist, the string is
     * left unchanged
     *
     * ex: 'Hello World' > trimSubstrFromStart('Hello ') => 'World'
     * ex: 'Hello World' > trimSubstrFromStart('Goodbye ') => 'Hello World'
     *
     * @return Twine|StringableTrait
     */
    public function trimSubstrFromStart(string $needle = null): self
    {
        $this->string = ltrim($this->string, $needle);

        return $this;
    }

    /**
     * Capitalizes the first character of the string
     * ex: 'hello world' => 'Hello world'
     *
     * @return Twine|StringableTrait
     */
    public function ucFirst(): self
    {
        $this->string = ucfirst($this->string);

        return $this;
    }

    /**
     * Capitalizes the last character of the string
     * ex: 'hello world' => 'hello worlD'
     *
     * @return Twine|StringableTrait
     */
    public function ucLast(): self
    {
        $this->string = ucfirst(strrev($this->string));

        return $this;
    }
}
