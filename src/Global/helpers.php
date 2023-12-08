<?php

use Gtmassey\Twine\Thread;

if(!function_exists('thread')) {
    function thread($string): Thread
    {
        return new Thread($string);
    }
}
