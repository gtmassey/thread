# Thread.php

[![Latest Version on Packagist](https://img.shields.io/packagist/v/gtmassey/thread.svg?style=flat-square)](https://packagist.org/packages/gtmassey/thread)
[![Tests](https://img.shields.io/github/actions/workflow/status/gtmassey/Thread/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/gtmassey/Thread/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/gtmassey/thread.svg?style=flat-square)](https://packagist.org/packages/gtmassey/thread)

Wrapper class for string manipulation in PHP.

Never slog through the php string function docs again!

> <p style="color: #f85c5c; font-weight: bold;">Note from the developer:</p> 
> 
> This package is still in *active* development, and is *NOT* fully tested or ready for production use. This release is an alpha release (at best) and you can expect some kind of breaking change before a full v1 release. If you have any suggestions for features, please feel free to open an issue or a pull request.
> 
> Thanks,
> 
> Garrett

I've worked with PHP for... a little over 10 years now, and I've always hated the existing string functions. They are certainly plentiful, and if you know your regex, you can do a lot with them, but they are not very intuitive, and the naming conventions are... bad. 

Laravel's String helper classes are a gigantic leap in the right direction (IMO), but it's wrapped in the Laravel framework, and while you can use it outside of Laravel, I'd rather see a dedicated third party library that is framework-agnostic. 

Thread is a framework-agnostic, static-method focused wrapper class for easily manipulating strings in PHP. No more calling random functions with random arguments and hoping for the best. Instead, create a new Thread object, and manipulate the underlying string by chaining methods together in an elegant and fluent way.

## Why Thread?

Originally, I wanted to call this package "Thread", but while working on an alpha version, I stumbled across the [PHLAK/Thread](https://github.com/PHLAK/Thread) package, which accomplishes the exact same thing I was trying to do, and does it well. 

So, instead of a play on words from my farming origins (Thread being a synonym for string, and a tool we used for everything on the farm), I decided to go with a play on words from my mother's hobby of sewing and quilting. So, "string" from computer science, meet "thread" from fiber arts. 

Not to be confused with "thread" as in the singular process that runs on a CPU... that's a different thing entirely.

Plus, 'string' is a reserved word in PHP, so I couldn't use that anyway.

## Installation

You can install the package via composer:

```bash
composer require gtmassey/thread
```

## Usage

### Getting started

The package is a simple PHP package, so you can use it in any PHP project. Simply add it to your use statements, and you're ready to go.

```php
use Gtmassey\Thread\Thread;
```

If you are using Laravel, the `ThreadServiceProvider` will automatically register the `Thread` facade for you. You can use the facade in your code like this:

```php
use Thread;
```

Now you can use the `Thread::make()` method to create a new Thread object from a string or an array.

If you are using Symfony, you can use the `Thread` class directly, or you can use the `ThreadFacade` class.

If you aren't using any of these frameworks, don't worry. You can just include the Thread class in your code and use it directly without any issues.

### Creating a Thread object

You can use the `new` keyword to create a new Thread object, the constructor accepts a string or null as an argument. If null, the default is an empty string `""`. 

```php
$string = new Thread('Hello world!');
echo($string->toString());
// "Hello world!"

$emptyString = new Thread();
echo($emptyString->toString());
// ""
```

You can also use the static `make()`, `of()`, and `from()` methods to create a new Thread object from either a string or an array. Each of the static construction methods accepts either a string OR an array as an argument.

If you use an array as the argument for the static construction methods, the array will be imploded with a space as the separator always. You can use StringableTrait methods to then manipulate the string to your liking.

```php
$string = Thread::make('a b c');
//OR
$string = Thread::make(['a', 'b', 'c']);
echo($string->toString());
// "Hello world!"

$string = Thread::of('a b c');
//OR
$string = Thread::of(['a', 'b', 'c']);
echo($string->toString());
// "a b c"

$string = Thread::from('a b c');
//OR
$string = Thread::from(['a', 'b', 'c']);
echo($string->toString());
// "a b c"
```

### Manipulating strings

Thread comes with several methods for manipulating strings. Methods that live in the `StringableTrait` trait are chainable. Methods that live in the Thread.php class are not chainable, but instead return a specific value, like a string or an array.

[Available Stringable Methods](docs/stringable-methods.md)

Example of chaining methods to manipulate a string:
```php
$string = Thread::from('Foo bar');
//"Foo bar"
$string->toPascalCase();
//"FooBar"
$string->append(' baz');
//"FooBar baz"
$string->toTitleCase()->stripChar('a')->lcFirst()
//"fooBr Bz
$string->stripWhitespace()->stripChar('o');
//fBrBz
```

```php
//example: manipulating phone number string:
$phoneNumber = Thread::from('+1 (123) 456-7890 x123');
$phone = $phoneNumber->splitOn('x')[0];
//"+1 (123) 456-7890 "
$extension = $phoneNumber->splitOn('x')[1];
//"123"
$phone->stripNonNumeric()->stripWhitespace()->toString();
//"11234567890"
$phone->getIntegerValue();
//11234567890
```

## Testing

To run the testsuite, run the following command:

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Credits

- [Garrett Massey](https://github.com/gtmassey)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
