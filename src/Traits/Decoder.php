<?php

namespace Gtmassey\Twine\Traits;

use Gtmassey\Twine\Twine;

trait Decoder
{
    /**
     * convert HTML entities to HTML
     *
     * example: '&lt;h1&gt;Hello World&lt;/h1&gt;' > '<h1>Hello World</h1>'
     *
     * @return Twine
     */
    public function decodeHTML(): Twine
    {
        $this->string = html_entity_decode($this->string);

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
}
