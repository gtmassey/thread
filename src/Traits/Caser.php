<?php

namespace Gtmassey\Thread\Traits;

use Gtmassey\Thread\Thread;

trait Caser
{
    /**
     * convert first character to lowercase
     *
     * example: 'HELLO WORLD' > 'hELLO WORLD'
     *
     * @return Thread
     */
    public function lcFirst(): Thread
    {
        $this->string = lcfirst($this->string);

        return $this;
    }

    /**
     * convert last character to lowercase
     *
     * example: 'HELLO WORLD' > 'HELLO WORLd'
     *
     * @return Thread
     */
    public function lcLast(): Thread
    {
        $this->string = substr($this->string, 0, -1).strtolower(substr($this->string, -1));

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
     * @return Thread
     */
    public function lcNth(int $n): Thread
    {
        //if n is out of bounds, do nothing, return string
        if ($n <= strlen($this->string) && $n >= 0) {
            $this->string = substr_replace($this->string, strtolower(substr($this->string, $n, 1)), $n, 1);
        }

        return $this;
    }

    /**
     * convert string to camelCase
     *
     * example: 'hello world' > toCamelCase() > 'helloWorld'
     *
     * @return Thread
     */
    public function toCamelCase(): Thread
    {
        $this->string = lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $this->string))));

        return $this;
    }

    /**
     * convert string to KEBAB-CASE
     *
     * example: 'hello world' > toKebabCaseUC() > 'HELLO-WORLD'
     *
     * @return Thread
     */
    public function toKebabCaseUC(): Thread
    {
        $this->toKebabCase();
        $this->toUpperCase();

        return $this;
    }

    /**
     * convert string to kebab-case
     *
     * example: 'hello world' > toKebabCase() > 'hello-world'
     *
     * @return Thread
     */
    public function toKebabCase(): Thread
    {
        //remove special chars and add dash delimiter
        $kebab = preg_replace('/[^A-Za-z0-9]/', '-', $this->string);
        //convert to lowercase
        $kebab = strtolower($kebab ?? '');
        //trim dash from ends
        $kebab = trim($kebab, '-');
        //set string
        //TODO: write a setter function
        $this->string = $kebab;

        //return
        return $this;
    }

    /**
     * convert string to UPPERCASE
     *
     * example: 'hello world' > toUpperCase() > 'HELLO WORLD'
     *
     * @return Thread
     */
    public function toUpperCase(): Thread
    {
        $this->string = strtoupper($this->string);

        return $this;
    }

    /**
     * convert string to lowercase
     *
     * example: 'HELLO WORLD' > toLowerCase() > 'hello world'
     *
     * @return Thread
     */
    public function toLowerCase(): Thread
    {
        $this->string = strtolower($this->string);

        return $this;
    }

    /**
     * convert string to mEmE cAsE
     *
     * example: 'hello world' > toMemeCase() > 'hElLo wOrLd'
     *
     * @return Thread
     */
    public function toMemeCase(): Thread
    {
        $arr = str_split($this->string);
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
     * convert string to PascalCase
     *
     * example: 'hello world' > toPascalCase() > 'HelloWorld'
     *
     * @return Thread
     */
    public function toPascalCase(): Thread
    {
        $this->string = str_replace(' ', '', ucwords(str_replace('_', ' ', $this->string)));

        return $this;
    }

    /**
     * convert string to SNAKE_CASE
     *
     * example: 'hello world' > toSnakeCaseUC() > 'HELLO_WORLD'
     *
     * @return Thread
     */
    public function toSnakeCaseUC(): Thread
    {
        $this->toSnakeCase();
        $this->toUpperCase();

        return $this;
    }

    /**
     * convert string to snake_case
     *
     * example: 'hello world' > toSnakeCase() > 'hello_world'
     *
     * @return Thread
     */
    public function toSnakeCase(): Thread
    {
        // Remove special characters and convert spaces to underscores
        $snake_string = preg_replace('/[^a-zA-Z0-9]+/', '_', $this->string);

        // Convert to lowercase
        $snake_string = strtolower($snake_string ?? '');

        // Trim underscores from the beginning and end
        $this->string = trim($snake_string, '_');

        return $this;
    }

    /**
     * convert string to Title Case
     *
     * example: 'hello world' > toTitleCase() > 'Hello World'
     *
     * @return Thread
     */
    public function toTitleCase(): Thread
    {
        $this->string = ucwords($this->string);

        return $this;
    }

    /**
     * convert first character to uppercase
     *
     * example: 'hello world' > ucFirst() > 'Hello world'
     *
     * @return Thread
     */
    public function ucFirst(): Thread
    {
        $this->string = ucfirst($this->string);

        return $this;
    }

    /**
     * convert last character to uppercase
     *
     * example: 'hello world' > ucLast() > 'hello worlD'
     *
     * @return Thread
     */
    public function ucLast(): Thread
    {
        $this->string = substr($this->string, 0, -1).strtoupper(substr($this->string, -1));

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
     * @return Thread
     */
    public function ucNth(int $n): Thread
    {
        //convert the nth character to uppercase
        //if n is out of bounds, nothing happens, return the string
        if ($n <= strlen($this->string) && $n >= 0) {
            $this->string = substr_replace($this->string, strtoupper(substr($this->string, $n, 1)), $n, 1);
        }

        return $this;
    }
}
