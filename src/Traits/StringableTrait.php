<?php

namespace Gtmassey\Twine\Traits;

use Gtmassey\Twine\Twine;

trait StringableTrait
{
    public static array $e161 = [
        'a' => '2',
        'b' => '22',
        'c' => '222',
        'd' => '3',
        'e' => '33',
        'f' => '333',
        'g' => '4',
        'h' => '44',
        'i' => '444',
        'j' => '5',
        'k' => '55',
        'l' => '555',
        'm' => '6',
        'n' => '66',
        'o' => '666',
        'p' => '7',
        'q' => '77',
        'r' => '777',
        's' => '7777',
        't' => '8',
        'u' => '88',
        'v' => '888',
        'w' => '9',
        'x' => '99',
        'y' => '999',
        'z' => '9999',
        ' ' => '0',
    ];

    /**
     * append a string to the end of
     * the string.
     *
     * example: 'hello'->append(' world') = 'hello world'
     *
     * @param  string  $string
     * @return Twine
     */
    public function append(string $string): Twine
    {
        $this->string .= $string;

        return $this;
    }

    /**
     * Removes excess whitespace from string
     * Leaves only one space character between words
     * Trims whitespace from ends of string.
     *
     * example: '   hello   world   ' > 'hello world'
     *
     * @return Twine
     */
    public function compress(): Twine
    {
        $this->string = preg_replace('/\s+/', ' ', $this->string ?? '');

        return $this->trim();
    }

    /**
     * remove excess whitespace between words
     * leaves whitespace at start and end of
     * string alone.
     *
     * example: '   hello   world   ' > '   hello world   '
     *
     * @return Twine
     */
    public function compressBetween(): Twine
    {
        $this->string = preg_replace('/(?<=\S)\s+(?=\S)/', ' ', $this->string ?? '');

        return $this;
    }

    /**
     * remove excess whitespace at end of string
     * leaves all other whitespaces alone
     *
     * example: '   hello   world   ' > '   hello   world'
     *
     * @return Twine
     */
    public function compressEnd(): Twine
    {
        $this->string = rtrim($this->string ?? '');

        return $this;
    }

    /**
     * remove excess whitespace at start of string
     * leaves all other whitespaces alone
     *
     * example: '   hello   world   ' > 'hello   world   '
     *
     * @return Twine
     */
    public function compressStart(): Twine
    {
        $this->string = ltrim($this->string ?? '');

        return $this;
    }

    /**
     * convert HTML entities to HTML
     *
     * example: '&lt;h1&gt;Hello World&lt;/h1&gt;' > '<h1>Hello World</h1>'
     *
     * @return Twine
     */
    public function decodeHTML(): Twine
    {
        $this->string = html_entity_decode($this->string ?? '');

        return $this;
    }

    /**
     * convert JSON string to array
     *
     * example: '{"name":"John","age":30}' > ['name' => 'John', 'age' => 30]
     *
     * @return Twine
     */
    public function decodeJson(): Twine
    {
        //TODO: handle array values in Twine object
        return $this;
    }

    /**
     * convert characters to HTML entities
     *
     * example: '<h1>Hello World</h1>' > '&lt;h1&gt;Hello World&lt;/h1&gt;'
     *
     * @return Twine
     */
    public function encodeHTML(): Twine
    {
        $this->string = htmlentities($this->string ?? '');

        return $this;
    }

    /**
     * convert array to JSON string
     *
     * example: ['name' => 'John', 'age' => 30] > '{"name":"John","age":30}'
     *
     * @return Twine
     */
    public function encodeJson(): Twine
    {
        //TODO: Handle array entities in Twine object
        return $this;
    }

    /**
     * convert first character to lowercase
     *
     * example: 'HELLO WORLD' > 'hELLO WORLD'
     *
     * @return Twine
     */
    public function lcFirst(): Twine
    {
        $this->string = lcfirst($this->string ?? '');

        return $this;
    }

    /**
     * convert last character to lowercase
     *
     * example: 'HELLO WORLD' > 'HELLO WORLd'
     *
     * @return Twine
     */
    public function lcLast(): Twine
    {
        $this->string = substr($this->string ?? '', 0, -1).strtolower(substr($this->string ?? '', -1));

        return $this;
    }

    /**
     * Append and prepend given fill string
     * to string until n length is reached
     *
     * example: 'Hi' > padBothEnds(10, '+=') > '+=+=Hi+=+='
     *
     * @param  int  $n
     * @param  string  $string
     * @return Twine
     */
    public function padBothEnds(int $n, string $string): Twine
    {
        $this->string = str_pad($this->string ?? '', $n, $string, STR_PAD_BOTH);

        return $this;
    }

    /**
     * append fill string to string until
     * n length is reached
     *
     * example: 'Hi' > padEnd(10, '+=') > 'Hi+=+=+=+='
     *
     * @param  int  $n
     * @param  string  $string
     * @return Twine
     */
    public function padEnd(int $n, string $string): Twine
    {
        $this->string = str_pad($this->string ?? '', $n, $string);

        return $this;
    }

    /**
     * prepend fill string to string until
     * n length is reached
     *
     * example: 'Hi' > padStart(10, '+=') > '+=+=+=+=Hi'
     *
     * @param  int  $n
     * @param  string  $string
     * @return Twine
     */
    public function padStart(int $n, string $string): Twine
    {
        $this->string = str_pad($this->string ?? '', $n, $string, STR_PAD_LEFT);

        return $this;
    }

    /**
     * add string to start of string
     *
     * example: 'world' > prepend('hello ') > 'hello world'
     *
     * @param  string  $string
     * @return Twine
     */
    public function prepend(string $string): Twine
    {
        $this->string = $string.$this->string;

        return $this;
    }

    /**
     * repeat string N times with separator
     * (default is no separator)
     *
     * example: 'hello' > repeat(3, ' ') > 'hello hello hello'
     * example: 'hello' > repeat(3) > 'hellohellohello'
     *
     * @param  int  $n
     * @param  string|null  $separator
     * @return Twine
     */
    public function repeat(int $n, ?string $separator = ''): Twine
    {
        $this->string = str_repeat($this->string.$separator, $n);

        return $this;
    }

    /**
     * replace all occurrences of substring with replacement
     *
     * example: 'hello world' > replace('world', 'universe') > 'hello universe'
     *
     * @param  string  $needle
     * @param  string  $replacement
     * @return Twine
     */
    public function replace(string $needle, string $replacement): Twine
    {
        $this->string = str_replace($needle, $replacement, $this->string ?? '');

        return $this;
    }

    /**
     * reverse string
     *
     * example: 'hello world' > reverse() > 'dlrow olleh'
     *
     * @return Twine
     */
    public function reverse(): Twine
    {
        $this->string = strrev($this->string ?? '');

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
            $this->string = str_replace($substring, '', $this->string ?? '');
        }

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
        $this->string = str_replace($substring, '', $this->string ?? '');

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
     * strip the string of all non-numeric characters
     *
     * example: 'abc123!' > stripNonNumeric() > '123'
     *
     * @return Twine
     */
    public function stripNonNumeric(): Twine
    {
        $this->string = preg_replace('/[^0-9]/', '', $this->string ?? '');

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
        $this->string = preg_replace('/[0-9]/', '', $this->string ?? '');

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
     * strip the string of all alphabetic characters
     * keeps special characters in the string
     *
     * example: 'abc123!' > stripAlpha() > '123!'
     *
     * @return Twine
     */
    public function stripAlpha(): Twine
    {
        $this->string = preg_replace('/[a-zA-Z]+/', '', $this->string ?? '');

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
        $this->string = preg_replace('/[a-zA-Z0-9]+/', '', $this->string ?? '');

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
        $this->string = preg_replace('/[^A-Za-z0-9]/', '', $this->string ?? '');

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
        $this->string = preg_replace('/\s+/', '', $this->string ?? '');

        return $this;
    }

    /**
     * convert string to camelCase
     *
     * example: 'hello world' > toCamelCase() > 'helloWorld'
     *
     * @return Twine
     */
    public function toCamelCase(): Twine
    {
        $this->string = lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $this->string ?? ''))));

        return $this;
    }

    /**
     * convert string to PascalCase
     *
     * example: 'hello world' > toPascalCase() > 'HelloWorld'
     *
     * @return Twine
     */
    public function toPascalCase(): Twine
    {
        $this->string = str_replace(' ', '', ucwords(str_replace('_', ' ', $this->string ?? '')));

        return $this;
    }

    /**
     * convert string to snake_case
     *
     * example: 'hello world' > toSnakeCase() > 'hello_world'
     *
     * @return Twine
     */
    public function toSnakeCase(): Twine
    {
        // Remove special characters and convert spaces to underscores
        $snake_string = preg_replace('/[^a-zA-Z0-9]+/', '_', $this->string ?? '');

        // Convert to lowercase
        $snake_string = strtolower($snake_string);

        // Trim underscores from the beginning and end
        $this->string = trim($snake_string, '_');

        return $this;
    }

    /**
     * convert string to kebab-case
     *
     * example: 'hello world' > toKebabCase() > 'hello-world'
     *
     * @return Twine
     */
    public function toKebabCase(): Twine
    {
        //remove special chars and add dash delimiter
        $kebab = preg_replace('/[^A-Za-z0-9]/', '-', $this->string ?? '');
        //convert to lowercase
        $kebab = strtolower($kebab);
        //trim dash from ends
        $kebab = trim($kebab, '-');
        //set string
        //TODO: write a setter function
        $this->string = $kebab;

        //return
        return $this;
    }

    /**
     * convert string to Title Case
     *
     * example: 'hello world' > toTitleCase() > 'Hello World'
     *
     * @return Twine
     */
    public function toTitleCase(): Twine
    {
        $this->string = ucwords($this->string ?? '');

        return $this;
    }

    /**
     * convert string to lowercase
     *
     * example: 'HELLO WORLD' > toLowerCase() > 'hello world'
     *
     * @return Twine
     */
    public function toLowerCase(): Twine
    {
        $this->string = strtolower($this->string ?? '');

        return $this;
    }

    /**
     * convert string to UPPERCASE
     *
     * example: 'hello world' > toUpperCase() > 'HELLO WORLD'
     *
     * @return Twine
     */
    public function toUpperCase(): Twine
    {
        $this->string = strtoupper($this->string ?? '');

        return $this;
    }

    /**
     * convert string to SNAKE_CASE
     *
     * example: 'hello world' > toSnakeCaseUC() > 'HELLO_WORLD'
     *
     * @return Twine
     */
    public function toSnakeCaseUC(): Twine
    {
        $this->toSnakeCase();
        $this->toUpperCase();

        return $this;
    }

    /**
     * convert string to KEBAB-CASE
     *
     * example: 'hello world' > toKebabCaseUC() > 'HELLO-WORLD'
     *
     * @return Twine
     */
    public function toKebabCaseUC(): Twine
    {
        $this->toKebabCase();
        $this->toUpperCase();

        return $this;
    }

    /**
     * convert string to mEmE cAsE
     *
     * example: 'hello world' > toMemeCase() > 'hElLo wOrLd'
     *
     * @return Twine
     */
    public function toMemeCase(): Twine
    {
        $arr = str_split($this->string ?? '');
        foreach ($arr as $key => $char) {
            if (rand(0, 1) == 1) {
                $arr[$key] = strtoupper($char);
            } else {
                $arr[$key] = strtolower($char);
            }
        }
        $this->string = implode('', $arr);

        return $this;
    }

    /**
     * convert string to e161 with a pipe char
     * as a delimiter, since the string 'aa' = 22
     * but the string 'b' is also 22.
     *
     * You can pass in a string argument to use
     * as a custom delimiter
     *
     * example: 'Hello' > toE161() > '44|33|555|555|666'
     *
     * @return Twine
     */
    public function toE161(?string $delimiter = '|'): Twine
    {
        $this->toLowerCase();
        $arr = str_split($this->string ?? '');
        foreach ($arr as $key => $char) {
            $arr[$key] = self::$e161[$char];
        }
        $this->string = implode($delimiter, $arr);

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
        $this->string = trim($this->string ?? '');

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
        $this->string = rtrim($this->string ?? '');

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
        $this->string = ltrim($this->string ?? '');

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
        $arr = explode(' ', $this->string ?? '');
        array_shift($arr);
        $this->string = implode(' ', $arr);

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
        $arr = explode(' ', $this->string ?? '');
        array_pop($arr);
        $this->string = implode(' ', $arr);

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
        $arr = explode(' ', $this->string ?? '');
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

    /**
     * convert first character to uppercase
     *
     * example: 'hello world' > ucFirst() > 'Hello world'
     *
     * @return Twine
     */
    public function ucFirst(): Twine
    {
        return $this;
    }

    /**
     * convert last character to uppercase
     *
     * example: 'hello world' > ucLast() > 'hello worlD'
     *
     * @return Twine
     */
    public function ucLast(): Twine
    {
        return $this;
    }

    /**
     * convert Nth character to uppercase
     * If the nth character is out of the string's
     * bounds, nothing happens and the string is
     * returned as is.
     *
     * example: 'hello world' > ucNth(3) > 'helLo world'
     *
     * @param  int  $n
     * @return Twine
     */
    public function ucNth(int $n): Twine
    {
        return $this;
    }

    /**
     * convert Nth character to lowercase
     * If the nth character is out of the string's
     * bounds, nothing happens and the string is
     * returned as is.
     *
     * example: 'HELLO WORLD' > lcNth(3) > 'HELlO WORLD'
     *
     * @param  int  $n
     * @return Twine
     */
    public function lcNth(int $n): Twine
    {
        return $this;
    }

    /**
     * convert the string to a URL friendly slug.
     * Most often uses the '-' as a separator
     * Optional argument to use a different separator.
     * If the separator is not url-safe (i.e. it's not a letter, number, underscore, or dash)
     * then the separator is replaced with a dash.
     *
     * example: 'Hello World' > toSlug() > 'hello-world'
     * example: 'Hello World' > toSlug('G') > 'helloGworld'
     * example: 'Hello World' > toSlug('_') > 'hello_world'
     *
     * @param  string  $separator
     * @return Twine
     */
    public function toSlug(string $separator): Twine
    {
        return $this;
    }

    /**
     * swap a substring for a substring in a string using strstr.
     * Accepts an array of substrings to swap and their values
     *
     * example: 'Hello World' > swap(['Hello' => 'Goodbye']) > 'Goodbye World'
     * example: 'Hello World' > swap(['Hello' => 'Goodbye', 'World' => 'Universe']) > 'Goodbye Universe'
     *
     * @param  array<string>  $swaps
     * @return Twine
     */
    public function swap(array $swaps): Twine
    {
        return $this;
    }

    /**
     * return the substring before the first occurrence of the string
     *
     * example: 'Hello World' > before('World') > 'Hello '
     *
     * @param  string  $delimiter
     * @return Twine
     */
    public function before(string $delimiter): Twine
    {
        return $this;
    }

    /**
     * return the substring after the first occurrence of the string
     *
     * example: 'Hello World' > after('Hello') > ' World'
     *
     * @param  string  $delimiter
     * @return Twine
     */
    public function after(string $delimiter): Twine
    {
        return $this;
    }

    /**
     * return the substring between the first occurrence of the first string
     * and the first occurrence of the second string
     *
     * example: 'Hello World' > between('H', 'd') > 'ello Worl'
     *
     * @param  string  $start
     * @param  string  $end
     * @return Twine
     */
    public function between(string $start, string $end): Twine
    {
        return $this;
    }

    /**
     * return the substring between the last occurrence of the
     * first string and the last occurrence of the second string
     *
     * example: 'Hello World' > betweenLast('l', 'l') > 'o Wor'
     *
     * @param  string  $start
     * @param  string  $end
     * @return Twine
     */
    public function betweenLast(string $start, string $end): Twine
    {
        return $this;
    }

    /**
     * return the substring before the last occurrence of the string
     *
     * example: 'Hello World' > beforeLast('l') > 'Hello Wor'
     *
     * @param  string  $delimiter
     * @return Twine
     */
    public function beforeLast(string $delimiter): Twine
    {
        return $this;
    }

    /**
     * mask the string with a character or substring.
     * Accepts an optional start and end position to mask
     * Also accepts a second optional making character
     *
     * example: 'Hello World' > mask() > '***********'
     * example: 'Hello World' > mask(1, 3) > 'H***o World'
     * example: 'Hello World' > mask(1, 3, 'x') > 'Hxxxo World'
     *
     * @param  int|null  $start
     * @param  int|null  $end
     * @param  string|null  $maskChar
     * @return Twine
     */
    public function mask(?int $start = 0, int $end = null, ?string $maskChar = '*'): Twine
    {
        return $this;
    }

    /**
     * Mask the string before a given substring
     * Accepts an optional making character
     *
     * example: 'email@website.com' > maskBefore('@') > "*****@website.com"
     *
     * @param  string  $delimiter
     * @param  string|null  $maskChar
     * @return Twine
     */
    public function maskBefore(string $delimiter, ?string $maskChar = '*'): Twine
    {
        return $this;
    }

    /**
     * Mask the string after a given substring
     * Accepts an optional making character
     *
     * example: 'email@website.com' > maskAfter('.') > "email@website.***"
     *
     * @param  string  $delimiter
     * @param  string|null  $maskChar
     * @return Twine
     */
    public function maskAfter(string $delimiter, ?string $maskChar = '*'): Twine
    {
        return $this;
    }

    /**
     * limit the string to a certain number of characters.
     * Accepts an optional ending character or substring
     *
     * example: 'Some long text' > limit(9) > 'Some long'
     * example: 'Some long text' > limit(9, '...') > 'Some long...'
     *
     * @param  int  $limit
     * @param  string|null  $end
     * @return Twine
     */
    public function limit(int $limit, ?string $end = ''): Twine
    {
        return $this;
    }
}
