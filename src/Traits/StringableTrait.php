<?php

namespace Gtmassey\Twine\Traits;

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

    public function trimFirstChar(): self
    {
        $this->string = substr($this->string, 1);
        return $this;
    }

    public function trimLastChar(): self
    {
        $this->string = substr($this->string, 0, -1);
        return $this;
    }

    public function trimFirstWord(): self
    {
        //split string into words
        $words = $this->splitWords();
        //remove first element
        array_shift($words);
        $this->string = implode(' ', $words);
        return $this;
    }

    public function trimLastWord(): self
    {
        //split string into words
        $words = $this->splitWords();
        //remove last element
        array_pop($words);
        $this->string = implode(' ', $words);
        return $this;
    }

    public function splitWords(): array
    {
        return explode(' ', $this->string);
    }

    public function trimStart(?string $needle = null): self
    {
        $this->string = ltrim($this->string, $needle);
        return $this;
    }

    public function trimEnd(?string $needle = null): self
    {
        $this->string = rtrim($this->string, $needle);
        return $this;
    }

    public function trimEnds(?string $needle = null): self
    {
        $this->string = trim($this->string, $needle);
        return $this;
    }

    /**
     * Removes excess whitespace from the string.
     * ex: '  hello   world  ' => 'hello world'
     *
     * @return self
     */
    public function compress(): self
    {
        $this->string = preg_replace('/\s+/', ' ', $this->string);
        return $this;
    }

    /**
     * Removes excess whitespace from the start of the string.
     * Leaves a single space at the start
     * Leaves the end of the string and between words alone
     *
     * ex: '    hello   world  ' => ' hello   world  '
     *
     * @return self
     */
    public function compressStart(): self
    {
        $this->string = preg_replace('/^\s+/', ' ', $this->string);
        return $this;
    }

    /**
     * Removes excess whitespace from the end of the string.
     * Leaves a single space at the end.
     * Leaves the start and between words alone
     *
     * ex: '  hello   world  ' => '  hello   world '
     *
     * @return self
     */
    public function compressEnd(): self
    {
        $this->string = preg_replace('/\s+$/', ' ', $this->string);
        return $this;
    }

    /**
     * Removes excess whitespace between words, leaving
     * only a single space between the words. Leaves
     * the start and end of the string alone.
     *
     * ex: '  hello   world  ' => '  hello world  '
     *
     * @return self
     */
    public function compressBetween(): self
    {
        $this->string = preg_replace('/\s+/', ' ', $this->string);
        return $this;
    }

    /**
     * Strips a string of all substrings that match the needle
     *
     * ex: 'Hello World 123' strip('123') => 'Hello World '
     * ex: 'Hello World 123' strip('ll') => 'Heo Word 123'
     * ex: 'Hello World 123' strip('lo') => 'He Wrd 123'
     *
     * @param string $char
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
     * Recursively strips a string of all substrings that match the
     * needles. Each needle is stripped from the string in order.
     *
     * ex: 'Hello World 123' stripChars(['123', 'll', 'o']) => 'He Wrd'
     *
     * @param array $chars
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
     * Unlike stripChar, stripSubstr removes all instances of the
     * substring from the string instead of the character from the
     * string.
     *
     * ex: 'Hello World 123' stripSubstr('ll') => 'Heo World 123'
     * Notice how the 'l' in 'World' is not removed because 'l' != 'll'
     *
     * @param string $needle
     * @return StringableTrait
     */
    public function stripSubstr(string $needle): self
    {
        $this->string = str_replace($needle, '', $this->string);
        return $this;
    }

    /**
     * Given an array of needles, stripSubstrs removes all instances
     * of each needle from the string in order. Preserves whitespace
     *
     * ex: 'aa bb cc dd ab ac' stripSubstrs(['aa', 'cc']) => ' bb  dd ab ac'
     * @param array $needles
     * @return StringableTrait
     */
    public function stripSubstrs(array $needles): self
    {
        foreach ($needles as $needle) {
            $this->stripSubstr($needle);
        }
        return $this;
    }

    /**
     * Removes all instances of the needle from the start of the string
     *
     * ex: 'Hello World 123' stripStart('Hello ') => 'World 123'
     * @param string $needle
     * @return StringableTrait
     */
    public function stripStart(string $needle): self
    {
        $this->string = preg_replace('/^' . $needle . '/', '', $this->string);
        return $this;
    }

    /**
     * Removes all instances of the needle from the end of the string
     *
     * ex: 'Hello World 123' stripEnd(' 123') => 'Hello World'
     * @param string $needle
     * @return StringableTrait
     */
    public function stripEnd(string $needle): self
    {
        $this->string = preg_replace('/' . $needle . '$/', '', $this->string);
        return $this;
    }

    public function toTitleCase(): self
    {
        $this->string = ucwords($this->string);
        return $this;
    }

    public function toLowerCase(): self
    {
        $this->string = strtolower($this->string);
        return $this;
    }

    public function toUpperCase(): self
    {
        $this->string = strtoupper($this->string);
        return $this;
    }

    public function toPascalCase(): self
    {
        $this->string = str_replace(' ', '', ucwords(str_replace('_', ' ', $this->string)));
        return $this;
    }

    public function toCamelCase(): self
    {
        $this->string = lcfirst($this->toPascalCase()->toString());
        return $this;
    }

    public function toSnakeCase(): self
    {
        $this->string = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $this->string));
        return $this;
    }

    public function toKebabCase(): self
    {
        $this->string = strtolower(preg_replace('/(?<!^)[A-Z]/', '-$0', $this->string));
        return $this;
    }

    public function toSnakeCaseUC(): self
    {
        $this->string = strtoupper(preg_replace('/(?<!^)[A-Z]/', '_$0', $this->string));
        return $this;
    }

    /**
     * Randomly switches characters from upper to lower
     * and lower to upper. Oft used in memes. No real use.
     *
     * ex: 'Programming is fun' => 'pRoGrAMmiNG iS FuN'
     * @return StringableTrait
     */
    public function toMemeCase(): self
    {
        $this->string = implode('', array_map(function ($c) {
            return rand(0, 1) ? strtoupper($c) : strtolower($c);
        }, str_split($this->string)));
        return $this;
    }

    public function ucFirst(): self
    {
        $this->string = ucfirst($this->string);
        return $this;
    }

    public function lcFirst(): self
    {
        $this->string = lcfirst($this->string);
        return $this;
    }

    public function ucLast(): self
    {
        $this->string = ucfirst(strrev($this->string));
        return $this;
    }

    public function lcLast(): self
    {
        $this->string = lcfirst(strrev($this->string));
        return $this;
    }

    public function reverse(): self
    {
        $this->string = strrev($this->string);
        return $this;
    }

}
