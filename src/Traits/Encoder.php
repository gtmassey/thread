<?php

namespace Gtmassey\Twine\Traits;

use Gtmassey\Twine\Twine;

trait Encoder
{
    /**
     * convert characters to HTML entities
     *
     * example: '<h1>Hello World</h1>' > '&lt;h1&gt;Hello World&lt;/h1&gt;'
     *
     * @return Twine
     */
    public function encodeHTML(): Twine
    {
        $this->string = htmlentities($this->string);

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

}
