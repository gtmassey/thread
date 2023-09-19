<?php

namespace Gtmassey\Twine;

class Twine
{
    use Traits\StringableTrait;

    protected string $string = '';

    public function __construct(string $string = null)
    {
        $this->string = $string ?? '';
    }

    public static function from(string|array $string): Twine
    {
        return Twine::build($string);
    }

    public static function make(string|array $string): Twine
    {
        return Twine::build($string);
    }

    public static function of(string|array $string): Twine
    {
        return Twine::build($string);
    }

    private static function build(string|array $string): Twine
    {
        if (is_array($string)) {
            $string = implode(' ', $string);
        }

        return new self($string);
    }

    /**
     * returns true if the string contains the given substring
     * ex: 'Hello' > contains('ll') = true
     */
    public function contains(string $needle = null): bool
    {
        if (! isset($needle)) {
            return false;
        } else {
            return str_contains($this->string, $needle);
        }
    }

    /**
     * returns true ONLY if the string contains
     * ALL the needles
     * ex: 'Hello' > containsAll(['ll', 'He']) = true
     * ex: 'Hello' > containsAll(['ll', 'He', 'World']) = false
     */
    public function containsAll(array $needles): bool
    {
        foreach ($needles as $needle) {
            if (! $this->contains($needle)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Returns true if the string contains
     * at least one of the needles
     * ex: 'Hello' > containsAny(['ll', 'He']) = true
     * ex: 'Hello' > containsAny(['ll', 'World']) = true
     */
    public function containsAny(array $needles): bool
    {
        foreach ($needles as $needle) {
            if ($this->contains($needle)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Returns true if the string does not
     * contain any of the needles
     * ex: 'Hello' > containsNone(['ll', 'He']) = false
     * ex: 'Hello' > containsNone(['ll', 'World']) = false
     * ex: 'Hello' > containsNone(['World']) = true
     */
    public function containsNone(array $needles): bool
    {
        foreach ($needles as $needle) {
            if ($this->contains($needle)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Returns the length of the string
     * ex: 'Hello' > length() = 5
     */
    public function length(): int
    {
        return strlen($this->string);
    }

    /**
     * Returns the string property of the Twine object.
     */
    public function toString(): string
    {
        return $this->string;
    }

    /**
     * Splits a string into an array of words
     * based on the space character. Does not include
     * whitespace in the array.
     *
     * ex: 'Hello World' => ['Hello', 'World']
     */
    public function splitWords(): array
    {
        return explode(' ', $this->string);
    }

    /**
     * Splits a string by it's uppercase characters:
     * ex: 'HelloWorld' => ['Hello', 'World']
     * ex: 'Helloworld' => ['Helloworld']
     * ex: 'Hello World Again' => ['Hello ', 'World ', 'Again']
     */
    public function splitUppercase(): array
    {
        return preg_split('/(?=[A-Z])/', $this->string, -1, PREG_SPLIT_NO_EMPTY);
    }
}
