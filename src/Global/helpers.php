<?php

use Gtmassey\Thread\Thread;

if (! function_exists('thread')) {
    function thread(?string $string): Thread
    {
        return new Thread($string);
    }
}
