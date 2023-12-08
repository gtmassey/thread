<?php

namespace Gtmassey\Twine\Traits;

use Gtmassey\Twine\Thread;

trait Encoder
{
    /**
     * convert characters to HTML entities
     *
     * example: '<h1>Hello World</h1>' > '&lt;h1&gt;Hello World&lt;/h1&gt;'
     *
     * @return Thread
     */
    public function encodeHTML(): Thread
    {
        $this->string = htmlentities($this->string);

        return $this;
    }

    /**
     * convert array to JSON string
     *
     * example: ['name' => 'John', 'age' => 30] > '{"name":"John","age":30}'
     *
     * @return Thread
     */
    public function encodeJson(): Thread
    {
        //TODO: Handle array entities in Twine object
        return $this;
    }

}
