<?php

use Gtmassey\Twine\Twine;

if(!function_exists('twine')) {
    function twine($string): Twine
    {
        return new Twine($string);
    }
}
