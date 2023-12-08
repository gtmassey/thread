<?php

namespace Gtmassey\Thread\Traits;

use Gtmassey\Thread\Thread;

trait Decoder
{
    /**
     * convert HTML entities to HTML
     *
     * example: '&lt;h1&gt;Hello World&lt;/h1&gt;' > '<h1>Hello World</h1>'
     *
     * @return Thread
     */
    public function decodeHTML(): Thread
    {
        $this->string = html_entity_decode($this->string);

        return $this;
    }

    /**
     * convert JSON string to array
     *
     * example: '{"name":"John","age":30}' > ['name' => 'John', 'age' => 30]
     *
     * @return Thread
     */
    public function decodeJson(): Thread
    {
        //TODO: handle array values in Twine object
        return $this;
    }
}
