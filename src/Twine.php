<?php

namespace Gtmassey\Twine;

class Twine
{
    use Traits\StringableTrait;

    protected string $string = '';

    public function __construct(?string $string = null)
    {
        $this->string = $string ?? '';
    }

    public function contains(?string $needle = null): bool
    {
        if (!isset($needle)) {
            return false;
        } else {
            return str_contains($this->string, $needle);
        }
    }

    public function containsAll(array $needles): bool
    {
        foreach ($needles as $needle) {
            if (! $this->contains($needle)) {
                return false;
            }
        }
        return true;
    }

    public function containsAny(array $needles): bool
    {
        foreach ($needles as $needle) {
            if ($this->contains($needle)) {
                return true;
            }
        }
        return false;
    }

    public function containsNone(array $needles): bool
    {
        foreach ($needles as $needle) {
            if ($this->contains($needle)) {
                return false;
            }
        }
        return true;
    }

    public function length(): int
    {
        return strlen($this->string);
    }

    public function toString(): string
    {
        return $this->string;
    }
}
