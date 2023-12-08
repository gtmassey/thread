<?php

namespace Gtmassey\Twine\Traits;

use Gtmassey\Twine\Twine;

trait Caser
{

    /**
     * convert first character to lowercase
     *
     * example: 'HELLO WORLD' > 'hELLO WORLD'
     *
     * @return Twine
     */
    public function lcFirst(): Twine
    {
        $this->string = lcfirst($this->string);

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
     * @return Twine
     */
    public function lcNth(int $n): Twine
    {
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
        $this->string = lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $this->string))));

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
     * convert string to kebab-case
     *
     * example: 'hello world' > toKebabCase() > 'hello-world'
     *
     * @return Twine
     */
    public function toKebabCase(): Twine
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
     * @return Twine
     */
    public function toUpperCase(): Twine
    {
        $this->string = strtoupper($this->string);

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
        $this->string = strtolower($this->string);

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
     * @return Twine
     */
    public function toPascalCase(): Twine
    {
        $this->string = str_replace(' ', '', ucwords(str_replace('_', ' ', $this->string)));

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
     * convert string to snake_case
     *
     * example: 'hello world' > toSnakeCase() > 'hello_world'
     *
     * @return Twine
     */
    public function toSnakeCase(): Twine
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
     * @return Twine
     */
    public function toTitleCase(): Twine
    {
        $this->string = ucwords($this->string);

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
}
